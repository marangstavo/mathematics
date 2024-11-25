<?php
session_start();
include("connect.php");

if (!isset($_SESSION["userid"])) {
    header('location:login.php');
    exit();
}

if (isset($_POST['submit'])) {
    // Retrieve form values
    $fnames = $_POST['fnames'];
    $surname = $_POST['surname'];
    $pnumber = $_POST['pnumber'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $paddress = $_POST['paddress'];
    $dob = $_POST['dob'];
    $class = $_POST['class'];
    $role = "Teacher";
    $password = $_POST['password'];
    $status = '1';
    $ppicture = $_FILES["picture"]["name"];
    
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validate password match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match'); window.location.href='addadmin.php';</script>";
        exit();
    }
    // Move uploaded file to specified directory
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], "uploaded/" . $ppicture)) {
        // Construct query
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Reduce the hashed password to 10 characters (not secure)
$shortenedHash = substr($hashedPassword, 0, 10);

// Prepare the SQL query
$query = "INSERT INTO usertbl (uid, fname, lname, gender, email, phone, password, cpassword, dob, address, deptname, catname, file, role, class, status)
          VALUES ('', '$fnames', '$surname', '$gender', '$email', '$pnumber', '$shortenedHash', '$shortenedHash', '$dob', '$paddress', '', '', '$ppicture', '$role', '$class', '$status')";


        $result = mysqli_query($con, $query);
        
        // Check if query was successful
        if($result) {
            echo "<script>alert('Admin added successfully'); window.location.href='addadmin.php';</script>";
        } else {
            echo "<script>alert('Error adding admin: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Error uploading profile picture');</script>";
    }

    // Close connection
    mysqli_close($con);
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Interactive Mathematics Add Admin</title>
    <link rel="shortcut icon" href="../icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Upturn Smart Online Exam System" />
    <script>
        function validateForm() {
        const fnames = document.forms["addAdminForm"]["fnames"].value.trim();
        const surname = document.forms["addAdminForm"]["surname"].value.trim();
        const pnumber = document.forms["addAdminForm"]["pnumber"].value.trim();
        const email = document.forms["addAdminForm"]["email"].value.trim();
        const dob = document.forms["addAdminForm"]["dob"].value;
        const picture = document.forms["addAdminForm"]["picture"].value;
        const password = document.forms["addAdminForm"]["password"].value;
        const confirmPassword = document.forms["addAdminForm"]["confirm_password"].value;

        // Check for empty fields
        if (!fnames || !surname || !pnumber || !email || !dob || !picture || !password || !confirmPassword) {
            alert("All fields are required.");
            return false;
        }

        // Validate phone number (9 digits starting with 77, 78, or 71)
        const phonePattern = /^(77|78|71)\d{7}$/;
        if (!phonePattern.test(pnumber)) {
            alert("Phone number must be 9 digits and start with 77, 78, or 71.");
            return false;
        }

        // Validate email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        // Validate date of birth
        const birthDate = new Date(dob);
        const today = new Date();
        
        if (birthDate >= today) {
            alert("Date of birth cannot be today or a future date.");
            return false;
        }

        // Check if admin is at least 10 years old
        const age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();
        if (age < 18 || (age === 18 && monthDiff < 0) || (age === 18 && monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            alert("Admin must be at least 18 years old.");
            return false;
        }

        // Validate password
        if (password.length < 8) {
            alert("Password must be at least 8 characters long.");
            return false;
        }

        // Check if passwords match
        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }

        return true;
    }
    </script>
</head>
<body>
<div class="page-container">
   <div class="left-content">
       <div class="mother-grid-inner">
           <?php include("header.php"); ?>

           <ol class="breadcrumb">
               <center><li class="breadcrumb-item"><h4><a href="#">Add Teacher</a></h4></li></center>
           </ol>

           <div class="validation-system">
               <div class="validation-form">
                   <form name="addAdminForm" action="addadmin.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                       <div class="col-md-12">
                           <div class="col-md-4 form-group1">
                               <label class="control-label">First Names</label>
                               <input type="text" placeholder="Names" name="fnames" required="">
                           </div>
                           <div class="col-md-4 form-group1">
                               <label class="control-label">Last Names</label>
                               <input type="text" placeholder="Surname" name="surname" required="">
                           </div>
                           <div class="col-md-4 form-group1">
                               <label class="control-label">Phone Number</label>
                               <input type="text" placeholder="0777 913 999" name="pnumber" required="">
                           </div>
                       </div>

                       <div class="col-md-12">
                           <div class="col-md-4 form-group1">
                               <label class="control-label">Email Address</label>
                               <input type="text" placeholder="email@gmail.com" name="email" required="">
                           </div>
                           <div class="col-md-4 form-group2 group-mail">
                               <label class="control-label">Gender</label>
                               <select name="gender">
                                   <option value="Male">Male</option>
                                   <option value="Female">Female</option>
                               </select>
                           </div>
                           <div class="col-md-4 form-group1">
                               <label class="control-label">Physical Address</label>
                               <input type="text" placeholder="123 Chikanga 3 Mutare" name="paddress" required>
                           </div>
                       </div>

                       <div class="col-md-12">
                           <div class="col-md-4 form-group1 group-mail">
                               <label class="control-label">DOB</label>
                               <input type="date" placeholder="dod" name="dob" required="">
                           </div>
                           <div class="col-md-4 form-group2 group-mail">
                               <label class="control-label">Class</label>
                               <select name="class">
                                   <option value="Grade 1A">Grade 1A</option>
                                   <option value="Grade 1B">Grade 1B</option>
                                   <option value="Grade 1C">Grade 1C</option>
                                   <option value="Grade 1D">Grade 1D</option>
                                   <option value="Grade 1D">Grade 1E</option>
                                   <option value="Grade 1D">Grade Special</option>
                               </select>
                           </div>
                           <div class="col-md-4 form-group2 group-mail">
                               <label class="control-label">Profile Picture </label>
                               <input type="file" placeholder="Attach image" name="picture" required>
                           </div>
                       </div>

                       
                        <div class="col-md-4 form-group1 group-mail">
                            <label class="control-label">Password</label>
                            <input type="password" placeholder="Enter password" name="password" required>
                        </div>
                        <div class="col-md-4 form-group1 group-mail">
                            <label class="control-label">Confirm Password</label>
                            <input type="password" placeholder="Confirm password" name="confirm_password" required>
                        </div>

                       <div class="clearfix"></div>
                       <div class="col-md-12 form-group">
                           <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                           <button type="reset" class="btn btn-default" value="reset">Reset</button>
                       </div>
                       <div class="clearfix"></div>
                   </form>
               </div>
           </div>

           <?php include("footer.php"); ?>
       </div>
   </div>
</div>

<script type="text/javascript">
function validateForm2() {
    const fnames = document.forms["addAdminForm"]["fnames"].value.trim();
    const surname = document.forms["addAdminForm"]["surname"].value.trim();
    const pnumber = document.forms["addAdminForm"]["pnumber"].value.trim();
    const email = document.forms["addAdminForm"]["email"].value.trim();
    const dob = document.forms["addAdminForm"]["dob"].value;
    const picture = document.forms["addAdminForm"]["picture"].value;

    if (!fnames || !surname || !pnumber || !email || !dob || !picture) {
        alert("All fields are required.");
        return false;
    }

    const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (pnumber.length < 10 || isNaN(pnumber)) {
        alert("Please enter a valid phone number with at least 10 digits.");
        return false;
    }

    const birthDate = new Date(dob);
    const today = new Date();
    const age = today.getFullYear() - birthDate.getFullYear();
    const monthDiff = today.getMonth() - birthDate.getMonth();
    const isUnderage = monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate());

    if (age < 18 || (age === 18 && isUnderage)) {
        alert("User must be at least 18 years old.");
        return false;
    }

    return true;
}
</script>
</body>
</html>
