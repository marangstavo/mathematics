<?php

  ob_start();
  include("connect.php");
  if(isset($_GET['id'])!="")
  {
  $delete=$_GET['id'];
  $delete=mysqli_query($con, "DELETE FROM questiontbl WHERE qid='$delete'");
  if($delete)
  {
      header("Location:examlist.php");
  }
  else
  {
      echo mysqli_error();
  }
  }
  ob_end_flush();

?>