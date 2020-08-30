<?php
/**
 * @author: 齐云海
 * @time: 2020/8/29 20:45
 */
namespace App\Model\Admin;
// 引入trait的空间
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //基本定义
    protected $table = 'admin_user';

    // 使用trait
    use Authenticatable;

    // 关联角色模型(relate)
    /*public function rel_role(){
        //关联关系的返回（一对一）
        return $this -> hasOne('App\Model\Role','id','role_id');
    }*/
}
