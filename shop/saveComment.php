<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include("conn/conn.php");//包含数据库连接文件
$title=$_POST['title'];//获取用户输入的评论标题
$content=$_POST['content'];//获取用户输入的评论内容
$goodsID=$_GET['id'];//获取评论商品的id
$time=date("Y-m-d H:i");//获取当前的日期和时间
session_start();//启动session
$username=$_SESSION['username'];//获取登录用户名
mysqli_query($conn,"insert into tb_pingjia (username,goodsID,title,content,time) values ('$username','$goodsID','$title','$content','$time') ");//执行插入语句
echo "<script>alert('评论发表成功!');</script>";//弹出提示信息
header("location:goodsDetail.php?id=".$goodsID."&action=showcomment");//页面跳转
?>