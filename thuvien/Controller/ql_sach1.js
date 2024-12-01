
function sapXep(mavach) {
    // Logic xử lý sắp xếp với mavach
    console.log('Sắp xếp cho mã vạch:', mavach);
    // Tiến hành các bước xử lý khác như mở modal hay gửi yêu cầu đến server...
}

document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_add = document.querySelector('.btn-add-sach');
    const btn_delete = document.querySelector('.btn-delete-sach');
    const btn_edit = document.querySelector('.btn-edit-sach');
    const btn_save = document.querySelector('.btn-save-sach');
    const btn_cancel = document.querySelector('.btn-cancel-sach');
    const btn_reset = document.querySelector('.btn-reset-sach');

    const input_search = document.querySelector('.search-input-sach');

    const img = document.querySelector('.image-sach');

    const input_ten_sach = document.querySelector('.input-ten_sach');
    const select_theloai_sach = document.querySelector('.select-theloai_sach');
    const input_tomtat_sach = document.querySelector('.input-tomtat_sach');
    const select_nhaxuatban_sach = document.querySelector('.select-nhaxuatban_sach');
    const select_tacgia_sach = document.querySelector('.select-tacgia_sach');
    const input_phimuon_sach = document.querySelector('.input-phimuon_sach');
    const input_soluong_sach = document.querySelector('.input-soluong_sach');
    const input_img_sach = document.querySelector('.input-img_sach');
    const select_tinhtrang_sach = document.querySelector('.select-tinhtrang_sach');

    function ableInput() {
        input_ten_sach.disabled = false;
        select_theloai_sach.disabled = false;
        input_tomtat_sach.disabled = false;
        select_nhaxuatban_sach.disabled = false;
        select_tacgia_sach.disabled = false;
        input_phimuon_sach.disabled = false;
        // input_soluong_sach.disabled = false;
        input_img_sach.disabled = false;
        select_tinhtrang_sach.disabled = false;
    };

    function disavailInput() {
        input_ten_sach.disabled = true;
        select_theloai_sach.disabled = true;
        input_tomtat_sach.disabled = true;
        select_nhaxuatban_sach.disabled = true;
        select_tacgia_sach.disabled = true;
        input_phimuon_sach.disabled = true;
        // input_soluong_sach.disabled = true;
        input_img_sach.disabled = true;
        select_tinhtrang_sach.disabled = true;
    };

    function resetInput() {
        input_ten_sach.value = '';
        input_tomtat_sach.value = '';
        input_phimuon_sach.value = '';
        input_img_sach.value = '';

        select_theloai_sach.selectedIndex = 0;
        select_nhaxuatban_sach.selectedIndex = 0;
        select_tacgia_sach.selectedIndex = 0;
        select_tinhtrang_sach.selectedIndex = 0;
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

        btn_save.disabled = true;
        btn_cancel.disabled = true;

        btn_add.disabled = false;
        btn_edit.disabled = false;
        btn_delete.disabled = false;

        resetInput();
        disavailInput();

        reset_select_theloai();
        reset_select_nhaxuatban();
        reset_select_tacgia();
        reset_select_tinhtrangsach_sach();
    });

    btn_reset.addEventListener('click', () => {
        input_search.value = '';

        img.src = '../img/noimages.png';

        btn_save.disabled = true;
        btn_cancel.disabled = true;

        btn_add.disabled = false;
        btn_edit.disabled = false;
        btn_delete.disabled = false;

        resetInput();
        disavailInput();
        reset_table_sach();

        reset_select_theloai();
        reset_select_nhaxuatban();
        reset_select_tacgia();
        reset_select_tinhtrangsach_sach();
        
    });

    $(document).ready(function () {
        // Fetch dữ liệu từ server
        $.ajax({
            url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Hiển thị dữ liệu cho danh sách sách
                $.each(data.list_sach, function (index, sach) {
                    $('.table-sach tbody').append(
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + sach.masach + '</td>' +
                        '<td>' + sach.tensach + '</td>' +
                        '<td>' + sach.tomtat + '</td>' +
                        '<td>' + sach.matl + '</td>' +
                        '<td>' + sach.manxb + '</td>' +
                        '<td>' + sach.matg + '</td>' +
                        '<td>' + sach.soluong + '</td>' +
                        '<td>' + sach.phimuon + ' VNĐ' + '</td>' +
                        '</tr>'
                    );
                });

                // Hiển thị dữ liệu cho danh sách sách cần sắp xếp
                $.each(data.list_chitiet_sach_chua_sapxep, function (index, chitiet_sach_chua_sapxep) {
                    $('.table-sach_sapxep tbody').append(
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + chitiet_sach_chua_sapxep.masach + '</td>' +
                        '<td>' + chitiet_sach_chua_sapxep.mavach + '</td>' +
                        '<td>' + '<button class="btn-sap-xep" onclick="sapXep(' + chitiet_sach_chua_sapxep.mavach + ')">Sắp Xếp</button>' + '</td>' +
                        '</tr>'
                    );
                });

                // Đổ các option thể loại
                $.each(data.list_theloai, function (index, theloai) {
                    $('.select-theloai_sach').append(
                        '<option value=' + '"' + theloai.matl + '"' + '>' +
                        theloai.matl + '-' + theloai.tentl + '</option>'
                    );
                });

                // Đổ các option nhà xuất bản
                $.each(data.list_nhaxuatban, function (index, nhaxuatban) {
                    $('.select-nhaxuatban_sach').append(
                        '<option value=' + '"' + nhaxuatban.manxb + '"' + '>' +
                        nhaxuatban.manxb + '-' + nhaxuatban.tennxb + '</option>'
                    );
                });

                // Đổ các option tác giả
                $.each(data.list_tacgia, function (index, tacgia) {
                    $('.select-tacgia_sach').append(
                        '<option value=' + '"' + tacgia.matg + '"' + '>' +
                        tacgia.matg + '-' + tacgia.tentg + '</option>'
                    );
                });

                // Đổ các option tình trạng sách
                $.each(data.list_tinhtrangsach, function (index, tinhtrangsach) {
                    $('.select-tinhtrang_sach').append(
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


    function reset_table_sach() {
        $(document).ready(function () {
            $('.table-sach tbody').empty();
            $('.table-sach_sapxep tbody').empty();
            // Fetch dữ liệu từ server
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Hiển thị dữ liệu cho danh sách sách
                    $.each(data.list_sach, function (index, sach) {
                        $('.table-sach tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + sach.masach + '</td>' +
                            '<td>' + sach.tensach + '</td>' +
                            '<td>' + sach.tomtat + '</td>' +
                            '<td>' + sach.matl + '</td>' +
                            '<td>' + sach.manxb + '</td>' +
                            '<td>' + sach.matg + '</td>' +
                            '<td>' + sach.soluong + '</td>' +
                            '<td>' + sach.phimuon + ' VNĐ' + '</td>' +
                            '</tr>'
                        );
                    });

                    // Hiển thị dữ liệu cho danh sách sách cần sắp xếp
                    $.each(data.list_chitiet_sach_chua_sapxep, function (index, chitiet_sach_chua_sapxep) {
                        $('.table-sach_sapxep tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + chitiet_sach_chua_sapxep.masach + '</td>' +
                            '<td>' + chitiet_sach_chua_sapxep.mavach + '</td>' +
                            '<td>' + '<button class="btn-sap-xep" onclick="sapXep(' + chitiet_sach_chua_sapxep.mavach + ')">Sắp Xếp</button>' + '</td>' +
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

    function reset_select_theloai() {
        $(document).ready(function () {
            var option0 = $('.select-theloai_sach option[value="0"]').clone();
            $('.select-theloai_sach').empty();
            // Fetch dữ liệu từ server
            $('.select-theloai_sach').append(option0);
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Đổ các option thể loại
                    $.each(data.list_theloai, function (index, theloai) {
                        $('.select-theloai_sach').append(
                            '<option value=' + '"' + theloai.matl + '"' + '>' +
                            theloai.matl + '-' + theloai.tentl + '</option>'
                        );
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    }

    function reset_select_nhaxuatban() {
        $(document).ready(function () {
            var option0 = $('.select-nhaxuatban_sach option[value="0"]').clone();
            $('.select-nhaxuatban_sach').empty();
            // Fetch dữ liệu từ server
            $('.select-nhaxuatban_sach').append(option0);
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Đổ các option nhà xuất bản
                    $.each(data.list_nhaxuatban, function (index, nhaxuatban) {
                        $('.select-nhaxuatban_sach').append(
                            '<option value=' + '"' + nhaxuatban.manxb + '"' + '>' +
                            nhaxuatban.manxb + '-' + nhaxuatban.tennxb + '</option>'
                        );
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    }

    function reset_select_tacgia() {
        $(document).ready(function () {
            var option0 = $('.select-tacgia_sach option[value="0"]').clone();
            $('.select-tacgia_sach').empty();
            // Fetch dữ liệu từ server
            $('.select-tacgia_sach').append(option0);
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Đổ các option tác giả
                    $.each(data.list_tacgia, function (index, tacgia) {
                        $('.select-tacgia_sach').append(
                            '<option value=' + '"' + tacgia.matg + '"' + '>' +
                            tacgia.matg + '-' + tacgia.tentg + '</option>'
                        );
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    }

    function reset_select_tinhtrangsach_sach() {
        $(document).ready(function () {
            var option0 = $('.select-tinhtrang_sach option[value="-1"]').clone();
            $('.select-tinhtrang_sach').empty();
            // Fetch dữ liệu từ server
            $('.select-tinhtrang_sach').append(option0);
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Đổ các option tình trạng sách
                    $.each(data.list_tinhtrangsach, function (index, tinhtrangsach) {
                        $('.select-tinhtrang_sach').append(
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



    $(document).ready(function () {
        window.reset_table_sach = reset_table_sach;
        window.reset_select_theloai = reset_select_theloai;
        window.reset_select_nhaxuatban = reset_select_nhaxuatban;
        window.reset_select_tacgia = reset_select_tacgia;
        window.reset_select_tinhtrangsach_sach = reset_select_tinhtrangsach_sach;
    });

    // Nhớ thêm hàm reset_select_nhacc() bên nhà cc

    // $(document).ready(function() {
    //     reset_select_nhacc();
    // }); 

});