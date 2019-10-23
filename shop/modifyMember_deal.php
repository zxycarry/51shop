<?php
	session_start();//启动session
	include("conn/conn.php");//包含数据库连接文件
?>
<html>
<head>
<title>会员信息修改</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<body>
<?php
	$id = $_POST['id'];//获取用户id
	$pwd = $_POST['pwd'];//获取用户输入的密码
	$sql = mysqli_query($conn,"select * from tb_user where id=".$id);//执行查询操作
	$info=mysqli_fetch_array($sql);//将查询结果返回到数组中
	if ($pwd != $info['pwd1']) {//如果用户输入密码不正确
		echo "<script>alert('原密码不正确！');window.location.href='modifyMember.php';</script>";//弹出提示信息
		exit();//退出程序
	}
	$username = $_POST['username'];//获取用户输入的用户名
	$truename = $_POST['truename'];//获取用户输入的真实姓名
	$tel = $_POST['tel'];//获取用户输入的电话
	$email = $_POST['email'];//获取用户输入的email地址
	$newPwd = $_POST['newPwd'];//获取用户输入的新密码
	$newPwd1 = md5($_POST['newPwd']);//获取用户输入的新密码（加密后）
	$updatesql = mysqli_query($conn,"update tb_user set name='".$username."',pwd='".$newPwd1."',email='".$email."',tel='".$tel."',regtime='".date("Y-m-d")."',truename='".$truename."',pwd1='".$newPwd."' where id=".$id);//执行更新操作
	if ($updatesql) {//如果变量值为真
			$_SESSION['username'] = $username;//为session变量重新赋值
			echo "<script>alert('会员信息修改成功！');window.location.href='index.php';</script>";//弹出提示信息
		} else {
			echo "<script>alert('会员信息修改失败！');window.location.href='modifyMember.php';</script>";//弹出提示信息
		}
?>
</body>
</html>
