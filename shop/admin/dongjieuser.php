<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include("conn/conn.php");//包含数据库连接文件
$id=$_GET['id'];//获取用户id
$sql=mysqli_query($conn,"select * from tb_user where id=".$id."");//执行查询语句
$info=mysqli_fetch_array($sql);//将查询结果返回到数组中
if($info['dongjie']==0)//如果查询结果中dongjie字段的值为0
   {
     mysqli_query($conn,"update tb_user set dongjie=1 where id='".$id."'");//将dongjie字段的值设置为1
   }
 else
  {
     mysqli_query($conn,"update tb_user set dongjie=0 where id='".$id."'"); //将dongjie字段的值设置为0
  }
 header("location:lookuserinfo.php?id=".$id."");   //页面跳转
?>