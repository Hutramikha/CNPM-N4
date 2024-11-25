document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    // const btn_add = document.querySelector('.btn-add-dg');
    const btn_delete = document.querySelector('.btn-delete-dg');
    const btn_edit = document.querySelector('.btn-edit-dg');
    const btn_save = document.querySelector('.btn-save-dg');
    const btn_cancel = document.querySelector('.btn-cancel-dg');
    
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
    });
    
    btn_delete.addEventListener('click', () => {
        
    });
    
    });