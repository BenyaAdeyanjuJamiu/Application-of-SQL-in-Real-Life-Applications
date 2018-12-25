<?php

 @session_start();

  if(!isset($_SESSION['user_name'])){

  echo "<script>window.open('../admin_login.php?not_authorize=You are not Authorize to access this page.','_self')</script>";

 }else{

?>




<!DOCTYPE html>
<html>
<head>
	<title>Insert Form</title>
	<!--tinymce.com-->
	<!--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <style type="text/css">
  	textarea,input{
  		resize: none;
  		border:2px solid gray;
  	}
  </style>-->
</head>
<body bgcolor="pink">
  <?php
   
   include("includes/database.php");

   if(isset($_GET['edit_post'])){

   $edit_id = $_GET['edit_post'];

   $edit_post = "select * from posts where post_id='$edit_id'";

   $run_edit  = mysqli_query($con, $edit_post);

   while($row_post = mysqli_fetch_array($run_edit)){

   $post_id = $row_post['post_id'];
   $post_title = $row_post['post_title'];
   $post_cat = $row_post['category_id'];
   $post_author = $row_post['post_author'];
   $post_keywords = $row_post['post_keywords'];
   $post_image= $row_post['post_image'];
   $post_content = $row_post['post_content'];
   


   }
}






?>

	<form action="" method="post" enctype="multipart/form-data">

		<table width="795"  border="2" align="center" bgcolor="#999999">

			<tr>
				<td colspan="6" align="center"><h1>Update This Post:</h1></td>
			</tr>

			

			<tr>
				<td align="right">Post Title:</td>
				<td><input type="text" name="post_title" size="60" value="<?php echo $post_title; ?>"></td>
			</tr>

			<tr>
				<td align="right">Post Category:</td>
				<td>
					<select name="cat">
				 <!--We have to remove the default select option-->		
					<!--<option value="null">Select a Categoty</option>-->
                     
                     <?php

 	                     include("includes/database.php");

 	                     $get_cats  = "select * from categories where cat_id='$post_cat'";

 	                     $run_cats = mysqli_query($con, $get_cats);

 	                     while($row_cats = mysqli_fetch_array($run_cats)){

 	                    	$cat_id =  $row_cats['cat_id'];
 	   	                  $cat_title = $row_cats['cat_title'];

 	   	                 echo "<option value='$cat_id'>$cat_title</option>";


 	   	                // We have to write another query to have other options//

 	   	                 $get_more_cats = "select * from categories";

 	                     $run_more_cats = mysqli_query($con, $get_more_cats);

 	                     while($row_more_cats = mysqli_fetch_array($run_more_cats)){

 	                    	$cat_id =  $row_more_cats['cat_id'];
 	   	                    $cat_title = $row_more_cats['cat_title'];

 	   	                 echo "<option value='$cat_id'>$cat_title</option>";

                            }
 	                      }

 	                    ?>	

				</select>
			</td>
			</tr>

			<tr>
				<td align="right">Post Author:</td>
				<td><input type="text" name="post_author" size="60" value="<?php echo $post_author; ?>"></td>
			</tr>

			<tr>
				<td align="right">Post Keywords:</td>
				<td><input type="text" name="post_keywords" size="60" value="<?php echo $post_keywords; ?>"></td>
			</tr>

			<tr>
				<td align="right">Post Image:</td>
				<td><input type="file" name="post_image">
                 <img src="new_images/<?php echo $post_image;?>" width="60" height="60">
				</td>
			</tr>

			<tr>
				<td align="right">Post Content:</td>
				<td><textarea name="post_content" cols="85" rows="20"><?php echo $post_content; ?></textarea></td>
			</tr>

			<tr>
				
				<td colspan="7" align="center"><input type="submit" name="update" value="Update Now"></td>
			</tr>
			
		</table>
		
	</form>

</body>
</html>
<?php

  //echo phpinfo();
 //include_once("includes/db_connect.php");


  // We can usd the same names and values;
  if(isset($_POST['update'])){

  	//include("includes/db_connect.php");

  	//mysqli_real_escape_string()
      
     // $update_id = $_GET['post_edit'];

    $update_id  = $post_id;

 	  $post_title =  $_POST['post_title'];
 	 
 	  $post_cat1 =  $_POST['cat'];
 	  $post_keywords = $_POST['post_keywords'];
 	  $post_author =  $_POST['post_author'];
 	  $post_image =  $_FILES['post_image']['name'];
 	  $post_image_tmp   =  $_FILES['post_image']['tmp_name'];
 	  $post_content = $_POST['post_content'];
    $post_date  = date('Y-m-d');

    //Its not complusory to fill all the fields:
 	
     // if($post_title == '' || $post_cat == 'null' || $post_keywords == ''|| $post_author == '' || $post_image == '' || $post_content == '')
     // {

      	//echo "<script>alert('Please fill in each fileds')</script>";
      	//exit();
     // }else
      {
      	move_uploaded_file($post_image_tmp, "new_images/$post_image");

          $update_posts = "update posts set category_id='$post_cat1',
                                           post_title ='$post_title',
                                           
                                           post_author= '$post_author',
                                           post_keywords ='$post_keywords',
                                           post_image = '$post_image',
                                           post_content = '$post_content',
                                           post_date = '$post_date'
                                     where post_id = '$update_id'";

      	  //$sql = "INSERT INTO user (category_id,post_title,post_date,post_author,post_keywords,post_image,post_content) VALUES ('$post_cat','$post_title','$post_date',$post_author','$post_keywords','$post_image','$post_content')";

  	    //$result = mysqli_query($conn, $sql);

      	 $run_update = mysqli_query($con,$update_posts);
      	
      	echo "<script>alert('Message Has been Updated into our system.')</script>"; 
        echo "<script>window.open('index.php?view_posts','_self')</script>";   
      }


 }

?>
<?php } ?>
