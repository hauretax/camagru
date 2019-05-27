<?php
require_once '../php/database.php';

$bdd = new database();
$bdd->connexion();
if (isset($_POST['P'])){
    $query = $bdd->getBdd()->prepare('DELETE FROM pictur
      WHERE file like :file');
    $query->bindValue(':file', $_POST['P']);
    $query->execute();
}

?>