<?php  
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
$ysk=isset($_POST['ysk'])?$_POST['ysk']:"";//Ϊ������ֵ
$yfh=isset($_POST['yfh'])?$_POST['yfh']:"";//Ϊ������ֵ
$ysh=isset($_POST['ysh'])?$_POST['ysh']:"";//Ϊ������ֵ
$orderStatus="";//��ʼ������
if($ysk!=""){//�������ֵ��Ϊ��
   $orderStatus.=$ysk."&nbsp;";//�����ַ���
 }
if($yfh!=""){//�������ֵ��Ϊ��
   $orderStatus.=$yfh."&nbsp;";//�����ַ���
 }
 if($ysh!=""){//�������ֵ��Ϊ��
   $orderStatus.=$ysh."&nbsp;";//�����ַ���
 }
 if($ysk=="" && $yfh=="" && $ysh==""){//���3��������ֵ��Ϊ��
    echo "<script>alert('��ѡ����״̬!');history.back();</script>";//������ʾ��Ϣ
	exit;//�˳�����
  }
 include("conn/conn.php");//�������ݿ������ļ�
 $sql=mysqli_query($conn,"select * from tb_orderinfo where id='".$_GET['id']."'");//ִ�в�ѯ���
 $info=mysqli_fetch_array($sql);//����ѯ������ص�������
 if($info['orderStatus'] == "δ���κδ���"){//�����ѯ������ֶ�orderStatus��ֵΪ"δ���κδ���"
 	$num = $info['number'];//Ϊ������ֵ
	$goodsID = $info['goodsID'];//Ϊ������ֵ
     mysqli_query($conn,"update tb_shangpin set cishu=cishu+'".$num."' ,shuliang=shuliang-'".$num."' where id='".$goodsID."'");//ִ�и������
  }
 mysqli_query($conn,"update tb_orderinfo set orderStatus='".$orderStatus."'where id='".$_GET['id']."'");//ִ�и������
 header("location:lookdd.php");//ҳ����ת
?>