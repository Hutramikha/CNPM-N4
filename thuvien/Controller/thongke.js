// JavaScript xử lý chuyển tab
document.addEventListener('DOMContentLoaded', function () {
    // Lấy tất cả các tab buttons và nội dung tab
    const tabButtons_tk = document.querySelectorAll('.tab-button-tk');
    const tabPanes_tk = document.querySelectorAll('.tab-pane-tk');

    // Gán sự kiện click cho từng tab button
    tabButtons_tk.forEach(button => {
        button.addEventListener('click', function () {
            // Xóa class active khỏi tất cả các tab buttons và tab panes
            tabButtons_tk.forEach(btn => btn.classList.remove('active'));
            tabPanes_tk.forEach(pane => pane.classList.remove('active'));

            // Thêm class active cho tab được chọn
            this.classList.add('active');
            const targetTab = this.getAttribute('data-tab');
            document.getElementById(targetTab).classList.add('active');
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const btn_reset = document.querySelector('.btn-reset-thongke');

    const input_search = document.querySelector('.search-input-thongke');

    function resetInput() {
        select_thongke.selectedIndex = 0;

        input_thongke_tu_ngay_pn.value = '';
        input_thongke_den_ngay_pn.value = '';
        input_thongke_tu_ngay_pm.value = '';
        input_thongke_den_ngay_pm.value = '';
        input_thongke_tu_ngay_pt.value = '';
        input_thongke_den_ngay_pt.value = '';

        input_search.value = '';
    }

    btn_reset.addEventListener('click', () => {
        resetInput();

    });

    const btn_submit_pn = document.querySelector('.btn-tk_pn');

    btn_submit_pn.addEventListener('click', () => {
        const fromDate_pn = document.querySelector('.input_thongke_tu_ngay_pn').value;
        const toDate_pn = document.querySelector('.input_thongke_den_ngay_pn').value;
        console.log('From Date:', fromDate_pn);
        console.log('To Date:', toDate_pn);
    
        if (fromDate_pn && toDate_pn) {
            // Gửi yêu cầu AJAX đến server với các tham số ngày
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                data: {
                    fromDate_pn: fromDate_pn,
                    toDate_pn: toDate_pn
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data); // In dữ liệu trả về từ server để kiểm tra
    
                    // Làm mới nội dung bảng
                    $('.table-phieu_nhap-tk tbody').empty(); // Xóa các dòng cũ trong bảng
    
                    // Khai báo biến để tính tổng tiền
                    let totalMoney = 0;
    
                    // Hiển thị dữ liệu mới từ server
                    $.each(data.list_phieunhap, function (index, phieunhap) {
                        $('.table-phieu_nhap-tk tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + phieunhap.mapn + '</td>' +
                            '<td>' + phieunhap.mancc + '-' + phieunhap.ten + '</td>' +
                            '<td>' + phieunhap.manv + '</td>' +
                            '<td>' + phieunhap.ngaynhap + '</td>' +
                            '<td>' + phieunhap.tongtien + '</td>' +
                            '</tr>'
                        );
    
                        // Cộng tổng tiền
                        totalMoney += parseFloat(phieunhap.tongtien);
                    });
    
                    $('#total-money-pn').text(totalMoney.toFixed(0));
                },
                error: function(xhr, status, error) {
                    console.log("Error: " + error);
                }
            });
        } else {
            alert("Vui lòng chọn đầy đủ phạm vi ngày.");
        }
    });
    
});