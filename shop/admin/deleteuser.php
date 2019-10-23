<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include("conn/conn.php");//包含数据库连接文件
while(list($name,$value)=each($_POST))//循环遍历复选框的名称和值
  {
  	$sql=mysqli_query($conn,"select * from tb_user where id=".$value);//执行查询语句
	$info=mysqli_fetch_array($sql);//将查询结果返回到数组中
    mysqli_query($conn,"delete from tb_user where id=".$value); //执行删除语句
	mysqli_query($conn,"delete from tb_pingjia where username='".$info['name']."'");//执行删除语句
  }
header("location:edituser.php");//页面跳转
?>