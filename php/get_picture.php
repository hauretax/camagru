<?php
session_start();
$data = $_POST['image'];
$image = explode('base64,',$data);
$path =  tempnam("../user/". $_SESSION['a_user'], "FOO").".png";
$f=fopen("$path","wb");
fwrite($f,base64_decode($image[1]));
fclose($f);

$source = imagecreatefrompng("../Pictures/toad1.png"); // Le logo est la source
$destination = imagecreatefrompng($path); // La photo est la destination
 
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);
 
$destination_x = $largeur_destination - $largeur_source;
$destination_y =  $hauteur_destination - $hauteur_source;
 
imagecopy($destination, $source, 15, 15, 0, 0, $largeur_source, $hauteur_source);
 
imagepng($destination, $path);
?>