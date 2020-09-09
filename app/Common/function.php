<?php
/**
 * 所有的公共方法
 * @author: 齐云海
 * @time: 2020/8/30 10:47
 */

/**
 * 返回json格式
 * @param $data [数据]
 * @return \Illuminate\Http\JsonResponse
 */
function json($data)
{
    return response()->json($data);
}

/**
 * 对象转数组
 * @param $obj [对象数据]
 * @return array
 */
function objectToArray($obj)
{
    return json_decode(json_encode($obj), true);
}