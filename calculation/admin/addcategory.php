<?php include("connect.php"); ?>
<?php
if (isset($_POST['submit'])) {    
    $level = $_POST['level'];
    $deptnm = $_POST['deptnm'];
    $status = '1';

    $query = "INSERT INTO categorytbl (catname, deptname, cstatus) VALUES ('$level', '$deptnm', '$status')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Category added successfully');
        window.location.href='addcategory.php';</script>";
    } else {
        echo mysqli_error($con);
    }
    mysqli_close($con);
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Interactive Mathematics - Add Category</title>
    <link rel="shortcut icon" href="../icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Upturn Smart Online Exam System" />
</head>
<body>

<div class="page-container">
    <div class="left-content">
        <div class="mother-grid-inner">
            <?php 
            session_start();
            if ($_SESSION["userid"]) {
                include("header.php"); 
            ?>
            <ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="#none">Add Level</a></h4></li></center>
            </ol>

            <div class="validation-system">
                <div class="validation-Grade">
                    <form action="addcategory.php" method="post">
                        <div class="col-md-6 Grade-group2 group-mail">
                            <label class="control-label">Level of Student</label>
                            <select name="level" id="">
                                <option value="Grade one">Grade 1</option>
                                <option value="Grade two">Grade 2</option>
                                <option value="Grade three">Grade 3</option>
                                <option value="Grade four">Grade 4</option>
                                <option value="Grade five">Grade 5</option>
                                <option value="Grade six">Grade 6</option>
                                <option value="Grade seven">Grade 7</option>
                            </select>
                        </div>
                        <div class="col-md-6 Grade-group2 group-mail">
                            <?php 
                            $sql = "SELECT deptname FROM departmenttbl WHERE status='1'";
                            $result = mysqli_query($con, $sql); 
                            ?>
                            <label class="control-label">Select Department</label>
                            <select name="deptnm" id="">
                                <option value="" <?php if (!isset($_POST['deptnm']) || empty($_POST['deptnm'])) { ?>selected<?php } ?>>--Select--</option>
                                <?php 
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $row['deptname']; ?>" <?php if (isset($_POST['deptnm']) && $_POST['deptnm'] == $row['deptname']) { ?>selected<?php } ?>><?php echo $row['deptname']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 Grade-group">
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

    <?php include("sidebar.php"); ?>
    <?php } else {
        header('location:login.php');
    } ?>
</div>
</body>
<script type="text/javascript">
function getConfirm(l) {
    if (arguments[0] != null) {
        if (window.confirm('Get Full Source Code at reasonable cost ' + l + '?\n')) {
            location.href = l;
        } else {
            event.cancelBubble = true;
            event.returnValue = false;
            return false;
        }
    } else {
        return false;
    }
}
</script>
</html>