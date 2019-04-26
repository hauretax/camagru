<?php
session_start();
$data = $_POST['image'];
$image = explode('base64,',$data);
$path =  tempnam("../user/". $_SESSION['a_user'], "FOO").".png";
$f=fopen("$path","wb");
fwrite($f,base64_decode($image[1]));
fclose($f);
?>