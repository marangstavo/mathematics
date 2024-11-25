<?php
session_start();

include('connect.php');
include('checkuser.php');
if(isset($_POST))
{
   $new_password = $_POST['pass'];
   $new_cpassword = $_POST['spass'];

   $sql = "UPDATE usertbl SET password='$new_password',cpassword='$new_cpassword' WHERE uid='$user_check'";

$result=mysqli_query($con, $sql);
if($result)
{
	header("location:userprofile.php");
} 

mysql_close($con);
}
?>
