<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>商品订单</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
@media print{
div{display:none}
}
.style3 {color: #990000}
-->
</style>
</head>
<?php
  include("conn/conn.php");//包含数据库连接文件
  $id=$_GET['id'];//获取订单id值
  $sql=mysqli_query($conn,"select * from tb_order t1,tb_orderInfo t2,tb_shangpin t3 where t1.id=t2.orderID and t2.goodsID=t3.id and t2.id=".$id);//执行查询语句
  $info=mysqli_fetch_array($sql);//将查询结果返回到数组中
?>
<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#FFCF60">
    <td height="20" colspan="2">商品订单</td>
  </tr>
  <tr>
    <td width="448" height="20">订单号：<?php echo $info['orderID'];?></td>
    <td width="152"><div align="right">
  <script>
  function prn(){
      document.all.WebBrowser1.ExecWB(7,1);
  }
  </script>
  <object id='WebBrowser1' width="0" height="0" classid='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2'></object>
	<input type="button" value="打印预览" class="buttoncss" onClick="prn()">&nbsp;
	<input type="button" value="打印" class="buttoncss" onClick="window.print()"></div></td>
  </tr>
  <tr>
    <td height="20" colspan="2">商品列表(如下)：</td>
  </tr>
</table>
<table width="500" height="60" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#666666"><table width="500" border="0" align="center" cellpadding="0" cellspacing="1">
      <tr bgcolor="#FFCF60">
        <td width="153" height="20">商品名称</td>
        <td width="80">市场价</td>
        <td width="80">会员价</td>
        <td width="80">数量</td>
        <td width="101">小计</td>
      </tr>
	  <tr bgcolor="#FFFFFF">
        <td height="20"><?php echo $info['mingcheng'];?></td>
        <td height="20"><?php echo $info['shichangjia'];?></td>
        <td height="20"><?php echo $info['huiyuanjia'];?></td>
        <td height="20"><?php echo $info['number'];?></td>
        <td height="20"><?php echo $info['number']*$info['huiyuanjia'];?></td>
     </tr>
    </table></td>
  </tr>
</table>
<table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="81" height="20">下单人：</td>
    <td colspan="3"><?php echo $info['username'];?></td>
  </tr>
  <tr>
    <td height="20">收货人：</td>
    <td height="20" colspan="3"><?php echo $info['receiveName'];?></td>
  </tr>
  <tr>
    <td height="20">收货人地址：</td>
    <td height="20" colspan="3"><?php echo $info['address'];?></td>
  </tr>
  <tr>
    <td height="20">电&nbsp;&nbsp;话：</td>
    <td height="20" colspan="3"><?php echo $info['tel'];?></td>
  </tr>
  <tr>
    <td height="20" colspan="4"><span class="style3">请您在一周内按您的支付方式进行汇款,汇款时注明您的订单号!汇款后请及时通知我们</span></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td height="20"><div align="center"><input type="button" onClick="window.close()" value="关闭窗口" class="buttoncss"></div></td>
    <td height="20">创建时间：</td>
    <td height="20"><?php echo $info['orderDate'];?></td>
  </tr>
</table>
</body>
</html>
