document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_add = document.querySelector('.btn-add-nv');
    const btn_delete = document.querySelector('.btn-delete-nv');
    const btn_edit = document.querySelector('.btn-edit-nv');
    const btn_save = document.querySelector('.btn-save-nv');
    const btn_cancel = document.querySelector('.btn-cancel-nv');
    const btn_reset = document.querySelector('.btn-reset-nv');

    const input_search = document.querySelector('.search-input-nv');

    const img = document.querySelector('.image-nv');

    const input_ten_nv = document.querySelector('.input-ten_nv');
    const select_gioitinh_nv = document.querySelector('.select-gioitinh_nv');
    const input_ngaysinh_nv = document.querySelector('.input-ngaysinh_nv');
    const input_email_nv = document.querySelector('.input-email_nv');
    const input_sdt_nv = document.querySelector('.input-sdt_nv');
    const input_diachi_nv = document.querySelector('.input-diachi_nv');
    const input_img_nv = document.querySelector('.input-img_nv');

    function ableInput() {
        input_ten_nv.disabled = false;
        select_gioitinh_nv.disabled = false;
        input_ngaysinh_nv.disabled = false;
        input_email_nv.disabled = false;
        input_sdt_nv.disabled = false;
        input_diachi_nv.disabled = false;
        input_img_nv.disabled = false;
    }

    function disableInput() {
        input_ten_nv.disabled = true;
        select_gioitinh_nv.disabled = true;
        input_ngaysinh_nv.disabled = true;
        input_email_nv.disabled = true;
        input_sdt_nv.disabled = true;
        input_diachi_nv.disabled = true;
        input_img_nv.disabled = true;
    }

    function resetInput() {
        input_ten_nv.value = '';
        input_ngaysinh_nv.value = '';
        input_email_nv.value = '';
        input_sdt_nv.value = '';
        input_diachi_nv.value = '';
        input_img_nv.value = '';
    
        select_gioitinh_nv.selectedIndex = 0;
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

        btn_add.disabled = false;
        btn_edit.disabled = false;
        btn_delete.disabled = false; 
        btn_save.disabled = true;
        btn_cancel.disabled = true;
        
        disableInput();
        resetInput();
    });

    btn_reset.addEventListener('click', () => {
        input_search.value = '';

        img.src = '../img/noimages.png';

        btn_add.disabled = false;
        btn_edit.disabled = false;
        btn_delete.disabled = false; 
        btn_save.disabled = true;
        btn_cancel.disabled = true;
        
        disableInput();
        resetInput();
    });
    
});