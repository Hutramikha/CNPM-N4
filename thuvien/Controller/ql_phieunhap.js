document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_add_ct = document.querySelector('.btn-start-ct-phieu_nhap');
    const btn_save = document.querySelector('.btn-add-ct-phieu_nhap');
    const btn_cancel = document.querySelector('.btn-cancel-ct-phieu_nhap');
    
    btn_add_ct.addEventListener('click', () => {
        btn_add_ct.disabled = true;
        btn_save.disabled = false;
        btn_cancel.disabled = false;  
    });
    
    
    });