<?php include("connect.php"); ?>
<?php


	   if(isset($_POST['submit']))
       {	
 
           $level=$_POST['level'];
           $deptnm=$_POST['deptnm'];
	        $status ='1';
		
	       $query="insert into categorytbl(cid, catname,deptname,cstatus)values('', '$level','$deptnm','$status')";
	 
           $result= mysqli_query($con, $query);
	 
	       if($result)
 
		 	echo "<script>alert('Information added successfully');
      	window.location.href='addcategory.php';</script>";
	       else
		  echo mysqli_error($con);
	       mysqli_close($con);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Intereactive Mathematics Add Category
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
if($_SESSION["studentid"]==true)
{
?>
<?php include("header.php"); ?>


	<ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href = "#none">a² +  b² = c² </a></h4></li></center>
            </ol>
<!--grid-->



 	<div class="validation-system">
 	 <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
 
      button {
        width: 30px;
        height: 35px;
        cursor: pointer;
      }
      .a-btn {
        position: absolute;
        margin-left: -2.5rem;
      }
      .b-btn {
        position: absolute;
        margin-top: 14.5rem;
        margin-left: 5rem;
      }
      .hide {
        display: none;
      }
      .input {
        width: 30px;
        height: 35px;
        outline: none;
      }
      .calculate-btn {
        position: absolute;
        margin-top: 25rem;
        width: 208px;
        cursor: pointer;
		background-color:#5cb85c;
		color:white;
      }
      #answer\:a {
        margin-top: -3.2rem !important;
        margin-left: -1.6rem;
      }
      #answer\:b {
        margin-bottom: 3.2rem;
        margin-left: 5.8rem;
      }
      .c2 {
        position: absolute;
        margin-top: 33rem;
      }
      .c {
        position: absolute;
        margin-top: 39rem;
      }
    </style>
 <div style=" display: flex;
        align-items: center;
        position: relative;
        margin-left: 17rem;
        height: 40vh;
		margin-bottom:120px;">
      <img
        src="../admin/uploaded/triangle.png"
        alt=""
        style="height: 200px; max-width: 100%; padding-bottom:20px"
      />
      <button class="a-btn" id="a:button">A</button>
      <span class="a-btn" id="answer:a"></span>
      <input type="text" id="a:input" class="hide a-btn input" />
      <button class="b-btn" id="b:button">B</button>
      <span class="b-btn" id="answer:b"></span>
      <input type="text" id="b:input" class="hide b-btn input" />
      <button class="calculate-btn" id="calculate:button">Calculate</button>

      <span class="c2" id="c2"></span>
      <span class="c" id="c"></span>
    </div>
 <script>
  const aButton = document.getElementById("a:button");
const bButton = document.getElementById("b:button");
const aInput = document.getElementById("a:input");
const bInput = document.getElementById("b:input");
const answerA = document.getElementById("answer:a");
const answerB = document.getElementById("answer:b");
const c2 = document.getElementById("c2");
const c = document.getElementById("c");
const calculate = document.getElementById("calculate:button");
const Buttons = [aButton, bButton, calculate];
const Inputs = [aInput.value, bInput.value];
const message = ["Please enter a inputs", "this is dummie number"];
const __i = 0;
const __f = 1;
const __s = 2;

function stringToNumber(input, arg) {
  return +input[arg];
}

Buttons[__i].addEventListener("click", () => {
  if (typeof Buttons[__i] == "object" && typeof Buttons[__i] != "undefined") {
    if (typeof Inputs[__i] != "undefined" && typeof Inputs[__i] == "string") {
      if (aInput.classList == "hide") {
        Buttons[__i].classList.add("hide");
      }

      if (Buttons[__i].classList != "hide") {
        bInput.classList.add("hide");
        Buttons[__f].classList.remove("hide");
        aInput.classList.remove("hide");
        answerB.innerHTML = bInput.value;
      }
    }
  }
});

Buttons[__f].addEventListener("click", () => {
  if (typeof Buttons[__f] == "object" && typeof Buttons[__f] != "undefined") {
    if (typeof Inputs[__f] != "undefined" && typeof Inputs[__f] == "string") {
      aInput.classList.add("hide");
      Buttons[__f].classList.add("hide");
      bInput.classList.remove("hide");
      answerA.innerHTML = aInput.value;
    }
  }
});

Buttons[__s].addEventListener("click", () => {
  let Inputs = [aInput.value, bInput.value];
  let message = ["Please enter a inputs", "this is dummie number"];
  let __pyt = [];
  if (!Inputs[__i] || !Inputs[__f]) {
    if (
      typeof Inputs[__i] != "undefined" &&
      typeof Inputs[__f] != "undefined"
    ) {
      alert(message[__i]);
    }
  } else {
    if (Inputs[__i] < __i || Inputs[__f] < __i) {
      if (typeof message[__f] != "string" || message[__i] != "string") {
        while (__i < __f) {
          for (let __k = __i; __k <= __f; __k++) {
            if ((__k == __f % __s) == __i) {
              alert(message[__f]);
            }
          }
          __i++;
        }
      }
    } else {
		
	 
      __pyt.push(stringToNumber(Inputs, __i), stringToNumber(Inputs, __f));

      let __res = Math.pow(__pyt[__i], __s);
      let __secRes = Math.pow(__pyt[__f], __s);

      answerA.innerHTML = Inputs[__i];
      answerB.innerHTML = Inputs[__f];

      c2.innerHTML = `c<sup>${__s}</sup>
	  = ${ __pyt[__i]}
	  <sup>${__s}</sup> + ${ __pyt[__f] } <sup>${__s}</sup>  
	   <br>=(${__res}) + (${__secRes}) 
	  
	  <br> c = √${__res + __secRes}</br>`;

      c.innerHTML = `c = ${Math.sqrt(__res + __secRes)}`;
    }
  }
});

  
  </script>	

</div>
 	<!--// c4.innerHTML = `a² +  b² = c²`;-->
	
	
	
	<div class="row">  <br>
	  <br>
	  <br>
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
 
</html>