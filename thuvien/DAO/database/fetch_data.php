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

// Thể loại
$sql_tl = 'SELECT * FROM theloai';
$result_tl = $connect->query($sql_tl);

$list_theloai = array();

if ($result_tl->num_rows > 0) {
    while ($row = $result_tl->fetch_assoc()) {
        $list_theloai[] = $row;
    }
}

// Nhà xuất bản
$sql_nxb = 'SELECT * FROM nhaxuatban';
$result_nxb = $connect->query($sql_nxb);

$list_nhaxuatban = array();

if ($result_nxb->num_rows > 0) {
    while ($row = $result_nxb->fetch_assoc()) {
        $list_nhaxuatban[] = $row;
    }
}

// Tác giả
$sql_tg = 'SELECT * FROM tacgia';
$result_tg = $connect->query($sql_tg);

$list_tacgia = array();

if ($result_tg->num_rows > 0) {
    while ($row = $result_tg->fetch_assoc()) {
        $list_tacgia[] = $row;
    }
}

// Tình trạng sách
$sql_tts = 'SELECT * FROM tinhtrangsach';
$result_tts = $connect->query($sql_tts);

$list_tinhtrangsach = array();

if ($result_tts->num_rows > 0) {
    while ($row = $result_tts->fetch_assoc()) {
        $list_tinhtrangsach[] = $row;
    }
}

// Loại độc giả
$sql_ldg = 'SELECT * FROM loaidocgia';
$result_ldg = $connect->query($sql_ldg);

$list_loaidocgia = array();

if ($result_ldg->num_rows > 0) {
    while ($row = $result_ldg->fetch_assoc()) {
        $list_loaidocgia[] = $row;
    }
}

// Hình thức phạt
$sql_htp = 'SELECT * FROM hinhthucphat';
$result_htp = $connect->query($sql_htp);

$list_hinhthucphat = array();

if ($result_htp->num_rows > 0) {
    while ($row = $result_htp->fetch_assoc()) {
        $list_hinhthucphat[] = $row;
    }
}

// Nhà cung cấp
$sql_ncc = 'SELECT * FROM nhacungcap';
$result_ncc = $connect->query($sql_ncc);

$list_nhacungcap = array();

if ($result_ncc->num_rows > 0) {
    while ($row = $result_ncc->fetch_assoc()) {
        $list_nhacungcap[] = $row;
    }
}

// Phiếu nhập
$sql_pn = 'SELECT * FROM phieunhap';
$result_pn = $connect->query($sql_pn);

$list_phieunhap = array();

if ($result_pn->num_rows > 0) {
    while ($row = $result_pn->fetch_assoc()) {
        $list_phieunhap[] = $row;
    }
}

// Phiếu mượn
$sql_pm = 'SELECT * FROM phieumuon';
$result_pm = $connect->query($sql_pm);

$list_phieumuon = array();

if ($result_pm->num_rows > 0) {
    while ($row = $result_pm->fetch_assoc()) {
        $list_phieumuon[] = $row;
    }
}

// Phiếu trả
$sql_pt = 'SELECT * FROM phieutra';
$result_pt = $connect->query($sql_pt);

$list_phieutra = array();

if ($result_pt->num_rows > 0) {
    while ($row = $result_pt->fetch_assoc()) {
        $list_phieutra[] = $row;
    }
}

// Quyền
$sql_quyen = 'SELECT * FROM quyen';
$result_quyen = $connect->query($sql_quyen);

$list_quyen = array();

if ($result_quyen->num_rows > 0) {
    while ($row = $result_quyen->fetch_assoc()) {
        $list_quyen[] = $row;
    }
}

// Chức năng
$sql_chucnang = 'SELECT * FROM chucnang';
$result_chucnang = $connect->query($sql_chucnang);

$list_chucnang = array();

if ($result_chucnang->num_rows > 0) {
    while ($row = $result_chucnang->fetch_assoc()) {
        $list_chucnang[] = $row;
    }
}

// ======================================================== Fetch có Điều kiện ====================================================================



// ================================================ echo json encode ============================================================

$response = array(
    'list_sach' =>  $list_sach,
    'list_theloai' =>  $list_theloai,
    'list_nhaxuatban' =>  $list_nhaxuatban,
    'list_tacgia' =>  $list_tacgia,
    'list_tinhtrangsach' =>  $list_tinhtrangsach,
    'list_docgia' =>  $list_docgia,
    'list_loaidocgia' =>  $list_loaidocgia,
    'list_nhanvien' =>  $list_nhanvien,
    'list_taikhoan' =>  $list_taikhoan,
    'list_hinhthucphat' =>  $list_hinhthucphat,
    'list_nhacungcap' =>  $list_nhacungcap,
    'list_phieunhap' =>  $list_phieunhap,
    'list_phieumuon' =>  $list_phieumuon,
    'list_phieutra' =>  $list_phieutra,
    'list_quyen' =>  $list_quyen,
    'list_chucnang' =>  $list_chucnang,
);

echo json_encode($response);

?>