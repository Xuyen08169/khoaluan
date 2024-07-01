<?php
include("header.php");
?>

<form enctype="multipart/form-data" action="xuly_them_lich.php" name="themlich" method="post">
<link rel="stylesheet" href="lg.css">

    <div>
        <!-- <div class="top-center">
            <p class="top-h1 ">Hệ Thống Quản Lý Di Tích</p>
        </div> -->
        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4" style=" margin-left:85px;"> Lịch Trực Mới</h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>ID:</label>
                    <input type="text" name="idtruc" readonly></input>
                </div>
              
                <div class="txt-gv-lb">
                    <label>Người trực:</label>
                    <select name="idnhanvien">
                            <?php
                $sql = "SELECT idnhanvien, hoten FROM taikhoan WHERE quyen = 1";
                $kq = mysqli_query($conn, $sql) or die("Không thể thêm : " . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($kq)) {
                    $idnhanvien = $row['idnhanvien'];
                    $hoten = $row['hoten'];
                    echo "<option value=\"$idnhanvien\">$hoten</option>";
                    }
                ?>
                        </select>

                </div>
                
                
            </div>

           
            <!-- -------------------- -->
           

            <div class="txt-gv-top">
              
            <div class="txt-gv-lb">
                  <label>Ngày trực:</label>
                  <input type="date" name="ngaytruc"></input>
              </div>


              <div class="txt-gv-lb">
                    <label> Tên sự kiện:</label>
                    <select name="id">
                    <?php
                            $sql = "SELECT id, tensukien FROM sukien";
                            $kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));
                            while ($row = mysqli_fetch_assoc($kq)) {
                                $id = $row['id'];
                                $tensukien = $row['tensukien'];
                                echo "<option value=\"\"></option>";
                                echo "<option value=\"$id\">$tensukien</option>";

                                }
                            ?>
                    </select>
             
                        

                </div>
                
            </div>
            <!-- ---------------------------------- -->
            <div class="txt-gv-top">
              
            <div class="txt-gv-lb">
                  <label>Trạng thái:</label>
                  <input type="text" name="trangthai"></input>
              </div>

                
              
              
          </div>
          
            
            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLLT.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>
<?php
include("footer.php");
?>
