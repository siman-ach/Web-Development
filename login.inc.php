<?php
if(isset($_POST["submit"])) {

    $username = $_POST["username"];
    $pwd = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location:http://ml-lab-4d78f073-aa49-4f0e-bce2-31e5254052c7.ukwest.cloudapp.azure.com:51207/index.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);

}
else {
    header("location:../homepage.php");
    exit();
}

