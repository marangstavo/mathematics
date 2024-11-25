<?php
include("connect.php");
    if (isset($_GET['del'])) {
        $post_del =  $_GET['del'];
        $del_query = "DELETE FROM pastpapers WHERE ID='$post_del'";
        $run_del_query = mysqli_query($con, $del_query) or die (mysqli_error($con));
        if (mysqli_affected_rows($con) > 0) {
            echo "<script>alert('Past Exam deleted successfully');
            window.location.href='viewexampapers.php';</script>";
        }
        else {  echo "<script>alert('error occured.try again!');</script>";  } }
		
		
        if (isset($_GET['pub'])) {
        $id =  $_GET['pub'];
        
		$status =  $_GET['status'];
		if($status == '0'){$status='1';} 
		else if($status == '1'){$status='0';} 
		
        $pub_query = "UPDATE studenttbl SET status='$status' WHERE studid='$id'";
        $run_pub_query = mysqli_query($con, $pub_query) or die (mysqli_error($con));
        if (mysqli_affected_rows($con) > 0) {
            echo "<script>alert('Student details updated successfully');
            window.location.href='studentlist.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }
?>
<html>
<head>
<title>Interactive Mathematics Past Exams list
</title> <link rel="shortcut icon" href="../icon.png">
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

 include("connect.php");
include("header.php"); ?>
 
 
  	    
<?php

include("connect.php");
$sql="select * from pastpapers ";
$result = mysqli_query($con, $sql);
?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info"> <h2>List of past Exams</h2>
  <div class="col-md-12">
 <div class="col-md-4">
 <li class="breadcrumb-item text-white" ><h4 ><a href = "addexampapers.php" class=" btn btn-primary hvr-icon-float-away col-9">Add a Past Exam Paper </a></h4></li> 
</div>
<!--div class="col-md-3">
<li class="breadcrumb-item text-white" ><h4 ><a href = "addstudent.php" class=" btn btn-primary col-9">Export PDF</a></h4></li> 
</div-->

<div class="col-md-4">
<!--li class="breadcrumb-item text-white" ><h4 ><a href = "excel.php" 
TARGET="_blank" class=" btn btn-success col-9">Export Excel </a></h4></li--> 
</div>
<div class="col-md-4">
<li class="breadcrumb-item text-white" style="padding-top:38px;" ><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.."  style=" color:black; border-color: green;" /></li>

</div>
</div>
 
<table width="100%" id="table">
<thead>
<tr>
               <th align="left">Id</th>  
			   <th align="left">Exam name</th>
			   <th align="left">Student Level</th>
			   <th align="left">Department</th>
			   <th align="left">Year</th>
			   <th align="left">Files</th>
			   <th align="left">Action</th>
			    
</tr>
</thead>
<tbody id="example">
<?php 
$cnt =0;
while($rows=mysqli_fetch_array($result))
{
	$cnt++;
	extract($rows);
	?>

    <tr>
    <td><?php echo $cnt; ?></td>
	<td><?php echo $rows['Examname']; ?></td>
	<td><?php echo $rows['Level'];?></td>
 
	<td><?php  echo $rows['Department'];?></td>
	<td><?php echo $rows['Year'];?></td>
<td><a href="../student/uploaded/<?php echo $rows['Files'];?>" >Download <?php echo $rows['Files'];?></a></td>
	<!--
<?php echo($rows['Files']!=NULL)?'<img src="../student/uploaded/'.$rows['Files'].'" width="50" height="50">' :'' ;?>-->
	<td>
	
 

	<button class="btn btn-dark text-white "><a href = "?del=<?php echo $rows['ID']; ?>" onclick = "getConfirm('Delete');">Delete </a> </button>
 
 
	</td>
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
 
<script type = "text/javascript">

function getConfirm(l)
{
  if(arguments[0] != null)
{
    if(window.confirm('Are you sure you want to ' + l + '?\n'))
    {
     // location.href = l;
    }
    
    else
    {
      event.cancelBubble = true;
      event.returnValue = false;
      return false;
    }
  }
  
  else
  {
    return false;
  }
  return;
}
</script>

 
</html>