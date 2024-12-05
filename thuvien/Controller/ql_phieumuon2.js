document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_reset = document.querySelector('.btn-reset-phieu_muon');
    
    const input_search = document.querySelector('.search-input-phieu_muon');

    btn_reset.addEventListener('click', () => {
        input_search.value = '';

        reset_table_phieumuon();
    });

    // FETCH DATA=========================================
    $(document).ready(function() {
        // Fetch dữ liệu từ server
        $.ajax({
            url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Hiển thị dữ liệu cho danh sách tài khoản độc giả
                $.each(data.list_phieumuon, function (index, phieumuon) {
                    let trangThaiHTML;
        
                    // Kiểm tra trạng thái
                    if (phieumuon.trangthai == 0) {
                        trangThaiHTML = '<button class="btn-xu-ly" onclick="xuLyPhieuMuon(' + phieumuon.mapm + ')">Xử Lý</button>';
                    } else {
                        trangThaiHTML = '<span class="da-xu-ly">Đã Xử Lý</span>';
                    }
        
                    // Thêm dòng vào bảng
                    $('.table-phieu_muon tbody').append(
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + phieumuon.mapm + '</td>' +
                        '<td>' + phieumuon.ngaymuon + '</td>' +
                        '<td>' + phieumuon.hantra + '</td>' +
                        '<td>' + phieumuon.madg + '-' + phieumuon.ten_docgia + '</td>' +
                        '<td>' + phieumuon.manv + '-' + phieumuon.ten_nhanvien + '</td>' +
                        '<td>' + phieumuon.tongphimuon + ' VNĐ' +'</td>' +
                        '<td>' + trangThaiHTML + '</td>' +
                        '</tr>'
                    );
                });
            },
            error: function (xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });

    // sự kiện click vào bảng sách để xem chi tiết phiêu mượn
    $(document).ready(function () {
        $('.table-phieu_muon tbody').on('click', 'tr', function () {
            var ma_phieu_muon = $(this).find('td').eq(1).text(); // Lấy giá trị từ ô <td> thứ hai
            console.log(ma_phieu_muon);
            $('.table-ct-phieu_muon tbody').empty();
            
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP xử lý
                method: 'POST',
                data: { ma_phieu_muon: ma_phieu_muon },
                dataType: 'json',
                success: function (data) {
                    $.each(data.list_chitiet_phieu_muon_xem, function (index, chitietphieumuon_xem) {
                        $('.table-ct-phieu_muon tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + chitietphieumuon_xem.mapm + '</td>' +
                            '<td>' + chitietphieumuon_xem.mavach + '</td>' +
                            '<td>' + chitietphieumuon_xem.tinhtrangmuon + '</td>' +
                            '<td>' + chitietphieumuon_xem.phimuon + '</td>' +
                            '</tr>'
                        );
                        console.log(chitietphieumuon_xem.mapm);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    });

    function reset_table_phieumuon() {
        $(document).ready(function() {
            $('.table-ct-phieu_muon tbody').empty();
            $('.table-phieu_muon tbody').empty();
            // Fetch dữ liệu từ server
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Hiển thị dữ liệu cho danh sách tài khoản độc giả
                    $.each(data.list_phieumuon, function (index, phieumuon) {
                        let trangThaiHTML;
            
                        // Kiểm tra trạng thái
                        if (phieumuon.trangthai == 0) {
                            trangThaiHTML = '<button class="btn-xu-ly" onclick="xuLyPhieuMuon(' + phieumuon.mapm + ')">Xử Lý</button>';
                        } else {
                            trangThaiHTML = '<span class="da-xu-ly">Đã Xử Lý</span>';
                        }
            
                        // Thêm dòng vào bảng
                        $('.table-phieu_muon tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + phieumuon.mapm + '</td>' +
                            '<td>' + phieumuon.ngaymuon + '</td>' +
                            '<td>' + phieumuon.hantra + '</td>' +
                            '<td>' + phieumuon.madg + '-' + phieumuon.ten_docgia + '</td>' +
                            '<td>' + phieumuon.manv + '-' + phieumuon.ten_nhanvien + '</td>' +
                            '<td>' + phieumuon.tongphimuon + ' VNĐ' +'</td>' +
                            '<td>' + trangThaiHTML + '</td>' +
                            '</tr>'
                        );
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    }

    $(document).ready(function () {
        window.reset_table_phieumuon = reset_table_phieumuon; // Gán hàm vào window
    });
    
});

function xuLyPhieuMuon(ma) {
    $.ajax({
        type: "POST",
        url: "../DAO/database/fetch_data.php", // Đường dẫn đến file PHP
        data: { ma_xuly_pm: ma },
        dataType: "json",
        success: function(data) {
            $.each(data.list_xuly_phieumuon, function (index, phieumuon) {
            if (phieumuon.status === 'success') {
                $(document).ready(function() {
                    reset_table_phieumuon();
                });
                alert("Đã xử lý mã phiếu:" + ma);
            } else {
                alert("Có lỗi xảy ra khi xử lý phiếu mượn");
            }
        });
        },
        error: function (xhr, status, error) {
            console.error('Lỗi:', error);
        }
    });
}