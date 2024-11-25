<?php
session_start();
include("student/connect.php");
//(0);
if (isset($_POST["login"])) {
    header("Location:student");
}

if (isset($_POST["admin"])) {
    header("Location:../admin");
}

if (isset($_POST["create"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $deptname = $_POST["deptname"];
    $class = $_POST["class"];
    $catname = "Grade one";
    $ppicture = $_FILES["picture"]["name"];
    $status = "1";
    $role = "student"; // Default role
    $today = date('Y/m/d');

    if ($dob <= '2020/01/01') {
        move_uploaded_file($_FILES["picture"]["tmp_name"], "student/uploaded/" . $_FILES["picture"]["name"]);
        
        // Adjust query to include the role
        $query = "INSERT INTO studenttbl (fname, lname, gender, email, phone, password, dob, address, deptname, catname, file,class, status, role)
                  VALUES ('$fname', '$lname', '$gender', '$email', '$phone', '$password','$dob', '$address', '$deptname', '$catname', '$ppicture', '$class', '$status', '$role')";

        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>alert('Details added successfully');
            window.location.href='student/login.php';</script>";
        } else {
            echo mysqli_error($con);
            mysqli_close($con);
        }
    } else {
        echo "<script>alert('Student must be older than 4 years');
        window.location.href='register.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Mathematics Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 500px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px 30px;
        }

        h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group span {
            display: block;
            font-size: 14px;
            color: #555555;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #6c63ff;
            box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
        }

        .error {
            color: red;
            font-size: 12px;
        }

        .password-requirements {
            font-size: 12px;
            color: #666666;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        button {
            background-color: #6c63ff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #554ce3;
        }

        button a {
            text-decoration: none;
            color: white;
        }

        button.indigo {
            background-color: #009688;
        }

        button.indigo:hover {
            background-color: #00796b;
        }

        button.indigo2 {
            background-color: #3f51b5;
        }

        button.indigo2:hover {
            background-color: #303f9f;
        }

        button.indigo3 {
            background-color: #e91e63;
        }

        button.indigo3:hover {
            background-color: #c2185b;
        }
    </style>
	<script>
        function validateForm() {
            // Email validation
            const email = document.getElementById('email').value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                document.getElementById('emailError').innerHTML = 'Please enter a valid email address';
                return false;
            }

            // Phone validation
            const phone = document.getElementById('phone').value;
            const phonePattern = /^(71|78|77)\d{7}$/;
            if (!phonePattern.test(phone)) {
                document.getElementById('phoneError').innerHTML = 'Phone number must start with 71, 78, or 77 and be 9 digits long';
                return false;
            }

            // DOB validation
            const dob = new Date(document.getElementById('dob').value);
            const today = new Date();
            if (dob >= today) {
                document.getElementById('dobError').innerHTML = 'Date of birth cannot be today or in the future';
                return false;
            }

            // Password validation
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password.length < 8) {
                document.getElementById('passwordError').innerHTML = 'Password must be at least 8 characters long';
                return false;
            }

            if (password !== confirmPassword) {
                document.getElementById('confirmPasswordError').innerHTML = 'Passwords do not match';
                return false;
            }

            return true;
        }
    </script>
</head> 
</head>
<body>
	
    <div class="container">
	<h2>Junior Interactive Mathematics For Murahwa Hill</h2>
	<h2>Students Create Account</h2>
        <form action="register.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="form-group">
                <span>First Names:</span>
                <input type="text" name="fname" required />
            </div>

            <div class="form-group">
                <span>Last Names:</span>
                <input type="text" name="lname" required />
            </div>

            <div class="form-group">
                <span>Gender:</span>
                <select name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <span>Email:</span>
                <input type="email" name="email" id="email" required />
                <span id="emailError" class="error"></span>
            </div>

            <div class="form-group">
                <span>Cell:</span>
                <input type="text" name="phone" id="phone" required placeholder="e.g. 771234567" />
                <span id="phoneError" class="error"></span>
            </div>

            <div class="form-group">
                <span>Date of Birth:</span>
                <input type="date" name="dob" id="dob" required />
                <span id="dobError" class="error"></span>
            </div>
			<div class="form-group">
				<span>Address:</span>
				<input type="text" name="address" class="name" required />
			</div>

			<div class="form-group">
                <span>Department:</span>
                <select name="deptname" required>
					<option value="Maths">Mathematics</option>
                </select>
            </div>

			<div class="form-group">
				<span>Student Level:</span>
             	<select name="catname" required>
                 <option value="Grade one" >Grade one</option>
            	</select>
			</div>

			<div class="form-group">
				<span>Class:</span>
             	<select name="class">
					<?php $get_assignments = mysqli_query($con, "select * from usertbl where role='Teacher'");
					while($row = mysqli_fetch_array($get_assignments)):;                               
							$class = $row['Class'];        
						?>
						<option value="<?php echo $class; ?>" ><?php echo $class; ?></option>
					<?php 
					endwhile;?>
            	</select>
			</div>
			<div class="form-group">
				<span>Image:</span>
				<input type="file" name="picture" value="" />
			</div>

            <div class="form-group">
                <span>Password:</span>
                <input type="password" name="password" id="password" required />
                <span id="passwordError" class="error"></span>
                <div class="password-requirements">
                    Password must be at least 8 characters long
                </div>
            </div>

            <div class="form-group">
                <span>Confirm Password:</span>
                <input type="password" id="confirmPassword" required />
                <span id="confirmPasswordError" class="error"></span>
            </div>

            <div class="row">
                <button type="button" class="indigo"><a href="student/">Student Login</a></button>
                <button type="button" class="indigo2"><a href="admin/">Admin Login</a></button>
                <button type="submit" class="indigo3" name="create">Create Account</button>
            </div>
        </form>
    </div>
</body>
</html>


