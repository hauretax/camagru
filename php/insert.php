<?php
require_once 'database.php';

function insertMember() 
{
    if($_POST['login'] !== "" && $_POST['p'] !== "" && $_POST['p_a'] !== "" && $_POST['mail'] !== "" && $_POST['submit'] === "OK"){
        $bdd = new database();
        $bdd->connexion();
        $query = $bdd->getBdd()->query('SELECT * FROM user');
        foreach($query as $e){
            if($_POST['login'] === $e['login'] && $_POST['mail'] === $e['mail']){
               header('Location: ../web_page/welcome.php');
            }
        }
        if ($_POST['p'] === $_POST['p_a']){
            $login = $_POST['login'];
            $password = hash ('whirlpool', $_POST['p']);
            print ($password . "\n" . $_POST['p']);
            $mail = $_POST['mail'];
            $query = $bdd->getBdd()->prepare($bdd->addMember());
            $array = array(
                'login' => $login,
                'password' => $password,
                'mail' => $mail
            );
            $query->execute($array);
        }
    }
}

if (isset($_POST['submit'])){
    insertMember();
//header('Location: ../web_page/welcome.php');
}
?>