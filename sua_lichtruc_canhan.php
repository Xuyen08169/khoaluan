<?php
include("header_nhanvien.php");
include("ketnoi.php");

// Kiểm tra xem session đã bắt đầu chưa, nếu chưa thì bắt đầu session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Lấy id lịch trực từ URL
$idlichtruc = $_GET['user'];

// Lấy thông tin chi tiết của lịch trực
$sql = "
    SELECT tt.id, tt.trangthai, tt.nguoitruccu, tt.lydo, tt.nguoiduyet, 
           lt.ngaytruc, sk.tensukien, tk.hoten, tt.idnhanvien
    FROM phancong tt
    JOIN lichtruc lt ON tt.idtruc = lt.idtruc
    JOIN sukien sk ON lt.id = sk.id
    JOIN taikhoan tk ON tt.idnhanvien = tk.idnhanvien
    WHERE tt.id = '$idlichtruc'";
$result = mysqli_query($conn, $sql) or die("Không thể xuất thông tin " . mysqli_error($conn));

if ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $ngaytruc = $row['ngaytruc'];
    $tensukien = $row['tensukien'];
    $hoten = $row['hoten'];
    $idnhanvien = $row['idnhanvien'];
    $nguoitruccu = $row['nguoitruccu'];
    $lydo = $row['lydo'];
    $nguoiduyet = $row['nguoiduyet'];
} else {
    echo "Không tìm thấy lịch trực.";
    exit;
}

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lydo = $_POST['lydo'];
    $trangthai = "Phân công";
    $nguoitruccu = $hoten;  // Người trực cũ bằng giá trị của người trực
    $nguoiduyet = NULL;

    $sql_update = "
        UPDATE phancong
        SET trangthai='$trangthai', lydo='$lydo', nguoitruccu='$nguoitruccu', nguoiduyet=NULL
        WHERE id='$idlichtruc'";

    if (mysqli_query($conn, $sql_update)) {
        echo "Cập nhật thành công.";
        header("Location: LICHTRUC_CANHAN.php");
        exit;
    } else {
        echo "Cập nhật thất bại: " . mysqli_error($conn);
    }
}
?>

<div class="container">
    <h2>Yêu cầu hoán chuyển</h2>
    <form method="POST">
        <input type="hidden" name="trangthai" value="Xin hoán chuyển">
        <input type="hidden" name="ngaytruc" value="<?php echo $ngaytruc; ?>">
        <input type="hidden" name="hoten" value="<?php echo $hoten; ?>">
        <input type="hidden" name="tensukien" value="<?php echo $tensukien; ?>">
        <input type="hidden" name="nguoitruccu" value="<?php echo $nguoitruccu; ?>">
        <input type="hidden" name="nguoiduyet" value="NULL">
        
        <div class="form-group">
            <label for="lydo">Lý do:</label>
            <input type="text" class="form-control" id="lydo" name="lydo" value="<?php echo $lydo; ?>">
        </div>
        
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<?php
mysqli_close($conn);
?>
