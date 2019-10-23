<?php
session_start();//����session
include("conn/conn.php");//�������ݿ������ļ�
 

$type=$_GET["type"];//��ȡ��Ʒ���id��ֵ


$sql = mysqli_query($conn,"select * from tb_type where id=$type");//ִ�в�ѯ���
$info = mysqli_fetch_array($sql);//����ѯ������ص�������
$typeName = $info['typename'];//��ȡ��Ʒ�������
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr"
      class="com_content view-featured itemid-593 j35 mm-hover no-touch" slick-uniqueid="3">
<head>
    <meta http-equiv="content-type" content="text/html; charset=gbk">
    <title>��Ʒ�б�</title>
    <link rel="stylesheet" href="css/t3-01.css" type="text/css">
    <link rel="stylesheet" href="css/t3-02.css" type="text/css">
    <link rel="stylesheet" href="css/t3-03.css" type="text/css">
    <link rel="stylesheet" href="css/t3-04.css" type="text/css">
    <script src="js/jsArr01.js" type="text/javascript"></script>
    <script src="js/module.js" type="text/javascript"></script>
    <script src="js/jsArr02.js" type="text/javascript"></script>



    <!-- META FOR IOS & HANDHELD -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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

    <style type="text/css">.t3-megamenu.animate .animating > .mega-dropdown-menu, .t3-megamenu.animate.slide .animating > .mega-dropdown-menu > div {
        transition-duration: 400ms !important;
        -webkit-transition-duration: 400ms !important;
    }</style>

</head>

<body>
<!-- Need these wrapper for off-canvas menu. Remove if you don't use of-canvas -->
<div class="t3-wrapper">
<!-- // Need these wrapper for off-canvas menu. Remove if you don't use of-canvas -->

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
            <!-- //LOGO -->

            <!-- MAIN NAVIGATION -->
            <nav id="t3-mainnav" class="col-xs-12 col-md-6 t3-mainnav navbar navbar-default">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                </div>
                
				<?php
					include("common-navi.php");//��������ҳ��
				?>
            </nav>
            <!-- //MAIN NAVIGATION -->


            <!-- OFF-CANVAS SIDEBAR -->

            <!-- //OFF-CANVAS SIDEBAR -->


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
<div id="t3-content" class="t3-content col-xs-12 col-sm-12 col-md-9 col-md-push-3">

<div id="system-message-container" style="display: none;">
</div>

<div id="mijoshop" class="mijoshop common-home">
<div class="container_oc">
<ul class="breadcrumb">
</ul>
<div class="row">
<div id="content_oc" class="col-sm-12">
<div class="box_oc">
<div class="box-heading">
    <h1 class="mijoshop_heading_h1"><?php echo $typeName;?></h1>
</div>
<div class="box-content">

<hr>

<div class="row">

<?php
	$sql = mysqli_query($conn,"select * from tb_shangpin where typeid=$type");//ִ�в�ѯ���
	$count = mysqli_num_rows($sql);//��ȡ��ѯ��¼��
	$pagesize=8;//����ÿҳ��ʾ�ļ�¼��
	$maxPage = ceil($count/$pagesize);//��ȡ��ҳ��
	if (!isset($_GET['page'])) {//�����ַ����page������ֵδ����
		$page = 1;//���嵱ǰҳ��
	} else {
		if($_GET['page']<0){//�����ַ����page������ֵС��0
			$page = 1;//���嵱ǰҳ��
		}elseif($_GET['page'] > $maxPage) {//�����ַ����page������ֵ������ҳ��
			$page = $maxPage;//���嵱ǰҳ��
		}else{
			$page = $_GET['page'];//���嵱ǰҳ��
		}
	}
	$sql = mysqli_query($conn,"select t1.id,t1.tupian,t1.mingcheng,t1.huiyuanjia,t2.typename from tb_shangpin t1,tb_type t2 where t1.typeid=t2.id and t1.typeid=$type order by addtime desc limit ".($page-1)*$pagesize.",".$pagesize);//ִ�в�ѯ���
	while ($info = mysqli_fetch_array($sql)) {//����ѯ���ѭ�����ص�������
?>

													<div
														class="product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12">
														<div class="product-thumb">
															<div class="actions">
																<div class="image">
																	<a style="width:95%" href="goodsDetail.php?id=<?php echo $info['id'];?> "><img src="<?php echo $info['tupian'];?>"
																			class="img-responsive"> </a>
																</div>
																<div class="button-group btn-grid">
																	<div class="cart">
																		<button class="btn btn-primary btn-primary"
																			type="button" data-toggle="tooltip" 
																			onclick='javascript:window.location.href="cart_add.php?goodsID=<?php echo $info['id'];?>&num=1"; '
																			style="display: none; width: 33.3333%;"
																			data-original-title="��ӵ����ﳵ">
																			<i class="fa fa-shopping-cart"></i>
																		</button>
																	</div>
																</div>
															</div>
															<div>
																<div class="caption">
																	<div class="name">
																		<a
																			href="goodsDetail.php?id=<?php echo $info['id'];?>" style="width:95%">
																			 <span style="color:#0885B1">���ƣ�</span><?php echo $info['mingcheng'];?></a>
																	</div>															

																	<p class="price">
																		<span class="price-new">���ࣺ</span>
																		<span><?php echo $info['typename'];?></span>
																		<span class="price-tax">�۸�<?php echo $info['huiyuanjia'];?>Ԫ</span>
																	</p>
																</div>

															</div>
														</div>
													</div>
<?php
	}
?>



												</div>
<div class="row pagination">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" align="right">��ǰҳ����[<?php echo $page;?>/<?php echo $maxPage;?>]&nbsp;
	<?php if($page>1){?>
	<a href="goodsList.php?page=1&type=<?php echo $type;?>">��һҳ</a>��<a href="goodsList.php?page=<?php echo $page-1;?>&type=<?php echo $type;?>">��һҳ</a>
	<?php
	}
	if($page<$maxPage){
	?>
	��<a href="goodsList.php?page=<?php echo $page+1;?>&type=<?php echo $type;?>">��һҳ</a>��<a href="goodsList.php?page=<?php echo $maxPage;?>&type=<?php echo $type;?>">���һҳ&nbsp;</a>
	<?php }
	?>
	</td>
  </tr>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- //MAIN CONTENT -->

<!-- SIDEBAR LEFT -->
<div class="t3-sidebar t3-sidebar-left col-xs-12 col-sm-4 col-sm-pull-8 col-md-3 col-md-pull-9  hidden-sm hidden-xs">

    <div class="t3-module module " id="Mod157">
        <div class="module-inner"><h3 class="module-title "><span>������Ʒ</span></h3>

            <div class="module-ct">
                <div class="mijoshop">
                    <div class="container_oc">
                        <div class="box_oc">
                            <div>
                                <div class="box-product product-grid">
                                    
						<?php
							$hotsql=mysqli_query($conn,"select * from tb_shangpin order by cishu desc limit 0,7");//ִ�в�ѯ���
							while ($info = mysqli_fetch_array($hotsql)) {//����ѯ���ѭ�����ص�������
						?>
                                    <div>
                                        <div class="image"><a href="goodsDetail.php?id=<?php echo $info['id'];?>"><img src="<?php echo $info['tupian'];?>" width="80px" ></a></div>
                                        <div class="name"><a href="goodsDetail.php?id=<?php echo $info['id'];?>">
																<?php echo $info['mingcheng'];?> </a></div>
                                        <div class="rating">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                        </div>
                                        <div class="price">
                                           <?php echo $info['huiyuanjia'];?> Ԫ
                                        </div>
                                        
                                    </div>
                                    	<?php
											}
										?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //SIDEBAR LEFT -->

</div>
</div>


<!-- FOOTER -->
<footer id="t3-footer" class="wrap t3-footer">

    <section class="t3-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-8 copyright ">
                    <small>
                        Copyright &nbsp;<a href="http://www.zxyphp.com/" target="_blank">���Ƽ����޹�˾</a>
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
<!-- //FOOTER -->
<!-- Need these wrapper for off-canvas menu. Remove if you don't use of-canvas -->
</div>
<!-- // Need these wrapper for off-canvas menu. Remove if you don't use of-canvas -->
</body>
</html>