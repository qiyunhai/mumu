<?php
/**
 * 节点管理
 * @author: 齐云海
 * @time: 2020/9/9 11:00
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Node as NodeModel;

class NodeController extends Controller
{
    /**
     * 节点列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function node()
    {
        // 获取节点列表
        $with['nodeList'] = NodeModel::getNodeAll('children');
        // 返回页面
        return view('admin.public.node.node')->with($with);
    }

    /**
     * 返回所有节点
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNodeAll(Request $request)
    {
        // 返回数据
        return json(NodeModel::getNodeAll('children', ['title'=>'name']));
    }

}