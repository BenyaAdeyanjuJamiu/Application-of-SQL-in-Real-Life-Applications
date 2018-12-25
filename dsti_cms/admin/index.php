<?php

  session_start();

  if(!isset($_SESSION['user_name'])){

  echo "<script>window.open('admin_login.php?not_authorize=You are not Authorize to access this page.','_self')</script>";

 }else{


?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="wrapper">
		
      <a href="index.php"><div class="header"></div></a>


      <div class="left" style="height: 10000px;">
      	 
      	 <h3 style="padding:5px">Manage Content</h3>

      	 <a href="index.php?insert_post">Insert New Post</a>
      	 <a href="index.php?view_posts">View all Posts</a>
      	 <a href="index.php?insert_cat">Insert New Category</a>
      	 <a href="index.php?view_cats">View all Categories</a>
      	 <a href="index.php?view_comments">View all Comments</a>
      	 <a href="admin_logout.php">Admin Logout</a>

      </div>

      <div class="right" style="height: 10000px;">
 
     <center> <span style="padding:5px;margin: 5px;"><strong>To do Tasks:</strong><span style="color: red">
     	<a href="index.php?view_comments">

      Pending Comments <?php
       include("includes/database.php");

       $get_comments = "select * from comments where status ='unapprove'";

       $run_comments = mysqli_query($con, $get_comments);

       $count = mysqli_num_rows($run_comments);

       echo "(" . $count  . ")";

       ?>
       </a></span></span></center>

       <h2 style="color:#C33;"><?php echo @$_GET['logged']; ?></h2>

       <span style="font-size: 16px;">Welcome</span><h2 style="color: #09C"><?php echo $_SESSION['user_name']; ?></h2>

     


       <?php

         include("includes/database.php");


      
         if(isset($_GET['insert_post'])){

         include("includes/insert_post.php");

         }

         if(isset($_GET['view_posts'])){

         include("includes/view_posts.php");

         }

         if(isset($_GET['edit_post'])){

         include("includes/edit_post.php");

         }

         if(isset($_GET['insert_cat'])){

         include("includes/insert_cat.php");

         }

         if(isset($_GET['view_cats'])){

         include("includes/view_cats.php");

         }

         if(isset($_GET['edit_cat'])){

         include("includes/edit_cat.php");
         }

         if(isset($_GET['view_comments'])){

         include("includes/view_comments.php");
         }

         if(isset($_GET['unapprove'])){

         include("includes/comment_status.php");
         }

         if(isset($_GET['approve'])){

         include("includes/comment_status.php");
         }

          if(isset($_GET['del_comment'])){

         include("includes/del_comment.php");
         }

         

       ?>
      </div>

      

      <!--<div class="footer">
  <h1 style="padding: 20px; text-align: center;"> &copy;All Right Reserved by ShaTech Numerique,Inc. 2010-<?php echo date("Y");?></h1>
	</div> -->

	</div>

</body>
</html>


<?php } ?>