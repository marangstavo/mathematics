<?php
include("connect.php");
session_start();

if (!isset($_SESSION["userid"])) {
    header('location:login.php');
    exit;
}

if (isset($_POST['submitqxns'])) {
    $examid = $_POST['examid'];
    $number_of_qxns = $_POST['number_of_qxns'];

    $success = true;

    for ($i = 1; $i <= $number_of_qxns; $i++) {
        $q_name = mysqli_real_escape_string($con, $_POST['q_name_' . $i]);
        $opt_1 = mysqli_real_escape_string($con, $_POST['opta_' . $i]);
        $opt_2 = mysqli_real_escape_string($con, $_POST['optb_' . $i]);
        $opt_3 = mysqli_real_escape_string($con, $_POST['optc_' . $i]);
        $opt_4 = mysqli_real_escape_string($con, $_POST['optd_' . $i]);
        $correct_op = mysqli_real_escape_string($con, $_POST['correct_op_' . $i]);

        $query = "INSERT INTO questiontbl (examid, questionname, op1, op2, op3, op4, correctop)
                  VALUES ('$examid', '$q_name', '$opt_1', '$opt_2', '$opt_3', '$opt_4', '$correct_op')";

        if (!mysqli_query($con, $query)) {
            $success = false;
            break;
        }
    }

    mysqli_close($con);

    if ($success) {
        echo "<script>alert('Questions added successfully'); window.location.href='addquestion.php';</script>";
    } else {
        echo "<script>alert('Error adding questions: " . mysqli_error($con) . "');</script>";
    }
}

include("header.php");
?>

<html style="overflow-y: scroll;">
<head>
    <title>Interactive Mathematics Add Question</title>
    <link rel="shortcut icon" href="../icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Upturn Smart Online Exam System">
    <style>
        /* Your existing CSS styles */
        .tab-content { /* styles omitted for brevity */ }
        .tabs { /* styles omitted for brevity */ }
        .tabs span:hover { /* styles omitted for brevity */ }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">
                <br><br>
                <form action="addquestion.php" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group2 group-mail">
                            <?php
                            $sql = "SELECT * FROM examtbl WHERE status='1'";
                            $result = mysqli_query($con, $sql);
                            ?>
                            <label class="control-label">Select Exam Name</label>
                            <select name="examnm" required>
                                <option value="">--Select--</option>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $row['examid']; ?>"><?php echo $row['examname']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6"><br>
                            <button type="submit" class="btn btn-primary" name="submit1">Select Exam</button>
                        </div>
                    </div>
                </form>

                <div class="validation-system">
                    <div class="validation-form">
                        <?php if (isset($_POST['submit1'])) {
                            $examid = $_POST['examnm'];
                            $sql_qry = mysqli_query($con, "SELECT * FROM examtbl WHERE examid = '$examid'");
                            $record = mysqli_fetch_array($sql_qry);
                            $number_of_qxns = $record['number_of_qxns'];
                            $examname = $record['examname'];
                        ?>
                            <form action="addquestion.php" method="post">
                                <ol class="breadcrumb">
                                    <center>
                                        <li class="breadcrumb-item">
                                            <h4>The Exam <?php echo $examname . ' has ' . $number_of_qxns . ' Questions'; ?></h4>
                                        </li>
                                    </center>
                                </ol>

                                <div class="container" style="max-width:980px;">
                                    <div class="tabs">
                                        <?php for ($i = 1; $i <= $number_of_qxns; $i++) { ?>
                                            <span data-tab-value="#tab_<?php echo $i; ?>">Qxn <?php echo $i; ?></span>
                                        <?php } ?>
                                    </div>

                                    <div class="tab-content">
                                        <input type="hidden" name="examid" value="<?php echo $examid; ?>" />
                                        <input type="hidden" name="number_of_qxns" value="<?php echo $number_of_qxns; ?>" />

                                        <?php for ($i = 1; $i <= $number_of_qxns; $i++) { ?>
                                            <div class="tabs__tab" id="tab_<?php echo $i; ?>" data-tab-info>
                                                <div class="col-md-12 form-group1 group-mail">
                                                    <label class="control-label">Question Number <?php echo $i; ?></label>
                                                    <textarea class="form-control" rows="1" name="q_name_<?php echo $i; ?>" required></textarea>
                                                </div>
                                                <?php for ($j = 1; $j <= 4; $j++) { ?>
                                                    <div class="col-md-4 form-group2 group-mail">
                                                        <label class="control-label">Option <?php echo $j; ?></label>
                                                        <input class="form-control" name="opt<?php echo chr(96 + $j); ?>_<?php echo $i; ?>" required>
                                                    </div>
                                                <?php } ?>
                                                <div class="col-md-4 form-group2 group-mail">
                                                    <label class="control-label">Correct Answer</label>
                                                    <input type="text" class="form-control" name="correct_op_<?php echo $i; ?>" required>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="col-md-6 form-group">
                                            <button type="submit" class="btn btn-primary" name="submitqxns">Submit</button>
                                            <button type="reset" class="btn btn-default" value="reset">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>

                <?php include("footer.php"); ?>
            </div>
        </div>
        <?php include("sidebar.php"); ?>
    </div>

    <script type="text/javascript">
        const tabs = document.querySelectorAll('[data-tab-value]');
        const tabInfos = document.querySelectorAll('[data-tab-info]');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = document.querySelector(tab.dataset.tabValue);
                tabInfos.forEach(tabInfo => {
                    tabInfo.classList.remove('active');
                });
                target.classList.add('active');
            });
        });
    </script>
</body>
</html>