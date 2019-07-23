<?php
session_start();
if (!empty($_POST['nazv'])&&!empty($_POST['opisanie'])){
    $nazvanie=htmlspecialchars($_POST['nazv']);
    $opisanie=htmlspecialchars($_POST['opisanie']);
    $con=mysqli_connect("localhost","root","","f");
    mysqli_set_charset('utf8');
    $queryString="INSERT INTO `razdel`(`Nazvanie`, `Opisanie`) VALUES('$nazvanie','$opisanie')";
    $query=mysqli_query($con,$queryString);
    header("location:index.php");
}
else echo "<script>alert(\"Заполните все поля!\")</script>";

?>
