
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���۱༭</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body topmargin="0" leftmargin="0" bottommargin="0">
<?php
       include("conn/conn.php");//�������ݿ������ļ�
       $sql=mysqli_query($conn,"select count(*) as total from tb_pingjia ");//ִ�в�ѯ���
	   $info=mysqli_fetch_array($sql);//����ѯ������ص�������
	   $total=$info['total'];//��ȡ��ѯ����ܼ�¼��
	   if($total==0)//�����ѯ���Ϊ��
	   {
	     echo "��վ�����û���������!";//����ַ���
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
    <td height="20" colspan="2"><div align="center" class="style1">�û����۱༭</div></td>
  </tr>
  <tr>
    <td height="40" colspan="2" bgcolor="#666666"><table width="750" height="45" border="0" align="center" cellpadding="0" cellspacing="1">
      <tr>
        <td width="294" height="22" bgcolor="#FFFFFF"><div align="center">��������</div></td>
        <td width="93" bgcolor="#FFFFFF"><div align="center">��Ʒ����</div></td>
        <td width="100" bgcolor="#FFFFFF"><div align="center">������</div></td>
        <td width="110" bgcolor="#FFFFFF"><div align="center">����ʱ��</div></td>
        <td width="87" bgcolor="#FFFFFF"><div align="center">����</div></td>
        <td width="59" bgcolor="#FFFFFF"><div align="center">ɾ��</div></td>
      </tr>
	   <?php
	     $pagesize=10;//ÿҳ��ʾ10����¼
		   if ($total<=$pagesize){//����ܼ�¼��С�ڵ���10
		      $pagecount=1;//��ҳ��Ϊ1
			} 
			if(($total%$pagesize)!=0){//����ܼ�¼������10��������Ϊ0
			   $pagecount=intval($total/$pagesize)+1;//������ҳ��
			
			}else{
			   $pagecount=$total/$pagesize;//������ҳ��
			
			}
			if(!isset($_GET['page'])){//�����ַ����page����û������
			    $page=1;//���嵱ǰҳ��
			
			}else{
			    $page=intval($_GET['page']);//���嵱ǰҳ��
			
			}
			 
             $sql1=mysqli_query($conn,"select * from tb_pingjia  order by time desc limit ".($page-1)*$pagesize.",$pagesize ");//ִ�в�ѯ���
             while($info1=mysqli_fetch_array($sql1))//����ѯ���ѭ�����ص�������
		     {
	   
	   ?>
      <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="left"><?php echo $info1['title'];?></div></td>
        <td height="20" bgcolor="#FFFFFF"><div align="center">
		<?php
		  $sql2=mysqli_query($conn,"select * from tb_shangpin where id='".$info1['goodsID']."'");//ִ�в�ѯ���
		  $info2=mysqli_fetch_array($sql2);//����ѯ������ص�������
		  echo $info2['mingcheng'];//�����Ʒ����
		?></div></td>
        <td height="20" bgcolor="#FFFFFF">
		<div align="center">
		<?php
		  echo $info1['username'];//��������û���
		?>
		</div></td>
        <td height="20" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['time'];?></div></td>
        <td height="20" bgcolor="#FFFFFF"><div align="center"><a href="javascript:openpj(<?php echo $info1['id'];?>);">�鿴</a></div></td>
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
	&nbsp;��վ����������&nbsp;<?php
		   echo $total;//����ܼ�¼��
		  ?>&nbsp;��&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;��&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;ҳ
        <?php
		  if($page>=2)//�����ǰҳ�����ڵ���2
		  {
		  ?>
        <a href="editpinglun.php?page=1" title="��ҳ"><font face="webdings"> 9 </font></a> 
		<a href="editpinglun.php?page=<?php echo $page-1;?>" title="ǰһҳ"><font face="webdings"> 7 </font></a>
        <?php
		  }
		   if($pagecount<=4){//�����ҳ��С�ڵ���4
		    for($i=1;$i<=$pagecount;$i++){//ѭ���������ҳ��
		  ?>
        <a href="editpinglun.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 //ѭ���������ҳ��
		  ?>
        <a href="editpinglun.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="editpinglun.php?page=<?php echo $page-1;?>" title="��һҳ"><font face="webdings"> 8 </font></a> 
		<a href="editpinglun.php?page=<?php echo $pagecount;?>" title="βҳ"><font face="webdings"> : </font></a>
        <?php }?>
	
	
	</div></td>
    <td width="93"><div align="center"><input type="submit" value="ɾ��ѡ��" class="buttoncss"></div></td>
  </tr>
  </form>
</table>

<?php
  }
?>
</body>
</html>
