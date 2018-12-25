<?php

session_start();


session_destroy();


 //header("Location: admin_login.php?logout=You are logged out");

 echo "<script>window.open('admin_login.php?logout=You are Logged Out.','_self')</script>";




?>