<html>
<head>
<title>Interactive Mathematics Equations</title><link rel="shortcut icon" href="../icon.png">
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
                <center><li class="breadcrumb-item"><h4><a href="">Number Checker</a></h4></li></center>
            </ol>
<!--grid-->
 	<div class="validation-system">
 		 
<form style = "margin-left: 0.2%; text-align: center" action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
	<p style = "font-size: 1.5em"></p><br/>
	<input id = "equa" type = "text" style = "width: 100%; height: 40px; text-align: center;" name = "equation" placeholder = "Enter a number of your choice"/>
	<br><br><input class="btn btn-success" type = "Submit" name="Submit" style = "width: 50%; height: 50px" required>
</form>
<?php
 function primeCheck($number){
    if ($number == 1)
    return 0;
    for ($i = 2; $i <= $number/2; $i++){
        if ($number % $i == 0)
            return 0;
    }
    return 1;
}
function isComposite($n) 
{ 
      
    // Corner cases 
    if ($n <= 1)  
        return false; 
    if ($n <= 3)  
        return false; 
  
    // This is checked so  
    // that we can skip  
    // middle five numbers  
    // in below loop 
    if ($n%2 == 0 || $n % 3 == 0) 
        return true; 
  
    for ($i = 5; $i * $i <= $n; 
                   $i = $i + 6) 
        if ($n % $i == 0 || $n % ($i + 2) == 0) 
        return true; 
  
    return false; 
} 
	if (isset($_POST["Submit"]))
	{
		$equation = $_POST["equation"];
		$result= "";
	    if($equation % 2 == 0){  $result=" Is an even number because it is divisible by 2<br>";   } 
        else{ $result=" Is an odd number because it  is not divisible by 2<br>";   } 
	 
 
$flag = primeCheck($equation);
if ($flag == 1){
$result= $result ." Is a prime number because it has only one and itself as factors<br>";
} else {
     $result= $result ." Is not a prime number because it has other factors<br>";
}

 if($equation >= 1 and (ctype_digit(strval($equation)) )){    $result= $result ." It is a natural number because it is greater than 0 and it is a whole number <br>";   } 
 else{ $result= $result ." It is a not a natural number number because it is less than 0 or it is not a whole number <br>";   } 
	 
 if(isComposite($equation)){
	   $result= $result ." It is a composite number, it has a positive divisor other than one or itself"; } 
        
        else{$result= $result ." It is a not a composite number,  it doesnt have a positive divisor other than one or itself <br>";}
   
 
	echo <<<_END
<div id = "down">
	<p style = "font-size: 1.5em; text-align: center"> $equation</p>
	<p style = "font-size: 1.5em; text-align: center"> $result</p>
 
</div>
_END;


	}
	else
	{
echo <<<_END
<div id = "down">
	<p style = "font-size: 1.5em; text-align: center">
	Check if a number is prime, Odd, Even, Positive, Negative</p>
 
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