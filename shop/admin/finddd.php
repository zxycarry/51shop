
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>订单查询</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
</head>
<?php
  include("conn/conn.php");//包含数据库连接文件
?>
<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="20" bgcolor="#FFCF60"><div align="center" style="color: #FFFFFF">订单查询</div></td>
        </tr>
        <tr>
          <td height="50" bgcolor="#555555"><table width="550" height="50" border="0" align="center" cellpadding="0" cellspacing="1">
            <tr>
              <td bgcolor="#FFFFFF">
			  <table width="750" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
			   <script language="javascript">
			     function chkinput3(form)
				 {
				   if((form.username.value=="")&&(form.ddh.value==""))
				    {
				      alert("请输入下订单人或订单号");
					  form.username.select();
					  return(false);
				    }
				   return(true);
				    
				 }
			   </script>
                <form name="form3" method="post" action="finddd.php" onSubmit="return chkinput3(this)">
				<tr>
                  <td width="500" height="25"><div align="center">下订单人姓名:<input type="text" name="username" class="inputcss" size="25" >
                    订单号:<input type="text" name="ddh" size="25" class="inputcss" ></div></td>
                  <td height="25">
                    <div align="left">
					    <input type="hidden" value="show_find" name="show_find">
                        <input name="button" type="submit" class="buttoncss" id="button" value="查 找">
                    </div></td>
                </tr>
			    </form>
              </table></td>
            </tr>
          </table></td>
        </tr>
</table>
      <table width="750" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
	  <?php
	    if(isset($_POST['show_find']) && $_POST['show_find']!=""){//如果show_find参数的值不为空
	      $username=trim($_POST['username']);//获取下单人姓名
		  $ddh=trim($_POST['ddh']);//获取订单号
		  if($username==""){//如果用户输入的下单人姓名为空
		       $sql=mysqli_query($conn,"select * from tb_order t1,tb_orderinfo t2,tb_shangpin t3 where t1.id=t2.orderID and t2.goodsID=t3.id and t2.orderID='".$ddh."'");//执行查询语句
		   }
		  elseif($ddh==""){//如果用户输入的订单号为空
		      $sql=mysqli_query($conn,"select * from tb_order t1,tb_orderinfo t2,tb_shangpin t3 where t1.id=t2.orderID and t2.goodsID=t3.id and t1.username='".$username."'");//执行查询语句
		   }
		  else{
		      $sql=mysqli_query($conn,"select * from tb_order t1,tb_orderinfo t2,tb_shangpin t3 where t1.id=t2.orderID and t2.goodsID=t3.id and t1.username='".$username."'and t2.orderID='".$ddh."'");//执行查询语句
		  }
		  $info=mysqli_fetch_array($sql);//将查询结果返回到数组中
		  if($info==false){//如果查询结果为false
		      echo "<div algin='center'>对不起,没有查找到该订单!</div>";    //输出字符串
		   }
		   else{
	  ?>
	  <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="20" bgcolor="#FFCF60"><div align="center" style="color: #FFFFFF">查询结果</div></td>
        </tr>
        <tr>
          <td height="50" bgcolor="#555555"><table width="750" height="50" border="0" align="center" cellpadding="0" cellspacing="1">
            <tr>
              <td width="77" height="25" bgcolor="#FFFFFF"><div align="center">订单号</div></td>
			  <td width="77" bgcolor="#FFFFFF"><div align="center">产品名称</div></td>
              <td width="77" bgcolor="#FFFFFF"><div align="center">下单人</div></td>
              <td width="77" bgcolor="#FFFFFF"><div align="center">收货人</div></td>
              <td width="77" bgcolor="#FFFFFF"><div align="center">收货地址</div></td>
              <td width="77" bgcolor="#FFFFFF"><div align="center">电话</div></td>
              <td width="77" bgcolor="#FFFFFF"><div align="center">下单日期</div></td>
              <td width="77" bgcolor="#FFFFFF"><div align="center">订单状态</div></td>
            </tr>
			<?php
			  do{
			?>
            <tr>
              <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['orderID'];?></div></td>
			  <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['mingcheng'];?></div></td>
              <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['username'];?></div></td>
              <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['receiveName'];?></div></td>
              <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['address'];?></div></td>
              <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['tel'];?></div></td>
              <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['orderDate'];?></div></td>
              <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['orderStatus'];?></div></td>
            </tr>
			<?php
			   }while($info=mysqli_fetch_array($sql));//将查询结果循环返回到数组中
			?>
          </table></td>
        </tr>
      </table>
	    <?php
		   }
		  }
		?>
</body>
</html>
