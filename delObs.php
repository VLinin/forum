<?php
session_start();
if(isset($_GET['ob'])){
    $idob=$_GET['ob'];
    $con=mysqli_connect("localhost","root","","f");
    $query=mysqli_query($con,"DELETE FROM `obsujd` WHERE `id_ob`=$idob");
    $url=$_SERVER['HTTP_REFERER'];
    header("location:$url");
}else{
    echo "<script>alert(\"Ошибка удаления!\")</script>";
}