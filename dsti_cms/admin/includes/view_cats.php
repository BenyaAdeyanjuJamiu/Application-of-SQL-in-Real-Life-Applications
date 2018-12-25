<?php

  @session_start();

  if(!isset($_SESSION['user_name'])){

  echo "<script>window.open('../admin_login.php?not_authorize=You are not Authorize to access this page.','_self')</script>";

 }else{

?>



<!DOCTYPE html>
<html>
<head>
	<title>View Post</title>
</head>

<style type="text/css">
	th,td,tr,tale{
		padding: 0;
		margin: 0;
	}
	th{
		border-left: 2px solid #333;
		border-bottom: 1px solid #333;
	}
	td{
		padding: 2px;
		border-left: 2px solid #999;
	}
</style>
<body>

	<table align="center" bgcolor="#FF9977" width="795">

		<tr>
			<td colspan="8" align="center" bgcolor="#0099CC"><h2>View All Categories:</h2></td>
		</tr>

		<tr>
			<th>Post Id</th>
			<th>Title</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
<?php
     include("includes/database.php");

     $get_cats = "select * from  categories";

     $run_cats = mysqli_query($con, $get_cats);

     $i = 1;

     while($row_cats = mysqli_fetch_array($run_cats)){

     	$cat_id = $row_cats['cat_id'];
     	$cat_title = $row_cats['cat_title'];
     	
     
?>


		<tr align="center">
			<td><?php echo $i++ ?></td>
			<td><?php echo $cat_title; ?></td>
			
			<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
			<td><a href="includes/delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
		</tr>
		

 <?php } ?>

	</table>

</body>
</html>

<?php }  ?>