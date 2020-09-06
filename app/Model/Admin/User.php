<?php
/**
 * @author: 齐云海
 * @time: 2020/9/3 21:11
 */

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // 用户表名
    protected $table = 'admin_user';
    // 字段白名单
    protected $fillable = ['username', 'password'];
    // 取消添加时间与更新时间
    public $timestamps = false;

    /**
     * 获取用户列表
     * @param $limit [数据显示数]
     * @return bool
     */
    public static function getUserList($limit)
    {
        // 查询数据
        $data = self::select(['id', 'username'])->paginate($limit);
        if($data){
            // 返回数组格式
            return $data->toArray();
        }
        return false;
    }

}