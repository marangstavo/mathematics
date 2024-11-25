<?php
//session_start();// Starting Session
include("connect.php");
$student_check= $_SESSION["studentid"];// Storing Session
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($con, "select * from studenttbl where studid = '$student_check'");

$row = mysqli_fetch_assoc($ses_sql);
$my_id=$row['studid'];
$my_fname =$row['fname'];
$my_lname =$row['lname'];
$my_gender =$row['gender'];
$my_email =$row['email'];
$my_address=$row['address'];
$my_department=$row['deptname'];
$my_birthdate=$row['dob'];
$phone=$row['phone'];
$my_file=$row['file'];
$class=$row['class'];
$my_category=$row['catname'];
if(!isset($my_fname)){
//mysqli_close($con); // Closing Connection
//header('Location: usertbl.php'); // Redirecting To Home Page
}
?>
