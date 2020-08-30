<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Validator\Admin\LoginValidator;
use Auth;

class LoginController extends Controller
{
    /**
     * 登录页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * 执行登陆
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function doLogin(Request $request)
    {
        // 验证请求
        if($request->ajax()) {
            // 调用验证器验证
            $validator_result = LoginValidator::check($request->all());
            if($validator_result) {
                return $this->ajaxResponse(0, $validator_result);
            }
        }
        // 登陆认证
        if(Auth::guard('admin')->attempt($request->only(['username','password']))) {
            return $this->ajaxResponse(1, '登陆成功');
        } else {
            return $this->ajaxResponse(0, '用户名或密码错误');
        }
    }

    /**
     * 退出登陆
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        // 清除登陆状态
        Auth::guard('admin')->logout();
        // 跳转到登陆页面
        return redirect(route('admin_login'));
    }

}
