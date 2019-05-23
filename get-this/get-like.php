<?php
session_start();
$data = $_POST['pictur'];
require_once '../php/database.php';

$bdd = new database();
$bdd->connexion();

$query = $bdd->getBdd()->prepare('SELECT * FROM pictur
  WHERE id like :id');
$query->bindValue(':id', $data);
$query->execute();
$add = $query->fetch();

$query = $bdd->getBdd()->prepare('SELECT * FROM user
  WHERE login like :login');
$query->bindValue(':login', $_SESSION['a_user']);
$query->execute();
$user = $query->fetch();

if (strstr($add['who_like'], $user['id'])){
    $add['lik']--;
    $q = $bdd->getBdd()->prepare ("UPDATE pictur
      SET who_like = REPLACE(who_like, :avans, '')
      WHERE id LIKE :id");
    $avans = $user['id'].";";
    $q->bindParam(':avans', $avans);
    $q->bindParam(':id', $data);
    $q->execute();
}
else {
    $add['lik']++;
    $q = $bdd->getBdd()->prepare("UPDATE pictur 
      SET who_like=CONCAT(who_like, :avans)
      WHERE id like :id");
    $avans = $user['id'].";";
    $q->bindParam(':avans', $avans);
    $q->bindParam(':id', $data);
    $q->execute();
    
}


$query = $bdd->getBdd()->prepare("UPDATE pictur SET lik= :log WHERE id like :id");
$query->bindParam(':id', $data);
$query->bindParam(':log', $add['lik']);
$query->execute();
/*
?>