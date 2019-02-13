<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /*
    时间戳 默认情况下，Eloquent 期望 created_at 和 updated_at 已经存在于数据表中，
    如果你不想要这些 Laravel 自动管理的数据列，在模型类中设置 $timestamps 属性为 false：*/
    //protected $timestamps = false;
    
    //指定表名
    protected $table = 'student';//默认情况下，是模型名的复数（Student => students）
    //指定id（主键），默认id、
    protected $primaryKey = 'id';

    //允许批量赋值的字段
    protected $fillable = ['name', 'age', 'sex'];
    //https://laravel-china.org/articles/6096/the-real-meaning-of-laravel-mass-assignment-batch-assignment
    /*
    /
   1、 // 赋值
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();
    / 新建一个用户

   2、 // Mass-Assignment 批量赋值
    为了方便，我们可以使用 $request->all() 获取用户提交的所有表单数据：
    $data = $request->all();   
     // 新建一个用户
    $user->create($data);
    当使用批量，提交生成用户的时候，就要进行过滤，防止一些处理字段直接插表，比如密码，是否管理，是否激活

    */

    //不允许批量赋值的字段
    protected $guarded = [];

    /**
     * 模型日期列的存储格式
     *
     * @var string
     */
    protected $dateFormat = 'U';
    //和下面方式效果一样
    public function getDateFormat(){
        return time();
    }

    /*在不做处理的情况下，模型取出来的数据会自动格式化
    $student = Student::find(1015);
    echo $student->created_at; ===> 2019-02-12 23:17:34
    那么就需要处理：
    public function asDateTime($value){
        return $value;//不做任何处理。
    }
    //laravel-admin 时间转换，提交的时候set需要转成时间戳，查询的时候get需要转成，日期格式（laravel-admin自动转）
        //方法名称应与被转换字段名称相同
        public function setCreatedAtAttribute($value)
        {
            $this->attributes['created_at'] = is_int($value) ? $value : strtotime($value);
        }
        public function setUpdatedAtAttribute($value)
        {
            $this->attributes['updated_at'] = is_int($value) ? $value : strtotime($value);
        }
    */
    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'] ? date('Y-m-d H:i:s', $this->attributes['created_at']) : '';
    }
    public function getUpdatedAtAttribute()
    {
        return $this->attributes['updated_at'] ? date('Y-m-d H:i:s', $this->attributes['updated_at']) : '';
    }
}
