<?php
require_once 'database.php';

function insertMember() 
{
    $bdd = new database();
    $bdd->connexion();
    $login = $_POST['login'];
    $password = $_POST['p'];
    $mail = $_POST['mail'];
    $query = $bdd->getBdd()->prepare($bdd->addMember());
    $array = array(
        'login' => $login,
        'password' => $password,
        'mail' => $mail
    );
    $query->execute($array);
}

if (isset($_POST['submit'])){
    insertMember();
   header('Location: ../web_page/welcome.php');
}
?>