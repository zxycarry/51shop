<?php
	header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
 	session_start();//启动session
	include("conn/conn.php");//包含数据库连接文件
	if (!isset($_SESSION['username'])) {//如果用户未登录
		header("location:login.php");//跳转至登录页面
		exit();//退出程序
	} else {
		if ($_SESSION['producelist'] == "" || $_SESSION['quatity'] == "") {//如果购物车为空
			header("location:cart_null.php");//页面跳转
		} else {
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb"
	dir="ltr"
	class="com_content view-featured itemid-593 j35 mm-hover no-touch"
	slick-uniqueid="3">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=gbk">
		<title>我的购物车-神奇布克</title>
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
<div class="container_oc">
    <div class="breadcrumb">

    </div>
</div>
								<div class="row">
									<div id="content_oc" class="col-sm-12">
										<h1>
											我的购物车
										</h1>
										<form action="cart_order.php" method="post" id="myform">
											<div class="table-responsive cart-info">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td class="text-center image">
						图片
					</td>
					<td class="text-left name">
						图书名称
					</td>

					<td class="text-left quantity">
						数量
					</td>
					<td class="text-right price">
						单价
					</td>
					<td class="text-right total">
						总计
					</td>
				</tr>
			</thead>
			<tbody>
			<?php
				$total=0;//为变量初始化赋值
			    $array=explode("@",$_SESSION['producelist']);//将购物车中各商品id的值分割为数组
				$arrayquatity=explode("@",$_SESSION['quatity']);//将购物车中各商品数量的值分割为数组
				for($i=0;$i<count($array)-1;$i++){ //循环购物车中的商品
				   	$id=$array[$i];//获取商品id
				   	$num=$arrayquatity[$i];//获取商品数量
				  
				   	if($id!=""){//如果商品id的值不为空
				   		$sql=mysqli_query($conn,"select * from tb_shangpin where id='".$id."'");//执行查询语句
				   		$info=mysqli_fetch_array($sql);//将查询结果返回到数组中
				   		$total1=$num*$info['huiyuanjia'];//获取该商品的总价
				   		$total+=$total1;//获取所有商品的总价
				   		//$_SESSION["total"]=$total;
			?>

			<tr>
				<td class="text-center image" width="20%">
					<a href="goodsDetail.php?id=<?php echo $id;?>"><img width="80px" src="<?php echo $info['tupian'];?>">
					</a>
				</td>
				<td class="text-left name">
					<a href="goodsDetail.php?id=<?php echo $id;?>"> <?php echo $info['mingcheng'];?></a>
				</td>

				<td class="text-left quantity">
					<?php echo $num;?>件
				</td>
				<td class="text-right price">
					<?php echo $info['huiyuanjia'];?>元
				</td>
				<td class="text-right total">
					<?php echo $total1;?>元
				</td>
			</tr>
			<?php
					}
				}
			?>

			</tbody>
		</table>
											</div>
										


										<div class="row cart-total">
											<div class="col-sm-4 col-sm-offset-8">
												<table class="table table-bordered">
													<tbody>
														<tr>
															<td class="text-left">
																<strong>总计:</strong>
															</td>
															<td class="text-right"><?php echo $total;?>元
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										
									</div>
								</div>
								
								
								<div class="row">
									<div id="content_oc" class="col-sm-12">
										<h1>
											物流信息
										</h1>
										
											<div class="table-responsive cart-info">
												<table class="table table-bordered">
													
													<tbody>
													
														<tr>
															<td class="text-right" width="20%">
																收货人姓名：
															</td>
															
															<td class="text-left quantity">
																<div class="input-group btn-block"
																	style="max-width: 400px;">
																	<input type="text" id="receiveName"
																		name="receiveName"
																		 size="10"
																		class="form-control">
																</div>
															</td>	
														</tr>
														
														<tr>
															<td class="text-right">
																收货人手机：
															</td>
															
															<td class="text-left quantity">
																<div class="input-group btn-block"
																	style="max-width: 400px;">
																	<input type="text" id="tel"
																		name="tel"
																		 size="10"
																		class="form-control">
																</div>
															</td>
														</tr>
														
														<tr>
															<td class="text-right">
																收货人地址：
															</td>
															
															<td class="text-left quantity">
																<div class="input-group btn-block"
																	style="max-width: 400px;">
																	<input type="text" id="address"
																		name="address"
																		 size="1"
																		class="form-control">
																	
																</div>
															</td>
														</tr>
														
														<tr>
															<td class="text-right">
																备注：
															</td>
															
															<td class="text-left quantity">
																<div class="input-group btn-block"
																	style="max-width: 400px;">
																	<input type="text"
																		name="bz"
																		 size="1"
																		class="form-control">
																	
																</div>
															</td>
														</tr>
														
													</tbody>
												</table>
											</div>
										

									</div>
								</div>
	<br/><br/>							
								<div class="row">
									<div id="content_oc" class="col-sm-12">
										<h1>
											支付方式
										</h1>
										
											<div class="table-responsive cart-info">
												<table class="table table-bordered">
													
													<tbody>
														<tr>
															<td class="text-left">
																<img src="images/zhifubao.png"/>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										

<br/><br/>
										<div class="buttons">
											<div class="pull-left">
												<a href="index.php" class="btn btn-primary btn-default">继续购物</a>
											</div>
											<div class="pull-left">
												<a href="cart_clear.php" class="btn btn-primary btn-default">清空购物车</a>
											</div>
											<div class="pull-right">
												<a 
													href="javascript:zhifu();"
													class="tigger btn btn-primary btn-primary">结账</a>
												
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

  <script type="text/javascript" src="js/jBox/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jBox/jquery.jBox-2.3.min.js"></script>
  <script type="text/javascript" src="js/jBox/i18n/jquery.jBox-zh-CN.js"></script>
  
  <link type="text/css" rel="stylesheet" href="js/jBox/Skins2/Blue/jbox.css"/>
  <style>
  .popup_cont {
    padding: 25px 10px 30px 10px;
    text-align: center;
}
  </style>
  <script>
  function zhifu(){
						
	            if($('#receiveName').val()==="" ){
	            	alert('收货人姓名不能为空！');
	            	return;
	            }
	            if($('#tel').val()==="" ){
	            	alert('收货人手机不能为空！');
	            	return;
	            }
	            
	            if (isNaN($('#tel').val())) { 
　　　　				alert("手机号请输入数字"); 
　　　　				return;
　　　　			} 
	            
	            if($('#address').val()==="" ){
	            	alert('收货人地址不能为空！');
	            	return;
	            }  
	  
				var html='<div class="popup_cont">'+
      					 '<p>扫一扫支付</p>'+
        				 '<strong>￥<font id="show_money_info">0.01元</font></strong>'+
        				 '<div style="width: 256px; height: 256px; text-align: center; margin-left: auto; margin-right: auto;" >' +
        				 '<image src="images/zfb.jpg" width="256" height="256" /></div>';
						
				var content = {

			    state1: {
			        content: html,
			        buttons: { '取消': 0,'支付':1 },
			        buttonsFocus: 0,
			        submit: function (v, h, f) {
			            if (v == 0) {
			                return true; // close the window
			            }
			            if (v == 1) {
			            	
			            	document.getElementById('myform').submit();
			                return true; 
			            }
			            return false;
			        }
			    }
			};
				$.jBox.open(content, '支付', 400, 450);		
						
			}
  </script>
  
  	
</body>
</html>
<?php
	mysqli_close($conn);//关闭数据库连接
		}
	}
?>