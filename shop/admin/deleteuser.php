<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");//�������ݿ������ļ�
while(list($name,$value)=each($_POST))//ѭ��������ѡ������ƺ�ֵ
  {
  	$sql=mysqli_query($conn,"select * from tb_user where id=".$value);//ִ�в�ѯ���
	$info=mysqli_fetch_array($sql);//����ѯ������ص�������
    mysqli_query($conn,"delete from tb_user where id=".$value); //ִ��ɾ�����
	mysqli_query($conn,"delete from tb_pingjia where username='".$info['name']."'");//ִ��ɾ�����
  }
header("location:edituser.php");//ҳ����ת
?>