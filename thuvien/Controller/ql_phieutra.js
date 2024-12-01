document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_start_ct_pt = document.querySelector('.btn-start-ct-phieu_tra');
    const btn_add_ct_pt = document.querySelector('.btn-add-ct-phieu_tra');
    const btn_create_pt = document.querySelector('.btn-create-pt');
    const btn_cancel = document.querySelector('.btn-cancel-ct-phieu_tra');
    const btn_reset = document.querySelector('.btn-reset-phieu_tra');

    const input_search = document.querySelector('.search-input-phieu_tra');

    const input_mavach_sach = document.querySelector('.input-mavach_sach');
    const input_ma_phieu_muon = document.querySelector('.input-ma_phieu_muon');
    const select_tinhtrang_sach_pt = document.querySelector('.select-tinhtrang_sach_pt');
    const input_vitri_sach_pt = document.querySelector('.input-vitri_sach_pt');
    const select_phat_sach = document.querySelector('.select-phat_sach');
    const input_phiphat_sach = document.querySelector('.input-phiphat_sach');

    function ableInput() {
        select_tinhtrang_sach_pt.disabled = false;
        select_phat_sach.disabled = false;
    }

    function disableInput() {
        select_tinhtrang_sach_pt.disabled = true;
        select_phat_sach.disabled = true;
    }

    function resetInput() {
        input_mavach_sach.value = '';
        input_ma_phieu_muon.value = '';
        input_vitri_sach_pt.value = '';
        input_phiphat_sach.value = '';

        select_tinhtrang_sach_pt.selectedIndex = 0;
        select_phat_sach.selectedIndex = 0;
    }

    btn_start_ct_pt.addEventListener('click', () => {
        btn_start_ct_pt.disabled = true;
        btn_add_ct_pt.disabled = false;
        btn_create_pt.disabled = false;
        btn_cancel.disabled = false;

        ableInput();
    });

    btn_cancel.addEventListener('click', () => {
        btn_start_ct_pt.disabled = false;
        btn_add_ct_pt.disabled = true;
        btn_create_pt.disabled = true;
        btn_cancel.disabled = true;

        resetInput();
        disableInput();
        reset_select_hinhthucphat();
        reset_select_tinhtrang_pt();
    });


    btn_reset.addEventListener('click', () => {
        input_search.value = '';

        btn_start_ct_pt.disabled = false;
        btn_add_ct_pt.disabled = true;
        btn_create_pt.disabled = true;
        btn_cancel.disabled = true;

        resetInput();
        disableInput();
        reset_table_phieutra();
        reset_select_hinhthucphat();
        reset_select_tinhtrang_pt();
    });

    btn_add_ct_pt.addEventListener('click', () => {

    });

    // FETCH DATA=========================================
    $(document).ready(function () {
        // Fetch dữ liệu từ server
        $.ajax({
            url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Hiển thị dữ liệu cho danh sách chi tiết sách đã mượn
                $.each(data.list_chitiet_sach_da_muon, function (index, chitiet_sach_da_muon) {
                    $('.table-ct-sach_da_muon tbody').append(
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + chitiet_sach_da_muon.mavach + '</td>' +
                        '<td>' + chitiet_sach_da_muon.mapm + '</td>' +
                        '<td>' + chitiet_sach_da_muon.madg + '</td>' +
                        '<td>' + chitiet_sach_da_muon.manv + '</td>' +
                        '<td>' + chitiet_sach_da_muon.matinhtrang + '</td>' +
                        '<td>' + chitiet_sach_da_muon.khu + '</td>' +
                        '</tr>'
                    );
                });

                // Hiển thị dữ liệu cho danh sách phiếu trả
                $.each(data.list_phieutra, function (index, phieutra) {
                    $('.table-phieu_tra tbody').append(
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + phieutra.mapt + '</td>' +
                        '<td>' + phieutra.ngaytra + '</td>' +
                        '<td>' + phieutra.mapm + '</td>' +
                        '<td>' + phieutra.madg + '</td>' +
                        '<td>' + phieutra.manv + '</td>' +
                        '<td>' + phieutra.tongphiphat + ' VNĐ' + '</td>' +
                        '</tr>'
                    );
                });

                // Đổ các option hình thức phạt
                $.each(data.list_hinhthucphat, function (index, hinhthucphat) {
                    $('.select-phat_sach').append(
                        '<option value=' + '"' + hinhthucphat.maphat + '"' + '>' +
                        hinhthucphat.lydophat + '</option>'
                    );
                });

                // Đổ các option tình trạng sách
                $.each(data.list_tinhtrangsach, function (index, tinhtrangsach) {
                    $('.select-tinhtrang_sach_pt').append(
                        '<option value=' + '"' + tinhtrangsach.matinhtrang + '"' + '>' +
                        tinhtrangsach.motatinhtrang + '</option>'
                    );
                });
            },
            error: function (xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });

    function reset_table_phieutra() {
        $(document).ready(function () {
            $('.table-ct-sach_da_muon tbody').empty();
            $('.table-phieu_tra tbody').empty();
            $('.table-ct-sach_tra tbody').empty();
            $('.table-ct-phieu_tra tbody').empty();
            // Fetch dữ liệu từ server
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Hiển thị dữ liệu cho danh sách chi tiết sách đã mượn
                    // Hiển thị dữ liệu cho danh sách chi tiết sách đã mượn
                    $.each(data.list_chitiet_sach_da_muon, function (index, chitiet_sach_da_muon) {
                        $('.table-ct-sach_da_muon tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + chitiet_sach_da_muon.mavach + '</td>' +
                            '<td>' + chitiet_sach_da_muon.mapm + '</td>' +
                            '<td>' + chitiet_sach_da_muon.madg + '</td>' +
                            '<td>' + chitiet_sach_da_muon.manv + '</td>' +
                            '<td>' + chitiet_sach_da_muon.matinhtrang + '</td>' +
                            '<td>' + chitiet_sach_da_muon.khu + '</td>' +
                            '</tr>'
                        );
                    });

                    // Hiển thị dữ liệu cho danh sách phiếu trả
                    $.each(data.list_phieutra, function (index, phieutra) {
                        $('.table-phieu_tra tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + phieutra.mapt + '</td>' +
                            '<td>' + phieutra.ngaytra + '</td>' +
                            '<td>' + phieutra.mapm + '</td>' +
                            '<td>' + phieutra.madg + '</td>' +
                            '<td>' + phieutra.manv + '</td>' +
                            '<td>' + phieutra.tongphiphat + ' VNĐ' + '</td>' +
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

    function reset_select_tinhtrang_pt() {
        $(document).ready(function () {
            var option0 = $('.select-tinhtrang_sach_pt option[value="-1"]').clone();
            $('.select-tinhtrang_sach_pt').empty();
            // Fetch dữ liệu từ server
            $('.select-tinhtrang_sach_pt').append(option0);
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Đổ các option tình trạng sách
                    $.each(data.list_tinhtrangsach, function (index, tinhtrangsach) {
                        $('.select-tinhtrang_sach_pt').append(
                            '<option value=' + '"' + tinhtrangsach.matinhtrang + '"' + '>' +
                            tinhtrangsach.motatinhtrang + '</option>'
                        );
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    }

    function reset_select_hinhthucphat() {
        $(document).ready(function () {
            var option0 = $('.select-phat_sach option[value="0"]').clone();
            $('.select-phat_sach').empty();
            // Fetch dữ liệu từ server
            $('.select-phat_sach').append(option0);
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Đổ các option loại độc giả
                    $.each(data.list_hinhthucphat, function (index, hinhthucphat) {
                        $('.select-phat_sach').append(
                            '<option value=' + '"' + hinhthucphat.maphat + '"' + '>' +
                            hinhthucphat.lydophat + '</option>'
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
        window.reset_select_hinhthucphat = reset_select_hinhthucphat; // Gán hàm vào window
        window.reset_select_tinhtrang_pt = reset_select_tinhtrang_pt;
    });

    // $(document).ready(function() {
    //     reset_select_hinhthucphat();
    //     reset_select_tinhtrang_pt();
    // });  

});