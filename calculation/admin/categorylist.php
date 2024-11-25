<?php
include("connect.php");
    if (isset($_GET['del'])) {
        $post_del =  $_GET['del'];
        $del_query = "DELETE FROM categorytbl WHERE cid='$post_del'";
        $run_del_query = mysqli_query($con, $del_query) or die (mysqli_error($con));
        if (mysqli_affected_rows($con) > 0) {
            echo "<script>alert('Information deleted successfully');
            window.location.href='categorylist.php';</script>";
        }
        else {  echo "<script>alert('error occured.try again!');</script>";  } }
		
		
        if (isset($_GET['pub'])) {
        $id =  $_GET['pub'];
        
		$status =  $_GET['status'];
		if($status == '0'){$status='1';} 
		else if($status == '1'){$status='0';} 
		
        $pub_query = "UPDATE categorytbl SET cstatus='$status' WHERE cid='$id'";
        $run_pub_query = mysqli_query($con, $pub_query) or die (mysqli_error($con));
        if (mysqli_affected_rows($con) > 0) {
            echo "<script>alert('Information updated successfully');
            window.location.href='categorylist.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }
?>
<html>
<head>
<title>Interactive Mathematics Category List
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


include("header.php"); ?>

	<!--ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="">Level of students</a></h4></li></center>
            </ol>
<grid 
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
	
<?php

include("connect.php");
$sql="select cid,catname,deptname,cstatus from categorytbl ";
$result = mysqli_query($con, $sql);
?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>Level of Students</h2>
<table width="100%" id="table">
<thead>
<tr>
               <th align="left">Id</th>
			   <th align="left">Category Name</th>
			   <th align="left">Department Name</th>
			   <th align="left">Action</th>
			    
</tr>
</thead>
<tbody>
<?php 
$cnt=0;
while($rows=mysqli_fetch_array($result))
{
	$cnt++;
	?>

    <tr>
    <td><?php echo $cnt;?></td>
	<td><?php echo $rows['catname'];?></td>
    <td><?php echo $rows['deptname'];?></td>
	
	<td>
    <?php
	$status=$rows['cstatus'];
if(($status)=='0')
{
?>
<button class="btn bg-danger">
<a href = "?pub=<?php echo $rows['cid'];?>&status=<?php echo $status;?>" onclick = "getConfirm('Activate');"> Activate </a></button>
<?php
}
if(($status)=='1')
{
?>
<button class="btn bg-success text-white ">
<a href = "?pub=<?php echo $rows['cid'];?>&status=<?php echo $status;?>" onclick = "getConfirm('De-Activate');"> De-Activate</a></button><?php
}
?> <button class="btn btn-dark text-white "><a href = "?del=<?php echo $rows['cid']; ?>" onclick = "getConfirm('Delete');">Delete </a> </button>
	<!--button class="btn bg-alert dark text-white "><a href = "http://www.upturnit.com/product.php" onclick = "getConfirm(this.href);"> Edit </a></button-->
	</td>
    </tr>
<?php }?>
</tbody>
</table>
</div>
</div>
</div>

<!--<button><a href="logout.php">Logout</a></button>-->

<!--
 </div>

</div>
 	<!--//grid-->
	
<?php include("footer.php"); ?>
</div></div>


	
	<?php include("sidebar.php"); ?>
	<?php }
else
	header('location:login.php');
?>
	
	</div>
</body>
<!--popup script start -->
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

	<!--popup script end -->
</html>
<?php

//mysqli_close($con);
?>
