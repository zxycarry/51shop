<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
 class chkinput{//������
   var $name;//��������
   var $pwd;//��������

   function chkinput($x,$y)//���幹�췽��
    {
     $this->name=$x;//Ϊ���Ը�ֵ
     $this->pwd=$y;//Ϊ���Ը�ֵ
    }

   function checkinput()//�������û���������ķ���
   {
     include("conn/conn.php");//�������ݿ������ļ�
     $sql=mysqli_query($conn,"select * from tb_admin where name='".$this->name."'");//ִ�в�ѯ���
     $info=mysqli_fetch_array($sql);//����ѯ������ص�������
     if($info==false)//�����ѯ���Ϊ��
       {
          echo "<script language='javascript'>alert('�����ڴ˹���Ա��');history.back();</script>";//������ʾ��Ϣ
          exit;//�˳�����
       }
      else
       {
          if($info['pwd']==$this->pwd){//�ж��û����������Ƿ���ȷ
               header("location:default.php");//ҳ����ת
            }
          else
           {
             echo "<script language='javascript'>alert('�����������');history.back();</script>";//������ʾ��Ϣ
             exit;//�˳�����
           }

      }    
   }
 }


    $obj=new chkinput(trim($_POST['name']),md5(trim($_POST['pwd'])));//��������
    $obj->checkinput();//ִ�ж����еķ���

?>