<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['rights']);
header("refresh:0; url=../index.php");
?>