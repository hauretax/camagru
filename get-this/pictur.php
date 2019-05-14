<?php
require_once '../php/database.php';
$bdd = new database();
$bdd->connexion();
$stmt = $bdd->getBdd()->query("SELECT * FROM pictur");
$tab = array();
while ($e = $stmt->fetch())
	array_unshift ($tab, "<img id = \"work\"src=".$e['file'].">");
foreach($tab as $e)
    echo $e;

$reponse->closeCursor();
?>