document.addEventListener("DOMContentLoaded", () => {
    const btn_reset = document.querySelector('.btn-reset-thongke');

    const input_search = document.querySelector('.search-input-thongke');

    const select_thongke = document.querySelector('.select_thongke');
    const select_thongke_theo_quy = document.querySelector('.select_thongke-theo_quy');

    const input_thongke_nam = document.querySelector('.input_thongke_nam');
    const input_thongke_tu_ngay = document.querySelector('.input_thongke_tu_ngay'); 
    const input_thongke_den_ngay = document.querySelector('.input_thongke_den_ngay');  

    function resetInput() {
        select_thongke.selectedIndex = 0;
        select_thongke_theo_quy.selectedIndex = 0;

        input_thongke_nam.value = '';
        input_thongke_tu_ngay.value = '';
        input_thongke_den_ngay.value = '';

        input_search.value = '';
    }

    btn_reset.addEventListener('click', () => {
        resetInput();

    });

    });