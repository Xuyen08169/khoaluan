<?php
include ("header_nhanvien.php");
include ("ketnoi.php");

// Bắt đầu session để sử dụng session variables
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Lấy thông tin từ biến GET
$idpc = $_GET['user'];

// Truy vấn SQL để lấy thông tin chi tiết của idpc
$sql_detail = "
SELECT 
    phancong.idpc,
    taikhoan.hoten AS nguoitrc,
    lichtruc.ngaytruc,
    IFNULL(sukien.tensukien, 'Không có sự kiện') AS tensukien,
    phancong.trangthai,
    phancong.nguoitruccu,
    phancong.lydo,
    phancong.nguoiduyet
FROM 
    phancong
JOIN 
    lichtruc ON phancong.idtruc = lichtruc.idtruc
LEFT JOIN 
    sukien ON phancong.id = sukien.id
JOIN 
    taikhoan ON phancong.idnhanvien = taikhoan.idnhanvien
WHERE 
    phancong.idpc = $idpc
";
$result_detail = mysqli_query($conn, $sql_detail) or die("Không thể truy vấn chi tiết: " . mysqli_error($conn));
$row_detail = mysqli_fetch_assoc($result_detail);

// Nếu form được gửi đi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lydo = $_POST['lydo'];

    $sql_update = "UPDATE phancong SET lydo = '$lydo', nguoiduyet = NULL, trangthai = 'Chờ duyệt', nguoitruccu = '{$row_detail['nguoitrc']}' WHERE idpc = $idpc";

    if (mysqli_query($conn, $sql_update)) {
        // Đóng kết nối
        mysqli_close($conn);

        // Thực thi mã JavaScript để thông báo và chuyển hướng
        echo "<script language='javascript'>
            alert('Cập nhật thành công');
            window.location='LICHTRUC_CANHAN.php';
          </script>";
        exit(); // Đảm bảo kịch bản dừng lại sau khi chuyển hướng
    }

}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"
                    style="font-size: 25px; padding-left: 270px; padding-top:15px;">
                    CẬP NHẬT LÝ DO PHÂN CÔNG LỊCH TRỰC</h6>
            </div>
            <div class="table-responsive p-3">
                <form action="" method="post">
                    <table class="table align-items-center table-flush">
                        <tr>
                            <th>ID:</th>
                            <td><?php echo $row_detail['idpc']; ?></td>
                        </tr>
                        <tr>
                            <th>Người trực:</th>
                            <td><?php echo $row_detail['nguoitrc']; ?></td>
                        </tr>
                        <tr>
                            <th>Ngày trực:</th>
                            <td><?php echo date('d/m/Y', strtotime($row_detail['ngaytruc'])); ?></td>
                        </tr>
                        <tr>
                            <th>Sự kiện:</th>
                            <td><?php echo $row_detail['tensukien']; ?></td>
                        </tr>
                        <tr>
                            <th>Lý do:</th>
                            <td><input type="text" name="lydo" value="<?php echo $row_detail['lydo']; ?>"></td>
                        </tr>
                    </table>
                    <input type="submit" name="update" value="Cập nhật">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include ("footer_nhanvien.php"); ?>
