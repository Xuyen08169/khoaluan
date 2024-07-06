<?php
session_start();
include('ketnoi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idnhanvien = $_POST['idnhanvien'];
    $idtruc = $_POST['idtruc'];
    $id_sukien = $_POST['id_sukien'];
    $trangthai = 'Đã phân công';
    $nguoiduyet = $_SESSION['hoten'];
    $ngayduyet = date('Y-m-d'); // Nếu cột ngayduyet là DATE
    // $ngayduyet = date('Y-m-d H:i:s'); // Nếu cột ngayduyet là DATETIME

    // Kiểm tra nếu $id_sukien không được set (có thể là NULL hoặc không được truyền từ form)
    if (empty($id_sukien)) {
        $sql = "INSERT INTO phancong (idnhanvien, idtruc, trangthai, nguoiduyet, ngayduyet)
                VALUES ('$idnhanvien', '$idtruc', '$trangthai', '$nguoiduyet', '$ngayduyet')";
    } else {
        $sql = "INSERT INTO phancong (idnhanvien, idtruc, id, trangthai, nguoiduyet, ngayduyet)
                VALUES ('$idnhanvien', '$idtruc', '$id_sukien', '$trangthai', '$nguoiduyet', '$ngayduyet')";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Phân công thành công!";
        // Chuyển hướng hoặc thông báo thành công
        header('Location: QL_PHANCONG.php');
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
}
?>
