<div class="t3-navbar navbar-collapse collapse">
                    <div class="t3-megamenu animate slide" data-duration="400" data-responsive="true">
                        <ul itemscope="" itemtype=""
                            class="nav navbar-nav level0">
                            <li itemprop="name" data-id="435" data-level="1">
                                <a id="index" itemprop="url" class="" href="index.php" data-target="#">首页 </a>
                            </li>

<?php
	$sql=mysqli_query($conn,"select * from tb_type order by id desc");//执行查询操作
	$info=mysqli_fetch_array($sql);//将查询结果返回到数组中
 	if($info==false){//如果查询结果为空
		echo "本站暂无商品类别!";//输出字符串
   	}else{
		do{
			if(isset($_GET['type']) && $_GET['type'] == $info['id']){//如果地址栏参数type的值等于查询结果中id字段的值
?>
                            <li itemprop="name" data-id="510" data-level="1">
                                <a style="background-color:#78ABBC" itemprop="url" class="" href="goodsList.php?type=<?php echo $info['id'];?>" data-target="#"><?php echo $info['typename'];?></a>

                            </li>
<?php
			}else{
?>
							<li itemprop="name" data-id="510" data-level="1">
                                <a itemprop="url" class="" href="goodsList.php?type=<?php echo $info['id'];?>" data-target="#"><?php echo $info['typename'];?></a>

                            </li>
<?php
			}
		}while($info=mysqli_fetch_array($sql));//将查询结果循环返回到数组中
	}
?>
                        </ul>
                    </div>

                </div>
                
                 
 <script>
 // 获取页面参数
		function GetString(name) {
    		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
   			var r = window.location.search.substr(1).match(reg);
    		if (r != null) return unescape(r[2]);
   			return null;
		}
        var type=GetString('type');

        if(type==null){
        	var index = document.getElementById('index');  
             index.style.backgroundColor="#78ABBC";
        	
        }
       
 
 </script>