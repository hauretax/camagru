<?php
require_once '../php/database.php';
$bdd = new database();
$bdd->connexion();
$stmt = $bdd->getBdd()->query("SELECT * FROM pictur");
$tab = array();
while ($e = $stmt->fetch())
    array_unshift ($tab, "<div id = \"imgda\">
    <img id = \"work\"src=".$e['file'].">
    <div id = \"message\">".$e['comment']."</div>
    <form id=\"sendtext\" method=\"post\" action=\"../php/ge_msg.php\">
    <input type=\"hidden\" name=\"id\" value=".$e['id']." /> 
    <input id=\"text\" type=\"text\" name=\"text\"><br/>
    <input type=\"submit\" name=\"submit\" value=\"OK\">
    </form>
    </div>");
foreach($tab as $e){
    echo $e;
}
?>