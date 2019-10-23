<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>查看订单</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>
<body topmargin="0" leftmargin="0" bottommargin="0">
<?php
    include("conn/conn.php");//包含数据库连接文件
?>
 <?php
	   $sql=mysqli_query($conn,"select count(*) as total from tb_orderinfo ");//执行查询语句
	   $info=mysqli_fetch_array($sql);//将查询结果返回到数组中
	   $total=$info['total'];//获取查询结果总记录数
	   if($total==0){//如果查询结果为空
	     echo "本站暂无订单!";//输出字符串
	   }
	   else{
	       $pagesize=10;//每页显示10条记录
		   if ($total<=$pagesize){//如果总记录数小于等于10
		      $pagecount=1;//总页数为1
			} 
			if(($total%$pagesize)!=0){//如果总记录数除以10的余数不为0
			   $pagecount=intval($total/$pagesize)+1;//定义总页数
			}else{
			   $pagecount=$total/$pagesize;//定义总页数
			}
			if(!isset($_GET['page'])){//如果地址栏中page参数没被设置
			    $page=1;//定义当前页数
			
			}else{
			    $page=intval($_GET['page']);//定义当前页数
			}
           $sql1=mysqli_query($conn,"select t1.orderDate,t2.id,t2.orderID,t2.number,t2.orderStatus,t3.mingcheng,t3.huiyuanjia from tb_order t1,tb_orderinfo t2,tb_shangpin t3 where t1.id=t2.orderID and t2.goodsID=t3.id order by orderDate desc limit ".($page-1)*$pagesize.",$pagesize");//执行查询语句
		   $info1=mysqli_fetch_array($sql1);//将查询结果返回到数组中
?>
<form name="form1" method="post" action="deletedd.php">   
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20" bgcolor="#FFCF60"><div align="center" class="style1">查看订单 </div></td>
  </tr>
  <tr>
    <td height="40" bgcolor="#666666"><table width="750" height="44" border="0" align="center" cellpadding="0" cellspacing="1">
	  <tr>
        <td width="51" height="20" bgcolor="#FFFFFF"><div align="center">订单号</div></td>
        <td width="99" bgcolor="#FFFFFF"><div align="center">产品名称</div></td>
        <td width="60" bgcolor="#FFFFFF"><div align="center">购买数量</div></td>
        <td width="70" bgcolor="#FFFFFF"><div align="center">单价</div></td>
        <td width="78" bgcolor="#FFFFFF"><div align="center">消费金额</div></td>
        <td width="117" bgcolor="#FFFFFF"><div align="center">下单日期</div></td>
        <td width="140" bgcolor="#FFFFFF"><div align="center">订单状态</div></td>
        <td width="135" bgcolor="#FFFFFF"><div align="center">操作</div></td>
	  </tr>
	  <?php
		    do{
	  ?>
      <tr>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['orderID'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['mingcheng'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['number'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['huiyuanjia'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['number']*$info1['huiyuanjia'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['orderDate'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['orderStatus'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center">
		    <input name="button" type="button" class="buttoncss" id="button" onClick="javascript:window.open('showdd.php?id=<?php echo $info1['id'];?>','newframe','width=600,height=300,left=100,top=100,menubar=no,toolbar=no,location=no,scrollbars=no')" value="查看">
		    &nbsp;
		    <input name="button2" type="button" class="buttoncss" id="button2" onClick="javascript:window.location='orderdd.php?id=<?php echo $info1['id'];?>';" value="执行">       
            <input type="checkbox"  name=<?php echo $info1['id'];?> value=<?php echo $info1['id'];?>></div></td>
      </tr>
	  <?php
	      }while($info1=mysqli_fetch_array($sql1))
	  ?>
    </table></td>
  </tr>
</table>
<table width="750" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="652"><div align="right">
	本站共有订单
	<?php
		echo $total;//输出总记录数
	?>        
	&nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
    <?php
		if($page>=2){//如果当前页数大于等于2	
	?>
        <a href="lookdd.php?page=1" title="首页"><font face="webdings"> 9 </font></a>
		<a href="lookdd.php?id=<?php echo $info1['id'];?>&page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
	<?php
		}
		if($pagecount<=4){//如果总页数小于等于4
			for($i=1;$i<=$pagecount;$i++){//循环输出数字页码
	?>
        <a href="lookdd.php?page=<?php echo $i;?>"><?php echo $i;?></a>
    <?php
			}
		}else{
		   	for($i=1;$i<=4;$i++){	  //循环输出数字页码
	?>
        <a href="lookdd.php?page=<?php echo $i;?>"><?php echo $i;?></a>
    <?php 
			}
			if($page<$pagecount){
	?>
        <a href="lookdd.php?page=<?php echo $page+1;?>" title="后一页"><font face="webdings"> 8 </font></a> 
		<a href="lookdd.php?id=<?php echo $info1['id'];?>&page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> : </font></a>
    <?php 
			}
		}
	?>
	</div></td>
    <td width="98"><div align="center"><input type="hidden" name="page_id" value=<?php echo $page;?>><input type="submit" value="删除选择项" class="buttoncss"></div></td>
  </tr>
</table>
<?php
 }
?>
</form>
</body>
</html>
