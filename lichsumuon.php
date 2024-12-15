<?php
$userId =  isset($_GET['userId']) ? $_GET['userId'] : '';
?>

<div class="container-fluid">
    <div class="card position-relative" style="border: 2px solid #e3e6f0;  transform: scale(1.03);">
        <div class="card-header py-3" style="display: flex;">
            <h4 class="m-0 font-weight-bold text-primary"> Lịch sử mượn </h4>

        </div>
        <div class="card-body" style="position: relative;">
            <div class="list-prd-in-cart" style="flex-direction: column;  max-height: 1200px; overflow-y: auto;">
                <?php
                $db = new PDO("mysql:host=localhost;dbname=thuvien;charset=utf8", "root", "");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $db->prepare("SELECT sach.masach, sach.tensach, sach.img, sach.phimuon, sach.tomtat, 
                      tacgia.tentg AS tacGia, 
                      nhaxuatban.tennxb AS nhaXuatBan, 
                      theloai.tentl AS theLoai,
                      phieumuon.ngaymuon AS ngayMuon,
                      phieumuon.hantra AS hanTra
                      FROM sach 
                      INNER JOIN tacgia ON sach.matg = tacgia.matg
                      INNER JOIN nhaxuatban ON sach.manxb = nhaxuatban.manxb
                      INNER JOIN theloai ON sach.matl = theloai.matl 
                      INNER JOIN chitietphieumuon ON sach.masach = chitietphieumuon.masach
                      INNER JOIN phieumuon ON chitietphieumuon.mapm = chitietphieumuon.mapm
                      WHERE phieumuon.trangthai = 1 AND phieumuon.madg = :userId
                      ");
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->execute();
                $danhsach = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (empty($danhsach)) {
                    echo "<h2> Bạn chưa có lịch sử mượn sách </h2>";
                } else {
                    foreach ($danhsach as $item) {
                        extract($item);
                        $phiMuon = number_format($phimuon, 0, ',', '.') . '₫';
                        $ngayMuonDateTime = DateTime::createFromFormat('Y-m-d', $ngayMuon);
                        $ngayTraDuKien = '0000-00-00';
                        $ngayHomNay = date('Y-m-d');
                        if ($ngayMuonDateTime === false) {
                            echo "Lỗi: Ngày mượn không hợp lệ.";
                        } else {
                            $ngayTra = $ngayMuonDateTime->modify("+$hanTra days");
                            $ngayTraDuKien = $ngayTra->format('Y-m-d');
                            echo '
                         <div class="prd-in-cart" style="margin-bottom: 1.3rem; border: 1px solid #e3e6f0; border-radius: 1rem;">
                   
                    <div class="book-details" style="height: 100%; width: 70%; color: #4e73df; transform: scale(0.93);">
                        <div class="book-details__img"><img src="img/' . $img . '" alt="" style="transform: scale(0.9);"></div>
                        <div class="book-details__info" >
                            Tên sách: ' . $tensach . ' <br>
                            Tác giả: ' . $tacGia . ' <br>
                            Phí mượn: ' . $phiMuon . '<br>
                            Ngày mượn: ' . $ngayMuon . ' <br>
                            Ngày trả dự kiến: ' . $ngayTraDuKien . ' <br>
                            Ngày trả: ' . $ngayTraDuKien . ' <br>
                        </div>
                    </div>
                    <div class="button-container" style="width: 25%; height: 100%; flex-direction: column; justify-content: center; align-item: center;">
                        <i class="fa-solid fa-hourglass-half"></i> 
                        Đang chờ duyệt yêu cầu mượn sách
                    </div>
                </div>';
                        }
                    }
                }

                echo '
            </div>
        </div>
    </div>
</div>';
                ?>
                <script>

                </script>