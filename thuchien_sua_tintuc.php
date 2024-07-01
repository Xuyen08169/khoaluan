<?php

include("ketnoi.php");


// Lấy dữ liệu từ form
$idtintuc = $_POST["idtintuc"];
$tieude = $_POST["tieude"];

$noidung = $_POST["noidung"];
$ngaydang = $_POST["ngaydang"];

$idnhanvien = $_POST["idnhanvien"];
$noibat = $_POST["noibat"];



// Update academic department in the database
$sql = "UPDATE tintuc SET tieude = '$tieude',  noidung = '$noidung', ngaydang = '$ngaydang', idnhanvien = '$idnhanvien',
 noibat = '$noibat' WHERE idtintuc = '$idtintuc'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật thành công');
        window.location='QLTT.php';
    </script>";

?>