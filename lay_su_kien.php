<?php
include('ketnoi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idtruc = $_POST['idtruc'];

    // Truy vấn lấy tên sự kiện dựa trên id trực
    $sql = "SELECT id, tensukien FROM sukien WHERE id = (SELECT id FROM lichtruc WHERE idtruc = '$idtruc')";
    $result = mysqli_query($conn, $sql) or die("Không thể lấy sự kiện: " . mysqli_error($conn));

    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode(array("id" => $row['id'], "tensukien" => $row['tensukien']));
    } else {
        echo json_encode(array("id" => '', "tensukien" => 'Không có sự kiện'));
    }

    // Đóng kết nối
    mysqli_close($conn);
}
?>
