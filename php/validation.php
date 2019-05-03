<?php
require_once 'database.php';
$bdd = new database();
$bdd->connexion();

$login = $_GET['log'];
$cle = $_GET['cle'];

$query = $bdd->getBdd()->query('SELECT * FROM user WHERE login = \''.$login.'\'');
foreach($query as $e){
    if($login === $e['login']){
        if($cle === $e['cle']){
            if ($e['actif'] !== '1'){
                $stmt = $bdd->getBdd()->prepare ('UPDATE user SET actif = 1 WHERE login = \''.$login.'\'');
                $stmt->execute();
                echo"ur acounte have been activated come back on <a href=\"../web_page/Welcome.php\">home page</a>";
            }
            else
                echo "already activated";
        }
        else
            echo "ok";
    }
    else
        echo "bad login";
}
?>
