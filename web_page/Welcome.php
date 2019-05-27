<?php session_start (); ?>
<html>
    <header>
    <meta charset="utf-8">
        <link href="s_w.css" rel="stylesheet" media="all" type="text/css">
    </header>
    <div class=head>
        <h1 class = "head">insta like,     bro!!!</h1>
            <?php if($_SESSION['a_user'] !== ""|| !(isset($_SESSION['a_user']))){?>
    <a href="../php/delog.php" style="position: absolute; left:0; top:0;" class="user_setting">unlog</a>
    <a href="../web_page/user-page.php" style="position: absolute; right:0; top:0;" class="user_setting">Your page</a>
            <?php }?>
</div>
        <?php 
            if ($_SESSION['a_user'] === "" || !(isset($_SESSION['a_user'])))
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