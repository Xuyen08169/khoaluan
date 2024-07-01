<?php
include("header.php");
?>
<!-- <head>
    <script src="ckeditor/ckeditor.js"></script>

</head> -->
<link rel="stylesheet" href="lg.css">
<style>
input:invalid {
    border: solid 1.5px red;
}
</style>

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
    if (document.forms["themtaikhoan"]["hoten"].value == "") {
        callAlert('Vui lòng nhập họ tên!', 'error', '1500', '');
        //alert('Vui lòng nhập họ tên!', 'error', '1500', '');
        document.forms["themtaikhoan"]["hoten"].setAttribute('required', 'required');
        return false;
    }

    if (document.forms["themtaikhoan"]["sodienthoai"].value == "") {
        callAlert('Vui lòng nhập sdt!', 'error', '1500', '');
        //alert('Vui lòng nhập họ tên!', 'error', '1500', '');
        document.forms["themtaikhoan"]["sodienthoai"].setAttribute('required', 'required');
        return false;
    }

    if (document.forms["themtaikhoan"]["email"].value == "") {
        callAlert('Vui lòng nhập email!', 'error', '1500', '');
        //alert('Vui lòng nhập họ tên!', 'error', '1500', '');
        document.forms["themtaikhoan"]["email"].setAttribute('required', 'required');
        return false;
    }
    if (document.forms["themtaikhoan"]["matkhau"].value == "") {
        callAlert('Vui lòng nhập mật khẩu!', 'error', '1500', '');
        //alert('Vui lòng nhập họ tên!', 'error', '1500', '');
        document.forms["themtaikhoan"]["matkhau"].setAttribute('required', 'required');
        return false;
    }
    if (document.forms["themtaikhoan"]["hinhanhht"].value == "") {
        callAlert('Vui lòng chọn hình ảnh!', 'error', '1500', '');
        //alert('Vui lòng nhập họ tên!', 'error', '1500', '');
        document.forms["themtaikhoan"]["hinhanhht"].setAttribute('required', 'required');
        return false;
    }


    return true;
}
</script>


<form enctype="multipart/form-data" action="xuly_them_taikhoan.php" name="themtaikhoan" method="post"
    onsubmit="return kiemtra();">


    <div>

        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4" style=" margin-left:50px;">Thêm Tài Khoản Mới</h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>ID:</label>
                    <input type="text" name="idnhanvien" readonly></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Họ tên:</label>
                    <input type="text" name="hoten" id="hoten"></input>
                </div>

                <div class="txt-gv-lb">
                    <label>Ngày sinh:</label>
                    <input type="date" name="ngaysinh"></input>
                </div>

                <div class="txt-gv-lb">
                    <label>Giới tính:</label>
                    <select name="gioitinh">
                        <option value="nam">Nam</option>
                        <option value="nu">Nữ</option>
                        <option value="gioitinhkhac">Giới tính khác</option>
                    </select>

                </div>



            </div>

            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Số điện thoại:</label>
                    <input type="text" id="sodienthoai" name="sodienthoai"></input>


                </div>
                <div class="txt-gv-lb">
                    <label>Chức vụ:</label>
                    <select name="idchucvu">
                        <?php
                $sql = "SELECT idchucvu, tenchucvu FROM chucvu";
                $kq = mysqli_query($conn, $sql) or die("Không thể thêm : " . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($kq)) {
                    $idchucvu = $row['idchucvu'];
                    $tenchucvu = $row['tenchucvu'];
                    echo "<option value=\"$idchucvu\">$tenchucvu</option>";
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
                            while ($row = mysqli_fetch_assoc($kq)) {
                                $idnhomto = $row['idnhomto'];
                                $tento = $row['tento'];
                                echo "<option value=\"$idnhomto\">$tento</option>";
                                }
                            ?>
                    </select>
                </div>

            </div>

            <!-- -------------------- -->
            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Email:</label>
                    <input type="text" name="email" id="email"></input>
                </div>

                <div class="txt-gv-lb">
                    <label>Mật khẩu:</label>
                    <input type="text" name="matkhau" id="matkhau"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Quyền:</label>
                    <input type="text" name="quyen"></input>
                </div>


            </div>

            <!-- -------------------- -->
            <div class="txt-gv-bot">
    <div class="txt-gv-lb">
       
        <input  type="text" name="hinhanhht" id="hinhanhht" readonly>
        <!-- Ô nhập để chọn tệp hình ảnh, được ẩn đi -->
        <input type="file" name="hinhanh" id="hinhanh" style="display:none;" onchange="updateImagePath(this)">
        <!-- Hiển thị hình ảnh hiện tại -->
        <img id="hinh_anh_preview" src="<?php echo $row['hinhanh']; ?>" style="max-width:100px; max-height: 100px;">
        <!-- Nút để chọn ảnh -->
        <button style="width:100px; margin: 10px auto; border-radius: 3px; height: 35px; background-color: #40679E; color:white; border:none;" type="button" onclick="document.getElementById('hinhanh').click();">Chọn ảnh!</button>
    </div>

    <script>
        function updateImagePath(input) {
            var filePath = input.value.split('\\').pop(); // Lấy tên tệp từ đường dẫn đầy đủ
            document.getElementById('hinhanhht').value = "./hinhanh/" + filePath; // Cập nhật đường dẫn hiển thị

            // Hiển thị hình ảnh mới
            var file = input.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('hinh_anh_preview').src = e.target.result; // Cập nhật src của img để hiển thị ảnh
            };
            reader.readAsDataURL(file);
        }
    </script>
</div>

           


            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="submit" value="Lưu lại" onclick="return kiemtra();" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLTK.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>
<?php
include("footer.php");
?>