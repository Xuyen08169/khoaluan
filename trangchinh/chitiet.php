<?php 
include("htrangchu.php");
?>




<?php
// Kết nối cơ sở dữ liệu
include("../ketnoi.php");

// Kiểm tra xem có ID bài viết không
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Chuyển ID về dạng số nguyên để tránh SQL injection

    // Truy vấn bài viết từ cơ sở dữ liệu
    $sql = "SELECT tieude, noidung, ngaydang FROM tintuc WHERE idtintuc = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $originalDate = $row["ngaydang"];
        $formattedDate = (new DateTime($originalDate))->format('d/m/Y');

        echo '<div class="news-details">';
        echo '<h1>' . $row["tieude"] . '</h1>';
        echo '<p><strong>Ngày đăng: </strong>' . $formattedDate . '</p>';
        echo '<div class="news-content">' . $row["noidung"] . '</div>';
        echo '</div>';
    } else {
        echo "Không tìm thấy bài viết.";
    }
} else {
    echo "ID bài viết không được cung cấp.";
}

$conn->close();
?>
<?php 
include("fortrangchu.php");
?>