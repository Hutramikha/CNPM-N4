document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_start_ct_pt = document.querySelector('.btn-start-ct-phieu_tra');
    const btn_add_ct_pt = document.querySelector('.btn-add-ct-phieu_tra');
    const btn_create_pt = document.querySelector('.btn-create-pt');
    const btn_cancel = document.querySelector('.btn-cancel-ct-phieu_tra');
    const btn_reset = document.querySelector('.btn-reset-phieu_tra');
    
    const input_search = document.querySelector('.search-input-phieu_tra');

    const input_mavach_sach = document.querySelector('.input-mavach_sach');
    const input_ma_phieu_muon = document.querySelector('.input-ma_phieu_muon');
    const select_tinhtrang_sach = document.querySelector('.select-tinhtrang_sach');
    const input_vitri_sach_pt = document.querySelector('.input-vitri_sach_pt');
    const select_phat_sach = document.querySelector('.select-phat_sach');
    const input_phiphat_sach = document.querySelector('.input-phiphat_sach');

    function ableInput() {
        select_tinhtrang_sach.disabled = false;
        select_phat_sach.disabled = false;
    }

    function disableInput() {
        select_tinhtrang_sach.disabled = true;
        select_phat_sach.disabled = true;
    }

    function resetInput() {
        input_mavach_sach.value = '';
        input_ma_phieu_muon.value = '';
        input_vitri_sach_pt.value = '';
        input_phiphat_sach.value = '';
    
        select_tinhtrang_sach.selectedIndex = 0;
        select_phat_sach.selectedIndex = 0;
    }

    btn_start_ct_pt.addEventListener('click', () => {
        btn_start_ct_pt.disabled = true;
        btn_add_ct_pt.disabled = false;
        btn_create_pt.disabled = false;
        btn_cancel.disabled = false;
        
        ableInput();
    });
    
    btn_cancel.addEventListener('click', () => {
        btn_start_ct_pt.disabled = false;
        btn_add_ct_pt.disabled = true;
        btn_create_pt.disabled = true;
        btn_cancel.disabled = true;
        
        resetInput();
        disableInput();
    });
   

    btn_reset.addEventListener('click', () => {
        input_search.value = '';

        btn_start_ct_pt.disabled = false;
        btn_add_ct_pt.disabled = true;
        btn_create_pt.disabled = true;
        btn_cancel.disabled = true;
        
        resetInput();
        disableInput();
    });

    btn_add_ct_pt.addEventListener('click', () => {
        
    });
    
    });