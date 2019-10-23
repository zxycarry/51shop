<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
 class chkinput{//定义类
   var $name;//定义属性
   var $pwd;//定义属性

   function chkinput($x,$y)//定义构造方法
    {
     $this->name=$x;//为属性赋值
     $this->pwd=$y;//为属性赋值
    }

   function checkinput()//定义检测用户名和密码的方法
   {
     include("conn/conn.php");//包含数据库连接文件
     $sql=mysqli_query($conn,"select * from tb_admin where name='".$this->name."'");//执行查询语句
     $info=mysqli_fetch_array($sql);//将查询结果返回到数组中
     if($info==false)//如果查询结果为空
       {
          echo "<script language='javascript'>alert('不存在此管理员！');history.back();</script>";//弹出提示信息
          exit;//退出程序
       }
      else
       {
          if($info['pwd']==$this->pwd){//判断用户输入密码是否正确
               header("location:default.php");//页面跳转
            }
          else
           {
             echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";//弹出提示信息
             exit;//退出程序
           }

      }    
   }
 }


    $obj=new chkinput(trim($_POST['name']),md5(trim($_POST['pwd'])));//创建对象
    $obj->checkinput();//执行对象中的方法

?>