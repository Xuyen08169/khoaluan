<?php
include("ketnoi.php");

if (isset($_GET['id'])) {
    $eventId = intval($_GET['id']); // Lấy ID từ yêu cầu GET

    // Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết 
    $sql = "SELECT phancong.*, taikhoan.hoten
            FROM phancong
            JOIN taikhoan ON phancong.idnhanvien = taikhoan.idnhanvien
            WHERE phancong.idpc = $eventId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $event = mysqli_fetch_assoc($result);

        // Hiển thị thông tin chi tiết sự kiện
        echo "<p><strong>ID:</strong> " . htmlspecialchars($event['idpc']) . "</p>";
        echo "<p><strong>Tên nhân viên:</strong> " . htmlspecialchars($event['hoten']) . "</p>";
        
        // echo "<p><strong>Ngày trực:</strong> " . date('d/m/Y', strtotime($event['ngaytruc'])) . "</p>";
        // echo "<p><strong>Sự kiện:</strong> " . htmlspecialchars($event['tensukien']) . "</p>";

        echo "<p><strong>Trạng thái:</strong> " . htmlspecialchars($event['trangthai']) . "</p>";
        echo "<p><strong>Người trực cũ:</strong> " . htmlspecialchars($event['nguoitruccu']) . "</p>";
        echo "<p><strong>Lý do:</strong> " . htmlspecialchars($event['lydo']) . "</p>";
        echo "<p><strong>Người duyệt:</strong> " . htmlspecialchars($event['nguoiduyet']) . "</p>";
        echo "<p><strong>Ngày duyệt:</strong> " . date('d/m/Y', strtotime($event['ngayduyet'])) . "</p>";

        echo "<p><strong>Ngày trực:</strong> " . htmlspecialchars($event['idtruc']) . "</p>";
        echo "<p><strong>Sự kiện:</strong> " . htmlspecialchars($event['id']) . "</p>";
        
    } else {
        echo "<p>Không tìm thấy .</p>";
    }
} else {
    echo "<p>ID không hợp lệ.</p>";
}

mysqli_close($conn);
?>
