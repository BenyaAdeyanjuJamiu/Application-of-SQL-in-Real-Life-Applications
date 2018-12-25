 <div class="navbar">
	  	   	 <ul id="menu">

	  	   	 	<!--Add Database and write sql  query to pull out categories-->

	  	   	 	<?php
                  include("includes/database.php");

                  $get_cats = "select * from categories";

                  $run_cats = mysqli_query($con,$get_cats);

                  while($cats_row = mysqli_fetch_array($run_cats)){

                  	$cat_id = $cats_row["cat_id"];
                  	$cat_title = $cats_row["cat_title"];

                  	echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";

                  }

	  	   	 	?>
	  	   	 </ul>
	  	   	
	  	   	<!--Search bar-->
	  	   	<div id="form">
	  	   		<form method="get" action="results.php" enctype="multipart/form-data">
	  	   		  <input type="text" name="search_query" placeholder="Data Science Information,Jobs, Keras, MIT,Opencv, DSTI, Artificial Intelligence, Machine Learning,etc" size="132">
	  	   		  <input type="submit" name="search" value="Search Now">	
	  	   			
	  	   		</form>
	  	   	</div>

	  	   </div>
	  	   <!--Nav bar ends here-->

