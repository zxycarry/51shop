<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
session_start();//����session
include("conn/conn.php");//�������ݿ������ļ�
if(!isset($_SESSION['username'])){//����û�δ��¼
  echo "<script>alert('���ȵ�¼����!');history.back();</script>"; //������ʾ��Ϣ
  exit;//�˳�����
 }
$id=strval($_GET['goodsID']);//��ȡ������Ʒ��idֵ
$num=strval($_GET['num']);//��ȡ������Ʒ������
$sql=mysqli_query($conn,"select * from tb_shangpin where id='".$id."'");//ִ�в�ѯ��� 
$info=mysqli_fetch_array($sql);//����ѯ������ص�������
if($info['shuliang']<=0){//�����Ʒ����С�ڵ���0
   echo "<script>alert('����Ʒ�Ѿ�����!');history.back();</script>";//������ʾ��Ϣ
   exit;//�˳�����
 }
$array=explode("@",isset($_SESSION['producelist'])?$_SESSION['producelist']:"");//�����ﳵ�и���Ʒid��ֵ�ָ�Ϊ����
if(count($array)==1){//������ﳵ����ƷΪ��
  	$_SESSION['producelist']=$_SESSION['producelist'].$id."@";//���������Ʒid��ӵ�session������
  	$_SESSION['quatity']=$_SESSION['quatity'].$num."@";//���������Ʒ������ӵ�session������
}
if(count($array)!=1){//������ﳵ����Ʒ��Ϊ��
	if(!in_array($id,$array)){//���������Ʒ��id������Ʒ������
	    $_SESSION['producelist']=$_SESSION['producelist'].$id."@";//���������Ʒid��ӵ�session������
  		$_SESSION['quatity']=$_SESSION['quatity'].$num."@";//���������Ʒ������ӵ�session������
	}else{
	  	$arrayquatity=explode("@",$_SESSION['quatity']);//�����ﳵ�и���Ʒ������ֵ�ָ�Ϊ����
		$key=array_search($id,$array);//��ȡ������Ʒ��id����Ʒ�����еļ�ֵ
		$arrayquatity[$key]=$arrayquatity[$key]+$num;//�����ﳵ�и���Ʒ���������и���
		$_SESSION['quatity']=implode("@",$arrayquatity);//�����ﳵ�и���Ʒ������ֵ���ºϳ�Ϊ�ַ���
	}
}
header("location:cart_see.php");//ҳ����ת
?> 