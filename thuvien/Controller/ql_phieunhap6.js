document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_start_add_ct = document.querySelector('.btn-start-ct-phieu_nhap');
    const btn_save_ct = document.querySelector('.btn-save-ct-phieu_nhap');
    const btn_cancel = document.querySelector('.btn-cancel-ct-phieu_nhap');
    const btn_reset = document.querySelector('.btn-reset-phieu_nhap');
    const btn_edit_ct = document.querySelector('.btn-edit-ct-phieu_nhap');

    const btn_add_pn = document.querySelector('.btn-create-pn');

    const input_search = document.querySelector('.search-input-phieu_nhap');

    const select_ten_sach_pn = document.querySelector('.select-ten_sach_pn');
    const input_soluong_sach_pn = document.querySelector('.input-soluong_sach_pn');
    const input_gianhap_sach_pn = document.querySelector('.input-gianhap_sach_pn');
    const input_thanhtien_sach_pn = document.querySelector('.input-thanhtien_sach_pn');

    const select_ncc_sach_pn = document.querySelector('.select-ncc_sach_pn');

    const table_ct_phieu_nhap_xem = document.querySelector('.table-ct-phieu_nhap-xem');
    const table_ct_phieu_nhap = document.querySelector('.table-ct-phieu_nhap');

    function ableInput() {
        select_ten_sach_pn.disabled = false;
        input_soluong_sach_pn.disabled = false;
        input_gianhap_sach_pn.disabled = false;
        input_thanhtien_sach_pn.disabled = false;
        select_ncc_sach_pn.disabled = false;
    }

    function disableInput() {
        select_ten_sach_pn.disabled = true;
        input_soluong_sach_pn.disabled = true;
        input_gianhap_sach_pn.disabled = true;
        input_thanhtien_sach_pn.disabled = true;
        select_ncc_sach_pn.disabled = true;
    }

    function resetInput() {
        input_soluong_sach_pn.value = '';
        input_gianhap_sach_pn.value = '';
        input_thanhtien_sach_pn.value = '';

        select_ten_sach_pn.selectedIndex = 0;
        select_ncc_sach_pn.selectedIndex = 0;
    }

    btn_edit_ct.addEventListener('click', () => {
        btn_start_add_ct.disabled = true;
        btn_save_ct.disabled = false;
        btn_cancel.disabled = false;

        btn_add_pn.disabled = false;

        table_ct_phieu_nhap_xem.style.display = 'none';
        table_ct_phieu_nhap.style.display = 'table';

        ableInput();
    });

    btn_start_add_ct.addEventListener('click', () => {
        btn_save_ct.disabled = false;
        btn_cancel.disabled = false;
        btn_edit_ct.disabled = true;

        btn_add_pn.disabled = false;

        table_ct_phieu_nhap_xem.style.display = 'none';
        table_ct_phieu_nhap.style.display = 'table';

        ableInput();
    });

    btn_cancel.addEventListener('click', () => {
        btn_start_add_ct.disabled = false;
        btn_save_ct.disabled = true;
        btn_cancel.disabled = true;
        btn_edit_ct.disabled = false;

        btn_add_pn.disabled = true;

        table_ct_phieu_nhap_xem.style.display = 'table';
        table_ct_phieu_nhap.style.display = 'none';

        resetInput();
        disableInput();
        reset_select_nhacc();
        reset_select_sach_pn();
    });

    btn_reset.addEventListener('click', () => {
        btn_start_add_ct.disabled = false;
        btn_save_ct.disabled = true;
        btn_cancel.disabled = true;
        btn_edit_ct.disabled = false;

        btn_add_pn.disabled = true;

        input_search.value = '';

        table_ct_phieu_nhap_xem.style.display = 'table';
        table_ct_phieu_nhap.style.display = 'none';

        resetInput();
        disableInput();
        reset_table_phieu_nhap();
        reset_select_nhacc();
        reset_select_sach_pn();
    });

    $(document).ready(function () {
        // Fetch dữ liệu từ server
        $.ajax({
            url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Hiển thị dữ liệu cho danh sách phiếu nhập
                $.each(data.list_phieunhap, function (index, phieunhap) {
                    $('.table-phieu_nhap tbody').append(
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + phieunhap.mapn + '</td>' +
                        '<td>' + phieunhap.mancc + '-' + phieunhap.ten + '</td>' +
                        '<td>' + phieunhap.manv + '</td>' +
                        '<td>' + phieunhap.ngaynhap + '</td>' +
                        '<td>' + phieunhap.tongtien + ' VNĐ' + '</td>' +
                        '</tr>'
                    );
                });

                // Đổ các option nhà cung cấp
                $.each(data.list_nhacungcap, function (index, nhacc) {
                    $('.select-ncc_sach_pn').append(
                        '<option value=' + '"' + nhacc.mancc + '"' + '>' +
                        nhacc.ten + '</option>'
                    );
                });

                // Đổ các option sách
                $.each(data.list_sach, function (index, sach) {
                    $('.select-ten_sach_pn').append(
                        '<option value=' + '"' + sach.masach + '"' + '>' +
                        sach.masach + '-' + sach.tensach + '</option>'
                    );
                });
            },
            error: function (xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });

    // sự kiện click vào bảng sách để xem chi tiết phiêu nhập
    $(document).ready(function () {
        $('.table-phieu_nhap tbody').on('click', 'tr', function () {
            var maphieunhap = $(this).find('td').eq(1).text(); // Lấy giá trị từ ô <td> thứ hai
            console.log(maphieunhap);
            $('.table-ct-phieu_nhap-xem tbody').empty();
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP xử lý
                method: 'POST',
                data: { ma_phieu_nhap: maphieunhap },
                dataType: 'json',
                success: function (data) {
                    $.each(data.list_chitiet_phieu_nhap_xem, function (index, chitietphieunhap_xem) {
                        $('.table-ct-phieu_nhap-xem tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + chitietphieunhap_xem.mapn + '</td>' +
                            '<td>' + chitietphieunhap_xem.masach + '</td>' +
                            '<td>' + chitietphieunhap_xem.gianhap + '</td>' +
                            '<td>' + chitietphieunhap_xem.soluong + '</td>' +
                            '<td>' + chitietphieunhap_xem.thanhtien + '</td>' +
                            '</tr>'
                        );
                        console.log(chitietphieunhap_xem.mapn);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    });

    function reset_table_phieu_nhap() {
        $(document).ready(function () {
            $('.table-ct-phieu_nhap-xem tbody').empty();
            $('.table-phieu_nhap tbody').empty();
            // Fetch dữ liệu từ server
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Hiển thị dữ liệu cho danh sách phiếu nhập
                    $.each(data.list_phieunhap, function (index, phieunhap) {
                        $('.table-phieu_nhap tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + phieunhap.mapn + '</td>' +
                            '<td>' + phieunhap.mancc + '-' + phieunhap.ten + '</td>' +
                            '<td>' + phieunhap.manv + '</td>' +
                            '<td>' + phieunhap.ngaynhap + '</td>' +
                            '<td>' + phieunhap.tongtien + ' VNĐ' + '</td>' +
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

    function reset_select_nhacc() {
        $(document).ready(function () {
            var option0 = $('.select-ncc_sach_pn option[value="0"]').clone();
            $('.select-ncc_sach_pn').empty();
            // Fetch dữ liệu từ server
            $('.select-ncc_sach_pn').append(option0);
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Đổ các option nhà cung cấp
                    $.each(data.list_nhacungcap, function (index, nhacc) {
                        $('.select-ncc_sach_pn').append(
                            '<option value=' + '"' + nhacc.mancc + '"' + '>' +
                            nhacc.ten + '</option>'
                        );
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    }

    function reset_select_sach_pn() {
        $(document).ready(function () {
            var option0 = $('.select-ten_sach_pn option[value="0"]').clone();
            $('.select-ten_sach_pn').empty();
            // Fetch dữ liệu từ server
            $('.select-ten_sach_pn').append(option0);
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Đổ các option sách
                    $.each(data.list_sach, function (index, sach) {
                        $('.select-ten_sach_pn').append(
                            '<option value=' + '"' + sach.masach + '"' + '>' +
                            sach.masach + '-' + sach.tensach + '</option>'
                        );
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    }


    // Thực hiện tăng giảm giá trị bằng nút mũi tên
    $(document).ready(function () {
        const incrementValue = 10000;
        const incrementValue_soluong = 1;

        // Cập nhật input hiển thị giá trị
        function updateInputPhinhap() {
            $('.input-gianhap_sach_pn').val(currentValue_phinhap + ' VNĐ');
        }
        function updateInputSoluong() {
            $('.input-soluong_sach_pn').val(currentValue_soluong);
        }

        // Sự kiện khi nhấn nút tăng
        $('#increment_phinhap').on('click', function () {
            currentValue_phinhap += incrementValue;
            updateInputPhinhap();
        });
        $('#increment_soluong_phieunhap').on('click', function () {
            currentValue_soluong += incrementValue_soluong;
            updateInputSoluong();
        });

        // Sự kiện khi nhấn nút giảm
        $('#decrement_phinhap').on('click', function () {
            if (currentValue_phinhap > 0) { // Đảm bảo không giảm xuống dưới 0
                currentValue_phinhap -= incrementValue;
                updateInputPhinhap();
            }
        });
        $('#decrement_soluong_phieunhap').on('click', function () {
            if (currentValue_soluong > 0) { // Đảm bảo không giảm xuống dưới 0
                currentValue_soluong -= incrementValue_soluong;
                updateInputSoluong();
            }
        });
    });


    //====================== Tìm kiếm phiếu nhập
    $(document).ready(function () {
        // Hàm tìm kiếm phiếu nhập
        function searchPhieuNhap() {
            const searchQuery = $('.search-input-phieu_nhap').val(); // Lấy giá trị từ ô input tìm kiếm

            if (searchQuery.trim() === '') {
                $('.table-phieu_nhap tbody').empty(); // Nếu không có từ khóa, xóa kết quả
                $('.table-phieu_nhap tbody').append('<tr><td colspan="6">Không tìm thấy phiếu nhập nào.</td></tr>');
                return;
            }

            // Gửi yêu cầu AJAX
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Thay thế bằng đường dẫn đến tệp PHP xử lý
                method: 'GET',
                dataType: 'json', // Định dạng dữ liệu trả về là JSON
                data: { search_phieunhap: searchQuery },
                success: function (data) {
                    $('.table-phieu_nhap tbody').empty(); // Xóa kết quả cũ
                    if (data.list_timkiem_phieunhap.length > 0) {
                        $.each(data.list_timkiem_phieunhap, function (index, phieunhap) {
                            $('.table-phieu_nhap tbody').append(
                                '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + phieunhap.mapn + '</td>' +
                                '<td>' + phieunhap.mancc + '-' + phieunhap.ten + '</td>' +
                                '<td>' + phieunhap.manv + '</td>' +
                                '<td>' + phieunhap.ngaynhap + '</td>' +
                                '<td>' + phieunhap.tongtien + ' VNĐ' + '</td>' +
                                '</tr>'
                            );
                        });
                    } else {
                        $('.table-phieu_nhap tbody').append('<tr><td colspan="6">Không tìm thấy phiếu nhập nào.</td></tr>');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        }

        // Tìm kiếm khi nhấn nút
        $('.btn-search-phieu_nhap').on('click', function () {
            searchPhieuNhap();
        });

        // Tìm kiếm khi nhấn phím Enter
        $('.search-input-phieu_nhap').on('keypress', function (e) {
            if (e.which === 13) { // Kiểm tra phím Enter
                searchPhieuNhap();
                return false; // Ngăn chặn hành vi mặc định của Enter
            }
        });
    });


    $(document).ready(function () {
        window.reset_select_nhacc = reset_select_nhacc; // Gán hàm vào window
    });

    // Nhớ thêm hàm reset_select_nhacc() bên nhà cc

    // $(document).ready(function() {
    //     reset_select_nhacc();
    // });  



});

let currentValue_phinhap = 0;
let currentValue_soluong = 0;