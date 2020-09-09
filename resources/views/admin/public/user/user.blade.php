@extends('admin.base')
@section('content')
<table class="layui-hide" id="user" lay-filter="user"></table>

<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-sm" lay-event="checkDelete">删除选中</button>
        <button class="layui-btn layui-btn-sm" lay-event="add">添加用户</button>
    </div>
</script>

@endsection

@section('script')
<script>
    layui.use(['table', 'jquery', 'laypage', 'form'], function(){
        var table = layui.table
        ,$ = layui.jquery
        ,laypage = layui.laypage
        ,form = layui.form;
        // 数据列表
        table.render({
            elem: '#user'
            ,url:'{{route('admin_user_list')}}'
            ,toolbar: '#toolbarDemo' //开启头部工具栏，并为其绑定左侧模板
            ,defaultToolbar: ['filter', 'exports', 'print']
            ,title: '用户数据表'
            ,cols: [[
                {type: 'checkbox', fixed: 'left'}
                ,{field:'id', title:'ID', fixed: 'left', unresize: true, sort: true}
                ,{field:'username', title:'用户名'}
                ,{fixed: 'right', title:'操作', templet: function (d) {
                        if(d.id == 1) {
                            return '<a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit">编辑</a><a class="layui-btn layui-btn-disabled layui-btn-xs">删除</a>';
                        } else {
                            return '<a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit">编辑</a><a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>';
                        }
                    }
                }
            ]]
            ,method: 'get'
            ,limits: [10,15,20]
            ,limit: 10
            ,page: true
            ,parseData: function (res) {
                return {
                    "code": res.code, //解析接口状态
                    "msg": res.msg, //解析提示文本
                    "data": res.data.data, //解析数据列表
                    "count": res.data.total //解析数据列表
                };
            }
        });
        //头工具栏事件
        table.on('toolbar(user)', function(obj){
            var checkStatus = table.checkStatus(obj.config.id);
            switch(obj.event){
                case 'checkDelete':
                    var data = checkStatus.data;
                    if(data.length <= 0){
                        return layer.msg('请选择您要删除的用户')
                    }
                    // 执行批量删除
                    del(getIds(data))
                case 'add':
                    alert('123')
            }
        });

        //监听行工具事件
        table.on('tool(user)', function(obj){
            var data = obj.data;
            if(obj.event === 'del'){
                layer.confirm('真的删除行么', function(index){
                    obj.del();
                    layer.close(index);
                });
            } else if(obj.event === 'edit'){
                var url = "{{route('admin_add_user')}}?id=" + obj.data.id + '&username=' + obj.data.username;
                layer.open({
                    type: 2,
                    moveType: 1,
                    maxmin: true,
                    title: '更改用户信息',
                    content: url,
                    area: ['70%', '50%']
                })
            }
        });

        function del(ids) {
            $.ajax({
                url: "{{route('admin_delete_user')}}?ids=" + ids,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                dataType: "json",
                success: function () {
                    if(res.code == 0) {
                        layer.msg(res.data, {
                            icon: 1,
                            time: 1000,
                            end: function () {
                                // 刷新表格
                                layui.table.reload('user')
                            }
                        })
                    }
                    if(res.code == -1) {
                        layer.msg(res.msg, {icon: 5})
                    }
                },
                error: function () {
                    layer.alert('网络错误', {icon: 2})
                }
            })
        }
    });
</script>
@endsection