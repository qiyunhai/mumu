<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Node;

class IndexController extends Controller
{
    /**
     * 后台页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.public.index');
    }

    /**
     * 获取初始化数据和后台菜单
     * @return false|string
     */
    public function getSystemInit()
    {
        // 后台欢迎页
        $homeInfo = [
            'title' => '首页',
            'href'  => '/admin/welcome',
        ];
        // 后台logo信息
        $logoInfo = [
            'title' => 'MUMU',
            'image' => 'images/logo.png',
        ];
        // 合并
        $systemInit = [
            'homeInfo' => $homeInfo,
            'logoInfo' => $logoInfo,
            'menuInfo' => Node::getNodeAll()
        ];
        // 返回数据
        return json($systemInit);
    }

    /**
     * 后台首页
     * @return mixed
     */
    public function welcome()
    {
        return view('admin.public.welcome');
    }

}