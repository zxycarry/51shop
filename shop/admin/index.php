<!doctype html>
<html lang="zh">
<head>
    <meta charset="gbk">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>��¼</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<div class="htmleaf-container">
    <div class="wrapper">
        <div class="container">
            <h1>Welcome</h1>
            <script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
            <script language="javascript">
                function chkinput(form){
                    if(form.name.value==""){
                        alert("�������û���!");
                        form.name.select();
                        return(false);
                    }
                    if(form.pwd.value==""){
                        alert("�������û�����!");
                        form.pwd.select();
                        return(false);
                    }

                    return(true);
                    //��Ч
                    event.preventDefault();
                    $('form').fadeOut(500);
                    $('.wrapper').addClass('form-success');

                }
            </script>

            <form class="form" name="form1" method="post" action="chkadmin.php" onSubmit="return chkinput(this)">
                <input type="text" name="name" placeholder="�û���">
                <input type="password" name="pwd" placeholder="����">
                <button type="submit" name="imageField" id="login-button">��¼</button>
            </form>
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';color:#000000">
    <h1>51���̳Ǻ�̨����ϵͳ</h1>
</div>
</body>
</html>