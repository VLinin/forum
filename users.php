<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="div">
    <h1>Пользователи</h1>
<?php
session_start();
$con=mysqli_connect("localhost","root","","f");
$zp="SELECT * FROM `users`";
$query=mysqli_query($con,$zp);
while ($zap=mysqli_fetch_assoc($query)){
    $login=$zap['login'];
?>
    <form method="post" action="editUser.php?log=<?php echo $login;?>">
        id: <input type="text" name="id" disabled="disabled" value="<?php echo $zap['ID_User']?>">
        login: <input type="text" name="log" disabled="disabled" value="<?php echo $login?>">
        password: <input type="text" name="pas" value="<?php echo $zap['password']?>">
        mail: <input type="text" name="mail" disabled="disabled" value="<?php echo $zap['mail']?>">
        priv: <input type="text" name="priv" value="<?php echo $zap['priv']?>">
        block: <input type="radio" name="block" value="1" <?php if($zap['block']==1){echo "checked";} ?>>on
            off<input type="radio" name="block" value="0" <?php if($zap['block']==0){echo "checked";} ?>>
        <input type="submit" value="Записать"><br>
    </form>
    <?php } ?>

    <a href="index.php">На главную</a><br>
    <a href="reg.php?pr=1">Регистрация</a>
</div>
<style>
    .div{
        border-radius: 50px;
        background: royalblue;
        color: azure;
        width: 90%;
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

