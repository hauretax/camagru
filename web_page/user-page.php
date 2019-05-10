<header>
        <link href="s_w.css" rel="stylesheet" media="all" type="text/css">
    </header>
<head>
<a href="../php/user_setting.php" class="user_setting">User settings</a>
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
