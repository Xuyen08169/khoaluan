<?php
include("ketnoi.php");

// Lấy dữ liệu từ form
$idpc = $_POST["idpc"];
$idnhanvien = $_POST["idnhanvien"];
$idtruc = $_POST["idtruc"];
$id = $_POST["id"];

$trangthai = $_POST["trangthai"];
$nguoitruccu = $_POST["nguoitruccu"];
$lydo = $_POST["lydo"];
$nguoiduyet = $_POST["nguoiduyet"];
$ngayduyet = $_POST["ngayduyet"];

// Kiểm tra xem id có tồn tại trong bảng sukien hay không
if (!empty($id)) {
    $sql_check = "SELECT COUNT(*) AS count FROM sukien WHERE id = '$id'";
    $result = mysqli_query($conn, $sql_check);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        // Thêm vào bảng phancong nếu id hợp lệ
        $sql = "INSERT INTO phancong (idpc, idnhanvien, idtruc, id, trangthai, nguoitruccu, lydo, nguoiduyet, ngayduyet) 
        VALUES ('$idpc', '$idnhanvien', '$idtruc', '$id', '$trangthai', '$nguoitruccu', '$lydo', '$nguoiduyet', '$ngayduyet')";
    } else {
        // Hiển thị thông báo lỗi khi id không hợp lệ
        echo "<script language=javascript>
                alert('ID không tồn tại trong bảng sự kiện');
                window.location='QL_PHANCONG.php';
              </script>";
        exit(); // Thêm exit để dừng mã khi gặp lỗi
    }
} else {
    // Thêm vào bảng phancong với id là null (nếu được phép)
    $sql = "INSERT INTO phancong (idpc, idnhanvien, idtruc, id, trangthai, nguoitruccu, lydo, nguoiduyet, ngayduyet) 
    VALUES ('$idpc', '$idnhanvien', '$idtruc', NULL, '$trangthai', '$nguoitruccu', '$lydo', '$nguoiduyet', '$ngayduyet')";
}

$kq = mysqli_query($conn, $sql);

if ($kq) {
    echo "<script language=javascript>
            alert('Thêm thành công');
            window.location='QL_PHANCONG.php';
          </script>";
} else {
    $error = mysqli_error($conn);
    echo "<script language=javascript>
            alert('Thêm thất bại: $error');
            window.location='QL_PHANCONG.php';
          </script>";
}
?>
