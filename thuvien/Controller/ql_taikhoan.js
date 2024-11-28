document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_delete = document.querySelector('.btn-delete-taikhoan');
    const btn_edit = document.querySelector('.btn-edit-taikhoan');
    const btn_save = document.querySelector('.btn-save-taikhoan');
    const btn_cancel = document.querySelector('.btn-cancel-taikhoan');
    const btn_reset = document.querySelector('.btn-reset-taikhoan');
    
    const input_search = document.querySelector('.search-input-taikhoan');

    const input_username_tk = document.querySelector('.input-username_tk');
    const input_password_tk = document.querySelector('.input-password_tk');
    const select_quyen_tk = document.querySelector('.select-quyen_tk');
    const input_ngaytao_tk = document.querySelector('.input-ngaytao_tk');

    function ableInput() {
        // input_username_tk.disabled = false;
        // input_password_tk.disabled = false;
        select_quyen_tk.disabled = false;
        // input_ngaytao_tk.disabled = false;
    }

    function disableInput() {
        // input_username_tk.disabled = true;
        // input_password_tk.disabled = true;
        select_quyen_tk.disabled = true;
        // input_ngaytao_tk.disabled = true;
    }

    function resetInput() {
        input_username_tk.value = '';
        input_password_tk.value = '';
        input_ngaytao_tk.value = '';
    
        select_quyen_tk.selectedIndex = 0;
    }
    
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
        // btn_add.disabled = true;
        btn_delete.disabled = false; 
        btn_save.disabled = true;
        btn_cancel.disabled = true;
        
        resetInput();
        disableInput();
    });

    btn_reset.addEventListener('click', () => {
        input_search.value = '';

        // btn_add.disabled = true;
        btn_edit.disabled = false;
        btn_delete.disabled = false; 
        btn_save.disabled = true;
        btn_cancel.disabled = true;
        
        resetInput();
        disableInput();
    });
    
    });