<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");//�������ݿ������ļ�
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
$upfile=$_FILES['upfile']['name'];//Ϊ������ֵ

 if(ceil(($huiyuanjia/$shichangjia)*100)<=80)//����ۿ�С�ڵ���8��
 {
 
    $tejia=1;//Ϊ������ֵ
 }
 else
 {
    $tejia=0;//Ϊ������ֵ
 }
if($upfile!="")//����ϴ��ļ���Ϊ��
{
$sql=mysqli_query($conn,"select * from tb_shangpin where id=".$_GET['id']."");//ִ�в�ѯ���
$info=mysqli_fetch_array($sql);//����ѯ������ص�������
@unlink(substr($info['tupian'],6,(strlen($info['tupian'])-6)));//ɾ����Ʒ��Ӧ��ͼƬ
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

$uploadfile="admin/".$uploadfile;//����������ݱ���ļ�·��

$jianjie=$_POST['jianjie'];//Ϊ������ֵ
$addtime=$nian."-".$yue."-".$ri;//���������ַ���

mysqli_query($conn,"update tb_shangpin set mingcheng='$mingcheng',jianjie='$jianjie',addtime='$addtime',dengji='$dengji',xinghao='$xinghao',tupian='$uploadfile',typeid='$typeid',shichangjia='$shichangjia',huiyuanjia='$huiyuanjia',pinpai='$pinpai',tuijian='$tuijian',shuliang='$shuliang' where id=".$_GET['id']."");//ִ�и������
echo "<script>alert('��Ʒ".$mingcheng."�޸ĳɹ�!');history.go(-2);</script>";//������ʾ��Ϣ
?>