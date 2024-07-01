<?php
include("ketnoi.php");

if (isset($_GET['id'])) {
    $eventId = intval($_GET['id']); // Lấy ID  từ yêu cầu GET

    // Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết 
    $sql =    $sql = "SELECT * FROM taikhoan WHERE idnhanvien = $eventId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $event = mysqli_fetch_assoc($result);

        // Hiển thị thông tin chi tiết 
        echo "<p><strong>ID:</strong> " . htmlspecialchars($event['idnhanvien']) . "</p>";
        echo "<p><strong>Họ tên :</strong> " . htmlspecialchars($event['hoten']) . "</p>";
        echo "<p><strong>Ngày sinh:</strong> " . date('d/m/Y', strtotime($event['ngaysinh'])) . "</p>";
        echo "<p><strong>Giới tínnh :</strong> " . htmlspecialchars($event['gioitinh']) . "</p>";
        echo "<p><strong>Số điện thoại :</strong> " . htmlspecialchars($event['sodienthoai']) . "</p>";
        echo "<p><strong>Email :</strong> " . htmlspecialchars($event['email']) . "</p>";
        echo "<p><strong>matkhau :</strong> " . htmlspecialchars($event['matkhau']) . "</p>";
        echo "<p><strong>quyen :</strong> " . htmlspecialchars($event['quyen']) . "</p>";

        echo "<p><strong></strong> <img src='" . htmlspecialchars($event['hinhanh']) . "' 
        alt='Hình ảnh' style='width:100px; magin-left: 130'></p>";


        echo "<p><strong>Nhóm tổ :</strong> " . htmlspecialchars($event['idnhomto']) . "</p>";
        echo "<p><strong>Chức vụ:</strong> " . htmlspecialchars($event['idchucvu']) . "</p>";
         // echo "<p><strong>Nội dung:</strong> " . nl2br(htmlspecialchars($event['noidung'])) . "</p>";
     
    } else {
        echo "<p>Không tìm thấy tài khoản.</p>";
    }
} else {
    echo "<p>ID tài khoản không hợp lệ.</p>";
}

mysqli_close($conn);
?>
