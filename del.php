<?php
session_start();
$us=$_SESSION['name'];
$id=$_GET["id"];

if (isset($us)&&isset($id)){
    $con=mysqli_connect("localhost","root","","f");
    mysqli_query($con,"DELETE FROM `note` WHERE `ID_Note`='$id'") or die(mysqli_error());
    $url=$_SERVER['HTTP_REFERER'];
    header("Location: $url");
}
else{
    echo "<script>alert('параметры не переданы');</script>";
}

?>