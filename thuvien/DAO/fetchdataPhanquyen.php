<?php

// Kết nối cơ sở dữ liệu
include './database/connect.php';

header('Content-Type: application/json');

// Sử dụng biến kết nối từ file connect.php
$conn = $connect;

// Lấy thông tin tìm kiếm (nếu có)
$searchItem = isset($_GET['search']) ? $_GET['search'] : '';
$maquyen = isset($_GET['maquyen']) ? $_GET['maquyen'] : '';

// Kiểm tra tham số maquyen
if (empty($maquyen)) {
    echo json_encode([
        'error' => true,
        'message' => 'Missing required parameter: maquyen'
    ]);
    exit;
}

// Câu lệnh truy vấn cơ sở dữ liệu
$query = "SELECT chitietquyen.maquyen, chucnang.tenchucnang, chitietquyen.hanhdong, chitietquyen.hoatdong
          FROM chitietquyen
          INNER JOIN chucnang ON chitietquyen.machucnang = chucnang.machucnang
          WHERE chitietquyen.maquyen = ?";

if (!empty($searchItem)) {
    $query .= " AND (chucnang.tenchucnang LIKE ? OR chitietquyen.hanhdong LIKE ? )";
}

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $maquyen);

// Gán giá trị cho tham số truy vấn
if (!empty($searchItem)) {
    $searchTerm = "%$searchItem%";
    $stmt->bind_param("ss", $maquyen, $searchTerm);
} else {
    $stmt->bind_param("s", $maquyen);
}

// Thực thi câu lệnh và lấy kết quả
$stmt->execute();
$result = $stmt->get_result();

// Chuyển kết quả thành mảng
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        'id' => $row['id'],
        'tenchucnang' => $row['tenchucnang'],
        'hanhdong' => $row['hanhdong'],
        'hoatdong' => (bool)$row['hoatdong'] // Chuyển đổi trạng thái boolean
    ];
}

// Trả dữ liệu dạng JSON về client
echo json_encode($data);

// Đóng kết nối
$stmt->close();
$conn->close();

?>
