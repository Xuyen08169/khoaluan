<?php
include("ketnoi.php");

// Lấy dữ liệu từ form
$idtruc = $_POST["idtruc"];
$id = $_POST["id"];
$ngaytruc = $_POST["ngaytruc"];

// Kiểm tra xem id có tồn tại trong bảng sukien hay không
if (!empty($id)) {
    $sql_check = "SELECT COUNT(*) AS count FROM sukien WHERE id = '".$id."'";
    $result = mysqli_query($conn, $sql_check);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        // Thêm vào bảng lichtruc nếu id hợp lệ
        $sql = "INSERT INTO lichtruc (idtruc, id, ngaytruc) VALUES ('".$idtruc."','".$id."', '".$ngaytruc."')";
        $kq = mysqli_query($conn, $sql);

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
    } else {
        // Hiển thị thông báo lỗi khi id không hợp lệ
        echo "<script language=javascript>
                alert('ID không tồn tại trong bảng sự kiện');
                window.location='QLLT.php';
              </script>";
    }
} else {
    // Thêm vào bảng lichtruc với id là null (nếu được phép)
    $sql = "INSERT INTO lichtruc (idtruc, id, ngaytruc) VALUES ('".$idtruc."', NULL, '".$ngaytruc."')";
    $kq = mysqli_query($conn, $sql);

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
}

?>
