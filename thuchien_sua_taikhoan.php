<?php

include("ketnoi.php");

// Lấy dữ liệu từ form
$idnhanvien = $_POST["idnhanvien"];
$hoten = $_POST["hoten"];
$ngaysinh = $_POST["ngaysinh"];
$gioitinh = $_POST["gioitinh"];
$sodienthoai = $_POST["sodienthoai"];
$idchucvu = $_POST["idchucvu"];
$idnhomto = $_POST["idnhomto"];
$email = $_POST["email"];
$matkhau = $_POST["matkhau"];
$quyen = $_POST["quyen"];

// Update academic department in the database
if (isset($_FILES["hinhanh"]) && $_FILES["hinhanh"]["name"] != "") {
    $duongdan = "./hinhanh/";
    $duongdan = $duongdan . basename($_FILES["hinhanh"]["name"]);
    if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $duongdan)) {
        $hinhanh = $duongdan;
    } else {
        die("Không thể tải lên hình ảnh.");
    }
}

// Câu truy vấn UPDATE
$sql_update = "UPDATE taikhoan SET hoten = '$hoten', ngaysinh = '$ngaysinh', gioitinh = '$gioitinh', 
sodienthoai = '$sodienthoai', idchucvu = '$idchucvu', idnhomto = '$idnhomto', email = '$email', 
hinhanh = '$hinhanh', matkhau = '$matkhau', quyen = '$quyen' WHERE idnhanvien = '$idnhanvien'";

$kq = mysqli_query($conn, $sql_update) or die("Không thể sửa: " . mysqli_error($conn));

echo ("<script language=javascript>
        alert('Sửa thành công');
        window.location='QLTK.php?idnhanvien=$idnhanvien'; // Redirect with id
    </script> ");
?>
