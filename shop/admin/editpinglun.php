
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>评论编辑</title>
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
       $sql=mysqli_query($conn,"select count(*) as total from tb_pingjia ");//执行查询语句
	   $info=mysqli_fetch_array($sql);//将查询结果返回到数组中
	   $total=$info['total'];//获取查询结果总记录数
	   if($total==0)//如果查询结果为空
	   {
	     echo "本站暂无用户发表评论!";//输出字符串
	   }
	   else
	   {
	      
?>
<script language="javascript">
  function openpj(id)
  {
    window.open("lookpinglun.php?id="+id,"newframe","width=500,height=300,top=100,left=200,menubar=no,toolbar=no,location=no,scrollbar=no,status=no");
    
  }  
</script>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  
 <form name="form2" method="post" action="deletepingjia.php"> 
  <tr bgcolor="#FFCF60">
    <td height="20" colspan="2"><div align="center" class="style1">用户评论编辑</div></td>
  </tr>
  <tr>
    <td height="40" colspan="2" bgcolor="#666666"><table width="750" height="45" border="0" align="center" cellpadding="0" cellspacing="1">
      <tr>
        <td width="294" height="22" bgcolor="#FFFFFF"><div align="center">评论主题</div></td>
        <td width="93" bgcolor="#FFFFFF"><div align="center">商品名称</div></td>
        <td width="100" bgcolor="#FFFFFF"><div align="center">评论者</div></td>
        <td width="110" bgcolor="#FFFFFF"><div align="center">评论时间</div></td>
        <td width="87" bgcolor="#FFFFFF"><div align="center">操作</div></td>
        <td width="59" bgcolor="#FFFFFF"><div align="center">删除</div></td>
      </tr>
	   <?php
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
			 
             $sql1=mysqli_query($conn,"select * from tb_pingjia  order by time desc limit ".($page-1)*$pagesize.",$pagesize ");//执行查询语句
             while($info1=mysqli_fetch_array($sql1))//将查询结果循环返回到数组中
		     {
	   
	   ?>
      <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="left"><?php echo $info1['title'];?></div></td>
        <td height="20" bgcolor="#FFFFFF"><div align="center">
		<?php
		  $sql2=mysqli_query($conn,"select * from tb_shangpin where id='".$info1['goodsID']."'");//执行查询语句
		  $info2=mysqli_fetch_array($sql2);//将查询结果返回到数组中
		  echo $info2['mingcheng'];//输出商品名称
		?></div></td>
        <td height="20" bgcolor="#FFFFFF">
		<div align="center">
		<?php
		  echo $info1['username'];//输出评论用户名
		?>
		</div></td>
        <td height="20" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['time'];?></div></td>
        <td height="20" bgcolor="#FFFFFF"><div align="center"><a href="javascript:openpj(<?php echo $info1['id'];?>);">查看</a></div></td>
        <td height="20" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" value=<?php echo $info1['id']?> name="<?php echo $info1['id'];?>"></div></td>
      </tr>
	   <?php
	        }
		    
		?>
    </table></td>
  </tr>
  <tr>
    <td width="657" height="20">
	<div align="left">
	&nbsp;本站共有用评论&nbsp;<?php
		   echo $total;//输出总记录数
		  ?>&nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)//如果当前页数大于等于2
		  {
		  ?>
        <a href="editpinglun.php?page=1" title="首页"><font face="webdings"> 9 </font></a> 
		<a href="editpinglun.php?page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
        <?php
		  }
		   if($pagecount<=4){//如果总页数小于等于4
		    for($i=1;$i<=$pagecount;$i++){//循环输出数字页码
		  ?>
        <a href="editpinglun.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 //循环输出数字页码
		  ?>
        <a href="editpinglun.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="editpinglun.php?page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 8 </font></a> 
		<a href="editpinglun.php?page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> : </font></a>
        <?php }?>
	
	
	</div></td>
    <td width="93"><div align="center"><input type="submit" value="删除选项" class="buttoncss"></div></td>
  </tr>
  </form>
</table>

<?php
  }
?>
</body>
</html>
