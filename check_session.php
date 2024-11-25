<?php
// check_session.php
session_start();

$response = array();

if (isset($_SESSION["studentid"])) {
    $response['loggedIn'] = true;
} else {
    $response['loggedIn'] = false;
}

echo json_encode($response);

?>
