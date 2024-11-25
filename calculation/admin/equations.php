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
if($_SESSION["userid"]==true)
{
include("connect.php");
include("header.php"); ?>

	<ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="">Solve Your Linear and Quadratic Equations (remember 6B² must be written as 6Be2)</a></h4></li></center>
            </ol>
<!--grid-->
 	<div class="validation-system">
 		 
<form style = "margin-left: 0.2%; text-align: center" action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
	<p style = "font-size: 1.5em"></p><br/>
	<input id = "equa" type = "text" style = "width: 100%; height: 40px; text-align: center;" name = "equation" placeholder = "Enter an equation using any variable of choice except e and E"/><br/>
	<br/>Show error messages: <input type = "radio" name = "error" value = "true">true</input>&nbsp;&nbsp;<input type = "radio" name = "error" value = "false">false</input>
	<br/><br/><input class="btn btn-success" type = "Submit" style = "width: 50%; height: 50px">
</form>
<?php
require_once("EquationSolver.php");
	if (!isset($_POST["error"]))
	{
		$_POST["error"] = "true";
	}
	if (isset($_POST["equation"]))
	{
		$equation = $_POST["equation"];
		$errors = $_POST["error"];
		$equation = new Solve($equation, $errors);
		$var = $equation->solution()[0];
		$solutions = $equation->solution()[1];
		echo "<div id = \"down\"><br/>";
		echo "<center>The equation <i>\"$equation->equation\"</i> which you asked me to solve is a <i>\"$equation->equationType Equation\"</i><br/>The Solution(s) is/are: <br/>";
		foreach ($solutions as $solution)
		{
			if (is_nan($solution))
			{
				$solution = $solution . "&nbsp;&nbsp;(Solution results in Complex Numbers)";
			}
			if ($solution == $solutions[0])
			{
				echo "<br/><b>$var = $solution</b><br/>";
			}
			else
			{
				echo "or<br/><b>$var = $solution</b><br/>";
			}
		}
		echo "</center><br/></div>";
	}
	else
	{
echo <<<_END
<div id = "down">
	<p style = "font-size: 1.5em; text-align: center">Examples of equations you can try out (Just copy and paste them into the text box)</p>
	<ol style = "font-size: 1.5em">
		<li> -1019b + 14b - 81b - 2000 + 48b = 800b - 8080 + 41b</li>
		<li> 8x + 4x - 3x - 100 = -99x + 11 </li>
		<li> xE2 + 5x - 20 = 8x + 20 </li>
		<li> Ae2 - 1A + 1 = 0 </li>
	</ol>
</div>
_END;
	}
?>
  
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