<?php
if(!isset($_SESSION['username'])){//����û�δ��¼
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
                                    <p><i class="fa fa-phone"></i> <span>�绰��400-675-1066</span></p></div>
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
                            	��¼
                        </button>
                        <button onclick='javascript:window.location.href="register.php";'  type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            	ע��
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
                                                    <button onclick='javascript:window.location.href="cart_see.php";' class="shopping-cart">�ҵĹ��ﳵ</button>
                                                    
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
                                    <p><i class="fa fa-phone"></i> <span>�绰��400-675-1066</span></p></div>
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
                            ���ã�<?php echo $_SESSION['username'];?>
                        </button>
                        <button onclick='javascript:window.location.href="modifyMember.php";' style="padding-right: 10px"  type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            �޸�
                        </button>
                        <button onclick='javascript:window.location.href="logout.php";'  type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            �˳�
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
                            �ҵĹ��ﳵ
                        </button>
                         <button onclick='javascript:window.location.href="orderList.php";' style="padding-right: 10px"  type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            �ҵĶ���
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