<?php
session_start();
//get username from session variable
$username = $_SESSION["username"];

//connect to the database
$serverName = "localhost";
$dBUsername = "siman";
$dBPassword = " ";
$dBName = "webdev";

$conn =  mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName );

if (!$conn) {
    die("Connection failed: " .mysqli_connect_error($conn));
}
//check if the user has clicked the register button
if (isset($_POST['add'])) {
    //grab the data from the form
    $date = $_POST["date"];
    $time = $_POST["time"];
    $duration = $_POST["duration"];
    //get X and Y using js mouse click;
    $X = $_POST["posX"];
    $Y = $_POST["posY"];

    //include prepared statements
    $sql = "INSERT INTO visits (username, date, time, duration, X, Y) VALUES (?, ?, ?, ?, ?, ?)";

    //prepare the statement using mysqli_prepare
    $stmt = $conn->prepare($sql);

    //start binding the input variables to the prepared statement
    $stmt->bind_param("sssdii", $_SESSION['username'], $_POST['date'], $_POST['time'], $_POST['duration'], $_POST['posX'], $_POST['posY']);
    //execute the prepared statements
    $stmt->execute();


    mysqli_stmt_close($stmt);

    header("location:../visits_overview.php");
    exit();

}
else {
    echo("Try again");
    exit();
}








