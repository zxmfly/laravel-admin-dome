<?php

namespace App\Admin\Controllers;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class MovieController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('电影')
            ->description('电影列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('详细')
            ->description('明细')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('修改')
            ->description('修改单条信息')
            ->body($this->form('edit')->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('新增')
            ->description('新增电影信息')
            ->body($this->form('create'));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Movie);
        $grid->id('ID');
        $grid->title('标题');
        $grid->director('导演');
        $grid->describe('打分');
        $grid->rate('打分');
        $grid->released('上映?')->display(function ($released) {
            return $released ? '是' : '否';
        });
        $grid->release_at('发行时间');
        $grid->created_at('创建时间');
        $grid->updated_at('修改时间');

        // filter($callback)方法用来设置表格的简单搜索框
        $grid->filter(function ($filter) {
            // 设置created_at字段的范围查询
            $filter->between('created_at', 'Created Time')->datetime();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Movie::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($type = '')
    {
        $form = new Form(new Movie);


        // 显示记录id
        $form->display('id', 'ID');

        // 添加text类型的input框
        $form->text('title', '电影标题');

        $directors = [
            'John'  => 1,
            'Smith' => 2,
            'Kate'  => 3,
        ];

        $form->select('director', '导演')->options($directors);

        // 添加describe的textarea输入框
        $form->textarea('describe', '简介');

        // 数字输入框
        $form->number('rate', '打分');

        // 添加开关操作
        $form->switch('released', '发布？');

        // 添加日期时间选择框
        $form->datetime('release_at', '发布时间');

        // 两个时间显示
        $form->display('created_at', '创建时间');

        if($type != 'edit'){
            $form->display('updated_at', '修改时间');
        }

        return $form;
    }
}
