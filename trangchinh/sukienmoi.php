<?php 
include ("htrangchu.php");
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sự kiện</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        /* display: flex; */
        justify-content: center;
        align-items: flex-start;
        /* padding: 20px; */
    }



    .image-container {
        flex: 1;
        /* padding-right: 15px; */
    }

    .image-container img {
        width: 100%; 
        border-radius: 8px;
        margin-bottom: 15px;
        margin-left: 100px;
        margin-top: 5px;
        padding-top: 50px;
        display: none;
    }

    .image-container img:first-child {
    display: block; /* Hiển thị hình ảnh đầu tiên mặc định */
}

    .events-container {
        flex: 2;
    }

    .event {
        background-color: #fff;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 10px;
        margin-left: 206px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .event-title {
        font-size: 1.2em;
        margin: 0;
    }

    .event-dates {
        color: #666;
        margin-bottom: 10px;
    }

    .event-content {
        display: none;
    }

    .show-more {
        color: #007bff;
        cursor: pointer;
    }

    .ds {
        padding: 15px;
        color: red;
        font-weight: 600;
        font-size: 20px;
        margin-left: 195px;
    }

    .mySlides {
        display: none;
    }
    </style>
    <script>
    function toggleContent(eventId) {
        var content = document.getElementById(eventId);
        if (content.style.display === "none") {
            content.style.display = "block";
        } else {
            content.style.display = "none";
        }
    }

    // --------------------------------------------------------
   
    </script>
</head>

<body style=" background: #ffdf43;">

    <div class="image-container" style=" display: flex;">
    <div>

<div class="w3-content w3-section" style="max-width:500px">
    <img class="mySlides" src="hinhanh\h1.jpg" style="width:100%">
    <img class="mySlides" src="hinhanh\MH.jpg" style="width:100%">
    <img class="mySlides" src="hinhanh\ND.jpg" style="width:100%">
    <img class="mySlides" src="hinhanh\NHA.jpg" style="width:100%">
    <img class="mySlides" src="hinhanh\XE.jpg" style="width:100%">

</div>

<div style="padding-left: 105px;
    color: blue;"> <a href="/khoaluan/dangki_thamquan.php">Đăng kí tham quan</a> </div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {
        myIndex = 1
    }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>







</div>
    

        <div class="container">


            <div class="events-container">
                <h1 class="ds">Sự kiện</h1>

                <div class="event">
                    <h2 class="event-title">Ngày giải phóng miền Nam</h2>
                    <p class="event-dates">28/04/2024 - 30/04/2024</p>
                    <p class="event-content" id="event1">
                        Ngày lễ 30 tháng 4, tên chính thức là Ngày Giải phóng miền Nam, thống nhất đất nước, Ngày Chiến
                        thắng, Ngày
                        Thống nhất là một ngày lễ quốc gia của Việt Nam. Đánh dấu sự kiện chấm dứt chiến tranh ở Việt
                        Nam,
                        thống
                        nhất đất nước khi vào ngày 30/04/1975 chính phủ Cách mạng lâm thời Việt Nam đã giành được thắng
                        lợi,
                        đây là ngày lễ trọng đại trong các ngày lễ lớn trong năm ở Việt Nam.
                    </p>
                    <span class="show-more" onclick="toggleContent('event1')">Xem thêm</span>
                </div>

                <div class="event">
                    <h2 class="event-title">Ngày Quốc Khánh của nước Việt Nam ngày 2 tháng 9</h2>
                    <p class="event-dates">31/08/2024 - 02/09/2024</p>
                    <p class="event-content" id="event2">
                        Sự kiện này sẽ có sự tham gia của ban lãnh đạo tỉnh nhà và khách thập phương gần xa về viếng
                        thăm
                        đền thờ.
                        Ngày Quốc Khánh của nước Việt Nam nhằm vào ngày 2 tháng 9 hàng năm, kỉ niệm ngày Chủ tịch Hồ Chí
                        Minh đọc
                        bản Tuyên Ngôn Độc Lập tại quảng trường Ba Đình, khai sinh ra nước Việt Nam Dân Chủ Cộng Hoà,
                        tiền
                        thân của
                        nước ta ngày nay.
                    </p>
                    <span class="show-more" onclick="toggleContent('event2')">Xem thêm</span>
                </div>

                <div class="event">
                    <h2 class="event-title">Tết cổ truyền người Việt Nam</h2>
                    <p class="event-dates">28/01/2024 - 09/02/2025</p>
                    <p class="event-content" id="event3">
                        Tết Nguyên Đán là ngày lễ lớn nhất trong các ngày lễ lớn trong năm ở Việt Nam diễn ra từ ngày
                        28/01/2024 đến
                        ngày 09/02/2025 ( Nhằm ngày 29/12 đến 12/1 Âm lịch)vào ngày này tất cả các thành viên trong gia
                        đình
                        sẽ tụ
                        họp lại để cùng đón một năm mới và cầu mong bình an, hạnh phúc và tài lộc về cho gia đình. Đồng
                        thời
                        xoá bỏ
                        mọi xui xẻo và buồn phiền trong năm cũ. Đền thờ mở cửa tham quan trong các ngày tết, đặc biệt
                        đầu
                        năm mới
                        tức sáng mùng 1 sẽ có hội lân siêu rồng biểu diễn mừng năm mới.
                    </p>
                    <span class="show-more" onclick="toggleContent('event3')">Xem thêm</span>
                </div>

                <div class="event">
                    <h2 class="event-title">Ngày 19 tháng 5 Ngày sinh của Chủ tịch Hồ Chí Minh</h2>
                    <p class="event-dates">18/05/2024 - 19/05/2024</p>
                    <p class="event-content" id="event4">
                        Sự kiện diễn diễn ra các tuổi trẻ thanh niên trong tỉnh cùng hướng về đền thờ để tưởng nhớ về
                        công
                        lao của
                        vị lãnh tựu vĩ đại của đất nước Việt Nam. Cùng nhìn lại chặn đường giải phóng dân tộc của Người
                        và
                        những
                        công lao to lớn của Người để giành lấy quyền tự do độc lập cho dân tộc ...
                    </p>
                    <span class="show-more" onclick="toggleContent('event4')">Xem thêm</span>
                </div>

                <div class="event">
                    <h2 class="event-title">Chào mừng 26 tháng 3 Ngày thành lập Đoàn Thanh niên Cộng sản Hồ Chí Minh
                    </h2>
                    <p class="event-dates">25/03/2024 - 26/03/2024</p>
                    <p class="event-content" id="event5">
                        ngày 26/03 hằng năm là Ngày Thành Lập Đoàn Thanh Niên Cộng Sản Hồ Chí Minh. Đây cũng là ngày
                        nhằm
                        tôn vinh,
                        giữ gìn và phát huy truyền thống vẻ vang của thế hệ thanh niên Việt Nam trong công cuộc xây dựng
                        và
                        phát
                        triển đất nước.
                    </p>
                    <span class="show-more" onclick="toggleContent('event5')">Xem thêm</span>
                </div>
            </div>
        </div>

</body>

</html>

<?php include ("fortrangchu.php") ?>