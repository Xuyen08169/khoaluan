<?php
include("ketnoi.php");

if (isset($_GET['id'])) {
    $eventId = intval($_GET['id']); // Lấy ID sự kiện từ yêu cầu GET

    // Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết sự kiện
    $sql = "SELECT sukien.*, taikhoan.hoten
            FROM sukien
            JOIN taikhoan ON sukien.idnhanvien = taikhoan.idnhanvien
            WHERE sukien.id = $eventId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $event = mysqli_fetch_assoc($result);

        // Hiển thị thông tin chi tiết sự kiện
        echo "<p><strong>ID:</strong> " . htmlspecialchars($event['id']) . "</p>";
        echo "<p><strong>Tên sự kiện:</strong> " . htmlspecialchars($event['tensukien']) . "</p>";
        echo "<p><strong>Ngày bắt đầu:</strong> " . date('d/m/Y', strtotime($event['ngaybatdau'])) . "</p>";
        echo "<p><strong>Ngày kết thúc:</strong> " . date('d/m/Y', strtotime($event['ngayketthuc'])) . "</p>";
        echo "<p><strong>Nội dung:</strong> " . nl2br(htmlspecialchars($event['noidung'])) . "</p>";
        echo "<p><strong>File:</strong> <a href='" . htmlspecialchars($event['file']) . "' download='" . basename($event['file']) . "' target='_blank'>" . basename($event['file']) . "</a></p>";
        echo "<p><strong>Ngày đăng:</strong> " . date('d/m/Y', strtotime($event['ngaydang'])) . "</p>";
        
        echo "<p><strong>Tên nhân viên:</strong> " . htmlspecialchars($event['hoten']) . "</p>";
    } else {
        echo "<p>Không tìm thấy sự kiện.</p>";
    }
} else {
    echo "<p>ID sự kiện không hợp lệ.</p>";
}

mysqli_close($conn);
?>
