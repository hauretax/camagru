<header>
        <link href="s_w.css" rel="stylesheet" media="all" type="text/css">
    </header>
<head>
<a href="../php/user_setting.php" class="user_setting">User settings</a>
<a href="../web_page/Welcome.php" class="user_setting">accueille</a>
</head>
<div class=centre>
<?php 
session_start();
echo "WELCOME : ";
echo  $_SESSION['a_user'];

?>
            <?php include "../script/cam.php"; ?>  
            <form method="post" action="../php/get_picture.php">
            </form>
            </div>
<div>
<?php
require_once '../php/database.php';
$bdd = new database();
$bdd->connexion();
$stmt = $bdd->getBdd()->query("SELECT * FROM pictur where login like \"".$_SESSION['a_user']."\"");
$tab = array();
while ($e = $stmt->fetch())
	array_unshift ($tab, "<img id = \"work\"src=".$e['file'].">");
foreach($tab as $e)
    echo $e;?>
</div>    
