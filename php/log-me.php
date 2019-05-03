<?php
session_start();
function logMember()
{
    require_once 'database.php';

        $bdd = new database();
        $bdd->connexion();
        $password = hash ('whirlpool', $_POST['p']);
        $query = $bdd->getBdd()->query('SELECT * FROM user  WHERE login = \''.$_POST['login'].'\'');
        $data = $query->fetch();
        if ($data['actif'] != '1'){
            $_SESSION['a_user'] = "";
            $_SESSION['error'] = "ur acount is not activated";
            header('Location: ../web_page/welcome.php');
            exit; 
        }
        if ($data)
            if ($password === $data['password']){
                $_SESSION['a_user'] = $_POST['login'];
                $_SESSION['error'] = "";
                header('Location: ../web_page/user-page.php');
                exit;
            }
        else
            $_SESSION['a_user'] = "";
            $_SESSION['error'] = "not good login or password";
    }
    
    if($_POST['login'] !== "" && $_POST['p'] !== "" && $_POST['submit'] === "OK"){
        logMember();
        header('Location: ../web_page/welcome.php');;
}

?>