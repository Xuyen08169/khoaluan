<?php 
include("header_nhanvien.php");
?>

<?php 
    // session_start(); 
    session_destroy();
        echo "<script language=javascript>
        alert ('Bạn đã đăng xuất thành công');
        window.location='login.php';
        </script> ";
?>


<?php 
include("footer_nhanvien.php");
?>