document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_add = document.querySelector('.btn-add-nv');
    const btn_delete = document.querySelector('.btn-delete-nv');
    const btn_edit = document.querySelector('.btn-edit-nv');
    const btn_save = document.querySelector('.btn-save-nv');
    const btn_cancel = document.querySelector('.btn-cancel-nv');
    const btn_reset = document.querySelector('.btn-reset-nv');

    const input_search = document.querySelector('.search-input-nv');

    const img = document.querySelector('.image-nv');

    const input_ten_nv = document.querySelector('.input-ten_nv');
    const select_gioitinh_nv = document.querySelector('.select-gioitinh_nv');
    const input_ngaysinh_nv = document.querySelector('.input-ngaysinh_nv');
    const input_email_nv = document.querySelector('.input-email_nv');
    const input_sdt_nv = document.querySelector('.input-sdt_nv');
    const input_diachi_nv = document.querySelector('.input-diachi_nv');
    const input_img_nv = document.querySelector('.input-img_nv');

    function ableInput() {
        input_ten_nv.disabled = false;
        select_gioitinh_nv.disabled = false;
        input_ngaysinh_nv.disabled = false;
        input_email_nv.disabled = false;
        input_sdt_nv.disabled = false;
        input_diachi_nv.disabled = false;
        input_img_nv.disabled = false;
    }

    function disableInput() {
        input_ten_nv.disabled = true;
        select_gioitinh_nv.disabled = true;
        input_ngaysinh_nv.disabled = true;
        input_email_nv.disabled = true;
        input_sdt_nv.disabled = true;
        input_diachi_nv.disabled = true;
        input_img_nv.disabled = true;
    }

    function resetInput() {
        input_ten_nv.value = '';
        input_ngaysinh_nv.value = '';
        input_email_nv.value = '';
        input_sdt_nv.value = '';
        input_diachi_nv.value = '';
        input_img_nv.value = '';

        select_gioitinh_nv.selectedIndex = 0;
    }

    btn_add.addEventListener('click', () => {
        btn_delete.disabled = true;
        btn_edit.disabled = true;
        btn_save.disabled = false;
        btn_cancel.disabled = false;

        ableInput();
    });

    btn_edit.addEventListener('click', () => {
        btn_add.disabled = true;
        btn_delete.disabled = true;
        btn_save.disabled = false;
        btn_cancel.disabled = false;

        ableInput();
    });

    btn_delete.addEventListener('click', () => {

    });

    btn_cancel.addEventListener('click', () => {
        img.src = '../img/noimages.png';

        btn_add.disabled = false;
        btn_edit.disabled = false;
        btn_delete.disabled = false;
        btn_save.disabled = true;
        btn_cancel.disabled = true;

        disableInput();
        resetInput();
    });

    btn_reset.addEventListener('click', () => {
        input_search.value = '';

        img.src = '../img/noimages.png';

        btn_add.disabled = false;
        btn_edit.disabled = false;
        btn_delete.disabled = false;
        btn_save.disabled = true;
        btn_cancel.disabled = true;

        disableInput();
        resetInput();
        reset_table_nhanvien();
    });

    // FETCH DATA=========================================
    $(document).ready(function () {
        // Fetch dữ liệu từ server
        $.ajax({
            url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Hiển thị dữ liệu cho danh sách nhân viên
                $.each(data.list_nhanvien, function (index, nhanvien) {
                    $('.table-nhanvien tbody').append(
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + nhanvien.manv + '</td>' +
                        '<td>' + nhanvien.matk + '</td>' +
                        '<td>' + nhanvien.ten + '</td>' +
                        '<td>' + nhanvien.gioitinh + '</td>' +
                        '<td>' + nhanvien.ngaysinh + '</td>' +
                        '<td>' + nhanvien.email + '</td>' +
                        '<td>' + nhanvien.sdt + '</td>' +
                        '<td>' + nhanvien.diachi + '</td>' +
                        '</tr>'
                    );
                });

                // Hiển thị dữ liệu cho danh sách nhân viên chưa có tài khoản
                $.each(data.list_nhanvien_ko_tk, function (index, nhanvien_ko_tk) {
                    $('.table-nhanvien_taikhoan tbody').append(
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + nhanvien_ko_tk.manv + '</td>' +
                        '<td>' + '<button id="capTaiKhoanBtn" class="btn-cap-tai-khoan" onclick="capTaiKhoan(' + nhanvien_ko_tk.manv + ')">Cấp Tài Khoản</button>' + '</td>' +
                        '</tr>'
                    );
                });
            },
            error: function (xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });

    function reset_table_nhanvien() {
        $(document).ready(function () {
            $('.table-nhanvien tbody').empty();
            $('.table-nhanvien_taikhoan tbody').empty();
            // Fetch dữ liệu từ server
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Hiển thị dữ liệu cho danh sách nhân viên
                    $.each(data.list_nhanvien, function (index, nhanvien) {
                        $('.table-nhanvien tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + nhanvien.manv + '</td>' +
                            '<td>' + nhanvien.matk + '</td>' +
                            '<td>' + nhanvien.ten + '</td>' +
                            '<td>' + nhanvien.gioitinh + '</td>' +
                            '<td>' + nhanvien.ngaysinh + '</td>' +
                            '<td>' + nhanvien.email + '</td>' +
                            '<td>' + nhanvien.sdt + '</td>' +
                            '<td>' + nhanvien.diachi + '</td>' +
                            '</tr>'
                        );
                    });

                    // Hiển thị dữ liệu cho danh sách nhân viên chưa có tài khoản
                    $.each(data.list_nhanvien_ko_tk, function (index, nhanvien_ko_tk) {
                        $('.table-nhanvien_taikhoan tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + nhanvien_ko_tk.manv + '</td>' +
                            '<td>' + '<button id="capTaiKhoanBtn" class="btn-cap-tai-khoan" onclick="capTaiKhoan(' + nhanvien_ko_tk.manv + ')">Cấp Tài Khoản</button>' + '</td>' +
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


    //======================================Tìm kiếm nhân viên
    $(document).ready(function () {
        // Hàm tìm kiếm nhân viên
        function searchEmployees() {
            const searchQuery = $('.search-input-nv').val();

            if (searchQuery.trim() === '') {
                $('.table-nhanvien tbody').empty(); // Nếu không có từ khóa, xóa kết quả
                $('.table-nhanvien tbody').append('<tr><td colspan="9">Không tìm thấy nhân viên nào.</td></tr>');
                return;
            }

            $.ajax({
                url: '../DAO/database/fetch_data.php', // Tập tin PHP xử lý tìm kiếm
                method: 'GET',
                dataType: 'json', // Định dạng dữ liệu trả về là JSON
                data: { search_nhanvien: searchQuery },
                success: function (data) {
                    $('.table-nhanvien tbody').empty(); // Xóa kết quả cũ
                    if (data.list_timkiem_nhanvien.length > 0) {
                        $.each(data.list_timkiem_nhanvien, function (index, nhanvien) {
                            $('.table-nhanvien tbody').append(
                                '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + nhanvien.manv + '</td>' +
                                '<td>' + nhanvien.matk + '</td>' +
                                '<td>' + nhanvien.ten + '</td>' +
                                '<td>' + nhanvien.gioitinh + '</td>' +
                                '<td>' + nhanvien.ngaysinh + '</td>' +
                                '<td>' + nhanvien.email + '</td>' +
                                '<td>' + nhanvien.sdt + '</td>' +
                                '<td>' + nhanvien.diachi + '</td>' +
                                '</tr>'
                            );
                        });
                    } else {
                        $('.table-nhanvien tbody').append('<tr><td colspan="9">Không tìm thấy nhân viên nào.</td></tr>');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        }

        // Tìm kiếm khi nhấn nút
        $('.btn-search-nv').on('click', function () {
            searchEmployees();
        });

        // Tìm kiếm khi nhấn phím Enter
        $('.search-input-nv').on('keypress', function (e) {
            if (e.which === 13) { // Kiểm tra phím Enter
                searchEmployees();
                return false; // Ngăn chặn hành vi mặc định của Enter
            }
        });
    });

    // Sự kiện click đổ dữ liệu
    $(document).ready(function () {
        // Gán sự kiện click cho các dòng của bảng với delegation
        $('.table-nhanvien tbody').on('click', 'tr', function () {
            // Lấy dữ liệu từ các cột
            const cells = $(this).children('td');
    
            const manv_for_input = $(cells[1]).text(); // Cột Mã NV
            const matk_for_input = $(cells[2]).text(); // Cột Mã TK
            
            ma_nv_toancuc = manv_for_input;

            const ten_for_input = $(cells[3]).text(); // Cột Tên
            const gioitinh_for_select = $(cells[4]).text(); // Cột Giới tính
            const ngaysinh_for_input = $(cells[5]).text(); // Cột Ngày sinh
            const email_for_input = $(cells[6]).text(); // Cột Email
            const sdt_for_input = $(cells[7]).text(); // Cột SĐT
            const diachi_for_input = $(cells[8]).text(); // Cột Địa chỉ
    
            // Chuyển đổi định dạng ngày nếu cần
            const formattedDate = formatDate(ngaysinh_for_input);
    
            // Đổ dữ liệu vào các input và select
            $('.input-ten_nv').val(ten_for_input);
            $('.select-gioitinh_nv').val(gioitinh_for_select);
            $('.input-ngaysinh_nv').val(formattedDate); // Gán giá trị đã định dạng
            $('.input-email_nv').val(email_for_input);
            $('.input-sdt_nv').val(sdt_for_input);
            $('.input-diachi_nv').val(diachi_for_input);
        });
    
        // Hàm để chuyển đổi định dạng ngày
        function formatDate(dateString) {
            const dateParts = dateString.split('/');
            if (dateParts.length === 3) {
                // Giả sử định dạng ban đầu là DD/MM/YYYY
                return `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`; // Chuyển sang YYYY-MM-DD
            }
            return dateString; // Trả về giá trị gốc nếu không đúng định dạng
        }
    });


    $(document).ready(function () {
        $('.btn-delete-nv').on('click', function () {
            if (ma_nv_toancuc) {
                // Gửi yêu cầu xóa đến server
                $.ajax({
                    url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP xử lý xóa
                    method: 'POST',
                    data: { manv_xoa: ma_nv_toancuc }, // Gửi masach
                    dataType: 'json',
                    success: function (data) {
                        $.each(data.list_xoa_nhanvien, function (index, manv) {
                            if (manv.status === "success") {
                                alert(manv.message);
                                resetInput();
                                reset_table_nhanvien();
                            } else {
                                alert(manv.message);
                            }
                        })
                    },
                    error: function (xhr, status, error) {
                        console.error('Lỗi:', error);
                        alert('Có lỗi xảy ra. Vui lòng thử lại.');
                    }
                });
            } else {
                alert('Vui lòng chọn để xóa.');
            }
        });
    });


    $(document).ready(function () {
        window.reset_table_nhanvien = reset_table_nhanvien;
    });

});

let ma_nv_toancuc = null;

// Hàm chọn ảnh
let imagePathNV;

function previewImageNV(event) {
    const input = event.target; // Lấy input file
    const imagePreview = document.querySelector('.image-nv');

    if (input.files && input.files[0]) {
        const reader = new FileReader(); // Tạo đối tượng FileReader

        reader.onload = function (e) {
            imagePreview.src = e.target.result; // Cập nhật src của img với dữ liệu hình ảnh
        }

        reader.readAsDataURL(input.files[0]); // Đọc tệp hình ảnh

        // Lưu đường dẫn tạm thời (base64) để sử dụng sau này
        imagePathNV = URL.createObjectURL(input.files[0]);
        console.log("Đường dẫn hình ảnh:", imagePathNV); // Bạn có thể lưu đường dẫn này vào database sau này
    }
}

function capTaiKhoan(manv) {
    console.log(manv);
    $.ajax({
        url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
        type: 'POST',
        data: { manvtaotk: manv },
        dataType: 'json',
        success: function (data) {
            console.log(data.list_tao_taikhoan_nv);
            $.each(data.list_tao_taikhoan_nv, function (index, item) {
                if (item.status === 'success') {
                    alert(item.message);
                    $(document).ready(function () {
                        reset_table_nhanvien();
                    });
                } else {
                    alert(item.message);
                }
            });
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error: ", status, error);
            alert("Có lỗi xảy ra khi tạo tài khoản.");
        }
    });
}