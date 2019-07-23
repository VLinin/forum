<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
<div>
    <h1>Регистрация</h1>
    <form method="post">
        Логин<br>
        <input type="text" name="log"><br>
        Mail:<br>
        <input type="email" name="mail"><br>
        Пароль:<br>
        <input type="password" name="pas"><br>
        Пароль(x2):<br>
        <input type="password" name="checkPas"><br>
        <input type="submit" value="OK"><br>
    </form>
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
        margin-bottom: 15px;
    }
    h1{
        color: azure;
    }
</style>
</body>
</html>
<?php
session_start();
if (isset($_POST['log']) && isset($_POST['mail']) && isset($_POST['pas']) && isset($_POST['checkPas']))
{
if (!empty($_POST['log']) && !empty($_POST['mail']) && !empty($_POST['pas']) && !empty($_POST['checkPas']))
{
if ($_POST['pas']===$_POST['checkPas'])
{
$pas=md5(sha1(htmlspecialchars(trim($_POST['pas']))));
$log=htmlspecialchars(trim($_POST['log']));
$mail=htmlspecialchars(trim($_POST['mail']));

$con=mysqli_connect("localhost","root","","f");
if(checkLog($log,$mail,$con))
{
$queryString="INSERT INTO `users`( `login`, `password`, `mail`, `priv`,`block`) VALUES ('$log','$pas','$mail',0,0)";
mysqli_query($con,$queryString) or die(mysqli_error());
if(isset($_GET['pr'])){
    header("Location: users.php");
}else {header("Location: auth.php");}

} else echo "<script>alert(\"Логин или почта заняты!\")</script>";
}
else echo "<script>alert(\"Пароли не совпали!\")</script>";

}
else{
echo "<script>alert(\"Заполните все поля!\")</script>";
}
}

function checkLog($l,$m,$c){
$st="SELECT `login`, `mail` FROM `users` WHERE `login`='$l' OR `mail`='$m' ";
$query=mysqli_query($c,$st);
if (mysqli_affected_rows($c)>=1){
return false;
}
else return true;

}