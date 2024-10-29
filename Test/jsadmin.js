document.addEventListener("DOMContentLoaded", () => {

const toggleMenu = document.querySelector(".toggle-menu");
const sidebar = document.querySelector(".admin_sidebar");
const submenu = document.querySelector(".sub-menu-show");

const profileImage = document.getElementById("profile-img");
const profileDetails = document.querySelector(".profile-details");

if(sidebar.classList.contains("close")) {
    if (profileImage.style.maxHeight === "50px") {
        profileImage.style.maxHeight = "70px"; // Trở về kích thước ban đầu
        profileImage.style.maxWidth = "70px";  // Trở về kích thước ban đầu
        profileDetails.style.background = "#09025e"; // Trở về màu nền ban đầu
    } else {
        profileImage.style.maxHeight = "50px"; // Thay đổi kích thước ảnh
        profileImage.style.maxWidth = "50px";  // Thay đổi kích thước ảnh
        profileDetails.style.background = "#060244"; // Thay đổi màu nền
    }
} else {}

toggleMenu.addEventListener("click", () => {
    if (subMenu.classList.contains('show')) {
        closeSubMenu();
    } else{}
    sidebar.classList.toggle("close");
    if (profileImage.style.maxHeight === "50px") {
        profileImage.style.maxHeight = "70px"; // Trở về kích thước ban đầu
        profileImage.style.maxWidth = "70px";  // Trở về kích thước ban đầu
        profileDetails.style.background = "#09025e"; // Trở về màu nền ban đầu
    } else {
        profileImage.style.maxHeight = "50px"; // Thay đổi kích thước ảnh
        profileImage.style.maxWidth = "50px";  // Thay đổi kích thước ảnh
        profileDetails.style.background = "#060244"; // Thay đổi màu nền
    }
})

function opensidebar() {
    if(sidebar.classList.contains("close")) {
        sidebar.classList.toggle("close");
        if (profileImage.style.maxHeight === "50px") {
            profileImage.style.maxHeight = "70px"; // Trở về kích thước ban đầu
            profileImage.style.maxWidth = "70px";  // Trở về kích thước ban đầu
            profileDetails.style.background = "#09025e"; // Trở về màu nền ban đầu
        } else {
            profileImage.style.maxHeight = "50px"; // Thay đổi kích thước ảnh
            profileImage.style.maxWidth = "50px";  // Thay đổi kích thước ảnh
            profileDetails.style.background = "#060244"; // Thay đổi màu nền
        }
    } else {
        console.log("oke");
    }
}


const toggleButton = document.querySelector(".sub-menu-show");
const subMenu = document.querySelector(".sub-menu");
const toggleArrow = document.querySelector('.toggle-arrow');


toggleButton.addEventListener("click", () => {
    if (subMenu.classList.contains('show')) {
        closeSubMenu();
    } else {
        openSubMenu();
    }
});


function openSubMenu() {
    subMenu.style.display = 'block'; // Hiện submenu trước khi áp dụng hiệu ứng
    setTimeout(() => {
        opensidebar();
        subMenu.style.opacity = 1; // Áp dụng độ mờ sau khi hiển thị
        subMenu.classList.add('show'); // Thêm class 'show'
        toggleArrow.classList.remove('bx-chevron-down'); // Đổi thành mũi tên hướng lên
        toggleArrow.classList.add('bx-chevron-up');
    }, 5);
}

function closeSubMenu() {
    subMenu.style.opacity = 0; // Đặt độ mờ về 0
    setTimeout(() => {
        subMenu.classList.remove('show');
        subMenu.style.display = 'none'; // Ẩn submenu ngay lập tức sau khi độ mờ về 0
        toggleArrow.classList.remove('bx-chevron-up'); // Đổi thành mũi tên hướng xuống
        toggleArrow.classList.add('bx-chevron-down');
    }, 20); // Thời gian trễ phải giống với thời gian của transition
}


// Ẩn hiện các trang quản lý
const btn_qlsach = document.querySelector(".btn-qlsach");
const btn_qlnhanvien = document.querySelector(".btn-qlnhanvien");
const btn_qldocgia = document.querySelector(".btn-qldocgia");
const btn_qlmuonsach = document.querySelector(".btn-muonsach");
const btn_qltrasach = document.querySelector(".btn-trasach");
const btn_qlphieunhap = document.querySelector(".btn-qlphieunhap");
const btn_qltaikhoan = document.querySelector(".btn-qltaikhoan");
const btn_thongke = document.querySelector(".btn-thongke");

btn_qlsach.addEventListener("click", () => {
    document.querySelector(".quanlysach").classList.add("showpage");
    document.querySelector(".quanlynhanvien").classList.remove("showpage");
    document.querySelector(".quanlydocgia").classList.remove("showpage");
    document.querySelector(".quanlymuonsach").classList.remove("showpage");
    document.querySelector(".quanlytrasach").classList.remove("showpage");
    document.querySelector(".quanlyphieunhap").classList.remove("showpage");
    document.querySelector(".quanlytaikhoan").classList.remove("showpage");
    document.querySelector(".thongke").classList.remove("showpage");
})

btn_qlnhanvien.addEventListener("click", () => {
    document.querySelector(".quanlysach").classList.remove("showpage");
    document.querySelector(".quanlynhanvien").classList.add("showpage");
    document.querySelector(".quanlydocgia").classList.remove("showpage");
    document.querySelector(".quanlymuonsach").classList.remove("showpage");
    document.querySelector(".quanlytrasach").classList.remove("showpage");
    document.querySelector(".quanlyphieunhap").classList.remove("showpage");
    document.querySelector(".quanlytaikhoan").classList.remove("showpage");
    document.querySelector(".thongke").classList.remove("showpage");
})

btn_qldocgia.addEventListener("click", () => {
    document.querySelector(".quanlysach").classList.remove("showpage");
    document.querySelector(".quanlynhanvien").classList.remove("showpage");
    document.querySelector(".quanlydocgia").classList.add("showpage");
    document.querySelector(".quanlymuonsach").classList.remove("showpage");
    document.querySelector(".quanlytrasach").classList.remove("showpage");
    document.querySelector(".quanlyphieunhap").classList.remove("showpage");
    document.querySelector(".quanlytaikhoan").classList.remove("showpage");
    document.querySelector(".thongke").classList.remove("showpage");
})

btn_qlmuonsach.addEventListener("click", () => {
    document.querySelector(".quanlysach").classList.remove("showpage");
    document.querySelector(".quanlynhanvien").classList.remove("showpage");
    document.querySelector(".quanlydocgia").classList.remove("showpage");
    document.querySelector(".quanlymuonsach").classList.add("showpage");
    document.querySelector(".quanlytrasach").classList.remove("showpage");
    document.querySelector(".quanlyphieunhap").classList.remove("showpage");
    document.querySelector(".quanlytaikhoan").classList.remove("showpage");
    document.querySelector(".thongke").classList.remove("showpage");
})

btn_qltrasach.addEventListener("click", () => {
    document.querySelector(".quanlysach").classList.remove("showpage");
    document.querySelector(".quanlynhanvien").classList.remove("showpage");
    document.querySelector(".quanlydocgia").classList.remove("showpage");
    document.querySelector(".quanlymuonsach").classList.remove("showpage");
    document.querySelector(".quanlytrasach").classList.add("showpage");
    document.querySelector(".quanlyphieunhap").classList.remove("showpage");
    document.querySelector(".quanlytaikhoan").classList.remove("showpage");
    document.querySelector(".thongke").classList.remove("showpage");
})

btn_qlphieunhap.addEventListener("click", () => {
    document.querySelector(".quanlysach").classList.remove("showpage");
    document.querySelector(".quanlynhanvien").classList.remove("showpage");
    document.querySelector(".quanlydocgia").classList.remove("showpage");
    document.querySelector(".quanlymuonsach").classList.remove("showpage");
    document.querySelector(".quanlytrasach").classList.remove("showpage");
    document.querySelector(".quanlyphieunhap").classList.add("showpage");
    document.querySelector(".quanlytaikhoan").classList.remove("showpage");
    document.querySelector(".thongke").classList.remove("showpage");
})

btn_qltaikhoan.addEventListener("click", () => {
    document.querySelector(".quanlysach").classList.remove("showpage");
    document.querySelector(".quanlynhanvien").classList.remove("showpage");
    document.querySelector(".quanlydocgia").classList.remove("showpage");
    document.querySelector(".quanlymuonsach").classList.remove("showpage");
    document.querySelector(".quanlytrasach").classList.remove("showpage");
    document.querySelector(".quanlyphieunhap").classList.remove("showpage");
    document.querySelector(".quanlytaikhoan").classList.add("showpage");
    document.querySelector(".thongke").classList.remove("showpage");
})

btn_thongke.addEventListener("click", () => {
    document.querySelector(".quanlysach").classList.remove("showpage");
    document.querySelector(".quanlynhanvien").classList.remove("showpage");
    document.querySelector(".quanlydocgia").classList.remove("showpage");
    document.querySelector(".quanlymuonsach").classList.remove("showpage");
    document.querySelector(".quanlytrasach").classList.remove("showpage");
    document.querySelector(".quanlyphieunhap").classList.remove("showpage");
    document.querySelector(".quanlytaikhoan").classList.remove("showpage");
    document.querySelector(".thongke").classList.add("showpage");
})

});