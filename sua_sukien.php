<?php
include("header.php");

include("ketnoi.php");

$usern=$_REQUEST["user"]; 

$sql = "SELECT * FROM sukien WHERE id = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bài đăng" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>


<form enctype="multipart/form-data" action="thuchien_sua_sukien.php" name="suatintuc" method="post">
<link rel="stylesheet" href="lg.css">

    <div>
       
        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4"> Sự kiện mới </h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>ID:</label>
                    <input type="text" name="id" readonly value="<?php echo $row["id"]; ?>"/>
                </div>
                <div class="txt-gv-lb">
                    <label>Tiêu đề:</label>
                    <input type="text" name="tensukien" value="<?php echo $row["tensukien"]; ?>"/>
                </div>

                <div class="txt-gv-lb">
                    <label>File:</label>
                    <input type="file" name="file" accept=".pdf, .doc, .docx">
                  <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                </div>

                
               
                
            </div>

            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                <label>ngaybatdau:</label>
                <input type="date" name="ngaybatdau" value="<?php echo $row["ngaybatdau"]; ?>"/>
                  
                </div>
                <div class="txt-gv-lb">
                    <label>ngayketthuc:</label>
                    <input type="date" name="ngayketthuc" value="<?php echo $row["ngayketthuc"]; ?>"/>
                </div>

                <div class="txt-gv-lb">
                    <label>Người đăng:</label>
                    <select name="idnhanvien">
                            <?php
                $sql = "SELECT idnhanvien, hoten FROM taikhoan";
                $kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));
                while ($row_tt = mysqli_fetch_assoc($kq)) {
                    $idnhanvien = $row_tt['idnhanvien'];
                    $hoten = $row_tt['hoten'];
                    $selected = ($idnhanvien == $row["idnhanvien"]) ? "selected" : "";
                    echo "<option value=\"$idnhanvien\" $selected>$hoten</option>";
                    
                    }
                ?>
                        </select>
                </div>


            </div>
               
            <!-- -------------------- -->
            <div class="txt-gv-top">
              
                <div class="txt-gv-lb">
                    <label>Nội dung:</label>
                    <input type="text" name="noidung" value="<?php echo $row["noidung"]; ?>"/>
                </div>


                <div class="txt-gv-lb">
                    <label>Ngày đăng:</label>
                    <input type="date" name="ngaydang" value="<?php echo $row["ngaydang"]; ?>"/>
                </div>
            </div>


            <!-- -------------------- -->
            
            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLSK.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>

<?php
include("footer.php");

?>
