<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
$leibie=$_POST['leibie'];//��ȡ����leibie��ֵ
include("conn/conn.php");//�������ݿ������ļ�
$sql=mysqli_query($conn,"select * from tb_type where typename='".$leibie."'");//ִ�в�ѯ���
$info=mysqli_fetch_array($sql);//����ѯ������ص�������
if($info!=false){//�����ѯ���Ϊ��
 echo"<script>alert('������Ѿ�����!');window.location.href='addleibie.php';</script>";//������ʾ��Ϣ
exit;//�˳�����
}
mysqli_query($conn,"insert into tb_type(typename) values ('$leibie')");//ִ�в������
echo"<script>alert('�������ӳɹ�!');window.location.href='addleibie.php';</script>";//������ʾ��Ϣ
?>