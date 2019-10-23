<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include("conn/conn.php");//包含数据库连接文件
$username=$_POST['username'];//获取用户输入的用户名
$userpwd=md5($_POST['userpwd']);//获取用户输入的密码
/*$yz=$_POST['yz'];
$num=$_POST['num'];
if(strval($yz)!=strval($num)){
  echo "<script>alert('验证码输入错误!');history.go(-1);</script>";
  exit;
 }*/
class chkinput{//定义类
   var $name;//定义属性
   var $pwd;//定义属性

   function chkinput($x,$y){//定义构造方法
     $this->name=$x;//为属性赋值
     $this->pwd=$y;//为属性赋值
    }

   function checkinput(){//定义检测用户名和密码的方法
     include("conn/conn.php");//包含数据库连接文件
     $sql=mysqli_query($conn,"select * from tb_user where name='".$this->name."'");//执行查询语句
     $info=mysqli_fetch_array($sql);//将查询结果返回到数组中
     if($info==false){//如果查询结果为空
          echo "<script language='javascript'>alert('不存在此用户！');history.back();</script>";//弹出提示信息
          exit;//退出程序
       }
      else{
	      if($info['dongjie']==1){//如果查询结果中字段dongjie的值为1
			   echo "<script language='javascript'>alert('该用户已经被冻结！');history.back();</script>";//弹出提示信息
               exit;//退出程序
			}
          
          if($info['pwd']==$this->pwd)//如果用户密码输入正确
            {  
			   session_start();//启动session
	           $_SESSION['username']=$info['name'];//将登录用户名存储在session变量中
               header("location:index.php");//页面跳转
               exit;//退出程序
            }
          else {
             echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";//弹出提示信息
             exit;//退出程序
           }

      }    
   }
 }

    $obj=new chkinput(trim($username),trim($userpwd));//创建对象
    $obj->checkinput();//执行对象中的方法
?>