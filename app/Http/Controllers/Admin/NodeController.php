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
use App\Validator\Admin\NodeValidator;

class NodeController extends Controller
{
    /**
     * 节点页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function node()
    {
        // 获取节点列表
        $node = NodeModel::getNodeAll('children');
        $with['nodeTree'] = $node['tree'];  //树形结构数据
        array_unshift($with['nodeTree'], ['id'=>0, 'pid'=>0, 'title'=>'顶级节点', 'sort'=>0]);// 拼接顶级节点数据
        $with['nodeData'] = objectToArray($node['data']);  //原始数据
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
        // 获取所有节点
        $nodes = NodeModel::getNodeAll('children', ['title'=>'name'])['tree'];
        // 拼接顶级节点数据
        array_unshift($nodes, ['id'=>0, 'pid'=>0, 'name'=>'顶级节点', 'sort'=>0]);
        // 返回数据
        return json($nodes);
    }

    /**
     * 修改节点
     * @param $id
     * @return mixed
     */
    public function editNode($id)
    {
        // 获取数据
        $data = NodeModel::where('id', $id)->first();
        // 验证并返回信息
        if($data) {
            return $this->responseSuccess($data);
        } else {
            return $this->responseError('未找到此节点');
        }
    }
    /**
     * 保存、更新节点
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function saveNode(Request $request)
    {
        // 验证请求
        if($request->ajax()) {
            // 验证顶级节点，给予赋值
            $request->pid = $request->pid ?? 0;
            // 调用验证器验证
            $validator_result = NodeValidator::check($request->all());
            if($validator_result) {
                return $this->responseError($validator_result);
            }
            // 保存到数据库
            if($request->id) {
                // 修改操作
                $result = NodeModel::where('id', $request->id)->update($request->all());
            } else {
                // 添加
                $result = NodeModel::create($request->all());
            }
            // 验证
            if($result) {
                return $this->responseSuccess('保存节点成功');
            }
            return $this->responseError('保存节点失败');
        } else {
            return $this->responseError('非法操作');
        }
    }

    /**
     * 删除节点（软删除）
     * @param $id [节点id]
     * @return mixed
     */
    public function deleteNode($id)
    {
        // 删除节点并验证
        if(NodeModel::where('id', $id)->delete()){
            return $this->responseSuccess('删除成功');
        }
        return $this->responseError('删除失败');
    }

}