<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Interactive Mathematics Exercise Results</title>
    <link rel="shortcut icon" href="../icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Upturn Smart Online Exam System" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        .progress {
            height: 25px;
            margin-bottom: 10px;
        }
        .progress-bar {
            line-height: 25px;
        }
        .overall-comment {
            background-color: #e8f5e9;
            border-left: 5px solid #4caf50;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
        }
        h2, h3 {
            color: #2c3e50;
            margin-top: 30px;
        }
        .table {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .chart-container {
            margin-top: 30px;
        }
    </style>
</head> 
<body>
<div class="page-container">
   <div class="left-content">
       <div class="mother-grid-inner">
           <?php 
           session_start();
           if ($_SESSION["studentid"] == true) {
               include("connect.php");
               include("checkstud.php");
               include("header.php");

               $my_id = $_SESSION["studentid"];
               $sql = "SELECT * FROM exercise_results WHERE studentid = '$my_id'";
               $result = mysqli_query($con, $sql);

               // Initialize counters and scores
               $totalAdditionExercises = 5;
               $totalSubtractionExercises = 5;
               $completedAdditionExercises = 0;
               $completedSubtractionExercises = 0;
               $totalAdditionScore = 0;
               $totalSubtractionScore = 0;
               $additionScores = [];
               $subtractionScores = [];

               // Count completed exercises and calculate total scores
               while ($rows = mysqli_fetch_assoc($result)) {
                   if ($rows['exercise_name'] == 'Random Addition Exercise') {
                       $completedAdditionExercises++;
                       $totalAdditionScore += $rows['score'];
                       $additionScores[] = $rows['score'];
                   } elseif ($rows['exercise_name'] == 'Random Subtraction Exercise') {
                       $completedSubtractionExercises++;
                       $totalSubtractionScore += $rows['score'];
                       $subtractionScores[] = $rows['score'];
                   }
               }

               // Calculate progress percentages and average scores
               $additionProgressPercentage = min(($completedAdditionExercises / $totalAdditionExercises) * 100, 100);
               $subtractionProgressPercentage = min(($completedSubtractionExercises / $totalSubtractionExercises) * 100, 100);
               $averageAdditionScore = $completedAdditionExercises > 0 ? $totalAdditionScore / $completedAdditionExercises : 0;
               $averageSubtractionScore = $completedSubtractionExercises > 0 ? $totalSubtractionScore / $completedSubtractionExercises : 0;

               echo '<h2 class="mt-4">Exercise Progress</h2>';

               // Display Addition Progress Bar and Reset Button
               echo '<h3>Addition Exercises</h3>';
               echo '<div class="progress">';
               echo '<div class="progress-bar bg-success" role="progressbar" style="width: ' . $additionProgressPercentage . '%;" aria-valuenow="' . $additionProgressPercentage . '" aria-valuemin="0" aria-valuemax="100">' . round($additionProgressPercentage) . '%</div>';
               echo '</div>';
               echo '<p>Progress: ' . round($additionProgressPercentage) . '% | Average Score: ' . round($averageAdditionScore, 2) . '/5</p>';
               if ($additionProgressPercentage == 100) {
                   echo '<form method="POST" action="" style="display:inline-block;">';
                   echo '<input type="hidden" name="exercise_type" value="addition">';
                   echo '<button type="submit" class="btn btn-danger btn-sm">Reset Addition Progress</button>';
                   echo '</form>';
               }

               // Display Subtraction Progress Bar and Reset Button
               echo '<h3>Subtraction Exercises</h3>';
               echo '<div class="progress">';
               echo '<div class="progress-bar bg-info" role="progressbar" style="width: ' . $subtractionProgressPercentage . '%;" aria-valuenow="' . $subtractionProgressPercentage . '" aria-valuemin="0" aria-valuemax="100">' . round($subtractionProgressPercentage) . '%</div>';
               echo '</div>';
               echo '<p>Progress: ' . round($subtractionProgressPercentage) . '% | Average Score: ' . round($averageSubtractionScore, 2) . '/5</p>';
               if ($subtractionProgressPercentage == 100) {
                   echo '<form method="POST" action="" style="display:inline-block;">';
                   echo '<input type="hidden" name="exercise_type" value="subtraction">';
                   echo '<button type="submit" class="btn btn-danger btn-sm">Reset Subtraction Progress</button>';
                   echo '</form>';
               }

               // Handle Reset Progress
               if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['exercise_type'])) {
                   $exercise_type = $_POST['exercise_type'];
                   if ($exercise_type === "addition") {
                       $sql = "DELETE FROM exercise_results WHERE studentid = '$my_id' AND exercise_name = 'Random Addition Exercise'";
                   } elseif ($exercise_type === "subtraction") {
                       $sql = "DELETE FROM exercise_results WHERE studentid = '$my_id' AND exercise_name = 'Random Subtraction Exercise'";
                   }
                   if (mysqli_query($con, $sql)) {
                       echo '<div class="alert alert-success mt-3">Successfully reset progress for ' . ucfirst($exercise_type) . ' exercises.</div>';
                   } else {
                       echo '<div class="alert alert-danger mt-3">Error resetting progress. Please try again later.</div>';
                   }
               }

               // Overall comment
               $overallAverageScore = ($averageAdditionScore + $averageSubtractionScore) / 2;
               echo '<div class="overall-comment">';
               echo '<h3>Overall Performance</h3>';
               if ($overallAverageScore >= 4) {
                   echo '<p>Excellent work! You\'re doing great in both addition and subtraction. Keep up the good work!</p>';
               } elseif ($overallAverageScore >= 3) {
                   echo '<p>Good job! You\'re making steady progress. Focus on improving in areas where you scored lower to boost your overall performance.</p>';
               } elseif ($overallAverageScore >= 2) {
                   echo '<p>You\'re on the right track, but there\'s room for improvement. Consider reviewing the topics where you scored lower and practice more exercises in those areas.</p>';
               } else {
                   echo '<p>It looks like you might be facing some challenges. Spend more time on both addition and subtraction exercises.</p>';
               }
               echo '</div>';

               // Render Graph
               echo '<div class="chart-container">';
               echo '<canvas id="progressChart"></canvas>';
               echo '</div>';

               // Data for the graph
               echo '<script>
                   const ctx = document.getElementById("progressChart").getContext("2d");
                   const progressChart = new Chart(ctx, {
                       type: "line",
                       data: {
                           labels: ["Attempt 1", "Attempt 2", "Attempt 3", "Attempt 4", "Attempt 5"],
                           datasets: [
                               {
                                   label: "Addition Scores",
                                   data: ' . json_encode($additionScores) . ',
                                   borderColor: "rgba(75, 192, 192, 1)",
                                   borderWidth: 2,
                                   fill: false
                               },
                               {
                                   label: "Subtraction Scores",
                                   data: ' . json_encode($subtractionScores) . ',
                                   borderColor: "rgba(255, 99, 132, 1)",
                                   borderWidth: 2,
                                   fill: false
                               }
                           ]
                       },
                       options: {
                           responsive: true,
                           plugins: {
                               legend: { display: true }
                           },
                           scales: {
                               x: { title: { display: true, text: "Attempts" } },
                               y: { title: { display: true, text: "Score" }, min: 0, max: 5 }
                           }
                       }
                   });
               </script>';

               include("footer.php");
               include("sidebar.php");
           } else {
               header('location:login.php');
           }
           ?>
       </div>
   </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
