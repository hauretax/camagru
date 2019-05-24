<script type="text/javascript" src="../script/whathapend.js"></script>

<?php

require_once '../php/database.php';
$bdd = new database();
$bdd->connexion();
$stmt = $bdd->getBdd()->query("SELECT * FROM pictur");
$tab = array();
$q = $bdd->getBdd()->prepare("SELECT * FROM user WHERE login LIKE :login");
$q->bindParam(':login', $_SESSION['a_user']);
$q->execute();
$data = $q->fetch();


while ($e = $stmt->fetch()){
    $text =  "<div id = \"imgda\">
    <img id = \"work\"src=".$e['file'].">
    <div id = \"message\">".$e['comment']."</div>";
    if ($_SESSION['a_user'] !== ""){
    $text = $text."<form id=\"sendtext\" method=\"post\" action=\"../php/ge_msg.php\">
    <input type=\"hidden\" name=\"id\" value=".$e['id']." /> 
    <input id=\"text\" type=\"text\" name=\"text\"><br/>
    <input type=\"submit\" name=\"submit\" value=\"OK\">
    <img id = \"".$e['id']."\" class = \"heart\"  src=\"../image/";
    if (strstr($e['who_like'], $data['id']))
        $text = $text."red.png";
    else
        $text = $text."coeur.svg";
       $text= $text."\" onclick= \"heart(this)\">
    </form>";
    }
    $text = $text."</div>";
    array_unshift ($tab, $text);

}
foreach($tab as $e){
    echo $e;
}
?>