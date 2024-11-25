<?php

  ob_start();
  include("connect.php");
  if(isset($_GET['id'])!="")
  {
  $delete=$_GET['id'];
  $delete=mysqli_query($con, "DELETE FROM subjecttbl WHERE sid='$delete'");
  if($delete)
  {
      header("Location:subjectlist.php");
  }
  else
  {
      echo mysqli_error();
  }
  }
  ob_end_flush();

?>