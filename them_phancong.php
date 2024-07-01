<?php
include("header.php");
?>

<form enctype="multipart/form-data" action="xuly_them_phancong.php" name="themphancong" method="post">
<link rel="stylesheet" href="lg.css">

    <div>
        <!-- <div class="top-center">
            <p class="top-h1 ">Hệ Thống Quản Lý Di Tích</p>
        </div> -->
        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4" style=" margin-left:80px;"> Xử lý hoán chuyển</h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>ID:</label>
                    <input type="text" name="idpc" readonly></input>
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

                <div class="txt-gv-lb">
                    <label>Ngày trực:</label>
                    <select name="idtruc" type="date">
                        <?php
                            $sql = "SELECT idtruc, ngaytruc FROM lichtruc";
                            $kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));
                            while ($row = mysqli_fetch_assoc($kq)) {
                                $idtruc = $row['idtruc'];
                                $ngaytruc = $row['ngaytruc'];
                                echo "<option value=\"$idtruc\">$ngaytruc</option>";
                                }
                            ?>
                    </select>
                </div>

                <div class="txt-gv-lb">
                <label>ID sự kiện:</label>
                    <select name="id">
                        <?php
                            $sql = "SELECT id, tensukien FROM sukien";
                            $kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));
                            while ($row = mysqli_fetch_assoc($kq)) {
                                $id = $row['id'];
                                $tensukien = $row['tensukien'];
                                echo "<option value=\"$id\">$tensukien</option>";
                                echo "<option value=\"\"></option>";

                                }
                            ?>
                    </select>
                </div>


                
                
            </div>

           
            <!-- -------------------- -->
           

            <div class="txt-gv-top">
              
            <div class="txt-gv-lb">
            <label>Trạng thái:</label>
            <input type="text" name="trangthai"></input>
              </div>


              <div class="txt-gv-lb">
                  <label>Người trực cũ:</label>
                  <input type="text" name="nguoitruccu"></input>
              </div>

              <div class="txt-gv-lb">
                  <label> Lý do:</label>
                  <input type="text" name="lydo"></input>
              </div>
                
            </div>
            <!-- ---------------------------------- -->
            <div class="txt-gv-top">
              
            <div class="txt-gv-lb">
                  <label> Người duyệt:</label>
                  <input type="text" name="nguoiduyet"></input>
              </div>

              <div class="txt-gv-lb">
                  <label>Ngày duyệt:</label>
                  <input type="date" name="ngayduyet"></input>
              </div>
            
                
              
              
          </div>
          
            
            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QL_PHANCONG.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>
<?php
include("footer.php");
?>
