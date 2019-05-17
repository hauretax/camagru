<?php
require_once 'database.php';
session_start();
function chang_log(){
    $bdd = new database();
    $bdd->connexion();
    $password = hash ('whirlpool', $_POST['p']);

    $query = $bdd->getBdd()->prepare("SELECT * FROM user WHERE login like :login");
    $query->bindValue(':login', $_SESSION['a_user']);
    $query->execute();
    $data = $query->fetch();
    
    echo "coucou2";
    print_r($data);
    if ($data){
        echo "coucou";
        if ($password === $data['password']){
            $query = $bdd->getBdd()->query('SELECT * FROM user');
            foreach($query as $e){
                if($_POST['login'] === $e['login']){
                    $_SESSION['error'] = "user with this name already exist";
                    echo "ok";
                    header('Location: ../web_page/user_setting.php');
                    exit;
                }
            }   
            $stmt = $bdd->getBdd()->prepare ("UPDATE user SET login= :log WHERE login like :login ");
            $stmt->bindParam(':login', $_SESSION['a_user']);
            $stmt->bindParam(':log', $_POST['login']);
            $stmt->execute();
            
            $avans = '/'.$_SESSION['a_user'].'/';
            $apres = '/'.$_POST['login'].'/';
            
            $q = $bdd->getBdd()->prepare ("UPDATE pictur
                SET file = REPLACE(file, :avans, :apres)");
                $q->bindParam(':avans', $avans);
                $q->bindParam(':apres', $apres);
                $q->execute();
                
                $q = $bdd->getBdd()->prepare ("UPDATE pictur
                SET login = :apres WHERE login LIKE :avans");
                $q->bindParam(':avans', $_SESSION['a_user']);
                $q->bindParam(':apres', $_POST['login']);
                $q->execute();
                
                rename(realpath(dirname(__FILE__))."/../user/".$_SESSION['a_user'], realpath(dirname(__FILE__))."/../user/".$_POST['login']);
                $_SESSION['a_user'] = $_POST['login'];
                
                $_SESSION['error'] = "user name as been sucsefull changed";
                echo "helo";}
                header('Location: ../web_page/user_setting.php');
                exit;
        }
}

function chang_mail(){
    if (!(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))){
        $_SESSION['error'] = "pleas give a valid email";
        header('Location: ../web_page/user_setting.php');
        exit;
    }
    $bdd = new database();
    $bdd->connexion();
    $password = hash ('whirlpool', $_POST['pa']);

    $query = $bdd->getBdd()->prepare("SELECT * FROM user WHERE login like :login");
    $query->bindValue(':login', $_SESSION['a_user']);
    $query->execute();
    $data = $query->fetch();
    
    
    if ($data){
            if ($password === $data['password']){
                $query = $bdd->getBdd()->query('SELECT * FROM user');
                foreach($query as $e){
                    if($_POST['mail'] === $e['mail']){
                    $_SESSION['error'] = "user with this email already exist";
                    echo "ok";
                    header('Location: ../web_page/user_setting.php');
                    exit;
                    }   
                }
                $stmt = $bdd->getBdd()->prepare ("UPDATE user SET mail= :log WHERE login like :login ");
                $stmt->bindParam(':login', $_SESSION['a_user']);
                $stmt->bindParam(':log', $_POST['mail']);
                $stmt->execute();
                $_SESSION['error'] = "user email as been sucsefull changed";
                header('Location: ../web_page/user_setting.php');
                exit;
            }
            $_SESSION['error'] = "bad password";
            header('Location: ../web_page/user_setting.php');
            exit;
    }
}

function chang_password(){
    $bdd = new database();
    $bdd->connexion();
    $password = hash ('whirlpool', $_POST['op']);
    $np = hash ('whirlpool', $_POST['np']);

    $query = $bdd->getBdd()->prepare("SELECT * FROM user WHERE login like :login");
    $query->bindValue(':login', $_SESSION['a_user']);
    $query->execute();
    $data = $query->fetch();
    
    
    if ($data){
            if ($password === $data['password']){
              if ($_POST['np'] !== $_POST['st']){
                $_SESSION['error'] = "not the same pasword";
                header('Location: ../web_page/user_setting.php');
                exit;
              }
                $stmt = $bdd->getBdd()->prepare ("UPDATE user SET password= :log WHERE login like :login ");
                $stmt->bindParam(':login', $_SESSION['a_user']);
                $stmt->bindParam(':log', $np);
                $stmt->execute();
                $_SESSION['error'] = "user pasword as been sucsefull changed";
                header('Location: ../web_page/user_setting.php');
                exit;
            }
            $_SESSION['error'] = "bad password";
            header('Location: ../web_page/user_setting.php');
            exit;
    }
}

    if (isset($_POST['C_N']))
        chang_log();
    if (isset ($_POST['C_M']))
        chang_mail();
    if (isset ($_POST['C_P']))
        chang_password();
header('Location: ../web_page/user_setting.php');
?>