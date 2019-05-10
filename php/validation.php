<?php
require_once 'database.php';
$bdd = new database();
$bdd->connexion();

$login = $_GET['log'];
$cle = $_GET['cle'];

$stmt = $bdd->getBdd()->prepare("SELECT * FROM user WHERE login like :login ");
if($stmt->execute(array(':login' => $login)) && $row = $stmt->fetch())
  {
    $clebdd = $row['cle'];	// Récupération de la clé
    $actif = $row['actif']; // $actif contiendra alors 0 ou 1
  }
  if($actif == '1') // Si le compte est déjà actif on prévient
  {
     echo "already activated";
  }
else // Si ce n'est pas le cas on passe aux comparaisons
  {
     if($cle == $clebdd) // On compare nos deux clés	
       {
        $stmt = $bdd->getBdd()->prepare ("UPDATE user SET actif = 1 WHERE login like :login ");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        echo"ur acounte have been activated come back on <a href=\"../web_page/Welcome.php\">home page</a>";
       }
     else // Si les deux clés sont différentes on provoque une erreur...
       { 
          echo "bad key ???";
       }
  }
?>
