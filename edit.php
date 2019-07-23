<?php
session_start();
$us=$_SESSION['name'];
$txt=htmlspecialchars($_GET['txt']);
$id=$_GET['id'];
if (!empty($txt))
{
    $con=mysqli_connect("localhost","root","","f");
    mysqli_query($con,"UPDATE `note` SET `dateofnote`=now(),`textofnote`='$txt' WHERE `id_note`='$id'") or die(mysqli_error());
    $url=$_SERVER['HTTP_REFERER'];
    header("Location: $url");
}else{
    echo "<script>alert('Text is empty')</script>";
}

?>