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
                        '<td>' + phieumuon.madg + '</td>' +
                        '<td>' + phieumuon.manv + '</td>' +
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

    function reset_table_phieumuon() {
        $(document).ready(function() {
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
                            '<td>' + phieumuon.madg + '</td>' +
                            '<td>' + phieumuon.manv + '</td>' +
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
    
});