@extends('common.layouts')

@section('title')
    新增列表
@stop

@section('content')
    @include('common.validate')
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">新增学生</div>
        <div class="panel-body">
            @include('common.from');
        </div>
    </div>
@stop