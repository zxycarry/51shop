<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");//�������ݿ������ļ�
while(list($name,$value)=each($_POST)){//ѭ��������ѡ������ƺ�ֵ
 mysqli_query($conn,"delete from tb_type where id='".$value."'");//ִ��ɾ�����
 mysqli_query($conn,"delete from tb_shangpin where typeid='".$value."'");//ִ��ɾ�����
 }
 header("location:showleibie.php");//ҳ����ת
?>