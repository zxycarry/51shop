<?php
	header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
  	$page=intval($_POST['page_id']);//��ȡ�������ֵ
  	include("conn/conn.php");//�������ݿ������ļ�
  	while(list($value,$name)=each($_POST)){//ѭ��������ѡ������ƺ�ֵ
   		$sql = mysqli_query($conn,"select orderID from tb_orderinfo where id='".$value."'");//ִ�в�ѯ���
		$info = mysqli_fetch_array($sql);//����ѯ������ص�������
     	mysqli_query($conn,"delete from tb_orderinfo where id='".$value."'");//ִ��ɾ�����
	 	$row = array();//���������
	 	$sql1 = mysqli_query($conn,"select orderID from tb_orderinfo");//ִ�в�ѯ���
		while($info1 = mysqli_fetch_array($sql1)){//����ѯ���ѭ�����ص�������
			$row[]=$info1['orderID'];//����ѯ���Ķ���IDֵ�洢��������
		}
	 	if(!in_array($info['orderID'],$row)){//��������Ų���������
	 		mysqli_query($conn,"delete from tb_order where id='".$info['orderID']."'");//ִ��ɾ�����
	 	}
   	}
 	header("location:lookdd.php?page=".$page."");//ҳ����ת
?>
