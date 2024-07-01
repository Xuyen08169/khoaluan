<?php
include("header.php");
?>

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
    if (document.forms["themchucvu"]["tenhucvu"].value == "") {
        callAlert('Vui lòng nhập tiêu đề!', 'error', '1500', '');
        //alert('Vui lòng nhập họ tên!', 'error', '1500', '');
        document.forms["themchucvu"]["tenhucvu"].setAttribute('required', 'required');
        return false;
    }

    return true;
}


</script>

<form enctype="multipart/form-data" action="xuly_them_chucvu.php" name="themchucvu" method="post"
    onsubmit="return kiemtra();">

<link rel="stylesheet" href="lg.css">

    <div>
        <!-- <div class="top-center">
            <p class="top-h1 ">Hệ Thống Quản Lý Di Tích</p>
        </div> -->
        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4" style=" margin-left:100px;">Thêm chức vụ</h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>ID:</label>
                    <input type="text" name="idchucvu" readonly></input>
                </div>
              
                
                
            </div>

           
            <!-- -------------------- -->
           

            <div class="txt-gv-top">
              
                <div class="txt-gv-lb">
                    <label>Tên chức vụ:</label>
                    <input type="text" name="tenchucvu"></input>
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
