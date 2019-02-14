
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>轻松学会Laravel - @yield('title')</title>
<style>
    .header {
        width: 1000px;
        height: 150px;
        margin:0 auto;
        background: #f5f5f5;
        border: 1px solid #ddd;
    }
    .main {
        width: 1000px;
        height: 500px;
        margin:0 auto;
        margin-top: 5px;
        clear: both;
    }
    .main .sidebar {
        float: left;
        width: 20%;
        height: inherit;
        background: #f5f5f5;
        border: 1px solid #ddd;
    }
    .main .content {
        float: right;
        width: 79%;
        height: inherit;
        background: #f5f5f5;
        border: 1px solid #ddd;
    }
    .footer {
        width: 1000px;
        height: 150px;
        margin:0 auto;
        margin-top: 5px;
        background: #f5f5f5;
        border: 1px solid #ddd;
    }
</style>
</head>
<body>
    <div class="header">
        @section('header')
        头部
        @show
    </div>

    <div class="main">
        <div class="sidebar">
            @section('sidebar')<!-- section 定义一个视图片段 -->
            侧边栏
            @show
        </div>

        <div class="content">
            @yield('content', '主要内容区域')<!-- yield 用来展示某个指定section所表达的内容，可以想象成一个占位符，用子模板来实现它 -->
                <!-- section 和 yield 最大的区别是  yield是不可扩展的，它在布局中只声明了一个视图片段，没有实际内容
                section 即声明了一个视图片段，也可以有内容，还可以被子模板扩展
                -->
        </div>
    </div>

    <div class="footer">
        @section('footer')
        底部
        @show
    </div>
</body>
</html>