<?php
	session_start();//����session
	include("conn/conn.php");//�������ݿ������ļ�
?>
<html>
<head>
<title>��Ա��Ϣ�޸�</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<body>
<?php
	$id = $_POST['id'];//��ȡ�û�id
	$pwd = $_POST['pwd'];//��ȡ�û����������
	$sql = mysqli_query($conn,"select * from tb_user where id=".$id);//ִ�в�ѯ����
	$info=mysqli_fetch_array($sql);//����ѯ������ص�������
	if ($pwd != $info['pwd1']) {//����û��������벻��ȷ
		echo "<script>alert('ԭ���벻��ȷ��');window.location.href='modifyMember.php';</script>";//������ʾ��Ϣ
		exit();//�˳�����
	}
	$username = $_POST['username'];//��ȡ�û�������û���
	$truename = $_POST['truename'];//��ȡ�û��������ʵ����
	$tel = $_POST['tel'];//��ȡ�û�����ĵ绰
	$email = $_POST['email'];//��ȡ�û������email��ַ
	$newPwd = $_POST['newPwd'];//��ȡ�û������������
	$newPwd1 = md5($_POST['newPwd']);//��ȡ�û�����������루���ܺ�
	$updatesql = mysqli_query($conn,"update tb_user set name='".$username."',pwd='".$newPwd1."',email='".$email."',tel='".$tel."',regtime='".date("Y-m-d")."',truename='".$truename."',pwd1='".$newPwd."' where id=".$id);//ִ�и��²���
	if ($updatesql) {//�������ֵΪ��
			$_SESSION['username'] = $username;//Ϊsession�������¸�ֵ
			echo "<script>alert('��Ա��Ϣ�޸ĳɹ���');window.location.href='index.php';</script>";//������ʾ��Ϣ
		} else {
			echo "<script>alert('��Ա��Ϣ�޸�ʧ�ܣ�');window.location.href='modifyMember.php';</script>";//������ʾ��Ϣ
		}
?>
</body>
</html>
