<?php
if(!isset($_SESSION['username'])){//如果用户未登录
?>
<div id="toolbar">
    <div class="container">
        <div class="row">
            <div class="toolbar-ct col-xs-12 col-md-6  hidden-sm hidden-xs">
                <div class="toolbar-ct-1">
                    <div class="t3-module module " id="Mod87">
                        <div class="module-inner">
                            <div class="module-ct">

                                <div class="custom">
                                    <p><i class="fa fa-phone"></i> <span>电话：400-675-1066</span></p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="toolbar-ct toolbar-ct-right col-xs-12 col-md-6">
                <div class="toolbar-ct-3 ">
                    <div class="btn-group active">
                        <button onclick='javascript:window.location.href="login.php"; ' style="padding-right: 10px" type="button" class="btn btn-default dropdown-toggle"
                                data-toggle="dropdown"
                                aria-expanded="false">
                            	登录
                        </button>
                        <button onclick='javascript:window.location.href="register.php";'  type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            	注册
                        </button>
                    </div>
                </div>

                <div class="toolbar-ct-2 ">
                    <div class="t3-module module " id="Mod161">
                        <div class="module-inner">
                            <div class="module-ct">
                                <div class="mijoshop">
                                    <div class="container_oc">
                                        <div class="row">
                                            <div class="">
                                                <div id="cart" class="mini-cart">
                                                    <button onclick='javascript:window.location.href="cart_see.php";' class="shopping-cart">我的购物车</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}else{
?>
<div id="toolbar">
    <div class="container">
        <div class="row">
            <div class="toolbar-ct col-xs-12 col-md-6  hidden-sm hidden-xs">
                <div class="toolbar-ct-1">
                    <div class="t3-module module " id="Mod87">
                        <div class="module-inner">
                            <div class="module-ct">

                                <div class="custom">
                                    <p><i class="fa fa-phone"></i> <span>电话：400-675-1066</span></p></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="toolbar-ct toolbar-ct-right col-xs-12 col-md-6">
                <div class="toolbar-ct-3 ">
                    <div class="btn-group active">
                        <button style="padding-right: 10px" type="button" class="btn btn-default dropdown-toggle"
                                data-toggle="dropdown"
                                aria-expanded="false">
                            您好，<?php echo $_SESSION['username'];?>
                        </button>
                        <button onclick='javascript:window.location.href="modifyMember.php";' style="padding-right: 10px"  type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            修改
                        </button>
                        <button onclick='javascript:window.location.href="logout.php";'  type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            退出
                        </button>
                    </div>
                </div>

                <div class="toolbar-ct-2 ">
                    <div class="t3-module module " id="Mod161">
                        <div class="module-inner">
                            <div class="module-ct">
                                <div class="mijoshop">
                                    <div class="container_oc">
                                        <div class="row">
                                            <div class="">
                                                <div id="cart" class="mini-cart">
                                                    <button onclick='javascript:window.location.href="cart_see.php";' style="padding-right: 10px"  type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            我的购物车
                        </button>
                         <button onclick='javascript:window.location.href="orderList.php";' style="padding-right: 10px"  type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            我的订单
                        </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>