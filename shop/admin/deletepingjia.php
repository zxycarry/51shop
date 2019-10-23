<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include("conn/conn.php");//包含数据库连接文件
while(list($name,$value)=each($_POST))//循环遍历复选框的名称和值
 {
     $id=$value;//将复选框的值赋值给变量$id
     mysqli_query($conn,"delete from tb_pingjia where id=".$id."");//执行删除语句
 
 }
header("location:editpinglun.php");//页面跳转
?>