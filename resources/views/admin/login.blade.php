<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理-登陆</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="{{asset(__ADMIN__)}}/lib/layui-v2.5.5/css/layui.css" media="all">
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {background-image:url("{{asset(__ADMIN__)}}/images/bg.jpg");height:100%;width:100%;}
        #container{height:100%;width:100%;}
        input:-webkit-autofill {-webkit-box-shadow:inset 0 0 0 1000px #fff;background-color:transparent;}
        .admin-login-background {width:300px;height:300px;position:absolute;left:50%;top:40%;margin-left:-150px;margin-top:-100px;}
        .admin-header {text-align:center;margin-bottom:20px;color:#ffffff;font-weight:bold;font-size:40px}
        .admin-input {border-top-style:none;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;height:50px;width:300px;padding-bottom:0px;}
        .admin-input::-webkit-input-placeholder {color:#a78369}
        .layui-icon-username {color:#a78369 !important;}
        .layui-icon-username:hover {color:#9dadce !important;}
        .layui-icon-password {color:#a78369 !important;}
        .layui-icon-password:hover {color:#9dadce !important;}
        .admin-input-username {border-top-style:solid;border-radius:10px 10px 0 0;}
        .admin-input-verify {border-radius:0 0 10px 10px;}
        .admin-button {margin-top:20px;font-weight:bold;font-size:18px;width:300px;height:50px;border-radius:5px;background-color:#a78369;border:1px solid #d8b29f}
        .admin-icon {margin-left:260px;margin-top:10px;font-size:30px;}
        i {position:absolute;}
        .admin-captcha {position:absolute;margin-left:205px;margin-top:-40px;}
        .admin-captcha {cursor:pointer}
    </style>
</head>
<body>
<div id="container">
    <div></div>
    <div class="admin-login-background">
        <div class="admin-header">
            <span>mumu</span>
        </div>
        <form class="layui-form" action="javascript:void(0);">
            <div>
                <i class="layui-icon layui-icon-username admin-icon"></i>
                <input type="text" name="username" lay-verify="required" lay-reqtext="请填写用户名" placeholder="请输入用户名" autocomplete="off" class="layui-input admin-input admin-input-username">
            </div>
            <div>
                <i class="layui-icon layui-icon-password admin-icon"></i>
                <input type="password" name="password" lay-verify="required" lay-reqtext="请填写密码" placeholder="请输入密码" autocomplete="off" class="layui-input admin-input">
            </div>
            <div>
                <input type="text" name="captcha" placeholder="请输入验证码" lay-verify="required" lay-reqtext="请填写验证码" autocomplete="off" class="layui-input admin-input admin-input-verify">
                <img class="admin-captcha" width="90" height="30" src="{{captcha_src()}}">
            </div>
            <button class="layui-btn admin-button" lay-submit="" lay-filter="login">登 陆</button>
        </form>
    </div>
</div>
<script src="{{asset(__ADMIN__)}}/lib/layui-v2.5.5/layui.js" charset="utf-8"></script>
<script>
    layui.use(['form'], function () {
        var form = layui.form,
            layer = layui.layer,
            $ = layui.$;

        // 登录过期的时候，跳出ifram框架
        if (top.location != self.location) top.location = self.location;

        $('.admin-captcha').click(function(){
            captcha_random()
        });

        // 进行登录操作
        form.on('submit(login)', function (data) {
            data = data.field;
            $.ajax({
                url: "{{route('admin_doLogin')}}",
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    'username': data.username,
                    'password': data.password,
                    'captcha': data.captcha
                },
                datatype:"json",
                success: function (res) {
                    if(res.code == 0) {
                        captcha_random()
                        return layer.msg(res.msg, {time: 1000})
                    }
                    if(res.code == 1) {
                        layer.msg(res.msg, {
                            icon: 1,
                            time: 1000,
                            end: function(){
                                window.location.href = "{{route('admin_index')}}"
                            }
                        });
                    }
                },
                error: function () {
                    layer.alert('网络错误')
                }
            })
        });

        function captcha_random()
        {
            var _src = $('img').attr('src').split('&_=')[0];
            $('.admin-captcha').attr('src', _src + '&_=' + Math.random())
        }

    });
</script>
</body>
</html>