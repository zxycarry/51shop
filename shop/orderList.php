<?php
session_start();//����session
include("conn/conn.php");//�������ݿ������ļ�
if(!isset($_SESSION['username'])){//����û�δ��¼
	echo "<script>alert('���ȵ�¼!');window.location.href='index.php';</script>";//������ʾ��Ϣ
}else{
	$ordersql = mysqli_query($conn,"select * from tb_order t1,tb_orderInfo t2,tb_shangpin t3 where t2.goodsID=t3.id and t1.id=t2.orderID and t1.username='".$_SESSION['username']."' order by t1.orderDate desc");//ִ�в�ѯ���
	$count = mysqli_num_rows($ordersql); //��ȡ��ѯ��¼��
	if($count == 0){//�����ѯ��¼��Ϊ0
		echo "<script>window.location.href='order_null.php';</script>";//ҳ����ת
		exit();//�˳�����
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb"
	dir="ltr"
	class="com_content view-featured itemid-593 j35 mm-hover no-touch"
	slick-uniqueid="3">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=gbk">
		<title>�ҵĹ��ﳵ</title>
		<link rel="stylesheet" href="css/t3-01.css" type="text/css">
		<link rel="stylesheet" href="css/t3-02.css" type="text/css">
		<link rel="stylesheet" href="css/t3-03.css" type="text/css">
		<link rel="stylesheet" href="css/t3-04.css" type="text/css">
		<script src="js/jsArr01.js" type="text/javascript">
</script>
		<script src="js/module.js" type="text/javascript">
</script>
		<script src="js/jsArr02.js" type="text/javascript">
</script>

<style>
td{
padding:0px
}
</style>

		<!-- META FOR IOS & HANDHELD -->
		<meta name="viewport"
			content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<style type="text/stylesheet">
        @-webkit-viewport {
            width: device-width;
        }
        @-moz-viewport {
            width: device-width;
        }
        @-ms-viewport {
            width: device-width;
        }

        @-o-viewport {
            width: device-width;
        }

        @viewport {
            width: device-width;
        }
    </style>
    <script type="text/javascript">
        //<![CDATA[
        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
            var msViewportStyle = document.createElement("style");
            msViewportStyle.appendChild(
                    document.createTextNode("@-ms-viewport{width:auto!important}")
            );
            document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
        }
        //]]>
    </script>
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="YES">
    <!-- //META FOR IOS & HANDHELD -->

    <!-- Le HTML5 shim and media query for IE8 support -->
    <!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->

    <link href="css/tab.css" type="text/css"
          rel="stylesheet">
    <link href="css/style.css"
          type="text/css" rel="stylesheet">
    <script src="js/tab.js"
            type="text/javascript"></script>

    <link href="css/index01.css" type="text/css">
    <link href="css/index02.css" type="text/css">

    <style type="text/css">
      .t3-megamenu.animate .animating > .mega-dropdown-menu, .t3-megamenu.animate.slide .animating > .mega-dropdown-menu > div {
        transition-duration: 400ms !important;
        -webkit-transition-duration: 400ms !important;
    }
    </style>

</head>

<body>
<div class="t3-wrapper">

<?php
include("index-loginCon.php");//������¼ҳ��
?>
<!-- HEADER -->
<header id="t3-header" class="wrap t3-header">
    <div class="container">
        <div class="row">
            <!--LOGO-->
            <div class="col-xs-12 col-md-3 logo col-sm-6">
                <div class="logo-image">
                    <a href="index.php" title="JoomlArt Demo Site">
                        <img class="logo-img" src="images/logo.png" alt="���沼��">
                    </a>
                    <small class="site-slogan hidden-xs"></small>
                </div>
            </div>
            <nav id="t3-mainnav" class="col-xs-12 col-md-6 t3-mainnav navbar navbar-default">
                <div class="navbar-header">
                </div>
			<?php
				include("common-navi.php");//��������ҳ��
			?>
            </nav>


			<?php
				include("searchCon.php");//��������ҳ��
			?>
        </div>
    </div>
</header>
<!-- //HEADER -->

<div id="t3-mainbody" class="container t3-mainbody">
<div class="row">

<!-- MAIN CONTENT -->
<div id="t3-content" class="t3-content col-xs-12">


<div id="mijoshop" class="mijoshop common-home">
<div class="container_oc">

								<div class="row">
									<div id="content_oc" class="col-sm-12">
										<h1>
											�ҵĶ���
										</h1>
										<form action="cart_order.php" method="post" id="myform">
											<div class="table-responsive cart-info">
												<table class="table table-bordered">
													<thead>

														<tr>
															<td class="text-center image">
																������
															</td>
															<td class="text-center name">
																��Ʒ����
															</td>
															<td class="text-center name">
																��������
															</td>
															<td class="text-center name">
																����
															</td>
															<td class="text-center name">
																���ѽ��
															</td>
															<td class="text-center quantity">
																�ջ�������
															</td>
															<td class="text-center price">
																�ջ����ֻ�
															</td>
															<td class="text-center total">
																�µ�����
															</td>
															<td class="text-center total">
																����״̬
															</td>
														</tr>
															
													</thead>
													<tbody>
				<?php
					while($info = mysqli_fetch_array($ordersql)){//����ѯ���ѭ�����ص�������
				?>

														<tr>
															<td class="text-center image" width="10%">
																<?php echo $info['orderID'];?>
															</td>
															<td class="text-center name">
																<?php echo $info['mingcheng'];?>
															</td>

															<td class="text-center quantity">
																<?php echo $info['number'];?>��
															</td>
															<td class="text-center quantity">
																<?php echo $info['price'];?>Ԫ
															</td>
															<td class="text-center quantity">
																<?php echo $info['number']*$info['price'];?>Ԫ
															</td>
															<td class="text-center quantity">
																<?php echo $info['receiveName'];?>
															</td>
															<td class="text-center quantity">
																<?php echo $info['tel'];?>
															</td>
															<td class="text-center quantity">
																<?php echo $info['orderDate'];?>
															</td>
															<td class="text-center quantity">
																<?php echo $info['orderStatus'];?>
															</td>
														</tr>
														<?php
															}
														?>
													</tbody>
												</table>
											</div>																		
									</div>
								</div>			
	<br/><br/>							
								<div class="row">
									<div id="content_oc" class="col-sm-12">									
<br/><br/>
										<div class="buttons">
											
											<div class="pull-right">
												<a href="index.php" class="tigger btn btn-primary btn-primary">��������</a>
												</div>
										</div>
										
										</form>
										
									</div>
								</div>
								
							</div>
</div>
</div>

</div>
</div>


<!-- FOOTER -->
<footer id="t3-footer" class="wrap t3-footer">
    <section class="t3-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-8 copyright ">
                    <small>
                        Copyright &nbsp;<a href="http://www.zxyphp.com" target="_blank">���Ƽ����޹�˾</a>
                    </small>
                    <small>
                        ��˾���䣺336234****@qq.com &nbsp;&nbsp;�绰��1827166****
                    </small>
                    <small>
                        ��˾��ַ������ʡ��ʯ����½�����ֱ�·
                    </small>
                </div>
            </div>
        </div>
    </section>

</footer>

</div>
</body>
</html>
<?php
	mysqli_close($conn);//�ر����ݿ�����
}
?>
