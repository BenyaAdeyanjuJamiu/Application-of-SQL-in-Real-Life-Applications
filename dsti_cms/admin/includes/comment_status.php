<?php

  @session_start();

  if(!isset($_SESSION['user_name'])){

  echo "<script>window.open('../admin_login.php?not_authorize=You are not Authorize to access this page.','_self')</script>";

 }else{

?>

 <?php

    include("includes/database.php");

    if (isset($_GET['unapprove'])) {

     $unapprove_id = $_GET['unapprove'];

     $unapprove_comment = "update comments set  status ='unapprove' where comment_id='$unapprove_id'";
  
     $run_unapprove_comment = mysqli_query($con, $unapprove_comment);

       echo "<script>alert('Comment Unapprove')</script>";
       echo "<script>window.open('index.php?view_comments','_self')</script>";
    	
    }

    if (isset($_GET['approve'])) {

     $approve_id = $_GET['approve'];

     $approve_comment = "update comments set  status ='approve' where comment_id='$approve_id'";
  
     $run_approve_comment = mysqli_query($con, $approve_comment);

       echo "<script>alert('Comment Approved')</script>";
       echo "<script>window.open('index.php?view_comments','_self')</script>";
    	
    }

    ?>

  <?php } ?>
