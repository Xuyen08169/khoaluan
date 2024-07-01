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

//
$duongdan = "./file/"; // Thư mục lưu trữ hình ảnh, bạn cần tạo thư mục này trong dự án của mình
$duongdan = $duongdan . basename($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"], $duongdan);
$files = $duongdan;

// Thêm nhóm tổ mới vào CSDL
$sql = "INSERT INTO sukien (id, tensukien, ngaybatdau, ngayketthuc, noidung, file, ngaydang, idnhanvien) VALUES ('".$id."',
 '".$tensukien."', '".$ngaybatdau."','".$ngayketthuc."', '".$noidung."','".$files."', '".$ngaydang."', '".$idnhanvien."')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));

if ($kq) {
    echo "<script language=javascript>
            alert('Thêm thành công');
            window.location='QLSK.php';
          </script>";
} else {
    echo "<script language=javascript>
            alert('Thêm thất bại');
            window.location='QLSK.php';
          </script>";
}
?>

