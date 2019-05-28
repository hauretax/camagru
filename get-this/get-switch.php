<?php
session_start();
$data = $_POST['pictur'];
require_once '../php/database.php';

$bdd = new database();
$bdd->connexion();

$query = $bdd->getBdd()->prepare('SELECT * FROM user
  WHERE login like :login');
$query->bindValue(':login', $_SESSION['a_user']);
$query->execute();
$user = $query->fetch();

if ($user['actif'] === '1'){
    $q = $bdd->getBdd()->prepare ("UPDATE user
      SET actif = '2'
      WHERE login LIKE :id");
    $q->bindParam(':id', $_SESSION['a_user']);
    $q->execute();
}
else {
    $q = $bdd->getBdd()->prepare ("UPDATE user
      SET actif = '1'
      WHERE login LIKE :id");
    $q->bindParam(':id', $_SESSION['a_user']);
    $q->execute();
}