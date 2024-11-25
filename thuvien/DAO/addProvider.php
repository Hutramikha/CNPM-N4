<?php
include './database/connect.php'; // Kiểm tra đường dẫn đến connect.php
header('Content-Type: application/json');
$conn = $connect;

$response = ['success' => false];

// Lấy dữ liệu từ yêu cầu AJAX
$providerName = $_POST['providerName'];
$providerPhone = $_POST['providerPhone'];
$providerAddress = $_POST['providerAddress'];

// Kiểm tra xem các trường có rỗng hay không
if (empty($providerName) || empty($providerPhone) || empty($providerAddress)) {
    $response['error'] = "Hãy cung cấp đầy đủ tên, số điện thoại và địa chỉ!";
    echo json_encode($response);
    exit();
}

// Kiểm tra định dạng số điện thoại (10 chữ số, bắt đầu bằng 0)
if (!preg_match('/^0\d{9}$/', $providerPhone)) {
    $response['error'] = "Số điện thoại không hợp lệ! Số điện thoại phải có 10 chữ số và bắt đầu bằng 0.";
    echo json_encode($response);
    exit();
}

// Tạo câu lệnh INSERT (không cần mancc vì nó tự động tăng)
$stmt = $conn->prepare("INSERT INTO nhacungcap (ten, sdt, diachi) VALUES (?, ?, ?)");

if ($stmt === false) {
    $response['error'] = 'Failed to prepare statement';
    echo json_encode($response);
    exit();
}

$stmt->bind_param("sss", $providerName, $providerPhone, $providerAddress);

if ($stmt->execute()) {
    $response['success'] = true;
    $response['message'] = "Nhà cung cấp được thêm thành công!";
} else {
    $response['error'] = $stmt->error;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
