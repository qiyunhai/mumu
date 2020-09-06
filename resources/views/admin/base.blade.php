<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{asset(__ADMIN__)}}/lib/layui-v2.5.5/css/layui.css"  media="all">
    @yield('css')
</head>
@yield('style')
<body>

@yield('content')

<script src="{{asset(__ADMIN__)}}/lib/layui-v2.5.5/layui.js" charset="utf-8"></script>
@yield('script')
<script>
    /**
     * 获取数组里面所有的id
     * @param arr
     * @returns {string}
     */
    function getIds(arr)
    {
        let str = '';
        for (let i = 0; i < arr.length; i++) {
            str += arr[i].id + ','
        }
        return str.substring(0, str.length - 1);
    }
</script>
</body>
</html>