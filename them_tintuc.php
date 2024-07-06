<?php
include("header.php");
?>
<head>
<script src="editor/ckeditor.js"></script>


</head>
<meta charset="UTF-8">
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
    if (document.forms["themtintuc"]["tieude"].value == "") {
        callAlert('Vui lòng nhập tiêu đề!', 'error', '1500', '');
        //alert('Vui lòng nhập họ tên!', 'error', '1500', '');
        document.forms["themtintuc"]["tieude"].setAttribute('required', 'required');
        return false;
    }

   

    return true;
}

CKEDITOR.replace('editor1', {
    entities: false,  // Tắt chuyển đổi ký tự đặc biệt thành các ký tự HTML entity
    basicEntities: false,  // Tắt chuyển đổi cơ bản các ký tự thành entity
    entities_latin: false,  // Không chuyển đổi các ký tự Latin thành entity
    entities_greek: false,  // Không chuyển đổi các ký tự Greek thành entity
    // contentsCss: '/path/to/your/stylesheet.css' // Đường dẫn tới CSS của bạn để định nghĩa lại font
});
</script>

<form enctype="multipart/form-data" action="xuly_them_tintuc.php" name="themtintuc" method="post"
    onsubmit="return kiemtra();">

<link rel="stylesheet" href="lg.css">

    <div>
        <!-- <div class="top-center">
            <p class="top-h1 ">Hệ Thống Quản Lý Di Tích</p>
        </div> -->
        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4" style=" margin-left:100px;">Tin tức mới</h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>ID:</label>
                    <input type="text" name="idtintuc" readonly></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Tiêu đề:</label>
                    <input type="text" name="tieude" id="tieude"></input>
                </div>
                
                <div class="txt-gv-lb">
                    <label>Ngày đăng:</label>
                    <input type="date" name="ngaydang"></input>
                </div>
               
                
            </div>

            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                <label>Nội dung:</label>
                <!-- <input type="text" name="noidung"></input> -->
                <textarea name="noidung" id="editor1"></textarea>

                    
                        <!-- <script>
                        CKEDITOR.replace('editor1');
                        </script>
                    -->
                   
                </div>

                <div class="txt-gv-lb">
                    <label>Nổi bật:</label>
                    <select name="noibat" id="noibat">
                        <option value="0"> 0 </option>
                        <option value="1"> 1</option>
                       
                    </select>
                </div>

                <div class="txt-gv-lb">
                    <label>Người đăng:</label>
                    <select name="idnhanvien">
                    <?php
                            $sql = "SELECT idnhanvien, hoten FROM taikhoan Where quyen = 0";
                            $kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));
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
                <label>Ảnh tin tức:</label>
                    <input type="file" name="anhtt">
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
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
<script src="editor/ckeditor.js"></script>
<script>
CKEDITOR.replace('editor1', {
    filebrowserUploadUrl: 'upload.php?type=Files',
    filebrowserImageUploadUrl: 'upload.php?type=Images',
    filebrowserBrowseUrl: 'editor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
    filebrowserImageBrowseUrl: 'editor/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
    height: 200,
    width: 500,
    toolbar: [
        ['NewPage', '-', 'Undo', 'Redo', 'PageBreak'],
        ['Cut', '-', 'Copy', 'Paste', 'PasteFromWord'],
        ['Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
        ['Link', 'Unlink', 'Image', 'Flash', 'Table', 'Smiley', 'SpecialChar'],
        '/',
        ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'],
        ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyFull', 'JustifyBlock'],
        ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'],
        ['Maximize', 'ckeditor_wiris_formulaEditor']
    ]
});
</script>