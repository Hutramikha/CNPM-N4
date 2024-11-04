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
const btn_thongtincanhan = document.querySelector(".btn-thongtincanhan");

// Hàm để ẩn tất cả các trang
function hideAllPages() {
    const pages = document.querySelectorAll('.quanlysach, .quanlynhanvien, .quanlydocgia, .quanlymuonsach, .quanlytrasach, .quanlyphieunhap, .quanlytaikhoan, .thongke, .thongtincanhan');
    pages.forEach(page => {
        if (page.classList.contains('showpage')) {
            page.style.opacity = '0'; // Mờ đi
            setTimeout(() => {
                page.classList.remove('showpage'); // Xóa class showpage sau khi hiệu ứng hoàn tất
            }, 150); // Thời gian trễ bằng thời gian hiệu ứng
        }
    });
}

// Hàm để hiển thị trang tương ứng
function showPage(pageClass) {
    const page = document.querySelector(pageClass);
    hideAllPages(); // Đầu tiên ẩn tất cả các trang
    page.classList.add('showpage'); // Thêm class showpage
    setTimeout(() => {
        page.style.opacity = '1'; // Hiện rõ
    }, 10); // Thời gian trễ nhỏ để kích hoạt hiệu ứng
}

btn_qlsach.addEventListener("click", () => showPage('.quanlysach'));
btn_qlnhanvien.addEventListener("click", () => showPage('.quanlynhanvien'));
btn_qldocgia.addEventListener("click", () => showPage('.quanlydocgia'));
btn_qlmuonsach.addEventListener("click", () => showPage('.quanlymuonsach'));
btn_qltrasach.addEventListener("click", () => showPage('.quanlytrasach'));
btn_qlphieunhap.addEventListener("click", () => showPage('.quanlyphieunhap'));
btn_qltaikhoan.addEventListener("click", () => showPage('.quanlytaikhoan'));
btn_thongke.addEventListener("click", () => showPage('.thongke'));
btn_thongtincanhan.addEventListener("click", () => showPage('.thongtincanhan'));

});