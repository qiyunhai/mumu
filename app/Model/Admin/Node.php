<?php
/**
 * @author: 齐云海
 * @time: 2020/8/30 2:28
 */

namespace App\Model\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Node extends Model
{
    use SoftDeletes;
    // 节点表名
    protected $table = 'admin_node';
    // 设置白名单
    protected $fillable = ['pid','title','href','icon','target','sort','show','status','remark'];

    /**
     * 获取所有后台节点
     * @param $childName [子节点键名，默认传child]
     * @array $param [字段名称替换]
     * @return array
     */
    public static function getNodeAll($childName = 'child', $param = [])
    {
        $select = ['*'];
        if(!empty($param)){
            foreach ($param as $key=>$value){
                array_push($select, "{$key} AS {$value}");
            }
        }
        $data = self::where('status',1)
            ->where('show', 1)
            ->orderBy('sort')
            ->select($select)
            ->get();
        return ['tree'=>self::getTree(objectToArray($data), $childName), 'data'=>$data];
    }

    /**
     * 对菜单节点进行无限极分类
     * @param $array [需要操作的数据]
     * @param $childName [子节点键名]
     * @return array
     */
    public static function getTree($array, $childName)
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
                    $refer[$pid][$childName][] = &$array[$k]; //如果存在父级栏目，则添加进父级栏目的子栏目数组中
                }
            }
        }
        return $tree;
    }

}