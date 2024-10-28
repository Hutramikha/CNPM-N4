document.addEventListener("DOMContentLoaded", () => {

const toggleMenu = document.querySelector(".toggle-menu");
const sidebar = document.querySelector(".admin_sidebar");
const submenu = document.querySelector(".sub-menu-show");

const profileImage = document.getElementById("profile-img");
const profileDetails = document.querySelector(".profile-details");

toggleMenu.addEventListener("click", () => {
    if (subMenu.classList.contains('show')) {
        closeSubMenu();
    }
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

});