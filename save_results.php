<?php
// save_results.php
session_start();

// Fetch the raw POST data (which is in JSON format)
$input = file_get_contents('php://input');
$data = json_decode($input, true);  // Decode JSON to an associative array

// Check if the necessary fields are present in the JSON
if (isset($data['score']) && isset($data['exercise_name'])) {
    $studentid = $_SESSION["studentid"];  // Fetch student ID from the session or use a dummy ID
    $exercise_name = $data['exercise_name'];  // Get exercise name from the decoded JSON
    $score = $data['score'];  // Get score from the decoded JSON
    $date = date('Y-m-d H:i:s');  // Current date

    // Database connection (Update with your actual DB credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "interactivemaths";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO exercise_results (studentid, exercise_name, score, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $studentid, $exercise_name, $score, $date);

    // Execute the query
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Result saved successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to save result!"]);
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid data!"]);
}
?>
