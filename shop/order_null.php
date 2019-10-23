<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb"
	dir="ltr"
	class="com_content view-featured itemid-593 j35 mm-hover no-touch"
	slick-uniqueid="3">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=gbk">
		<title>我的购物车</title>
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
include("conn/conn.php");//包含数据库连接文件
include("index-loginCon.php");//包含登录页面
?>
<!-- HEADER -->
<header id="t3-header" class="wrap t3-header">
    <div class="container">
        <div class="row">
            <!--LOGO-->
            <div class="col-xs-12 col-md-3 logo col-sm-6">
                <div class="logo-image">
                    <a href="index.php" title="JoomlArt Demo Site">
                        <img class="logo-img" src="images/logo.png" alt="神奇布克">
                    </a>
                    <small class="site-slogan hidden-xs"></small>
                </div>
            </div>
            <nav id="t3-mainnav" class="col-xs-12 col-md-6 t3-mainnav navbar navbar-default">
                <div class="navbar-header">
                </div>
			<?php
				include("common-navi.php");//包含导航页面
			?>
            </nav>


			<?php
				include("searchCon.php");//包含搜索页面
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
											我的订单
										</h1>
										<form action="cart_order.php" method="post" id="myform">
											<div class="table-responsive cart-info">
												暂时没有订单
											</div>																		
									</div>
								</div>			
	<br/><br/>							
								<div class="row">
									<div id="content_oc" class="col-sm-12">									
<br/><br/>
										<div class="buttons">
											
											<div class="pull-right">
												<a href="index.php" class="tigger btn btn-primary btn-primary">继续购物</a>
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
                        Copyright &nbsp;<a href="http://www.zxyphp.com" target="_blank">软创科技有限公司</a>
                    </small>
                    <small>
                        公司邮箱：336234****@qq.com &nbsp;&nbsp;电话：1827166****
                    </small>
                    <small>
                        公司地址：湖北省黄石市下陆区桂林北路
                    </small>
                </div>
            </div>
        </div>
    </section>

</footer>

</div>
</body>
</html>

