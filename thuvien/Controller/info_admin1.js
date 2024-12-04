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

// Hàm chọn ảnh
let imagePathNVinfo;
function previewImageNVinfo(event) {
    const input = event.target; // Lấy input file
    const imagePreview = document.querySelector('.image-nv-info');

    if (input.files && input.files[0]) {
        const reader = new FileReader(); // Tạo đối tượng FileReader

        reader.onload = function(e) {
            imagePreview.src = e.target.result; // Cập nhật src của img với dữ liệu hình ảnh
        }

        reader.readAsDataURL(input.files[0]); // Đọc tệp hình ảnh

        // Lưu đường dẫn tạm thời (base64) để sử dụng sau này
        imagePathNVinfo = URL.createObjectURL(input.files[0]);
        console.log("Đường dẫn hình ảnh:", imagePathNVinfo); // Bạn có thể lưu đường dẫn này vào database sau này
    }
}