<?php
include("ketnoi.php");

// Lấy dữ liệu từ form
$idnhomto = $_POST["idtruc"];
$tennguoitruc = $_POST["tennguoitruc"];
$ngaytruc = $_POST["ngaytruc"];


// Thêm nhóm tổ mới vào CSDL
$sql = "INSERT INTO nhomto (idtruc, tennguoitruc, ngaytruc) VALUES ('".$idtruc."', '".$tennguoitruc."', '".$ngaytruc."')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));

if ($kq) {
    echo "<script language=javascript>
            alert('Thêm thành công');
            window.location='QLLT.php';
          </script>";
} else {
    echo "<script language=javascript>
            alert('Thêm thất bại');
            window.location='QLLT.php';
          </script>";
}
?>
