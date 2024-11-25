<?php include("connect.php");  

	   if(isset($_POST['submit']))
       {	
 
           $examname=$_POST['examname'];
           $duration=$_POST['duration'];
           $subname=$_POST['subname'];
           $catname="Grade one";
           $class=$_POST['class'];
           $deptname=$_POST['deptname'];
           $instruction=$_POST['instruction'];
           $number_of_qxns=$_POST['number_of_qxns'];
           $status= "1";
 
	       $query="insert into examtbl(examid, examname, duration, number_of_qxns, subname , deptname, catname ,class, instruction, status)
		   values('', '$examname' ,'$duration', '$number_of_qxns' ,'$subname','$deptname','$catname','$class','$instruction','$status')";
	 
           $result= mysqli_query($con, $query);
	 
	       if($result)
 
		 	echo "<script>alert('Exam added successfully');
      	window.location.href='addexam.php';</script>";
	       else
		  echo mysqli_error($con);
	       mysqli_close($con);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Interactive Mathematics Add Exam
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
?>
<?php include("header.php"); ?>


	<ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href = "#none">Add Student</a></h4></li></center>
            </ol>
<!--grid-->



 	<div class="validation-system">
 		
 		<div class="validation-form">
 

  	    
        <form action="addexam.php" method="post"  enctype="multipart/form-data">
				 <div class="col-md-12">
					<div class="col-md-4 form-group1">
					<label class="control-label">Exam name</label>
					<input type="text" placeholder="Exam Name" name="examname" required="">
					</div>  

					<div class="col-md-4 form-group1">
					<label class="control-label">Number of Questions</label>
					<input type="text"   name="number_of_qxns" required="" >
					</div>
					
					
					<div class="col-md-4 form-group1">
					<label class="control-label">Duration (mins)</label>
					<input type="text"   name="duration" required="" >
					</div>

					</div>
<!--kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk-->

                <div class="col-md-12">
					<br>
 		
					<div class="col-md-4 form-group1">
					<label class="control-label">Exam Topics</label>
					<input type="text"   name="subname" required="" >
					</div>
				 <div class="col-md-4 form-group2 group-mail">
					<label class="control-label">Class of Student </label>

					<select name="class" >
				<option value="Grade 1A" >Grade 1A</option>
				<option value="Grade 1B" >Grade 1B</option>
				<option value="Grade 1C" >Grade 1C</option>
				<option value="Grade 1D" >Grade 1D</option>
 
					</select>
				 </div>					 
				 <div class="col-md-4 form-group2 group-mail">
					<?php $sql = "SELECT deptname FROM departmenttbl where status='1'";
					$result = mysqli_query($con, $sql); ?>
					<label class="control-label">Select Department </label>
					<select name="deptname" id="">
		 
					<?php 
					while($row =mysqli_fetch_assoc($result)) {
					?>
					<option value="<?php echo $row['deptname']; ?>" <?php if(isset($_POST['deptname']) && $_POST['deptname'] == $row['deptname']) { ?>selected<?php } ?>><?php echo $row['deptname']; ?></option>
					<?php } ?>
					</select>
					</div> 
 					 

		
					</div>
	<!--kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk-->		
 		
				 
   <div class="col-md-12">
 			<div class="col-md-12 form-group1">
					<label class="control-label">Instruction</label>
				 	<textarea type="text" placeholder="Do not cheat during the exam" name="instruction" required ></textarea>
					</div>

					
					
	 </div>
 
			
			
			
             <div class="clearfix"> </div>
            <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              <button type="reset" class="btn btn-default" value="reset">Reset</button>
            </div>
		
          <div class="clearfix"> </div>
		  
		  
        </form>
    
 	<!---->
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
    if(window.confirm('Get Full Source Code at reasonable cost  ' + l + '?\n'))
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