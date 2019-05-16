<?php session_start();?>
<H1>Helo <?php echo $_SESSION['a_user']?> <H1>
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
            <H2 id= 'message'><?php echo ($_SESSION['error']); $_SESSION['error'] = "";?></H2>