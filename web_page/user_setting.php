<H2>change name</H2>
            <form method="post" action="../php/c_n.php">
                newname <input type="text" name="login"><br/>
                pasword <input type="text" name="p"><br/>
                <input type="submit" name="submit" value="OK">
            <div id= 'message'><?php echo ($_SESSION['error']); $_SESSION['error'] = "";?> </div>
<H2>change mail</H2>
            <form method="post" action="../php/..php">
                newmail <input type="text" name="login"><br/>
                pasword <input type="text" name="p"><br/>
                <input type="submit" name="submit" value="OK">
            <div id= 'message'><?php echo ($_SESSION['error']); $_SESSION['error'] = "";?> </div>
<H2>change password</H2>
            <form method="post" action="../php/..php">
                newpassword <input type="text" name="login"><br/>
                oldpassword <input type="text" name="p"><br/>
                <input type="submit" name="submit" value="OK">
            <div id= 'message'><?php echo ($_SESSION['error']); $_SESSION['error'] = "";?> </div>
</form>