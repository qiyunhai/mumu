<?php
/**
 * 节点验证器
 * @author: 齐云海
 * @time: 2020/9/19 11:13
 */
namespace App\Validator\Admin;

use Validator;

class NodeValidator
{
    /**
     * @param $params
     * @return mixed|bool
     */
    public static function check($params)
    {
        // 定义规则
        $rules = [
            'pid'   =>	'bail|required|integer',
            'title' => 'bail|required|string',
        ];
        // 编辑错误信息
        $messages = [
            'pid.required'   => '请选择父级节点',
            'pid.integer'    => '父级节点类型不正确',
            'title.required' => '请填写标题',
            'title.string'   => '标题类型不正确',
        ];
        // 验证
        $validator = Validator::make($params, $rules, $messages);
        // 验证失败
        if($validator->fails()){
            return $validator->errors()->first();
        }else{
            return false;
        }
    }

}