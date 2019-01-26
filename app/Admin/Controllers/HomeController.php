<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('主页')
            ->description('欢迎您使用管理后台...')
            ->row(Dashboard::title())//行
            ->row(function (Row $row) {//行内添加多列：

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });

        /*
        // 选填
    $content->header('填写页面头标题');

    // 选填
    $content->description('填写页面描述小标题');

    // 添加面包屑导航 since v1.5.7
    $content->breadcrumb(
        ['text' => '首页', 'url' => '/admin'],
        ['text' => '用户管理', 'url' => '/admin/users'],
        ['text' => '编辑用户']
    );

    // 填充页面body部分，这里可以填入任何可被渲染的对象
    $content->body('hello world');

    // 在body中添加另一段内容
    $content->body('foo bar');

    // `row`是`body`方法的别名
    $content->row('hello world');

    */
    }
}
