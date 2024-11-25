<html>
<head>
<title>Interactive Mathematics Results</title> <link rel="shortcut icon" href="../icon.png">
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
if($_SESSION["userid"]==true)
{
include("header.php"); ?>
   
<?php

include("connect.php");
$exam_id = "";
if (isset($_GET['exam_id'])) {
$exam_id = $_GET['exam_id'];


}
 
 
// $sql="SELECT assesmenttbl.studid, assesmenttbl.studname, assesmenttbl.examname, assesmenttbl.examid, assesmenttbl.score,studenttbl.fname, studenttbl.lname FROM assesmenttbl INNER JOIN studenttbl ON studenttbl.studid = assesmenttbl.studid";
//$sql="SELECT * FROM assesmenttbl where assesmenttbl.examid ='$exam_id'";
 
 
 $sql="SELECT * FROM assesmenttbl JOIN studenttbl ON assesmenttbl.studid=studenttbl.studid and assesmenttbl.examid ='$exam_id'";
$result = mysqli_query($con, $sql);
?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>Passed students </h2>
<li class="breadcrumb-item text-white" style="padding-bottom:8px; float:right" ><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.."  style=" color:black; border-color: green;" /></li>

<table width="100%" id="table">
<thead>
<tr>
 
<th align="left">Photo</th>
			  <th align="left">Student name</th>
			  
              <th align="left">Exam name</th>
              <th align="left">Score</th>
              <th align="left">Exam was written on</th>
            
 		    
</tr>
</thead>
<tbody id="example">
<?php while($rows=mysqli_fetch_assoc($result))
{
	 if($rows['score'] >= '50'){
 
	//extract($rows);
	
	$status = $rows['score'];
	if (true) {
	  $st = '<p class="btn bg-success">ACTIVE</p>';
	  $stl = '<a href="pages/make_ex_in.php?id='.$rows['examid'].'">Make Inactive</a>';
	  }else{
	  $st = '<p class="btn bg-danger">INACTIVE</p>'; 
      $stl = '<a href="pages/make_ex_ac.php?id='.$rows['examid'].'">Make Active</a>';											   
    }
	
	?>

    <tr>
  	<td><?php echo($rows['file']!=NULL)?'<img src="../student/uploaded/'.$rows['file'].'" width="50" height="50">' :'' ;?></td>
    <td><?php echo $rows['studname'];?></td>
    
    <td><?php echo $rows['examname'];?></td>
    <td><?php echo $rows['score'];?> %</td>
    <td><?php echo $rows['date'];?></td>
 

    </tr>
<?php }}?>
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