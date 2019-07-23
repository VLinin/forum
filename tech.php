<?php
session_start();
$url=$_SERVER['HTTP_REFERER'];
if ($_SESSION['tech']==1){
    $con=mysqli_connect("localhost","root","","f");
    $queryString="UPDATE `tech` SET `enabl`=0 WHERE `id`=1";
    $query=mysqli_query($con,$queryString);
}else{
    $con=mysqli_connect("localhost","root","","f");
    $queryString="UPDATE `tech` SET `enabl`=1 WHERE `id`=1";
    $query=mysqli_query($con,$queryString);
}
header("location:$url");
/**
 * Created by PhpStorm.
 * User: VL
 * Date: 29.03.2018
 * Time: 16:46
 */