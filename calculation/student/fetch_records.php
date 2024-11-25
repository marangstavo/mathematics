<?php
include("connect.php");
include('checkstud.php');
$students_in_my_class = 0;
$active_examinations = 0;
$my_subjects = 0;
$passed_exam = 0;
$failed_exam = 0;
$attended_exams = 0;
$locked_exams = 0;
$notice = 0;

$sql = "SELECT * FROM studenttbl WHERE class = '$class' and deptname='$my_department'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
     $students_in_my_class++;
    }
} else {

}

$sql = "SELECT * FROM examtbl WHERE class = '$class' AND status = '1'";
$result =  mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
     $active_examinations++;
    }
} else {

}


$sql = "SELECT * FROM subjecttbl WHERE catname = '$my_category'";
$result =  mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
     $my_subjects++;
    }
} else {

}

$sql = "SELECT * FROM assesmenttbl WHERE studid = '$my_id' AND status = 'PASS'";
$result = mysqli_query($con,  $sql);

if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
     $passed_exam++;
    }
} else {

}

$sql = "SELECT * FROM assesmenttbl WHERE studid = '$my_id' AND status = 'FAIL'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
     $failed_exam++;
    }
} else {

}


$sql = "SELECT * FROM assesmenttbl WHERE studid = '$my_id'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
     $attended_exams++;
    }
} else {

}


$sql = "SELECT * FROM examtbl WHERE catname = '$my_category' AND status = '0'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
     $locked_exams++;
    }
} else {

}

$sql = "SELECT * FROM noticetbl";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
     $notice++;
    }
} else {

}
//mysqli_close($con);