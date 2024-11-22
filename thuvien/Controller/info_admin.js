document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_edit = document.querySelector('.btn-edit-info_admin');
    const btn_save = document.querySelector('.btn-save-info_admin');
    const btn_cancel = document.querySelector('.btn-cancel-info_admin');
    
    const ten = document.querySelector(".info_admin-ten");
    const gioitinh = document.querySelector(".info_admin-gioitinh");
    const ngaysinh = document.querySelector(".info_admin-ngaysinh");
    const email = document.querySelector(".info_admin-email");
    const sdt = document.querySelector(".info_admin-sdt");
    const diachi = document.querySelector(".info_admin-diachi");
    const btn_img = document.querySelector(".info_admin-btn_img");

    btn_edit.addEventListener('click', () => {
        btn_edit.disabled = true; 
        btn_save.disabled = false;
        btn_cancel.disabled = false;  

        ten.disabled = false;
        gioitinh.disabled = false;
        ngaysinh.disabled = false;
        email.disabled = false;
        sdt.disabled = false;
        diachi.disabled = false;
        btn_img.disabled = false;
    });
    
    
});