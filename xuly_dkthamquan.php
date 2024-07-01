

<?php
include("ketnoi.php");

// Lấy dữ liệu từ form
$idtq = $_POST["idtq"];
$hoten = $_POST["hoten"];
$sdt = $_POST["sdt"];
$diachi = $_POST["diachi"];
$email = $_POST["email"];
$tendoan = $_POST["tendoan"];
$ngaythamquan = $_POST["ngaythamquan"];
$soluong = $_POST["soluong"];
$ghichu = $_POST["ghichu"];


$trangthai = "Chờ duyệt";

// Thêm nhóm tổ mới vào CSDL
$sql = "INSERT INTO dkthamquan (idtq, hoten, sdt, diachi, email, tendoan, ngaythamquan, soluong, ghichu,  trangthai) 

        VALUES ('".$idtq."', '".$hoten."','".$sdt."', '".$diachi."','".$email."', '".$tendoan."', 
        '".$ngaythamquan."', '".$soluong."', '".$ghichu."', '".$trangthai."')";

$kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));

if ($kq) {
    echo "<script language=javascript>
            alert('Thêm thành công');
            window.location='dangki_thamquan.php';
          </script>";
} else {
    echo "<script language=javascript>
            alert('Thêm thất bại');
            window.location='dangki_thamquan';
          </script>";
}
?>
