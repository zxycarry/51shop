<?php
session_start();//����session
include("conn/conn.php");//�������ݿ������ļ�
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb"
	dir="ltr"
	class="com_content view-featured itemid-593 j35 mm-hover no-touch"
	slick-uniqueid="3">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=gbk">
		<title>��Ʒ�б�</title>
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
		function chklogin(){
			var username = "<?php echo isset($_SESSION['username'])?$_SESSION['username']:"";?>";
			if(username == ""){
				alert("���ȵ�¼��д���ۣ�");
				return false;
			}
			return true;
		}
    </script>
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="YES">

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
    <style>
        .com_users .page-header {
            border-color: #eeeeee
        }

        .com_users .login-wrap {
            margin-bottom: 60px
        }

        .com_users .login-wrap .login {
            max-width: 400px;
            margin: 0 auto;
            border: 1px solid #eeeeee
        }

        .com_users .login-wrap .login fieldset {
            padding-top: 20px
        }

        .com_users .login-wrap .page-header {
            padding: 20px
        }

        .com_users .login-wrap .page-header h1 {
            font-size: 15px;
            text-transform: none;
            color: #f0141e
        }

        .com_users .login-description {
            padding: 0 20px;
            margin-bottom: 20px
        }

        .com_users .other-links {
            padding: 20px;
            margin: 0;
            border-top: 1px solid #eeeeee
        }

        .com_users .other-links ul {
            margin: 0;
            padding: 0
        }

        .com_users .other-links ul li {
            list-style: none
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
            <!-- //LOGO -->

            <!-- MAIN NAVIGATION -->
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
<div id="t3-content" class="t3-content col-xs-12 col-sm-12 col-md-9 col-md-push-3">



<div id="mijoshop" class="mijoshop common-home">
<div class="container_oc">
<ul class="breadcrumb">
</ul>
<?php
$id = $_GET['id'];//��ȡ��Ʒidֵ
if($id > 0){//�����Ʒidֵ����0
	$sql = mysqli_query($conn,"select id,mingcheng,jianjie,shichangjia,tupian,huiyuanjia,typeid from tb_shangpin where id=".$id);//ִ�в�ѯ���
	$info = mysqli_fetch_array($sql);//����ѯ������ص�������
	$typeid = $info['typeid'];//��ȡ��Ʒ��Ӧ���id��ֵ
?>
<div class="row">
<div id="content_oc" class="col-sm-12 view-product">
										
										<div class="row">
											<div class="col-xs-12 col-md-4 col-sm-4">
												<ul class="thumbnails" style="list-style: none">
													<li>
														<a class="thumbnail"
															href="#">
															<img src="<?php echo $info['tupian'];?>">
														</a>
													</li>
												</ul>
											</div>
											<div class="col-xs-12 col-md-8 col-sm-8">
												<div style="margin-left:30px;margin-top:20px">
												
												<h1 class="product-title">
													<?php echo $info['mingcheng'];?>
												</h1>
												
												<div class="rating">
													<p>
														<span class="fa fa-stack"><i
															class="fa fa-star fa-stack-1x"></i><i
															class="fa fa-star-o fa-stack-1x"></i>
														</span>
														<span class="fa fa-stack"><i
															class="fa fa-star-o fa-stack-1x"></i>
														</span>
														<span class="fa fa-stack"><i
															class="fa fa-star-o fa-stack-1x"></i>
														</span>
														<span class="fa fa-stack"><i
															class="fa fa-star-o fa-stack-1x"></i>
														</span>
														<span class="fa fa-stack"><i
															class="fa fa-star-o fa-stack-1x"></i>
														</span>
														<a href="?id=<?php echo $id;?>&action=showcomment">�鿴����</a> |
														<a href="?id=<?php echo $id;?>&action=writecomment" onClick="return chklogin()">д����</a>
													</p>
													
													
												</div>
												
												<ul class="list-unstyled price">
													<li>
														<h2>
															<?php echo $info['huiyuanjia'];?>Ԫ
														</h2>
													</li>
													
												</ul>
													<ul class="list-unstyled price">
														
														<li>
															ԭ�ۣ�<?php echo $info['shichangjia'];?>Ԫ
														</li>
													</ul>
													<div id="product">
													<hr>
													<div class="form-group">
														<label class="control-label" for="shuliang">
															����
														</label>
														<input type="number" name="quantity" value="1" min="1" size="2"
															id="shuliang" class="form-control">
														<br>

														<div class="btn-group">
															<button type="button" onClick="addCart()"
																class="btn btn-primary btn-primary">
																<i class="fa fa-shopping-cart"></i> ��ӵ����ﳵ
															</button>
														</div>

													</div>
												</div>
												
												</div>
					
											</div>
											<div class="col-sm-12 description_oc clearfix">
												<ul class="nav nav-tabs htabs">
													<li class="active" style="width:150px">
														<a href="#tab-description" data-toggle="tab"
															aria-expanded="true">��Ʒ����</a>
													</li>
													
													<!--Comments-->
													<!--Comments-->
												</ul>
												<div class="tab-content" style="border: 1px solid #eee;overflow: hidden;">
													<div class="tab-pane active" id="tab-description">
														
															<?php echo $info['jianjie'];?>
														
														
													</div>
												</div>

											</div>
										</div>

<?php
}else{
	echo "<script>alert('���Ĳ�������');window.location.href='index.php';</script>";//������ʾ��Ϣ
}
if(!isset($_GET['action'])){//�����ַ����action����ֵδ����
?>
<div class="t3-module related-products">
    <h3 class="module-title ">�����Ʒ</h3>

    <div class="row">
         
		<?php
          	$sql = mysqli_query($conn,"select id,mingcheng,huiyuanjia,tupian from tb_shangpin where typeid=".$typeid." and id!=".$id);//ִ�в�ѯ���
			while ($info = mysqli_fetch_array($sql)) {//����ѯ���ѭ�����ص�������
		?>
        
        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
            <div class="product-grid transition">
                <div class="actions">
                    <div class="image"><a href="goodsDetail.php?id=<?php echo $info['id'];?>"><img src="<?php echo $info['tupian'];?>"></a></div>
                    <div class="button-group">
                        <div class="cart">
                            <button class="btn btn-primary btn-primary" type="button" data-toggle="tooltip" title=""
                                    onclick='javascript:window.location.href="cart_add.php?goodsID=<?php echo $info['id'];?>&num=1"; ' data-original-title="���빺�ﳵ"><i
                                    class="fa fa-shopping-cart"></i></button>
                        </div>
                        
                    </div>
                </div>
                <div class="caption">
                    <div class="name" style="height:40px" ><a style="width:90%" href="goodsDetail.php?id=<?php echo $info['id'];?>"><span style="color:#0885B1">���ƣ�</span><?php echo $info['mingcheng'];?></a></div>
                   

                    <p class="price" style="margin-top:40px">
                        <span class="price-tax">�۸�<?php echo $info['huiyuanjia'];?> Ԫ</span>
                    </p>
                </div>
            </div>
        </div>
        <?php
			}
		?>
        
    </div>
</div>
<?php
}elseif(isset($_SESSION['username']) && isset($_GET['action']) && $_GET['action'] == 'writecomment'){//����û��ѵ�¼���ҵ�ַ����action������ֵΪwritecomment
?>
<form name="form1" method="post" action="saveComment.php?id=<?php echo $_GET['id'];?>" onSubmit="return chkinput(this)">
  <table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="150" bgcolor="#999999"><table width="530" border="0" align="center" cellpadding="0" cellspacing="1">
                  <script language="javascript">
		    function chkinput(form)
			{
			   if(form.title.value=="")
			   {
			     alert("��������������!");
				 form.title.select();
				 return(false);
			   }
			   if(form.content.value=="")
			   {
			     alert("��������������!");
				 form.content.select();
				 return(false);
			   }
			   return(true);
			}
		  </script>
                  <tr>
                    <td width="90" height="25" bgcolor="#FFFFFF"><div align="center">�������⣺</div></td>
                    <td width="430" bgcolor="#FFFFFF"><div align="left">
                        <input type="text" name="title" size="30" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
                    </div></td>
                  </tr>
                  <tr>
                    <td height="125" bgcolor="#FFFFFF"><div align="center">�������ݣ�</div></td>
                    <td height="125" bgcolor="#FFFFFF"><div align="left">
                        <textarea name="content" cols="70" rows="10" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></textarea>
                    </div></td>
                  </tr>
              </table></td>
            </tr>
        </table>
          <table width="530" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><div align="center">
                  <input name="submit2" type="submit" class="buttoncss" value="����">
&nbsp;&nbsp;&nbsp;<a href="goodsDetail.php?id=<?php echo $_GET['id'];?>&action=showcomment">�鿴����Ʒ����</a></div></td>
            </tr>
          </table>
      </form>
<?php
}elseif(isset($_GET['action']) && $_GET['action'] == 'showcomment'){//�����ַ����action������ֵΪshowcomment
	$sql=mysqli_query($conn,"select count(*) as total from tb_pingjia where goodsID='".$_GET['id']."'");//ִ�в�ѯ���
	$info=mysqli_fetch_array($sql);//����ѯ������ص�������
	$total=$info['total'];//��ȡ��ѯ��¼��
	if($total==0){//�����ѯ��¼��Ϊ0
		echo "<h3 aligh='center'>����Ʒ����������Ϣ!</h3>";//����ַ���
	}else{
?>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#FDE9C9">
          <td height="25" colspan="4"><div align="center" style="color: #990000">��Ʒ����</div></td>
        </tr>
        <?php
	       $pagesize=2;//����ÿҳ��ʾ�ļ�¼��
		   $maxPage = ceil($total/$pagesize);//��ȡ��ҳ��
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
             $sql=mysqli_query($conn,"select * from tb_pingjia where goodsID='".$_GET['id']."' order by time desc limit ".($page-1)*$pagesize.",$pagesize ");//ִ�в�ѯ���
             while($info=mysqli_fetch_array($sql)){//����ѯ���ѭ�����ص�������
		  ?>
        <tr>
          <td width="15%"><div align="center">����ʱ�䣺</div></td>
          <td width="60%"><div align="left"><?php echo $info['time'];?></div></td>
          <td width="15%"><div align="right">�����ߣ�</div></td>
          <td width="10%"><div align="left">
          <?php 
			 echo $info['username'];//����û���
		  ?>
          </div></td>
        </tr>
        <tr>
          <td height="20"><div align="center">�������⣺</div></td>
          <td height="20" colspan="3"><div align="left"><?php echo $info['title'];?></div></td>
        </tr>
        <tr>
          <td height="40"><div align="center">�������ݣ�</div></td>
          <td height="40" colspan="3" valign="bottom"><div align="left"><?php echo $info['content'];?></div></td>
        </tr>
        <tr>
          <td height="10" colspan="4" background="images/line1.gif"></td>
        </tr>
        <?php
		   }
		  ?>
      </table>
<div class="row pagination">
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" align="right">��ǰҳ����[<?php echo $page;?>/<?php echo $maxPage;?>]&nbsp;
	<?php if($page>1){?>
	<a href="goodsDetail.php?page=1&id=<?php echo $_GET['id'];?>&action=showcomment">��һҳ</a>��<a href="goodsDetail.php?page=<?php echo $page-1;?>&id=<?php echo $_GET['id'];?>&action=showcomment">��һҳ</a>
	<?php
	}
	if($page<$maxPage){
	?>
	��<a href="goodsDetail.php?page=<?php echo $page+1;?>&id=<?php echo $_GET['id'];?>&action=showcomment">��һҳ</a>��<a href="goodsDetail.php?page=<?php echo $maxPage;?>&id=<?php echo $_GET['id'];?>&action=showcomment">���һҳ&nbsp;</a>
	<?php }
	?>
	</td>
  </tr>
</table>
</div>
<?php
	}
}
?>
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
</div>
<script src="js/jquery.1.3.2.js" type="text/javascript"></script>
<script>
	// ��ȡҳ�����
		function GetQueryString(name) {
    		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
   			var r = window.location.search.substr(1).match(reg);
    		if (r != null) return unescape(r[2]);
   			return null;
		}
function addCart(){
	var num=$('#shuliang').val();
	if(num<1){
		alert('��������С��1��');
		return;
	}
	var id=GetQueryString("id");
	window.location.href="cart_add.php?goodsID="+id+"&num="+num;
}
</script>
</body>
</html>
