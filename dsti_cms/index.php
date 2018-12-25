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
	  	   <?php include("includes/post_content.php"); ?>
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