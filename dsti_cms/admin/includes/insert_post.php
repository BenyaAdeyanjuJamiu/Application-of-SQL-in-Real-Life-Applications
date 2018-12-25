<?php

  @session_start();

  if(!isset($_SESSION['user_name'])){

  echo "<script>window.open('../admin_login.php?not_authorize=You are not Authorize to access this page.','_self')</script>";

 }else{

?>

<!DOCTYPE html>
<html>
<head>
	<title>Insertion Form</title>

	<!--tinymce.com-->
	<!--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>-->	
</head>
<body>
	<form action="index.php?insert_post" method="post" enctype="multipart/form-data">

		<table width="800" align="center" border="2">
			<tr>
				<td bgcolor="#900C3F" colspan="6"><h1 align="center">Insert New Post:</h1></td>
			</tr>

			<tr>
				<td bgcolor="#900C3F" align="right"><strong>Post Title:</strong></td>
				<td><input type="text" name="post_title" size=75></td>
			</tr>

			<tr>
				<td bgcolor="#900C3F" align="right"><strong>Post Category:</strong></td>
				<td>
					<select name="cat">
						<option value="null">Select a Category</option>	
	  	   	 	<?php
                  include("includes/database.php");

                  $get_cats = "select * from categories";

                  $run_cats = mysqli_query($con,$get_cats);

                  while($cats_row = mysqli_fetch_array($run_cats)){

                  	$cat_id = $cats_row["cat_id"];
                  	$cat_title = $cats_row["cat_title"];

                  	echo "<option value='$cat_id'>$cat_title</option>";

                  }

	  	   	 	?>	
				    </select>
				   </td>
			</tr>

			<tr>
				<td bgcolor="#900C3F" align="right"><strong>Post Author:</strong></td>
				<td><input type="text" name="post_author" size=75></td>
			</tr>


			<tr>
				<td bgcolor="#900C3F" align="right"><strong>Post Keywords:</strong></td>
				<td><input type="text" name="post_keywords" size=75></td>
			</tr>


			<tr>
				<td bgcolor="#900C3F" align="right"><strong>Post Image:</strong></td>
				<td><input type="file" name="post_image" size=75></td>
			</tr>


			<tr>
				<td bgcolor="#900C3F" align="right"><strong>Post Content:</strong></td>
				<td><textarea cols="70" rows="30" name="post_content"></textarea></td>
			</tr>

			
			<tr>
				<td bgcolor="#900C3F" align="center" colspan="7"><input type="submit" name="submit" value="Publish Now"></td>
			</tr>
		</table>
		
	</form>

</body>
</html>

<?php

include("includes/database.php");

if(isset($_POST['submit'])){

	 $post_title = mysqli_real_escape_string($con, $_POST['post_title']);
	 $post_date = date('m-d-y');
	 $post_cat = mysqli_real_escape_string($con, $_POST['cat']);
	 $post_author = mysqli_real_escape_string($con, $_POST['post_author']);
	 $post_keywords = mysqli_real_escape_string($con, $_POST['post_keywords']);

	 $post_image = $_FILES['post_image']['name'];
	 $post_image_tmp = $_FILES['post_image']['tmp_name'];

	 $post_content = mysqli_real_escape_string($con, $_POST['post_content']);

     
	 if($post_title =='' OR $post_cat=='null' OR $post_author=='' OR $post_keywords=='' OR $post_content=='' OR $post_image=='')
	 {
	 	echo "<script>alert('Please fill in all the fields')</script>";
	 	exit();
    }
    else {
	 
	 		move_uploaded_file($post_image_tmp, "new_images/$post_image");

	 		echo $insert_posts = "insert into posts(category_id,post_title,post_date,post_author,post_keywords,post_image,post_content) values ('$post_cat','$post_title',NOW(),'$post_author','$post_keywords','$post_image','$post_content')";

	 	         $run_posts = mysqli_query($con, $insert_posts);

	 	    echo "<script>alert('Post Has been Published')</script>";

	 	    echo "<script>window.open('index.php?insert_post','_self')</script>";
    }
	 	

	 }


?>

<?php }  ?>