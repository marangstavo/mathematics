<?php
// Check if a session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();  // Start session only if it's not already started
}

include("connect.php");

// Initialize variables
$departments = 0;
$students = 0;
$examination = 0;
$subjects = 0;
$categories = 0;
$notice = 0;
$questions = 0;
$banned_students = 0;
$std_fails = 0;
$std_pass = 0;

// Get logged-in teacher's UID
$teacher_uid = $_SESSION['userid'];  // Assuming the teacher's user ID is stored in session

// Fetch the class assigned to the teacher
$teacher_class_query = "SELECT class FROM usertbl WHERE uid = ?";
if ($stmt = mysqli_prepare($con, $teacher_class_query)) {
    mysqli_stmt_bind_param($stmt, "i", $teacher_uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $teacher_class);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
}

if ($teacher_class) {
    // Fetch departments count
    $sql = "SELECT * FROM departmenttbl";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $departments++;
        }
    }

    // Fetch students in the same class as the teacher
    $sql = "SELECT * FROM studenttbl WHERE class = ?";
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $teacher_class);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $students++;
            }
        }
    }

    // Fetch examinations count, where class matches teacher's class
    $sql = "SELECT * FROM examtbl WHERE class = ?";  // Filter exams based on teacher's class
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $teacher_class);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $examination++;
            }
        }
    }

    // Fetch subjects count
    $sql = "SELECT * FROM subjecttbl";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $subjects++;
        }
    }

    // Fetch categories count
    $sql = "SELECT * FROM categorytbl";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categories++;
        }
    }

    // Fetch notice count
    $sql = "SELECT * FROM noticetbl";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $notice++;
        }
    }

    // Fetch questions count
    $sql = "SELECT * FROM questiontbl";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while (mysqli_fetch_assoc($result)) {
            $questions++;
        }
    }

    // Fetch banned students count
    $sql = "SELECT * FROM studenttbl WHERE status = '0'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $banned_students++;
        }
    }

    // Fetch assessment status count (Pass/Fail)
    $sql = "SELECT * FROM assesmenttbl";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $status = $row['status'];
            if ($status == "PASS") {
                $std_pass++;
            } else {
                $std_fails++;
            }
        }
    }

} else {
    // Teacher class not found, handle this case
    echo "Teacher's class not found.";
}

// Closing the connection if needed
// mysqli_close($con);
?>
