<?php
/**
 * @author: 齐云海
 * @time: 2020/9/3 22:15
 */

namespace App\Validator\Admin;

use Validator;

class RoleValidator
{
    /**
     * 角色验证
     * @param $params
     * @return bool|string
     */
    public static function check($params)
    {
        // 定义规则
        $rules = [
            'name'   => 'required'
        ];
        // 编辑错误信息
        $messages = [
            'name.required' => '角色名称不能为空'
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