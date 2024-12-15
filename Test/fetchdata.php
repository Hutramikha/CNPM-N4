<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include 'connect.php';

header('Content-Type: application/json');

$searchItem = isset($_GET['search']) ? $_GET['search'] : '';

$query = "select matl, tentl from theloai";
if(!empty($searchItem)){
    $query .= " where matl like ? or tentl like ?";
}
$stmt = $conn->prepare($query);

if (!empty($searchItem)) {
    $searchTerm = "%$searchItem%";
    $stmt->bind_param("ss", $searchItem, $searchItem);
}

$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
$stmt->close();
$conn->close();


?>
