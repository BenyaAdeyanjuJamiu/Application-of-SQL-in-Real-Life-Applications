<?php
 
  session_start();
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="admin_login_style.css">
</head>
<body>
   
   <center> <h2 style="color:#FFF;"><?php echo @$_GET['not_authorize']; ?></h2></center>
	<div class="login">


		<br /><br /><br />
  <div class="login-triangle"></div>
  


  <h2 class="login-header">Admin Login</h2>

  <form class="login-container" method="post" action="admin_login.php">
    <p><input type="text" name="user_name" placeholder="Admin Name..." required="required"></p>
    <p><input type="password" name="user_password" placeholder="**********" required="required"></p>
    <p><input type="submit"  name="submit"   value="Admin Login"></p>
  </form>
</div>
  
</body>
</html>

<?php

 include("includes/database.php");

 if(isset($_POST['submit'])){

 	$user_name = mysqli_real_escape_string($con,$_POST['user_name']);
 	$user_password = mysqli_real_escape_string($con,$_POST['user_password']);

 	//$user_name = htmlentities()
 	//$user_name = htmlspecialchars(string);
 	//$user_name  = htmlspecialchars_decode(string);



 	$admin_insert = "select * from admin_users where user_name ='$user_name' 
 	                                                        AND 
 	                                               user_password = '$user_password'";

 	$run_admin = mysqli_query($con, $admin_insert);


  

 	

 	//$check_admin = mysqli_num_rows($run_admin);

    if(mysqli_num_rows($run_admin) > 0){

    	$_SESSION['user_name'] = $user_name;



    	echo "<script>window.open('index.php?logged=You have successfully Logged in','_self')</script>";

    }
    else{

    	echo "<script>alert('Your Cridentails are wrong, try again!!!')</script>";
    }
 	
 	}


?>