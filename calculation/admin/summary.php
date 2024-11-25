<html>
<head>
<title>Interactive Mathematics Summary
</title><link rel="shortcut icon" href="../icon.png">
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

include("header.php");

include("checkuser.php");
include("connect.php");

if (isset($_GET['eid'])) {
$exam_id = $_GET['eid'];
$sql = "SELECT * FROM examtbl WHERE examid = '$exam_id'";
$result = mysqli_query($con ,$sql);

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
     $excate = $row['catname'];
	 $exsubject = $row['subname'];
	 $exname = $row['examname'];
	 $exduration = $row['duration'];
	 $exterms = $row['instruction'];
    }
} else {
    header("location:./");
}

$stdpass = 0;
$stdfail = 0;

$sql = "SELECT * FROM assesmenttbl WHERE examid = '$exam_id'";
$result = mysqli_query($con , $sql);

if (mysqli_num_rows($result)) {
   
    while($row = mysqli_fetch_assoc($result)) {
     $status = $row['status'];
	 if ($status == "PASS"){
		 $stdpass++;
	 }else{
		$stdfail++; 
		 
	 }
	 
    }
} else {

}
//mysql_close($con);	
}else{
	header("location:./");
}
 

?>

  
 <div class="col-md-4">
<li class="breadcrumb-item text-white" ><h4 ><a href = "excel2.php" TARGET="_blank" class=" btn btn-success col-9">Export to Excel </a></h4></li> 
</div>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
      <div class="grid_3 grid_5 ">
      <h3>Results Summary - <?php echo "$exname"; ?> </h3>

				<div class="col-md-6 agileits-w3layouts">
					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th><b>Title</b></th>
								<th><b>Information</b></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Exam Name</td>
								<td><span class=" "><?php echo "$exname"; ?></span></td>
							</tr>
							<tr>
								<td>Description of exam</td>
								<td><span class=""><?php echo "$exsubject"; ?> </span></td>
							</tr>
 
							<tr>
								<td>Duration</td>
								<td><span class=""><?php echo "$exduration"; ?> <b>min.</b></span></td>
							</tr>
							<tr>
 	
							
						</tbody>
					</table>                    
				</div>
				
				<div class="col-md-6 agileits-w3layouts">
				<table class="table table-bordered">
						<thead>
							<tr>
								<th><center><b>Passed Students</b></center></th>
								<th><center><b>Failed Students</b></center></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><center><?php echo "$stdpass"; ?><br><span class="btn btn-success">
								<a href="resultsa.php?exam_id=<?php echo $exam_id;?>">View Student(s)</a></span></center></td>
 
								
								<td><center><?php echo "$stdfail"; ?><br><span class="btn btn-danger">
								<a href="resultsb.php?exam_id=<?php echo $exam_id;?>">View Student(s)</a></span></center></td>
							</tr>
						</tbody>
				</table>   
				
				</div>
			
				
            <div class="clearfix"> </div><BR><BR>
<?php
	$adminexpenses = array(
			array("y"=>  $stdpass  , "label"=> "Passed Students"),
			array("y"=>  $stdfail , "label"=> "Failed Students"),
		 
	);
?>
<div id="chartadmin" style="height: 370px; width: 100%;"></div>			
            </div>
			
			   

</div>
</div>
</div>


<?php include("footer.php"); ?>
</div></div>

	<?php include("sidebar.php"); 

	?>
	<?php }
else
	header('location:login.php');
?>
	</div>
	
	
</body>
<script src="js/canvasjs.min.js"></script>
<script>
window.onload = function () {

var chartadmin = new CanvasJS.Chart("chartadmin", {
axisY: { title: "Expenses Occurred(dollars)"},
data: [{ type: "pie", dataPoints: <?php echo json_encode($adminexpenses, JSON_NUMERIC_CHECK); ?> }] }); chartadmin.render(); 
 


}
</script>
</html>