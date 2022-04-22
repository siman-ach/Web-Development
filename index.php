<!DOCTYPE html>
<html>
<head>
  <title> COVID-CT: Login </title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
<body>
<div id="container">
    <div id="header">
        COVID - 19 Contact Tracing
    </div>
    <div class="login-form">
        <form id="login-form" method="post" action="login.inc.php">

      <input name="username" type="text" class="form-control" placeholder="Username" required >
      <br>
      <input name="password" type="password" class="form-control" placeholder="Password" required >
      <br>

      <button type="submit" name="submit" > Login </button>
      <button type="reset"> Cancel </button>
      <br>
      <button type="button" id="SubmitForm" onclick="location.href='registration.php';"> Register </button>

    </form>
  </div>
</div>

<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p class= 'error'> Please fill in all required fields!</p>";
    } else if ($_GET["error"] == "wronglogin") {
        echo "<p class= 'error'> Given username or password combination is incorrect. Please retry!</p>";
    }
}
?>

</body>
</html>
