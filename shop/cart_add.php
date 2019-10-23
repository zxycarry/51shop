<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
session_start();//启动session
include("conn/conn.php");//包含数据库连接文件
if(!isset($_SESSION['username'])){//如果用户未登录
  echo "<script>alert('请先登录后购物!');history.back();</script>"; //弹出提示信息
  exit;//退出程序
 }
$id=strval($_GET['goodsID']);//获取购买商品的id值
$num=strval($_GET['num']);//获取购买商品的数量
$sql=mysqli_query($conn,"select * from tb_shangpin where id='".$id."'");//执行查询语句 
$info=mysqli_fetch_array($sql);//将查询结果返回到数组中
if($info['shuliang']<=0){//如果商品数量小于等于0
   echo "<script>alert('该商品已经售完!');history.back();</script>";//弹出提示信息
   exit;//退出程序
 }
$array=explode("@",isset($_SESSION['producelist'])?$_SESSION['producelist']:"");//将购物车中各商品id的值分割为数组
if(count($array)==1){//如果购物车中商品为空
  	$_SESSION['producelist']=$_SESSION['producelist'].$id."@";//将购买的商品id添加到session变量中
  	$_SESSION['quatity']=$_SESSION['quatity'].$num."@";//将购买的商品数量添加到session变量中
}
if(count($array)!=1){//如果购物车中商品不为空
	if(!in_array($id,$array)){//如果购买商品的id不在商品数组中
	    $_SESSION['producelist']=$_SESSION['producelist'].$id."@";//将购买的商品id添加到session变量中
  		$_SESSION['quatity']=$_SESSION['quatity'].$num."@";//将购买的商品数量添加到session变量中
	}else{
	  	$arrayquatity=explode("@",$_SESSION['quatity']);//将购物车中各商品数量的值分割为数组
		$key=array_search($id,$array);//获取购买商品的id在商品数组中的键值
		$arrayquatity[$key]=$arrayquatity[$key]+$num;//将购物车中该商品的数量进行更新
		$_SESSION['quatity']=implode("@",$arrayquatity);//将购物车中各商品数量的值重新合成为字符串
	}
}
header("location:cart_see.php");//页面跳转
?> 