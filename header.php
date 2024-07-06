
<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['email'])) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Quản Lý </title>
<!-- plugins:css -->
<link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- Plugin css for this page -->

<link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/ruang-admin.min.css" rel="stylesheet">
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />

<link rel="stylesheet" href="assets/css/style.css">
<!-- End layout styles -->
<link rel="shortcut icon" href="assets/images/favicon.png" />
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<?php
// kết nối CSDL 
include ("ketnoi.php");
?>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a> QUẢN LÝ</a>
                

                <!-- <a class="navbar-brand brand-logo" href="index.html"></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"></a> -->
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>


                <div class="search-field d-none d-xl-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <!-- <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0" placeholder="Search ">
                        </div> -->

                    </form>
                </div>

                <ul class="navbar-nav navbar-nav-right">
                    <!-- <li class="nav-item  dropdown d-none d-md-block">
                        <a class="nav-link dropdown-toggle" id="reportDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false"> Reports </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="reportDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-file-pdf mr-2"></i>PDF </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-file-excel mr-2"></i>Excel </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-file-word mr-2"></i>doc </a>
                        </div>
                    </li> -->

                    <!-- Thiết lập ngôn ngữ-->
                    <li class="nav-item nav-language dropdown d-none d-md-block">
                        <a class="nav-link" id="languageDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-language-icon">
                                <i class="flag-icon flag-icon-us" title="us" id="us"></i>
                            </div>
                            <div class="nav-language-text">
                                <p class="mb-1 text-black">Vietnamese</p>
                            </div>
                        </a>
                        <!-- <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                            <a class="dropdown-item" href="#">
                                <div class="nav-language-icon mr-2">
                                    <i class="flag-icon flag-icon-ae" title="ae" id="ae"></i>
                                </div>
                                <div class="nav-language-text">
                                    <p class="mb-1 text-black">Arabic</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <div class="nav-language-icon mr-2">
                                    <i class="flag-icon flag-icon-gb" title="GB" id="gb"></i>
                                </div>
                                <div class="nav-language-text">
                                    <p class="mb-1 text-black">English</p>
                                </div>
                            </a>
                        </div> -->
                    </li>
                    <!------------------------------------------------------------------------------------->
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="hinhanh\cucno.jpg" alt="image">
                            </div>
                            <div class="nav-profile-text">
                                <!-- <p class="mb-1 text-black"> Xuyen Nguyen</p> -->
                                <?php
                                // Kiểm tra xem session có tồn tại và có chứa tên người dùng không
                                if (isset($_SESSION['hoten'])) {
                                    echo '<p class="mb-1 text-black">' . $_SESSION['hoten'] . '</p>';
                                } else {
                                    echo '<p>Chào mừng bạn!</p>';
                                }
                                ?>
                            </div>
                        </a>
                     
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-category">tag</li>

                    <li class="nav-item">
                        <a class="nav-link" href="QLLT.php">
                            <span class="icon-bg"> <i class="ti ti-calendar-month" style="font-size:25px;"></i> </span>
                            
                            <span class="menu-title">LỊCH TRỰC</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="QL_PHANCONG.php">
                            <span class="icon-bg"><i class="ti ti-calendar-check" style="font-size:25px;"></i></span>
                            <span class="menu-title"> PHÂN CÔNG - HOÁN ĐỔI  </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="QLTK.PHP">
                            <span class="icon-bg"><i class="ti ti-users" style="font-size:25px;"></i></span>
                            <span class="menu-title"> QUẢN LÝ TÀI KHOẢN </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="QLTT.php">
                            <span class="icon-bg"><i class="ti ti-news" style="font-size:25px;"></i></span>
                            <span class="menu-title">QUẢN LÝ TIN TỨC</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="QLSK.php">
                            <span class="icon-bg"><i class="ti ti-brand-notion" style="font-size:25px;"></i></span>

                            <span class="menu-title">QUẢN LÝ SỰ KIỆN</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="DS_DKTQ.php">
                            <span class="icon-bg"><i class="ti ti-clipboard-list" style="font-size:25px;"></i></span>

                            <span class="menu-title">DANH SÁCH THAM QUAN</span>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="QLCV.php">
                            <span class="icon-bg"><i class="ti ti-user-up" style="font-size:25px;"></i></span>

                            <span class="menu-title">QUẢN LÝ CHỨC VỤ</span>
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="QLNT.php">
                            <span class="icon-bg"><i class="ti ti-users-group" style="font-size:25px;"></i></span>

                            <span class="menu-title">QUẢN LÝ ĐƠN VỊ</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="">
                            <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                            <span class="menu-title">Tables</span>
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="hoso_canhan_admin.php">
                            <span class="icon-bg"><i class="ti ti-user-square" style="font-size:25px;"></i></span>
                            <span class="menu-title"> HỒ SƠ CÁ NHÂN </span>
                        </a>
                    </li>

                    <li class="nav-item sidebar-user-actions">
                        <div class="sidebar-user-menu">
                            <a href="logout.php" class="nav-link"><i class="mdi mdi-logout menu-icon" style="font-size:25px; color: yellow;"></i>
                                <span class="menu-title" >Log Out</span></a>
                        </div>
                    </li>

                    
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
