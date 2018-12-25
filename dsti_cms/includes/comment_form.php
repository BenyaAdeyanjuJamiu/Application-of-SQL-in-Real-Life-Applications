
<?php


          
  //This is code is together with Inserted code down after select;
  include("includes/database.php");
  
  if(isset($_GET['post'])){

    $post_id = $_GET['post'];

    $get_posts = "select * from posts where post_id = $post_id";

    $run_posts = mysqli_query($con, $get_posts);

    $row = mysqli_fetch_array($run_posts);

    $post_new_id = $row['post_id'];
  }
  ?>

        &nbsp;&nbsp;  <center><b><h2>
          Comments So Far
  <?php        

      //Count Comments:

  $get_cooments = "select * from comments where post_id='$post_new_id' AND status='approve'";

  $run_comments = mysqli_query($con, $get_cooments);

  $count = mysqli_num_rows($run_comments);

  echo "(" . $count . ")";

   ?>

        </h2></b></center>  
 <?php 
  //Get the comment out from database:
  $get_cooments = "select * from comments where post_id='$post_new_id' AND status='approve'";

  $run_comments = mysqli_query($con, $get_cooments);

  while ($row_comments= mysqli_fetch_array($run_comments)) {
    
     $comment_name = $row_comments['comment_name'];
     $comment_text = $row_comments['comment_text'];

     echo "<h3 style='background:black;padding-left:10px; color:white';>$comment_name<i>&nbsp;Says:</i></h3>
     

     <p style='background:#F63'; padding-left:5px;,>$comment_text</p>
     ";

  }



?>
	    	   <!--Build form for the Comment side-->
     <div>
           <form method="post" action="details.php?post=<?php echo $post_new_id; ?>">
           	
           
           <table width="730" align="Center" bgcolor="#99CCCC">
           	    		
               <tr>
               	<td align="right"><b>Your Name:</b></td>
               	<td><input type="text" name="comment_name" size="60"></td>
               </tr>


               <tr>
               	<td align="right"><b>Your Email:</b></td>
               	<td><input type="email" name="comment_email" size="60"></td>
               </tr>


               <tr>
               	<td align="right"><b>Your Comment:</b></td>
               	<td><textarea cols="51" rows="10" name="comment_text"></textarea></td>
               </tr>


               <tr>
               	<td colspan="4" align="Center"><input type="submit" name="submit"  value="Post Comment"></td>
               </tr>

           </table>
             

           </form>
  </div>

<?php

 include("includes/database.php");

 if(isset($_POST['submit'])){

  $post_com_id = $post_new_id;
  
  $comment_name = $_POST['comment_name'];
  $comment_email = $_POST['comment_email'];
  $comment_text = $_POST['comment_text'];
  $status = "unapprove";

  if($comment_name == '' OR $comment_email=='' OR $comment_text == ''){

    echo "<script>alert('Please write your comment into the fields')</script>";
    echo "<script>window.open('details.php?post=$post_id')</script>";
    exit();

  }
  else
  {
     $query_comment = "insert into comments (post_id,comment_name, comment_email,comment_text,status) 
                      values ('$post_com_id','$comment_name', '$comment_email','$comment_text','$status')";

     $run_comment = mysqli_query($con, $query_comment);  

    echo "<script>alert('Your Comments will be Publised after approval')</script>";
    echo "<script>window.open('details.php?post=$post_id')</script>";
    

  }


 }





?>