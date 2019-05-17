<?php
session_start();
function logMember()
{
    require_once 'database.php';

        $bdd = new database();
        $bdd->connexion();
        $password = hash ('whirlpool', $_POST['p']);
        $query = $bdd->getBdd()->prepare('SELECT * FROM user  WHERE login like :login');
        $query->bindValue(':login', $_POST['login']);
        $query->execute();
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
    
    function sendmail(){
        require_once 'database.php';

        $bdd = new database();
        $bdd->connexion();
        $query = $bdd->getBdd()->prepare("SELECT * FROM user WHERE login like :login");
        $query->bindValue(':login', $_POST['login']);
        $query->execute();
        $data = $query->fetch(); 
        if(!(isset($data))){
            $_SESSION['error'] = "not good login";
            header('Location: ../web_page/welcome.php');;
            exit;
        }
        $cle = md5(microtime(TRUE)*100000);
        $from = "gentil@petit.pehon";
        
        $subject = "onoon vous avez oublier vore password :(";
        $message = "Ne vous en faite pas voicit un lien pour pouvoir revenire fair des photo avec nous <3 :).
        
        Mais tout dabors vous allez devoir activer votre compte, veulliez cliquer sur le lien ci desssous:
        http://localhost/php/bru.php?log=".urlencode($_POST['login']).'&cle='.urlencode($cle) . '
        
        
        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.';
        $headers = "From:" . $from;
        mail($data['mail'],$subject,$message,$headers);
        echo "sdfsdf".$data['mail'];
        $query = $bdd->getBdd()->prepare("UPDATE user SET cle= :log WHERE login like :login");
        $query->bindParam(':login', $_POST['login']);
        $query->bindParam(':log', $cle);
        $query->execute();
        $_SESSION['error'] = "go look ur mail ;)";
        
    }

    if(isset($_POST['f_p'])){
        sendmail();
        header('Location: ../web_page/welcome.php');;
        exit;
    }
    if($_POST['login'] !== "" && $_POST['p'] !== "" && $_POST['submit'] === "OK"){
        logMember();
        header('Location: ../web_page/welcome.php');;
}

?>