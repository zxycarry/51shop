<?php
	header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
  	$page=intval($_POST['page_id']);//获取隐藏域的值
  	include("conn/conn.php");//包含数据库连接文件
  	while(list($value,$name)=each($_POST)){//循环遍历复选框的名称和值
   		$sql = mysqli_query($conn,"select orderID from tb_orderinfo where id='".$value."'");//执行查询语句
		$info = mysqli_fetch_array($sql);//将查询结果返回到数组中
     	mysqli_query($conn,"delete from tb_orderinfo where id='".$value."'");//执行删除语句
	 	$row = array();//定义空数组
	 	$sql1 = mysqli_query($conn,"select orderID from tb_orderinfo");//执行查询语句
		while($info1 = mysqli_fetch_array($sql1)){//将查询结果循环返回到数组中
			$row[]=$info1['orderID'];//将查询到的订单ID值存储在数组中
		}
	 	if(!in_array($info['orderID'],$row)){//如果订单号不在数组中
	 		mysqli_query($conn,"delete from tb_order where id='".$info['orderID']."'");//执行删除语句
	 	}
   	}
 	header("location:lookdd.php?page=".$page."");//页面跳转
?>
