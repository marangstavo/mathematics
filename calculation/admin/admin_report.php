<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Admin Report - Student Exercises</title>
    <link rel="shortcut icon" href="../icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Upturn Smart Online Exam System" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Chart.js Data Labels Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }
        .page-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }
    </style>
</head> 
<body>
<div class="page-container">
   <div class="left-content">
       <div class="mother-grid-inner">
       <?php 
        session_start();
        include("connect.php");
        include("header.php"); 
        
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
        
        ?>
           <h1 class="text-center mb-4">Teacher Report - Student Exercises</h1>
           <div class="card mt-4">
               <div class="card-header bg-info text-white">
                   <h5 class="card-title mb-0">Student Performance Summary</h5>
               </div>
               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-striped table-hover">
                           <thead>
                               <tr>
                                   <th>Student ID</th>
                                   <th>Name</th>
                                   <th>Addition Progress</th>
                                   <th>Addition Avg. Score</th>
                                   <th>Subtraction Progress</th>
                                   <th>Subtraction Avg. Score</th>
                                   <th>Overall Avg. Score</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php
                               // Fetch and display student data here
                               $sql = "SELECT s.studid, s.lname, 
                                           SUM(CASE WHEN er.exercise_name = 'Random Addition Exercise' THEN 1 ELSE 0 END) as addition_completed,
                                           AVG(CASE WHEN er.exercise_name = 'Random Addition Exercise' THEN er.score ELSE NULL END) as addition_avg_score,
                                           SUM(CASE WHEN er.exercise_name = 'Random Subtraction Exercise' THEN 1 ELSE 0 END) as subtraction_completed,
                                           AVG(CASE WHEN er.exercise_name = 'Random Subtraction Exercise' THEN er.score ELSE NULL END) as subtraction_avg_score
                                       FROM studenttbl s
                                       LEFT JOIN exercise_results er ON s.studid = er.studentid
                                       WHERE s.class = '$teacher_class'
                                       GROUP BY s.studid";
                               $result = mysqli_query($con, $sql);

                               while ($row = mysqli_fetch_assoc($result)) {
                                   $additionProgress = min(($row['addition_completed'] / 5) * 100, 100);
                                   $subtractionProgress = min(($row['subtraction_completed'] / 5) * 100, 100);
                                   $overallAvgScore = ($row['addition_avg_score'] + $row['subtraction_avg_score']) / 2;

                                   echo "<tr>";
                                   echo "<td>" . htmlspecialchars($row['studid']) . "</td>";
                                   echo "<td>" . htmlspecialchars($row['lname']) . "</td>";
                                   echo "<td><div class='progress'><div class='progress-bar bg-success' role='progressbar' style='width: {$additionProgress}%' aria-valuenow='{$additionProgress}' aria-valuemin='0' aria-valuemax='100'>{$additionProgress}%</div></div></td>";
                                   echo "<td>" . number_format($row['addition_avg_score'], 2) . "</td>";
                                   echo "<td><div class='progress'><div class='progress-bar bg-info' role='progressbar' style='width: {$subtractionProgress}%' aria-valuenow='{$subtractionProgress}' aria-valuemin='0' aria-valuemax='100'>{$subtractionProgress}%</div></div></td>";
                                   echo "<td>" . number_format($row['subtraction_avg_score'], 2) . "</td>";
                                   echo "<td>" . number_format($overallAvgScore, 2) . "</td>";
                                   echo "</tr>";
                               }
                               ?>
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>

           <?php include("footer.php"); ?>
       </div>
   </div>

   <?php include("sidebar.php"); ?>
   
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Chart.js code for visualizations
document.addEventListener('DOMContentLoaded', function() {

    // Exercise Completion Rate Chart (done vs undone based on average score threshold)
    var ctxCompletion = document.getElementById('exerciseCompletionChart').getContext('2d');
    var completionChart = new Chart(ctxCompletion, {
        type: 'pie',
        data: {
            labels: ['Done', 'Undone'],
            datasets: [{
                data: [
                    <?php
                    $doneExercises = 0;
                    $undoneExercises = 0;
                    $threshold = 60; // Define threshold score for "done" exercises
                    $sql = "SELECT er.exercise_name, er.score FROM exercise_results er";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['score'] >= $threshold) {
                            $doneExercises++;
                        } else {
                            $undoneExercises++;
                        }
                    }
                    echo $doneExercises . ", " . $undoneExercises;
                    ?>
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 99, 132, 0.6)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                datalabels: {
                    color: 'white',
                    font: {
                        weight: 'bold'
                    },
                    formatter: function(value, ctx) {
                        let percentage = Math.round((value / ctx.dataset._meta[0].total) * 100);
                        return percentage + '%';
                    }
                }
            }
        }
    });
});
</script>
</body>
</html>
