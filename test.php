<?php
$path =  tempnam("../user/". $_SESSION['a_user'], "FOO").".png";
echo $path;
?>