document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_add = document.querySelector('.btn-add-pq');
    const btn_delete = document.querySelector('.btn-delete-pq');
    const btn_edit = document.querySelector('.btn-edit-pq');
    const btn_save = document.querySelector('.btn-save-pq');
    const btn_cancel = document.querySelector('.btn-cancel-pq');
    const btn_reset = document.querySelector('.btn-reset-pq');

    const input_search = document.querySelector('.search-input-pq');

    const input_ma_pq = document.querySelector('.input-ma_pq');
    const input_ten_pq = document.querySelector('.input-ten_pq');
    const input_mota_pq = document.querySelector('.input-mota_pq');

    function ableInput() {
        input_ma_pq.disabled = false;
        input_ten_pq.disabled = false;
        input_mota_pq.disabled = false;
    }

    function disableInput() {
        input_ma_pq.disabled = true;
        input_ten_pq.disabled = true;
        input_mota_pq.disabled = true;
    }

    function resetInput() {
        input_ma_pq.value = '';
        input_ten_pq.value = '';
        input_mota_pq.value = '';
    }

    btn_add.addEventListener('click', () => {
        btn_delete.disabled = true;
        btn_edit.disabled = true;
        btn_save.disabled = false;
        btn_cancel.disabled = false;
        resetInput();
        ableInput();
        save_for_pq = 1;
    });

    btn_edit.addEventListener('click', () => {
        btn_add.disabled = true;
        btn_delete.disabled = true;
        btn_save.disabled = false;
        btn_cancel.disabled = false;

        save_for_pq = 2;

        ableInput();
    });

    btn_delete.addEventListener('click', () => {

    });

    btn_cancel.addEventListener('click', () => {
        btn_add.disabled = false;
        btn_edit.disabled = false;
        btn_delete.disabled = false;
        btn_save.disabled = true;
        btn_cancel.disabled = true;

        disableInput();
        resetInput();
    });

    btn_reset.addEventListener('click', () => {
        input_search.value ='';
        btn_add.disabled = false;
        btn_edit.disabled = false;
        btn_delete.disabled = false;
        btn_save.disabled = true;
        btn_cancel.disabled = true;

        save_for_pq = 0

        disableInput();
        resetInput();
        reset_table_quyen();
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
                $.each(data.list_quyen, function (index, quyen) {
                    $('.table-quyen tbody').append(
                        '<tr>' +
                        '<td>' + quyen.maquyen + '</td>' +
                        '<td>' + quyen.tenquyen + '</td>' +
                        '<td>' + quyen.mota + '</td>' +
                        '</tr>'
                    );
                });
            },
            error: function (xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });

    function reset_table_quyen() {
        $(document).ready(function () {
            $('.table-quyen tbody').empty();
            // Fetch dữ liệu từ server
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Hiển thị dữ liệu cho danh sách nhân viên
                    $.each(data.list_quyen, function (index, quyen) {
                        $('.table-quyen tbody').append(
                            '<tr>' +
                            '<td>' + quyen.maquyen + '</td>' +
                            '<td>' + quyen.tenquyen + '</td>' +
                            '<td>' + quyen.mota + '</td>' +
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


    //======================================Tìm kiếm phân quyền
    $(document).ready(function () {
        // Hàm tìm kiếm nhân viên
        function searchPowers() {
            const searchQuery = $('.search-input-pq').val();

            if (searchQuery.trim() === '') {
                $('.table-quyen tbody').empty(); // Nếu không có từ khóa, xóa kết quả
                $('.table-quyen tbody').append('<tr><td colspan="3">Không tìm thấy nhóm quyền nào.</td></tr>');
                return;
            }

            $.ajax({
                url: '../DAO/database/fetch_data.php', // Tập tin PHP xử lý tìm kiếm
                method: 'GET',
                dataType: 'json', // Định dạng dữ liệu trả về là JSON
                data: { search_quyen: searchQuery },
                success: function (data) {
                    $('.table-quyen tbody').empty(); // Xóa kết quả cũ
                    if (data.list_timkiem_quyen.length > 0) {
                        $.each(data.list_timkiem_quyen, function (index, quyen) {
                            $('.table-nhanvien tbody').append(
                                '<tr>' +
                                '<td>' + quyen.maquyen + '</td>' +
                                '<td>' + quyen.tenquyen + '</td>' +
                                '<td>' + quyen.mota + '</td>' +
                                '</tr>'
                            );
                        });
                    } else {
                        $('.table-quyen tbody').append('<tr><td colspan="3">Không tìm thấy nhóm quyền nào.</td></tr>');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        }

        // Tìm kiếm khi nhấn nút
        $('.btn-search-pq').on('click', function () {
            searchPowers();
        });

        //$('.btn-save-pq').on('click', function () {
        //    insertPermission();
        //});
     

        // Tìm kiếm khi nhấn phím Enter
        $('.search-input-pq').on('keypress', function (e) {
            if (e.which === 13) { // Kiểm tra phím Enter
                searchPowers();
                return false; // Ngăn chặn hành vi mặc định của Enter
            }
        });
    });

    // Sự kiện click đổ dữ liệu
    $(document).ready(function () {
        // Gán sự kiện click cho các dòng của bảng với delegation
        $('.table-quyen tbody').on('click', 'tr', function () {
            // Lấy dữ liệu từ các cột
            const cells = $(this).children('td');

            const mapq_for_input = $(cells[0]).text(); // Cột Mã NV
            const ten_for_input = $(cells[1]).text(); // Cột Mã TK
            const mota_for_input = $(cells[2]).text();

            // Đổ dữ liệu vào các input và select
            $('.input-ma_pq').val(mapq_for_input);
            $('.input-ten_pq').val(ten_for_input);
            $('.input-mota_pq').val(mota_for_input);

            ma_pq_toancuc = mapq_for_input;
            console.log(ma_pq_toancuc);
            maquyen_check = mapq_for_input;
            tenquyen_check = ten_for_input;
            mota_check = mota_for_input;

            fetchChiTietQuyen(mapq_for_input);
        });
    });

    $(document).ready(function () {
        $('.btn-delete-pq').on('click', function() {
            if (ma_pq_toancuc === '0') {
                alert('Bạn không thể xóa quyền admin!');
                return;
            }
            else if (ma_pq_toancuc) {
                const confirmMessage = `Bạn có chắc chắn muốn xóa quyền?`;
                if (!confirm(confirmMessage)) {
                    return;
                }
                $.ajax({
                    url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP xử lý xóa
                    method: 'POST',
                    data: { mapq_xoa: ma_pq_toancuc }, // Gửi masach
                    dataType: 'json',
                    success: function (data) {
                        $.each(data.list_xoa_quyen, function (index, maquyen) {
                            if (maquyen.status === "success") {
                                alert(maquyen.message);
                                resetInput();
                                reset_table_quyen();
                            } else {
                                alert(maquyen.message);
                            }
                        })
                    },
                    error: function (xhr, status, error) {
                        console.error('Lỗi:', error);
                        console.log('Phản hồi từ server:', xhr.responseText); // In toàn bộ dữ liệu server trả về
                        alert('Xóa quyền thất bại, quyền đã có tài khoản sử dụng.');
                        resetInput();
                        reset_table_quyen();
                    }
                });
            } else {
                alert('Vui lòng chọn để xóa.');
            }
        });
    });

    $(document).ready(function () {
        window.reset_table_quyen = reset_table_quyen;
    });

    $(document).ready(function () {
        $('.btn-save-pq').click(function () {

            switch (save_for_pq) {
                case 1:
                    $(document).ready(function () {
                        let isValid_pq = true;
                        
                        const maquyen = $('.input-ma_pq').val();
                        const tenquyen = $('.input-ten_pq').val();
                        const mota = $('.input-mota_pq').val();

                        if(!maquyen) {
                            alert('Vui lòng nhập mã quyền.');
                            isValid_pq = false;
                        } else if(!tenquyen) {
                            alert('Vui lòng nhập tên quyền.');
                            isValid_pq = false;
                        } else if(!mota) {
                            alert('Vui lòng nhập mô tả.');
                            isValid_pq = false;
                        }

                        if (!isValid_pq) {
                            return;
                        }

                        const confirmMessage = `Bạn có chắc chắn muốn thêm quyền?`;
                        if (!confirm(confirmMessage)) {
                            return; // Nếu người dùng không xác nhận, dừng lại
                        }
                         
                        const formData = new FormData();
                        formData.append('action', 'addQuyen');
                        formData.append('maquyen', maquyen);
                        formData.append('tenquyen', tenquyen);
                        formData.append('mota', mota);

                        $.ajax({
                            url: '../DAO/database/fetch_data.php',
                            type: 'POST',
                            data: formData,
                            processData: false, // Đặt false để jQuery không xử lý dữ liệu
                            contentType: false, // Đặt false để jQuery không tự động thêm header Content-Type
                            dataType: 'json', // Chỉ định kiểu dữ liệu là JSON
                            success: function (data) {
                                if (data.list_them_quyen && data.list_them_quyen.length > 0) {
                                    $.each(data.list_them_quyen, function (index, quyen) {
                                        if (quyen.status === "success") {
                                                alert(quyen.message);
                                                resetInput();
                                                reset_table_quyen();
                                            } else {
                                                alert(quyen.message);
                                            }
                                        });
                                } else {
                                    alert("Có lỗi.");
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error('Lỗi:', error);
                                console.log('Phản hồi từ máy chủ:', xhr.responseText); // In ra phản hồi
                            }
                        });
                    });
                    break;

                case 2:
                    console.log("Bạn đã chọn trường hợp 2.");
                    const maquyen = $('.input-ma_pq').val();
                    const tenquyen = $('.input-ten_pq').val();
                    const mota = $('.input-mota_pq').val();

                    let isChangedpq = false;
                    let isValid_pq = true;

                    // Kiểm tra xem có thay đổi hay không
                    if (maquyen !== maquyen_check) isChangedpq = true;
                    if (tenquyen !== tenquyen_check) isChangedpq = true;
                    if (mota !== mota_check) isChangedpq = true;

                    if (!isChangedpq) {
                        alert("Không có thay đổi nào để cập nhật.");
                        return; // Dừng lại nếu không có thay đổi
                    }

                    if(!maquyen) {
                        alert('Vui lòng nhập mã quyền.');
                        isValid_pq = false;
                    } else if(!tenquyen) {
                        alert('Vui lòng nhập tên quyền.');
                        isValid_pq = false;
                    } else if(!mota) {
                        alert('Vui lòng nhập mô tả.');
                        isValid_pq = false;
                    }

                    if (!isValid_pq) {
                        return;
                    }

                    const confirmMessage = `Bạn có chắc chắn muốn sửa quyền?`;
                    if (!confirm(confirmMessage)) {
                        return; // Nếu người dùng không xác nhận, dừng lại
                    }
                     
                    const formData = new FormData();
                    formData.append('action', 'suaQuyen');
                    formData.append('maquyen', maquyen);
                    formData.append('tenquyen', tenquyen);
                    formData.append('mota', mota);

                    $.ajax({
                        url: '../DAO/database/fetch_data.php',
                        type: 'POST',
                        data: formData,
                        processData: false, // Đặt false để jQuery không xử lý dữ liệu
                        contentType: false, // Đặt false để jQuery không tự động thêm header Content-Type
                        dataType: 'json', // Chỉ định kiểu dữ liệu là JSON
                        success: function (data) {
                            if (data.list_sua_quyen && data.list_sua_quyen.length > 0) {
                                $.each(data.list_sua_quyen, function(index, quyen) {
                                    if (quyen.status === "success") {
                                            alert(quyen.message);
                                            resetInput();
                                            reset_table_quyen();
                                        } else {
                                            alert(quyen.message);
                                        }
                                    });
                            } else {
                                alert("Có lỗi.");
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Lỗi:', error);
                            console.log('Phản hồi từ máy chủ:', xhr.responseText); // In ra phản hồi
                        }
                    });
            break;

            default:
                alert("Trường hợp không hợp lệ. Vui lòng chọn 1 hoặc 2.");
                break;
        }
    });
});

    // Hàm thêm quyền
    function insertPermission() {
        const ma_pq = input_ma_pq.value;
        const ten_pq = input_ten_pq.value;

        // Kiểm tra nếu input trống
        if (!ma_pq || !ten_pq ) {
            alert('Vui lòng nhập đầy đủ thông tin.');
            return;
        }
    
        // Gửi dữ liệu tới server qua AJAX
        $.ajax({
            url: '../DAO/updateQuyen.php', // Đường dẫn đến file PHP xử lý insert
            method: 'POST',
            data: {
                maquyen: ma_pq,
                tenquyen: ten_pq,
            },
            success: function(response) {
                if (response.success) {
                    alert('Thêm quyền thành công.');
                    reset_table_quyen(); // Cập nhật lại bảng sau khi thêm
                    resetInput(); // Reset form
                } else {
                    alert('Lỗi khi thêm quyền: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    }
    

});

let ma_pq_toancuc = null;

let save_for_pq = 0;

let maquyen_check;
let tenquyen_check;
let mota_check;
