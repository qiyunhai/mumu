@extends('admin.base')
@section('style')
    <style>
        #add_content {
            padding-top: 20px;
            padding-right: 20px;
        }
        #add_content .layui-form-label {
            padding: 9px 0px;
        }
        #add_content .layui-input-block {
            margin-left: 90px;
        }
    </style>
@endsection
@section('content')
    <div id="add_content">
    <form class="layui-form" action="javascript:;">
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input type="text" name="username" lay-verify="required" lay-reqtext="请填写用户名" placeholder="请输入用户名" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
                <input type="password" name="password" lay-verify="required" lay-reqtext="请填写密码" placeholder="请输入密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码</label>
            <div class="layui-input-block">
                <input type="password" name="password_confirmation" lay-verify="required" lay-reqtext="请确认密码" placeholder="请确认密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="update">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
    </div>
@endsection
@section('script')
    <script>
        layui.use(['form','jquery'], function(){
            var form = layui.form
            ,$ = layui.jquery;
            //监听提交
            form.on('submit(update)', function(data){
                var data = data.field;
                $.ajax({
                    url: "{{route('admin_save_user')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: {
                        'username': data.username,
                        'password': data.password,
                        'password_confirmation': data.password_confirmation
                    },
                    dataType: "json",
                    success: function (res) {
                        if(res.code == 0) {
                            layer.msg(res.data, {
                                icon: 1,
                                time: 1000,
                                end: function () {
                                    // 关闭当前添加页面iframe
                                    parent.layer.close(parent.layer.getFrameIndex(window.name))
                                    // 刷新表格
                                    parent.layui.table.reload('user')
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
            });
        });
    </script>
@endsection