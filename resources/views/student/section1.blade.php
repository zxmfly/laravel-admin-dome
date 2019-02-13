@extends('layout') <!-- 模板继承 根目录直接指向view,其他目录'member.info' -->

@section('header') <!-- 重写指定视图模块 -->
    父模板内容:@parent
    <br/>
    子模板重写内容header
@stop

@section('sidebar')
    @parent
    <br/>
    sidebar
@stop

@section('content') <!-- 重写指定视图模块,yield模块，只能覆盖模板 -->
    子模板内容全部覆盖显示content
@stop