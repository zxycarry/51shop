<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");//�������ݿ������ļ�
$username=$_POST['username'];//��ȡ�û�������û���
$userpwd=md5($_POST['userpwd']);//��ȡ�û����������
/*$yz=$_POST['yz'];
$num=$_POST['num'];
if(strval($yz)!=strval($num)){
  echo "<script>alert('��֤���������!');history.go(-1);</script>";
  exit;
 }*/
class chkinput{//������
   var $name;//��������
   var $pwd;//��������

   function chkinput($x,$y){//���幹�췽��
     $this->name=$x;//Ϊ���Ը�ֵ
     $this->pwd=$y;//Ϊ���Ը�ֵ
    }

   function checkinput(){//�������û���������ķ���
     include("conn/conn.php");//�������ݿ������ļ�
     $sql=mysqli_query($conn,"select * from tb_user where name='".$this->name."'");//ִ�в�ѯ���
     $info=mysqli_fetch_array($sql);//����ѯ������ص�������
     if($info==false){//�����ѯ���Ϊ��
          echo "<script language='javascript'>alert('�����ڴ��û���');history.back();</script>";//������ʾ��Ϣ
          exit;//�˳�����
       }
      else{
	      if($info['dongjie']==1){//�����ѯ������ֶ�dongjie��ֵΪ1
			   echo "<script language='javascript'>alert('���û��Ѿ������ᣡ');history.back();</script>";//������ʾ��Ϣ
               exit;//�˳�����
			}
          
          if($info['pwd']==$this->pwd)//����û�����������ȷ
            {  
			   session_start();//����session
	           $_SESSION['username']=$info['name'];//����¼�û����洢��session������
               header("location:index.php");//ҳ����ת
               exit;//�˳�����
            }
          else {
             echo "<script language='javascript'>alert('�����������');history.back();</script>";//������ʾ��Ϣ
             exit;//�˳�����
           }

      }    
   }
 }

    $obj=new chkinput(trim($username),trim($userpwd));//��������
    $obj->checkinput();//ִ�ж����еķ���
?>