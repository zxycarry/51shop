<?php
session_start();//启动session
$_SESSION['producelist']="";//清空购物车中商品id
$_SESSION['quatity']="";//清空购物车中商品数量
header("location:cart_null.php");//页面跳转
?>