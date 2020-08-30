<?php
/**
 * @author: 齐云海
 * @time: 2020/8/29 23:47
 */
namespace App\Validator\Admin;

use Validator;

class LoginValidator
{
    /**
     * 登陆验证
     * @param $params
     * @return mixed|bool
     */
    public static function check($params)
    {
        // 定义规则
        $rules = [
            'username' =>	'required',
            'password' =>	'required',
            'captcha'  =>	'required|captcha|size:4'
        ];
        // 编辑错误信息
        $messages = [
            'username.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            'captcha.required'  => '验证码不能为空',
            'captcha.captcha'	  => '验证码错误'
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