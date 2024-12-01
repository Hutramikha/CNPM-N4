document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_start_add_ct = document.querySelector('.btn-start-ct-phieu_nhap');
    const btn_add_ct = document.querySelector('.btn-add-ct-phieu_nhap');
    const btn_cancel = document.querySelector('.btn-cancel-ct-phieu_nhap');
    const btn_reset = document.querySelector('.btn-reset-phieu_nhap');

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

    btn_start_add_ct.addEventListener('click', () => {
        btn_start_add_ct.disabled = true;
        btn_add_ct.disabled = false;
        btn_cancel.disabled = false;

        btn_add_pn.disabled = false;

        table_ct_phieu_nhap_xem.style.display = 'none';
        table_ct_phieu_nhap.style.display = 'table';

        ableInput();
    });

    btn_cancel.addEventListener('click', () => {
        btn_start_add_ct.disabled = false;
        btn_add_ct.disabled = true;
        btn_cancel.disabled = true;

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
        btn_add_ct.disabled = true;
        btn_cancel.disabled = true;

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

    function reset_table_phieu_nhap() {
        $(document).ready(function () {
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



    $(document).ready(function () {
        window.reset_select_nhacc = reset_select_nhacc; // Gán hàm vào window
    });

    // Nhớ thêm hàm reset_select_nhacc() bên nhà cc

    // $(document).ready(function() {
    //     reset_select_nhacc();
    // });  

});