<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Intereactive Mathematics Edit Questions
</title> <link rel="shortcut icon" href="../icon.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Upturn Smart Online Exam System" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
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
       ob_start();
       include("connect.php");
	   if(isset($_GET['id']))
       {
         $qid=$_GET['id'];
		
	     if(isset($_POST['update']))
         {
		   $question=$_POST['q_name'];
		   $op1=$_POST['opt_1'];
		   $op2=$_POST['opt_2'];
		   $op3=$_POST['opt_3'];
		   $op4=$_POST['opt_4'];
		   $correct_op =$_POST['correct_op'];
		   $updated=mysqli_query($con, "UPDATE questiontbl SET questionname='$question',op1='$op1',op2='$op2',op3='$op3',op4='$op4',correctop='$correct_op' WHERE qid='$qid'") or die();
       if($updated)
      {
         header("Location:examlist.php");
      }
	       
      }
	   }
	   ob_end_flush();
?>
<?php 
  

  if(isset($_GET['id']))
  {
  $id=$_GET['id'];
 
  $getselect=mysqli_query($con, "SELECT * from questiontbl  WHERE qid='$id'");
 
  while($q = mysqli_fetch_array($getselect))
  {  
     $question1=$q['questionname'];
     $opt1=$q['op1'];
	 $opt2=$q['op2'];
	 $opt3=$q['op3'];
	 $opt4=$q['op4'];
	 $copt=$q['correctop'];
?>
   <?php include("header.php");?>
	<ol class="breadcrumb">
	            
                <center><li class="breadcrumb-item"><h4><a href="">Edit Question</a></h4></li></center>
            </ol>
<!--grid-->
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  	   
        <form action="" method="post">
		    <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Question ?</label>
              <textarea class="form-control" rows="3"  name="q_name" ><?php echo $question1; ?></textarea>
          </div>
		  <div class="clearfix"> </div>
            
          <div class="col-md-12 form-group2 group-mail">
              <label class="control-label">Option 1</label>
              <textarea class="form-control" rows="3" name="opt_1"><?php echo $opt1; ?></textarea>
          </div>
		  <div class="clearfix"> </div>
            
          <div class="col-md-12 form-group2 group-mail">
               <label class="control-label">Option 2</label>
               <textarea class="form-control" rows="3" name="opt_2" ><?php echo $opt2; ?></textarea>
          </div>
		  <div class="clearfix"> </div>
          <div class="col-md-12 form-group2 group-mail">
               <label class="control-label">Option 3</label>
               <textarea class="form-control" rows="3"  name="opt_3" ><?php echo $opt3; ?></textarea>
          </div>
		  <div class="clearfix"> </div>
          <div class="col-md-12 form-group2 group-mail">
               <label class="control-label">Option 4</label>
               <textarea class="form-control" rows="3" name="opt_4" ><?php echo $opt4; ?></textarea>
          </div> 
          <div class="clearfix"> </div>		  
          <div class="col-md-12 form-group2 group-mail">
               <label class="control-label">Correct Option No [ Like 1,2,3,4 ]</label>
               <input type="text" class="form-control"  name="correct_op" value="<?php echo $copt; ?>" "required">
          </div>
		  <div class="clearfix"> </div>
          </div> 
			 
		  
            <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary" name="update">Submit</button>
              <button type="reset" class="btn btn-default" value="reset">Reset</button>
            </div>
		
          <div class="clearfix"> </div>
		</form>
  <?php }} 
   // mysqli_close($con);
	?>
 	<!---->
 </div>

</div>
 	<!--//grid-->
	
   
<?php include("footer.php"); ?>
</div></div></div>
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
		<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
	<?php include("sidebar.php"); ?>
	<?php }
else
	header('location:login.php');
?>
</body>
</html>