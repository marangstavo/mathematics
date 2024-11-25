<?php include("connect.php"); ?>
<?php


	   if(isset($_POST['submit']))
       {	
 
           $fnames=$_POST['fnames'];
           $surname=$_POST['surname'];
           $pnumber=$_POST['pnumber'];
           $email=$_POST['email'];
           $gender=$_POST['gender'];
           $paddress=$_POST['paddress'];
           $deptnm=$_POST['deptnm'];
           $dob=$_POST['dob'];
           $level=$_POST['level'];
           $class=$_POST['class'];
           $password=$_POST['password'];
		   $status ='1';
          $ppicture=$_FILES["picture"]["name"];
		  
		  
		  move_uploaded_file($_FILES["picture"]["tmp_name"],"../student/uploaded/".$_FILES["picture"]["name"]); 

// Prepare the SQL query
$query = "INSERT INTO studenttbl (studid, fname, lname, gender, email, phone, password, dob, address, deptname, catname,class, file, status)
          VALUES ('', '$fnames', '$surname', '$gender', '$email', '$pnumber', '$shortenedHash','$dob', '$paddress', '$deptnm', '$level', '$class','$ppicture', '$status')";
	 
           $result= mysqli_query($con, $query);
	 
	       if($result)
 
		 	echo "<script>alert('Student added successfully');
      	window.location.href='addstudent.php';</script>";
	       else
		  echo mysqli_error($con);
	       mysqli_close($con);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Interactive Mathematics Add Student
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
 
  	    
        <form action="addstudent.php" method="post"  enctype="multipart/form-data">
				 <div class="col-md-12">
					<div class="col-md-4 form-group1">
					<label class="control-label">First Names</label>
					<input type="text" placeholder="Names" name="fnames" required="">
					</div>  

					<div class="col-md-4 form-group1">		
					<label class="control-label">Last Names</label>
					<input type="text" placeholder="Surname" name="surname" required="">	
					</div>

					<div class="col-md-4 form-group1">
					<label class="control-label">Phone Number</label>
					<input type="text" placeholder="0777 913 999" name="pnumber" required="" type="number">
					</div>
					</div>
<!--kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk-->
   <div class="col-md-12">
					<div class="col-md-4 form-group1">
					<label class="control-label">Email Address</label>
					<input type="text" placeholder="email@gmail.com" name="email" required="" type="email">
					</div>
					
					   <div class="col-md-4 form-group2 group-mail">
                               <label class="control-label">Class</label>
                               <select name="class">
                                   <option value="Grade 1A">Grade 1A</option>
                                   <option value="Grade 1B">Grade 1B</option>
                                   <option value="Grade 1C">Grade 1C</option>
                                   <option value="Grade 1D">Grade 1D</option>
                               </select>
                           </div>


					<div class="col-md-4 form-group2 group-mail">
					<label class="control-label">Gender</label>
					<select name="gender" id="m">
					<option value="Male" >Male</option>
					<option value="Female" >Female</option>
					</select>
					</div>				 

					<div class="col-md-4 form-group1">
					<label class="control-label">Physical Address</label>
				 	<input type="text" placeholder="123 Chikanga 3 Mutare" name="paddress" required >
					</div>
					</div>
	<!--kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk-->		
 		
				 
   <div class="col-md-12">
 				<div class="col-md-4 form-group1 group-mail">
					<label class="control-label">DOB</label>
						<input type="date" placeholder="dod" name="dob" required="" type="date">
					</div>				 
 
 
					
				 <div class="col-md-4 form-group2 group-mail">
					<label class="control-label">Level of Student </label>

					<select name="level" id="n">
					<option value="Grade one" >Grade one</option>
					</select>
				 </div>		
				 
				 <div class="col-md-4 form-group2 group-mail">
					<?php $sql = "SELECT deptname FROM departmenttbl where status='1'";
					$result = mysqli_query($con, $sql); ?>
					<label class="control-label">Select Department </label>
					<select name="deptnm" id="">
		 
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
			




					<div class="col-md-4 form-group2 group-mail">
					<label class="control-label">Profile Picture </label>
					<input type="file" placeholder="Attach image" name="picture" required>
					</div>
			
			
					<div class="col-md-4 form-group1 group-mail">
					<label class="control-label">Login Password</label>
					<input type="text" placeholder="password" value="password" name="password" required readonly>
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