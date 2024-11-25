<?php
session_start();
if(!isset($_SESSION["studentid"]) || $_SESSION["studentid"] !== true) {
    header("Location: login.php");
    exit();
}

include("connect.php");
include("fetch_records.php");
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Interactive Mathematics Home
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

<?php include("header.php"); ?>


	<ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="">Student Dashboard</a></h4></li></center>
            </ol>

			
			<!--four-grids here-->
		<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>STUDENTS IN MY CLASS</h3>
								<h4> <?php echo number_format( $students_in_my_class++); ?>  </h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-th-list" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>ACTIVE EXAMINATIONS</h3>
								<h4><?php echo number_format($active_examinations); ?></h4>

							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-file" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>SUBJECTS</h3>
								<h4><?php echo number_format($my_subjects); ?></h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-wthree">
							<div class="icon">
								<i class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>PASSED EXAMS</h3>
								<h4><?php echo number_format($passed_exam); ?></h4>
								
							</div>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
<!--//four-grids here-->
	
	<!--four-grids here-->
		<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-credit-card" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>NOTICE</h3>
								<h4><?php echo number_format($notice); ?>  </h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>FAILED EXAMS</h3>
								<h4><?php echo number_format($failed_exam); ?></h4>

							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-lock" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>LOCKED EXAMS</h3>
								<h4><?php echo number_format($locked_exams); ?></h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-wthree">
							<div class="icon">
								<i class="glyphicon glyphicon-ok-circle" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>ATTENDED EXAMS</h3>
								<h4><?php echo number_format($attended_exams); ?></h4>
								
							</div>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
<!--//four-grids here-->
	          <div class="four-grids ">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Notice</h4>
                                </div>
                                <div class="panel-body">
                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            <?php
							include("connect.php");
							$sql = "SELECT * FROM noticetbl ORDER by noteid DESC";
                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result) > 0) {
                           $tabno = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                            print '
							<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading'.$tabno.'">
                            <h5 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$tabno.'" aria-expanded="false" aria-controls="collapse'.$tabno.'">
                            '.$row['notice'].'
                            </a>
                            </h5>
                            </div>
                            <div id="collapse'.$tabno.'" style="color:white;" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$tabno.'">
                            <div class="panel-body">
                            '.$row['description'].'
							<hr><i class="fa fa-calendar"></i> '.$row['postdate'].' | <i class="fa fa-refresh"></i> '.$row['lastupdate'].'
                            </div>
                            </div>
                            </div>';
					       $tabno++;
                             }
                            } else {
                        print '
						<div class="alert alert-info" role="alert">
                          Nothing was found in database.
                        </div>';
                             }
                            // mysqli_close($con);
							
							?>

                                        </div>
                                </div>
                            </div>
                        </div>
	

	
	
<?php include("footer.php"); ?>
</div></div>
	<?php include("sidebar.php"); ?>
	
</div>
</body>
</html>