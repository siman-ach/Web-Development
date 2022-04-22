<html>
<head>
  <title> COVID-CT: Registration </title>
  <link rel="stylesheet" type="text/css" href="menu.css"/>
  <script>
      function deleteRow(rowid)
      {
          var row = document.getElementById(rowid);
          row.parentNode.removeChild(row);

          //remove row from database
          var xhttp = new XMLHttpRequest();
          xhttp.open("POST", "delete.php", false);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("name="+rowid)
      };
  </script>
</head>
<body>
    <div id="header">
    COVID - 19 Contact Tracing
    </div>
      <div id="nav">
      <ul>
        <li> <a class="unselected" href="homepage.php"> Home</a></li>
        <li> <a class="selected" href= "visits_overview.php ">Overview</a></li>
        <li><a class="unselected" href= "visits_overview2.php ">Add Visit</a></li>
        <li><a class="unselected" href= "visits_overview3.php ">Report</a></li>
        <li><a class="unselected" href= "settings.HTML">Settings</a></li>
        <li><a class="unselected" href= "index.php">Logout</a></li>
      </ul>
    </div>

    <?php
    session_start();

    //connect to the database
    $serverName = "localhost";
    $dBUsername = "siman";
    $dBPassword = " ";
    $dBName = "webdev";


    $conn =  mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName );

    $username = $_SESSION["username"];

    if (!$conn) {
        die("Connection failed: " .msqli_connect_error($conn));
    }
    $sql = "SELECT * FROM visits WHERE username ='$username'";
    $result = mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($result);

    ?>
<?php
$table = "<table id='myTable'>
    <thead>
    <tr>
        <th class='smallgap'> Date </th>
        <th class='smallgap'> Time </th>
        <th class='largegap'> Duration </th>
        <th class='largegap'> X </th>
        <th class='largegap'> Y </th>
    </tr>
    </thead>
    <tr>";

if ($num_rows>0){
    while($row = mysqli_fetch_array($result)) {
        $id = $row["id"];

        $table .= "<tr id=" . $id . "><td>" . $row['date'] . "</td><td>" . $row['time'] . "</td><td>" . $row['duration'] . "</td>
    <td>" . $row['X'] . "</td><td>" . $row['Y'] . "</td><td><input type='image' src='cross.png' width='25' onclick='deleteRow(".$id.")'</td>";
    }
} else {
    echo "no results";
}
$table .="</table>";

echo $table;

mysqli_free_result();
