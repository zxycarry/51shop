<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
session_start();//����session
include("conn/conn.php");//�������ݿ������ļ�
$username=$_POST['username'];//��ȡ�û�������û���
$pwd1=$_POST['pwd'];//��ȡ�û����������
$pwd=md5($_POST['pwd']);//��ȡ�û���������루���ܺ�
$email=$_POST['email'];//��ȡ�û������email��ַ
$truename=$_POST['truename'];//��ȡ�û��������ʵ����
$tel=$_POST['tel']; //��ȡ�û�����ĵ绰
$regtime=date("Y-m-d");//��ȡ��ǰ������
$dongjie=0;//��ʼ������
$sql=mysqli_query($conn,"select * from tb_user where name='".$username."'");//ִ�в�ѯ����
$info=mysqli_fetch_array($sql);//����ѯ������ص�������
if($info==true)//�����ѯ���Ϊ�棬���û����Ѵ���
 {
   echo "<script>alert('���ǳ��Ѿ�����!');history.back();</script>";//������ʾ��Ϣ
   exit;//�˳�����
 }
 else
 {  
    mysqli_query($conn,"insert into tb_user (name,pwd,dongjie,email,truename,tel,regtime,pwd1) values ('$username','$pwd','$dongjie','$email','$truename','$tel','$regtime','$pwd1')");//ִ�в������
    echo "<script>alert('��ϲ��ע��ɹ�!');window.location='index.php';</script>";//������ʾ��Ϣ
 }
?>
