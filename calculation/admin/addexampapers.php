<?php include("connect.php");  

	   if(isset($_POST['submit']))
       {	
 
           $examname=$_POST['examname'];
           $catname=$_POST['catname'];
           $deptname=$_POST['deptname'];
           $examyear=$_POST['examyear'];
           $ppicture=$_FILES["pastpaper"]["name"];
		    move_uploaded_file($_FILES["pastpaper"]["tmp_name"],"../student/uploaded/".$_FILES["pastpaper"]["name"]); 
		  
 					
	       $query="insert into pastpapers(ID, Examname, Level, Department , Year, Files)
		   values('', '$examname','$catname', '$deptname','$examyear','$ppicture')";
	 
           $result= mysqli_query($con, $query);
	 
	       if($result)
 
		 	echo "<script>alert('Past Paper added successfully');
      	window.location.href='addexampapers.php';</script>";
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
 

  	    
        <form action="addexampapers.php" method="post"  enctype="multipart/form-data">
				 <div class="col-md-12">
					<div class="col-md-4 form-group1">
					<label class="control-label">Exam name</label>
					<input type="text" placeholder="e.g Economics paper 1" name="examname" required="">
					</div>  
  		
				 <div class="col-md-4 form-group2 group-mail">
					<label class="control-label">Level of Student </label>

					<select name="catname" >
					<option value="Grade one" >Grade one</option>
					<option value="Grade two" >Grade two</option>
					<option value="Grade three" >Grade three</option>
					<option value="	Grade four" >Grade four</option>
					<option value="Grade five" >Grade five</option>
					<option value="Grade six" >Grade six</option>
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
					<div class="col-md-4 form-group1">
					<label class="control-label">Exam Year</label>
					<input type="text" placeholder="2020" name="examyear" required="">
					</div>  
					
					
 					<div class="col-md-4 form-group1">
					<label class="control-label">Attach past paper (pdf or doc or img)</label>
					<input type="file" placeholder="Attach item" name="pastpaper" required="">
					</div>  					 
				
 
		
					</div>
	<!--kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk-->		
 
             <div class="clearfix"> </div>
            <div class="col-md-12 form-group">	<br>
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