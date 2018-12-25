<div class="post_area">

	  	   	 <?php
	  	   	 include("includes/database.php");
           
           if(isset($_GET['cat'])){

            $cat_id = $_GET['cat'];
           
             
            $get_posts = "select * from posts where category_id ='$cat_id'";

            $run_posts = mysqli_query($con,$get_posts);

            while($row_posts = mysqli_fetch_array($run_posts)){

           	 $post_id = $row_posts['post_id'];
           	 $post_title = $row_posts['post_title'];
           	 $post_date = $row_posts['post_date'];
           	 $post_author = $row_posts['post_author'];
           	 $post_image = $row_posts['post_image'];
           	 $post_content = substr($row_posts['post_content'],0,300);
 
            echo "
                <p><b><a id='ltitle' href='details.php?post=$post_id'>$post_title</a></b></p>

                <span><i>Posted by </i> <strong>$post_author</strong>  &nbsp; On <b> $post_date</b></span><span style='color:brown;'><b> &nbsp;Comments(2)</b></span>

                <img src='admin/new_images/$post_image' width='100' height='100'/>

                <div>$post_content<a id='rmlink' href='details.php?post=$post_id'>Read More</a></div><br>

            ";

           	
           }

         }

	  	   ?>	
          
	  	   </div>