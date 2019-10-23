<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
 include("conn/conn.php");//包含数据库连接文件
 while(list($name,$value)=each($_POST))//循环遍历复选框的名称和值
  {
      $sql=mysqli_query($conn,"select tupian from tb_shangpin where id='".$value."'");//执行查询语句
	  $info=mysqli_fetch_array($sql);//将查询结果返回到数组中
	  if($info['tupian']!="")//如果查询结果中tupian字段的值不为空
	  {
	     @unlink(substr($info['tupian'],6,(strlen($info['tupian'])-6)));//删除商品对应的图片
		
	  }
	  $sql1=mysqli_query($conn,"select * from tb_orderinfo ");//执行查询语句
	  while($info1=mysqli_fetch_array($sql1)){//将查询结果循环返回到数组中
	        if($info1['goodsID']==$value){//如果订单信息表中goodsID字段的值等于商品的id值
				$row = array();//定义空数组
				$orderID = $info1['orderID'];//获取订单信息表中orderID字段的值
			   mysqli_query($conn,"delete from tb_orderinfo where id='".$info1['id']."'");//执行删除操作
			   $sql2=mysqli_query($conn,"select orderID from tb_orderinfo");//执行查询操作
			   while($info2=mysqli_fetch_array($sql2)){//将查询结果循环返回到数组中
			   	$row[] = $info2['orderID'];//将查询结果中orderID字段的值存储在数组中
			   }
			   if(!in_array($orderID,$row)){//如果$orderID的值不在数组$row中
			   	mysqli_query($conn,"delete from tb_order where id='".$orderID."'");//执行删除操作
			   }
			 }
	  }
      mysqli_query($conn,"delete from tb_shangpin where id='".$value."'");//执行删除操作
	  mysqli_query($conn,"delete from tb_pingjia where goodsID='".$value."'");//执行删除操作
  }
 header("location:editgoods.php"); //页面跳转
?>