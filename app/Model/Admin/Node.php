<?php
/**
 * @author: 齐云海
 * @time: 2020/8/30 2:28
 */

namespace App\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    // 表名
    protected $table = 'admin_node';

    public static function get_node_list_view()
    {
        $nodeArray = self::nodeTree(self::where('status', '1')->orderBy('sort', 'asc')->get()->toArray());
        return (new self) -> tree($nodeArray);
    }

    private function tree($array, $pid = 0)
    {
        static $view = '';
        foreach ($array as $key => $value) {
            if($value['show'] == '1' && $value['pid'] == $pid) {
                if(isset($value['son'])) {
                    $menu_class = 'treeview';
                    $is_link = false;
                    $name = 'javascript:void(0);';
                } else {
                    $menu_class = '';
                    $is_link = true;
                    $name = $value['name'];
                }
                $view .= '<li class="'.$menu_class.'">
                            <a href="'.$name.'">
                                <i class="icon icon-account_box s-24"></i>
                                    '.$value['title'];
                if(!$is_link){
                    $view .= '<i class=" icon-angle-left  pull-right"></i>';
                }
                $view .= '</a>';
                if(isset($value['son'])) {
                    unset($array[$key]);
                    $view .= '<ul class="treeview-menu">';
                    $this->tree($value['son'], $value['id']);
                    $view .= '</ul></li>';
                } else {
                    $view .= '</li>';
                }
            }
        }
        return $view;
    }

    /**
     * 无限极分类，多维数组
     * @param $array
     * @return array
     */
    private static function nodeTree($array)
    {
        $refer = [];
        $tree = [];
        foreach($array as $key=>$val){
            $refer[$val['id']] = &$array[$key];
        }
        foreach($array as $k => $v){
            $pid = $v['pid'];  //获取当前分类的父级id
            if($pid == 0){
                $tree[] = &$array[$k];  //顶级栏目
            }else{
                if(isset($refer[$pid])){
                    $refer[$pid]['son'][] = &$array[$k]; //如果存在父级栏目，则添加进父级栏目的子栏目数组中
                }
            }
        }
        return $tree;
    }

}