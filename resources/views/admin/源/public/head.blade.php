<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- 新 Bootstrap4 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <!-- bootstrap.bundle.min.js 用于弹窗、提示、下拉菜单，包含了 popper.min.js -->
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- 后台模板核心css -->
    <link rel="stylesheet" href="{{asset(__ADMIN__)}}/css/app.css">
</head>
<style>
    body{
        /* 隐藏iframe水平滚动条 */
        overflow-x:hidden;
    }
    /* 设置滚动条的样式 */
    ::-webkit-scrollbar{
        width: 3px;
    }
    /*滚动槽*/
    ::-webkit-scrollbar-track{
        box-shadow: inset 0 0 6px rgba(0,0,0,0.1);
        border-radius: 10px;
    }
    /* 滚动条滑块 */
    ::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: rgba(0, 0, 0, 0.1);
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.15);
    }
    /* 隐藏右上角加载 */
    #nprogress {
        display: none;
    }
</style>
<script>
    $(function(){
        // 删除加载进度条
        $(".bar").remove()
    })
    $(function(){
        console.log('1123')
    })
</script>