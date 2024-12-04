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
            $('.table-ct-sach tbody').empty();
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
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    }

    // sự kiện click vào bảng sách để xem chi tiết sách
    $(document).ready(function () {
        $('.table-sach tbody').on('click', 'tr', function () {
            var masach = $(this).find('td').eq(1).text(); // Lấy giá trị từ ô <td> thứ hai
            console.log(masach);
            $('.table-ct-sach tbody').empty();
            // Thực hiện truy vấn AJAX để lấy chitietsach với masach
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP xử lý
                method: 'POST',
                data: { masach_xemchitiet: masach },
                dataType: 'json',
                success: function (data) {
                    $.each(data.list_chitiet_sach_xem, function (index, chitietsach_xem) {
                        $('.table-ct-sach tbody').append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + chitietsach_xem.mavach + '</td>' +
                            '<td>' + chitietsach_xem.masach + '</td>' +
                            '<td>' + chitietsach_xem.matinhtrang + '</td>' +
                            '<td>' + chitietsach_xem.trangthai + '</td>' +
                            '<td>' + (chitietsach_xem.khu === null ? 
                                '<button class="btn-sap-xep" onclick="xuLySapXep(' + chitietsach_xem.mavach + ')">Sắp xếp</button>' : 
                                chitietsach_xem.khu) + 
                            '</td>' +
                            '<td>' + 
                                '<button class="btn-xoa_chitiet_sach" onclick="xoactSach(' + chitietsach_xem.mavach + ')">Xóa</button>' + 
                            '</td>' +
                            '</tr>'
                        );
                        console.log(chitietsach_xem.mavach);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    });

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

// Hàm xóa chi tiết sách
function xoactSach(mavach) {
    // Xử lý xóa sách, có thể thực hiện AJAX để xóa khỏi cơ sở dữ liệu
    console.log("Xóa sách với mã vạch: " + mavach);
}

// Hàm sắp xếp chi tiết sách
function xuLySapXep(mavach) {
    // Xử lý sắp xếp sách, có thể thực hiện AJAX hoặc xử lý khác
    console.log("Xử lý sắp xếp cho mã vạch: " + mavach);
}

// Hàm chọn ảnh
let imagePathSach;
function previewImageSach(event) {
    const input = event.target; // Lấy input file
    const imagePreview = document.querySelector('.image-sach');

    if (input.files && input.files[0]) {
        const reader = new FileReader(); // Tạo đối tượng FileReader

        reader.onload = function(e) {
            imagePreview.src = e.target.result; // Cập nhật src của img với dữ liệu hình ảnh
        }

        reader.readAsDataURL(input.files[0]); // Đọc tệp hình ảnh

        // Lưu đường dẫn tạm thời (base64) để sử dụng sau này
        imagePathSach = URL.createObjectURL(input.files[0]);
        console.log("Đường dẫn hình ảnh:", imagePathSach); // Bạn có thể lưu đường dẫn này vào database sau này
    }
}
