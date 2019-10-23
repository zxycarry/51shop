<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>查看评论</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
</head>
<?php
include("conn/conn.php");//包含数据库连接文件
include("function.php");//包含函数文件
$sql=mysqli_query($conn,"select * from tb_pingjia where id='".$_GET['id']."'");//执行查询语句
$info=mysqli_fetch_array($sql);//将查询结果返回到数组中


?>
<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25"><div align="left">评论主题:<?php echo $info['title'];?></div></td>
  </tr>
  <tr>
    <td height="25"><div align="left">内容:</div></td>
  </tr>
  <tr>
    <td height="140" valign="top"><div align="left"><?php echo unhtml($info['content']);?></div></td>
  </tr>
</table>
</body>
</html>
