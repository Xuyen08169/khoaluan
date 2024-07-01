<?php
include("ketnoi.php");

// Lấy dữ liệu từ form
$idchucvu = $_POST["idchucvu"];
$tenchucvu = $_POST["tenchucvu"];

// Thêm nhóm tổ mới vào CSDL
$sql = "INSERT INTO chucvu (idchucvu, tenchucvu) VALUES ('".$idchucvu."', '".$tenchucvu."')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));

if ($kq) {
    echo "<script language=javascript>
            alert('Thêm thành công');
            window.location='QLCV.php';
          </script>";
} else {
    echo "<script language=javascript>
            alert('Thêm thất bại');
            window.location='QLVC.php';
          </script>";
}
?>

