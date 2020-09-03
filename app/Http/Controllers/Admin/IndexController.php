<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    /**
     * 后台页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.index');
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
            'title' => 'LAYUI MINI',
            'image' => 'images/logo.png',
        ];
        // 菜单节点信息
        $data = DB::table('admin_node')
            ->where('status',1)
            ->where('show', 1)
            ->orderBy('sort')
            ->get();
        $menuInfo = $this->getTree($this->objectToArray($data));
        // 合并
        $systemInit = [
            'homeInfo' => $homeInfo,
            'logoInfo' => $logoInfo,
            'menuInfo' => $menuInfo,
        ];
        // 返回数据
        return json_encode($systemInit);
    }

    /**
     * 对菜单节点进行无限极分类
     * @param $array
     * @return array
     */
    public function getTree($array)
    {
        $refer = array();
        $tree = array();
        foreach($array as $key=>$val){
            $refer[$val['id']] = &$array[$key];
        }
        foreach($array as $k => $v){
            $pid = $v['pid']; //获取当前分类的父级id
            if($pid == 0){
                $tree[] = &$array[$k]; //顶级栏目
            }else{
                if(isset($refer[$pid])){
                    $refer[$pid]['child'][] = &$array[$k]; //如果存在父级栏目，则添加进父级栏目的子栏目数组中
                }
            }
        }
        return $tree;
    }


    public function welcome()
    {
        return view('admin.welcome');
    }

}