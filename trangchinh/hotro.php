<?php 
include("htrangchu.php");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin hỗ trợ</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color:#ffdf43;
            color: #333;
        }

        .container {
            /* width: 80%; */
            /* margin: 20px auto; */
            /* padding: 24px; */
            /* background-color: #fff; */
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            border-radius: 8px;
            text-align: center;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        h1 {
            color: #007BFF;
            margin-bottom: 20px;
            font-weight: 700;
            margin-top: 15px;
        }

        p {
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .contact-info p {
            font-size: 1.1em;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 10px;
            }
            
            .contact-info p {
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image-container">
            <img src="hinhanh\den2.png" alt="Hỗ trợ khách hàng" style="max-width: 300px;">
        </div>

        <!-- <h1>Thông tin hỗ trợ</h1> -->
        <h1>Mọi chi tiết xin liên hệ:</h1>

        <div class="contact-info">
            <p>Số điện thoại: <strong>0768894581</strong></p>
            <p>Email: <strong><a href="mailto:xuyennguyen21012001@gmail.com">xuyennguyen21012001@gmail.com</a></strong></p>
            <p>Thời gian hỗ trợ: từ thứ 2 đến thứ 7 trong giờ hành chính</p>
        </div>
    </div>
</body>

<?php include("fortrangchu.php"); ?>
<style>
  .nav.navbar-nav.navbar-right > li:nth-child(5) a {
    color: #ffb239; /* Màu bạn muốn hiển thị cho liên kết hiện tại */
    font-weight: bold; /* In đậm để nhấn mạnh */
}

</style>

