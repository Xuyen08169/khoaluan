<?php
include ("header.php");
include ("ketnoi.php");

$usern = $_REQUEST["user"]; // Nhận giá trị user từ link xóa của quantri.php

// Sử dụng biến $usern trong câu truy vấn SQL
$sql = "SELECT * FROM lichtruc WHERE idtruc = '" . $usern . "'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bộ môn: " . mysqli_error($conn));
$row = mysqli_fetch_array($kq);
?>

<form enctype="multipart/form-data" action="thuchien_sua_lich.php" name="sualich" method="post">
    <link rel="stylesheet" href="lg.css">

    <div>
        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4">Thay Đổi Thông Tin Lịch Trực</h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>ID:</label>
                    <input type="text" name="idtruc" readonly value="<?php echo $row["idtruc"]; ?>" />
                </div>

                <!-- <div class="txt-gv-lb">
                    <label> Người trực:</label>
                    <select name="idnhanvien">
                        <?php
                        //$sql = "SELECT idnhanvien, hoten FROM taikhoan WHERE quyen = 1";
                        //$kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));
                        //while ($row_tt = mysqli_fetch_assoc($kq)) {
                          //  $idnhanvien = $row_tt['idnhanvien'];
                          //  $hoten = $row_tt['hoten'];
                          //  $selected = ($idnhanvien == $row["idnhanvien"]) ? "selected" : "";
                          //  echo "<option value=\"$idnhanvien\" $selected>$hoten</option>";

                       // }
                        ?>
                    </select>
                </div> -->
            </div>
            <!-- -------------------------------------------------------------------------------->

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>Ngày trực:</label>
                    <input type="date" name="ngaytruc" value="<?php echo $row["ngaytruc"]; ?>" />
                </div>


                <div class="txt-gv-lb">
                    <label> Sự kiện:</label>
                    <select name="id">
                        <?php
                        $sql = "SELECT id, tensukien FROM sukien";
                        $kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));
                        echo "<option value=\"\" $selected></option>";
                        while ($row_tt = mysqli_fetch_assoc($kq)) {
                            $id = $row_tt['id'];
                            $tensukien = $row_tt['tensukien'];
                            $selected = ($id == $row["id"]) ? "selected" : "";
                            echo "<option value=\"$id\" $selected>$tensukien</option>";

                        }
                        ?>
                    </select>
                </div>

            </div>
            <!----------------------------------------------------------------------------------->


            <!-- <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>Trạng thái:</label>
                    <input type="text" name="trangthai" value="<?php echo $row["trangthai"]; ?>" />
                </div>
            </div> -->


            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLLT.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>

<?php
include ("footer.php");

?>