<?php
session_start();
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
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>FORUM</title>
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

    <section class="container">
        <div class="themeborder">
            <h2>Разделы:</h2>
            <?php
            if(isset($_SESSION['priv'])){
                if($_SESSION['priv']==1){
                    echo "<a href='addRazd.html'>Добавить</a>";
                }
            }
            ?>
        </div>
        <div class="themes">
            <?php

                $queryString="SELECT `Nazvanie`, `Opisanie` FROM `razdel`";
                $query=mysqli_query($con,$queryString);
                while ($zap=mysqli_fetch_assoc($query)){
                    $razdName=$zap['Nazvanie'];
            ?>
            <div class="thema">
                <a href=<?php echo "themes.php?razd=$razdName"; ?>>
                <h3><?php echo $razdName ?></h3>
                <p><?php echo $zap['Opisanie'] ?></p>
                </a>
            </div>
            <?php }?>
        </div>
        <div class="themeborder">
        </div>
    </section>


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
    </style>
</body>
</html>
<?php }else{
        echo "Технические работы <br>";
        echo "<a href=\"auth.php\">Попробуйте авторизоваться</a>";
    }
?>