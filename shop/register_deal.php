<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
session_start();//启动session
include("conn/conn.php");//包含数据库连接文件
$username=$_POST['username'];//获取用户输入的用户名
$pwd1=$_POST['pwd'];//获取用户输入的密码
$pwd=md5($_POST['pwd']);//获取用户输入的密码（加密后）
$email=$_POST['email'];//获取用户输入的email地址
$truename=$_POST['truename'];//获取用户输入的真实姓名
$tel=$_POST['tel']; //获取用户输入的电话
$regtime=date("Y-m-d");//获取当前的日期
$dongjie=0;//初始化变量
$sql=mysqli_query($conn,"select * from tb_user where name='".$username."'");//执行查询操作
$info=mysqli_fetch_array($sql);//将查询结果返回到数组中
if($info==true)//如果查询结果为真，即用户名已存在
 {
   echo "<script>alert('该昵称已经存在!');history.back();</script>";//弹出提示信息
   exit;//退出程序
 }
 else
 {  
    mysqli_query($conn,"insert into tb_user (name,pwd,dongjie,email,truename,tel,regtime,pwd1) values ('$username','$pwd','$dongjie','$email','$truename','$tel','$regtime','$pwd1')");//执行插入语句
    echo "<script>alert('恭喜，注册成功!');window.location='index.php';</script>";//弹出提示信息
 }
?>
