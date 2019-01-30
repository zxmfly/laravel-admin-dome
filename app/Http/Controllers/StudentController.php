<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{   public $db = 'student';
    //使用DB facade 实现CURD ==》原始查找，使用原始的mysql语句操作数据库
    public function test1(){
        //DB::insert('insert into student (`name`,`age`,`sex`) VALUES (?,?,?)',['zxm2',20,1]);//返回bool值

        //$num = DB::update('update student set `age` = ? where `name` = ?', [20, 'zxm']);//返回被修改的行数

        //$num = DB::delete('delete from student where `name` = ?', ['zxm']);//返回删除的行数

        $students = DB::select('select * from student');
        dd($students);
    }
    //使用查询构造器操作数据库
    public function query1(){
//        $bool = DB::table('student')->insert([//返回布尔值
//            'name' => 'huayuan2',
//            'age' => 30,
//            'sex' => 1
//        ]);

//        $auto_id = DB::table('student')->insertGetId([//返回自增ID
//            'name' => 'huayuan3',
//            'age' => 31,
//            'sex' => 1
//        ]);

        $auto_id = DB::table('student')->insert([//批量新增数据
            ['name' => 'yy', 'age' => 18, 'sex' => 2],
            ['name' => 'yy1', 'age' => 19, 'sex' => 2],
            ['name' => 'yy2', 'age' => 20, 'sex' => 2],
        ]);

        dump($auto_id);
    }

    public function update1(){
        //更新为指定内容
        //$num = DB::table($this->db)->where('age','>=',30)->update(['age' => 40]);//返回修改行数
        //自增和自减
        //$num = DB::table($this->db)->increment('age');//默认自增1
        //$num = DB::table($this->db)->increment('age', 3);//自增3
        //$num = DB::table($this->db)->where('age','>=',30)->decrement('age', 3);//自减3
        //$num = DB::table($this->db)->decrement('age');//自减1

        $num = DB::table($this->db)->where('id',1013)->decrement('age',2, ['name'=>'zxmyyy']);//自减1,并修改名称
        dump($num);
    }

    public function delete1(){
        $num = DB::table($this->db)->where('id',1013)->delete();//返回删除行数
        //->where('id','>=', 1013)

        //DB::table($this->db)->truncate();//直接删除整表，一般不建议使用（自增id不会初始化）
        dump($num);
    }

    public function select1(){
        //get() 获取全部数据
        //$students = DB::table($this->db)->get();
        //first() 获取结果集中的第一条数据
        //$students = DB::table($this->db)->orderBy('id', 'desc')->first();
        //where 条件
        //$students = DB::table($this->db)->where('id', '>', '1010')->get();
        //$students = DB::table($this->db)->whereRaw('id > ? and age > ?', [1005, 25])->get();//多个查询条件
        //pluck 取单个字段的值(lists 已经废弃)
        $students = DB::table($this->db)->pluck('name');//pluck($column, $key = null);第二个参数为指定下标字段
        //select 指定查询字段
        $students = DB::table($this->db)->select('name','age')->get();
        //chunk 分段获取，必须使用排序
        echo '<pre/>';
        /*php 打印格式化显示利器 <pre>
        当我们PHP调试的时候，用var_dump 或 print_r打印json数据或array数组时，html页面没有换行显示，看到的内容一大堆，不好定位。
        输出前添加 <pre>，便可以自动格式化换行显示。*/
        DB::table($this->db)->orderBy('id','asc')->chunk(2, function($students){
            var_dump($students);
            return false;//终止查询，这里只查了一次,实际应用在条件判断中
        });
        dump($students);

        //聚合查询
        $count = DB::table($this->db)->count();
        $max = DB::table($this->db)->max('age');
        $min = DB::table($this->db)->min('age');
        $avg = DB::table($this->db)->avg('age');
        $sum = DB::table($this->db)->sum('age');

    }




}
