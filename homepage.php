<?php
session_start();
if (! empty($_SESSION['username']))
?>

<html>
<head>
    <title> COVID-CT: Registration </title>
    <link rel="stylesheet" type="text/css" href="menu.css"/>
</head>
<body>
<div id="header">
    COVID - 19 Contact Tracing
</div>
<div id="nav">
    <ul>
        <li> <a class="selected" href="homepage.php"> Home</a></li>
        <li> <a class="unselected" href= "visits_overview.php ">Overview</a></li>
        <li><a class="unselected" href= "visits_overview2.php ">Add Visit</a></li>
        <li><a class="unselected" href= "visits_overview3.php ">Report</a></li>
        <li><a class="unselected" href= "settings.HTML">Settings</a></li>
        <?php
        if(isset($_SESSION["username"])){
            echo "<li><a class='unselected' href='index.php'>Logout</a></li>";
        }
        ?>
    </ul>
</div>

<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}
?>

    <div class= "right-side">
    <h2> Status </h2>
    <br>
      <hr class="line">
      <div class= "statusp">
      <?php if(isset($_SESSION['username'])):?>
          <p> Hi <?php echo $_SESSION['username'];?>, you might<br>
       have had a connection to <br>
       an infected person at the <br>
       location shown in red. <br></p>
          <?php endif?>
      <p id="createspace"> Click on the marker to see <br> details about the infection. </p>
      </div>
    </div>

    <div class="map">
      <img src="exeter.jpeg"  border="4" width="630" height="560" usemap="#map1">
      <map name="map1">
      </map>
    </div>
  </body>
  </html>
