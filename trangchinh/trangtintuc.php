<?php 
include ("htrangchu.php");
?>
<title> new Trà Vinh</title>
<style>
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background:#ffdf43;
}


h1 {
    font-size: 2em;
    color: #333;
    margin-bottom: 20px;
}

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
</head>

<body>
    <div class="container" style="max-width: 800px; background:#f4f4f4; box-shadow: 6px 6px 6px black;
    margin-top: 15px;padding: 20px;" >
        <label style=" color: red; font-weight:600; font-size: 25px;"> Tin tức</label>
      
        <?php
// Include the database connection file
include("../ketnoi.php");

// Check if the connection was established
if (!$conn || $conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the query
$stmt = $conn->prepare("SELECT idtintuc, tieude, noidung, ngaydang, anhtt FROM tintuc ORDER BY ngaydang");
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
        echo '<img class="news-title" src="' . htmlspecialchars($row["anhtt"]) . '" class="news-image" width="200" height="200" alt="' . htmlspecialchars($row["tieude"]) . '">';
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

    </div>
</body>
<!-- </html> -->
<!-- Tin tức nổi bật -->

<?php 
include ("fortrangchu.php");
?>
<style>
  .nav.navbar-nav.navbar-right > li:nth-child(3) a {
    color: #ffb239; /* Màu bạn muốn hiển thị cho liên kết hiện tại */
    font-weight: bold; /* In đậm để nhấn mạnh */
}

</style>
