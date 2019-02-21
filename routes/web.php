<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//一、路由学习开始
//1、基础路由
Route::get('/', function () {
    return view('welcome');
});
Route::get('basic1',function(){
    return "basic route hello";
});
Route::post('basic2',function(){
    return "basic2 post route";
});
//2、多请求路由
Route::match(['get','post'],'multy1',function(){
    return "multy1 -- match指定请求方式";
});
Route::any('multy2',function(){
    return "multy2 --随便请求方式";
});

//3、路由参数
Route::get('id/{id}',function($id){
    return "id值：".$id;
});
Route::get('user/{name?}',function($name='zxm'){//name?表示非必填参数
    return "name：".$name;
})->where('name','[A-Za-z]+');//where添加路由过滤,(只能输入字母)
Route::get('info/{id}/{name?}',function($id, $name='zxm'){//多个参数+过滤
    return "id:".$id."++name：".$name;
})->where(['id'=>'[0-9]+', 'name'=>'[A-Za-z]+']);//多个过滤用数组

//4、路由别名
Route::get('player/center',['as' => 'center', function(){
    return "路由player/member-center的别名center，实际路由为:".Route('center');
}]);
//路由别名的实际意义：同一个路由改变的时候，只需要改路由配置即可，其他代码中用到该路由的地方，只需要使用route('别名')，
//就能自动获取最新的路由，而不需要一个个去改

//5、路由群组
Route::group(['prefix'=>'member'], function(){
    Route::any('boy/center',function(){
        return "member---boy/center";
    });
    Route::any('multy2',function(){
        return "member---multy2";
    });
});//路由群组能够集合同一个模块下的所有路由，统一管理，只需要增加前缀就能访问

//6、路由中输出路由
Route::get('view', function () {
    return view('welcome');
});

//二、控制器路由
//Route::get('member/info', 'MemberController@info');//方式1
//Route::get('member/info', ['uses' => 'MemberController@info']);//方式2
Route::get('member/info', [//控制器路由别名
    'uses' => 'MemberController@info',
    'as' => 'memberinfo'
]);
//路由参数
Route::get('member1/{id}', 'MemberController@info')->where('id','[0-9]+');
Route::get('test1', 'StudentController@test1');//使用DB facade 实现CURD
Route::get('query1', 'StudentController@query1');//使用查询构造器 实现增加
Route::get('update1', 'StudentController@update1');//使用查询构造器 实现查询
Route::get('delete1', 'StudentController@delete1');//使用查询构造器 实现删除
Route::get('select1', 'StudentController@select1');//使用查询构造器 实现查询

Route::get('orm1', 'StudentController@orm1');//Eloquent ORM 查询
Route::get('orm2', 'StudentController@orm2');//Eloquent ORM 新增
Route::get('orm3', 'StudentController@orm3');//Eloquent ORM 修改
Route::get('orm4', 'StudentController@orm4');//Eloquent ORM 删除

Route::get('section1', 'StudentController@section1');//blade 模板继承

Route::get('urlTest', ['as'=> 'url', 'uses'=>'StudentController@urlTest']);//blade 模板中的url

Route::get('student/request1', ['uses'=>'StudentController@request1']);//controller之request

//app/kernel/middlewareGroups=>web=>StartSession.class
Route::group(['middleware'=>'web'], function(){//session start
    Route::any('session1', ['as'=> 'sess1','uses'=>'StudentController@session1']);// session
});

Route::any('response/{id?}', ['uses'=>'StudentController@response']);// 控制器响应：response

//路由中间件
Route::any('activity0', ['uses'=>'StudentController@activity0']);// 展示
Route::group(['middleware'=>'activity'], function(){//中间件判断活动是否开始，否则进入展示页面
    Route::any('activity1', ['uses'=>'StudentController@activity1']);// 活动开始
    Route::any('activity2', ['uses'=>'StudentController@activity2']);// 活动互动
});

//案例开始
Route::get('student/index', ['uses'=>'StudentController@index']);
Route::any('student/create', ['uses'=>'StudentController@create']);
Route::post('student/save', ['uses'=>'StudentController@save']);
Route::any('student/update/{id}', ['uses'=>'StudentController@update'])->where('id','[0-9]+');
Route::get('student/detail/{id}', ['uses'=>'StudentController@detail']);
Route::get('student/delete/{id}', ['uses'=>'StudentController@delete']);

//使用artisan 创建
//php artisan make:auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//文件上传
Route::any('student/upload', ['uses'=>'StudentController@upload']);