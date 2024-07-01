<?php

include("ketnoi.php");

$idchucvu = $_POST["idchucvu"];
$tenchucvu = $_POST["tenchucvu"];



// Update academic department in the database
$sql = "UPDATE chucvu SET tenchucvu = '$tenchucvu' WHERE idchucvu = '$idchucvu'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật thành công');
        window.location='QLCV.php';
    </script>";

?>