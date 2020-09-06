<?php
/**
 * @author: 齐云海
 * @time: 2020/9/3 21:13
 */

namespace App\Validator\Admin;

use Validator;

class UserValidator
{
    /**
     * 用户验证
     * @param $params
     * @return bool|string
     */
    public static function check($params)
    {
        // 定义规则
        $rules = [
            'username'               => 'required',
            'password'               => 'required|min:6|max:18|confirmed',
            'password_confirmation' => 'required'
        ];
        // 编辑错误信息
        $messages = [
            'username.required'               => '用户名不能为空',
            'password.required'               => '密码不能为空',
            'password.min'                     => '密码长度最少为6位',
            'password.max'                     => '密码长度最多为18位',
            'password_confirmation.required' => '请确认密码',
            'password.confirmed'              => '两次密码不一致'
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