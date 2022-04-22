<?php
//check if the user has clicked the register button
if(isset($_POST["submit"])) {
    //if they have clicked the submit button, grab the data from the form
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name,$username,$pwd ) !== false) {
        header("location:index.php?error=emptyinput");
        exit();
    }
    //check if the username already exists in the database
    if (uidExists($conn, $username) !== false) {
        header("location:http://ml-lab-4d78f073-aa49-4f0e-bce2-31e5254052c7.ukwest.cloudapp.azure.com:51207/registration.php?error=usernametaken");
        exit(); //end of POST check)
    }
    //check input validation of password
    if (invalidPwd($pwd) !== false) {
        header("Location:http://ml-lab-4d78f073-aa49-4f0e-bce2-31e5254052c7.ukwest.cloudapp.azure.com:51207/registration.php?error=pwd");
        exit();
    }

    createUser($conn, $name, $surname, $username, $pwd);
    session_start();

}
else {
    header("location:index.php");
    exit();
}
    





