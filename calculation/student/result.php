<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Interactive Mathematics Results</title><link rel="shortcut icon" href="../icon.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Upturn Smart Online Exam System" />

</head> 
<body>
<div class="page-container">
   <!--/content-inner-->
<div class="left-content">
<div class="mother-grid-inner">
<?php 
 session_start();
 if($_SESSION["studentid"]==true)
{
 include("connect.php");
 include("checkstud.php");
 include("header.php"); ?>

	<ol class="breadcrumb">
	                  <center><li class="breadcrumb-item"><h4><a href="">My Results</a></h4></li></center>
            </ol>
<!--grid
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	-->
  	    
<?php

include("connect.php");
$sql="SELECT * FROM assesmenttbl WHERE studid = '$my_id'";
$result = mysqli_query($con, $sql);
?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">

<table width="100%" id="table">
<thead>
<tr>
               
               <th align="left">Exam</th>
			   <th align="left">Student ID</th>
			   <th align="left">Student Name</th>
			   <th align="left">Score</th>
			   <th align="left">Date</th>
               <th align="left">Status</th>
	 
			   
</tr>
</thead>
<tbody>
<?php while($rows=mysqli_fetch_assoc($result))
{
	extract($rows);
	
	?>
 
    <tr>
    <td><?php echo $rows['examname'];?></td>
    <td><?php echo $rows['studid'];?></td>
	<td><?php echo $rows['studname'];?></td>
	<td><?php echo $rows['score'];?><b>%</b></td>
	<td><?php echo $rows['date'];?></td>
	<td><?php echo $rows['status'];?></td>
 
    </tr>
<?php }?>
</tbody>
</table>
</div>
</div>
</div>
	
<?php include("footer.php"); ?>
</div></div>

	<?php include("sidebar.php"); ?>
	<?php }
else
	header('location:login.php');
?>
	
	</div>
</body>
</html>