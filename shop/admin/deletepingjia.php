<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");//�������ݿ������ļ�
while(list($name,$value)=each($_POST))//ѭ��������ѡ������ƺ�ֵ
 {
     $id=$value;//����ѡ���ֵ��ֵ������$id
     mysqli_query($conn,"delete from tb_pingjia where id=".$id."");//ִ��ɾ�����
 
 }
header("location:editpinglun.php");//ҳ����ת
?>