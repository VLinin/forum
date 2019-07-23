<?php
session_start();
if (!empty($_POST['nazv'])&&!empty($_POST['opisanie'])){
    $nazvanie=htmlspecialchars($_POST['nazv']);
    $opisanie=htmlspecialchars($_POST['opisanie']);
    $r=$_SESSION['r'];
    $con=mysqli_connect("localhost","root","","f");
    mysqli_set_charset('utf8');
    $queryString="INSERT INTO `themes`( `Nazvanie`, `Opisanie`, `ID_Razdel`) VALUES ('$nazvanie','$opisanie',(SELECT `razdel`.`ID_Razdel` FROM `razdel` WHERE `razdel`.`Nazvanie`='$r'))";
    $query=mysqli_query($con,$queryString);
    header("location:themes.php?razd=$r");
}
else echo "<script>alert(\"Заполните все поля!\")</script>";

?>