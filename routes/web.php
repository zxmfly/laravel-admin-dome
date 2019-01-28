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
















