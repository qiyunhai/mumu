@extends('admin.base')
@section('style')
    <style>
        .layui-card-header {
            border-bottom: 1px solid #5FB878;
        }
        .layui-card {
            padding: 10px 2% 0% 2%;
        }
        #tree {
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="layui-row">
        <div class="layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">节点列表</div>
                <div class="layui-card-body">
                    <div id="tree" class="demo-tree demo-tree-box"></div>
                </div>
            </div>
        </div>
        <div class="layui-col-md9">
            <div class="layui-card">
                <div class="layui-card-header">节点操作</div>
                <div class="layui-card-body">
                    <div class="layui-tab" lay-filter="demo" lay-allowclose="true">
                        <ul class="layui-tab-title">
                            <li class="layui-this" id="tt" lay-id="add"><span id="t"></span>添加节点</li>
                            <li lay-id="22">用户列表</li>
                        </ul>
                        <div class="layui-tab-content">
                            <div class="layui-tab-item layui-show">内容1</div>
                            <div class="layui-tab-item">内容2</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        layui.use(['tree', 'util', 'element', 'jquery'], function(){
            var tree = layui.tree
                ,layer = layui.layer
                ,util = layui.util
                ,element = layui.element
                ,$ = layui.jquery
                ,data = @json($nodeList)
            //按钮事件
            util.event('lay-demo', {
                getChecked: function(othis){
                    var checkedData = tree.getChecked('demoId1'); //获取选中节点的数据

                    layer.alert(JSON.stringify(checkedData), {shade:0});
                    console.log(checkedData);
                }
                ,setChecked: function(){
                    tree.setChecked('demoId1', [12, 16]); //勾选指定节点
                }
            });
            alert($("#t").parent().attr('lay-id'))

            var ids = [];
            // 渲染节点列表
            tree.render({
                elem: '#tree'
                ,data: data
                ,edit: ['add', 'update', 'del'] //操作节点的图标
                ,click: function(obj){
                    // layer.msg(JSON.stringify(obj.data));
                    if(ids == []){
                        ids.push(obj.data.id);
                        addtab(obj.data.title, obj.data.id)
                        console.log(ids)
                    }else{
                        for (let i = 0; i < ids.length; i++) {
                            if(ids[i] == obj.data.id){
                                return element.tabChange('demo', obj.data.id);
                            }
                        }
                        ids.push(obj.data.id);
                        addtab(obj.data.title, obj.data.id)
                        console.log(ids)
                    }
                }
                ,operate: function (obj) {
                    var type = obj.type;
                    var data = obj.data;
                    var elem = obj.elem;
                    var daeptId = data.id;
                    var parentId = data.parentId;
                    // 添加节点时
                    if(type === 'add') {

                    }
                    // 修改节点时
                    if(type === 'update') {
                        console.log('123')
                    }
                    // 删除节点时
                    if(type === 'del') {
                        return layer.msg('删除失败')
                    }
                }
            });

            // 删除tab时,去掉ids里面的元素
            $(".layui-tab").on("click",function(e){
                if($(e.target).is(".layui-tab-close")){
                    console.log(ids);
                    for (let i = 0; i <= ids.length; i++) {
                        if(ids[i] == $(e.target).parent().attr('lay-id')){
                            ids.splice($.inArray($(e.target).parent().attr("lay-id"), ids), i);
                            console.log('删除的id:' + $(e.target).parent().attr("lay-id"))
                        }
                    }
                    return
                    console.log(ids)
                    ids.splice($.inArray($(e.target).parent().attr("lay-id"), ids), 10);
                    console.log(ids)
                }
            })

            // 添加tab
            function addtab(title, id) {
                // 新增修改Tab
                element.tabAdd('demo', {
                    title: title
                    ,content: '内容'+ (Math.random()*1000|0)
                    ,id: id
                });
                // 切换到刚刚添加的Tab
                checktab(id)
            }

            // 切换tab
            function checktab(id) {
                element.tabChange('demo', id);
            }

        });
    </script>
@endsection