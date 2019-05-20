<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>B2C平台-@yield('title')</title>
    <link rel="stylesheet" href="{{URL::asset('/layui/css/layui.css')}}">
    <script src="{{URL::asset('/layui/layui.js')}}"></script>
    <script src="{{URL::asset('/js/jquery-1.12.4.min.js')}}"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    @section('header')
    <div class="layui-header">
        <a href="/index"><div class="layui-logo">layui 后台布局</div></a>
        <!-- 头部区域（可配合layui已有的水平导航） -->

        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    贤心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>
    </div>
    @show
    @section('left')
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item ">
                    <a class="" href="javascript:;">管理员管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/showvcode">管理员添加</a></dd>
                        <dd><a href="/orderlist">管理员展示</a></dd>
                        <dd><a href="javascript:;">修改密码</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">节点权限管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">节点添加</a></dd>
                        <dd><a href="javascript:;">节点展示</a></dd>
                        <dd><a href="javascript:;">添加角色</a></dd>
                        <dd><a href="javascript:;">角色展示</a></dd>
                        <dd><a href="javascript:;">角色赋权</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">分类管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/category/add">分类添加</a></dd>
                        <dd><a href="/category/list">分类展示</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">品牌管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/version">品牌添加</a></dd>
                        <dd><a href="javascript:;">品牌展示</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">商品属性管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/attr/basic/add">基本属性</a></dd>
                        <dd><a href="/attr/sale/add">销售属性</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
    @show
    @section('right')
    <div class="layui-body" style="margin: 40px 0px 0px 40px;">
        <!-- 内容主体区域 -->
        @yield('content')
    </div>
    @show
    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
@section('footer')

@show
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>
