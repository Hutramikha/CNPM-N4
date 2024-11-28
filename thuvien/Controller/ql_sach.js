document.addEventListener("DOMContentLoaded", () => {

/* Các nút hành động */
const btn_add = document.querySelector('.btn-add-sach');
const btn_delete = document.querySelector('.btn-delete-sach');
const btn_edit = document.querySelector('.btn-edit-sach');
const btn_save = document.querySelector('.btn-save-sach');
const btn_cancel = document.querySelector('.btn-cancel-sach');
const btn_reset = document.querySelector('.btn-reset-sach');

const input_search = document.querySelector('.search-input-sach');

const img = document.querySelector('.image-sach');

const input_ten_sach = document.querySelector('.input-ten_sach');
const select_theloai_sach = document.querySelector('.select-theloai_sach');
const input_tomtat_sach = document.querySelector('.input-tomtat_sach');
const select_nhaxuatban_sach = document.querySelector('.select-nhaxuatban_sach');
const select_tacgia_sach = document.querySelector('.select-tacgia_sach');
const input_phimuon_sach = document.querySelector('.input-phimuon_sach');
const input_soluong_sach = document.querySelector('.input-soluong_sach');
const input_img_sach = document.querySelector('.input-img_sach');

function ableInput() {
    input_ten_sach.disabled = false;
    select_theloai_sach.disabled = false;
    input_tomtat_sach.disabled = false;
    select_nhaxuatban_sach.disabled = false;
    select_tacgia_sach.disabled = false;
    input_phimuon_sach.disabled = false;
    // input_soluong_sach.disabled = false;
    input_img_sach.disabled = false;
};

function disavailInput() {
    input_ten_sach.disabled = true;
    select_theloai_sach.disabled = true;
    input_tomtat_sach.disabled = true;
    select_nhaxuatban_sach.disabled = true;
    select_tacgia_sach.disabled = true;
    input_phimuon_sach.disabled = true;
    // input_soluong_sach.disabled = true;
    input_img_sach.disabled = true;
};

function resetInput() {
    input_ten_sach.value = '';
    input_tomtat_sach.value = '';
    input_phimuon_sach.value = '';
    input_img_sach.value = '';

    select_theloai_sach.selectedIndex = 0;
    select_nhaxuatban_sach.selectedIndex = 0;
    select_tacgia_sach.selectedIndex = 0;
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

    btn_save.disabled = true;
    btn_cancel.disabled = true;

    btn_add.disabled = false;
    btn_edit.disabled = false;
    btn_delete.disabled = false;

    resetInput();
    disavailInput();
});

btn_reset.addEventListener('click', () => {
    input_search.value = '';

    img.src = '../img/noimages.png';

    btn_save.disabled = true;
    btn_cancel.disabled = true;

    btn_add.disabled = false;
    btn_edit.disabled = false;
    btn_delete.disabled = false;

    resetInput();
    disavailInput();
});

});