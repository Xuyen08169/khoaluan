<?php

include("ketnoi.php");

$idnhomto = $_POST["idnhomto"];
$tento = $_POST["tento"];



// Update academic department in the database
$sql = "UPDATE nhomto SET tento = '$tento' WHERE idnhomto = '$idnhomto'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật thành công');
        window.location='QLNT.php';
    </script>";

?>