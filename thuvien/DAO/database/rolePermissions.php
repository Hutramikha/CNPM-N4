<?php
include './connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $username = $_GET['username'] ?? null;

    if (!$username) {
        echo json_encode(['error' => 'Username không hợp lệ.']);
        exit;
    }

    try {
        $query = "
            SELECT rp.machucnang 
            FROM taikhoan ur
            JOIN chitietquyen rp 
                ON ur.maquyen = rp.maquyen
            WHERE ur.tendangnhap = ? 
            AND rp.hoatdong = TRUE
            AND rp.hanhdong = 'Truy cập'
        ";

        $stmt = $connect->prepare($query);

        $stmt->bind_param("s", $username);

        $stmt->execute();
        $result = $stmt->get_result();

        $permissions = [];
        while ($row = $result->fetch_assoc()) {
            $permissions[] = $row['machucnang'];
        }

        echo json_encode(['permissions' => $permissions]);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    } finally {
        $stmt->close();
        $connect->close();
    }
}
