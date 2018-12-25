<?php

  @session_start();

  if(!isset($_SESSION['user_name'])){

  echo "<script>window.open('../admin_login.php?not_authorize=You are not Authorize to access this page.','_self')</script>";

 }else{

?>




<!DOCTYPE html>
<html>
<head>
	<title>Catergories</title>
</head>
<body>

	  
     <div align="center"><br /> <br /> <br /> <br /> <br /> <br />
	  <form action="index.php?insert_cat" method="post">
      
      <b>Insert New Category:</b><input type="text" name="new_cat">
      <input type="submit" name="insert_cat" value="Insert Category Now">
       	  	
	  </form>
</div>
</body>
</html>

<?php

  include("includes/database.php");

  if(isset($_POST['insert_cat'])) {
  	
  	$cat_title = htmlentities($_POST['new_cat']);

  	if($cat_title == ''){

  	echo "<script>alert('Please Insert Category')</script>";
  	echo "<script>window.open('index.php?insert_cat','_self')</script>";

  	}else{

  	$insert_cat = "insert into categories(cat_title) values ('$cat_title')";

  	$run_cat = mysqli_query($con, $insert_cat);

  	echo "<script>alert('New Category added')</script>";
  	echo "<script>window.open('index.php?insert_cat','_self')</script>";


  }

}

?>

<?php } ?>
