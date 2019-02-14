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
    <!-- 1\模板中输出php变量 -->
    <p>{{$name}}</p>
    <!-- 2\模板中调用php代码 -->
    <p>{{time()}}</p>
    <p>{{date('Y-m-d H:i:s')}}</p>
    <p>{{in_array($name, $arr)? '存在' : '不存在'}}</p>
    <p>{{var_dump($arr)}}</p>
    <p>{{isset($name) ? $name : '默认值'}} -- 和下面的短语法一样</p>
    <p>{{ $name or 'default' }}</p>

    <!-- 3、原样输出 -->

    <p> @{{ $name }} == {{$name}}</p>

    <!-- 4、模板中的注释，页面不可见，代码可见 -->
    {{-- 模板中的注释 --}}

    @include('student.common', ['msg' => '传递参数']) {{-- 和php输出值到模板一样 --}}

<!-- 流程控制 -->
    @if( $name == 'zxm') {{--@if( in_array($name, $arr)) 可以使用直接调用php函数--}}
        我是曾宪茂
    @elseif( $name == '增花园' )
        我是曾华源
    @else
        我是谁？
    @endif

    @unless( $name == '增花' ) <!-- 相当于if true 的取反，上述表达式为真 -->
        我是谁？
    @endunless
    <br/>
    @for($i = 1; $i < 5; $i++)
       {{$i}}
    @endfor
    <br/>

    @foreach($students as $student)
        {{--var_dump($student)--}}
        {{--$student['name']--}}
        {{$student->name}}
    @endforeach

    @forelse($students as $student)
        {{$student->age}}
    @empty {{-- 这里注意用empty --}}
        没数据
    @endforelse

    <!-- 模板中的url -->
    <a href="{{url('urlTest')}}">url('路由的真实名字')</a>
    <br/>
    <a href="{{action('StudentController@urlTest')}}">action('控制器@方法名')</a>
    <br/>
    <a href="{{route('url')}}">route('路由别名')</a>

@stop