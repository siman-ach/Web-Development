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
    die("Connection failed: " .msqli_connect_error($conn));
}
//check if the user has clicked the register button
if (isset($_POST['reportbtn'])) {
    //grab the data from the form
    $date = $_POST["date"];
    $time = $_POST["time"];

    //include prepared statements
    $sql = "INSERT INTO report (username, date, time) VALUES (?, ?, ?)";

    //prepare the statement using mysqli_prepare
    $stmt = $conn->prepare($sql);

    //start binding the input variables to the prepared statement
    $stmt->bind_param("sss", $_SESSION['username'], $_POST['date'], $_POST['time']);
    //execute the prepared statements
    $stmt->execute();

    //close connection
    mysqli_stmt_close($stmt);

    //return to current page
    header("location:../visits_overview3.php");
    echo '<script language="javascript" type="text/javascript"> 
                alert("message successfully Inserted");
                window.location = "report.inc.php";
        </script>';
    exit();

}
else {
    echo("Try again");
    exit();
}
