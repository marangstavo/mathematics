<?php

include("connect.php");
 
?>
<html style="overflow-y: scroll;">
<head>
<title>Interactive Mathematics Add Question
</title><link rel="shortcut icon" href="../icon.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Upturn Smart Online Exam System" />

</head> 
<body style=";">
<div class="page-container">
   <!--/content-inner-->
<div class="left-content">
<div class="mother-grid-inner">
<?php 
session_start();
if($_SESSION["userid"]==true)
{
 
include("header.php"); ?>
 
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  	    
        <form action="viewquestions.php" method="post">
		     <div class="col-md-6 form-group2 group-mail">
            <?php $sql = "SELECT * FROM examtbl where status='1'";
                $result = mysqli_query( $con,$sql); ?>
				
            <label class="control-label">Select Examname</label>
            <select name="examnm" id="">
                <option value="" <?php if(!isset($_POST['examname']) || (isset($_POST['examname']) && empty($_POST['examname']))) { ?>selected<?php } ?>>--Select--</option>
                <?php 
                while($row =mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $row['examid']; ?>" <?php if(isset($_POST['examname']) && $_POST['examname'] == $row['examname']) { ?>selected<?php } ?>><?php echo $row['examname']; ?></option>
                <?php } ?>
				
				
            </select>
			</div>
			
         
		  <div class="clearfix"> </div>
          </div> 
			 
		  
            <div class="col-md-6 form-group">
              <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
              <button type="reset" class="btn btn-default" value="reset" >Reset</button>
            </div>
		
          <div class="clearfix"> </div>
		  
		  
        </form>
    
 	<!---->
 </div>

</div>
<?php
include("connect.php");
    if (isset($_GET['del'])) {
        $post_del =  $_GET['del'];
        $del_query = "DELETE FROM questiontbl WHERE qid='$post_del'";
        $run_del_query = mysqli_query($con, $del_query) or die (mysqli_error($con));
        if (mysqli_affected_rows($con) > 0) {
            echo "<script>alert('Question deleted successfully');
            window.location.href='viewquestions.php';</script>";
        }
        else {  echo "<script>alert('error occured.try again!');</script>";  } }
		
		
	   if(isset($_POST['submit']))
       {	
             $examnm=$_POST['examnm'];
					$sql_qry =  mysqli_query($con, "SELECT * FROM examtbl WHERE examid = '$examnm' ");
					$record = $sql_qry->fetch_array();
					$examname = $record['examname'];
					$duration = $record['duration'];
					$deptname = $record['deptname'];
					$catname = $record['catname'];
 

		 
			 
 $sql="select * from questiontbl where examid='$examnm' ";
$result = mysqli_query($con, $sql);

?>
<!--nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn-->	
 
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h4>Exam :<?php echo $examname;?></h4>
<h4>Exam is for :<?php echo $catname.' '. $deptname ;?></h4>
<h4>Duration :<?php echo $duration;?> mins</h4>
<table width="100%" id="table">
<thead> 
<tr>
               <th align="left">Id</th>
			   <th align="left">Question name</th>
			   <th align="left">Option one</th>
			   <th align="left">Option two</th>
			   <th align="left">Option three</th>
			   <th align="left">Option four</th>
			   <th align="left">Correct Answer</th>
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
	<td><?php echo $rows['questionname'];?></td>
    <td><?php echo $rows['op1'];?></td>
    <td><?php echo $rows['op2'];?></td>
    <td><?php echo $rows['op3'];?></td>
    <td><?php echo $rows['op4'];?></td>
    <td><?php echo $rows['correctop'];?></td>
	
	<td>
<button class="btn btn-dark text-white "><a href = "?del=<?php echo $rows['qid']; ?>" onclick = "getConfirm('Delete');">Delete </a> </button>
	<!--button class="btn bg-alert dark text-white "><a href = "http://www.upturnit.com/product.php" onclick = "getConfirm(this.href);"> Edit </a></button-->
	</td>
    </tr>
<?php }?>
</tbody>
</table>
</div>
</div>
</div>

<!--nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn-->	
<?php 
}
include("footer.php"); ?>
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