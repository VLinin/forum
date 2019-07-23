<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<div>
<h1>Авторизация</h1>
<form method="post">
    Логин<br>
    <input type="text" name="log"><br>
    Пароль:<br>
    <input type="password" name="pas"><br>
    <input type="submit" value="OK"><br>
</form>
<a href="reg.php">Регистрация</a>
    <a href="index.php">На главную</a><br>
    </div>
        <style>
            div{
                border-radius: 50px;
                background: royalblue;
                color: azure;
                width: 500px;
                margin:0 auto;
                margin-top: 50px;
                display: flex;
                align-items: center;
                align-content: center;
                flex-direction: column;
            }
            a{
                text-decoration: none;
                color: azure;
                margin-bottom: 5px;
            }
            h1{
                color: azure;
            }
        </style>
</body>
</html>
<?php
session_start();
if (isset($_POST['log']) && isset($_POST['pas']) && !empty($_POST['log']) && !empty($_POST['pas']))
{

    $log=htmlspecialchars(trim($_POST['log']));
    $pas=md5(sha1(htmlspecialchars(trim($_POST['pas']))));
    $con=mysqli_connect("localhost","root","","f");
    $zp="SELECT `id_user`,`login`,`password`,`priv`,`block` FROM `users` where (`login`='$log' or `mail`='$log') and `password`='$pas'";
    $query=mysqli_query($con,$zp);
    if (mysqli_affected_rows($con)>=1)
    {
        $zap=mysqli_fetch_assoc($query);
        $_SESSION['name']=trim($zap['login']);
        $_SESSION['priv']=trim($zap['priv']);
        $_SESSION['id']=trim($zap['id_user']);
        $_SESSION['block']=trim($zap['block']);
        header("location: index.php");
    }
    else
    {
        echo "<script>alert(\"Ошибка входа!\")</script>";
    }
}
