<?php
include("ketnoi.php");

// Lấy dữ liệu từ form
$idtintuc = $_POST["idtintuc"];
$tieude = $_POST["tieude"];

$noidung = $_POST["noidung"];
$ngaydang = $_POST["ngaydang"];

$idnhanvien = $_POST["idnhanvien"];
$noibat = $_POST["noibat"];

$duongdan = "./hinhanh/"; // Thư mục lưu trữ hình ảnh, bạn cần tạo thư mục này trong dự án của mình
$duongdan = $duongdan . basename($_FILES["anhtt"]["name"]);
move_uploaded_file($_FILES["anhtt"]["tmp_name"], $duongdan);
$anhtt = $duongdan;

// Thêm nhóm tổ mới vào CSDL
$sql = "INSERT INTO tintuc (idtintuc, tieude,  noidung, ngaydang, anhtt, idnhanvien, noibat) 
VALUES ('".$idtintuc."', '".$tieude."',  '".$noidung."', '".$ngaydang."', '".$anhtt."','".$idnhanvien."', '".$noibat."')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));

if ($kq) {
    echo "<script language=javascript>
            alert('Thêm thành công');
            window.location='QLTT.php';
          </script>";
} else {
    echo "<script language=javascript>
            alert('Thêm thất bại');
              window.location='QLTT.php';
          </script>";
}
?>

