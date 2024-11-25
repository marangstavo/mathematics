<html>
<head>
<title>Interactive Mathematics</title> <link rel="shortcut icon" href="../icon.png">
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

<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="index.php" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="index.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
										
											<?php 
											$role= $_SESSION["role"];
											if($role=="Admin"){
											?>
										 <li id="menu-academico" ><a href="userlist.php"><i class="fa fa-user"></i><span>Admins</span><div class="clearfix"></div></a></li>
											<?php   }   ?>
									 <li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Department</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   
											<li id="menu-academico-avaliacoes" ><a href="adddepartment.php">Add Department</a></li>
											<li id="menu-academico-avaliacoes" ><a href="departmentlist.php">Department List</a></li>

										  </ul>
										</li>
									 
									  <li id="menu-academico" ><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i><span> Student Level</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   	<li id="menu-academico-avaliacoes" ><a href="addcategory.php">Add Level </a></li>
										   <li id="menu-academico-avaliacoes" ><a href="categorylist.php">Level of Students</a></li>
										
										  </ul>
										</li>
										<!--li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i><span> Topics</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="numbercheck.php">Number Check</a></li>
										   <li id="menu-academico-avaliacoes" ><a href="addsubtract.php">Addition and Subtract</a></li>
										   <li id="menu-academico-avaliacoes" ><a href="pythagorean.php">Pythagorean theorem</a></li>
											<li id="menu-academico-avaliacoes" ><a href="equations.php">Linear & Quadratic equations</a></li>
						 
										  </ul>
										</li-->
										<li id="menu-academico" ><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span> Students</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   
											<li id="menu-academico-avaliacoes" ><a href="addstudent.php">Add Student</a></li>
											<li id="menu-academico-avaliacoes" ><a href="studentlist.php"> List Of Students</a></li>

										  </ul>
										</li>
										 
										 <li id="menu-academico" ><a href="#"><i class="fa fa-th-list" aria-hidden="true"></i><span> Examination</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   
										    <li id="menu-academico-avaliacoes" ><a href = "addexam.php" > Add Exam</a></li>
											<li id="menu-academico-avaliacoes" ><a href = "viewexam.php" > List Of Examinations</a></li>
											<li id="menu-academico-avaliacoes" ><a href = "addexampapers.php" > Add Past Exam Papers</a></li>
											<li id="menu-academico-avaliacoes" ><a href = "viewexampapers.php" >Manage Past Exam Papers</a></li>

										  </ul>
										</li>
										
										 <li id="menu-academico" ><a href="#"><i class="fa fa-question" aria-hidden="true"></i><span>Exam Question</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   
										    <li id="menu-academico-avaliacoes" ><a href = "addquestion.php" > Add Questions</a></li>
											<li id="menu-academico-avaliacoes" ><a href = "viewquestions.php" > View Questions</a></li>

										  </ul>
										</li>
								 
									
							         <li id="menu-academico" ><a href="#"><i class="fa fa-columns" aria-hidden="true"></i><span> Notice</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   
										    <li id="menu-academico-avaliacoes" ><a href="addnotice.php"> Add Notice</a></li>
											<li id="menu-academico-avaliacoes" ><a href="noticelist.php"> List Of Notice</a></li>

										  </ul>
									</li>
							         <li><a href="results.php"><i class="fa fa-asterisk"></i>  <span>Exam Results</span><div class="clearfix"></div></a></li>
							         <li><a href="admin_report.php"><i class="fa fa-asterisk"></i>  <span>Exercises Report</span><div class="clearfix"></div></a></li>
									 <!--li><a onclick="document.getElementById('id01').style.display='block'" class="clearfix"><i class="fa fa-calculator"></i>  <span>Calculator</span><div class="clearfix"></div></a></li-->
									<calculator >
<div class="w3-container">
     <link rel="stylesheet" href="js/calculator.css">
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" 
		class="w3-button w3-display-topright">&times;</span>
    <main>
	<h2 style="text-align:center;"><em>Interactive Mathematics</em><h2>
  <div id="container">
    <div class="calculator">
      <div class="display">
        <input id="output" type="text" name="" disabled/>
      </div>
      <div id="buttons">
        
        <div class="row">
          <div class="button" id="clear">C</div>
          <div class="button">π</div>
          <div class="button">sqrt</div>
          <div class="button">sq</div>
          <div class="button">%</div>
          <div class="button" id="backspace">&lt;=</div>
        </div>
        <div class="row">
          <div class="button">log</div>
          <div class="button">sin</div>
          <div class="button">exp</div>
          <div class="button">^</div>
          <div class="button">+/-</div>
          <div class="button">÷</div>
        </div>
        <div class="row">
          <div class="button">ln</div>
          <div class="button">cos</div>
          <div class="button number">7</div>
          <div class="button number">8</div>
          <div class="button number">9</div>
          <div class="button">x</div>
        </div>
        <div class="row">
          <div class="button">n!</div>
          <div class="button">tan</div>
          <div class="button number">4</div>
          <div class="button number">5</div>
          <div class="button number">6</div>
          <div class="button">-</div>
        </div>
        <div class="row">
          <div class="button" id="radians">radians</div>
          <div class="button number">1</div>
          <div class="button number">2</div>
          <div class="button number">3</div>
          <div class="button">+</div>
        </div>
        <div class="row">
          <div class="button" id="degrees">degrees</div>
          <div class="button number" id="zero">0</div>
          <div class="button" id>.</div>
          <div class="button" id="equals">=</div>
        </div>
        
      </div>

    </div>
  </div>
      </main>
      </div>
    </div>
  </div>
 </div>
<script  src="js/calculator.js"></script>
									<!--calculator -->
									 
									 
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
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
							<!-- script-for sticky-nav -->
		
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
</body>
</html>