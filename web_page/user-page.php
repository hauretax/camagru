<script type="text/javascript" src="../script/kill-image.js"></script>
<script>function launch(){ document.location.reload(true);} </script>
<?PHP
session_start();
if ($_SESSION['a_user'] === "" || !(isset($_SESSION['a_user'])))
    {
        header('Location: ../web_page/Welcome.php');
        exit;
    }
?>

<header>
        <link href="s_w.css" rel="stylesheet" media="all" type="text/css">
    </header>
<head>
<div class = "head">
<a href="../php/delog.php" class="user_setting">unlog</a>
<a href="../web_page/user_setting.php" class="user_setting">User settings</a>
<a href="../web_page/Welcome.php" class="user_setting">accueille</a>
</div>
</head>
<div class=centre>
<?php 
echo "<div id=\"boy\">"
?>
            <?php include "../script/cam.php"; ?>  
            <form method="post" action="../php/get_picture.php">
            </form>
            </div>
<div id = "u_p">
<?php
require_once '../php/database.php';
$bdd = new database();
$bdd->connexion();
$stmt = $bdd->getBdd()->query("SELECT * FROM pictur where login like \"".$_SESSION['a_user']."\"");
$tab = array();
while ($e = $stmt->fetch())
    array_unshift ($tab, "<img id = 'wok'src=".$e['file']." onClick='kill(this); launch();'>");
foreach($tab as $e)
    echo $e;?>
</div>  
</div>  
<footer>
              <div id='footer'>  <h1>projet by : hutricot</h1></div>
    </footer>