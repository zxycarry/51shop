<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");//�������ݿ������ļ�
$title=$_POST['title'];//��ȡ�û���������۱���
$content=$_POST['content'];//��ȡ�û��������������
$goodsID=$_GET['id'];//��ȡ������Ʒ��id
$time=date("Y-m-d H:i");//��ȡ��ǰ�����ں�ʱ��
session_start();//����session
$username=$_SESSION['username'];//��ȡ��¼�û���
mysqli_query($conn,"insert into tb_pingjia (username,goodsID,title,content,time) values ('$username','$goodsID','$title','$content','$time') ");//ִ�в������
echo "<script>alert('���۷���ɹ�!');</script>";//������ʾ��Ϣ
header("location:goodsDetail.php?id=".$goodsID."&action=showcomment");//ҳ����ת
?>