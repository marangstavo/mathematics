<html>
<head>
<title>Interactive Mathematics Equations</title> <link rel="shortcut icon" href="../icon.png">
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
include("connect.php");
include("header.php"); ?>

	<ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="">Basic Maths Operations</a></h4></li></center>
            </ol>
<!--grid-->
 	<div class="validation-system">
 		 
<form style = "margin-left: 0.2%; text-align: center" action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
			    <div class="row">
			    <div class="col-md-3 form-group1">
              <label class="control-label">First Number</label>
              <input type="Number" min="0" name="firstnumber" required="">
            </div>
              <div class="col-md-3 form-group2 group-mail">
              <label class="control-label"> Operater </label>
            <select name="Operater">
            	<option value="+">Addition</option>
            	<option value="-">Subtraction</option>
            </select>
            </div>
			 <div class="col-md-3 form-group1">
              <label class="control-label">Second Number</label>
              <input type="Number" min="0" name="secondnumber" required="">
            </div>
            </div>
	<br><br><input class="btn btn-success" type = "Submit" name="Submit" style = "width: 50%; height: 50px" required>
</form>
<?php
 
	if (isset($_POST["Submit"]))
	{
		$firstnumber = $_POST["firstnumber"];
		$Operater = $_POST["Operater"];
		$secondnumber = $_POST["secondnumber"];
		$result= "";
	 if($Operater == "+"){  $result= $firstnumber+$secondnumber;} 
	   else if($Operater == "-"){  $result= $firstnumber-$secondnumber;} 
       
 

 
 
	echo <<<_END
<div id = "down">
	<p style = "font-size: 1.5em; text-align: center"> $firstnumber $Operater $secondnumber = $result</p>
 
</div>
_END; ?>
 
 <!--iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii--> 
 			    <div class="row">
			    <div class="col-md-3 form-group1">
			<?php 
			$i=0;
			for($i=0; $i< $firstnumber; $i++){
			?>	
            <i style="font-size:20px;" class="fa fa-apple" ></i>
			<?php } ?>
            </div>
 		    <div class="col-md-1 form-group1">
				
            <i style="font-size:20px;" class=" " ><?php echo $Operater; ?></i>
			
            </div>
		    <div class="col-md-3 form-group1">
			<?php 
			$i=0;
			for($i=0; $i< $secondnumber; $i++){
			?>	
           <i style="font-size:20px;" class="fa fa-apple" ></i> 
			<?php } ?>
            </div>
			
			    <div class="col-md-1 form-group1">
				
            <i style="font-size:20px;" class=" " ><?php echo "="; ?></i>
			
            </div>
					    <div class="col-md-4 form-group1">
			<?php 
			$i=0;
			for($i=0; $i< $result; $i++){
			?>	
            <i style="font-size:20px;" class="fa fa-apple" ></i>
			<?php } ?>
            </div>
            </div>
 
 <!--iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii--> 

<?php	}
	else
	{
echo <<<_END
<div id = "down">
	<p style = "font-size: 1.5em; text-align: center">
	Do your mathematical operations here </p>
 
</div>
_END;
	}
	?>

</div>
  
	
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