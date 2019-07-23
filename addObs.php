<?php
session_start();
if (!empty($_POST['nazv'])&&!empty($_POST['opisanie'])){
    $nazvanie=htmlspecialchars($_POST['nazv']);
    $opisanie=htmlspecialchars($_POST['opisanie']);
    $userid=$_SESSION['id'];
    $thema=$_SESSION['thema'];
    $con=mysqli_connect("localhost","root","","f");
    $query=mysqli_query($con,"SELECT `ID_Thema` FROM `themes` WHERE `Nazvanie`='$thema'");
    $themarr=mysqli_fetch_assoc($query);
    $themaid=$themarr['ID_Thema'];
    mysqli_set_charset('utf8');
    $queryString="INSERT INTO `obsujd`(`ID_user`, `Nazvanie`, `Opisanie`, `ID_Thema`) VALUES ('$userid','$nazvanie','$opisanie','$themaid')";
    $query=mysqli_query($con,$queryString);
    header("location:obs.php?thema=$thema");

}
else echo "<script>alert(\"Заполните все поля!\")</script>";

?>