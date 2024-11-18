document.addEventListener("DOMContentLoaded", () => {

/* Các nút hành động */
const btn_add_sach = document.querySelector('.btn-add-sach');
const btn_delete_sach = document.querySelector('.btn-delete-sach');
const btn_edit_sach = document.querySelector('.btn-edit-sach');
const btn_save_sach = document.querySelector('.btn-save-sach');
const btn_cancel_sach = document.querySelector('.btn-cancel-sach');

btn_add_sach.addEventListener('click', () => {
    btn_delete_sach.disabled = true;
    btn_edit_sach.disabled = true;
    btn_save_sach.disabled = false;
    btn_cancel_sach.disabled = false;  
});

btn_edit_sach.addEventListener('click', () => {
    btn_add_sach.disabled = true;
    btn_delete_sach.disabled = true; 
    btn_save_sach.disabled = false;
    btn_cancel_sach.disabled = false;  
});

// btn_delete_sach.addEventListener('click', () => {
    
// });

});