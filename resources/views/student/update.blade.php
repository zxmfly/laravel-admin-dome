@extends('common.layouts')

@section('title')
    修改信息
@stop

@section('content')
    @include('common.validate')
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">修改信息</div>
        <div class="panel-body">
            @include('common.from');
        </div>
    </div>
@stop