<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ  
$n0=$_POST['n0'];//Ϊ������ֵ
$n1=$_POST['n1'];//Ϊ������ֵ
$p0=md5($_POST['p0']);//Ϊ������ֵ
$p1=trim($_POST['p1']);//Ϊ������ֵ
include("conn/conn.php");//�������ݿ������ļ�

  $sql=mysqli_query($conn,"select * from tb_admin where name='".$n0."'");//ִ�в�ѯ���
  $info=mysqli_fetch_array($sql);//����ѯ������ص�������
  if($info==false)//�����ѯ���Ϊfalse
   {
     echo "<script>alert('�����ڴ��û�!');history.back();</script>";//������ʾ��Ϣ
     exit;//�˳�����
   }
   else
   {
    if($info['pwd']==$p0)//����û�����������ȷ
	 {
	  if($n1!="")//�������$n1��ֵ��Ϊ��
	   {
	   
	  mysqli_query($conn,"update tb_admin set name='".$n1."'where id=".$info['id']." ");//ִ�и������
	  }
	  if($p1!="")//�������$p1��ֵ��Ϊ��
	   {
	    $p1=md5($p1);//Ϊ������ֵ
	     mysqli_query($conn,"update tb_admin set pwd='".$p1."' where id=".$info['id']."");//ִ�и������
	   
	   }
	 }
	 else
	 {
	   echo "<script>alert('ԭ�����������!');history.back();</script>";//������ʾ��Ϣ
       exit;//�˳�����
	 }
   }


echo "<script>alert('���ĳɹ�!');history.back();</script>";//������ʾ��Ϣ




?>