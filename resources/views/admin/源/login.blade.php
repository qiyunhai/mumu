<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="齐云海">
    <link rel="icon" href="{{asset(__ADMIN__)}}/img/basic/favicon.ico" type="image/x-icon">
    <title>穆穆宠物医院-后台登录</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset(__ADMIN__)}}/css/app.css">
</head>
<style>
    .captcha{
        border: 2px solid rgb(225,232,238);
        border-radius: 7px;
        margin-top: 20px;
        padding: 5px 0px 5px 15%;
    }
    .captcha img{
        padding-right: 8%;
    }
</style>
<body class="light sidebar-mini sidebar-collapse">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
    <div class="page parallel">
        <div class="d-flex row">
            <div class="col-md-9  height-full blue accent-3 align-self-center text-center d-none d-md-block" data-bg-repeat="false"
                 data-bg-possition="center">
            </div>
            <div class="col-md-3 white">
                <div class="p-5 mt-5">
                    {{--<img src="{{asset(__ADMIN__)}}/img/basic/logo.png" alt=""/>--}}
                </div>
                <div class="p-5">
                    <h3>后台登录</h3>
                    <p>穆穆宠物医院 - 后台登录系统</p>
                    <form action="javascript:;">
                        <div class="form-group has-icon"><i class="icon-user-circle-o"></i>
                            <input type="text" autocomplete="off" name="username" class="form-control form-control-lg"
                                   placeholder="用户名">
                        </div>
                        <div class="form-group has-icon"><i class="icon-user-secret"></i>
                            <input type="password" name="password" class="form-control form-control-lg"
                                   placeholder="密码">
                        </div>
                        <div class="form-group has-icon">
                            <div class="col-xs-10 flex-nowrap"><i class="icon-user-secret"></i>
                            <input type="text" autocomplete="off" name="captcha" class="form-control form-control-lg"
                                   placeholder="验证码">
                            </div>
                            <div class="col-xs-10 flex-nowrap captcha">
                                <img id="captcha_img" src="{{captcha_src()}}">
                                <a href="javascript:;" id="edit_captcha">换一张</a>
                            </div>
                        </div>
                        <div class="form-group">
                            </div>
                        <input type="button" id="doLogin" class="btn btn-primary btn-lg btn-block" value="登录">
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- Right Sidebar -->
    <aside class="control-sidebar fixed white ">
        <div class="slimScroll">
            <div class="sidebar-header">
                <h4>Activity List</h4>
                <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
            </div>
            <div class="p-3">
                <div>
                    <div class="my-3">
                        <small>25% Complete</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="my-3">
                        <small>45% Complete</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 45%;" aria-valuenow="45"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="my-3">
                        <small>60% Complete</small>
                        `
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="my-3">
                        <small>75% Complete</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="my-3">
                        <small>100% Complete</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 bg-primary text-white">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="font-weight-normal s-14">Sodium</h5>
                        <span class="font-weight-lighter text-primary">Spark Bar</span>
                        <div> Oxygen
                            <span class="text-primary">
                                                    <i class="icon icon-arrow_downward"></i> 67%</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <canvas width="100" height="70" data-chart="spark" data-chart-type="bar"
                                data-dataset="[[28,68,41,43,96,45,100,28,68,41,43,96,45,100,28,68,41,43,96,45,100,28,68,41,43,96,45,100]]"
                                data-labels="['a','b','c','d','e','f','g','h','i','j','k','l','m','n','a','b','c','d','e','f','g','h','i','j','k','l','m','n']">
                        </canvas>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                    <tbody>
                    <tr>
                        <td>
                            <a href="#">INV-281281</a>
                        </td>
                        <td>
                            <span class="badge badge-success">Paid</span>
                        </td>
                        <td>$ 1228.28</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">INV-01112</a>
                        </td>
                        <td>
                            <span class="badge badge-warning">Overdue</span>
                        </td>
                        <td>$ 5685.28</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">INV-281012</a>
                        </td>
                        <td>
                            <span class="badge badge-success">Paid</span>
                        </td>
                        <td>$ 152.28</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">INV-01112</a>
                        </td>
                        <td>
                            <span class="badge badge-warning">Overdue</span>
                        </td>
                        <td>$ 5685.28</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">INV-281012</a>
                        </td>
                        <td>
                            <span class="badge badge-success">Paid</span>
                        </td>
                        <td>$ 152.28</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="sidebar-header">
                <h4>Activity</h4>
                <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
            </div>
            <div class="p-4">
                <div class="activity-item activity-primary">
                    <div class="activity-content">
                        <small class="text-muted">
                            <i class="icon icon-user position-left"></i> 5 mins ago
                        </small>
                        <p>Lorem ipsum dolor sit amet conse ctetur which ascing elit users.</p>
                    </div>
                </div>
                <div class="activity-item activity-danger">
                    <div class="activity-content">
                        <small class="text-muted">
                            <i class="icon icon-user position-left"></i> 8 mins ago
                        </small>
                        <p>Lorem ipsum dolor sit ametcon the sectetur that ascing elit users.</p>
                    </div>
                </div>
                <div class="activity-item activity-success">
                    <div class="activity-content">
                        <small class="text-muted">
                            <i class="icon icon-user position-left"></i> 10 mins ago
                        </small>
                        <p>Lorem ipsum dolor sit amet cons the ecte tur and adip ascing elit users.</p>
                    </div>
                </div>
                <div class="activity-item activity-warning">
                    <div class="activity-content">
                        <small class="text-muted">
                            <i class="icon icon-user position-left"></i> 12 mins ago
                        </small>
                        <p>Lorem ipsum dolor sit amet consec tetur adip ascing elit users.</p>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- /.right-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
    <div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="{{asset(__ADMIN__)}}/js/app.js"></script>
<script>
    $("#edit_captcha").click(function(){
        captcha_random()
    })
    $('#doLogin').click(function(){
        $.ajax({
            url: "{{route('admin_doLogin')}}",
            type: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'username': $("input[name='username']").val(),
                'password': $("input[name='password']").val(),
                'captcha': $("input[name='captcha']").val()
            },
            datatype:"json",
            success: function (res) {
                alert(res.msg)
                if(res.code == 1) {
                    window.location.href = "{{route('admin_index')}}"
                }
                captcha_random()
            },
            error: function () {
                alert('网络错误')
            }
        })
    })
    function captcha_random()
    {
        var _src = $('img').attr('src').split('&_=')[0];
        $('#captcha_img').attr('src', _src + '&_=' + Math.random())
    }
</script>
</body>
</html>

