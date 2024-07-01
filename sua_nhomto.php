<?php
include("header.php");
include("ketnoi.php");

$usern = $_REQUEST["user"]; // Nhận giá trị user từ link xóa của quantri.php

// Sử dụng biến $usern trong câu truy vấn SQL
$sql = "SELECT * FROM nhomto WHERE idnhomto = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bộ môn: " . mysqli_error($conn));
$row = mysqli_fetch_array($kq);
?>

<form enctype="multipart/form-data" action="thuchien_sua_nhomto.php" name="thuchien_sua_nhomto" method="post">
<link rel="stylesheet" href="lg.css">

    <div>
        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4">Sửa nhóm tổ</h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>ID:</label>
                    <input type="text" name="idnhomto" readonly value="<?php echo $row["idnhomto"]; ?>"/>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>Tên nhóm tổ:</label>
                    <input type="text" name="tento"value="<?php echo $row["tento"]; ?>"/>
                </div>
            </div>

            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLNT.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>

<?php
include("footer.php");

?>
