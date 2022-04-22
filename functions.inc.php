<?php
//check that the form is not empty
function emptyInputSignup($name,$username,$pwd ) {

$result;

if(empty($name) || empty($pwd) || empty($username)) {
    $result = true;
}
else {
    $result = false;
}
return $result;
}
//check that the password is not invalid
function invalidPwd($pwd) {
    $result;
    //check password only contains letters or numbers
    //also check that the password is not less than 8 characters
    if (!preg_match("/^[a-zA-Z0-9]*$/", $pwd) || (strlen($pwd) < 8)) {
    $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
//check that the user does not exist in the database
function uidExists($conn, $username){

    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn); //create a prepared statement and bind to prevent sql injections.
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registration.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $surname, $username, $pwd){
    $sql = "INSERT INTO users (name, surname, username, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn); //create a prepared statement and bind to prevent sql injections.
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registration.php?error=stmtfailed");
        exit();
    }
    //salt the password to prevent hacking of passwords
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss",$name, $surname, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:../homepage.php");
    exit();

}

function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username);
    if ($uidExists === false) {
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["password"];
    $checkedPwd = password_verify($pwd, $pwdHashed);

    if ($checkedPwd === false) {
        header("location:../index.php?error=wronglogin");
        exit();

    } else if ($checkedPwd === true) {
        //create a session start after the user successfully logs in.
        session_start();
        $_SESSION["username"] = $uidExists["username"];
        $_SESSION["name"] = $name;
        header("location:homepage.php");
        exit();
    }
}
//check that the form is not empty
function emptyInputLogin($username,$pwd) {

    $result;

    if(empty($pwd) || empty($username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}



