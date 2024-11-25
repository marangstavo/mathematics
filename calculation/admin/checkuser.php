<?php
//session_start();// Starting Session
include("connect.php");
$user_check= $_SESSION["userid"];// Storing Session
 
$ses_sql= mysqli_query($con, "select * from usertbl where uid = '$user_check'");
 
$row = mysqli_fetch_assoc($ses_sql);
$my_id=$row['uid'];
$my_fname =$row['fname'];
$my_lname =$row['lname'];
$my_gender =$row['gender'];
$my_phone=$row['phone'];
$my_email =$row['email'];
$my_address=$row['address'];
$my_birthdate=$row['dob'];
$my_file=$row['file'];
if(!isset($my_fname)){
//mysqli_close($con); // Closing Connection
//header('Location: usertbl.php'); // Redirecting To Home Page
}
?>
