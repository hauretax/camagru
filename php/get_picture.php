<?php
session_start();
$data = $_POST['image'];
require_once 'database.php';

$data = str_replace('data:image/png;base64,','', $data);
$data = str_replace(' ', '+', $data);
$image = base64_decode($data);
$path =  tempnam("../user/". $_SESSION['a_user'], "FOO").".png";

$f=fopen("$path","wb");
fwrite($f,$image);
fclose($f);
$source = imagecreatefrompng('../pictures/toad1.png'); // Le logo est la source
$destination = imagecreatefrompng($path); // La photo est la destination
 
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);
 
$destination_x = $largeur_destination - $largeur_source;
$destination_y =  $hauteur_destination - $hauteur_source;
 
imagecopy($destination, $source, 150, 60, 0, 0, $largeur_source, $hauteur_source);

imagepng($destination, $path);
$bdd = new database();
$bdd->connexion();
$path = str_replace('app', '..', $path);
$query = $bdd->getBdd()->prepare($bdd->addpictur());
$array = array(
    'login' => $_SESSION['a_user'],
    'file' => $path
);
$query->execute($array);

?>