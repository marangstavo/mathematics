<?php
include("connect.php");
$rsid = $_GET['rid'];
$exid = $_GET['eid'];

$sql = "DELETE FROM assesmenttbl WHERE recordid='$rsid'";

if (mysqli_query($con, $sql) === TRUE) {
    header("location:viewresults.php?eid=$exid");
} else {
     header("location:viewresults.php?eid=$exid");
}

//mysqli_close();
?>
