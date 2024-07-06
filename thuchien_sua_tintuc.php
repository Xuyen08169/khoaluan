<?php

include("ketnoi.php");


// Lấy dữ liệu từ form
$idtintuc = $_POST["idtintuc"];
$tieude = $_POST["tieude"];

$noidung = $_POST["noidung"];
$ngaydang = $_POST["ngaydang"];

$idnhanvien = $_POST["idnhanvien"];
$noibat = $_POST["noibat"];


// Xử lý upload ảnh
$duongdan = "./hinhanh/";
$duongdan = $duongdan . basename($_FILES["anhtt"]["name"]);
move_uploaded_file($_FILES["anhtt"]["tmp_name"], $duongdan);
$anhtt = mysqli_real_escape_string($conn, $duongdan);

// Cập nhật tin tức trong database
$sql = "UPDATE tintuc SET tieude = '$tieude', noidung = '$noidung', ngaydang = '$ngaydang', anhtt = '$anhtt', idnhanvien = '$idnhanvien', noibat = '$noibat' WHERE idtintuc = '$idtintuc'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật: " . mysqli_error($conn));

// Kiểm tra và thông báo kết quả
if ($kq) {
    echo "<script>alert('Cập nhật thành công');</script>";
} else {
    echo "<script>alert('Cập nhật thất bại');</script>";
}

echo "<script>window.location='QLTT.php';</script>";
?>