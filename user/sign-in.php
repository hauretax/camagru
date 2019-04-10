<?php
include_once "../php/connect.php";
if($_GET['login'] !== "" && $_GET['p'] !== "" && $_GET['p_a'] !== "" && $_get['mail'] !== "" && $_GET['submit'] === "OK"){
    
    if ($_GET['p'] === $_GET['p_a']){
        $db = connect();
        
    }
    
    else
    print ("password not similar");
}
else
    print ("pleas");
?>
<H1>sign-in</H1>
            <form method="post" action="../php/insert.php">
                username <input type="text" name="login"><br/>
                pasword <input type="text" name="p"><br/>
                again <input type="text" name="p_a"><br/>
                mail <input type="text" name="mail"><br/>
                <input type="submit" name="submit" value="OK">
</form>