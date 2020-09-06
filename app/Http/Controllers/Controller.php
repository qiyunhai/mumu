<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 响应json数据
     * @param $code [状态码]
     * @param string $msg [响应信息]
     * @param array $data [响应数据]
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseJson($code, $msg = '', $data = [])
    {
        return response()->json(['code'=>$code, 'msg'=>$msg, 'data'=>$data]);
    }

    /**
     * 响应成功状态
     * @param array $data [返回数据]
     * @param int $code [状态码]
     * @param string $msg [响应信息]
     * @return mixed
     */
    public function responseSuccess($data = [], $code = 0, $msg = 'success')
    {
        return response()->json(['data'=>$data, 'code'=>$code, 'msg'=>$msg]);
    }

    /**
     * 响应失败状态
     * @param string $msg [响应信息]
     * @param int $code [状态码]
     * @return mixed
     */
    public function responseError($msg = 'Error：接口数据异常', $code = -1)
    {
        return response()->json(['msg'=>$msg, 'code'=>$code]);
    }

    /**
     * 对象转数组
     * @param $obj [对象]
     * @return array
     */
    public function objectToArray($obj)
    {
        return json_decode(json_encode($obj), true);
    }

}
