<?php
session_start();
include("connect.php");
if($_SESSION["studentid"]==true)
{

error_reporting(0);
$total_questions = $_POST['tq'];
$starting_mark = 1;
$mytotal_marks = 0;
$exam_id = $_POST['eid'];
$record = $_POST['ri'];
 
echo "<pre>";

while ($starting_mark <= $total_questions) {
 
	if(preg_replace('/\s+/', '', (base64_decode($_POST['ran'.$starting_mark.''])
)) == preg_replace('/\s+/', '', ($_POST['an'.$starting_mark.''])
)){
  
	echo "<br>corect";
$mytotal_marks = $mytotal_marks + 1;

}else{
	
}
$starting_mark++;

}
   
$percent_score = ($mytotal_marks / $total_questions) * 100;
$percent_score = floor($percent_score);
$passmark = $_POST['pm'];

if ($percent_score >= "50") {
$status = "PASS";

}else{
$status = "FAIL";	
}

$_SESSION['record_id'] = $record;
 

$sql = "UPDATE assesmenttbl SET score='$percent_score', status='$status' WHERE recordid='$record'";
 
if (mysqli_query($con, $sql) === TRUE) {

   header("location:./assessment_info.php");
} else {
   header("location:./assessment_info.php");
}

 mysqli_close($con);
?>
<?php }
else
	header('location:login.php');
?>

