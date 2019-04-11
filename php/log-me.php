<?php
require_once 'database.php';

    if($_POST['login'] !== "" && $_POST['p'] !== "" && $_POST['submit'] === "OK"){
        $bdd = new database();
        $bdd->connexion();
        $query = $bdd->getBdd()->query('SELECT * FROM user');
        foreach($query as $e){
            $password = hash ('whirlpool', $_POST['p']);
            if ($_POST['login'] === $e['login'] && $password === $e['password']){
                header('Location: ../web_page/welcome.php');
            }
        }
    }
?>