<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式  
$n0=$_POST['n0'];//为变量赋值
$n1=$_POST['n1'];//为变量赋值
$p0=md5($_POST['p0']);//为变量赋值
$p1=trim($_POST['p1']);//为变量赋值
include("conn/conn.php");//包含数据库连接文件

  $sql=mysqli_query($conn,"select * from tb_admin where name='".$n0."'");//执行查询语句
  $info=mysqli_fetch_array($sql);//将查询结果返回到数组中
  if($info==false)//如果查询结果为false
   {
     echo "<script>alert('不存在此用户!');history.back();</script>";//弹出提示信息
     exit;//退出程序
   }
   else
   {
    if($info['pwd']==$p0)//如果用户输入密码正确
	 {
	  if($n1!="")//如果变量$n1的值不为空
	   {
	   
	  mysqli_query($conn,"update tb_admin set name='".$n1."'where id=".$info['id']." ");//执行更新语句
	  }
	  if($p1!="")//如果变量$p1的值不为空
	   {
	    $p1=md5($p1);//为变量赋值
	     mysqli_query($conn,"update tb_admin set pwd='".$p1."' where id=".$info['id']."");//执行更新语句
	   
	   }
	 }
	 else
	 {
	   echo "<script>alert('原密码输入错误!');history.back();</script>";//弹出提示信息
       exit;//退出程序
	 }
   }


echo "<script>alert('更改成功!');history.back();</script>";//弹出提示信息




?>