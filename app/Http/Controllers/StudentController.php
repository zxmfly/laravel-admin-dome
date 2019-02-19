<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//DB façade，没有使用Eloquent ORM -> 即模型
use Illuminate\Support\Facades\Session;

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

    //ORM
    public function orm1(){
        //返回的是模型的对象
        //$all = Student::all();//查询全部记录
        //$student = Student::find(1005);//查询一个记录by id
        //$student = Student::findOrFail(1005);//查询一个记录,不存在就报错
        //$students = Student::get();//查询所有数据
        //$students = Student::first();//查询第一条
        $students = Student::where('id','>','1005') //条件查询
                    ->orderBy('age', 'desc')
                    ->get();//first()

        echo '<pre/>';
        //当我们PHP调试的时候，用var_dump 或 print_r打印json数据或array数组时，
        //html页面没有换行显示，看到的内容一大堆，不好定位。
        //输出前添加 <pre>，便可以自动格式化换行显示。
        Student::chunk(2, function($students){//一次查询2条记录
            var_dump($students);
        });

        //聚合函数
        $count = Student::count();
        $max = Student::where('id', '<', '1100')->max('age');

        //dump($students);
    }

    //orm 新增数据
    public function orm2(){
        //使用模型新增
        //$student = new Student();
        //$student->name = '叶圆圆';
        //$student->age = 31;
        //$student->sex = 2;//数据赋值
        //$student->save();//将上面赋值的数据直接保存到数据库

        //$student = Student::find(1015);
        //echo $student->created_at;//自动格式化时间，需要在模型里面设置

        //使用模型的create方法 ====>涉及到模型的批量新增数据
        //$student = Student::create(
        //    ['name'=>'赵海', 'age'=>55, 'sex'=>1]
        //);

        //firstOrCreate()以属性查找数据，没有就新增
//        $student = Student::firstOrCreate(
//            ['name'=>'jj','age'=>3,'sex'=>1]
//        );

        //firstOrNew()以属性查找数据，没有新建新的实例，需要存就执行save();
        $student = Student::firstOrNew(
            ['name'=>'zjj','age'=>3,'sex'=>1]
        );
        $student->save();

        dump($student);
    }

    public function orm3(){
        //通过模型修改数据
        /*
        $student = Student::find(1005);
        $student->name = $student->name.'_改';
        $bool = $student->save();
        */
        //结合查询语句，批量更新 (返回更新的行数)
        $student = Student::where('id', '>', '1015')->update(
            ['age'=>40]
        );
        dump($student);
    }

    public function orm4(){
        //通过模型删除
//        $student = Student::find(1005);
//        $bool = $student->delete();
//        dump($student);
        //通过主键删除(返回删除数量)
        //$num = Student::destroy(1011);//1|1,2,3,4|[1,2,3,4]

        //通过条件批量删除数据
        $num = Student::where('id', '>', '1010')->delete();
        dump($num);


    }

    //模板继承
    public function section1(){
        $name = '增花园';
        $array = ['zxm','增花园'];
        $students = Student::get();
        return view('student.section1', [
            'name' => $name,
            'arr' => $array,
            'students' => $students
        ]);
    }

    public function urlTest(){
        return 'urlTest:'.route('url');
    }

    
    public function request1(Request $request){
        //1\取值
        //dump($request->input('name'));//取name参数
        //dump($request->input('name','zxm'));//取name参数，没有的情况下默认zxm
        if($request->has('name')){
           echo $request->input('name');
        }else{
            echo '缺少name参数';
        }

        dump($request->all());//获取所有参数

        //判断请求类型
        echo $request->method();//获取当前url的请求方式

        echo $request->isMethod('get') ? '是get' : '否';

        dump($request->ajax());//判断是否是ajax请求

        dump($request->is('student/*'));//url规则是否满足

        //获取当前的url
        echo $request->url();

    }

    public function session1(Request $request){
        //获取重定向快闪数据 response
        $rs = Session::get('msg', 'default');
        $back = Session::get('abc') ?? 1;
        if($rs == 'back'){
            Session::put('abc', 1+$back);
            return redirect()->back();//返回上级页面
        }else{
            echo $rs;
            return ;
        }

        //1、http:request()->session();
        $request->session()->put('key1', 'value1');//存储一个key1
        $v1 = $request->session()->get('key1');//获取

        //2\session的辅助函数：session()
        session()->put('key2', 'value2');
        session()->get('key2');

        //3\Session类
        Session::put('key3', 'value3');
        Session::get('key3');
        Session::get('key4', 'default');

        //session 数组形式存值
        Session::put(['key5' => 'value5']);

        //把数据存入session数组中
        Session::push('student', 'zxm1');
        Session::push('student', 'zxm2');
        $student = Session::get('student');

        //把session数据取完后。立即注销session
        $student = Session::pull('student', 'default');

        //取出所有session
        $student = Session::all();

        //判断某个key是否存在
        if(Session::all('student')){
            echo '不存在student数据';
        }else{
            dump(Session::all());
        }

        //删除某个key
        Session::forget('key1');

        //清空所有
        Session::flush();

        dump(Session::all());

        //暂存：第一次访问存在，第二次就不存在了
        Session::flash('key-flash', 'value-flash');
        echo Session::get('key-flash');

    }


    /**
     * 响应 Response
     * 类型：字符串，视图，json,重定向
     */
    public function response($id=''){
        //响应 json
        $rs = [
            'code'  => 0,
            'msg'   => 'success',
            'data'  => 'zxm'
        ];
        //return response()->json($rs);

        //重定向
        //return redirect('session1');

        //重定向传数据（z暂存数据）
        //return redirect('session1')->with('msg', '我是快闪数据，刷新我就不存在了');

        //action(),方法和控制器
        //return redirect()->action('StudentController@session1')->with('msg', '我是快闪数据，刷新我就不存在了');

        //route()，路由别名
        $msg = $id ? $id : '我是快闪数据，刷新我就不存在了';
        if(empty($id)){
            Session::forget('abc');
        }
        $rs = Session::get('abc');
        if(empty($rs))
            return redirect()->route('sess1')->with('msg', $msg);
        else{
            echo '重定向，返回并停止'.$rs;
        }
        //back()， 返回上级页面
        //return redirect()->back();

    }

    //中间件使用
    /*
     * 新建中间件类： App\Http\Middleware; Activity::class
     * 注册中间件：App\Http\Kernel;$routeMiddleware[];只需要注册路由中间件即可
     * */
    public function activity0(){
        echo "活动即将开启，敬请期待";
    }
    public function activity1(){
        echo "活动开始，感谢您的而参与1";
    }
    public function activity2(){
        echo "互动开始，活动互动进行中2";
    }


    //案例练习
    public function index(){
        //$students = Student::get();
        //分页显示 //User::where('votes', '>', 100)->simplePaginate(15);
        $students = Student::paginate(5);// DB::table('users')->paginate(15);
        return view('student.index',[
            'students' => $students,
        ]);
    }

}
