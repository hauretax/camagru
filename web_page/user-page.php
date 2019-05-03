<div class=centre>
<?php 
session_start();
echo "WELCOME : ";
echo  $_SESSION['a_user'];

?>
<header>
        <link href="s_w.css" rel="stylesheet" media="all" type="text/css">
    </header>
            <?php include "../script/cam.php"; ?>
        
            <form method="post" action="../php/get_picture.php">
            </form>
        </div>