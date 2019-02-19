@extends('common.layouts')

@section('title')
    学生列表
@stop


@section('content')
    <!-- 消息 -->
    @include('common.msg')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">学生列表</div>
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>年龄</th>
                <th>性别</th>
                <th>添加时间</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>

            @foreach($students as $student)
                <tr>
                    <th scope="row">{{$student->id}}</th>
                    <td>{{$student->name}}</td>
                    <td>{{$student->age}}</td>
                    <td>{{$student->sex == 1 ? '男' : '女'}}</td>
                    <td>{{$student->created_at}}</td>
                    <td>
                        <a href="">详情</a>
                        <a href="">修改</a>
                        <a href="">删除</a>
                    </td>
                </tr>
                {{--var_dump($student)--}}
                {{--$student['name']--}}
            @endforeach

            </tbody>
        </table>
    </div>

    <!-- 分页 -->
    <div class="pull-right">
        {{ $students->render() }}
    </div>

@stop