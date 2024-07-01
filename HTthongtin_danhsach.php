<?php
include("ketnoi.php");

if (isset($_GET['id'])) {
    $eventId = intval($_GET['id']); // Lấy ID  từ yêu cầu GET

    // Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết 
    $sql =    $sql = "SELECT * FROM dkthamquan WHERE idtq = $eventId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $event = mysqli_fetch_assoc($result);

        // Hiển thị thông tin chi tiết sự kiện
        echo "<p><strong>ID:</strong> " . htmlspecialchars($event['idtq']) . "</p>";
        echo "<p><strong>Họ tên:</strong> " . htmlspecialchars($event['hoten']) . "</p>";
        echo "<p><strong>Số điện thoại:</strong> " . htmlspecialchars($event['sdt']) . "</p>";
        echo "<p><strong>Địa chỉ:</strong> " . htmlspecialchars($event['diachi']) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($event['email']) . "</p>";
        echo "<p><strong>Tên đoàn:</strong> " . htmlspecialchars($event['tendoan']) . "</p>";
        echo "<p><strong>Ngày tham quan:</strong> " . date('d/m/Y', strtotime($event['ngaythamquan'])) . "</p>";

        echo "<p><strong>Số lượng:</strong> " . htmlspecialchars($event['soluong']) . "</p>";
        echo "<p><strong>Ghi chú:</strong> " . htmlspecialchars($event['ghichu']) . "</p>";
        echo "<p><strong>Trạng thái:</strong> " . htmlspecialchars($event['trangthai']) . "</p>";
    } else {
        echo "<p>Không tìm thấy.</p>";
    }
} else {
    echo "<p>ID  không hợp lệ.</p>";
}

mysqli_close($conn);
?>


