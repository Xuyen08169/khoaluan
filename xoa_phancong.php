
<?php
include("header.php");
include("ketnoi.php");

$user_xoa = $_REQUEST["user"]; // Nhận giá trị user từ link xóa của quantri.php

// Sửa câu truy vấn SQL
$sql = "DELETE FROM phancong WHERE idpc = '".$user_xoa."'";

$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin: " . mysqli_error($conn));

if ($kq) {
    echo "<script language='javascript'>
            alert('Xóa thành công');
            window.location='QL_PHANCONG.php';
          </script>";
} else {
    echo "<script language='javascript'>
            alert('Xóa thất bại');
            window.location='QL_PHANCONG.php';
          </script>";
}
?>

<?php
include("footer.php");
?>
