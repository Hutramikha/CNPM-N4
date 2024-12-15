<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Giao diện tạm thời</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/newstyle.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="xuli.js"></script>


</head>

<body id="page-top">
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?act=danhSachSanPham&userId=9&currentPage=1&favo=0&searchInput=''">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> <sup>thư viện</sup> XANH </div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="index.php?act=danhSachSanPham&userId=9&currentPage=1&favo=0&searchInput=''">
                    <i class="fas fa-home"></i>
                    <span> Trang chủ </span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo" onclick="setActiveMenuBar(this, 'parent')">
                    <i class="fas fa-book-open"></i>
                    <span> Hoạt động </span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?act=xemGioMuon&userId=9" onclick="setActiveMenuBar(this, 'child')"> Giỏ mượn của tôi </a>
                        <a class="collapse-item" href="index.php?act=xemSachDangMuon&userId=9" onclick="setActiveMenuBar(this, 'child')"> Đang mượn </a>
                        <a class="collapse-item" href="index.php?act=xemLichSuMuon&userId=9" onclick="setActiveMenuBar(this, 'child')"> Lịch sử mượn </a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?act=blank" onclick="setActiveMenuBar(this, 'single')">
                    <i class="fas fa-clock"></i>
                    <span> Gia hạn sách </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?act=danhSachSanPham&userId=9&currentPage=1&favo=1&searchInput=''" onclick="setActiveMenuBar(this, 'single')">
                    <i class="fas fa-heart"></i>
                    <span> Sách yêu thích của tôi </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?act=blank" onclick="setActiveMenuBar(this, 'single')">
                    <i class="fas fa-clipboard-list"></i>
                    <span> Quy định sử dụng dịch vụ </span>
                </a>
            </li>

            <script>

            </script>
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" id="search-input"
                                placeholder="Tìm kiếm sách..." aria-label="Search" aria-describedby="basic-addon2">
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const savedSearchInput = localStorage.getItem('searchInput');
                                    if (savedSearchInput) {
                                        document.querySelector('#search-input').value = savedSearchInput;
                                    } else {
                                        document.querySelector('#search-input').value = '';
                                    }
                                    localStorage.removeItem('searchInput');
                                });
                            </script>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="submit-search-btn" onclick="timKiemSanPham()">
                                    <i class="fas fa-search fa-sm"> </i>
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </nav>
            </div>