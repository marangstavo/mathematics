<?php
include("connect.php");
session_start();

// Check if the teacher is logged in
if ($_SESSION["userid"] == true) {

    // Get the logged-in teacher's user ID
    $teacher_uid = $_SESSION['userid'];  // Assuming the teacher's user ID is stored in session

    // Fetch the teacher's assigned class from the `usertbl` table
    $teacher_class_query = "SELECT class FROM usertbl WHERE uid = ?";
    if ($stmt = mysqli_prepare($con, $teacher_class_query)) {
        mysqli_stmt_bind_param($stmt, "i", $teacher_uid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $teacher_class);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    if ($teacher_class) {
        // Query to get students from the class assigned to the teacher
        $sql = "SELECT * FROM studenttbl WHERE class = ?";
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $teacher_class);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }
    }

    // Delete student logic
    if (isset($_GET['del'])) {
        $post_del = $_GET['del'];
        // Delete query using prepared statements for security
        $del_query = "DELETE FROM studenttbl WHERE studid = ?";
        if ($stmt = mysqli_prepare($con, $del_query)) {
            mysqli_stmt_bind_param($stmt, "i", $post_del);
            mysqli_stmt_execute($stmt);
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "<script>alert('Student details deleted successfully'); window.location.href='studentlist.php';</script>";
            } else {
                echo "<script>alert('Error occurred. Please try again!');</script>";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Update student status (Activate/Deactivate) logic
    if (isset($_GET['pub'])) {
        $id = $_GET['pub'];
        $status = $_GET['status'];

        // Toggle the status
        $status = ($status == '0') ? '1' : '0';

        // Update query using prepared statements
        $pub_query = "UPDATE studenttbl SET status = ? WHERE studid = ?";
        if ($stmt = mysqli_prepare($con, $pub_query)) {
            mysqli_stmt_bind_param($stmt, "ii", $status, $id);
            mysqli_stmt_execute($stmt);
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "<script>alert('Student details updated successfully'); window.location.href='studentlist.php';</script>";
            } else {
                echo "<script>alert('Error occurred. Please try again!');</script>";
            }
            mysqli_stmt_close($stmt);
        }
    }

?>

<html>
<head>
<title>Interactive Mathematics Student List</title>
<link rel="shortcut icon" href="../icon.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div class="page-container">
<div class="left-content">
<div class="mother-grid-inner">

<?php 
    include("header.php");
?>

<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info"> 
<h2>List of Students</h2>
<!-- Add/Export options -->
<div class="col-md-12">
    <div class="col-md-4">
        <li class="breadcrumb-item text-white"><h4><a href="addstudent.php" class="btn btn-primary hvr-icon-float-away col-9">Add Student</a></h4></li>
    </div>
    <div class="col-md-4">
        <li class="breadcrumb-item text-white"><h4><a href="excel.php" target="_blank" class="btn btn-success col-9">Export Excel</a></h4></li>
    </div>
    <div class="col-md-4">
        <li class="breadcrumb-item text-white" style="padding-top:38px;">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." style="color:black; border-color: green;" />
        </li>
    </div>
</div>

<!-- Table -->
<table width="100%" id="table">
<thead>
<tr>
    <th align="left">Id</th>
    <th align="left">Photo</th>
    <th align="left">Full Name</th>
    <th align="left">Gender</th>
    <th align="left">Email</th>
    <th align="left">Mobile</th>
    <th align="left">Password</th>
    <th align="left">DOB</th>
    <th align="left">Address</th>
    <th align="left">Department</th>
    <th align="left">Category</th>
    <th align="left">Action</th>
</tr>
</thead>
<tbody>
<?php 
$cnt = 0;
while ($rows = mysqli_fetch_array($result)) {
    $cnt++;
    extract($rows);
?>
<tr>
    <td><?php echo $cnt; ?></td>
    <td><?php echo ($rows['file'] != NULL) ? '<img src="../student/uploaded/'.$rows['file'].'" width="50" height="50">' : ''; ?></td>
    <td><?php echo $rows['fname'].' '.$rows['lname']; ?></td>
    <td><?php echo $rows['gender']; ?></td>
    <td><?php echo $rows['email']; ?></td>
    <td><?php echo $rows['phone']; ?></td>
    <td><?php echo $rows['password']; ?></td>
    <td><?php echo $rows['dob']; ?></td>
    <td><?php echo $rows['address']; ?></td>
    <td><?php echo $rows['deptname']; ?></td>
    <td><?php echo $rows['catname']; ?></td>
    <td>
        <?php
        $status = $rows['status'];
        if ($status == '0') {
        ?>
        <button class="btn bg-danger"><a href="?pub=<?php echo $rows['studid']; ?>&status=<?php echo $status; ?>" onclick="getConfirm('Activate');">Activate</a></button>
        <?php
        }
        if ($status == '1') {
        ?>
        <button class="btn bg-success text-white"><a href="?pub=<?php echo $rows['studid']; ?>&status=<?php echo $status; ?>" onclick="getConfirm('De-Activate');">De-Activate</a></button>
        <?php
        }
        ?>
        <button class="btn btn-dark text-white"><a href="?del=<?php echo $rows['studid']; ?>" onclick="getConfirm('Delete');">Delete</a></button>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>

<?php
    include("footer.php"); // Include footer
} else {
    header('Location: login.php'); // Redirect if not logged in
}
?>

</div></div>
<?php include("sidebar.php"); ?>
</div>
</body>

<script type="text/javascript">
function getConfirm(action) {
    if (confirm('Are you sure you want to ' + action + '?')) {
        return true;
    } else {
        return false;
    }
}
</script>

</html>
