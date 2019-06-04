<?PHP
require_once 'database.php';
$bdd = new database();
$bdd->connexion();

$stmt  = $bdd->getBdd()->prepare("CREATE DATABASE IF NOT EXISTS camagru");
$stmt->execute();

$stmt = $bdd->getBdd()->prepare("CREATE TABLE `user` (
    `id` int(11) NOT NULL,
    `login` varchar(32) NOT NULL,
    `password` varchar(128) NOT NULL,
    `mail` varchar(255) DEFAULT NULL,
    `cle` varchar(255) DEFAULT NULL,
    `actif` varchar(255) DEFAULT NULL
  )");
  $stmt->execute();
$stmt = $bdd->getBdd()->prepare("CREATE TABLE `pictur` (
    `id` int(11) NOT NULL,
    `login` varchar(255) NOT NULL,
    `file` varchar(255) NOT NULL,
    `lik` int(11) DEFAULT NULL,
    `who_like` text NOT NULL,
    `comment` text
  )");
  $stmt->execute();
?>