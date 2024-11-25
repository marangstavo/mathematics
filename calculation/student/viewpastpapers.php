<!DOCTYPE HTML>
<html>
<head>
<title>Interactive Mathematics Assesment</title><link rel="shortcut icon" href="../icon.png">
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
 
<!--grid
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	-->
  	    

<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
      <div class="grid_3 grid_5 ">
      <h4> Past Papers</h4>
	  
	  
                       
	  
	  
	  
				<div class="col-md-12 agileits-w3layouts">
					
					<table class="table table-bordered">
						<thead>
                             <h4> Examination Properties</h4>
						</thead>
						
                              <tbody>
							  <?php 
							   

									$level =  $_SESSION["level"];
									$record_found = 0;
									$sql = "SELECT * FROM pastpapers  WHERE Level = '$level'";
									$result = mysqli_query($con, $sql);


									if (mysqli_num_rows($result) > 0) {  $cnt=1;
										while($row =mysqli_fetch_assoc($result)) {
											
										$Examname = $row['Examname'];
										$Level = $row['Level'];
										$Department = $row['Department'];
										$Year = $row['Year'];
										$Files = $row['Files'];
									
								
									 
							  
							  ?>
                                               <tr>
                                                   <th scope="row"><?php echo $cnt ?></th>
                                                   <td>Exam Name <?php echo $Examname;?></td>
                                                   <td>This Exam is for  <?php echo $Level;?>'s doing Maths <br></br> in the Maths <?php echo $Department;?> </td>
												    <td>Exam Was written in <?php echo $Year;?></td>
                                             
                                                   <td><a   class="btn btn-success" href="uploaded/<?php echo $Files; ?>">Download Paper</a></td>
                                               </tr>
										 <br>
										 
										 <?php  	$cnt++;	}}else{ ?>
                                                 <tr>
                                                   <th scope="row">1</th>
                                                   <td>No data at the moment</td>
                                                   
                                               </tr>



										 <?php } ?>
                                           </tbody>
                                        </table>                   
				</div>
				<br><br><br>
				<!--div class="col-md-6 agileits-w3layouts">
				<div class="col-md-12">
                            <div class="">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Terms and conditions</h4>
                                </div>
                                <div class="panel-body ">

                                    
								
                                     <?php echo '<div class="alert alert-danger" role="alert">'  .$terms.
                                    '</div>';?>
                                </div>
                            </div>
                        </div>
						
						<div class="col-md-12">
                            <div class="">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Take Assessment</h4>
                                </div>
                                <div class="panel-body">
								<?php
								if ($record_found == 1) {
 
									
								 
								$_SESSION['current_examid'] = $exam_id;
								$_SESSION['student_retake'] = 1;
								print '
                                 <div class="alert alert-success" role="alert">
                                  You are good to go.
                                    </div>

									'; ?>
									<a onclick="return confirm('Are you sure you want to begin ?')" class="btn btn-success" href="assessment.php">Retake Assessment</a>
									
									<?php	
								 								
									
								}else{
								$_SESSION['current_examid'] = $exam_id;
								
								$_SESSION['student_retake'] = 0;
								print '
                                 <div class="alert alert-success" role="alert">
                                  You are good to go.
                                    </div>

									'; ?>
									<a onclick="return confirm('Are you sure you want to begin ?')" class="btn btn-success" href="assessment.php">Begin Assessment</a>
									
									<?php
                  									
									
								}
								
								?>

									
                                </div>
                            </div>
                        </div>
						
						<div class="col-md-12">
                            <div class="">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Assessment History</h4>
                                </div>
                                <div class="panel-body">
                                <?php
								if ($record_found == "1") {
								print '
                                 <div class="alert alert-info" role="alert">
                                  You attend this exam on <strong>'.$take_date.'</strong> , your score was <strong>'.$score.'%</strong>
                                    </div>';		
								
								}else{
								print '
                                 <div class="alert alert-info" role="alert">
                                  No records found.
                                    </div>';								
									
								}
								
								?>

                                </div>
                            </div>
                        </div>
			
			</div-->
				
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