<?php
session_start();
$us=htmlspecialchars($_SESSION['name']);
$txt=htmlspecialchars($_GET['text']);
$obs=htmlspecialchars($_GET['obs']);
if (!empty($txt))
{
    $con=mysqli_connect("localhost","root","","f");
    $id=$_SESSION['id'];
    $queryString="INSERT INTO `note`(`ID_User`, `dateofnote`, `textofnote`,`id_theme`) VALUES ('$id',now(),'$txt',$obs)";
    mysqli_query($con,$queryString) or die(mysqli_error());
    $url=$_SERVER['HTTP_REFERER'];
    header("Location: $url");
}else{
    echo "<script>alert('Text is empty')</script>";
}

?>