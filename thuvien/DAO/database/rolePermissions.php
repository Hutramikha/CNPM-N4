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
            SELECT rp.machucnang, rp.hanhdong, rp.hoatdong
            FROM taikhoan ur
            JOIN chitietquyen rp 
                ON ur.maquyen = rp.maquyen
            WHERE ur.tendangnhap = ?
        ";

        $stmt = $connect->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        $permissions = [];
        $accessPermissions = [];

        while ($row = $result->fetch_assoc()) {
            // Phân loại quyền 'Truy cập'
            if ($row['hanhdong'] === 'Truy cập') {
                if ($row['hoatdong']) {
                    $accessPermissions[] = $row['machucnang'];
                }
            } else {
                // Chi tiết quyền thêm/sửa/xóa/lưu/hủy
                $permissions[$row['machucnang']][$row['hanhdong']] = $row['hoatdong'];
            }
        }

        echo json_encode([
            'accessPermissions' => $accessPermissions,
            'actionPermissions' => $permissions
        ]);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    } finally {
        $stmt->close();
        $connect->close();
    }
}
?>
