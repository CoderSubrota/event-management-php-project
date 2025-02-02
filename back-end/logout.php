<?php
session_start(); 
session_destroy(); 

header("Location: ../front-end/login_page.php");
exit(); 
?>
