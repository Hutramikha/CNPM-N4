<?php
require '../DAO/database/connect.php'; 
session_start();

if (isset($_SESSION['mySession'])) {
    $tenDangNhap = $_SESSION['mySession'][0];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./style/styleadmin10.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="admin_sidebar close">
        <div class="logo-details">
            <i class='bx bx-library' style="margin-right: 1%;"></i>
            <span class="logo_name" id="title-visible">DiagonAlley.com</span>
        </div>
        <ul class="nav-links">
            <li class="out-li">
                <a class="gohome btn" href="./trangchu.html" style="text-decoration: none;">
                    <i class='bx bx-home'></i>
                    <span class="link_name no-select" id="text-visible"> Trang chủ</span>
                </a>
            </li>
            <li class="out-li">
                <div class="toggle-menu btn">
                    <i class='bx bxs-right-arrow-square arrow_menu'></i>
                    <span class="link_name no-select" id="text-visible"> Thu nhỏ</span>
                </div>
            </li>
            <li class="out-li">
                <div class="btn-qlsach btn">
                    <i class='bx bx-book-content'></i>
                    <span class="link_name no-select" id="text-visible"> QL Sách</span>
                </div>
            </li>
            <li class="out-li">
                <div class="btn-qlnhanvien btn">
                    <i class='bx bx-briefcase-alt-2'></i>
                    <span class="link_name no-select" id="text-visible"> QL Nhân viên</span>
                </div>
            </li>
            <li class="out-li">
                <div class="btn-qldocgia btn">
                    <i class='bx bx-id-card'></i>
                    <span class="link_name no-select" id="text-visible"> QL Độc giả</span>
                </div>
            </li>
            <li class="out-li sub-menu-li">
                <!-- <div class="icon-link"> -->
                <div style="cursor: pointer;" class="sub-menu-show btn">
                    <i class='bx bx-book'></i>
                    <span class="link_name no-select" id="text-visible"> QL Mượn/Trả</span>
                    <i class='bx bx-chevron-down toggle-arrow' style="padding-left: 10%; font-size: 30px;"
                        id="text-visible"></i>
                </div>
                <!-- </div> -->
                <!-- <div class="close-sub"> -->
                <ul class="sub-menu">
                    <li style="display: flex;" class="btn-muonsach">
                        <i class='bx bx-task' style="cursor: pointer;"></i>
                        <div class="link_name btn no-select">Mượn sách</div>
                    </li>
                    <li style="display: flex;" class="btn-trasach">
                        <i class='bx bx-task-x' style="cursor: pointer;"></i>
                        <div class="link_name btn no-select">Trả sách</div>
                    </li>
                </ul>
                <!-- </div> -->
            </li>
            <li class="out-li">
                <div class="btn-qlphieunhap btn">
                    <i class='bx bx-receipt'></i>
                    <span class="link_name no-select" id="text-visible"> QL Phiếu nhập</span>
                </div>
            </li>
            <li class="out-li">
                <div class="btn-qltaikhoan btn">
                    <i class='bx bxs-user-account'></i>
                    <span class="link_name no-select" id="text-visible"> QL Tài khoản</span>
                </div>
            </li>
            <li class="out-li">
                <div class="btn-qlphanquyen btn">
                    <i class='bx bx-accessibility'></i>
                    <span class="link_name no-select" id="text-visible"> QL Phân quyền</span>
                </div>
            </li>
            <li class="out-li">
                <div class="btn-thongke btn">
                    <i class='bx bx-bar-chart-alt-2'></i>
                    <span class="link_name no-select" id="text-visible"> Thống kê</span>
                </div>
            </li>
            <li class="out-li">
                <div class="btn-thongtincanhan btn">
                    <i class='bx bx-info-circle'></i>
                    <span class="link_name no-select" id="text-visible"> Thông tin cá nhân</span>
                </div>
            </li>
            <li>
                <div style="height: 10vh;"></div>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="../img/hacker2.png" alt="profile" id="profile-img">
                    </div>
                    <div class="name-job">
                        <div class="profile-name no-select">Khang</div>
                        <div class="job no-select">Thủ thư</div>
                    </div>
                    <i class='bx bx-log-out no-select btn-logout' style="cursor: pointer;" id="logoutButton"></i>
                </div>
            </li>
        </ul>
    </div>



    <section class="homesection">
        <div class="homecontent">

            <!-- Quản lý sách ------------------------------------------------------------------->
            <div class="quanlysach">
                <div class="admin_title_content">
                    <div class="admin_title">
                        <h1>QUẢN LÝ SÁCH</h1>
                    </div>
                </div>
                <div class="button_contain">
                    <button class="btn_action btn-add btn-add-sach">Thêm</button>
                    <button class="btn_action btn-edit btn-edit-sach">Sửa</button>
                    <button class="btn_action btn-delete btn-delete-sach">Xóa</button>
                    <button class="btn_action btn-save btn-save-sach" disabled>Lưu</button>
                    <button class="btn_action btn-cancel btn-cancel-sach" disabled>Hủy</button>
                    <button class="btn_action btn-reset btn-reset-sach">Làm mới</button>
                    <input type="text" class="search-input search-input-sach" placeholder="Tìm kiếm...">
                    <button class="btn-search btn-search-sach ">
                        <i class='bx bx-search-alt-2'></i>
                    </button>
                </div>
                <div class="input_contain">
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Tên sách:</label>
                            <input type="text" class="input-control input-ten_sach" placeholder="Nhập tên sách" disabled
                                required>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Thể loại:</label>
                            <select class="input-control select-theloai_sach" id="publisher" disabled required>
                                <option value="0">Chọn thể loại</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <!-- <div class="input-group">
                            <label class="input-label">Tình trạng sách:</label>
                            <select class="input-control select-tinhtrang_sach" id="publisher" disabled required>
                                <option value="-1">Chọn tình trạng</option>
                                
                            </select>
                        </div> -->
                        <div class="input-group">
                            <label class="input-label">Giá nhập:</label>
                            <div class="input-container">
                                <input type="text" class="input-control input-gianhap_sach" placeholder="VNĐ" disabled
                                    required>
                                <div class="btn-container__arrow">
                                    <button class="btn-arrow" id="incrementGianhap">▲</button>
                                    <div style="height: 0.3vh;"></div>
                                    <button class="btn-arrow" id="decrementGianhap">▼</button>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Tóm tắt:</label>
                            <textarea class="input-control input-tomtat_sach" id="textarea" rows="2"
                                placeholder="Nhập tóm tắt" disabled required></textarea>
                        </div>
                    </div>
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Nhà xuất bản:</label>
                            <select class="input-control select-nhaxuatban_sach" id="publisher" disabled required>
                                <option value="0">Chọn nhà xuất bản</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Tác giả:</label>
                            <select class="input-control select-tacgia_sach" id="publisher" disabled required>
                                <option value="0">Chọn tác giả</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Phí mượn:</label>
                            <div class="input-container">
                                <input type="text" class="input-control input-phimuon_sach" placeholder="VNĐ" disabled
                                    required>
                                <div class="btn-container__arrow">
                                    <button class="btn-arrow" id="increment">▲</button>
                                    <div style="height: 0.3vh;"></div>
                                    <button class="btn-arrow" id="decrement">▼</button>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Số lượng:</label>
                            <input type="text" class="input-control input-soluong_sach" placeholder="0" disabled
                                required>
                        </div>
                    </div>
                    <div class="image-container">
                        <div class="image-preview">
                            <img id="image_max" class="image-sach" src="../img/noimages.png" alt="">
                        </div>
                        <div style="width: 0.3vw;"></div>
                        <input type="file" id="image-upload" class="image-upload_sach input-img_sach"
                            onchange="previewImageSach(event)" accept="image/*" disabled>
                    </div>
                </div>
                <div class="button_contain_manage">
                    <button class="btn_action btn-manage btn-theloai">Thể loại</button>
                    <button class="btn_action btn-manage btn-nxb">Nhà xuất bản</button>
                    <button class="btn_action btn-manage btn-tacgia">Tác giả</button>
                    <button class="btn_action btn-manage btn-tinhtrangsach">Tình trạng sách</button>
                </div>
                <!-- Bảng Form của các nút từ button_contain_manage -->
                <div id="book-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                         background-color: rgba(0, 0, 0, 0.5); z-index: 10;transition: opacity 0.3s ease;"></div>
                <!--Overlay chung cho các form-->
                <div class="Category" style="width: 40%; height: 40%;justify-content: center;position: absolute;top: 30%;left: 30%;
                     z-index:15;background-color: whitesmoke;border: solid black; display: none;
                     justify-content:center;padding: 10px; border-radius: 15px">
                    <form action="" class="CategoryForm" style="width: 100%;height: 100%">
                        <div class="navigate-cat-form"
                            style="justify-content: flex-start;margin:5px; display: flex;transition: opacity 0.3s ease;">
                            <button type="button" class="addbtn-cat"
                                style="width: 100px; height: 30px; border-radius: 20px; background-color: greenyellow">Thêm</button>
                            <div id="addcat-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                         background-color: rgba(0, 0, 0, 0.5); z-index: 20;transition: opacity 0.3s ease;"></div>
                            <div class="addcat-input"
                                style="display: none; flex-direction: column; padding: 10px;position: fixed; top:30%;left:45%; background-color: white;border: 2px solid; z-index: 25">
                                <div class="warning"><span id="cat-warning" style="font-size: 12px"></span></div>

                                <label>Tên thể loại:</label>
                                <input type="text" id="input-tentl" placeholder="Nhập Tên thể loại">
                                <div>
                                    <button type="button" class="addcatsubmit"
                                        style="margin: 10px 0 0 30px; width: 50px; border-radius: 5px; background-color: greenyellow">Thêm</button>
                                    <button type="button" class="cancelcatsubmit"
                                        style="margin-top: 10px; width: 50px; border-radius: 5px; background-color: red">Hủy</button>
                                </div>
                            </div>
                            <button type="button" class="updatebtn-cat"
                                style="width: 100px; height: 30px;border-radius: 20px; background-color: orange">Sửa</button>
                            <div class="search-cat-div"
                                style="max-width: 32%; height: 30px;background-color: white; border: black solid; border-radius: 20px;display:flex; align-items: center; justify-content: center">
                                <input class="search-cat" type="text" placeholder="Tìm kiếm..."
                                    style="max-width: 90%;height: 15px;border-radius: 20px;padding-left: 10px; border: none;outline:none" /><i
                                    class="bx bx-search-alt-2"></i>
                            </div>
                            <button type="button" class="bx bx-refresh" id="catrefresh"
                                style="width: 30px;border-radius:50px;background-color:graytext; margin-left: 5px"></button>
                            <button type="button" class="btn-close-cat-form" style="position: absolute; right:5px;top:5px;width: 30px;height: 30px;border-radius: 50px;
                              background-color: red">X</button>
                        </div>
                        <div class="df-cat"
                            style="overflow-y: auto; max-height: 84%;border-radius:3px; border: 1px solid; border-left: 0;border-right: 0">
                            <table id="cat-table">
                                <thead>
                                    <tr>
                                        <th style="width: 20%" class="text_center">Mã thể loại</th>
                                        <th class="text_center">Tên thể loại</th>
                                        <th style="width: 20%" class="text_center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="cat-table-body">

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="Author" style="width: 40%; height: 40%;justify-content: center;position: absolute;top: 30%;left: 30%;
                        z-index:15;background-color: whitesmoke;border: solid black; display: none;
                        justify-content:center;padding: 10px; border-radius: 15px">
                    <form action="" class="AuthorForm" style="width: 100%;height: 100%">
                        <div class="navigate-cat-form"
                            style="justify-content: flex-start;margin:5px; display: flex;transition: opacity 0.3s ease;">
                            <button type="button" class="addbtn-author"
                                style="width: 100px; height: 30px; border-radius: 20px; background-color: greenyellow">Thêm</button>
                            <div id="addauthor-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                            background-color: rgba(0, 0, 0, 0.5); z-index: 20;transition: opacity 0.3s ease;"></div>

                            <div class="addauthor-input"
                                style="display: none; flex-direction: column; padding: 10px;position: fixed; top:30%;left:45%; background-color: white;border: 2px solid; z-index: 25">
                                <div class="warning"><span id="author-warning" style="font-size: 12px"></span></div>

                                <label>Tên tác giả:</label>
                                <input type="text" id="input-tentg" placeholder="Nhập Tên tác giả">
                                <div>
                                    <button type="button" class="addauthorsubmit"
                                        style="margin: 10px 0 0 30px; width: 50px; border-radius: 5px; background-color: greenyellow">Thêm</button>
                                    <button type="button" class="cancelauthorsubmit"
                                        style="margin-top: 10px; width: 50px; border-radius: 5px; background-color: red">Hủy</button>
                                </div>
                            </div>
                            <button type="button" class="updatebtn-author" id="updateAuthor"
                                style="width: 100px; height: 30px;border-radius: 20px; background-color: orange">Sửa</button>
                            <div class="search-author-div"
                                style="max-width: 32%; height: 30px;background-color: white; border: black solid; border-radius: 20px;display:flex; align-items: center; justify-content: center">
                                <input class="search-author" type="text" placeholder="Tìm kiếm..."
                                    style="max-width: 90%;height: 15px;border-radius: 20px;padding-left: 10px; border: none;outline:none" /><i
                                    class="bx bx-search-alt-2"></i>
                            </div>
                            <button type="button" class="bx bx-refresh" id="refresh-author"
                                style="width: 30px;border-radius:50px;background-color:graytext; margin-left: 5px"></button>
                            <button type="button" class="btn-close-author-form" style="position: absolute; right:5px;top:5px;width: 30px;height: 30px;border-radius: 50px;
                                background-color: red">X</button>
                        </div>
                        <div class="df-author"
                            style="overflow-y: auto; max-height: 84%;border-radius:3px; border: 1px solid; border-left: 0;border-right: 0">
                            <table id="author-table">
                                <thead>
                                    <tr>
                                        <th style="width: 20%" class="text_center">Mã tác giả</th>
                                        <th class="text_center">Tên tác giả</th>
                                        <th style="width: 20%" class="text_center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body-author">

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="Status" style="width: 50%; height: 50%;justify-content: center;position: absolute;top: 25%;left: 25%;
                     z-index:15;background-color: whitesmoke;border: solid black; display: none;
                     justify-content:center; padding: 10px; border-radius: 15px">
                    <form action="" class="StatusForm" style="width: 100%;height: 100%">
                        <div class="navigate-stat-form"
                            style="justify-content: flex-start;margin:5px; display: flex;transition: opacity 0.3s ease;">
                            <button type="button" class="addbtn-stat"
                                style="width: 100px; height: 30px; border-radius: 20px; background-color: greenyellow">Thêm</button>
                            <div id="addstat-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                         background-color: rgba(0, 0, 0, 0.5); z-index: 20;transition: opacity 0.3s ease;"></div>
                            <div class="addstat-input"
                                style="display: none; flex-direction: column; padding: 10px;position: fixed; top:30%;left:45%; background-color: white;border: 2px solid; z-index: 25">
                                <div class="warning"><span id="stat-warning" style="font-size: 12px"></span></div>

                                <label>Mô tả:</label>
                                <input type="text" id="input-mota" placeholder="Nhập Mô tả">
                                <div>
                                    <button type="button" class="addstatsubmit"
                                        style="margin: 10px 0 0 30px; width: 50px; border-radius: 5px; background-color: greenyellow">Thêm</button>
                                    <button type="button" class="cancelstatsubmit"
                                        style="margin-top: 10px; width: 50px; border-radius: 5px; background-color: red">Hủy</button>
                                </div>
                            </div>
                            <button type="button" class="updatebtn-stat"
                                style="width: 100px; height: 30px;border-radius: 20px; background-color: orange">Sửa</button>
                            <div class="search-stat-div"
                                style="max-width: 32%; height: 30px;background-color: white; border: black solid; border-radius: 20px; display:flex; align-items: center; justify-content: center">
                                <input class="search-stat" type="text" placeholder="Tìm kiếm..."
                                    style="max-width: 90%;height: 15px;border-radius: 20px;padding-left: 10px; border: none;outline:none" /><i
                                    class="bx bx-search-alt-2"></i>
                            </div>
                            <button type="button" class="bx bx-refresh" id="statrefresh"
                                style="width: 30px;border-radius:50px;background-color:graytext; margin-left: 5px"></button>
                            <button type="button" class="btn-close-stat-form" style="position: absolute; right:5px;top:5px;width: 30px;height: 30px;border-radius: 50px;
                              background-color: red">X</button>
                        </div>
                        <div class="df-stat"
                            style="overflow-y: auto; max-height: 84%;border-radius:3px; border: 1px solid; border-left: 0;border-right: 0">
                            <table id="stat-table">
                                <thead>
                                    <tr>
                                        <th style="width: 20%" class="text_center">Mã tình trạng</th>
                                        <th class="text_center">Mô tả</th>
                                        <th style="width: 20%" class="text_center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="stat-table-body">

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="Publisher" style="width: 50%; height: 50%;justify-content: center;position: absolute;top: 25%;left: 25%;
                     z-index:15;background-color: whitesmoke;border: solid black; display: none;
                     justify-content:center; padding: 10px; border-radius: 15px">
                    <form action="" class="PublisherForm" style="width: 100%;height: 100%">
                        <div class="navigate-publish-form"
                            style="justify-content: flex-start;margin:5px; display: flex;transition: opacity 0.3s ease;">
                            <button type="button" class="addbtn-publish"
                                style="width: 100px; height: 30px; border-radius: 20px; background-color: greenyellow">Thêm</button>
                            <div id="addpublish-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                         background-color: rgba(0, 0, 0, 0.5); z-index: 20;transition: opacity 0.3s ease;"></div>
                            <div class="addpublish-input"
                                style="display: none; flex-direction: column; padding: 10px;position: fixed; top:30%;left:45%; background-color: white;border: 2px solid; z-index: 25">
                                <div class="warning"><span id="publish-warning" style="font-size: 12px"></span></div>

                                <label>Tên NXB:</label>
                                <input type="text" id="input-tennxb" placeholder="Nhập Tên NXB">
                                <div>
                                    <button type="button" class="addpublishsubmit"
                                        style="margin: 10px 0 0 30px; width: 50px; border-radius: 5px; background-color: greenyellow">Thêm</button>
                                    <button type="button" class="cancelpublishsubmit"
                                        style="margin-top: 10px; width: 50px; border-radius: 5px; background-color: red">Hủy</button>
                                </div>
                            </div>
                            <button type="button" class="updatebtn-publish"
                                style="width: 100px; height: 30px;border-radius: 20px; background-color: orange">Sửa</button>
                            <div class="search-publish-div"
                                style="max-width: 32%; height: 30px;background-color: white; border: black solid; border-radius: 20px;display:flex; align-items: center; justify-content: center">
                                <input class="search-publish" type="text" placeholder="Tìm kiếm..."
                                    style="max-width: 90%;height: 15px;border-radius: 20px;padding-left: 10px; border: none;outline:none" /><i
                                    class="bx bx-search-alt-2"></i>
                            </div>
                            <button type="button" class="bx bx-refresh" id="publishrefresh"
                                style="width: 30px;border-radius:50px;background-color:graytext; margin-left: 5px"></button>
                            <button type="button" class="btn-close-publish-form" style="position: absolute; right:5px;top:5px;width: 30px;height: 30px;border-radius: 50px;
                              background-color: red">X</button>
                        </div>
                        <div class="df-publish"
                            style="overflow-y: auto; max-height: 84%;border-radius:3px; border: 1px solid; border-left: 0;border-right: 0">
                            <table id="publish-table">
                                <thead>
                                    <tr>
                                        <th style="width: 20%" class="text_center">Mã NXB</th>
                                        <th class="text_center">Tên NXB</th>
                                        <th style="width: 20%" class="text_center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="publish-table-body">

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <!-------------------------End Forms-------------------------->
                <div class="table_contain">
                    <div class="table_limit-3h" style="margin-bottom: 0.7%; max-height: 28.2vh;">
                        <table class="table-sach">
                            <thead>
                                <tr>
                                    <th colspan="10" class="table-title">Danh Sách Sách</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã sách</th>
                                    <th>Tên sách</th>
                                    <th>Tóm tắt</th>
                                    <th>Thể loại</th>
                                    <th>Nhà xuất bản</th>
                                    <th>Tác giả</th>
                                    <th>Số lượng</th>
                                    <th>Phí mượn</th>
                                    <th>Giá nhập</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
                            </tbody>
                        </table>
                    </div>
                    <div style="display: flex; justify-content: center;">
                        <!-- <div class="table_limit-3h" style="width: 35%; max-height: 25.4vh;">
                            <table class="table-sach_sapxep">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="table-title">Sắp Xếp Sách</th>
                                    </tr>
                                    <tr>
                                        <th class="table_stt">STT</th>
                                        <th>Mã sách</th>
                                        <th>Mã vạch</th>
                                        <th class="text_center">Sắp xếp</th>
                                    </tr>
                                </thead>
                                <tbody>
                       
                                </tbody>
                            </table>
                        </div> -->

                        <div class="table_limit-3h" style="max-height: 28.2vh; width: 100%;">
                            <table class="table-ct-sach">
                                <thead>
                                    <tr>
                                        <th colspan="7" class="table-title">Chi Tiết Sách</th>
                                    <tr>
                                        <th class="table_stt">STT</th>
                                        <th>Mã vạch</th>
                                        <th>Mã sách</th>
                                        <th>Tình trạng</th>
                                        <th>Trạng thái</th>
                                        <th>Vị trí</th>
                                        <th>Xóa</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Hàng sẽ được thêm ở đây -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div style="height: 1vh;"></div>
            </div>


            <!-- Quản lý nhân viên ------------------------------------------------------------------->
            <div class="quanlynhanvien">
                <div class="admin_title_content">
                    <div class="admin_title">
                        <h1>QUẢN LÝ NHÂN VIÊN</h1>
                    </div>
                </div>
                <div class="button_contain">
                    <button class="btn_action btn-add btn-add-nv">Thêm</button>
                    <button class="btn_action btn-edit btn-edit-nv">Sửa</button>
                    <button class="btn_action btn-delete btn-delete-nv">Xóa</button>
                    <button class="btn_action btn-save btn-save-nv" disabled>Lưu</button>
                    <button class="btn_action btn-cancel btn-cancel-nv" disabled>Hủy</button>
                    <button class="btn_action btn-reset btn-reset-nv">Làm mới</button>
                    <input type="text" class="search-input search-input-nv" placeholder="Tìm kiếm...">
                    <button class="btn-search btn-search-nv ">
                        <i class='bx bx-search-alt-2'></i>
                    </button>
                </div>
                <div class="input_contain">
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Họ và tên:</label>
                            <input type="text" class="input-control input-ten_nv" placeholder="Nhập tên nhân viên"
                                disabled required>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Giới tính:</label>
                            <select class="input-control select-gioitinh_nv" id="publisher" disabled required>
                                <option value="0">Chọn giới tính</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Ngày sinh</label>
                            <input type="date" class="input-control input-ngaysinh_nv" placeholder="Nhập ngày sinh"
                                disabled required>
                        </div>
                    </div>
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Địa chỉ email:</label>
                            <input type="text" class="input-control input-email_nv" placeholder="Nhập email" disabled
                                required>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Số điện thoại:</label>
                            <input type="text" class="input-control input-sdt_nv" placeholder="Nhập số điện thoại"
                                disabled required>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Địa chỉ:</label>
                            <input type="text" class="input-control input-diachi_nv" placeholder="Nhập địa chỉ" disabled
                                required>
                        </div>
                    </div>
                    <div class="image-container">
                        <div class="image-preview">
                            <img id="image_max" class="image-nv" src="../img/noimages.png" alt="">
                        </div>
                        <div style="width: 0.3vw;"></div>
                        <input type="file" id="image-upload" class="image-upload_nv input-img_nv"
                            onchange="previewImageNV(event)" accept="image/*" disabled>
                    </div>
                </div>
                <div class="button_contain_manage" style="height: 0.5vh;">
                </div>
                <div class="table_contain">
                    <div class="table_limit-3h" style="margin-bottom: 2%;  max-height: 28.2vh">
                        <table class="table-nhanvien">
                            <thead>
                                <tr>
                                    <th colspan="9" class="table-title">Danh Sách Nhân Viên</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã nhân viên</th>
                                    <th>Mã tài khoản</th>
                                    <th>Họ và tên</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
                            </tbody>
                        </table>
                    </div>

                    <div class="table_limit-3h" style="max-height: 30vh; display: flex; justify-content: center;">
                        <table class="table-nhanvien_taikhoan" style="max-width: 50%;">
                            <thead>
                                <tr>
                                    <th colspan="3" class="table-title">Chưa Có Tài Khoản</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã nhân viên</th>
                                    <th class="text_center">Cấp tài khoản</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="height: 1vh;"></div>
            </div>


            <!-- Quản lý độc giả ------------------------------------------------------------------->
            <div class="quanlydocgia">
                <div class="admin_title_content">
                    <div class="admin_title">
                        <h1>QUẢN LÝ ĐỘC GIẢ</h1>
                    </div>
                </div>
                <div class="button_contain">
                    <!-- <button class="btn_action btn-add btn-add-dg">Thêm</button> -->
                    <button class="btn_action btn-edit btn-edit-dg">Sửa</button>
                    <button class="btn_action btn-delete btn-delete-dg">Xóa</button>
                    <button class="btn_action btn-save btn-save-dg" disabled>Lưu</button>
                    <button class="btn_action btn-cancel btn-cancel-dg" disabled>Hủy</button>
                    <button class="btn_action btn-reset btn-reset-dg">Làm mới</button>
                    <input type="text" class="search-input search-input-dg" placeholder="Tìm kiếm...">
                    <button class="btn-search btn-search-dg ">
                        <i class='bx bx-search-alt-2'></i>
                    </button>
                </div>
                <div class="input_contain">
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Họ và tên:</label>
                            <input type="text" class="input-control input-ten_dg" placeholder="Tên độc giả" disabled>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Giới tính:</label>
                            <select class="input-control select-gioitinh_dg" id="publisher" disabled>
                                <option value="0">Chọn giới tính</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                            <!-- <input type="text" class="input-control input-gioitinh_dg" placeholder="Giới tính" disabled> -->
                        </div>
                        <div class="input-group">
                            <label class="input-label">Loại độc giả:</label>
                            <select class="input-control select-loai_dg " id="publisher" disabled>
                                <option value="0">Chọn loại độc giả</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Ngày sinh:</label>
                            <input type="text" class="input-control input-ngaysinh_dg" placeholder="dd/mm/yyyy"
                                disabled>
                        </div>
                    </div>
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Địa chỉ email:</label>
                            <input type="text" class="input-control input-email_dg" placeholder="Email" disabled>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Số điện thoại:</label>
                            <input type="text" class="input-control input-sdt_dg" placeholder="Số điện thoại" disabled>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Địa chỉ:</label>
                            <input type="text" class="input-control input-diachi_dg" placeholder="Địa chỉ" disabled>
                        </div>
                    </div>
                    <div class="image-container">
                        <div class="image-preview">
                            <img id="image_max" class="image-dg" src="../img/noimages.png" alt="">
                        </div>
                        <!-- <div style="width: 0.3vw;"></div>
                        <input type="file" id="image-upload" class="image-upload_dg input-img_dg" accept="image/*"> -->
                    </div>
                </div>
                <div class="button_contain_manage">
                    <button class="btn_action btn-manage btn-loaidg">Loại độc giả</button>
                </div>
                <!-- Bảng Form của các nút từ button_contain_manage -->
                <div id="reader-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                         background-color: rgba(0, 0, 0, 0.5); z-index: 10;transition: opacity 0.3s ease;"></div>
                <!--Overlay chung cho các form-->
                <div class="ReaderCategory" style="width: 50%; height: 50%;justify-content: center;position: absolute;top: 25%;left: 25%;
                     z-index:15;background-color: whitesmoke;border: solid black; display: none;
                     justify-content:center; padding: 10px; border-radius: 15px">
                    <form action="" class="RCForm" style="width: 100%;height: 100%">
                        <div class="navigate-rc-form"
                            style="justify-content: flex-start;margin:5px; display: flex;transition: opacity 0.3s ease;">
                            <button type="button" class="addbtn-rc"
                                style="width: 100px; height: 30px; border-radius: 20px; background-color: greenyellow">Thêm</button>
                            <div id="addrc-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                         background-color: rgba(0, 0, 0, 0.5); z-index: 20;transition: opacity 0.3s ease;"></div>
                            <div class="addrc-input"
                                style="display: none; flex-direction: column; padding: 10px;position: fixed; top:30%;left:45%; background-color: white;border: 2px solid; z-index: 25">
                                <div class="warning"><span id="rc-warning" style="font-size: 12px"></span></div>

                                <label>Tên loại độc giả:</label>
                                <div class="warning"><span id="tenldg-warning" style="font-size: 12px"></span></div>
                                <input type="text" id="input-tenldg" placeholder="Nhập tên"
                                    style="margin-bottom: 10px;">

                                <label>Số lượng sách tối đa:</label>
                                <div class="warning"><span id="sl-warning" style="font-size: 12px"></span></div>
                                <input type="text" id="input-sl" placeholder="Nhập Số lượng">
                                <div>
                                    <button type="button" class="addrcsubmit"
                                        style="margin: 10px 0 0 30px; width: 50px; border-radius: 5px; background-color: greenyellow">Thêm</button>
                                    <button type="button" class="cancelrcsubmit"
                                        style="margin-top: 10px; width: 50px; border-radius: 5px; background-color: red">Hủy</button>
                                </div>
                            </div>
                            <button type="button" class="updatebtn-rc"
                                style="width: 100px; height: 30px;border-radius: 20px; background-color: orange">Sửa</button>
                            <div class="search-rc-div"
                                style="max-width: 32%; height: 30px;background-color: white; border: black solid; border-radius: 20px; display:flex; align-items: center; justify-content: center">
                                <input class="search-rc" type="text" placeholder="Tìm kiếm..."
                                    style="max-width: 90%;height: 15px;border-radius: 20px;padding-left: 10px; border: none;outline:none" /><i
                                    class="bx bx-search-alt-2"></i>
                            </div>
                            <button type="button" class="bx bx-refresh" id="rcrefresh"
                                style="width: 30px;border-radius:50px;background-color:graytext; margin-left: 5px"></button>
                            <button type="button" class="btn-close-rc-form" style="position: absolute; right:5px;top:5px;width: 30px;height: 30px;border-radius: 50px;
                              background-color: red">X</button>
                        </div>
                        <div class="df-rc"
                            style="overflow-y: auto; max-height: 84%;border-radius:3px; border: 1px solid; border-left: 0;border-right: 0">
                            <table id="rc-table">
                                <thead>
                                    <tr>
                                        <th style="width: 20%" class="text_center">Mã loại độc giả</th>
                                        <th class="text_center">Tên loại độc giả</th>
                                        <th style="width: 20%" class="text_center">SL sách tối đa</th>
                                        <th style="width: 20%" class="text_center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="rc-table-body">

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <!-------------------------End Forms--------------------------->
                <div class="table_contain">
                    <div class="table_limit-5h">
                        <table class="table-docgia">
                            <thead>
                                <tr>
                                    <th colspan="10" class="table-title">Danh Sách Độc Giả</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã độc giả</th>
                                    <th>Mã tài khoản</th>
                                    <th>Họ và tên</th>
                                    <th>Giới tính</th>
                                    <th>Loại độc giả</th>
                                    <th>Ngày sinh</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="height: 1vh;"></div>
            </div>


            <!-- Quản lý mượn sách ------------------------------------------------------------------->
            <div class="quanlymuonsach">
                <div class="admin_title_content">
                    <div class="admin_title">
                        <h1>QUẢN LÝ MƯỢN SÁCH</h1>
                    </div>
                </div>
                <div class="button_contain">
                    <!-- <button class="btn_action btn-add btn-add-phieu_muon">Tạo phiếu mượn</button>
                    <button class="btn_action btn-cancel btn-cancel-phieu_muon" disabled>Hủy</button> -->
                    <button class="btn_action btn-reset btn-reset-phieu_muon">Làm mới</button>
                    <input type="text" class="search-input search-input-phieu_muon" placeholder="Tìm kiếm...">
                    <button class="btn-search btn-search-phieu_muon ">
                        <i class='bx bx-search-alt-2'></i>
                    </button>
                </div>
                <div class="table_contain">
                    <div class="table_limit-4h" style="margin-bottom: 2%; max-height: 44.3vh;">
                        <table class="table-phieu_muon">
                            <thead>
                                <tr>
                                    <th colspan="9" class="table-title">Danh Sách Phiếu Mượn</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã phiếu</th>
                                    <th>Ngày mượn</th>
                                    <th>Hạn trả</th>
                                    <th>Mã độc giả</th>
                                    <th>Mã nhân viên</th>
                                    <th>Tổng phí mượn</th>
                                    <th class="text_center">Trạng thái</th>
                                    <th class="text_center">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
                            </tbody>
                        </table>
                    </div>

                    <div class="table_limit-4h">
                        <table class="table-ct-phieu_muon">
                            <thead>
                                <tr>
                                    <th colspan="5" class="table-title">Chi Tiết Phiếu Mượn</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã phiếu mượn</th>
                                    <th>Mã vạch</th>
                                    <th>Tình trạng mượn</th>
                                    <th>Phí mượn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="height: 1vh;"></div>
            </div>


            <!-- Quản lý trả sách ------------------------------------------------------------------->
            <div class="quanlytrasach">
                <div class="admin_title_content">
                    <div class="admin_title">
                        <h1>QUẢN LÝ TRẢ SÁCH</h1>
                    </div>
                </div>
                <div class="button_contain">
                    <button class="btn_action btn-add btn-start-ct-phieu_tra">Thêm chi tiết</button>
                    <button class="btn_action btn-edit btn-edit-ct-phieu_tra">Sửa</button>
                    <button class="btn_action btn-save btn-save-ct-phieu_tra" disabled>Lưu</button>
                    <button class="btn_action btn-cancel btn-cancel-ct-phieu_tra" disabled>Hủy</button>
                    <button class="btn_action btn-reset btn-reset-phieu_tra">Làm mới</button>
                    <input type="text" class="search-input search-input-phieu_tra" placeholder="Tìm kiếm...">
                    <button class="btn-search btn-search-phieu_tra ">
                        <i class='bx bx-search-alt-2'></i>
                    </button>
                </div>
                <div class="input_contain">
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Mã vạch:</label>
                            <input type="text" class="input-control input-mavach_sach_pt" placeholder="Mã chi tiết sách"
                                disabled>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Mã phiếu mượn:</label>
                            <input type="text" class="input-control input-ma_phieu_muon_pt" placeholder="Mã phiếu mượn"
                                disabled>
                        </div>
                    </div>
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Tình trạng sách:</label>
                            <select class="input-control select-tinhtrang_sach_pt" id="publisher" disabled>
                                <option value="-1">Chọn tình trạng</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Vị trí:</label>
                            <input type="text" class="input-control input-vitri_sach_pt" placeholder="Vị trí sách"
                                disabled>
                        </div>
                    </div>
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Hình thức phạt:</label>
                            <select class="input-control select-phat_sach" id="publisher" disabled>
                                <option value="-1">Mời chọn</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Phí phạt:</label>
                            <input type="text" class="input-control input-phiphat_sach" placeholder="VNĐ" disabled>
                        </div>
                    </div>
                </div>
                <div class="table_contain">
                    <div class="table_limit-3h" style="max-height: 28.2vh;">
                        <table class="table-ct-sach_da_muon">
                            <thead>
                                <tr>
                                    <th colspan="7" class="table-title">Chi Tiết Sách Đã Mượn</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã vạch</th>
                                    <th>Mã phiếu mượn</th>
                                    <th>Mã độc giả</th>
                                    <th>Mã nhân viên</th>
                                    <th>Mã tình trạng</th>
                                    <th>Khu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="button_contain_manage">
                    <button class="btn_action btn-manage btn-hinhthucphat">Hình thức phạt</button>
                    <button class="btn_action btn-add btn-create-pt" disabled>Tạo phiếu trả</button>
                </div>
                <!-- Bảng Form của các nút từ button_contain_manage -->
                <div id="return-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
                background-color: rgba(0, 0, 0, 0.5); z-index: 10;transition: opacity 0.3s ease;"></div>
                <!--Overlay chung cho các form-->
                <div class="Penalty" style="width: 60%; height: 50%;justify-content: center;position: absolute;top: 25%;left: 20%;
                     z-index:15;background-color: whitesmoke;border: solid black; display: none;
                     justify-content:center;padding: 10px; border-radius: 15px">
                    <form action="" class="PenaltyForm" style="width: 100%;height: 100%">
                        <div class="navigate-pen-form"
                            style="justify-content: flex-start;margin:5px; display: flex;transition: opacity 0.3s ease;">
                            <button type="button" class="addbtn-pen"
                                style="width: 100px; height: 30px; border-radius: 20px; background-color: greenyellow">Thêm</button>
                            <div id="addpen-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
                             background-color: rgba(0, 0, 0, 0.5); z-index: 20;transition: opacity 0.3s ease;"></div>
                            <div class="addpen-input"
                                style="display: none; flex-direction: column; padding: 10px;position: fixed; top:30%;left:45%; background-color: white;border: 2px solid; z-index: 25">
                                <div class="warning"><span id="pen-warning" style="font-size: 12px"></span></div>

                                <label>Lí do phạt:</label>
                                <div class="warning"><span id="lido-warning" style="font-size: 12px"></span></div>
                                <input type="text" id="input-lido" placeholder="Nhập Lí do"
                                    style="margin-bottom: 10px;">

                                <label>Phí phạt:</label>
                                <div class="warning"><span id="phiphat-warning" style="font-size: 12px"></span>
                                </div>
                                <input type="text" id="input-phiphat" placeholder="Nhập Phí phạt">
                                <div>
                                    <button type="button" class="addpensubmit"
                                        style="margin: 10px 0 0 30px; width: 50px; border-radius: 5px; background-color: greenyellow">Thêm</button>
                                    <button type="button" class="cancelpensubmit"
                                        style="margin-top: 10px; width: 50px; border-radius: 5px; background-color: red">Hủy</button>
                                </div>
                            </div>
                            <button type="button" class="updatebtn-pen"
                                style="width: 100px; height: 30px;border-radius: 20px; background-color: orange">Sửa</button>
                            <div class="search-pen-div"
                                style="max-width: 32%; height: 30px;background-color: white; border: black solid; border-radius: 20px; display:flex; align-items: center; justify-content: center">
                                <input class="search-pen" type="text" placeholder="Tìm kiếm..."
                                    style="max-width: 90%;height: 15px;border-radius: 20px;padding-left: 10px; border: none;outline:none" /><i
                                    class="bx bx-search-alt-2"></i>
                            </div>
                            <button type="button" class="bx bx-refresh" id="penrefresh"
                                style="width: 30px;border-radius:50px;background-color:graytext; margin-left: 5px"></button>
                            <button type="button" class="btn-close-pen-form" style="position: absolute; right:5px;top:5px;width: 30px;height: 30px;border-radius: 50px;
                     background-color: red">X</button>
                        </div>
                        <div class="df-pen" style="overflow-y: auto; max-height: 84%;border-radius:3px">
                            <table id="pen-table">
                                <thead>
                                    <tr>
                                        <th style="width: 20%" class="text_center">Mã phạt</th>
                                        <th class="text_center">Lí do</th>
                                        <th style="width: 20%" class="text_center">Phí phạt</th>
                                        <th style="width: 20%" class="text_center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="pen-table-body">

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <!-------------------------End Forms--------------------------->
                <div class="table_contain">
                    <div class="table_limit-3h" style="margin-bottom: 2%; max-height: 28.2vh;">
                        <table class="table-ct-sach_tra">
                            <thead>
                                <tr>
                                    <th colspan="8" class="table-title">Chi Tiết Sách Trả</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã vạch</th>
                                    <th>Mã phiếu mượn</th>
                                    <th>Tình trạng sách</th>
                                    <th>Vị trí</th>
                                    <th style="width: 20%;">Hình thức phạt</th>
                                    <th>Phí phạt</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
                            </tbody>
                        </table>
                    </div>
                    <div style="display: flex; justify-content: center;">
                        <div class="table_limit-3h" style="width: 60%; max-height: 24vh;">
                            <table class="table-phieu_tra">
                                <thead>
                                    <tr>
                                        <th colspan="7" class="table-title">Danh Sách Phiếu Trả</th>
                                    </tr>
                                    <tr>
                                        <th class="table_stt">STT</th>
                                        <th>Mã phiếu trả</th>
                                        <th>Ngày trả</th>
                                        <th>Mã phiếu mượn</th>
                                        <th>Mã độc giả</th>
                                        <th>Mã nhân viên</th>
                                        <th>Tổng phí phạt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Hàng sẽ được thêm ở đây -->
                                </tbody>
                            </table>
                        </div>

                        <div class="table_limit-3h" style="width: 40%; margin-left: 0.7%; max-height: 25.4vh;">
                            <table class="table-ct-phieu_tra">
                                <thead>
                                    <tr>
                                        <th colspan="5" class="table-title">Chi Tiết Phiếu Trả</th>
                                    </tr>
                                    <tr>
                                        <th class="table_stt">STT</th>
                                        <th>Mã phiếu</th>
                                        <th>Mã vạch</th>
                                        <th>Mã phạt</th>
                                        <th>Phí phạt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Hàng sẽ được thêm ở đây -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div style="height: 1vh;"></div>
            </div>


            <!-- Quản lý phiếu nhập ------------------------------------------------------------------->
            <div class="quanlyphieunhap">
                <div class="admin_title_content">
                    <div class="admin_title">
                        <h1>QUẢN LÝ PHIẾU NHẬP</h1>
                    </div>
                </div>
                <div class="button_contain">
                    <button class="btn_action btn-add btn-start-ct-phieu_nhap">Nhập sách</button>
                    <button class="btn_action btn-edit btn-edit-ct-phieu_nhap">Sửa</button>
                    <button class="btn_action btn-save btn-save-ct-phieu_nhap" disabled>Lưu</button>
                    <button class="btn_action btn-cancel btn-cancel-ct-phieu_nhap" disabled>Hủy</button>
                    <button class="btn_action btn-reset btn-reset-phieu_nhap">Làm mới</button>
                    <input type="text" class="search-input search-input-phieu_nhap" placeholder="Tìm kiếm...">
                    <button class="btn-search btn-search-phieu_nhap ">
                        <i class='bx bx-search-alt-2'></i>
                    </button>
                </div>
                <div class="input_contain" style="margin-bottom: 0.3%;">
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Tên sách:</label>
                            <select class="input-control select-ten_sach_pn" id="publisher" disabled required>
                                <option value="0">Chọn sách</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Số lượng:</label>
                            <div class="input-container">
                                <input type="text" class="input-control input-soluong_sach_pn"
                                    placeholder="Số lượng nhập" disabled required>
                                <div class="btn-container__arrow">
                                    <button class="btn-arrow" id="increment_soluong_phieunhap">▲</button>
                                    <div style="height: 0.3vh;"></div>
                                    <button class="btn-arrow" id="decrement_soluong_phieunhap">▼</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Giá nhập:</label>
                            <input type="text" class="input-control input-gianhap_sach_pn" placeholder="VNĐ" disabled
                                required>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Thành tiền:</label>
                            <input type="text" class="input-control input-thanhtien_sach_pn" placeholder="Thành tiền"
                                disabled>
                        </div>
                    </div>
                </div>
                <div class="table_contain">
                    <div class="table_limit-3h" style="max-height: 29.5vh;">
                        <table class="table-ct-phieu_nhap-xem">
                            <thead>
                                <tr>
                                    <th colspan="6" class="table-title">Chi Tiết Phiếu Nhập</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã phiếu nhập</th>
                                    <th>Mã sách</th>
                                    <th>Giá nhập</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="table-ct-phieu_nhap">
                            <thead>
                                <tr>
                                    <th colspan="6" class="table-title">Chi Tiết Phiếu Nhập</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã sách</th>
                                    <th>Giá nhập</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="button_contain_manage" style="padding: 0.1% 0;">
                    <button class="btn_action btn-manage btn-ncc" type="button">Nhà cung cấp</button>
                    <div id="pro-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                             background-color: rgba(0, 0, 0, 0.5); z-index: 1;transition: opacity 0.3s ease;"></div>
                    <div class="Provider" style="width: 40%; height: 40%;justify-content: center;position: absolute;top: 30%;left: 30%;
                         z-index:2;background-color: whitesmoke;border: solid black; display: none;
                         justify-content:center">
                        <form action="" class="ProviderForm" style="width: 100%;height: 100%">
                            <div class="navigate-pro-form"
                                style="justify-content: flex-start;margin:5px; display: flex;transition: opacity 0.3s ease;">
                                <button type="button" class="addbtn-pro"
                                    style="width: 100px; height: 30px; border-radius: 20px; background-color: greenyellow">Thêm</button>
                                <div id="addpro-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                             background-color: rgba(0, 0, 0, 0.5); z-index: 2;transition: opacity 0.3s ease;"></div>
                                <div class="addpro-input"
                                    style="display: none; flex-direction: column; padding: 10px;position: fixed; top:30%;left:45%; background-color: white;border: 2px solid; z-index: 4">
                                    <div class="warning"><span id="pro-warning" style="font-size: 12px"></span></div>
                                    <label>Tên nhà cung cấp:</label>
                                    <!--<div class="warning"><span id="mancc-warning" style="font-size: 12px"></span></div>-->
                                    <input type="text" id="input-tenncc" name="input-tenncc"
                                        placeholder="Nhập tên nhà cung cấp" style="margin-bottom: 10px;">

                                    <label>Số điện thoại:</label>
                                    <input type="text" id="input-sdtncc" name="input-sdtncc"
                                        placeholder="Nhập số điện thoại">

                                    <label>Nhập địa chỉ:</label>
                                    <input type="text" id="input-dcncc" name="input-dcncc" placeholder="Nhập địa chỉ">

                                    <div>
                                        <button type="button" class="addprosubmit"
                                            style="margin: 10px 0 0 30px; width: 50px; border-radius: 5px; background-color: greenyellow">Thêm</button>
                                        <button type="button" class="cancelprosubmit"
                                            style="margin-top: 10px; width: 50px; border-radius: 5px; background-color: red">Hủy</button>
                                    </div>
                                </div>
                                <button type="button" class="updatebtn-pro"
                                    style="width: 100px; height: 30px;border-radius: 20px; background-color: orange">Sửa</button>
                                <div class="search-pro-div"
                                    style="max-width: 32%; height: 30px;background-color: white; border: black solid; border-radius: 20px">
                                    <input class="search-pro" type="text" placeholder="Tìm kiếm..."
                                        style="width: 130px;height: 15px;border-radius: 20px;padding-left: 10px; border: none;outline:none" /><i
                                        class="bx bx-search-alt-2" style="margin: 4px 5px 0 0;"></i>
                                </div>
                                <button type="button" class="bx bx-refresh" id="prorefresh"
                                    style="width: 30px;border-radius:50px;background-color:graytext; margin-left: 5px"></button>
                                <button type="button" class="btn-close-pro-form" style="position: absolute; right:5px;top:5px;width: 30px;height: 30px;border-radius: 50px;
                                  background-color: red">X</button>
                            </div>
                            <div class="df-pro" style="overflow-y: auto; max-height: 250px;border:black solid 2px">
                                <table id="pro-table" border="1" style="border:1px solid">
                                    <thead>
                                        <tr style="font-size: 15px; align-items: center">
                                            <th style="width: 100px">Mã NCC</th>
                                            <th style="width: 200px">Tên nhà cung cấp</th>
                                            <th style="width: 200px">Số điện thoại</th>
                                            <th style="width: 200px">Địa chỉ</th>
                                            <th style="width: 200px">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="pro-table-body">

                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <button class="btn_action btn-add btn-create-pn" disabled>Tạo phiếu nhập</button>
                    <div style="width: 0.5vw;"></div>
                    <div>
                        <label class="input-label">Nhà cung cấp:</label>
                        <select class="input-control select-ncc_sach_pn" id="publisher" disabled required>
                            <option value="0">Chọn nhà cung cấp</option>
                            <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                        </select>
                    </div>
                </div>

                <div class="table_contain">
                    <div class="table_limit-3h" style="max-height: 28.2vh;">
                        <table class="table-phieu_nhap">
                            <thead>
                                <tr>
                                    <th colspan="6" class="table-title">Danh Sách Phiếu Nhập</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã phiếu nhập</th>
                                    <th>Nhà cung cấp</th>
                                    <th>Mã nhân viên</th>
                                    <th>Ngày nhập</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="height: 1vh;"></div>
                <!-- Form quản lý -->
            </div>


            <!-- Quản lý tài khoản ------------------------------------------------------------------->
            <div class="quanlytaikhoan">
                <div class="admin_title_content">
                    <div class="admin_title">
                        <h1>QUẢN LÝ TÀI KHOẢN</h1>
                    </div>
                </div>
                <div class="button_contain">
                    <button class="btn_action btn-edit btn-edit-taikhoan">Sửa</button>
                    <button class="btn_action btn-delete btn-delete-taikhoan">Xóa</button>
                    <button class="btn_action btn-save btn-save-taikhoan" disabled>Lưu</button>
                    <button class="btn_action btn-cancel btn-cancel-taikhoan" disabled>Hủy</button>
                    <button class="btn_action btn-reset btn-reset-taikhoan">Làm mới</button>
                    <input type="text" class="search-input search-input-taikhoan" placeholder="Tìm kiếm...">
                    <button class="btn-search btn-search-taikhoan ">
                        <i class='bx bx-search-alt-2'></i>
                    </button>
                </div>
                <div class="input_contain" style="margin-bottom: 0.3%;">
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Tên đăng nhập:</label>
                            <input type="text" class="input-control input-username_tk" placeholder="username" disabled>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Mật khẩu:</label>
                            <input type="text" class="input-control input-password_tk" placeholder="password" disabled>
                        </div>
                    </div>
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Quyền:</label>
                            <select class="input-control select-quyen_tk" id="publisher" disabled>
                                <option value="-1">Chọn quyền</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Ngày tạo:</label>
                            <input type="date" class="input-control input-ngaytao_tk" disabled>
                        </div>
                    </div>
                </div>
                <!-- <div class="button_contain_manage">
                    <button class="btn_action btn-manage btn-chucnang">Chức năng</button>
                    <button class="btn_action btn-manage btn-quyen">Quyền</button>
                </div> -->

                <!-- Bảng Form của các nút từ button_contain_manage -->
                <!-- <div id="account-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                         background-color: rgba(0, 0, 0, 0.5); z-index: 10;transition: opacity 0.3s ease;"></div>
                
                <div class="Function" style="width: 40%; height: 40%;justify-content: center;position: absolute;top: 30%;left: 30%;
                     z-index:15;background-color: whitesmoke;border: solid black; display: none;
                     justify-content:center;padding: 10px; border-radius: 15px">
                    <form action="" class="FunctionForm" style="width: 100%;height: 100%">
                        <div class="navigate-func-form"
                            style="justify-content: flex-start;margin:5px; display: flex;transition: opacity 0.3s ease;">
                            <button type="button" class="addbtn-func"
                                style="width: 100px; height: 30px; border-radius: 20px; background-color: greenyellow">Thêm</button>
                            <div id="addfunc-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                         background-color: rgba(0, 0, 0, 0.5); z-index: 20;transition: opacity 0.3s ease;"></div>
                            <div class="addfunc-input"
                                style="display: none; flex-direction: column; padding: 10px;position: fixed; top:30%;left:45%; background-color: white;border: 2px solid; z-index: 25">
                                <div class="warning"><span id="func-warning" style="font-size: 12px"></span></div>

                                <label>Tên thể loại:</label>
                                <input type="text" id="input-tencn" placeholder="Nhập Tên chức năng">
                                <div>
                                    <button type="button" class="addfuncsubmit"
                                        style="margin: 10px 0 0 30px; width: 50px; border-radius: 5px; background-color: greenyellow">Thêm</button>
                                    <button type="button" class="cancelfuncsubmit"
                                        style="margin-top: 10px; width: 50px; border-radius: 5px; background-color: red">Hủy</button>
                                </div>
                            </div>
                            <button type="button" class="updatebtn-func"
                                style="width: 100px; height: 30px;border-radius: 20px; background-color: orange">Sửa</button>
                            <div class="search-func-div"
                                style="max-width: 32%; height: 30px;background-color: white; border: black solid; border-radius: 20px;display:flex; align-items: center; justify-content: center">
                                <input class="search-func" type="text" placeholder="Tìm kiếm..."
                                    style="max-width: 90%;height: 15px;border-radius: 20px;padding-left: 10px; border: none;outline:none" /><i
                                    class="bx bx-search-alt-2"></i>
                            </div>
                            <button type="button" class="bx bx-refresh" id="funcrefresh"
                                style="width: 30px;border-radius:50px;background-color:graytext; margin-left: 5px"></button>
                            <button type="button" class="btn-close-func-form" style="position: absolute; right:5px;top:5px;width: 30px;height: 30px;border-radius: 50px;
                              background-color: red">X</button>
                        </div>
                        <div class="df-func"
                            style="overflow-y: auto; max-height: 84%;border-radius:3px; border: 1px solid; border-left: 0;border-right: 0">
                            <table id="func-table">
                                <thead>
                                    <tr>
                                        <th style="width: 30%" class="text_center">Mã chức năng</th>
                                        <th class="text_center">Tên chức năng</th>
                                        <th style="width: 20%" class="text_center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="func-table-body">

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div> -->


                <div class="table_contain" style="margin-bottom: 0.5%;">
                    <div class="table_limit-4h" style="max-height: 33.6vh;">
                        <table class="table-taikhoan_docgia">
                            <thead>
                                <tr>
                                    <th colspan="6" class="table-title">Tài Khoản Độc Giả</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Mật khẩu</th>
                                    <th>Quyền</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="table_contain">
                    <div class="table_limit-4h" style="max-height: 33.6vh;">
                        <table class="table-taikhoan_nhanvien">
                            <thead>
                                <tr>
                                    <th colspan="6" class="table-title">Tài Khoản Nhân Viên</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Mật khẩu</th>
                                    <th>Quyền</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="height: 1vh;"></div>
            </div>


            <!-- Thống kê ------------------------------------------------------------------->
            <div class="thongke">
                <div class="admin_title_content">
                    <div class="admin_title">
                        <h1>THỐNG KÊ</h1>
                    </div>
                </div>
                <div class="button_contain">
                    <label for="" style="font-weight: bold; padding-right: 10px;">Thống kê: </label>
                    <div class="tabs">
                        <button class="tab-button-tk active" data-tab="phieunhap-tk">Phiếu nhập</button>
                        <button class="tab-button-tk" data-tab="phieumuon-tk">Phiếu mượn</button>
                        <button class="tab-button-tk" data-tab="phieutra-tk">Phiếu trả</button>
                    </div>
                    <button class="btn_action btn-reset btn-reset-thongke">Làm mới</button>
                    <input type="text" class="search-input search-input-thongke" placeholder="Tìm kiếm...">
                    <button class="btn-search btn-search-taikhoan ">
                        <i class='bx bx-search-alt-2'></i>
                    </button>
                </div>

                <div class="tab-content-tk">
                    <div id="phieunhap-tk" class="tab-pane-tk active">
                        <div class="table_contain">
                            <div>                               
                                <label class="input-label" style="font-size: 16px;">Từ ngày:</label>
                                <input type="date" class="input-control input_thongke_tu_ngay_pn"
                                    style="height: 5vh; width: 12.5%; margin-right: 0.5%;" placeholder="Chọn ngày">
                                <label class="input-label" style="font-size: 16px;">Đến ngày:</label>
                                <input type="date" class="input-control input_thongke_den_ngay_pn"
                                    style="height: 5vh; width: 12.5%;" placeholder="Chọn ngày">
                                <button class="btn_action btn-save btn-tk_pn" type="button">Lọc</button>
                            </div>
                        </div>

                        <div class="table_contain">
                            <div class="table_limit-3h" style="max-height: 28.2vh;">
                                <table class="table-phieu_nhap-tk">
                                    <thead>
                                        <tr>
                                            <th class="table_stt">STT</th>
                                            <th>Mã phiếu nhập</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Mã nhân viên</th>
                                            <th>Ngày nhập</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Hàng sẽ được thêm ở đây -->
                                    </tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-top: 10px;">
                            <div class="total-money-pn">
                                <label style="font-size: 16px;">Tổng tiền: </label>
                                <span id="total-money-pn">0</span> <!-- Hiển thị tổng tiền -->
                            </div>

                            <div class="total-records-pn">
                                <label style="font-size: 16px;">Số lượng bản ghi: </label>
                                <span id="total-records-pn">0</span> <!-- Hiển thị số lượng bản ghi -->
                            </div>

                            <div class="average-records-pn">
                                <label style="font-size: 16px;">Trung bình số tiền mỗi bản ghi: </label>
                                <span id="average-records-pn">0</span> <!-- Hiển thị số lượng bản ghi -->
                            </div>
                        </div>
                        <div style="height: 1vh;"></div>
                    </div>
                    <div id="phieumuon-tk" class="tab-pane-tk">
                        <div class="table_contain">
                            <div>                                 
                                <label class="input-label" style="font-size: 16px;">Từ ngày:</label>
                                <input type="date" class="input-control input_thongke_tu_ngay_pm"
                                    style="height: 5vh; width: 12.5%; margin-right: 0.5%;" placeholder="Chọn ngày">
                                <label class="input-label" style="font-size: 16px;">Đến ngày:</label>
                                <input type="date" class="input-control input_thongke_den_ngay_pm"
                                    style="height: 5vh; width: 12.5%;" placeholder="Chọn ngày">
                                <button class="btn_action btn-save btn-tk_pm" type="button">Lọc</button>
                            </div>
                        </div>
                    
                        <div style="height: 1vh;"></div>
                    
                        <div class="table_contain">
                            <div class="table_limit-4h" style="margin-bottom: 2%;">
                                <table class="table-phieu_muon-tk">
                                    <thead>
                                        <tr>
                                            <th class="table_stt">STT</th>
                                            <th>Mã phiếu</th>
                                            <th>Ngày mượn</th>
                                            <th>Hạn trả</th>
                                            <th>Mã độc giả</th>
                                            <th>Mã nhân viên</th>
                                            <th>Tổng phí mượn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Hàng sẽ được thêm ở đây -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                        <!-- Hiển thị tổng phí mượn và số lượng bản ghi -->
                        <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-top: 10px;">
                            <div class="total-money">
                                <label style="font-size: 16px;">Tổng phí mượn: </label>
                                <span id="total-fee">0</span> <!-- Hiển thị tổng phí mượn -->
                            </div>
                            <div class="total-records">
                                <label style="font-size: 16px;">Số lượng bản ghi: </label>
                                <span id="total-records-pm">0</span> <!-- Hiển thị số lượng bản ghi -->
                            </div>
                            <div class="average-records-pm">
                                <label style="font-size: 16px;">Trung bình phí mượn mỗi bản ghi: </label>
                                <span id="average-records-pm">0</span> <!-- Hiển thị số lượng bản ghi -->
                            </div>
                        </div>
                    
                        <div style="height: 1vh;"></div>
                    </div>
                    
                    <div id="phieutra-tk" class="tab-pane-tk">
                        <div class="table_contain">
                            <div>                        
                                <label class="input-label" style="font-size: 16px;">Từ ngày:</label>
                                <input type="date" class="input-control input_thongke_tu_ngay_pt"
                                    style="height: 5vh; width: 12.5%; margin-right: 0.5%;" placeholder="Chọn ngày">
                                <label class="input-label" style="font-size: 16px;">Đến ngày:</label>
                                <input type="date" class="input-control input_thongke_den_ngay_pt"
                                    style="height: 5vh; width: 12.5%;" placeholder="Chọn ngày">
                                <button class="btn_action btn-save btn-tk_pt" type="button">Lọc</button>
                            </div>
                        </div>            
                        <div class="table_contain">
                            <div style="display: flex; justify-content: center;">
                                <div class="table_limit-3h" style="width: 60%; max-height: 24vh;">
                                    <table class="table-phieu_tra-tk">
                                        <thead>
                                            <tr>
                                                <th class="table_stt">STT</th>
                                                <th>Mã phiếu trả</th>
                                                <th>Ngày trả</th>
                                                <th>Mã phiếu mượn</th>
                                                <th>Mã độc giả</th>
                                                <th>Mã nhân viên</th>
                                                <th>Tổng phí phạt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Hàng sẽ được thêm ở đây -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                                            
                        <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                            <div class="total-fee">
                                <label style="font-size: 16px;">Tổng phí phạt: </label>
                                <span id="total-fee-pt">0</span> <!-- Hiển thị tổng phí phạt -->
                            </div>
                            <div class="total-records">
                                <label style="font-size: 16px;">Số lượng bản ghi: </label>
                                <span id="total-records-pt">0</span> <!-- Hiển thị số lượng bản ghi -->
                            </div>
                            <div class="average-records-pt">
                                <label style="font-size: 16px;">Trung bình số tiền phạt mỗi bản ghi: </label>
                                <span id="average-records-pt">0</span> <!-- Hiển thị số lượng bản ghi -->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Quản lý phân quyền ------------------------------------------------------------------->
            <div class="quanlyphanquyen">
                <div class="admin_title_content">
                    <div class="admin_title">
                        <h1>QUẢN LÝ PHÂN QUYỀN</h1>
                    </div>
                </div>

                <div class="tabs">
                    <button class="tab-button active" data-tab="phanquyen">Phân quyền</button>
                    <button class="tab-button" data-tab="chucnang">Chức năng</button>
                </div>

                <div class="tab-content">
                    <div id="phanquyen" class="tab-pane active">
                        <div class="button_contain">
                            <button class="btn_action btn-add btn-add-pq">Thêm</button>
                            <button class="btn_action btn-edit btn-edit-pq">Sửa</button>
                            <button class="btn_action btn-delete btn-delete-pq">Xóa</button>
                            <button class="btn_action btn-save btn-save-pq" disabled>Lưu</button>
                            <button class="btn_action btn-cancel btn-cancel-pq" disabled>Hủy</button>
                            <button class="btn_action btn-reset btn-reset-pq">Làm mới</button>
                            <input type="text" class="search-input search-input-pq" placeholder="Tìm kiếm...">
                            <button class="btn-search btn-search-pq ">
                                <i class='bx bx-search-alt-2'></i>
                            </button>
                        </div>

                        <div class="input_contain">
                            <div class="input_contain_child">
                                <div class="input-group">
                                    <label class="input-label">ID nhóm quyền:</label>
                                    <input type="text" class="input-control input-ma_pq" placeholder="ID nhóm quyền"
                                        disabled required>
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Tên nhóm quyền:</label>
                                    <input type="text" class="input-control input-ten_pq"
                                        placeholder="Nhập tên nhóm quyền" disabled required>
                                </div>
                            </div>
                            <div class="input_contain_child">
                                <div class="input-group">
                                    <label class="input-label">Mô tả:</label>
                                    <textarea class="input-control input-mota_pq" id="textarea" rows="1"
                                        placeholder="Nhập mô tả" disabled required></textarea>
                                </div>

                                <button class="btn_action btn-manage btn-ctq" type="button">Chi tiết quyền</button>
                                <div id="ctq-overlay"
                                    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                                         background-color: rgba(0, 0, 0, 0.5); z-index: 1;transition: opacity 0.3s ease;"></div>
                                <div class="Phanquyen" style="width: 40%; height: 40%;justify-content: center;position: absolute;top: 30%;left: 30%;
                                     z-index:2;background-color: whitesmoke;border: solid black; display: none;
                                     justify-content:center">
                                    <form action="" class="PhanquyenForm" style="width: 100%;height: 100%">
                                        <div class="navigate-ctq-form"
                                            style="justify-content: flex-start;margin:5px; display: flex;transition: opacity 0.3s ease;">
                                            <div class="search-ctq-div"
                                                style="max-width: 32%; height: 30px;background-color: white; border: black solid; border-radius: 20px">
                                                <input class="search-ctq" type="text" placeholder="Tìm kiếm..."
                                                    style="width: 130px;height: 15px;border-radius: 20px;padding-left: 10px; border: none;outline:none" /><i
                                                    class="bx bx-search-alt-2" style="margin: 4px 5px 0 0;"></i>
                                            </div>
                                            <button type="button" class="btn-close-ctq-form" style="position: absolute; right:5px;top:5px;width: 30px;height: 30px;border-radius: 50px;
                                              background-color: red">X</button>
                                        </div>
                                        <div class="df-ctq"
                                            style="overflow-y: auto; max-height: 250px;border:black solid 2px">
                                            <table id="table-chitietquyen" border="1" style="border:1px solid">
                                                <thead>
                                                    <tr style="font-size: 15px; align-items: center">
                                                        <th style="width: 15px">STT</th>
                                                        <th style="width: 100px">Tên chức năng</th>
                                                        <th style="width: 100px">Hành động</th>
                                                        <th style="width: 50px"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ctq-table-body">

                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="table_contain">
                            <div class="table_limit-3h" style="margin-bottom: 2%;  max-height: 28.2vh">
                                <table class="table-quyen">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="table-title">Danh Sách Nhóm Quyền</th>
                                        </tr>
                                        <tr>
                                            <th style="width: 15%;">ID Nhóm Quyền</th>
                                            <th style="width: 40%;">Tên Nhóm Quyền</th>
                                            <th>Mô Tả</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Hàng sẽ được thêm ở đây -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="chucnang" class="tab-pane">
                        <table class="table-phanquyen_chucnang">
                            <thead>
                                <tr>
                                    <th colspan="4" class="table-title">Chức Năng Quản Lý</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>ID Chức Năng</th>
                                    <th>Tên chức năng</th>
                                    <th>Mô tả</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td id="cn01">CN01</td>
                                    <td>Quản lý sách</td>
                                    <td>Quản lý sách</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td id="cn02">CN02</td>
                                    <td>Quản lý nhân viên</td>
                                    <td>Quản lý nhân viên</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td id="cn03">CN03</td>
                                    <td>Quản lý độc giả</td>
                                    <td>Quản lý độc giả</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td id="cn04">CN04</td>
                                    <td>Quản lý mượn sách</td>
                                    <td>Quản lý mượn sách</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td id="cn05">CN05</td>
                                    <td>Quản lý trả sách</td>
                                    <td>Quản lý trả sách</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td id="cn06">CN06</td>
                                    <td>Phiếu nhập</td>
                                    <td>Quản lý phiếu nhập kho</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td id="cn07">CN07</td>
                                    <td>Quản lý tài khoản</td>
                                    <td>Quản lý tài khoản</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td id="cn08">CN08</td>
                                    <td>Quản lý phân quyền</td>
                                    <td>Quản lý phân quyền</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td id="cn09">CN09</td>
                                    <td>Thống kê</td>
                                    <td>Thống kê</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <script>
                // JavaScript xử lý chuyển tab
                document.addEventListener('DOMContentLoaded', function () {
                    // Lấy tất cả các tab buttons và nội dung
                    const tabButtons = document.querySelectorAll('.tab-button');
                    const tabPanes = document.querySelectorAll('.tab-pane');

                    // Gán sự kiện click cho từng tab button
                    tabButtons.forEach(button => {
                        button.addEventListener('click', function () {
                            // Xóa class active khỏi tất cả các tab buttons và tab panes
                            tabButtons.forEach(btn => btn.classList.remove('active'));
                            tabPanes.forEach(pane => pane.classList.remove('active'));

                            // Thêm class active cho tab được chọn
                            this.classList.add('active');
                            const targetTab = this.getAttribute('data-tab');
                            document.getElementById(targetTab).classList.add('active');
                        });
                    });
                });
            </script>


            <!-- Thông tin cá nhân ------------------------------------------------------------------->
            <div class="thongtincanhan">
                <div class="admin_title_content">
                    <div class="admin_title">
                        <h1>THÔNG TIN CÁ NHÂN</h1>
                    </div>
                </div>
                <!-- <div class="button_contain">
                    <button class="btn_action btn-edit btn-edit-info_admin">Sửa</button>
                    <button class="btn_action btn-save btn-save-info_admin" disabled>Lưu</button>
                    <button class="btn_action btn-cancel btn-cancel-info_admin" disabled>Hủy</button>
                </div> -->
                <div style="display: flex; justify-content: center; margin-top: 1%;">
                    <div class="input_contain" style="width: 50%; flex-direction: column;">
                        <div class="input_contain_child">
                            <div class="input-group">
                                <label class="input-label">Tên nhân viên:</label>
                                <input type="text" class="input-control info_admin-ten" placeholder=""
                                    style="width: 22vw;" disabled>
                            </div>
                            <div class="input-group">
                                <label class="input-label">Giới tính:</label>
                                <select class="input-control info_admin-gioitinh" id="publisher" disabled>
                                    <option value="0">Chọn giới tính</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Khác">Khác</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label class="input-label">Ngày sinh:</label>
                                <input type="date" class="input-control info_admin-ngaysinh" placeholder=""
                                    style="width: 22vw;" disabled>
                            </div>
                            <div class="input-group">
                                <label class="input-label">Email:</label>
                                <input type="text" class="input-control info_admin-email" placeholder=""
                                    style="width: 22vw;" disabled>
                            </div>
                            <div class="input-group">
                                <label class="input-label">Số điện thoại:</label>
                                <input type="text" class="input-control info_admin-sdt" placeholder=""
                                    style="width: 22vw;" disabled>
                            </div>
                            <div class="input-group">
                                <label class="input-label">Địa chỉ:</label>
                                <input type="text" class="input-control info_admin-diachi" placeholder=""
                                    style="width: 22vw;" disabled>
                            </div>
                            <div class="input-group">
                                <label class="input-label">Ảnh đại diện:</label>
                                <!-- <input type="file" id="image-upload" class="image-upload info_admin-btn_img"
                                    onchange="previewImageNVinfo(event)" accept="image/*" disabled> -->
                                    <div class="image-container">
                                        <div class="image-preview">
                                            <img id="image_max" class="image-nv-info" src="../img/noimages.png" alt="">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        
                    </div>
                </div>
                <div style="height: 1vh;"></div>
            </div>


        </div>
    </section>

    <div style = "display: none;" id="userInfo" data-username="<?php echo htmlspecialchars($tenDangNhap); ?>"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../Controller/jsadmin4.js"></script>
    <script src="../Controller/ql_sach16.js"></script>
    <script src="../Controller/ql_nv8.js"></script>
    <script src="../Controller/ql_phanquyen2.js"></script>
    <script src="../Controller/ql_dg5.js"></script>
    <script src="../Controller/ql_phieunhap18.js"></script>
    <script src="../Controller/ql_phieumuon7.js"></script>
    <script src="../Controller/ql_phieutra11.js"></script>
    <script src="../Controller/ql_taikhoan7.js"></script>
    <script src="../Controller/info_admin4.js"></script>
    <script src="../Controller/thongke.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            getUserInfo('admin'); // Gọi hàm với mã tài khoản cụ thể
            getUserNAME('admin');

             // Lấy tên đăng nhập từ data-attribute
        var tenDangNhap = document.getElementById('userInfo').getAttribute('data-username');
        getUserNAME(tenDangNhap); // Gọi hàm với tên đăng nhập
        console.log('hekooooo' + tenDangNhap );
        });


        document.getElementById('logoutButton').addEventListener('click', function() {
    if (confirm('Bạn có chắc chắn muốn đăng xuất?')) {
        // Chuyển hướng đến trang logout.php để xử lý đăng xuất
        window.location.href = '../DAO/dn_dk/logout.php';
    }
});
    </script>
</body>

</html>