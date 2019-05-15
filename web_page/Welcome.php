<?php session_start (); ?>
<html>
    <header>
    <meta charset="utf-8">
        <link href="s_w.css" rel="stylesheet" media="all" type="text/css">
    </header>
    <div class=head>
    <a href="../php/delog.php" style="position: absolute;" class="user_setting">unlog</a>
        <h1 class = "head">insta like,     bro!!!</h1>
    </div>
        <?php 
            if ($_SESSION['a_user'] == "")
            {?>
        <div class = "marche">
           <a class = "sign"><div>
                <?php include "../get-this/sign-in.php"?>
            </div></a>
            <a class = "log"><div>
                <?php include "../get-this/log-in.php"; ?>
            </div></a>
        </div>
            <?php } ?>
    <div id = allpictur>
        <?php include "../get-this/pictur.php"?>
</div>
            <footer>

    </footer>
</html