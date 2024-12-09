document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    // const btn_add = document.querySelector('.btn-add-dg');
    const btn_delete = document.querySelector('.btn-delete-dg');
    const btn_edit = document.querySelector('.btn-edit-dg');
    const btn_save = document.querySelector('.btn-save-dg');
    const btn_cancel = document.querySelector('.btn-cancel-dg');
    const btn_reset = document.querySelector('.btn-reset-dg');

    const input_search = document.querySelector('.search-input-dg');

    const img = document.querySelector('.image-dg');

    const input_ten_dg = document.querySelector('.input-ten_dg');
    const input_gioitinh_dg = document.querySelector('.input-gioitinh_dg');
    const select_loai_dg = document.querySelector('.select-loai_dg');
    const input_ngaysinh_dg = document.querySelector('.input-ngaysinh_dg');
    const input_email_dg = document.querySelector('.input-email_dg');
    const input_sdt_dg = document.querySelector('.input-sdt_dg');
    const input_diachi_dg = document.querySelector('.input-diachi_dg');

    function ableInput() {
        select_loai_dg.disabled = false;
    }

    function disableInput() {
        select_loai_dg.disabled = true;
    }

    function resetInput() {
        select_loai_dg.selectedIndex = 0;
    }
    
    // btn_add.addEventListener('click', () => {
    //     btn_delete.disabled = true;
    //     btn_edit.disabled = true;
    //     btn_save.disabled = false;
    //     btn_cancel.disabled = false;  
    // });
    
    btn_edit.addEventListener('click', () => {
        // btn_add.disabled = true;
        btn_delete.disabled = true; 
        btn_save.disabled = false;
        btn_cancel.disabled = false;  

        ableInput();
    });
    
    btn_delete.addEventListener('click', () => {
        
    });

    btn_cancel.addEventListener('click', () => {
        img.src = '../img/noimages.png';

        // btn_add.disabled = true;
        btn_delete.disabled = false;
        btn_edit.disabled = false;  
        btn_save.disabled = true;
        btn_cancel.disabled = true;  

        resetInput();
        disableInput();
    });

    btn_reset.addEventListener('click', () => {
        input_search.value = '';

        img.src = '../img/noimages.png';

        // btn_add.disabled = true;
        btn_delete.disabled = false;
        btn_edit.disabled = false; 
        btn_save.disabled = true;
        btn_cancel.disabled = true; 
        
        resetInput();
        disableInput();

        reset_table_docgia();
        reset_select_loaidocgia();
    });


    // FETCH DATA=========================================
    $(document).ready(function() {
        // Fetch dữ liệu từ server
        $.ajax({
            url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Hiển thị dữ liệu cho danh sách độc giả
                $.each(data.list_docgia, function(index, docgia) {
                    $('.table-docgia tbody').append(
                        '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + docgia.madg + '</td>' +
                            '<td>' + docgia.matk + '</td>' +
                            '<td>' + docgia.ten + '</td>' +
                            '<td>' + docgia.gioitinh + '</td>' +
                            '<td>' + docgia.maloaidocgia + '-' + docgia.tenloaidocgia + '</td>' +
                            '<td>' + docgia.ngaysinh + '</td>' +
                            '<td>' + docgia.email + '</td>' +
                            '<td>' + docgia.sdt + '</td>' +
                            '<td>' + docgia.diachi + '</td>' +
                        '</tr>'
                    );
                });

                // Đổ các option loại độc giả
                $.each(data.list_loaidocgia, function(index, loaidocgia) {
                    $('.select-loai_dg').append(
                        '<option value=' + '"' + loaidocgia.maloaidocgia + '"' + '>' +
                        loaidocgia.tenloaidocgia + '-' + loaidocgia.soluongsachtoida + ' quyển' + '</option>'
                    );
                });
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });

    function reset_table_docgia() {
        $(document).ready(function() {
            $('.table-docgia tbody').empty();
            // Fetch dữ liệu từ server
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Hiển thị dữ liệu cho danh sách độc giả
                    $.each(data.list_docgia, function(index, docgia) {
                        $('.table-docgia tbody').append(
                            '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + docgia.madg + '</td>' +
                                '<td>' + docgia.matk + '</td>' +
                                '<td>' + docgia.ten + '</td>' +
                                '<td>' + docgia.gioitinh + '</td>' +
                                '<td>' + docgia.maloaidocgia + '-' + docgia.tenloaidocgia + '</td>' +
                                '<td>' + docgia.ngaysinh + '</td>' +
                                '<td>' + docgia.email + '</td>' +
                                '<td>' + docgia.sdt + '</td>' +
                                '<td>' + docgia.diachi + '</td>' +
                            '</tr>'
                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    }

    function reset_select_loaidocgia() {
        $(document).ready(function() {
            var option0 = $('.select-loai_dg option[value="0"]').clone();
            $('.select-loai_dg').empty();
            // Fetch dữ liệu từ server
            $('.select-loai_dg').append(option0);
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Đổ các option loại độc giả
                    $.each(data.list_loaidocgia, function(index, loaidocgia) {
                        $('.select-loai_dg').append(
                            '<option value=' + '"' + loaidocgia.maloaidocgia + '"' + '>' +
                            loaidocgia.tenloaidocgia + '-' + loaidocgia.soluongsachtoida + ' quyển' + '</option>'
                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    }

     //======================================Tìm kiếm độc giả
    $(document).ready(function() {
        // Hàm tìm kiếm độc giả
        function searchReaders() {
            const searchQuery = $('.search-input-dg').val();
    
            if (searchQuery.trim() === '') {
                $('.table-docgia tbody').empty(); // Nếu không có từ khóa, xóa kết quả
                $('.table-docgia tbody').append('<tr><td colspan="10">Không tìm thấy độc giả nào.</td></tr>');
                return;
            }
    
            $.ajax({
                url: '../DAO/database/fetch_data.php', // Tập tin PHP xử lý tìm kiếm
                method: 'GET',
                dataType: 'json', // Định dạng dữ liệu trả về là JSON
                data: { search_docgia: searchQuery },
                success: function(data) {
                    $('.table-docgia tbody').empty(); // Xóa kết quả cũ
                    if (data.list_timkiem_docgia.length > 0) {
                        $.each(data.list_timkiem_docgia, function(index, docgia) {
                            $('.table-docgia tbody').append(
                                '<tr>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + docgia.madg + '</td>' +
                                    '<td>' + docgia.matk + '</td>' +
                                    '<td>' + docgia.ten + '</td>' +
                                    '<td>' + docgia.gioitinh + '</td>' +
                                    '<td>' + docgia.maloaidocgia + '-' + docgia.tenloaidocgia + '</td>' +
                                    '<td>' + docgia.ngaysinh + '</td>' +
                                    '<td>' + docgia.email + '</td>' +
                                    '<td>' + docgia.sdt + '</td>' +
                                    '<td>' + docgia.diachi + '</td>' +
                                '</tr>'
                            );
                        });
                    } else {
                        $('.table-docgia tbody').append('<tr><td colspan="10">Không tìm thấy độc giả nào.</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        }
    
        // Tìm kiếm khi nhấn nút
        $('.btn-search-dg').on('click', function() {
            searchReaders();
        });
    
        // Tìm kiếm khi nhấn phím Enter
        $('.search-input-dg').on('keypress', function(e) {
            if (e.which === 13) { // Kiểm tra phím Enter
                searchReaders();
                return false; // Ngăn chặn hành vi mặc định của Enter
            }
        });
    });


    
    $(document).ready(function() {
        window.reset_select_loaidocgia = reset_select_loaidocgia; // Gán hàm vào window
    });

});