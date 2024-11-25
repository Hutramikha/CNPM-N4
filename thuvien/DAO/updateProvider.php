<?php
include './database/connect.php';
header('Content-Type: application/json');

if (isset($_POST['id'], $_POST['column'], $_POST['value'])) {
    $id = $_POST['id'];
    $column = $_POST['column'];
    $value = $_POST['value'];

    // Danh sách các cột được phép cập nhật để ngăn ngừa SQL Injection
    $allowed_columns = ['ten', 'sdt', 'diachi'];
    if (!in_array($column, $allowed_columns)) {
        echo "error";
        exit();
    }

    // Chuẩn bị và thực thi câu lệnh SQL để cập nhật
    $stmt = $conn->prepare("UPDATE nhacungcap SET $column = ? WHERE mancc = ?");
    $stmt->bind_param("si", $value, $id);
    $stmt->execute();

    // Kiểm tra xem có hàng nào bị ảnh hưởng không
    if ($stmt->affected_rows > 0) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
} else {
    echo "error";
}
$conn->close();
?>
