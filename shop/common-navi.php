<div class="t3-navbar navbar-collapse collapse">
                    <div class="t3-megamenu animate slide" data-duration="400" data-responsive="true">
                        <ul itemscope="" itemtype=""
                            class="nav navbar-nav level0">
                            <li itemprop="name" data-id="435" data-level="1">
                                <a id="index" itemprop="url" class="" href="index.php" data-target="#">��ҳ </a>
                            </li>

<?php
	$sql=mysqli_query($conn,"select * from tb_type order by id desc");//ִ�в�ѯ����
	$info=mysqli_fetch_array($sql);//����ѯ������ص�������
 	if($info==false){//�����ѯ���Ϊ��
		echo "��վ������Ʒ���!";//����ַ���
   	}else{
		do{
			if(isset($_GET['type']) && $_GET['type'] == $info['id']){//�����ַ������type��ֵ���ڲ�ѯ�����id�ֶε�ֵ
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
		}while($info=mysqli_fetch_array($sql));//����ѯ���ѭ�����ص�������
	}
?>
                        </ul>
                    </div>

                </div>
                
                 
 <script>
 // ��ȡҳ�����
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