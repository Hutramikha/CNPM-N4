document.addEventListener("DOMContentLoaded", () => {

    /* Các nút hành động */
    const btn_reset = document.querySelector('.btn-reset-phieu_muon');
    
    const input_search = document.querySelector('.search-input-phieu_muon');

    btn_reset.addEventListener('click', () => {
        input_search.value = '';
    });
    
    });