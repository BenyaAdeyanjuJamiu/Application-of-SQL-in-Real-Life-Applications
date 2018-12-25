 
 <div class="side_bar">

  <div class="social">
     <div class="ppp"><center>Subscribe via Email</center></div>
     <form style="padding: 3px;text-align: center;" action="http://feedburner.google.com/fb/a/mailverify">
      
      <p><input type="email"  style="width: 180px;" name="email"></p>
      <p><input type="hidden" value=""><input type="submit" value="Subscribe"></p>
      
     </form>
  </div>

  <center><div id="stitle">Follow Us!</div>
  <div id="social">

    <a href="http://www.facebook.com/benya.jamiu" target="_blank"><img src="images/facebook1.png" height="45" width="40"></a>
    <a href="http://www.google.com/benya.jamiu" target="_blank"><img src="images/google.png" height="45" width="40"></a>
    <a href="http://www.twitter.com/benya.jamiu" target="_blank"><img src="images/twitter.png" height="45" width="40"></a>
    <a href="http://www.whatsapp.com/benya.jamiu" target="_blank"><img src="images/whatsapp.png" height="45" width="40"></a>
    
  </div>
    </center>





    <div class='stitle'>Recent News</div>
  
 <?php
	  	   	 include("includes/database.php");

             
            $get_posts = "select * from posts order by 1 DESC LIMIT 0,6";

            $run_posts = mysqli_query($con,$get_posts);

            while($row_posts = mysqli_fetch_array($run_posts)){

           	 $post_id = $row_posts['post_id'];
           	 $post_title = $row_posts['post_title'];
           	 
           	 $post_image = $row_posts['post_image'];
           	 
 
            echo "
                 


                  <div class='recent_post'>

                <p><b><a href='details.php?post=$post_id'>$post_title</a></b></p>

               

                <img src='admin/new_images/$post_image' width='100' height='100'/>

               </div>

            ";

           	
           }

	  	   ?>	
</div>
