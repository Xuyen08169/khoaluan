<?php
include("header.php");
include("ketnoi.php");

// Kiểm tra xem session đã bắt đầu chưa, nếu chưa thì bắt đầu session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['hoten']) || !isset($_SESSION['idnhanvien'])) {
    echo "<script>alert('Bạn phải đăng nhập để thực hiện chức năng này!'); window.location = 'login.php';</script>";
    exit;
}

// Lấy thông tin người dùng đăng nhập từ session
$nguoiduyet = $_SESSION['hoten'];
$id_nguoiduyet = $_SESSION['idnhanvien']; // Lấy ID người dùng đã đăng nhập

// Xử lý khi người dùng bấm nút Update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $id = $_POST['id']; // ID của bản ghi cần chỉnh sửa
    $idnhanvien = $_POST['idnhanvien']; // ID của nhân viên trực
    $lydo = $_POST['lydo']; // Lý do nhập vào từ form

    // Cập nhật dữ liệu vào CSDL
    if (isset($_POST['khongduyet'])) {
        $sql_update = "UPDATE phancong 
                       SET trangthai = 'Không duyệt hoán đổi', nguoiduyet = ?, ngayduyet = NOW(), nguoitruccu = NULL 
                       WHERE idpc = ?";
        if ($stmt = mysqli_prepare($conn, $sql_update)) {
            mysqli_stmt_bind_param($stmt, "si", $nguoiduyet, $id);
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Cập nhật thành công!');</script>";
                echo "<script>window.location = 'QL_PHANCONG.php';</script>";
                exit;
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    } elseif (isset($_POST['duyet'])) {
        $sql_update = "UPDATE phancong 
                       SET trangthai = 'Đã duyệt hoán đổi', idnhanvien = ?, lydo = ?, nguoiduyet = ?, ngayduyet = NOW() 
                       WHERE idpc = ?";
        if ($stmt = mysqli_prepare($conn, $sql_update)) {
            mysqli_stmt_bind_param($stmt, "issi", $idnhanvien, $lydo, $nguoiduyet, $id);
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Cập nhật thành công!');</script>";
                echo "<script>window.location = 'QL_PHANCONG.php';</script>";
                exit;
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
}

// Lấy ID của bản ghi cần chỉnh sửa từ tham số trên URL
$id = isset($_GET['user']) ? (int)$_GET['user'] : null;
if ($id) {
    $sql_select = "SELECT tt.idpc, tt.idnhanvien, tt.lydo, lt.ngaytruc, tk.hoten 
                   FROM phancong tt
                   JOIN lichtruc lt ON tt.idtruc = lt.idtruc
                   JOIN taikhoan tk ON tt.idnhanvien = tk.idnhanvien
                   WHERE tt.idpc = ?";
    if ($stmt = mysqli_prepare($conn, $sql_select)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            $row = null;
            echo "Không tìm thấy dữ liệu.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    $row = null;
    echo "ID không hợp lệ.";
}

$sql_nhanvien = "SELECT idnhanvien, hoten FROM taikhoan WHERE quyen = 1";
$result_nhanvien = mysqli_query($conn, $sql_nhanvien);
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary" style="font-size: 25px; padding-left: 270px; padding-top:15px;">
                    CHỈNH SỬA PHÂN CÔNG TRỰC
                </h6>
            </div>

            <div class="card-body">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['idpc']); ?>">

                    <div class="form-group">
                        <label for="idnhanvien">Người trực:</label>
                        <select class="form-control" id="idnhanvien" name="idnhanvien" required>
                            <?php 
                                while ($nv = mysqli_fetch_assoc($result_nhanvien)) : 
                                    // Only display employees with `quyen = 1`
                            ?>
                            <option value="<?php echo htmlspecialchars($nv['idnhanvien']); ?>"
                                <?php if ($nv['idnhanvien'] == $row['idnhanvien']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($nv['hoten']); ?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lydo">Lý do:</label>
                        <input type="text" class="form-control" id="lydo" name="lydo"
                            value="<?php echo htmlspecialchars($row['lydo']); ?>" readonly required>
                    </div>


                    <div style=" margin-left: 595px;">
                    <button type="submit" class="btn btn-primary" name="duyet">Cập nhật</button>
                    <button type="submit" class="btn btn-warning" name="khongduyet">Không duyệt</button>
                    <a href="QL_PHANCONG.php" class="btn btn-secondary">Hủy</a>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
