<?php session_start();?>
<H1>sign-in</H1>
            <form method="post" action="../php/insert.php">
                username <input type="text" name="login"><br/>
                pasword <input type="text" name="p"><br/>
                again <input type="text" name="p_a"><br/>
                mail <input type="text" name="mail"><br/>
                <input type="submit" name="submit" value="OK">
            <div id= 'message'><?php echo ($_SESSION['error']); $_SESSION['error'] = "";?> </div>
</form>