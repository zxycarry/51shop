<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");//�������ݿ������ļ�
if(is_numeric($_POST['shichangjia'])==false || is_numeric($_POST['huiyuanjia'])==false)//�������ļ۸�������
 {
   echo "<script>alert('�۸�ֻ��Ϊ���֣�');history.back();</script>";//������ʾ��Ϣ
   exit;//�˳�����
 }
if(is_numeric($_POST['shuliang'])==false)//��������������������
 {
   echo "<script>alert('����ֻ��Ϊ���֣�');history.back();</script>";//������ʾ��Ϣ
   exit;//�˳�����
 }
$mingcheng=$_POST['mingcheng'];//Ϊ������ֵ
$nian=$_POST['nian'];//Ϊ������ֵ
$yue=$_POST['yue'];//Ϊ������ֵ
$ri=$_POST['ri'];//Ϊ������ֵ
$shichangjia=$_POST['shichangjia'];//Ϊ������ֵ
$huiyuanjia=$_POST['huiyuanjia'];//Ϊ������ֵ
$typeid=$_POST['typeid'];//Ϊ������ֵ
$dengji=$_POST['dengji'];//Ϊ������ֵ
$xinghao=$_POST['xinghao'];//Ϊ������ֵ
$pinpai=$_POST['pinpai'];//Ϊ������ֵ
$tuijian=$_POST['tuijian'];//Ϊ������ֵ
$shuliang=$_POST['shuliang'];//Ϊ������ֵ

if(ceil(($huiyuanjia/$shichangjia)*100)<=80)//����ۿ�С�ڵ���8��
 {
 
    $tejia=1;//Ϊ������ֵ
 }
 else
 {
    $tejia=0;//Ϊ������ֵ
 }


function getname($exname){//�����ȡ�ϴ��ļ�·�������Ƶĺ���
   $dir = "upimages/";//�����ϴ�Ŀ¼
   $i=1;//�������
   if(!is_dir($dir)){//���Ŀ¼������
      mkdir($dir,0777);//����Ŀ¼
   }
   
   while(true){//ִ��whileѭ��
       if(!is_file($dir.$i.".".$exname)){//����ļ�������
	       $name=$i.".".$exname;//�����ϴ�����ļ�����
	       break;//����ѭ��
	   }
	   $i++;//�����Լ�1
	 }

   return $dir.$name;//�����ϴ��ļ�·��������
}

$exname=strtolower(substr($_FILES['upfile']['name'],(strrpos($_FILES['upfile']['name'],'.')+1)));//��ȡ�ϴ��ļ���׺��
$uploadfile = getname($exname);//ִ�к���

move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile);//ִ���ļ��ϴ�����
if(trim($_FILES['upfile']['name']!=""))//����ϴ��ļ���Ϊ��
 { 
  $uploadfile="admin/".$uploadfile;//����������ݱ���ļ�·��
}
else
 {
  $uploadfile="";//����������ݱ���ļ�·��
 }

$jianjie=$_POST['jianjie'];//Ϊ������ֵ
$addtime=$nian."-".$yue."-".$ri;//���������ַ���
mysqli_query($conn,"insert into tb_shangpin(mingcheng,jianjie,addtime,dengji,xinghao,tupian,typeid,shichangjia,huiyuanjia,pinpai,tuijian,shuliang,cishu)values('$mingcheng','$jianjie','$addtime','$dengji','$xinghao','$uploadfile','$typeid','$shichangjia','$huiyuanjia','$pinpai','$tuijian','$shuliang','0')");//ִ�и������
echo "<script>alert('��Ʒ".$mingcheng."��ӳɹ�!');window.location.href='addgoods.php';</script>";//������ʾ��Ϣ
?>