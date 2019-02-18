<?php
/**
 * User: zengxianmao
 * Date: 2019/2/18
 * Time: 17:47
 */
namespace App\Http\Middleware;
use Closure;

class Activity
{
    //前置操作
    /*
    public function handle($request, Closure $next)
    {
        if (time() < strtotime('2019-02-1')) {
            return redirect('activity0');
        }

        return $next($request);//逻辑在请求执行前
    }*/

    //后置，在响应之后处理
    public function handle($request, Closure $next)
    {
        $response = $next($request);//请求执行逻辑，就是后置操作

        //....逻辑代码
        echo($response);
        echo  '我是后置操作';

        return $response ;

    }
}