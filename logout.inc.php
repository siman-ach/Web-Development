<?php
session_start(); //to ensure you are using same session
session_unset(); //to unset any open sessions;
session_destory(); //destroy the session
header("location:index.php"); //to redirect back to "index.php" after logging out

