<?php
include("header.php");

include("ketnoi.php");

$usern=$_REQUEST["user"]; 

$sql = "SELECT * FROM tintuc WHERE idtintuc = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bài đăng" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>

<head>
    <script src="ckeditor/ckeditor.js"></script>

</head>
<form enctype="multipart/form-data" action="thuchien_sua_tintuc.php" name="suatintuc" method="post">
<link rel="stylesheet" href="lg.css">

    <div>
       
        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4">Tin tức mới</h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>ID:</label>
                    <input type="text" name="idtintuc" readonly value="<?php echo $row["idtintuc"]; ?>"/>
                </div>
                <div class="txt-gv-lb">
                    <label>Tiêu đề:</label>
                    <input type="text" name="tieude" value="<?php echo $row["tieude"]; ?>"/>
                </div>

                <div class="txt-gv-lb">
                    <label>Ngày đăng:</label>
                    <input type="date" name="ngaydang" value="<?php echo $row["ngaydang"]; ?>"/>
                </div>
                
               
                
            </div>

            <div class="txt-gv-bot">
            <div class="txt-gv-lb">
                <label>Nội dung:</label>
                <textarea name="noidung" id="editor1"><?php echo htmlspecialchars($row['noidung'], ENT_QUOTES, 'UTF-8'); ?></textarea>

                <script>
                    CKEDITOR.replace('editor1');
                </script>
            </div>


                <div class="txt-gv-lb">
                    <label> Nổi bật:</label>
                    <select name="noibat" value="<?php echo $row["noibat"]; ?>">
                    <option value="0"> 0 </option>
                    <option value="1"> 1</option>
                      
                    </select>

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
            

            <!-- -------------------- -->
            
            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLTT.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>

<?php
include("footer.php");

?>
