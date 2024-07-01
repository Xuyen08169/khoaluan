
<?php
include ("header.php")
    ?>
<link rel="stylesheet" href="lg.css">
<?php

include ("ketnoi.php");

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['email'])) {
    // Lấy thông tin người dùng từ CSDL dựa trên email đã đăng nhập
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM taikhoan WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Lấy thông tin từ kết quả truy vấn
        $row = mysqli_fetch_assoc($result);
// Format the date to d/m/y
$formattedDate = date('d/m/Y', strtotime($row['ngaysinh']));
        echo '
        <div class="full-ttcn">
            <div class="ttcn-td">
                <label>THÔNG TIN CÁ NHÂN</label>
            </div>
            <div class="ttcn">
                <div class="ttcn-img">
                    <img src="' . $row["hinhanh"] . '" width="250px" height="250px">
                </div>
                <div class="ttcn-tt">
                    <div class="ttcn-tt-left">
                        <label> Hộ tên:</label>
                        <label> Ngày sinh:</label>
                        <label> Giới tính:</label>
                        <label> Số điện thoại:</label>
                        <label> Email:</label>
                      
                    </div>
                    <div class="ttcn-tt-right">
                        <label>' . $row["hoten"] . '</label>
                      <label>' . $formattedDate . '</label>
                        <label>' . $row["gioitinh"] . '</label>
                        <label>' . $row["sodienthoai"] . '</label>
                        <label>' . $row["email"] . '</label>
                       
                    </div>
                </div>
            </div>
        </div>
    ';


        // Hiển thị thông tin người dùng
        // echo "<div style='display: flex; flex-direction: column; align-items: center;color: black; font-size: 16px;'>";
        // echo "<h3 >Thông tin cá nhân</h3>";
        // echo "Họ tên: " . $row['hoten'] . "<br>";
        // echo "Ngày sinh: " . $row['ngaysinh'] . "<br>";
        // echo "Giới tính: " . $row['gioitinh'] . "<br>";
        // echo "Số điện thoại: " . $row['sodienthoai'] . "<br>";
        // echo "Email: " . $row['email'] . "<br>";  
        // echo "Hình ảnh: " . $row['hinhanh'] . "<br>";


        // echo "</div>";
        // và các thông tin khác nếu cần

    } else {
        echo "Không tìm thấy thông tin người dùng.";
    }
} else {
    echo "Bạn chưa đăng nhập.";
}

// Đóng kết nối CSDL
mysqli_close($conn);
?>

<?php
include ("footer.php")
    ?>
