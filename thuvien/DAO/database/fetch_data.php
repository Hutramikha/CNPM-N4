<?php 
 require './connect.php';


// ================================================ HÀM  ============================================================ 

// Hàm random cho tạo tài khoản
function random_string($length, $type) {
    if ($type == 'numbers') {
        $chars = '0123456789';
    } elseif ($type == 'lowercase') {
        $chars = 'abcdefghijklmnopqrstuvwxyz';
    } elseif ($type == 'uppercase') {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    } elseif ($type == 'special') {
        $chars = '@#$%&*!';
    } else {
        return '';
    }

    $result = '';
    for ($i = 0; $i < $length; $i++) {
        $result .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $result;
}

// Hàm tạo tài khoản
function capTaikhoan($manv, $connect, &$list_tao_taikhoan_nv) {
    // Tạo tên đăng nhập
    $tendangnhap = 'ttda' . random_string(4, 'numbers');

    // Tạo mật khẩu
    $matkhau = random_string(5, 'numbers') . random_string(1, 'lowercase') . random_string(1, 'uppercase') . random_string(1, 'special');

    // Maquyen là 1
    $maquyen = 1;

    // Ngày tạo
    $ngaytao = date('Y-m-d');

    // Chèn dữ liệu vào bảng taikhoan
    $stmt = $connect->prepare("INSERT INTO taikhoan (tendangnhap, matkhau, maquyen, ngaytao, trangthai) VALUES (?, ?, ?, ?, ?)");
    $trangthai = 1; // Giả định trạng thái là 1
    $stmt->bind_param("ssisi", $tendangnhap, $matkhau, $maquyen, $ngaytao, $trangthai);

    if ($stmt->execute()) {
        // Cập nhật matk trong bảng nhanvien
        $stmt2 = $connect->prepare("UPDATE nhanvien SET matk = ? WHERE manv = ?");
        $stmt2->bind_param("si", $tendangnhap, $manv);
        $stmt2->execute();
        $stmt2->close();
        
        $list_tao_taikhoan_nv[] = array(
            "status" => "success",
            "message" => "Tài khoản đã được tạo thành công: $tendangnhap"
        );
    } else {
        $list_tao_taikhoan_nv[] = array(
            "status" => "error",
            "message" => "Lỗi: " . $stmt->error
        );
    }
}


// ================================================ Fetch Data ============================================================ 
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
$search_sach = isset($_GET['search_sach']) ? $_GET['search_sach'] : '';

if (is_numeric($search_sach)) {
    // Nếu là số, sử dụng truy vấn tìm kiếm chính xác
    $sql_timkiem_sach = "SELECT * FROM sach WHERE masach = ?"; // So sánh chính xác
    $stmt = $connect->prepare($sql_timkiem_sach);
    $stmt->bind_param('i', $search_sach); // 'i' cho kiểu integer
} else {
    // Nếu không phải là số, sử dụng LIKE cho chuỗi
    $sql_timkiem_sach = "SELECT * FROM sach WHERE tensach LIKE ?"; // Tìm kiếm theo tên sách
    $stmt = $connect->prepare($sql_timkiem_sach);
    $search_sach_param = "%$search_sach%";
    $stmt->bind_param('s', $search_sach_param); // 's' cho kiểu string
}
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

if (is_numeric($search_nhanvien)) {
    // Nếu là số, tìm kiếm theo manv
    $sql_timkiem_nhanvien = "SELECT * FROM nhanvien WHERE manv = ?";
    $stmt = $connect->prepare($sql_timkiem_nhanvien);
    $stmt->bind_param('i', $search_nhanvien); // 'i' cho integer
} else {
    // Nếu không phải là số, tìm kiếm theo matk và ten
    $sql_timkiem_nhanvien = "SELECT * FROM nhanvien WHERE matk LIKE ? OR ten LIKE ?";
    $stmt = $connect->prepare($sql_timkiem_nhanvien);
    $search_nhanvien_param = "%$search_nhanvien%"; // Thêm % cho chuỗi
    $stmt->bind_param('ss', $search_nhanvien_param, $search_nhanvien_param); // 'ss' cho string
}

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

if (is_numeric($search_docgia)) {
    // Nếu là số, tìm kiếm theo madg
    $sql_timkiem_docgia = "SELECT docgia.*, loaidocgia.tenloaidocgia 
                            FROM docgia 
                            LEFT JOIN loaidocgia ON docgia.maloaidocgia = loaidocgia.maloaidocgia 
                            WHERE docgia.madg = ?";
    $stmt = $connect->prepare($sql_timkiem_docgia);
    $stmt->bind_param('i', $search_docgia); // 'i' cho integer
} else {
    // Nếu không phải là số, tìm kiếm theo matk và ten
    $sql_timkiem_docgia = "SELECT docgia.*, loaidocgia.tenloaidocgia 
                            FROM docgia 
                            LEFT JOIN loaidocgia ON docgia.maloaidocgia = loaidocgia.maloaidocgia 
                            WHERE docgia.matk LIKE ? OR docgia.ten LIKE ?";
    $stmt = $connect->prepare($sql_timkiem_docgia);
    $search_docgia_param = "%$search_docgia%"; // Thêm % cho chuỗi
    $stmt->bind_param('ss', $search_docgia_param, $search_docgia_param); // 'ss' cho string
}

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

// Thay đổi kiểu tham số từ 'ii' thành 'ss' vì chúng ta đang sử dụng chuỗi
$search_phieunhap_param = "%$search_phieunhap%";
$stmt->bind_param('ss', $search_phieunhap_param, $search_phieunhap_param); // 'ss' cho chuỗi
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

if (is_numeric($search_phieumuon)) {
    $sql_timkiem_pm = "SELECT *, dg.ten AS ten_docgia, nv.ten AS ten_nhanvien
                       FROM phieumuon pm
                       LEFT JOIN docgia dg ON pm.madg = dg.madg
                       LEFT JOIN nhanvien nv ON pm.manv = nv.manv
                      WHERE pm.mapm = ? OR dg.madg = ? OR nv.manv = ?";
    $stmt = $connect->prepare($sql_timkiem_pm);
    $stmt->bind_param('iii',$search_phieumuon,$search_phieumuon,$search_phieumuon);
} else {
    $sql_timkiem_pm = "SELECT *, dg.ten AS ten_docgia, nv.ten AS ten_nhanvien
                       FROM phieumuon pm
                       LEFT JOIN docgia dg ON pm.madg = dg.madg
                       LEFT JOIN nhanvien nv ON pm.manv = nv.manv
                       WHERE dg.ten LIKE ? OR nv.ten LIKE ?";
    $stmt = $connect->prepare($sql_timkiem_pm);
    $search_phieumuon_param = "%$search_phieumuon%";
    $stmt->bind_param('ss',$search_phieumuon_param,$search_phieumuon_param);
}

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

if (is_numeric($search_phieutra)) {
    // Tìm kiếm theo mã phiếu trả, mã độc giả, hoặc mã nhân viên
    $sql_timkiem_pt = "SELECT *, dg.ten AS ten_docgia, nv.ten AS ten_nhanvien
                       FROM phieutra pt
                       LEFT JOIN docgia dg ON pt.madg = dg.madg
                       LEFT JOIN nhanvien nv ON pt.manv = nv.manv
                       WHERE pt.mapt = ? OR pt.madg = ? OR pt.manv = ?";
    
    $stmt = $connect->prepare($sql_timkiem_pt);
    $stmt->bind_param('iii', $search_phieutra, $search_phieutra, $search_phieutra);
} else {
    // Tìm kiếm theo tên độc giả hoặc tên nhân viên
    $sql_timkiem_pt = "SELECT *, dg.ten AS ten_docgia, nv.ten AS ten_nhanvien
                       FROM phieutra pt
                       LEFT JOIN docgia dg ON pt.madg = dg.madg
                       LEFT JOIN nhanvien nv ON pt.manv = nv.manv
                       WHERE dg.ten LIKE ? OR nv.ten LIKE ?";
    
    $stmt = $connect->prepare($sql_timkiem_pt);
    $search_phieutra_param = "%$search_phieutra%";
    $stmt->bind_param('ss', $search_phieutra_param, $search_phieutra_param);
}

$stmt->execute();
$result_timkiem_phieutra = $stmt->get_result();

$list_timkiem_phieutra = array();

if ($result_timkiem_phieutra->num_rows > 0) {
    while ($row = $result_timkiem_phieutra->fetch_assoc()) {
        $list_timkiem_phieutra[] = $row;
    }
}

//========================= Tìm kiếm chi tiết sách đã mượn ========>
$search_ct_sach_damuon = isset($_GET['search_phieutra']) ? $_GET['search_phieutra'] : '';

if (is_numeric($search_ct_sach_damuon)) {
    // Tìm kiếm theo mã vạch, mã phiếu mượn hoặc mã độc giả
    $sql_timkiem_chitiet_sach_da_muon = "SELECT *, dg.ten AS ten_docgia, nv.ten AS ten_nhanvien
                                          FROM chitietsach cs
                                          JOIN chitietphieumuon cpm ON cs.mavach = cpm.mavach
                                          JOIN phieumuon pm ON cpm.mapm = pm.mapm
                                          JOIN docgia dg ON pm.madg = dg.madg
                                          JOIN nhanvien nv ON pm.manv = nv.manv
                                          WHERE cs.trangthai = 1 
                                          AND (cs.mavach = ? OR pm.mapm = ? OR pm.madg = ? OR pm.manv = ?)";
    
    $stmt = $connect->prepare($sql_timkiem_chitiet_sach_da_muon);
    $stmt->bind_param('iiii', $search_ct_sach_damuon, $search_ct_sach_damuon, $search_ct_sach_damuon, $search_ct_sach_damuon);
} else {
    // Tìm kiếm theo tên độc giả hoặc tên nhân viên
    $sql_timkiem_chitiet_sach_da_muon = "SELECT *, dg.ten AS ten_docgia, nv.ten AS ten_nhanvien
                                          FROM chitietsach cs
                                          JOIN chitietphieumuon cpm ON cs.mavach = cpm.mavach
                                          JOIN phieumuon pm ON cpm.mapm = pm.mapm
                                          JOIN docgia dg ON pm.madg = dg.madg
                                          JOIN nhanvien nv ON pm.manv = nv.manv
                                          WHERE cs.trangthai = 1 
                                          AND (dg.ten LIKE ? OR nv.ten LIKE ?)";
    
    $stmt = $connect->prepare($sql_timkiem_chitiet_sach_da_muon);
    $search_ct_sach_damuon_param = "%$search_ct_sach_damuon%"; // Thêm % cho chuỗi
    $stmt->bind_param('ss', $search_ct_sach_damuon_param, $search_ct_sach_damuon_param);
}

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
$search_tk_nhanvien = isset($_GET['search_tk']) ? $_GET['search_tk'] : '';

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
$search_tk_docgia = isset($_GET['search_tk']) ? $_GET['search_tk'] : '';

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

// ================================================= ADD ==============================================================

// Gọi hàm capTaikhoan nếu có manv được gửi : Tạo Tài Khoản nhân viên
$list_tao_taikhoan_nv = array();
if (isset($_POST['manvtaotk'])) {
    $manv = $_POST['manvtaotk'];
    capTaikhoan($manv, $connect, $list_tao_taikhoan_nv);
} 

// ================================================ UPDATE ============================================================

// Khóa : Mở tài khoản
if (isset($_POST['tendangnhap']) && isset($_POST['trangthai'])) {
    $tendangnhap = $_POST['tendangnhap'];
    $trangthai = $_POST['trangthai'];

    $stmt = $connect->prepare("UPDATE taikhoan SET trangthai = ? WHERE tendangnhap = ?");
    $stmt->bind_param("is", $trangthai, $tendangnhap);

    $list_open_close_taikhoan = array();

    if ($stmt->execute()) {
        $list_open_close_taikhoan[] = array(
            "status" => "success",
        );
    } else {
        $list_open_close_taikhoan[] = array(
            "status" => "error",
        );
    }
} else {
    $list_open_close_taikhoan[] = array(
        "status" => "error",
    );
}

// Xử lý phiếu mượn (cập nhật trạng thái)
if (isset($_POST['ma_xuly_pm'])) {
    $ma_xuly_pm = $_POST['ma_xuly_pm'];

    $stmt = $connect->prepare("UPDATE phieumuon SET trangthai = 1 WHERE mapm = ?");
    $stmt->bind_param("s", $ma_xuly_pm);

    $list_xuly_phieumuon = array();

    if ($stmt->execute()) {
        $list_xuly_phieumuon[] = array(
            "status" => "success",
        );
    } else {
        $list_xuly_phieumuon[] = array(
            "status" => "error",
        );
    }
} else {
    $list_xuly_phieumuon[] = array(
        "status" => "error",
    );
}

// ================================================ DELETE ===========================================================

//=== Xử lý XÓA sách ===>
if (isset($_POST['masach_xoa'])) {
    $masach = $_POST['masach_xoa']; // Lấy giá trị masach từ input

    // Chuẩn bị câu lệnh xóa
    $sql = "DELETE FROM sach WHERE masach = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $masach);

    $list_xoa_sach = array();

    if ($stmt->execute()) {
        $list_xoa_sach[] = array(
            "status" => "success",
            "message" => "Xóa sách thành công"
        );
    } else {
        $list_xoa_sach[] = array(
            "status" => "error",
            "message" => "Lỗi: " . $stmt->error
        );
    }
} else {
    $list_xoa_sach[] = array(
        "status" => "error",
        "message" => "Mã sách không hợp lệ"
    );
}


//=== Xử lý XÓA nhân viên ===>
if (isset($_POST['manv_xoa'])) {
    $manv = $_POST['manv_xoa']; // Lấy giá trị manv từ input

    // Lấy tên đăng nhập (tendangnhap) của nhân viên để xóa tài khoản
    $sql_get_account = "SELECT tendangnhap FROM taikhoan WHERE tendangnhap = (SELECT matk FROM nhanvien WHERE manv = ?)";
    $stmt_get_account = $connect->prepare($sql_get_account);
    $stmt_get_account->bind_param("i", $manv);
    $stmt_get_account->execute();
    $result = $stmt_get_account->get_result();
    $tendangnhap = null;

    if ($row = $result->fetch_assoc()) {
        $tendangnhap = $row['tendangnhap'];
    }
    // Đóng câu lệnh lấy tên đăng nhập
    $stmt_get_account->close();

    $sql_delete_nhanvien = "DELETE FROM nhanvien WHERE manv = ?";
    $stmt_delete_nhanvien = $connect->prepare($sql_delete_nhanvien);
    $stmt_delete_nhanvien->bind_param("i", $manv);

    $list_xoa_nhanvien = array();

    if ($stmt_delete_nhanvien->execute()) {
        // Nếu xóa nhân viên thành công, xóa tài khoản
        if ($tendangnhap) {
            $sql_delete_account = "DELETE FROM taikhoan WHERE tendangnhap = ?";
            $stmt_delete_account = $connect->prepare($sql_delete_account);
            $stmt_delete_account->bind_param("s", $tendangnhap);
            $stmt_delete_account->execute();
            $stmt_delete_account->close();
        }

        $list_xoa_nhanvien[] = array(
            "status" => "success",
            "message" => "Xóa nhân viên và tài khoản thành công"
        );
    } else {
        $list_xoa_nhanvien[] = array(
            "status" => "error",
            "message" => "Lỗi khi xóa nhân viên: " . $stmt_delete_nhanvien->error
        );
    }

    // Đóng câu lệnh xóa nhân viên
    $stmt_delete_nhanvien->close();
} else {
    $list_xoa_nhanvien[] = array(
        "status" => "error",
        "message" => "Mã nhân viên không hợp lệ"
    );
}


//=== Xử lý XÓA độc giả ===>
if (isset($_POST['madg_xoa'])) {
    $madg = $_POST['madg_xoa'];

    // Lấy tên đăng nhập (tendangnhap) của độc giả để xóa tài khoản
    $sql_get_account = "SELECT tendangnhap FROM taikhoan WHERE tendangnhap = (SELECT matk FROM docgia WHERE madg = ?)";
    $stmt_get_account = $connect->prepare($sql_get_account);
    $stmt_get_account->bind_param("i", $madg);
    $stmt_get_account->execute();
    $result = $stmt_get_account->get_result();
    $tendangnhap = null;

    if ($row = $result->fetch_assoc()) {
        $tendangnhap = $row['tendangnhap'];
    }

    // Đóng câu lệnh lấy tên đăng nhập
    $stmt_get_account->close();

    // Chuẩn bị câu lệnh xóa độc giả
    $sql_delete_docgia = "DELETE FROM docgia WHERE madg = ?";
    $stmt_delete_docgia = $connect->prepare($sql_delete_docgia);
    $stmt_delete_docgia->bind_param("i", $madg);

    $list_xoa_docgia = array();

    // Thực thi câu lệnh xóa độc giả
    if ($stmt_delete_docgia->execute()) {
        // Nếu xóa độc giả thành công, xóa tài khoản
        if ($tendangnhap) {
            $sql_delete_account = "DELETE FROM taikhoan WHERE tendangnhap = ?";
            $stmt_delete_account = $connect->prepare($sql_delete_account);
            $stmt_delete_account->bind_param("s", $tendangnhap);
            $stmt_delete_account->execute();
            $stmt_delete_account->close();
        }

        $list_xoa_docgia[] = array(
            "status" => "success",
            "message" => "Xóa độc giả và tài khoản thành công"
        );
    } else {
        $list_xoa_docgia[] = array(
            "status" => "error",
            "message" => "Lỗi khi xóa độc giả: " . $stmt_delete_docgia->error
        );
    }

    // Đóng câu lệnh xóa độc giả
    $stmt_delete_docgia->close();
} else {
    $list_xoa_docgia[] = array(
        "status" => "error",
        "message" => "Mã độc giả không hợp lệ"
    );
}


//=== Xử lý XÓA tài khoản ===>
if (isset($_POST['tendangnhap_xoa'])) {
    $tendangnhap = $_POST['tendangnhap_xoa']; // Lấy giá trị tendangnhap từ input

    // Kiểm tra tài khoản là của độc giả hay nhân viên
    $sql_check_account = "SELECT * FROM docgia WHERE matk = ?";

    $stmt_check = $connect->prepare($sql_check_account);
    $stmt_check->bind_param("s", $tendangnhap);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    $list_xoa_taikhoan = array();

    if ($result->num_rows > 0) {
        // Nếu tài khoản là của độc giả, không xóa
        $list_xoa_taikhoan[] = array(
            "status" => "error",
            "message" => "Không thể xóa tài khoản độc giả."
        );
    } else {
        // Tài khoản không phải độc giả, có thể xóa
        $sql_delete_account = "DELETE FROM taikhoan WHERE tendangnhap = ?";
        $stmt_delete_account = $connect->prepare($sql_delete_account);
        $stmt_delete_account->bind_param("s", $tendangnhap);

        if ($stmt_delete_account->execute()) {
            $list_xoa_taikhoan[] = array(
                "status" => "success",
                "message" => "Xóa tài khoản thành công."
            );
        } else {
            $list_xoa_taikhoan[] = array(
                "status" => "error",
                "message" => "Lỗi khi xóa tài khoản: " . $stmt_delete_account->error
            );
        }

        // Đóng câu lệnh xóa tài khoản
        $stmt_delete_account->close();
    }

    // Đóng câu lệnh kiểm tra
    $stmt_check->close();
} else {
    $list_xoa_taikhoan[] = array(
        "status" => "error",
        "message" => "Tên đăng nhập không hợp lệ."
    );
}

//=== Xử lý XÓA chi tiết sách ===>
if (isset($_POST['mavach_xoa'])) {
    $mavach = $_POST['mavach_xoa']; // Lấy giá trị mavach từ input

    // Chuẩn bị câu lệnh xóa chi tiết sách
    $sql_delete = "DELETE FROM chitietsach WHERE mavach = ?";
    $stmt = $connect->prepare($sql_delete);
    $stmt->bind_param("i", $mavach); // Sử dụng "i" vì mavach là số nguyên

    $list_xoa_ct_sach = array(); // Mảng để chứa kết quả

    if ($stmt->execute()) {
        $list_xoa_ct_sach[] = array(
            "status" => "success",
            "message" => "Xóa chi tiết sách thành công."
        );
    } else {
        $list_xoa_ct_sach[] = array(
            "status" => "error",
            "message" => "Lỗi khi xóa chi tiết sách: " . $stmt->error
        );
    }
} else {
    $list_xoa_ct_sach[] = array(
        "status" => "error",
        "message" => "Mã vạch không hợp lệ."
    );
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
    'list_open_close_taikhoan' => $list_open_close_taikhoan,
    'list_tao_taikhoan_nv' => $list_tao_taikhoan_nv,
    'list_xuly_phieumuon' => $list_xuly_phieumuon,
    'list_xoa_sach' => $list_xoa_sach,
    'list_xoa_nhanvien' => $list_xoa_nhanvien,
    'list_xoa_docgia' => $list_xoa_docgia,
    'list_xoa_ct_sach' => $list_xoa_ct_sach,
);

echo json_encode($response);

$stmt->close();
$connect->close();

?>