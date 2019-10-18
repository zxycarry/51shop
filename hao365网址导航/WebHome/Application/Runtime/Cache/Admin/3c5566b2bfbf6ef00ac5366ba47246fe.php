<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>hao365网址导航 - 登录</title>
    <link rel="stylesheet" href="/WebHome/Public/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/WebHome/Public/font-awesome/css/font-awesome.css" >
    <link rel="stylesheet" href="/WebHome/Public/css/animate.css" >
    <link rel="stylesheet" href="/WebHome/Public/css/admin-style.css?v=2.2.0" >
    <script src="/WebHome/Public/js/jquery-2.1.1.min.js"></script>
    <script src="/WebHome/Public/static/layer/layer.js"></script>
</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">DB</h1>
        </div>
        <h3>欢迎使用hao365网址导航后台</h3>
        <form id="form" name="form" method="post" action="<?php echo U('checkLogin');?>"  autocomplete="off">
            <div class="form-group">
                <input name="username" type="text"  class="form-control" placeholder="用户名"  autocomplete="off">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="密码" autocomplete="off">
            </div>
            <div class="form-group login">
                <span>验证码</span>
                <input name="code" style="width:110px" type="text" id="code"/>
                <a> <img class="reloadverify" src="<?php echo U('Admin/Public/verify');?>"  id="imgcode" onClick="this.src=this.src+'?'+Math.random()"></a>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
        </form>
    </div>
</div>
<!--ajax异步提交-->
<script>
    $('form').submit(function(){
        var username  = $("input[name='username']").val();
        var password  = $("input[name='password']").val();
        var code = $("#code").val();
        if(!username){
            layer.msg('用户名不能为空！',{time:2000});
        }
        if(!password){
            layer.msg('密码不能为空！',{time:2000});
        }
        if(!code){
            layer.msg('验证码不能为空！',{time:2000});
        }
        var url  = $(this).attr('action');
        $.ajax({
            type:"post",
            url :url,//发送请求的地址：checkLogin方法
            data:{username:username,password:password,code:code},
            success: function(res){
                if(res.status){
                    layer.msg(res.message,{time:1000},function(){
                        window.location.href = "<?php echo U('Index/index');?>";
                    });
                }else{
                    //刷新验证码
                    $(".reloadverify").click();
                    layer.msg(res.message,{time:2000});
                }
            }
        });
        return false;
    });
</script>
</body>
</html>