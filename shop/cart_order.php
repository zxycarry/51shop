<?php
	session_start();//启动session
	include("conn/conn.php");//包含数据库连接文件
	if($_SESSION['producelist'] == "" || $_SESSION['quatity'] == ""){//如果session变量的值为空
		echo "<script>alert('您还没有购物!');window.location.href='index.php';</script>";//弹出提示信息
	}
	if (isset($_SESSION['username'])){//如果用户已登录
			$receiveName = $_POST['receiveName'];//获取收货人姓名
			$address = $_POST['address'];//获取收货人地址
			$tel = $_POST['tel'];//获取收货人电话
			$bz = $_POST['bz'];//获取备注信息
			$array=explode("@",$_SESSION['producelist']);//将购物车中各商品id的值分割为数组
			$arrayquatity=explode("@",$_SESSION['quatity']);//将购物车中各商品数量的值分割为数组
			$bnumber = count($array)-1;//获取购物车中有几种商品
			$flag = true;//为变量赋值为true
	//插入订单主表数据
			$sql = mysqli_query($conn,"insert into tb_order(bnumber,username,receiveName,address,tel,bz,orderDate) values(".$bnumber.",'".$_SESSION['username']."','".$receiveName."','".$address."','".$tel."','".$bz."','".date("Y-m-d H:i")."')");//执行插入操作
			$insert_id = mysqli_insert_id($conn);//获取插入记录的id
			if ($insert_id == 0){//如果插入记录失败
				$flag = false;//将变量赋值为false
			}else{
				$orderID = $insert_id;//将插入记录的id赋值为订单号
			}
	//插入订单明细表数据
			$orderStatus = "未作任何处理";//为变量赋值
			for($i=0;$i<count($array)-1;$i++){//循环购物车中的商品
				$id = $array[$i];//获取购买商品id的值
				$num = $arrayquatity[$i];//获取购买商品的数量
				$sql = mysqli_query($conn,"select * from tb_shangpin where id=".$id);//执行查询操作
				$info = mysqli_fetch_array($sql);//将查询结果返回到数组中
				$price = $info['huiyuanjia'];//获取购买商品的会员价
				$sql = mysqli_query($conn,"insert into tb_orderInfo (orderID,goodsID,price,number,orderStatus) values(".$orderID.",".$id.",'".$price."',".$num.",'".$orderStatus."')");//执行插入操作
				$insert_id = mysqli_insert_id($conn);//获取插入记录的id
				if ($insert_id == 0){//如果插入记录失败
		 			$flag = false;//将变量赋值为false
				}
			}
	
			if($flag == false){//如果变量$flag的值为false
				echo "<script>alert('订单无效');history.back();</script>";//弹出提示信息
			}else{
				$_SESSION['producelist']="";//清空购物车中商品id
				$_SESSION['quatity']="";//清空购物车中商品数量
				echo "<script>alert('订单生成，请记住您的订单号[".$orderID."]');window.location.href='index.php';</script>";//弹出提示信息
			}
			mysqli_close($conn);//关闭数据库连接
	}else{
		echo "<script>alert('请先登录后，再进行购物!');window.location.href='index.php';</script>";//弹出提示信息
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">