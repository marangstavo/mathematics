<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Interactive Mathematics Student Profile
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


if($_SESSION["studentid"]==true)
{

include("header.php");

include("checkstud.php");
include("connect.php");
 

?>

	<ol class="breadcrumb">
	            
                <center><li class="breadcrumb-item"><h4><a href="">Student Profile</a></h4></li></center>
            </ol>
<!--grid
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	-->
  	    

<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
      <div class="grid_3 grid_5 ">
      <h3> Student Profile</h3>
				<div class="col-md-6 agileits-w3layouts">
					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Title</th>
								<th>Information</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Photo</td>
								<td><span class=" "><?php echo($my_file!=NULL)?'<img src="uploaded/'.$my_file.'" width="50" height="50">' :'' ;?></span></td>
							</tr>
							<tr>
								<td>First Name</td>
								<td><span class=""><?php echo $my_fname ?> </span></td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td><span class=""><?php echo $my_lname ?></span></td>
							</tr>
							<tr>
								<td>Date of birth</td>
								<td><span class=""><?php echo $my_birthdate ?></span></td>
							</tr>
							<tr>
								<td>Gender</td>
								<td><span><?php echo $my_gender ?></span></td>
							</tr>
	 
							<tr>
								<td>Mobile</td>
								<td><span class=""><?php echo $phone ?></span></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><span class=""><?php echo $my_email ?></span></td>
							</tr>
							<tr>
								<td>Address</td>
								<td><span class=""><?php echo $my_address ?></span></td>
							</tr>
							<tr>
								<td>Department</td>
								<td><span class=""><?php echo $my_department ?></span></td>
							</tr>
							<tr>
								<td>Grade</td>
								<td><span class=""><?php echo $my_category ?></span></td>
							</tr>
						</tbody>
					</table>                    
				</div>
				<div class="col-md-6 agileits-w3layouts">
					<br>
					<p><b> <h4>Change Password </h4></b></p>
					<div class="list-group list-group-alternate"> 
		    <form method="post" action="new_pwd.php" enctype="multipart/form-data">
         	<div class="vali-form vali-form1">
            <div class="col-md-6 form-group1">
              <label class="control-label">Enter Password</label>
              <input type="password" placeholder="password" name="pass" required="">
            </div>
			<div class="col-md-6 form-group1 form-last">
              <label class="control-label">Repeated password</label>
              <input type="password" placeholder="Repeated password" name="cpass" required="">
            </div>
			<div class="clearfix"> </div>
            </div>
            <div class="col-md-6 form-group">
              <button type="submit" class="btn btn-primary" name="save">Update</button>
              <button type="reset" class="btn btn-default"  name="reset">Reset</button>
            </div>
			
            
			</form>
            </div>
			
			 <div class="clearfix"> </div>
			<p><b> <h4>Change Profile Picture </h4></b></p>
			<div class="list-group list-group-alternate"> 
		    <form method="post" action="new_dp.php" enctype="multipart/form-data">
         	 <div class="col-md-12 form-group1 group-mail">
              <label class="control-label ">File</label>
              <input type="file"  name="ufile" required="">
            </div>
			
            <div class="col-md-6 form-group">
              <button type="submit" class="btn btn-primary" name="save">Update</button>
              <button type="reset" class="btn btn-default"  name="reset">Reset</button>
            </div>
			</form>
            
            
			</form>
            </div>
			
			</div>
				
            <div class="clearfix"> </div>
			
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
</html>