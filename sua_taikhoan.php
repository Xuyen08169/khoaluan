<?php
include("header.php");

include("ketnoi.php");

$usern = $_REQUEST["user"]; // Nhận giá trị user từ link xóa của quantri.php

// Sử dụng biến $usern trong câu truy vấn SQL
$sql = "SELECT * FROM taikhoan WHERE idnhanvien = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bộ môn: " . mysqli_error($conn));
$row = mysqli_fetch_array($kq);
?>


<form enctype="multipart/form-data" action="thuchien_sua_taikhoan.php" name="suatintuc" method="post">
    <link rel="stylesheet" href="lg.css">

    <div>
        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4"> Thay đổi thông tin tài khoản</h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>ID:</label>
                    <input type="text" name="idnhanvien" readonly value="<?php echo $row["idnhanvien"]; ?>" />
                </div>
                <div class="txt-gv-lb">
                    <label>Tên nhân viên:</label>
                    <input type="text" name="hoten" value="<?php echo $row["hoten"]; ?>" />
                </div>
                <div class="txt-gv-lb">
                    <label>Ngày sinh:</label>
                    <input type="date" name="ngaysinh" value="<?php echo $row["ngaysinh"]; ?>" />
                </div>
                <div class="txt-gv-lb">
                    <label>Giới tính:</label>
                    <select name="gioitinh" value="<?php echo $row["gioitinh"]; ?>">
                        <option>Nam</option>
                        <option>Nữ</option>
                        <option>Giới tính khác</option>

                    </select>
                    <!-- <input value=""></input> -->

                </div>
            </div>

            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Số điện thoại:</label>
                    <input type="text" name="sodienthoai" value="<?php echo $row["sodienthoai"]; ?>" />
                </div>

                <div class="txt-gv-lb">
                    <label>Chức vụ:</label>
                    <select name="idchucvu">
                        <?php
                $sql = "SELECT idchucvu, tenchucvu FROM chucvu";
                $kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));
                while ($row_tt = mysqli_fetch_assoc($kq)) {
                    $idchucvu = $row_tt['idchucvu'];
                    $tenchucvu = $row_tt['tenchucvu'];
                    $selected = ($idchucvu == $row["idchucvu"]) ? "selected" : "";
                    echo "<option value=\"$idchucvu\" $selected>$tenchucvu</option>";
                    
                    }
                ?>
                    </select>
                </div>

                <div class="txt-gv-lb">
                    <label>Nhóm tổ:</label>
                    <select name="idnhomto">
                        <?php
                $sql = "SELECT idnhomto, tento FROM nhomto";
                $kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));
                while ($row_tt = mysqli_fetch_assoc($kq)) {
                    $idnhomto = $row_tt['idnhomto'];
                    $tento = $row_tt['tento'];
                    $selected = ($idnhomto == $row["idnhomto"]) ? "selected" : "";
                    echo "<option value=\"$idnhomto\" $selected>$tento</option>";
                    
                    }
                ?>
                    </select>
                </div>
            </div>

            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Email:</label>
                    <input type="text" name="email" value="<?php echo $row["email"]; ?>" />
                </div>

                <div class="txt-gv-lb">
                    <label>Mật khẩu:</label>
                    <input type="text" name="matkhau" value="<?php echo $row["matkhau"]; ?>" />
                </div>
                <div class="txt-gv-lb">
                    <label>Quyền:</label>
                    <input type="text" name="quyen" value="<?php echo $row["quyen"]; ?>" />
                </div>
            </div>

            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Hình ảnh:</label>
                    <input style="" type="text" name="hinhanhht" id="hinhanhht"
                        value="<?php echo $row['hinhanh']; ?>" readonly>
                    <input type="file" name="hinhanh" id="hinhanh" style="display:none;"
                        onchange="updateImagePath(this)">
                    <img id="hinhanh_preview" src="<?php echo $row['hinhanh']; ?>"
                        style="max-width:100px;  max-height: 100px; margin-left:50px;">
                    <button
                        style="width:200px; margin: 10px auto; border-radius: 3px; height: 35px;background-color: #40679E; color:white; border:none;"
                        type="button" onclick="document.getElementById('hinhanh').click();">Chọ ảnh!</button>
                </div>
                <script>
                function updateImagePath(input) {
                    var filePath = input.value.split('\\').pop(); // Lấy tên tệp từ đường dẫn đầy đủ
                    document.getElementById('hinhanhht').value = "./hinhanh/" + filePath; // Cập nhật đường dẫn hiển thị

                    // Hiển thị hình ảnh mới
                    var file = input.files[0];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('hinhanh_preview').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
                </script>
            </div>


            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLTK.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>

<?php
include("footer.php");
?>