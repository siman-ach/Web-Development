<?php
session_start();
if (! empty($_SESSION['username']))
?>
<!DOCTYPE html>

<html>
<head>
  <title> COVID-CT: Registration </title>
  <link rel="stylesheet" type="text/css" href="menu.css">

</head>
<body>
    <div id="header">
    COVID - 19 Contact Tracing
    </div>
      <div id="nav">
      <ul>
        <li><a class="selected" href="homepage.php"> Home</a></li>
        <li><a class="unselected" href= "visits_overview.php ">Overview</a></li>
        <li><a class="unselected" href= "visits_overview2.php ">Add Visit</a></li>
        <li><a class="unselected" href= "visits_overview3.php ">Report</a></li>
        <li><a class="unselected" href= "settings.HTML ">Settings</a></li>
          <?php
          if (isset($_SESSION["username"])) {
              echo "<li><a class='unselected' href= 'logout.inc.php'>Logout</a></li>";
          }
          ?>

      </ul>

    </div>
