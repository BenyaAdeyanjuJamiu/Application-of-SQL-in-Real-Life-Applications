<?php

  @session_start();

  if(!isset($_SESSION['user_name'])){

  echo "<script>window.open('../admin_login.php?not_authorize=You are not Authorize to access this page.','_self')</script>";

 }else{

?>


<?php

 include("database.php");

 if(isset($_GET['delete_cat'])){

 	$delete_id = $_GET['delete_cat'];

 	$delete_cat = "delete from categories where cat_id='$delete_id'";

 	$run_delete_cat = mysqli_query($con, $delete_cat);

 	echo "<script>alert('A category has been deleted from the system')</script>";
 	echo "<script>window.open('../index.php?view_cats','_self')</script>";
 	exit();



 }





?>

<?php  } ?>