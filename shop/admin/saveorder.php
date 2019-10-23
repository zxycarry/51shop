<?php  
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
$ysk=isset($_POST['ysk'])?$_POST['ysk']:"";//为变量赋值
$yfh=isset($_POST['yfh'])?$_POST['yfh']:"";//为变量赋值
$ysh=isset($_POST['ysh'])?$_POST['ysh']:"";//为变量赋值
$orderStatus="";//初始化变量
if($ysk!=""){//如果变量值不为空
   $orderStatus.=$ysk."&nbsp;";//连接字符串
 }
if($yfh!=""){//如果变量值不为空
   $orderStatus.=$yfh."&nbsp;";//连接字符串
 }
 if($ysh!=""){//如果变量值不为空
   $orderStatus.=$ysh."&nbsp;";//连接字符串
 }
 if($ysk=="" && $yfh=="" && $ysh==""){//如果3个变量的值都为空
    echo "<script>alert('请选择处理状态!');history.back();</script>";//弹出提示信息
	exit;//退出程序
  }
 include("conn/conn.php");//包含数据库连接文件
 $sql=mysqli_query($conn,"select * from tb_orderinfo where id='".$_GET['id']."'");//执行查询语句
 $info=mysqli_fetch_array($sql);//将查询结果返回到数组中
 if($info['orderStatus'] == "未作任何处理"){//如果查询结果中字段orderStatus的值为"未作任何处理"
 	$num = $info['number'];//为变量赋值
	$goodsID = $info['goodsID'];//为变量赋值
     mysqli_query($conn,"update tb_shangpin set cishu=cishu+'".$num."' ,shuliang=shuliang-'".$num."' where id='".$goodsID."'");//执行更新语句
  }
 mysqli_query($conn,"update tb_orderinfo set orderStatus='".$orderStatus."'where id='".$_GET['id']."'");//执行更新语句
 header("location:lookdd.php");//页面跳转
?>