<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
        // 不更新此update_at字段
//    const UPDATED_AT = null;
        //指定表明
    protected $table = 'student';
    //指定id
    protected $primaryKey = 'id';

    //允许批量赋值的字段
    protected $fillable = ['name', 'age', 'sex'];

    //不允许批量赋值的字段
    protected $guarded = [];

//laravel-admin 时间转换，提交的时候set需要转成时间戳，查询的时候get需要转成，日期格式（laravel-admin自动转）
    //方法名称应与被转换字段名称相同
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = is_int($value) ? $value : strtotime($value);
    }
 
    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'] ? date('Y-m-d H:i:s', $this->attributes['created_at']) : '';
    }

    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = is_int($value) ? $value : strtotime($value);
    }
 
    public function getUpdatedAtAttribute()
    {
        return $this->attributes['updated_at'] ? date('Y-m-d H:i:s', $this->attributes['updated_at']) : '';
    }

}
