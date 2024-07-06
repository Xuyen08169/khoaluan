
<?php
 include("htrangchu.php")

?>

<head>
    

    <!--font-family-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- title of site -->
    <title> Trang chính Page</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!--linear icon css-->
    <link rel="stylesheet" href="assets/css/linearicons.css">

    <!--animate.css-->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!--flaticon.css-->
    <link rel="stylesheet" href="assets/css/flaticon.css">

    <!--slick.css-->
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- bootsnav -->
    <link rel="stylesheet" href="assets/css/bootsnav.css">

    <!--style.css-->
    <link rel="stylesheet" href="assets\css\style.css">

    <!--responsive.css-->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


   

</head>

<body>
   

    

   
        <!--welcome-hero start -->
        <section id="home" class="welcome-hero">
            <div class="container">
                <div class="welcome-hero-txt">

                    <h2>Khu di tích lịch sử đền thờ Bác <br> Trà vinh city </h2>
                    <p>
                        Welcom bạn đến website giới thiệu của tôi!!!!!!!!
                    </p>
                </div>

                <!-- <div class="welcome-hero-serch-box">

                    <div class="welcome-hero-serch">
                        <div class="tim"> Tìm nhanh</div>
                        <input class="welcome-hero-btn" placeholder=" tìm kiếm đây nè">

                        </input>
                        <button class=" buttonsh"> <i data-feather="search"></i>
                        </button>

                        <button class="welcome-hero-b" onclick="window.location.href='#'">

                        </button>

                    </div>
                </div>
            </div> -->

        </section>
        <!--/.welcome-hero-->
        <!--welcome-hero end -->

        <!--list-topics start -->
        <section id="list-topics" class="list-topics" style=" background:#ffffff;">
            <div class="container">
                <div class="list-topics-content">
                    <ul>
                        <li>
                            <div class="single-list-topics-content">
                                <div class="single-list-topics-icon">
                                    <i class="bi bi-bank" style="font-size: 35px; color: #000000;"></i>
                                </div>
                                <h2><a> Khu </a></h2>
                                <p> Đền thờ có 4 khu chính</p>
                            </div>
                        </li>

                        <li>
                            <div class="single-list-topics-content">
                                <div class="single-list-topics-icon">
                                    <i class="bi bi-rulers" style="font-size: 35px; color: #000000;"></i>

                                </div>
                                <h2><a> Diện tích </a></h2>
                                <p> 3600 m2 (54 ha )</p>
                            </div>
                        </li>

                        <li>
                            <div class="single-list-topics-content">
                                <div class="single-list-topics-icon">
                                    <i class="ti ti-air-traffic-control" style="font-size: 35px; color: #000000;"></i>
                                </div>
                                <h2><a>Di sản </a></h2>
                                <p> 3715</p>
                            </div>
                        </li>

                        <li>
                            <div class="single-list-topics-content">
                                <div class="single-list-topics-icon">
                                    <i class="bi bi-tree" style="font-size: 35px; color: #000000;"></i>

                                </div>
                                <h2><a> Cây xanh </a></h2>
                                <p>hhhh </p>
                            </div>
                        </li>
                     
                    </ul>
                </div>
            </div>
            <!--/.container-->

    
        <style>
        .news-container {
            display: flex;
            flex-direction: column;
            /* Hiển thị tin từ trên xuống */
            align-items: center;
            /* Căn giữa nội dung */
            width: 80%;
            /* Chiều rộng của container */
            margin: 20px auto;
            /* Canh lề tự động */
        }

        .news-item {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
        }

        .news-content {
            margin-top: 10px;
            color: #000;
        }

        .news-title {
            font-size: 20px;
            font-weight: bold;
            color: #f00000;
            margin-bottom: 5px;
        }

        .news-date {
            font-style: italic;
            color: #7a7a7a;
        }

        .news-description {
            margin-top: 10px;
        }

        .news-image {
            max-width: 100%;
            height: auto;
        }

        .read-more {
            color: blue;
            cursor: pointer;
            margin-top: 5px;
        }

        .nb {
            text-align: center;
            margin-bottom: 20px;
        }
        </style>

        <div class="nb">
            <h4 class="nb"> Tin tức nổi bật</h4>
        </div>

<!-- Tin tức nổi bật -->
<?php
// Include the database connection file
include("../ketnoi.php");

// Check if the connection was established
if (!$conn || $conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the query
$stmt = $conn->prepare("SELECT idtintuc, tieude, noidung, ngaydang, anhtt FROM tintuc WHERE noibat = 1 ORDER BY ngaydang DESC LIMIT 5");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo '<div class="news-container">';

    while ($row = $result->fetch_assoc()) {
        // Convert the date to d/m/Y format
        $originalDate = $row["ngaydang"];
        $formattedDate = (new DateTime($originalDate))->format('d/m/Y');

        // Display news item
        echo '<div class="news-item">';
        echo '<img class="news-image" src="' . htmlspecialchars($row["anhtt"]) . '" width="200" height="200" alt="' . htmlspecialchars($row["tieude"]) . '">';
        // echo '<img class="news-title" src="' . htmlspecialchars($row["anhtt"]) . '" alt="News Image">';

        echo '<div class="news-content">';
        echo '<div class="news-title">' . htmlspecialchars($row["tieude"]) . '</div>';
        echo '<div class="news-date">Ngày đăng: ' . $formattedDate . '</div>';
        echo '<div class="news-description">' . htmlspecialchars(substr($row["noidung"], 0, 100)) . '...';
        echo '<span class="read-more"><a href="chitiet.php?id=' . htmlspecialchars($row["idtintuc"]) . '">Xem thêm</a></span></div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
} else {
    echo "Không có bài viết nào.";
}

$stmt->close();
$conn->close();
?>



        <!-- Khung Thông Tin và Bản Đồ Bắt Đầu -->
        <div
            style="display: flex; justify-content: center; margin: 50px auto; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); background: #f5f5f5; padding: 20px; font-family: Arial, Helvetica, sans-serif;">

            <!-- Thông Tin Đền Thờ Bắt Đầu -->
            <div
                style="flex: 1; padding: 10px; background: #eaeaea; border-right: 2px solid #ccc; border-radius: 18px; margin:0px 108px; margin-bottom: 11px;">
                <p style="font-weight: bold; color: #333; font-size: 18px; text-align: center;">Thông Tin Đền Thờ Bác
                    Trà Vinh</p>
                <p style="color: #666; font-size: 16px;">
                    <strong>Địa chỉ:</strong> 30 tháng 4, ấp Vĩnh Hội, Trà Vinh
                </p>
                <p style="color: #666; font-size: 16px;">
                    <strong>Giờ mở cổng:</strong><br>
                    Sáng: 7h - 11h<br>
                    Chiều: 13h - 17h
                </p>
                <p style="color: #666; font-size: 16px;">
                    <strong>Tỉnh:</strong> Trà Vinh
                </p>
            </div>
            <!-- Thông Tin Đền Thờ Kết Thúc -->

            <!-- Hướng Dẫn Chỉ Đường Bắt Đầu -->
            <div style="flex: 2;">
                <p style="font-weight: bold; color: black; font-size: 20px; text-align: center;">Hướng Dẫn Chỉ Đường</p>
                <div style="display: flex; justify-content: center;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304.2186842744727!2d106.3278168305686!3d9.983748695856626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a010627413352d%3A0xd357fe02183b7464!2zxJDhu4FuIHRo4budIELDoWM!5e0!3m2!1svi!2s!4v1718631583470!5m2!1svi!2s"
                        width="700" height="250" style="border: 0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <!-- Hướng Dẫn Chỉ Đường Kết Thúc -->


        <!-- Include all js compiled plugins (below), or include individual files as needed -->

        <script src="assets/js/jquery.js"></script>

        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

        <!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- bootsnav js -->
        <script src="assets/js/bootsnav.js"></script>

        <!--feather.min.js-->
        <script src="assets/js/feather.min.js"></script>

        <!-- counter js -->
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>

        <!--slick.min.js-->
        <script src="assets/js/slick.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>

</body>

<?php include("fortrangchu.php")



?>
<style>
  .nav.navbar-nav.navbar-right > li:nth-child(1) a {
    color: #ffb239; /* Màu bạn muốn hiển thị cho liên kết hiện tại */
    font-weight: bold; /* In đậm để nhấn mạnh */
}

</style>

