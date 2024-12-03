function opentk(tendangnhap) {
    // Logic to unlock the account with the given id
    console.log('Unlocking account with ID:', tendangnhap);
    // Add your unlock logic here
}

function closetk(tendangnhap) {
    // Logic to lock the account with the given id
    console.log('Locking account with ID:', tendangnhap);
    // Add your lock logic here
}


document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_delete = document.querySelector('.btn-delete-taikhoan');
    const btn_edit = document.querySelector('.btn-edit-taikhoan');
    const btn_save = document.querySelector('.btn-save-taikhoan');
    const btn_cancel = document.querySelector('.btn-cancel-taikhoan');
    const btn_reset = document.querySelector('.btn-reset-taikhoan');

    const input_search = document.querySelector('.search-input-taikhoan');

    const input_username_tk = document.querySelector('.input-username_tk');
    const input_password_tk = document.querySelector('.input-password_tk');
    const select_quyen_tk = document.querySelector('.select-quyen_tk');
    const input_ngaytao_tk = document.querySelector('.input-ngaytao_tk');

    function ableInput() {
        // input_username_tk.disabled = false;
        // input_password_tk.disabled = false;
        select_quyen_tk.disabled = false;
        // input_ngaytao_tk.disabled = false;
    }

    function disableInput() {
        // input_username_tk.disabled = true;
        // input_password_tk.disabled = true;
        select_quyen_tk.disabled = true;
        // input_ngaytao_tk.disabled = true;
    }

    function resetInput() {
        input_username_tk.value = '';
        input_password_tk.value = '';
        input_ngaytao_tk.value = '';

        select_quyen_tk.selectedIndex = 0;
    }

    btn_edit.addEventListener('click', () => {
        // btn_add.disabled = true;
        btn_delete.disabled = true;
        btn_save.disabled = false;
        btn_cancel.disabled = false;

        ableInput();
    });

    btn_cancel.addEventListener('click', () => {
        // btn_add.disabled = true;
        btn_delete.disabled = false;
        btn_save.disabled = true;
        btn_cancel.disabled = true;

        resetInput();
        disableInput();
    });

    btn_reset.addEventListener('click', () => {
        input_search.value = '';

        // btn_add.disabled = true;
        btn_edit.disabled = false;
        btn_delete.disabled = false;
        btn_save.disabled = true;
        btn_cancel.disabled = true;

        resetInput();
        disableInput();

        reset_table_taikhoan();
        reset_select_quyen();
    });

    btn_delete.addEventListener('click', () => {

    });

    $(document).ready(function () {
        // Fetch dữ liệu từ server
        $.ajax({
            url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Hiển thị dữ liệu cho danh sách tài khoản độc giả
                $.each(data.list_taikhoan_docgia, function (index, tk_docgia) {
                    let trangThaiHTMLdg;
                    // Kiểm tra trạng thái
                    if (tk_docgia.trangthai == 0) {
                        trangThaiHTMLdg = '<button class="btn-lock" onclick="closetk(\'' + tk_docgia.tendangnhap + '\')">Khóa</button>';
                    } else {
                        trangThaiHTMLdg = '<button class="btn-unlock" onclick="opentk(\'' + tk_docgia.tendangnhap + '\')">Mở khóa</button>';
                    }

                    $('.table-taikhoan_docgia tbody').append(
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + tk_docgia.tendangnhap + '</td>' +
                        '<td>' + tk_docgia.matkhau + '</td>' +
                        '<td>' + tk_docgia.maquyen + '</td>' +
                        '<td>' + tk_docgia.ngaytao + '</td>' +
                        '<td>' + trangThaiHTMLdg + '</td>' +
                        '</tr>'
                    );
                    console.log(tk_docgia.trangthai);
                });

                // Hiển thị dữ liệu cho danh sách tài khoản nhân viên
                $.each(data.list_taikhoan_nhanvien, function (index, tk_nhanvien) {
                    let trangThaiHTMLnv;
                    // Kiểm tra trạng thái
                    if (tk_nhanvien.trangthai == 0) {
                        trangThaiHTMLnv = '<button class="btn-lock" onclick="closetk(\'' + tk_nhanvien.tendangnhap + '\')">Khóa</button>';
                    } else {
                        trangThaiHTMLnv = '<button class="btn-unlock" onclick="opentk(\'' + tk_nhanvien.tendangnhap + '\')">Mở khóa</button>';
                    }

                    $('.table-taikhoan_nhanvien tbody').append(
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + tk_nhanvien.tendangnhap + '</td>' +
                        '<td>' + tk_nhanvien.matkhau + '</td>' +
                        '<td>' + tk_nhanvien.maquyen + '</td>' +
                        '<td>' + tk_nhanvien.ngaytao + '</td>' +
                        '<td>' + trangThaiHTMLnv + '</td>' +
                        '</tr>'
                    );
                });

                // Đổ các option quyền
                $.each(data.list_quyen, function (index, quyen) {
                    $('.select-quyen_tk').append(
                        '<option value=' + '"' + quyen.maquyen + '"' + '>' +
                        quyen.maquyen + '-' + quyen.tenquyen + '</option>'
                    );
                });
            },
            error: function (xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });

    function reset_table_taikhoan() {
        $(document).ready(function () {
            $('.table-taikhoan_docgia tbody').empty();
            $('.table-taikhoan_nhanvien tbody').empty();
            // Fetch dữ liệu từ server
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Hiển thị dữ liệu cho danh sách tài khoản độc giả
                    $.each(data.list_taikhoan_docgia, function (index, tk_docgia) {
                        let trangThaiHTMLdg;
                        // Kiểm tra trạng thái
                        if (tk_docgia.trangthai == 0) {
                            trangThaiHTMLdg = '<button class="btn-lock" onclick="closetk(\'' + tk_docgia.tendangnhap + '\')">Khóa</button>';
                        } else {
                            trangThaiHTMLdg = '<button class="btn-unlock" onclick="opentk(\'' + tk_docgia.tendangnhap + '\')">Mở khóa</button>';
                        }

                        $('.table-taikhoan_docgia tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + tk_docgia.tendangnhap + '</td>' +
                            '<td>' + tk_docgia.matkhau + '</td>' +
                            '<td>' + tk_docgia.maquyen + '</td>' +
                            '<td>' + tk_docgia.ngaytao + '</td>' +
                            '<td>' + trangThaiHTMLdg + '</td>' +
                            '</tr>'
                        );
                        console.log(tk_docgia.trangthai);
                    });

                    // Hiển thị dữ liệu cho danh sách tài khoản nhân viên
                    $.each(data.list_taikhoan_nhanvien, function (index, tk_nhanvien) {
                        let trangThaiHTMLnv;
                        // Kiểm tra trạng thái
                        if (tk_nhanvien.trangthai == 0) {
                            trangThaiHTMLnv = '<button class="btn-lock" onclick="closetk(\'' + tk_nhanvien.tendangnhap + '\')">Khóa</button>';
                        } else {
                            trangThaiHTMLnv = '<button class="btn-unlock" onclick="opentk(\'' + tk_nhanvien.tendangnhap + '\')">Mở khóa</button>';
                        }

                        $('.table-taikhoan_nhanvien tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + tk_nhanvien.tendangnhap + '</td>' +
                            '<td>' + tk_nhanvien.matkhau + '</td>' +
                            '<td>' + tk_nhanvien.maquyen + '</td>' +
                            '<td>' + tk_nhanvien.ngaytao + '</td>' +
                            '<td>' + trangThaiHTMLnv + '</td>' +
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

    function reset_select_quyen() {
        $(document).ready(function () {
            var option0 = $('.select-quyen_tk option[value="-1"]').clone();
            $('.select-quyen_tk').empty();
            // Fetch dữ liệu từ server
            $('.select-quyen_tk').append(option0);
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Đổ các option quyền
                    $.each(data.list_quyen, function (index, quyen) {
                        $('.select-quyen_tk').append(
                            '<option value=' + '"' + quyen.maquyen + '"' + '>' +
                            quyen.maquyen + '-' + quyen.tenquyen + '</option>'
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
        window.reset_select_quyen = reset_select_quyen; // Gán hàm vào window
    });

    // Nhớ thêm hàm reset_select_quyen() bên ql quyền

    // $(document).ready(function() {
    //     reset_select_quyen();
    // });  

});