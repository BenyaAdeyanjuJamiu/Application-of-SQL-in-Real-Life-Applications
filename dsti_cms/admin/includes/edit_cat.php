<?php

 @session_start();

  if(!isset($_SESSION['user_name'])){

  echo "<script>window.open('../admin_login.php?not_authorize=You are not Authorize to access this page.','_self')</script>";

 }else{


?>





<!DOCTYPE html>
<html>
<head>
	<title>Edit Catergories</title>
</head>
<body>

  <?php 
   //include("includes/databse.php");

   if(isset($_GET['edit_cat'])){

    $edit_id = $_GET['edit_cat'];


    $get_cat = "select * from categories where cat_id='$edit_id'";

    $run_cat = mysqli_query($con, $get_cat);

    while($row_cat = mysqli_fetch_array($run_cat)){

      $cat_id  = $row_cat['cat_id'];
      $cat_title = $row_cat['cat_title'];
    }

   }

    ?>
	  
     <div align="center"><br /> <br /> <br /> <br /> <br /> <br />
	  <form action="" method="post">
      
      <b>Insert New Category:</b><input type="text" name="new_cat" value="<?php echo $cat_title; ?>">
      <input type="submit" name="update_cat" value=" Update Category Now">
       	  	
	  </form>
</div>
</body>
</html>

<?php

  include("includes/database.php");

  if(isset($_POST['update_cat'])) {
  	
  	$cat_title = htmlentities($_POST['new_cat']);

  	if($cat_title == ''){

  	echo "<script>alert('Please Insert Category')</script>";
  	echo "<script>window.open('index.php?view_cats','_self')</script>";

  	}else{

  	$update_cat = "update categories set cat_title = '$cat_title' 
                                         where cat_id='$cat_id'";

  	$run_update = mysqli_query($con, $update_cat);

  	echo "<script>alert('A Category Has been  Updated')</script>";
  	echo "<script>window.open('index.php?view_cats','_self')</script>";


  }

}

?>

<?php } ?>
