<meta charset="utf-8">
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
            if($_POST['login'] === $e['login'] ){//|| $_POST['mail'] === $e['mail']){
               $_SESSION['error'] = "user with this name already exist";
               header('Location: ../web_page/welcome.php');
            }
            if($_POST['mail'] === $e['mail']){
                $_SESSION['error'] = "user with this email already exist";
                header('Location: ../web_page/welcome.php');
             }
        }
        if ($_POST['p'] === $_POST['p_a']){
            if (!(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))) { 
                $_SESSION['error'] = "pleas give a valid email";
                header('Location: ../web_page/welcome.php');
            } 
            $login = $_POST['login'];
            $password = hash ('whirlpool', $_POST['p']);
            $cle = md5(microtime(TRUE)*100000);
            $cle = hash ('whirlpool', $cle);

         
            echo "L'email a été envoyé.";
            $mail = $_POST['mail'];
            $query = $bdd->getBdd()->prepare($bdd->addMember());
            $array = array(
                'login' => $login,
                'cle' => $cle,
                'password' => $password,
                'mail' => $mail
            );
            $query->execute($array);


            $from = "test@test.com";
            $subject = "Voulez fair des photo ?";
            $message = "Venez prendre des photo !
            
            Mais tout dabors vous allez devoir activer votre compte, veulliez cliquer sur le lien ci desssous:
            http://http://localhost:8075/demo/camagru/php/activation.php?log=".urlencode($login).'$cle='.urlencode($cle) . '
 
 
            ---------------
            Ceci est un mail automatique, Merci de ne pas y répondre.';
             ;
            $headers = "From:" . $from;
            mail($_POST['mail'],$subject,$message,$headers);

            mkdir('../user/'.$login);
        }
    else{
        $_SESSION['error'] = "not the same pasword";
        header('Location: ../web_page/welcome.php');
    }
    }
}

if (isset($_POST['submit'])){
    insertMember();
$_SESSION['error'] = "account created go look ur mail ;)";
header('Location: ../web_page/welcome.php');
}
?>