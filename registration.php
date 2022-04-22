<!DOCTYPE html>
<html>
<head>
    <title> COVID-CT: Registration </title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
<body>
<div id="container">
    <div id="header">
        COVID - 19 Contact Tracing
    </div>
    <div class="login-form">
        <form id="login-form" method="post" action="signup.inc.php">

    <input name="name" type="text" class="form-control" placeholder="Name" required value="<?php echo $name; ?>">
    <br>
    <input name="surname" type="text" class="form-control" placeholder="Surname" value="<?php echo $surname; ?>">
    <br>
    <input name="username" type="text" class="form-control" placeholder="Username" required value="<?php echo $username; ?>">
    <br>
    <input name="pwd" type="password" class="form-control" placeholder="Password" required value="<?php echo $pwd; ?>">
    <br>

    <button type="submit" name="submit" id="SubmitReg"> Register </button>

</form>

</div>
</div>

<?php
if (isset($_GET["error"])){
    if ($_GET["error"] == "emptyinput") {
        echo "<p class= 'error'> Please fill in all required fields!</p>";
    }
    else if ($_GET["error"] == "usernametaken") {
        echo "<p class= 'error'> Sorry, that usernames already taken!</p>";
    }
    else if ($_GET["error"] == "pwd") {
        echo "<p class= 'error'> The password must be more than 8 characters and can only contain letters or numbers!</p>";

    }
    else if ($_GET["error"]== "stmtfailed") {
        echo "<p class= 'error'> Something went wrong! Please try again </p>";
    }
    else if ($_GET["error"] == "none"){
        echo "<p class= 'error'> You have registered successfully! </p>";
    }
}
?>
</body>
</html>