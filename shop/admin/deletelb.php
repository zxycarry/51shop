<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include("conn/conn.php");//包含数据库连接文件
while(list($name,$value)=each($_POST)){//循环遍历复选框的名称和值
 mysqli_query($conn,"delete from tb_type where id='".$value."'");//执行删除语句
 mysqli_query($conn,"delete from tb_shangpin where typeid='".$value."'");//执行删除语句
 }
 header("location:showleibie.php");//页面跳转
?>