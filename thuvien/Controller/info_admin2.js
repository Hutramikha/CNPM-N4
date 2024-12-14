document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_edit = document.querySelector('.btn-edit-info_admin');
    const btn_save = document.querySelector('.btn-save-info_admin');
    const btn_cancel = document.querySelector('.btn-cancel-info_admin');

    const img = document.querySelector('.image-nv-info');

    const input_img_admin_info = document.querySelector('.info_admin-btn_img');
    
    const ten = document.querySelector(".info_admin-ten");
    const gioitinh = document.querySelector(".info_admin-gioitinh");
    const ngaysinh = document.querySelector(".info_admin-ngaysinh");
    const email = document.querySelector(".info_admin-email");
    const sdt = document.querySelector(".info_admin-sdt");
    const diachi = document.querySelector(".info_admin-diachi");
    const btn_img = document.querySelector(".info_admin-btn_img");

    function ableInput() {
        ten.disabled = false;
        gioitinh.disabled = false;
        ngaysinh.disabled = false;
        email.disabled = false;
        sdt.disabled = false;
        diachi.disabled = false;
        btn_img.disabled = false;
    }

    function disableInput() {
        ten.disabled = true;
        gioitinh.disabled = true;
        ngaysinh.disabled = true;
        email.disabled = true;
        sdt.disabled = true;
        diachi.disabled = true;
        btn_img.disabled = true;
    }

    btn_edit.addEventListener('click', () => {
        btn_edit.disabled = true; 
        btn_save.disabled = false;
        btn_cancel.disabled = false;  

        ableInput();
    });

    btn_cancel.addEventListener('click', () => {
        btn_edit.disabled = false; 
        btn_save.disabled = true;
        btn_cancel.disabled = true; 

        input_img_admin_info.value = '';
        
        img.src = '../img/noimages.png';

        disableInput();
    });
    
});



    // Hàm để lấy thông tin tài khoản dựa trên mã tài khoản (matk)
    function getUserInfo(matk) {
        $.ajax({
            url: '../DAO/database/fetch_data.php', // Đường dẫn đến file PHP
            type: 'POST',
            data: { matk_info: matk }, // Gửi mã tài khoản từ tham số
            dataType: 'json',
            success: function (data) {
                console.log('Phản hồi từ server:', data.list_thongtin_taikhoan);
                if (data.list_thongtin_taikhoan && Object.keys(data.list_thongtin_taikhoan).length > 0) {
                    // Điền thông tin vào các trường input
                    $('.info_admin-ten').val(data.list_thongtin_taikhoan.ten);
                    $('.info_admin-gioitinh').val(data.list_thongtin_taikhoan.gioitinh);
                    $('.info_admin-ngaysinh').val(data.list_thongtin_taikhoan.ngaysinh);
                    $('.info_admin-email').val(data.list_thongtin_taikhoan.email);
                    $('.info_admin-sdt').val(data.list_thongtin_taikhoan.sdt);
                    $('.info_admin-diachi').val(data.list_thongtin_taikhoan.diachi);
                    // Hiển thị ảnh nếu có
                    if (data.list_thongtin_taikhoan.img !== null) {
                        $('.image-nv-info').attr('src', '../img/' + data.list_thongtin_taikhoan.img);
                    } else {
                        $('.image-nv-info').attr('src', '../img/noimages.png'); // Hình mặc định
                    }
                } else {
                    console.log(data.message || "Không có thông tin tài khoản.");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Lỗi khi gửi yêu cầu:', textStatus, errorThrown);
            }
        });
    }
    
    // Gọi hàm với mã tài khoản cụ thể
    // getUserInfo('ttda0864');




// Hàm chọn ảnh
let imagePathNVinfo;
function previewImageNV(event) {
    const input = event.target;
    const imagePreview = document.querySelector('.image-nv-info');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.src = e.target.result; // Cập nhật src của img với dữ liệu hình ảnh
        }
        reader.readAsDataURL(input.files[0]); // Đọc tệp hình ảnh
    }
}