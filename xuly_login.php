<?php
session_start();
include("ketnoi.php");

// Lấy thông tin đăng nhập từ form
$email = $_POST['email'];
$matkhau = $_POST['matkhau'];

// Tránh SQL Injection
$email = mysqli_real_escape_string($conn, $email);
$matkhau = mysqli_real_escape_string($conn, $matkhau);

// Tìm kiếm tài khoản trong CSDL
$sql = "SELECT * FROM taikhoan WHERE email='$email' AND matkhau='$matkhau'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // Tài khoản hợp lệ, lấy thông tin người dùng
    $row = mysqli_fetch_assoc($result);
    $idnhanvien = $row['idnhanvien'];
    $quyen = $row['quyen'];
    $hoten = $row['hoten'];

    // Lưu thông tin người dùng vào session
    $_SESSION['idnhanvien'] = $idnhanvien;
    $_SESSION['hoten'] = $hoten;
    $_SESSION['email'] = $email;

    // Chuyển hướng dựa vào quyền
    if ($quyen == 0) {
        header("Location: index.php");
    } elseif ($quyen == 1) {
        header("Location: nhanvien.php");
    } else {
        // Xử lý quyền khác nếu cần
    }
} else {
    // Đăng nhập không thành công, xử lý tại đây (ví dụ: thông báo lỗi)
    echo "Email hoặc mật khẩu không đúng.";
}

// Đóng kết nối CSDL
mysqli_close($conn);
?>
