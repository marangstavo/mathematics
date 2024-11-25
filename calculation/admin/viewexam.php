<?php
include("connect.php");
    if (isset($_GET['del'])) {
        $post_del =  $_GET['del'];
        $del_query = "DELETE FROM examtbl WHERE examid='$post_del'";
        $run_del_query = mysqli_query($con, $del_query) or die (mysqli_error($con));
        if (mysqli_affected_rows($con) > 0) {
            echo "<script>alert('Exam details deleted successfully');
            window.location.href='viewexam.php';</script>";
        }
        else {  echo "<script>alert('error occured.try again!');</script>";  } }
		
		
        if (isset($_GET['pub'])) {
        $id =  $_GET['pub'];
        
		$status =  $_GET['status'];
		if($status == '0'){$status='1';} 
		else if($status == '1'){$status='0';} 
		
        $pub_query = "UPDATE examtbl SET status='$status' WHERE examid='$id'";
        $run_pub_query = mysqli_query($con, $pub_query) or die (mysqli_error($con));
        if (mysqli_affected_rows($con) > 0) {
            echo "<script>alert('Exam details updated successfully');
            window.location.href='viewexam.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }
?>
<html>
<head>
<title>Interactive Mathematics Exam list
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

 include("connect.php");
include("header.php"); ?>
 
 
  	    
<?php

include("connect.php");
$sql="select * from examtbl ";
$result = mysqli_query($con, $sql);
?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info"> <h2>List of Students</h2>
  <div class="col-md-12">
 <div class="col-md-4">
 <li class="breadcrumb-item text-white" ><h4 ><a href = "addexam.php" class=" btn btn-primary hvr-icon-float-away col-9">Add Exam </a></h4></li> 
</div>
<!--div class="col-md-3">
<li class="breadcrumb-item text-white" ><h4 ><a href = "addstudent.php" class=" btn btn-primary col-9">Export PDF</a></h4></li> 
</div-->

<div class="col-md-4">
<li class="breadcrumb-item text-white" ><h4 ><a href = "examsexcel.php" class=" btn btn-success col-9">Export Excel </a></h4></li> 
</div>
<div class="col-md-4">
<li class="breadcrumb-item text-white" style="padding-top:38px;" ><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.."  style=" color:black; border-color: green;" /></li>

</div>
</div>
 
<table width="100%" id="table">
<thead>
<tr>
               <th align="left">Id</th>  
		 
			   <th align="left">Exam Name</th>
			   <th align="left">Duration</th>
		 
			   <th align="left">Exam topics</th>
			   <th align="left">Number of questions</th>
			   <th align="left">Student Level</th>
			   <th align="left">Instruction</th> 
		 
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
	 <td><?php echo $rows['examname']; ?></td>
	<td><?php echo $rows['duration'];?> mins</td>
	<td><?php  echo $rows['subname'];?></td>
	<td><?php echo $rows['number_of_qxns'];?></td>
	<td><?php echo $rows['catname'];?></td>
	<td><?php  echo $rows['instruction'];?></td> 
 
	
	
	<td>
	

    <?php
$status=$rows['status'];
if(($status)=='0')
{
?>
<button class="btn bg-danger">
<a href = "?pub=<?php echo $rows['examid'];?>&status=<?php echo $status;?>" onclick = "getConfirm('Activate');"> Activate </a></button>
<?php
}
if(($status)=='1')
{
?>
<button class="btn bg-success text-white ">
<a href = "?pub=<?php echo $rows['examid'];?>&status=<?php echo $status;?>"  onclick = "getConfirm('De-Activate');"> De-Activate</a></button><?php
}
?>

	<button class="btn btn-dark text-white "><a href = "?del=<?php echo $rows['examid']; ?>" onclick = "getConfirm('Delete');">Delete </a> </button>
 
	<!--button class="btn bg-alert dark text-white "><a href = "http://www.upturnit.com/product.php"
	onclick = "getConfirm(this.href);"> Edit </a></button-->
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
      location.href = l;
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