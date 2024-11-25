<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./style/styleadmin.css">
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
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="../img/hacker2.png" alt="profile" id="profile-img">
                    </div>
                    <div class="name-job">
                        <div class="profile-name no-select">KhangGan</div>
                        <div class="job no-select">Thủ thư</div>
                    </div>
                    <i class='bx bx-log-out no-select btn-logout' style="cursor: pointer;"></i>
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
                            <input type="text" class="input-control" placeholder="Nhập tên sách">
                        </div>
                        <div class="input-group">
                            <label class="input-label">Thể loại:</label>
                            <select class="input-control" id="publisher">
                                <option value="0">Chọn thể loại</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Tóm tắt:</label>
                            <textarea class="input-control" id="textarea" rows="3"
                                placeholder="Nhập tóm tắt"></textarea>
                        </div>
                    </div>
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Nhà xuất bản:</label>
                            <select class="input-control" id="publisher">
                                <option value="0">Chọn nhà xuất bản</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Tác giả:</label>
                            <select class="input-control" id="publisher">
                                <option value="0">Chọn tác giả</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Phí mượn:</label>
                            <input type="text" class="input-control" placeholder="Nhập phí mượn">
                        </div>
                        <div class="input-group">
                            <label class="input-label">Số lượng:</label>
                            <input type="text" class="input-control" placeholder="Số lượng">
                        </div>
                    </div>
                    <div class="image-container">
                        <div class="image-preview image-sach"><img id="image_max" src="../img/noimages.png" alt="">
                        </div>
                        <input type="file" id="image-upload" class="image-upload_sach" accept="image/*">
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
                    <div class="table_limit-3h" style="margin-bottom: 2%; max-height: 28.2vh;">
                        <table class="table-sach">
                            <thead>
                                <tr>
                                    <th colspan="9" class="table-title">Danh Sách Sách</th>
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
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
                            </tbody>
                        </table>
                    </div>
                    <div style="display: flex; justify-content: center;">
                        <div class="table_limit-3h" style="width: 35%; max-height: 25.4vh;">
                            <table class="table-sach_sapxep">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="table-title">Sắp Xếp Sách</th>
                                    </tr>
                                    <tr>
                                        <th class="table_stt">STT</th>
                                        <th>Mã sách</th>
                                        <th class="text_center">Sắp xếp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Hàng sẽ được thêm ở đây -->
                                </tbody>
                            </table>
                        </div>

                        <div class="table_limit-3h" style="width: 65%; margin-left: 1%; max-height: 24.5vh;">
                            <table class="table-ct-sach">
                                <thead>
                                    <tr>
                                        <th colspan="6" class="table-title">Chi Tiết Sách</th>
                                    </tr>
                                    <tr>
                                        <th class="table_stt">STT</th>
                                        <th>Mã sách</th>
                                        <th>Mã vạch</th>
                                        <th>Tình trạng</th>
                                        <th>Vị trí</th>
                                        <th>Xóa</th>
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
                            <input type="text" class="input-control" placeholder="Nhập tên nhân viên">
                        </div>
                        <div class="input-group">
                            <label class="input-label">Giới tính:</label>
                            <select class="input-control" id="publisher">
                                <option value="0">Chọn giới tính</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Ngày sinh</label>
                            <input type="text" class="input-control" placeholder="Nhập ngày sinh">
                        </div>
                    </div>
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Địa chỉ email:</label>
                            <input type="text" class="input-control" placeholder="Nhập email">
                        </div>
                        <div class="input-group">
                            <label class="input-label">Số điện thoại:</label>
                            <input type="text" class="input-control" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="input-group">
                            <label class="input-label">Địa chỉ:</label>
                            <input type="text" class="input-control" placeholder="Nhập địa chỉ">
                        </div>
                    </div>
                    <div class="image-container">
                        <div class="image-preview image-nv"><img id="image_max" src="../img/noimages.png" alt="">
                        </div>
                        <input type="file" id="image-upload" class="image-upload_nv" accept="image/*">
                    </div>
                </div>
                <div class="button_contain_manage" style="height: 0.5vh;">
                </div>
                <div class="table_contain">
                    <div class="table_limit-3h" style="margin-bottom: 2%;  max-height: 29.5vh">
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

                    <div class="table_limit-3h" style="display: flex; justify-content: center;">
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
                            <input type="text" class="input-control" placeholder="Tên độc giả">
                        </div>
                        <div class="input-group">
                            <label class="input-label">Giới tính:</label>
                            <select class="input-control" id="publisher">
                                <option value="0">Chọn giới tính</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Loại độc giả:</label>
                            <select class="input-control" id="publisher">
                                <option value="0">Chọn loại độc giả</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Ngày sinh:</label>
                            <input type="text" class="input-control" placeholder="Ngày sinh">
                        </div>
                    </div>
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Địa chỉ email:</label>
                            <input type="text" class="input-control" placeholder="Email">
                        </div>
                        <div class="input-group">
                            <label class="input-label">Số điện thoại:</label>
                            <input type="text" class="input-control" placeholder="Số điện thoại">
                        </div>
                        <div class="input-group">
                            <label class="input-label">Địa chỉ:</label>
                            <input type="text" class="input-control" placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div class="image-container">
                        <div class="image-preview image-nv"><img id="image_max" src="../img/noimages.png" alt="">
                        </div>
                        <input type="file" id="image-upload" class="image-upload_dg" accept="image/*">
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
                    <button class="btn_action btn-add btn-add-phieu_muon">Tạo phiếu mượn</button>
                    <button class="btn_action btn-cancel btn-cancel-phieu_muon" disabled>Hủy</button>
                    <button class="btn_action btn-reset btn-reset-phieu_muon">Làm mới</button>
                    <input type="text" class="search-input search-input-phieu_muon" placeholder="Tìm kiếm...">
                    <button class="btn-search btn-search-phieu_muon ">
                        <i class='bx bx-search-alt-2'></i>
                    </button>
                </div>
                <div class="table_contain">
                    <div class="table_limit-4h" style="margin-bottom: 2%;">
                        <table class="table-phieu_muon">
                            <thead>
                                <tr>
                                    <th colspan="8" class="table-title">Danh Sách Phiếu Mượn</th>
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
                                    <th colspan="4" class="table-title">Chi Tiết Phiếu Mượn</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã phiếu</th>
                                    <th>Mã vạch</th>
                                    <th>Tình trạng mượn</th>
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

                    <div class="button_contain">

                    </div>
                    <div class="input_contain">

                    </div>
                    <div class="button_contain_manage">
                        <button class="btn_action btn-manage btn-hinhthucphat">Hình thức phạt</button>
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
                    <div class="table_contain">

                    </div>
                    <div class="ct_trasach">

                    </div>
                </div>
            </div>


            <!-- Quản lý phiếu nhập ------------------------------------------------------------------->
            <div class="quanlyphieunhap">
                <div class="admin_title_content">
                    <div class="admin_title">
                        <h1>QUẢN LÝ PHIẾU NHẬP</h1>
                    </div>
                </div>
                <div class="button_contain">
                    <button class="btn_action btn-add btn-start-ct-phieu_nhap">Nhập sản phẩm</button>
                    <button class="btn_action btn-save btn-add-ct-phieu_nhap" disabled>Thêm</button>
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
                            <select class="input-control" id="publisher">
                                <option value="0">Chọn sách</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Số lượng:</label>
                            <input type="text" class="input-control" placeholder="Số lượng nhập">
                        </div>
                    </div>
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Giá nhập:</label>
                            <input type="text" class="input-control" placeholder="Giá nhập">
                        </div>
                        <div class="input-group">
                            <label class="input-label">Thành tiền:</label>
                            <input type="text" class="input-control" placeholder="Thành tiền">
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
                                    <th colspan="5" class="table-title">Chi Tiết Phiếu Nhập</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã sách</th>
                                    <th>Giá nhập</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
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
                        <div class="navigate-pro-form" style="justify-content: flex-start;margin:5px; display: flex;transition: opacity 0.3s ease;">
                          <button type="button" class="addbtn-pro" style="width: 100px; height: 30px; border-radius: 20px; background-color: greenyellow">Thêm</button>
                          <div id="addpro-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                             background-color: rgba(0, 0, 0, 0.5); z-index: 2;transition: opacity 0.3s ease;"></div>
                          <div class="addpro-input" style="display: none; flex-direction: column; padding: 10px;position: fixed; top:30%;left:45%; background-color: white;border: 2px solid; z-index: 4">
                                <div class="warning"><span id="pro-warning" style="font-size: 12px"></span></div>
                                <label>Tên nhà cung cấp:</label>
                                <!--<div class="warning"><span id="matl-warning" style="font-size: 12px"></span></div>-->
                                <input type="text" id="input-tenncc" placeholder="Nhập tên nhà cung cấp" required style="margin-bottom: 10px;">
    
                                <label>Số điện thoại:</label>
                                <input type="text" id="input-sdtncc" placeholder="Nhập số điện thoại" required>

                                <label>Nhập địa chỉ:</label>
                                <input type="text" id="input-dcncc" placeholder="Nhập địa chỉ" required>

                                <div>
                                    <button type="button" class="addprosubmit" style="margin: 10px 0 0 30px; width: 50px; border-radius: 5px; background-color: greenyellow">Thêm</button>
                                    <button type="button" class="cancelprosubmit" style="margin-top: 10px; width: 50px; border-radius: 5px; background-color: red">Hủy</button>
                                </div>
                          </div>
                          <button type="button" class="updatebtn-pro" style="width: 100px; height: 30px;border-radius: 20px; background-color: orange">Sửa</button>
                          <div class="search-pro-div" style="max-width: 32%; height: 30px;background-color: white; border: black solid; border-radius: 20px">
                              <input class="search-pro" type="text" placeholder="Tìm kiếm nhà cung cấp" style="width: 130px;height: 15px;border-radius: 20px;padding-left: 10px; border: none;outline:none"/><i class="bx bx-search-alt-2" style="margin: 4px 5px 0 0;"></i>
                          </div>
                          <button type="button" class="bx bx-refresh" id="refresh" style="width: 30px;border-radius:50px;background-color:graytext; margin-left: 5px"></button>
                          <button type="button" class="btn-close-pro-form" style="position: absolute; right:5px;top:5px;width: 30px;height: 30px;border-radius: 50px;
                                  background-color: red">X</button>
                        </div>
                        <div class="df-pro" style="overflow-y: auto; max-height: 250px;border:black solid 2px">
                              <table id="cat-table" border="1" style="border:1px solid">
                                  <thead>
                                    <tr style="font-size: 15px; align-items: center">
                                        <th style="width: 200px">Mã nhà cung cấp</th>
                                        <th style="width: 200px">Tên nhà cung cấp</th>
                                        <th style="width: 200px">Số điện thoại</th>
                                        <th style="width: 200px">Địa chỉ</th>
                                    </tr>
                                  </thead>
                                  <tbody class="table-body">
                                      
                                  </tbody>
                              </table>
                          </div>
                      </form>
                    </div>
                    <button class="btn_action btn-add btn-add-pn">Tạo phiếu nhập</button>
                    <div style="width: 0.5vw;"></div>
                    <div>
                        <label class="input-label">Nhà cung cấp:</label>
                        <select class="input-control" id="publisher">
                            <option value="0">Chọn nhà cung cấp</option>
                            <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                        </select>
                    </div>
                </div>
                <div class="table_contain">
                    <div class="table_limit-3h">
                        <table class="table-phieu_nhap">
                            <thead>
                                <tr>
                                    <th colspan="6" class="table-title">Danh Sách Phiếu Nhập</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Mã phiếu nhập</th>
                                    <th>Mã nhà cung cấp</th>
                                    <th>Mã nhân viên</th>
                                    <th>Ngày nhập</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
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
                    <button class="btn_action btn-delete btn-delete-taikhoan">Xóa</button>
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
                            <input type="text" class="input-control" placeholder="username">
                        </div>
                        <div class="input-group">
                            <label class="input-label">Mật khẩu:</label>
                            <input type="text" class="input-control" placeholder="password">
                        </div>
                    </div>
                    <div class="input_contain_child">
                        <div class="input-group">
                            <label class="input-label">Quyền:</label>
                            <select class="input-control" id="publisher">
                                <option value="0">Chọn quyền</option>
                                <!-- Tùy chọn sẽ được thêm qua JavaScript -->
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Ngày tạo:</label>
                            <input type="text" class="input-control" placeholder="dd/mm/yyyy">
                        </div>
                    </div>
                </div>
                <div class="table_contain">
                    <div class="table_limit-5h">
                        <table class="table-taikhoan_docgia">
                            <thead>
                                <tr>
                                    <th colspan="5" class="table-title">Tài Khoản Độc Giả</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Mật khẩu</th>
                                    <th>Quyền</th>
                                    <th>Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Hàng sẽ được thêm ở đây -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="button_contain_manage">
                    <button class="btn_action btn-manage btn-quyen">Quyền</button>
                </div>
                <!-- Bảng Form của các nút từ button_contain_manage -->
                <!-- <div id="reader-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                         background-color: rgba(0, 0, 0, 0.5); z-index: 10;transition: opacity 0.3s ease;"></div> -->
                <!--Overlay chung cho các form-->
                <!-- <div class="ReaderCategory" style="width: 50%; height: 50%;justify-content: center;position: absolute;top: 25%;left: 25%;
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
                </div> -->
                <!-------------------------End Forms--------------------------->
                <div class="table_contain">
                    <div class="table_limit-5h">
                        <table class="table-taikhoan_nhanvien">
                            <thead>
                                <tr>
                                    <th colspan="5" class="table-title">Tài Khoản Nhân Viên</th>
                                </tr>
                                <tr>
                                    <th class="table_stt">STT</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Mật khẩu</th>
                                    <th>Quyền</th>
                                    <th>Ngày tạo</th>
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
                    <div class="input_contain">

                    </div>
                    <div class="button_contain">

                    </div>
                    <div class="table_contain">

                    </div>
                </div>
            </div>


            <!-- Thông tin cá nhân ------------------------------------------------------------------->
            <div class="thongtincanhan">
                <div class="admin_title_content">
                    <div class="admin_title">
                        <h1>THÔNG TIN TÀI KHOẢN</h1>
                    </div>
                </div>
                <div class="button_contain">
                    <button class="btn_action btn-edit btn-edit-info_admin">Sửa</button>
                    <button class="btn_action btn-save btn-save-info_admin" disabled>Lưu</button>
                    <button class="btn_action btn-cancel btn-cancel-info_admin" disabled>Hủy</button>
                </div>
                <div style="display: flex; justify-content: center;">
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
                                <input type="text" class="input-control info_admin-ngaysinh" placeholder=""
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
                        </div>
                        <div class="image-container">
                            <div class="image-preview image-nv"><img id="image_max" src="../img/noimages.png" alt="">
                            </div>
                            <input type="file" id="image-upload" class="image-upload_dg info_admin-btn_img"
                                accept="image/*" disabled>
                        </div>
                    </div>
                </div>
                <div style="height: 1vh;"></div>
            </div>


        </div>
    </section>

    <script src="../Controller/jsadmin.js"></script>
    <script src="../Controller/ql_sach.js"></script>
    <script src="../Controller/ql_nv.js"></script>
    <script src="../Controller/ql_dg.js"></script>
    <script src="../Controller/ql_phieunhap.js"></script>
    <script src="../Controller/info_admin.js"></script>
</body>

</html>