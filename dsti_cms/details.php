<!DOCTYPE html>
<html>
<head>
	<title>Home - Data Science Information Boards</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all">
</head>
<body>

	   <!--This is main container start here-->
	  <div class="container">


            <!--Logo is here-->
	  	   <div class="head">
	  	   	<a href='index.php'><img id="dsti1" src="images/dsti3.png" height="123"><!--307 adjsted in css in height-->
	  	   	<img id="dsti2" src="images/dsti2.png" height="125" width="596"></a>
	  	   </div>
	  	   <!--Logo ends here-->

	  	   <!--This is nav Bar-->
	  	  <?php include("includes/navbar.php"); ?>
	  	   <!--Side bar ends here-->

	  	   <!--This is post area-->
	  	   
	  	    <div class="post_area">

	  	   	 <?php
	  	   	 include("includes/database.php");

            if(isset($_GET['post'])){

            $post_id = $_GET['post'];


            $get_posts = "select * from posts where post_id='$post_id'";

            $run_posts = mysqli_query($con,$get_posts);

            while($row_posts = mysqli_fetch_array($run_posts)){

           	 
           	 $post_title = $row_posts['post_title'];
           	 $post_date = $row_posts['post_date'];
           	 $post_author = $row_posts['post_author'];
           	 $post_image = $row_posts['post_image'];
           	 $post_content = $row_posts['post_content'];
 
            echo "
                <p><b>$post_title</a></b></p>

                <span><i>Posted by </i> <strong>$post_author</strong>  &nbsp; On <b> $post_date</b></span><span style='color:brown;'></span>

                <img src='admin/new_images/$post_image' width='300' height='300'/>&nbsp;

                <div>$post_content</div>

            ";

           	
           }
       }
           include("includes/comment_form.php");
	  	   ?>	

          

          </div>
	  	
       






	  	   <!--End of the Comment area-->


	  	   <!--Post Area ends here-->

	  	   <!--This is side bar-->
           
            <div class="side_bar">
              <?php include("includes/sidebar.php"); ?>
             </div>
          <!--End of side bar-->


	  	   <!--This is footer-->
	  	    <?php include("includes/footer_area.php"); ?>
	  	
	  </div><!--Container ends here-->

</body>
</html>