<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");//�������ݿ������ļ�
$id=$_GET['id'];//��ȡ�û�id
$sql=mysqli_query($conn,"select * from tb_user where id=".$id."");//ִ�в�ѯ���
$info=mysqli_fetch_array($sql);//����ѯ������ص�������
if($info['dongjie']==0)//�����ѯ�����dongjie�ֶε�ֵΪ0
   {
     mysqli_query($conn,"update tb_user set dongjie=1 where id='".$id."'");//��dongjie�ֶε�ֵ����Ϊ1
   }
 else
  {
     mysqli_query($conn,"update tb_user set dongjie=0 where id='".$id."'"); //��dongjie�ֶε�ֵ����Ϊ0
  }
 header("location:lookuserinfo.php?id=".$id."");   //ҳ����ת
?>