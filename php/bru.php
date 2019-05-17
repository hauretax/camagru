<?php
require_once 'database.php';
session_start();
$bdd = new database();
$bdd->connexion();
    if (isset($_POST["submit"])){
        if ($_POST['p'] !== $_POST['st']){
            $_SESSION['nerror'] = "not the same pasword";
            header('Location: ../php/bru.php');
            exit;
        }
        echo $_POST['id'];
        $password = hash ('whirlpool', $_POST['p']);
        $query = $bdd->getBdd()->prepare("UPDATE user SET password= :log WHERE login like :id");
        $query->bindParam(':id', $_POST['id']);
        $query->bindParam(':log', $password);
        $query->execute();

    }
    else {

        $query = $bdd->getBdd()->prepare("SELECT * FROM user WHERE login like :login");
        $query->bindValue(':login', $_GET['log']);
        $query->execute();
        $data = $query->fetch(); 
        
        $login = $_GET['log'];
        $cle = $_GET['cle'];
    
        if ($data['cle'] === $_GET['cle']){
            echo "<form method=\"post\" action=\"../php/bru.php\">
            pasword <input type=\"text\" name=\"p\"><br/>
            again <input type=\"text\" name=\"st\"><br/>
            <input type=\"hidden\" name=\"id\" value=".$login."> 
            <input type=\"submit\" name=\"submit\" value=\"OK\">";
            echo $_SESSION['nerror'];
        }
    }
?>