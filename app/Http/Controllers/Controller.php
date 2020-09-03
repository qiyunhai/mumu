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
     * 对象转数组
     * @param $obj [对象]
     * @return array
     */
    public function objectToArray($obj)
    {
        return json_decode(json_encode($obj), true);
    }

}
