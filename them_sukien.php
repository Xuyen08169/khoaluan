<?php
include("header.php");
?>
<head>
    <script src="ckeditor/ckeditor.js"></script>

</head>
<script>
function callAlert(title, icon, timer, text) {
    Swal.fire({
        position: "center",
        icon: `${icon}`,
        title: `${title}`,
        text: `${text}`,
        showConfirmButton: false,
        timer: `${timer}`,
        animation: false
    });
}

function kiemtra() {
    if (document.forms["themsukien"]["tensukien"].value == "") {
        callAlert('Vui lòng nhập tiêu đề!', 'error', '1500', '');
        //alert('Vui lòng nhập họ tên!', 'error', '1500', '');
        document.forms["themsukien"]["tensukien"].setAttribute('required', 'required');
        return false;
    }

    if (document.forms["themsukien"]["noidung"].value == "") {
    callAlert('Vui lòng nhập nội dung!', 'error', '1500', '');
    document.forms["themsukien"]["noidung"].setAttribute('required', 'required');
    return false;
}

    return true;
}


</script>

<form enctype="multipart/form-data" action="xuly_them_sukien.php" name="themsukien" method="post"
    onsubmit="return kiemtra();"></form>



<link rel="stylesheet" href="lg.css">

    <div>
        <!-- <div class="top-center">
            <p class="top-h1 ">Hệ Thống Quản Lý Di Tích</p>
        </div> -->
        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4" style=" margin-left:100px;"> Sự kiện mới </h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>ID:</label>
                    <input type="text" name="id" readonly></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Tên sự kiện:</label>
                    <input type="text" name="tensukien" id="tensukien"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>File:</label>
                    <input type="file" name="file" accept=".pdf, .doc, .docx">
                  <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                </div>

               
                
            </div>

            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                <label>Ngày bắt đầu:</label>
                <input type="date" name="ngaybatdau"></input>
                    
                   
                </div>
                <div class="txt-gv-lb">
                    <label> Ngày kết thúc:</label>
                    <input type="date" name="ngayketthuc"></input>
                </div>

               

            </div>
               
            <!-- -------------------- -->
            <div class="txt-gv-top">
            <div class="txt-gv-lb">
                    <label> Nội dung:</label>
                    <!-- <input type="text" name="noidung"></input> -->
                    <textarea name="noidung" id="editor1"></textarea>
                        <script>
                        CKEDITOR.replace('editor1');
                        </script>
                   
                </div>

                <div class="txt-gv-lb">
                    <label>Người đăng:</label>
                    <select name="idnhanvien">
                    <?php
                
                            $sql = "SELECT idnhanvien, hoten FROM taikhoan WHERE quyen= 0";
                            $kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));
                            while ($row = mysqli_fetch_assoc($kq)) {
                                $idnhanvien = $row['idnhanvien'];
                                $hoten = $row['hoten'];
                                echo "<option value=\"$idnhanvien\">$hoten</option>";
                                }
                            ?>
                    </select>
                </div>

                <div class="txt-gv-lb">
                    <label> Ngày đăng:</label>
                    <input type="date" name="ngaydang"></input>
                </div>

           
        </div>


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
