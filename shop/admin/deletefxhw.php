<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
 include("conn/conn.php");//�������ݿ������ļ�
 while(list($name,$value)=each($_POST))//ѭ��������ѡ������ƺ�ֵ
  {
      $sql=mysqli_query($conn,"select tupian from tb_shangpin where id='".$value."'");//ִ�в�ѯ���
	  $info=mysqli_fetch_array($sql);//����ѯ������ص�������
	  if($info['tupian']!="")//�����ѯ�����tupian�ֶε�ֵ��Ϊ��
	  {
	     @unlink(substr($info['tupian'],6,(strlen($info['tupian'])-6)));//ɾ����Ʒ��Ӧ��ͼƬ
		
	  }
	  $sql1=mysqli_query($conn,"select * from tb_orderinfo ");//ִ�в�ѯ���
	  while($info1=mysqli_fetch_array($sql1)){//����ѯ���ѭ�����ص�������
	        if($info1['goodsID']==$value){//���������Ϣ����goodsID�ֶε�ֵ������Ʒ��idֵ
				$row = array();//���������
				$orderID = $info1['orderID'];//��ȡ������Ϣ����orderID�ֶε�ֵ
			   mysqli_query($conn,"delete from tb_orderinfo where id='".$info1['id']."'");//ִ��ɾ������
			   $sql2=mysqli_query($conn,"select orderID from tb_orderinfo");//ִ�в�ѯ����
			   while($info2=mysqli_fetch_array($sql2)){//����ѯ���ѭ�����ص�������
			   	$row[] = $info2['orderID'];//����ѯ�����orderID�ֶε�ֵ�洢��������
			   }
			   if(!in_array($orderID,$row)){//���$orderID��ֵ��������$row��
			   	mysqli_query($conn,"delete from tb_order where id='".$orderID."'");//ִ��ɾ������
			   }
			 }
	  }
      mysqli_query($conn,"delete from tb_shangpin where id='".$value."'");//ִ��ɾ������
	  mysqli_query($conn,"delete from tb_pingjia where goodsID='".$value."'");//ִ��ɾ������
  }
 header("location:editgoods.php"); //ҳ����ת
?>