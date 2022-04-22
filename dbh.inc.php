<?php

$serverName = "localhost";
$dBUsername = "siman";
$dBPassword = " ";
$dBName = "webdev";

$conn =  mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName );

if (!$conn) {
    die("Connection failed: " .msqli_connect_error());
}
