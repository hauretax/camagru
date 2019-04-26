<?php
session_start();
require_once 'database.php';

    if($_POST['login'] !== "" && $_POST['p'] !== "" && $_POST['submit'] === "OK"){
        $bdd = new database();
        $bdd->connexion();
        $query = $bdd->getBdd()->query('SELECT * FROM user');
        foreach($query as $e){
            $password = hash ('whirlpool', $_POST['p']);
            if ($_POST['login'] === $e['login'] && $password === $e['password']){
                $_SESSION['a_user'] = "";
                header('Location: ../web_page/welcome.php');
            }
        }
        $_SESSION['a_user'] = $_POST['login'];
        header('Location: ../web_page/user-page.php');

    }
?>