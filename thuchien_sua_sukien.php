<?php

include("ketnoi.php");

// Lấy dữ liệu từ form
$id = $_POST["id"];
$tensukien = $_POST["tensukien"];
$ngaybatdau = $_POST["ngaybatdau"];
$ngayketthuc = $_POST["ngayketthuc"];

$noidung = $_POST["noidung"];
$ngaydang = $_POST["ngaydang"];

$idnhanvien = $_POST["idnhanvien"];

$duongdan = "./file/"; // Thư mục lưu trữ hình ảnh, bạn cần tạo thư mục này trong dự án của mình
$duongdan = $duongdan . basename($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"], $duongdan);
$files = $duongdan;

// Update academic department in the database
$sql = "UPDATE sukien SET tensukien = '$tensukien', ngaybatdau = '$ngaybatdau', ngayketthuc = '$ngayketthuc', file = '$files',noidung = '$noidung', idnhanvien = '$idnhanvien'
 WHERE id = '$id'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật thành công');
        window.location='QLSK.php';
    </script>";

?>