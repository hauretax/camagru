<?php
session_start();
$_SESSION['a_user'] = "";
header('Location: ../web_page/welcome.php');
?>