<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
$leibie=$_POST['leibie'];//获取参数leibie的值
include("conn/conn.php");//包含数据库连接文件
$sql=mysqli_query($conn,"select * from tb_type where typename='".$leibie."'");//执行查询语句
$info=mysqli_fetch_array($sql);//将查询结果返回到数组中
if($info!=false){//如果查询结果为真
 echo"<script>alert('该类别已经存在!');window.location.href='addleibie.php';</script>";//弹出提示信息
exit;//退出程序
}
mysqli_query($conn,"insert into tb_type(typename) values ('$leibie')");//执行插入语句
echo"<script>alert('新类别添加成功!');window.location.href='addleibie.php';</script>";//弹出提示信息
?>