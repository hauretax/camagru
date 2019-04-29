<?php
require_once 'database.php';
$bdd = new database();
$bdd->connexion();

$login = $_GET['log'];
$cle = $_GET['cle'];

$stmt = $dbh->prepare("SELECT cle,actif FROM user WHERE login like :login");
if($stmt->execute(array('login' => $login)) && $row = $stmt->fetch()){
    $clebdd = $row['cle'];
    $actif = $row['actif'];
  }

if ($actif == '1'){
    echo "u are already activated";
}

else{
    if($cle == $clebdd)
    {
        echo "u are now activate";
        $stmt = $dbh->prepare ("UPDATE user SET actif = 1 WHERE login like :login");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
    }
    else{
        echo "Shomting block u";
    }
}
?>
