<?php

include './database/connect.php';
header('Content-Type: application/json');
$conn = $connect;

$response = ['success' => false];

if (isset($_POST['matinhtrang'])) {
    $status_id = $_POST['matinhtrang'];
    $query = "delete from tinhtrangsach where matinhtrang = ?";
    $stmt = $conn->prepare($query);
    
    // Debug
    if ($stmt === false) {
        $response['error'] = 'Failed to prepare statement';
        echo json_encode($response);
        exit();
    }

    $stmt->bind_param("i", $status_id);
    
    // Execute the query
    if ($stmt->execute()) {
        $response['success'] = $stmt->affected_rows > 0;
    } else {
        $response['error'] = 'Failed to execute query';
    }

    $stmt->close();
} else {
    $response['error'] = 'Status ID not provided';
}

echo json_encode($response); // Return the response JSON

$conn->close();
?>