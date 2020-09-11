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
                            <li class="layui-this" id="addNode" lay-id="addNode"><span id="t"></span>添加节点</li>
                        </ul>
                        <div class="layui-tab-content">
                            <div class="layui-tab-item layui-show">
                                <form class="layui-form layui-form-pane" id="add_form" action="javascript:;">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">父节点</label>
                                        <div class="layui-input-block">
                                            <select name="pid">
                                                <option value=""></option>
                                                <option value="0">写作</option>
                                                <option value="1" selected="">阅读</option>
                                                <option value="2">游戏</option>
                                                <option value="3">音乐</option>
                                                <option value="4">旅行</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">测试2</label>
                                        <div class="layui-input-block">
                                            <input type="text" id="selectTree" name="title" lay-filter="selectTree" class="layui-input">
                                        </div>
                                    </div>

                                    <div class="layui-form-item">
                                        <label class="layui-form-label">长输入框</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                                        </div>
                                    </div>

                                    <div class="layui-form-item">
                                        <div class="layui-inline">
                                            <label class="layui-form-label">日期选择</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="date" id="date1" autocomplete="off" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-inline">
                                            <label class="layui-form-label">行内表单</label>
                                            <div class="layui-input-inline">
                                                <input type="text" name="number" autocomplete="off" class="layui-input">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="layui-form-item">
                                        <button class="layui-btn" lay-submit="" lay-filter="saveNodel">保存</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        layui.use(['tree', 'util', 'element', 'jquery', 'treeSelect', 'form'], function(){
            var tree = layui.tree
                ,layer = layui.layer
                ,util = layui.util
                ,element = layui.element
                ,$ = layui.jquery
                ,form = layui.form
                ,treeSelect= layui.treeSelect
                ,data = @json($nodeList)

            form.on('submit(saveNodel)', function(data){
               console.log(data)
            });

            treeSelect.render({
                // 选择器
                elem: '#selectTree',
                // 数据
                data: "{{route('adminGetNodeAll')}}",
                // 异步加载方式：get/post，默认get
                type: 'get',
                // 占位符
                placeholder: '占位符',
                // 是否开启搜索功能：true/false，默认false
                search: true,
                // 点击回调
                click: function(d){
                    console.log($("#add_form").find("input[name='title']").val());
                    console.log('dddddddddddddddd')
                    console.log(d);
                },
                // 加载完成后的回调函数
                success: function (d) {
                    console.log(d);
//                选中节点，根据id筛选
//                treeSelect.checkNode('tree', 3);

//                获取zTree对象，可以调用zTree方法
//                var treeObj = treeSelect.zTree('tree');
//                console.log(treeObj);

//                刷新树结构
//                treeSelect.refresh();
                },
                error: function () {
                    layer.msg('树形下拉列表加载异常', {icon: 5})
                }
            });

            // 隐藏添加节点的tab关闭
            $('#addNode').find('i').hide();

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

            var ids = [];
            // 渲染节点列表
            tree.render({
                elem: '#tree'
                ,data: data
                ,edit: ['add', 'update', 'del'] //操作节点的图标
                ,click: function(obj){
                    for (let i = 0; i < ids.length; i++) {
                        // 如果节点已被选中，则切换到该tab下
                        if(ids[i] == obj.data.id){
                            return element.tabChange('demo', obj.data.id);
                        }
                    }
                    // 插入到ids、添加tab并自动切换到该tab下
                    ids.push(obj.data.id);
                    addtab(obj.data.title, obj.data.id)
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
                    $.each(ids, function(index, item){
                        if(item == $(e.target).parent().attr('lay-id')){
                            ids.splice(index, 1)
                        }
                    });
                }
            });

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