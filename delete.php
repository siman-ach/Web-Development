<?php
//row to remove from the database
$id = $_POST["name"];
//connect to the database
$serverName = "localhost";
$dBUsername = "siman";
$dBPassword = " ";
$dBName = "webdev";

$conn =  mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName );
if (!$conn) {
    die("Connection failed: " .msqli_connect_error($conn));
}
$query = "DELETE from visits where id = '$id'";

$result = mysqli_query($conn, $query);
