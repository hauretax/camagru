
<?php
session_start ();
require_once 'database.php';

function insertMember() 
{
    if($_POST['login'] !== "" && $_POST['p'] !== "" && $_POST['p_a'] !== "" && $_POST['mail'] !== "" && $_POST['submit'] === "OK"){
        $bdd = new database();
        $bdd->connexion();
        $query = $bdd->getBdd()->query('SELECT * FROM user');
        foreach($query as $e){
            if($_POST['login'] === $e['login'] || $_POST['mail'] === $e['mail']){
                $_SESSION['error'] = "user with this name or email already exist";
                echo "ok";
             header('Location: ../web_page/welcome.php');
             exit;
            }
        }
        if ($_POST['p'] === $_POST['p_a']){
            if (!(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)))  
                $_SESSION['error'] = "pleas give a valid email";
            else{
                $login = $_POST['login'];
                $password = hash ('whirlpool', $_POST['p']);
                $cle = md5(microtime(TRUE)*100000);
                $mail = $_POST['mail'];
                $query = $bdd->getBdd()->prepare($bdd->addMember());
                $array = array(
                    'login' => $login,
                    'password' => $password,
                    'mail' => $mail
                );
                $query->execute($array);
                $from = "test@test.com";
                $subject = "Voulez fair des photo ?";
                $message = "Venez prendre des photo !
                
                Mais tout dabors vous allez devoir activer votre compte, veulliez cliquer sur le lien ci desssous:
                http://localhost:8075/demo/camagru/php/validation.php?log=".urlencode($login).'$cle='.urlencode($cle) . '
    
    
                ---------------
                Ceci est un mail automatique, Merci de ne pas y répondre.';
                $headers = "From:" . $from;
                mail($_POST['mail'],$subject,$message,$headers);

                mkdir('../user/'.$login);
                $_SESSION['error'] = "account created go look ur mai ;)";
            }
        }
        else{
            $_SESSION['error'] = "not the same pasword";
        }
    }
    else {
        $_SESSION['error'] = "write all champs de mais";
    }
}

if (isset($_POST['submit'])){
    insertMember();
header('Location: ../web_page/welcome.php');
}
?>