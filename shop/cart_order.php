<?php
	session_start();//����session
	include("conn/conn.php");//�������ݿ������ļ�
	if($_SESSION['producelist'] == "" || $_SESSION['quatity'] == ""){//���session������ֵΪ��
		echo "<script>alert('����û�й���!');window.location.href='index.php';</script>";//������ʾ��Ϣ
	}
	if (isset($_SESSION['username'])){//����û��ѵ�¼
			$receiveName = $_POST['receiveName'];//��ȡ�ջ�������
			$address = $_POST['address'];//��ȡ�ջ��˵�ַ
			$tel = $_POST['tel'];//��ȡ�ջ��˵绰
			$bz = $_POST['bz'];//��ȡ��ע��Ϣ
			$array=explode("@",$_SESSION['producelist']);//�����ﳵ�и���Ʒid��ֵ�ָ�Ϊ����
			$arrayquatity=explode("@",$_SESSION['quatity']);//�����ﳵ�и���Ʒ������ֵ�ָ�Ϊ����
			$bnumber = count($array)-1;//��ȡ���ﳵ���м�����Ʒ
			$flag = true;//Ϊ������ֵΪtrue
	//���붩����������
			$sql = mysqli_query($conn,"insert into tb_order(bnumber,username,receiveName,address,tel,bz,orderDate) values(".$bnumber.",'".$_SESSION['username']."','".$receiveName."','".$address."','".$tel."','".$bz."','".date("Y-m-d H:i")."')");//ִ�в������
			$insert_id = mysqli_insert_id($conn);//��ȡ�����¼��id
			if ($insert_id == 0){//��������¼ʧ��
				$flag = false;//��������ֵΪfalse
			}else{
				$orderID = $insert_id;//�������¼��id��ֵΪ������
			}
	//���붩����ϸ������
			$orderStatus = "δ���κδ���";//Ϊ������ֵ
			for($i=0;$i<count($array)-1;$i++){//ѭ�����ﳵ�е���Ʒ
				$id = $array[$i];//��ȡ������Ʒid��ֵ
				$num = $arrayquatity[$i];//��ȡ������Ʒ������
				$sql = mysqli_query($conn,"select * from tb_shangpin where id=".$id);//ִ�в�ѯ����
				$info = mysqli_fetch_array($sql);//����ѯ������ص�������
				$price = $info['huiyuanjia'];//��ȡ������Ʒ�Ļ�Ա��
				$sql = mysqli_query($conn,"insert into tb_orderInfo (orderID,goodsID,price,number,orderStatus) values(".$orderID.",".$id.",'".$price."',".$num.",'".$orderStatus."')");//ִ�в������
				$insert_id = mysqli_insert_id($conn);//��ȡ�����¼��id
				if ($insert_id == 0){//��������¼ʧ��
		 			$flag = false;//��������ֵΪfalse
				}
			}
	
			if($flag == false){//�������$flag��ֵΪfalse
				echo "<script>alert('������Ч');history.back();</script>";//������ʾ��Ϣ
			}else{
				$_SESSION['producelist']="";//��չ��ﳵ����Ʒid
				$_SESSION['quatity']="";//��չ��ﳵ����Ʒ����
				echo "<script>alert('�������ɣ����ס���Ķ�����[".$orderID."]');window.location.href='index.php';</script>";//������ʾ��Ϣ
			}
			mysqli_close($conn);//�ر����ݿ�����
	}else{
		echo "<script>alert('���ȵ�¼���ٽ��й���!');window.location.href='index.php';</script>";//������ʾ��Ϣ
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">