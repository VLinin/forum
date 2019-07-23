<?php
session_start();
$thema=htmlspecialchars($_GET['thema']);
$idob=htmlspecialchars($_GET['obs']);
$con=mysqli_connect("localhost","root","","f");
$queryString="SELECT `enabl` FROM `tech`";
$query=mysqli_query($con,$queryString);
$tech=mysqli_fetch_assoc($query);
$sost=$tech['enabl'];
$_SESSION['tech']=$sost;
if(!$tech['enabl']==0) {
    $prov = 1;
    if (isset($_SESSION['name'])) {
        if ($_SESSION['priv'] == 1||$_SESSION['priv'] == 2) {
            unset($prov);
        }

    } else header("location:auth.php");
}
if(!isset($prov)){
?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<header>
    <div class="hleft">
        <a href="index.php"><h1>Forum</h1>
            <span>ver. alfa 0.1</span></a>
    </div>
    <div class="hright">
        <?php
        if(isset($_SESSION['name'])){

            echo $_SESSION['name']." / <a href='unset.php'>выход</a>";
            if($_SESSION['priv']==1){
                echo "<br><a href='users.php'>Пользователи</a><br><a href='tech.php'>Включение технических работ</a> ($sost)";
            }
            if($_SESSION['priv']==2){
                echo "<br>Модератор тем: <br>";
                $ModerId=$_SESSION['id'];
                $queryString="SELECT `themes`.`Nazvanie` FROM `moder` JOIN `themes` ON `moder`.`ID_thema`=`themes`.`ID_Thema` and `moder`.`ID_user`= '$ModerId'";
                $query=mysqli_query($con,$queryString);
                while($zap=mysqli_fetch_assoc($query)){
                    echo $zap['Nazvanie']."<br>";
                }
            }
        }
        else{
            echo "<a href=\"auth.php\">войти</a> / <a href=\"reg.php\">регистрация</a>";
        }
        ?>
    </div>
</header>
<div class="container">
<?php if(isset($_SESSION['block'])) {if ($_SESSION['block']!=1 && isset($_SESSION['name'])){?>
    <div class="add">
    <h1>Новая запись</h1>
    <form method="get" action="add.php">
        <textarea rows="4" name="text"></textarea>
        <input type="text" style="display: none" name="us" value="<?php echo $_SESSION['name'] ?>">
        <input type="text" style="display: none" name="obs" value="<?php echo $idob ?>">
        <input class="OKadd" type="submit" value="OK"><br>
    </form>
    </div>

<?php } }?>

<div class="themes">
    <?php
    $con=mysqli_connect("localhost","root","","f");
    $queryString="SELECT  `note`.`dateofnote`, `note`.`textofnote`,`users`.`login`,`note`.`ID_Note` FROM `note`,`users` WHERE `note`.`ID_User`=`users`.`ID_User` and `note`.`id_theme`='$idob'";
    $query=mysqli_query($con,$queryString);
    if (!empty($query)){
    while ($zap=mysqli_fetch_assoc($query))
    {?>
        <div class='thema'>

                <h3><?php echo $zap['login']?></h3>
                <span><?php echo $zap['dateofnote']?></span>

            <p>
                <?php echo $zap['textofnote']?><br>
                <?php
                $id=$zap['ID_Note'];
                if (isset($_SESSION['name'])){
                if ($_SESSION['name']===$zap['login'] || $_SESSION['priv']==1){

                ?>
            <form action="edit.php" method='get'>
                <textarea rows="2" name="txt"></textarea>
                <input type="text" style="display: none" name="id" value="<?php echo "$id" ?>">
                <input type='submit' value="отредактировать">
            </form>
            <?php }
            $userid = $_SESSION['id'];
            $moderProv = mysqli_query($con, "SELECT `ID_Moder` FROM `moder` WHERE `moder`.`ID_user`=$userid and `moder`.`ID_thema`=(SELECT `ID_thema` FROM `themes` WHERE `Nazvanie`='$thema')");
            if ($zap['login'] === $_SESSION['name'] || $_SESSION['priv'] == 1 || ($_SESSION['priv'] == 2 && !empty(mysqli_fetch_row($moderProv)))) {
            ?>
            <form action="del.php" method='get'> <input type='submit' value="удалить">
                <input type="text" style="display: none" name="id" value="<?php echo "$id" ?>">
            </form>
            <?php  }}
            ?>
            </p>
        </div>
    <?php  }}else echo "Записей нет!";
    ?>
</div>
</div>
<style>
    body{
        padding: 0;
        margin: 0;
        background-color: azure;
    }
    header{
        background-color: royalblue;
        height: 130px;
        display: flex;
        flex-direction: row;
        align-content: space-between;
        color: aliceblue;
        border-bottom:4px solid darkgray;
        margin-bottom:20px;
    }
    .hleft{
        padding-left:40px ;
    }
    .hleft a,.hright a{
        text-decoration: none;
        color: azure;
    }
    .hleft a h1{
        margin-left: 30px;
        text-decoration: underline;
        margin-bottom:1px ;
        font-size: 3em;
        margin-top: 10px;
    }
    .hleft a span{
        margin-left:60px ;
    }
    .hright{
        margin-top: 10px;
        margin-right: 30px;
        margin-left: auto;
    }

    .container{
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 50px;
        background: dimgrey;
        padding: 15px;
        margin: 0 auto;
        width: 75%;
        border-left:1.5px solid dimgrey;
        border-right:1.5px solid dimgrey;
        margin-bottom: 30px;
    }
    .themeborder{

        border:1.5px solid dimgrey;
        border-top:5px solid dimgrey;
        border-bottom:5px solid dimgrey;
        padding: 3px;
        padding-left: 10px;
        background: darkgray;
    }
    .themeborder a{
        text-decoration: none;
        color: azure;
    }
    .themeborder h2{
        margin:0;
    }
    .themes{
        display: flex;
        flex-direction: column-reverse;
        width: 85%;
    }
    .thema{
        padding-left: 10px;
        background: lightgray;
        border-bottom: 1px solid dimgrey;
    }
    .thema:first-child{
        border-bottom: 0px solid dimgrey;
    }
    .thema h3{
        margin: 0;
    }
    .thema p{
        margin: 0;
        font-style: italic;
    }
    .thema a{
        text-decoration: none;
        color: black;
    }

    .add{
        border-radius: 50px;
        background: darkgray;
        color: azure;
        width: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;

    }
    textarea{
        width: 100%;
    }
    .OKadd{
        margin-left: 75%;
    }
</style>
</body>
</html>
<?php }else{
    echo "Технические работы <br>";
    echo "<a href=\"auth.php\">Попробуйте авторизоваться</a>";
}
?>