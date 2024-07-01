<?php
include("header.php");
?>
<head>
    <script src="ckeditor/ckeditor.js"></script>

</head>


<form enctype="multipart/form-data" action="xuly_dkthamquan.php" name="sukien" method="post">
<link rel="stylesheet" href="lg.css">

    <div>
        <!-- <div class="top-center">
            <p class="top-h1 ">Hệ Thống Quản Lý Di Tích</p>
        </div> -->
        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4"> Sự kiện mới </h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>ID:</label>
                    <input type="text" name="idtq" readonly></input>
                </div>
                <div class="txt-gv-lb">
                    <label> Họ tên:</label>
                    <input type="text" name="hoten"></input>
                </div>
                <div class="txt-gv-lb">
                    <label> Địa chỉ:</label>
                    <input type="text" name="diachi"></input>
                </div>

               
                
            </div>

            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                <label> Email:</label>
                <input type="text" name="email"></input>
                    
                   
                </div>
                <div class="txt-gv-lb">
                    <label> Tên Đoàn:</label>
                    <input type="text" name="tendoan"></input>
                </div>

                <div class="txt-gv-lb">
                    <label> Ngày tham quan:</label>
                    <input type="date" name="ngaythamquan"></input>
                </div>

                <div class="txt-gv-lb">
                    <label> Số lượng:</label>
                    <input type="text" name="soluong"></input>
                </div>

               

            </div>
               
            <!-- -------------------- -->
            <div class="txt-gv-top">
            <div class="txt-gv-lb">
                    <label> Số điện thoại:</label>
                    <input type="text" name="sdt"></input>
                </div>

                <div class="txt-gv-lb">
                    <label> Ghi chú:</label>
                    <input type="text" name="ghichu"></input>
                </div>
                

                <div class="txt-gv-lb">
                    <label> Trạng thái:</label>
                    <input type="text" name="trangthai" readonly></input>
                </div>

               
           
        </div>


            <!-- -------------------- -->
            
            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="DS_DKTQ.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>
<?php
include("footer.php");
?>
