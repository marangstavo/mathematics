<?php
session_start(); // Start the session at the very beginning
include("connect.php");

if (isset($_POST["login"])) {
    $result = mysqli_query($con, "SELECT * FROM studenttbl WHERE email='" . $_POST["email"] . "' and password = '" . ($_POST["password"]) . "'");
    $row = mysqli_fetch_array($result);
    if (is_array($row)) {
        $_SESSION["studentid"] = $row['studid'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["fname"] = $row['fname'];
        $_SESSION["lname"] = $row['lname'];
        $_SESSION["file"] = $row['file'];
        $_SESSION["level"] = $row['catname'];
        header("Location:../../index.html");
        exit();
    } else {
        echo "<script>alert('Invalid Login Details')</script>";
    }
}

if (isset($_POST["admin"])) {
    header("Location:../admin");
    exit();
}

if (isset($_POST["create"])) {
    header("Location:../register.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Interactive Mathematics Login</title>
    <link rel="shortcut icon" href="../icon.png">
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css"/>
    <link rel="stylesheet" href="../css/style2.css">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery-ui.css"> 
    <script src="js/jquery-2.1.4.min.js"></script>
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <link rel="stylesheet" href="css/table-style.css" type='text/css' />

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .flex-container {
            display: flex;
            height: 100vh; /* Full height */
        }

        .left-container, .right-container {
            flex: 1; /* Equal size */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .left-container {
            background-color: #f0f0f0; /* Light gray background for visibility */
        }

        .right-container {
            background-color: #ffffff; /* White background for contrast */
            display: flex;
            justify-content: center; /* Center align horizontally */
            align-items: center; /* Center align vertically */
        }

        .sin-w3-agile {
            width: 100%; /* Ensure form takes full width */
            max-width: 400px; /* Optional: Limit the width of the form */
            text-align: center; /* Center text within the form */
        }

        .username input, .password-agileits input {
            width: 90%; /* Full width */
            height: 30px; /* Increased height */
            padding: 10px; /* Padding for better usability */
            margin-top: 5px; /* Space above input */
            box-sizing: border-box; /* Ensure padding is included in width */
        }

        .footer {
            text-align: center;
            padding: 20px;
        }

        .row {
            display: flex;                /* Use flexbox for button container */
            flex-direction: column;      /* Stack buttons vertically */
            align-items: center;         /* Center buttons horizontally */
            justify-content: center;     /* Center buttons vertically */
            gap: 15px;                   /* Add space between buttons */
            margin-top: 20px;            /* Add spacing above the buttons */
        }

        .row button, .row a {
            display: block;              /* Treat buttons as block elements */
            width: 80%;                  /* Ensure all buttons have equal width */
            padding: 12px;               /* Add padding for usability */
            font-size: 16px;             /* Font size for better readability */
            color: #fff;                 /* White text color */
            text-align: center;          /* Center align text inside buttons */
            text-decoration: none;       /* Remove underline for links */
            background-color: #28a745;   /* Green background color */
            border: none;                /* Remove borders */
            border-radius: 5px;          /* Rounded button corners */
            cursor: pointer;             /* Pointer cursor for hover effect */
            transition: background-color 0.3s ease; /* Smooth transition for hover */
        }

        .row button:hover, .row a:hover {
            background-color: #218838;   /* Darker green shade on hover */
        }

        /* Style for Interactive Mathematics H1 */
        h1 {
            font-size: 48px; /* Larger font size */
            color: green;    /* Green color */
            font-family: 'Roboto', sans-serif; /* Optional: Add a nice font */
            margin-bottom: 20px; /* Space below the heading */
        }
    </style>
</head> 
<body>
    <div class="flex-container">
        <div class="left-container">
            <img src="https://www.shutterstock.com/image-vector/black-kids-waving-600nw-683665378.jpg" alt="Kids Waving" style="max-width: 100%; height: 110%;" />
        </div>
        <div class="right-container">
            <div class="sin-w3-agile">
                <!-- Updated H1 tag with green color and larger font -->
                <h1>Junior Interactive Mathematics For Murahwa Hill</h1>
                <h2>Students Sign In</h2>
                <form action="#" method="post">
                    <div class="username">
                        <span class="username">Username:</span>
                        <input type="text" name="email" class="name" required />
                    </div>
                    <div class="password-agileits">
                        <span class="username">Password:</span>
                        <input type="password" name="password" class="password" placeholder="" required>
                    </div>
                    <div class="row">
                        <button type="submit" name="login">Sign In</button>
                        <a href="../admin">Admin Login</a>
                        <a href="../register.php">Create Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
