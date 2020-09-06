<?php
/**
 * @author: 齐云海
 * @time: 2020/9/3 21:10
 */

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\User as UserModel;
use App\Validator\Admin\UserValidator;
use Hash;

class UserController extends Controller
{
    public function userList(Request $request)
    {
        $data = UserModel::getUserList($request->limit);
        // 验证并返回数据
        if($data) {
            return $this->responseSuccess($data);
        }
        return $this->responseError('暂无用户数据');
    }

    public function saveUser(Request $request)
    {
        // 验证请求
        if($request->ajax()) {
            // 调用验证器验证
            $validator_result = UserValidator::check($request->all());
            if($validator_result) {
                return $this->responseError($validator_result);
            }
            $data['username'] = $request->username;
            $data['password'] = Hash::make($request->password); // 密码加密
            // 保存到数据库
            $result = UserModel::create($data);
            // 验证
            if($result) {
                return $this->responseSuccess('保存用户成功');
            }
            return $this->responseError('保存用户失败');
        } else {
            return $this->responseError('非法操作');
        }
    }

    public function editUser()
    {
        return view('admin.public.user.edit');
    }

    public function updateUser()
    {

    }

    public function deleteUser()
    {

    }

}