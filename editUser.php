<?php
$login=htmlspecialchars($_GET['log']);
$password=md5(sha1(htmlspecialchars($_POST['pas'])));
$block=htmlspecialchars($_POST['block']);
$priv=htmlspecialchars($_POST['priv']);
$con=mysqli_connect("localhost","root","","f");
$zp="UPDATE `users` SET `password`='$password',`priv`='$priv',`block`='$block' WHERE `login`='$login'";
$query=mysqli_query($con,$zp);
header("location: users.php");