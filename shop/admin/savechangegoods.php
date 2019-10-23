<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include("conn/conn.php");//包含数据库连接文件
$mingcheng=$_POST['mingcheng'];//为变量赋值
$nian=$_POST['nian'];//为变量赋值
$yue=$_POST['yue'];//为变量赋值
$ri=$_POST['ri'];//为变量赋值
$shichangjia=$_POST['shichangjia'];//为变量赋值
$huiyuanjia=$_POST['huiyuanjia'];//为变量赋值
$typeid=$_POST['typeid'];//为变量赋值
$dengji=$_POST['dengji'];//为变量赋值
$xinghao=$_POST['xinghao'];//为变量赋值
$pinpai=$_POST['pinpai'];//为变量赋值
$tuijian=$_POST['tuijian'];//为变量赋值
$shuliang=$_POST['shuliang'];//为变量赋值
$upfile=$_FILES['upfile']['name'];//为变量赋值

 if(ceil(($huiyuanjia/$shichangjia)*100)<=80)//如果折扣小于等于8折
 {
 
    $tejia=1;//为变量赋值
 }
 else
 {
    $tejia=0;//为变量赋值
 }
if($upfile!="")//如果上传文件不为空
{
$sql=mysqli_query($conn,"select * from tb_shangpin where id=".$_GET['id']."");//执行查询语句
$info=mysqli_fetch_array($sql);//将查询结果返回到数组中
@unlink(substr($info['tupian'],6,(strlen($info['tupian'])-6)));//删除商品对应的图片
}

function getname($exname){//定义获取上传文件路径和名称的函数
   $dir = "upimages/";//定义上传目录
   $i=1;//定义变量
   if(!is_dir($dir)){//如果目录不存在
      mkdir($dir,0777);//创建目录
   }
   
   while(true){//执行while循环
       if(!is_file($dir.$i.".".$exname)){//如果文件不存在
	       $name=$i.".".$exname;//定义上传后的文件名称
	       break;//跳出循环
	   }
	   $i++;//变量自加1
	 }

   return $dir.$name;//返回上传文件路径和名称
}

$exname=strtolower(substr($_FILES['upfile']['name'],(strrpos($_FILES['upfile']['name'],'.')+1)));//获取上传文件后缀名
$uploadfile = getname($exname);//执行函数

move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile);//执行文件上传操作

$uploadfile="admin/".$uploadfile;//定义插入数据表的文件路径

$jianjie=$_POST['jianjie'];//为变量赋值
$addtime=$nian."-".$yue."-".$ri;//连接日期字符串

mysqli_query($conn,"update tb_shangpin set mingcheng='$mingcheng',jianjie='$jianjie',addtime='$addtime',dengji='$dengji',xinghao='$xinghao',tupian='$uploadfile',typeid='$typeid',shichangjia='$shichangjia',huiyuanjia='$huiyuanjia',pinpai='$pinpai',tuijian='$tuijian',shuliang='$shuliang' where id=".$_GET['id']."");//执行更新语句
echo "<script>alert('商品".$mingcheng."修改成功!');history.go(-2);</script>";//弹出提示信息
?>