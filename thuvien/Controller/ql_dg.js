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
        
        disableInput();
    });
    
    });