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
$sql_dg = 'SELECT *
            FROM docgia
            LEFT JOIN loaidocgia ON docgia.maloaidocgia = loaidocgia.maloaidocgia;';
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

// tài khoản nhân viên
$sql_tk_nv = 'SELECT *
              FROM taikhoan tk
              JOIN nhanvien nv ON tk.tendangnhap = nv.matk;';
$result_tk_nv = $connect->query($sql_tk_nv);

$list_taikhoan_nhanvien = array();

if ($result_tk_nv->num_rows > 0) {
    while ($row = $result_tk_nv->fetch_assoc()) {
        $list_taikhoan_nhanvien[] = $row;
    }
}

// tài khoản độc giả
$sql_tk_dg = 'SELECT *
              FROM taikhoan tk
              JOIN docgia dg ON tk.tendangnhap = dg.matk;';
$result_tk_dg = $connect->query($sql_tk_dg);

$list_taikhoan_docgia = array();

if ($result_tk_dg->num_rows > 0) {
    while ($row = $result_tk_dg->fetch_assoc()) {
        $list_taikhoan_docgia[] = $row;
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
$sql_pn = 'SELECT *
            FROM phieunhap pn
            LEFT JOIN nhacungcap ncc ON pn.mancc = ncc.mancc;';
$result_pn = $connect->query($sql_pn);

$list_phieunhap = array();

if ($result_pn->num_rows > 0) {
    while ($row = $result_pn->fetch_assoc()) {
        $list_phieunhap[] = $row;
    }
}

// Phiếu mượn
$sql_pm = 'SELECT * , dg.ten AS ten_docgia, nv.ten AS ten_nhanvien
        FROM phieumuon pm
        LEFT JOIN docgia dg ON pm.madg = dg.madg
        LEFT JOIN nhanvien nv ON pm.manv = nv.manv;';
$result_pm = $connect->query($sql_pm);

$list_phieumuon = array();

if ($result_pm->num_rows > 0) {
    while ($row = $result_pm->fetch_assoc()) {
        $list_phieumuon[] = $row;
    }
}

// Phiếu trả
$sql_pt = 'SELECT * , dg.ten AS ten_docgia, nv.ten AS ten_nhanvien
        FROM phieutra pt
        LEFT JOIN docgia dg ON pt.madg = dg.madg
        LEFT JOIN nhanvien nv ON pt.manv = nv.manv;';
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

//  nhân viên ko tài khoản
$sql_nv_ko_tk = 'SELECT *
                FROM nhanvien
                WHERE matk IS NULL;';
$result_nv_ko_tk = $connect->query($sql_nv_ko_tk);

$list_nhanvien_ko_tk = array();

if ($result_nv_ko_tk->num_rows > 0) {
    while ($row = $result_nv_ko_tk->fetch_assoc()) {
        $list_nhanvien_ko_tk[] = $row;
    }
}

//  chi tiết sách đã mượn
$sql_chitiet_sach_da_muon = 'SELECT * , dg.ten AS ten_docgia, nv.ten AS ten_nhanvien
                            FROM chitietsach cs
                            JOIN chitietphieumuon cpm ON cs.mavach = cpm.mavach
                            JOIN phieumuon pm ON cpm.mapm = pm.mapm
                            JOIN docgia dg ON pm.madg = dg.madg
                            JOIN nhanvien nv ON pm.manv = nv.manv
                            WHERE cs.trangthai = 1;';
$result_chitiet_sach_da_muon = $connect->query($sql_chitiet_sach_da_muon);

$list_chitiet_sach_da_muon = array();

if ($result_chitiet_sach_da_muon->num_rows > 0) {
    while ($row = $result_chitiet_sach_da_muon->fetch_assoc()) {
        $list_chitiet_sach_da_muon[] = $row;
    }
}

//  chi tiết sách (chưa sắp xếp)
$list_chitiet_sach_xem = array();
if(isset($_POST['masach_xemchitiet'])) {
$masach_xemchitiet = $_POST['masach_xemchitiet'];

$stmt = $connect->prepare("SELECT * FROM chitietsach WHERE masach = ?");
$stmt->bind_param("i", $masach_xemchitiet); // 'i' cho kiểu integer
$stmt->execute();
$result_masach_xemchitiet = $stmt->get_result();

if ($result_masach_xemchitiet->num_rows > 0) {
    while ($row = $result_masach_xemchitiet->fetch_assoc()) {
        $list_chitiet_sach_xem[] = $row;
    }
}
}

//  chi tiết phiếu nhập
$list_chitiet_phieu_nhap_xem = array();
if(isset($_POST['ma_phieu_nhap'])) {
$ma_phieu_nhap = $_POST['ma_phieu_nhap'];

$stmt = $connect->prepare("SELECT * FROM chitietphieunhap WHERE mapn = ?");
$stmt->bind_param("i", $ma_phieu_nhap); // 'i' cho kiểu integer
$stmt->execute();
$result_ma_phieu_nhap = $stmt->get_result();

if ($result_ma_phieu_nhap->num_rows > 0) {
    while ($row = $result_ma_phieu_nhap->fetch_assoc()) {
        $list_chitiet_phieu_nhap_xem[] = $row;
    }
}
}

//  chi tiết phiếu mượn
$list_chitiet_phieu_muon_xem = array();
if(isset($_POST['ma_phieu_muon'])) {
$ma_phieu_muon = $_POST['ma_phieu_muon'];

$stmt = $connect->prepare("SELECT * FROM chitietphieumuon WHERE mapm = ?");
$stmt->bind_param("i", $ma_phieu_muon); // 'i' cho kiểu integer
$stmt->execute();
$result_ma_phieu_muon = $stmt->get_result();

if ($result_ma_phieu_muon->num_rows > 0) {
    while ($row = $result_ma_phieu_muon->fetch_assoc()) {
        $list_chitiet_phieu_muon_xem[] = $row;
    }
}
}

//  chi tiết phiếu trả
$list_chitiet_phieu_tra_xem = array();
if(isset($_POST['ma_phieu_tra'])) {
$ma_phieu_tra = $_POST['ma_phieu_tra'];

$stmt = $connect->prepare("SELECT * FROM chitietphieutra WHERE mapt = ?");
$stmt->bind_param("i", $ma_phieu_tra); // 'i' cho kiểu integer
$stmt->execute();
$result_ma_phieu_tra = $stmt->get_result();

if ($result_ma_phieu_tra->num_rows > 0) {
    while ($row = $result_ma_phieu_tra->fetch_assoc()) {
        $list_chitiet_phieu_tra_xem[] = $row;
    }
}
}

// ======================================================== Fetch cho tìm kiếm ====================================================================

// =========================== Tìm kiếm Sách ===>
// Lấy từ khóa tìm kiếm từ URL
$search_sach = isset($_GET['search_sach']) ? $_GET['search_sach'] : '';

// SQL để tìm kiếm sách theo tên sách và mã sách
$sql_timkiem_sach = "SELECT * FROM sach WHERE masach LIKE ? OR tensach LIKE ?";
$stmt = $connect->prepare($sql_timkiem_sach);

// Thêm ký tự % vào cả hai đầu của từ khóa tìm kiếm
$search_sach_param = "%$search_sach%";
$stmt->bind_param('is', $search_sach_param, $search_sach_param);
$stmt->execute();
$result_timkiem_sach = $stmt->get_result();

$list_timkiem_sach = array();

if ($result_timkiem_sach->num_rows > 0) {
    while ($row = $result_timkiem_sach->fetch_assoc()) {
        $list_timkiem_sach[] = $row;
    }
}


// =========================== Tìm kiếm nhân viên ===>
$search_nhanvien = isset($_GET['search_nhanvien']) ? $_GET['search_nhanvien'] : '';

$sql_timkiem_nhanvien = "SELECT * FROM nhanvien WHERE manv LIKE ? OR matk LIKE ? OR ten LIKE ?";
$stmt = $connect->prepare($sql_timkiem_nhanvien);

$search_nhanvien_param = "%$search_nhanvien%";
$stmt->bind_param('iss', $search_nhanvien_param, $search_nhanvien_param, $search_nhanvien_param);
$stmt->execute();
$result_timkiem_nhanvien = $stmt->get_result();

$list_timkiem_nhanvien = array();

if ($result_timkiem_nhanvien->num_rows > 0) {
    while ($row = $result_timkiem_nhanvien->fetch_assoc()) {
        $list_timkiem_nhanvien[] = $row;
    }
}

// =========================== Tìm kiếm độc giả ===>
$search_docgia = isset($_GET['search_docgia']) ? $_GET['search_docgia'] : '';

$sql_timkiem_docgia = "SELECT * FROM docgia WHERE madg LIKE ? OR matk LIKE ? OR ten LIKE ?";
$stmt = $connect->prepare($sql_timkiem_docgia);

$search_docgia_param = "%$search_docgia%";
$stmt->bind_param('iss', $search_docgia_param, $search_docgia_param, $search_docgia_param);
$stmt->execute();
$result_timkiem_docgia = $stmt->get_result();

$list_timkiem_docgia = array();

if ($result_timkiem_docgia->num_rows > 0) {
    while ($row = $result_timkiem_docgia->fetch_assoc()) {
        $list_timkiem_docgia[] = $row;
    }
}

// =========================== Tìm kiếm Phiếu nhập ===>
$search_phieunhap = isset($_GET['search_phieunhap']) ? $_GET['search_phieunhap'] : '';

$sql_timkiem_phieunhap = "SELECT *
                        FROM phieunhap pn
                        LEFT JOIN nhacungcap ncc ON pn.mancc = ncc.mancc
                        WHERE pn.mapn LIKE ? OR ncc.mancc LIKE ?";

$stmt = $connect->prepare($sql_timkiem_phieunhap);

$search_phieunhap_param = "%$search_phieunhap%";
$stmt->bind_param('ii', $search_phieunhap_param, $search_phieunhap_param);
$stmt->execute();
$result_timkiem_phieunhap = $stmt->get_result();

$list_timkiem_phieunhap = array();

if ($result_timkiem_phieunhap->num_rows > 0) {
    while ($row = $result_timkiem_phieunhap->fetch_assoc()) {
        $list_timkiem_phieunhap[] = $row;
    }
}
// =========================== Tìm kiếm Phiếu mượn ===>
$search_phieumuon = isset($_GET['search_phieumuon']) ? $_GET['search_phieumuon'] : '';

$sql_timkiem_pm = "SELECT *, dg.ten AS ten_docgia, nv.ten AS ten_nhanvien
                   FROM phieumuon pm
                   LEFT JOIN docgia dg ON pm.madg = dg.madg
                   LEFT JOIN nhanvien nv ON pm.manv = nv.manv
                   WHERE pm.mapm LIKE ? OR pm.madg LIKE ? OR pm.manv LIKE ? 
                   OR dg.ten LIKE ? OR nv.ten LIKE ?";

$stmt = $connect->prepare($sql_timkiem_pm);

$search_phieumuon_param = "%$search_phieumuon%";
$stmt->bind_param('iiiss', $search_phieumuon_param, $search_phieumuon_param, $search_phieumuon_param, $search_phieumuon_param, $search_phieumuon_param);
$stmt->execute();
$result_timkiem_phieumuon = $stmt->get_result();

$list_timkiem_phieumuon = array();

if ($result_timkiem_phieumuon->num_rows > 0) {
    while ($row = $result_timkiem_phieumuon->fetch_assoc()) {
        $list_timkiem_phieumuon[] = $row;
    }
}

// =========================== Tìm kiếm Phiếu trả ===>
// Tìm kiếm phiếu trả
$search_phieutra = isset($_GET['search_phieutra']) ? $_GET['search_phieutra'] : '';

$sql_timkiem_pt = "SELECT *, dg.ten AS ten_docgia, nv.ten AS ten_nhanvien
                   FROM phieutra pt
                   LEFT JOIN docgia dg ON pt.madg = dg.madg
                   LEFT JOIN nhanvien nv ON pt.manv = nv.manv
                   WHERE pt.mapt LIKE ? OR pt.madg LIKE ? OR pt.manv LIKE ? 
                   OR dg.ten LIKE ? OR nv.ten LIKE ?";

$stmt = $connect->prepare($sql_timkiem_pt);

$search_phieutra_param = "%$search_phieutra%";
$stmt->bind_param('iiiss', $search_phieutra_param, $search_phieutra_param, $search_phieutra_param, $search_phieutra_param, $search_phieutra_param);
$stmt->execute();
$result_timkiem_phieutra = $stmt->get_result();

$list_timkiem_phieutra = array();

if ($result_timkiem_phieutra->num_rows > 0) {
    while ($row = $result_timkiem_phieutra->fetch_assoc()) {
        $list_timkiem_phieutra[] = $row;
    }
}

// Tìm kiếm chi tiết sách đã mượn
$search_ct_sach_damuon = isset($_GET['search_ct_sach_damuon']) ? $_GET['search_ct_sach_damuon'] : '';

$sql_timkiem_chitiet_sach_da_muon = "SELECT *, dg.ten AS ten_docgia, nv.ten AS ten_nhanvien
                                    FROM chitietsach cs
                                    JOIN chitietphieumuon cpm ON cs.mavach = cpm.mavach
                                    JOIN phieumuon pm ON cpm.mapm = pm.mapm
                                    JOIN docgia dg ON pm.madg = dg.madg
                                    JOIN nhanvien nv ON pm.manv = nv.manv
                                    WHERE cs.trangthai = 1 
                                        AND (cs.mavach LIKE ? OR pm.mapm LIKE ? OR pm.madg LIKE ? 
                                            OR pm.manv LIKE ? OR dg.ten LIKE ? OR nv.ten LIKE ?)";

$stmt = $connect->prepare($sql_timkiem_chitiet_sach_da_muon);

$search_ct_sach_damuon_param = "%$search_ct_sach_damuon%";
$stmt->bind_param('iiiiss', $search_ct_sach_damuon_param, $search_ct_sach_damuon_param, $search_ct_sach_damuon_param, $search_ct_sach_damuon_param, $search_ct_sach_damuon_param, $search_ct_sach_damuon_param);
$stmt->execute();
$result_timkiem_ct_sach_damuon = $stmt->get_result();

$list_timkiem_ct_sach_da_muon = array();

if ($result_timkiem_ct_sach_damuon->num_rows > 0) {
    while ($row = $result_timkiem_ct_sach_damuon->fetch_assoc()) {
        $list_timkiem_ct_sach_da_muon[] = $row;
    }
}

// =========================== Tìm kiếm tài khoản ===>
// Tìm TK nhân viên
$search_tk_nhanvien = isset($_GET['search_tk_nhanvien']) ? $_GET['search_tk_nhanvien'] : '';

$sql_timkiem_tk_nhanvien = "SELECT *
              FROM taikhoan tk
              JOIN nhanvien nv ON tk.tendangnhap = nv.matk
              WHERE tk.tendangnhap LIKE ?";

$stmt = $connect->prepare($sql_timkiem_tk_nhanvien);

$search_tk_nhanvien_param = "%$search_tk_nhanvien%";
$stmt->bind_param('s', $search_tk_nhanvien_param);
$stmt->execute();
$result_timkiem_tk_nhanvien = $stmt->get_result();

$list_timkiem_tk_nhanvien = array();

if ($result_timkiem_tk_nhanvien->num_rows > 0) {
    while ($row = $result_timkiem_tk_nhanvien->fetch_assoc()) {
        $list_timkiem_tk_nhanvien[] = $row;
    }
}

// Tìm TK độc giả
$search_tk_docgia = isset($_GET['search_tk_docgia']) ? $_GET['search_tk_docgia'] : '';

$sql_timkiem_tk_docgia = "SELECT *
              FROM taikhoan tk
              JOIN docgia dg ON tk.tendangnhap = dg.matk
              WHERE tk.tendangnhap LIKE ?";

$stmt = $connect->prepare($sql_timkiem_tk_docgia);

$search_tk_docgia_param = "%$search_tk_docgia%";
$stmt->bind_param('s', $search_tk_docgia_param);
$stmt->execute();
$result_timkiem_tk_docgia = $stmt->get_result();

$list_timkiem_tk_docgia = array();

if ($result_timkiem_tk_docgia->num_rows > 0) {
    while ($row = $result_timkiem_tk_docgia->fetch_assoc()) {
        $list_timkiem_tk_docgia[] = $row;
    }
}


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
    'list_nhanvien_ko_tk' => $list_nhanvien_ko_tk,
    'list_taikhoan_nhanvien' =>  $list_taikhoan_nhanvien,
    'list_taikhoan_docgia' =>  $list_taikhoan_docgia,
    'list_hinhthucphat' =>  $list_hinhthucphat,
    'list_nhacungcap' =>  $list_nhacungcap,
    'list_phieunhap' =>  $list_phieunhap,
    'list_phieumuon' =>  $list_phieumuon,
    'list_phieutra' =>  $list_phieutra,
    'list_quyen' =>  $list_quyen,
    'list_chucnang' =>  $list_chucnang,
    'list_chitiet_sach_da_muon' => $list_chitiet_sach_da_muon,
    'list_chitiet_sach_xem' => $list_chitiet_sach_xem,
    'list_chitiet_phieu_nhap_xem' => $list_chitiet_phieu_nhap_xem,
    'list_chitiet_phieu_muon_xem' => $list_chitiet_phieu_muon_xem,
    'list_chitiet_phieu_tra_xem' => $list_chitiet_phieu_tra_xem,
    'list_timkiem_sach' => $list_timkiem_sach,
    'list_timkiem_docgia' => $list_timkiem_docgia,
    'list_timkiem_nhanvien' => $list_timkiem_nhanvien,
    'list_timkiem_phieunhap' => $list_timkiem_phieunhap,
    'list_timkiem_tk_nhanvien' => $list_timkiem_tk_nhanvien,
    'list_timkiem_tk_docgia' => $list_timkiem_tk_docgia,
    'list_timkiem_phieumuon' => $list_timkiem_phieumuon,
    'list_timkiem_phieutra' => $list_timkiem_phieutra,
    'list_timkiem_ct_sach_da_muon' => $list_timkiem_ct_sach_da_muon,
);

echo json_encode($response);

$stmt->close();
$connect->close();

?>