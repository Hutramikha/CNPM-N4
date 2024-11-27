<?php 
 require './connect.php';

// Sách
$sql_sach = 'SELECT * FROM sach';
$result_sach = $connect->query($sql_sach);

$list_sach = array();

if ($result_sach->num_rows > 0) {
    while ($row = $result_sach->fetch_assoc()) {
        $list_sach[] = $row;
    }
}

//  độc giả
$sql_dg = 'SELECT * FROM docgia';
$result_dg = $connect->query($sql_dg);

$list_docgia = array();

if ($result_dg->num_rows > 0) {
    while ($row = $result_dg->fetch_assoc()) {
        $list_docgia[] = $row;
    }
}

//  nhân viên
$sql_nv = 'SELECT * FROM nhanvien';
$result_nv = $connect->query($sql_nv);

$list_nhanvien = array();

if ($result_nv->num_rows > 0) {
    while ($row = $result_nv->fetch_assoc()) {
        $list_nhanvien[] = $row;
    }
}

// tài khoản
$sql_tk = 'SELECT * FROM taikhoan';
$result_tk = $connect->query($sql_tk);

$list_taikhoan = array();

if ($result_tk->num_rows > 0) {
    while ($row = $result_tk->fetch_assoc()) {
        $list_taikhoan[] = $row;
    }
}




// ======================================================== Fetch có Điều kiện ====================================================================



// ================================================ echo json encode ============================================================

$response = array(
    'list_sach' =>  $list_sach,
    'list_dg' =>  $list_docgia,
    'list_nv' =>  $list_nhanvien,
    'list_tk' =>  $list_taikhoan,
);

echo json_encode($response);

?>