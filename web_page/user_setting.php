<script type="text/javascript" src="../script/switch-me.js"></script>
<header>
    <meta charset="utf-8">
        <link href="s_w.css" rel="stylesheet" media="all" type="text/css">
    </header>
<?PHP
session_start();
if ($_SESSION['a_user'] === "" || !(isset($_SESSION['a_user'])))
    {
        header('Location: ../web_page/Welcome.php');
        exit;
    }
?>
<?php session_start();?>
<div class = "head"><H1 class = "head">Helo <?php echo $_SESSION['a_user']?> Welcome on ur settings <H1></div>
<div id = "CENTRER">
<H2>change name</H2>
            <form method="post" action="../php/c_n.php">
                new name <input type="text" name="login">
                pasword <input type="text" name="p">
                <input type="submit" name="C_N" value="OK">
                </form>

<H2>change mail</H2>
            <form method="post" action="../php/c_n.php">
                new mail <input type="text" name="mail"><br/>
                pasword <input type="text" name="pa"><br/>
                <input type="submit" name="C_M" value="OK">
                </form>
            
<H2>change password</H2>
            <form method="post" action="../php/c_n.php">
                old password <input type="text" name="op"><br/>
                new password <input type="text" name="np"><br/>
                seconde time <input type="text" name="st"><br/>
                <input type="submit" name="C_P" value="OK">
                </form>
            </form>
<H2>can we send mail to you ?</H2>

    <?php
    require_once '../php/database.php';
    $bdd = new database();
    $bdd->connexion();
    $q = $bdd->getBdd()->prepare("SELECT * FROM user WHERE login LIKE :login");
    $q->bindParam(':login', $_SESSION['a_user']);
    $q->execute();
    $data = $q->fetch();

    if($data['actif'] === '1')
        echo "<img id='yesno' src= '../image/y2.png' onclick= swi(this)>";
    if($data['actif'] === '2')
        echo "<img id='yesno' src= '../image/y1.png' onclick= swi(this)>";
?>

            <H2 id= 'message'><?php echo ($_SESSION['error']); $_SESSION['error'] = "";?></H2>
            <a href="../web_page/user-page.php" class="user_setting">back on ur acount</a>
</div>
            <footer><div id='footer'><h1>projet by : hutricot</h1></div></footer>