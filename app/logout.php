<?php

session_start();

 $_SESSION['session_username'] ="";
 //$_SESSION['session_time'] ="";
 $_SESSION['session_usertype'] = "";
 $_SESSION['session_userid'] ="";
session_destroy();
header("Location: ../login.php");
?>
