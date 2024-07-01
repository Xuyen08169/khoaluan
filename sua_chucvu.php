<?php
include("header.php");
include("ketnoi.php");

$usern = $_REQUEST["user"]; // Nhận giá trị user từ link xóa của quantri.php

// Sử dụng biến $usern trong câu truy vấn SQL
$sql = "SELECT * FROM chucvu WHERE idchucvu = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bộ môn: " . mysqli_error($conn));
$row = mysqli_fetch_array($kq);
?>

<form enctype="multipart/form-data" action="thuchien_sua_chucvu.php" name="frmxlgv" method="post">
<link rel="stylesheet" href="lg.css">

    <div>
        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4sa">Sửa chức vụ</h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>ID:</label>
                    <input type="text" name="idchucvu" readonly value="<?php echo $row["idchucvu"]; ?>"/>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>Tên chức vụ:</label>
                    <input type="text" name="tennhom" value="<?php echo htmlspecialchars($row["tenchucvu"]); ?>"></input>
                </div>
            </div>

            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLCV.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>

<?php
include("footer.php");

?>
