<?php
// Kết nối CSDL và xử lý lấy dữ liệu
include("ketnoi.php"); // Thay thế bằng kết nối đến CSDL của bạn

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['month']) && isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];

    // Query để lấy danh sách ngày trực của tháng và năm đã chọn
    $sql = "SELECT idtruc, ngaytruc FROM lichtruc WHERE MONTH(ngaytruc) = $month AND YEAR(ngaytruc) = $year";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        // Tạo các option cho dropdown
        while ($row = mysqli_fetch_assoc($result)) {
            $idtruc = $row['idtruc'];
            $ngaytruc = date('d/m/Y', strtotime($row['ngaytruc']));
            echo "<option value=\"$idtruc\">$ngaytruc</option>";
        }
    } else {
        echo "<option value=\"\">Không có dữ liệu</option>";
    }
} else {
    echo "<option value=\"\">Dữ liệu không hợp lệ</option>";
}

mysqli_close($conn); // Đóng kết nối CSDL sau khi sử dụng
?>
