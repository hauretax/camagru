<?php
session_start();
$data = $_POST['pictur'];
require_once '../php/database.php';

$bdd = new database();
$bdd->connexion();

$query = $bdd->getBdd()->prepare('SELECT * FROM pictur  WHERE id like :id');
$query->bindValue(':id', $data);
$query->execute();
$add = $query->fetch();
$add['lik']++;
error_log("aaaaaaaa.a.aaaaa.a.a.a..a.a.a..a.a.a.a.a..a.a.a.aa.a.a ".$add['lik']." a.a.a..a.a.a...a.a..a");
$query = $bdd->getBdd()->prepare("UPDATE pictur SET lik= :log WHERE id like :id");
$query->bindParam(':id', $data);
$query->bindParam(':log', $add['lik']);
$query->execute();
?>