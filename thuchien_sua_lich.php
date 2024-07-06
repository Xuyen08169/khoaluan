<?php
include("ketnoi.php");

// Validate and sanitize input
$idtruc = intval($_POST["idtruc"]);
$ngaytruc = mysqli_real_escape_string($conn, $_POST["ngaytruc"]);
$id = isset($_POST["id"]) ? intval($_POST["id"]) : null;

// Check if the provided ID exists in the sukien table
if (!empty($id)) {
    $sql_check = "SELECT COUNT(*) AS count FROM sukien WHERE id = $id";
    $result = mysqli_query($conn, $sql_check);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        // Update lichtruc with the provided ID
        $sql = "UPDATE lichtruc SET ngaytruc = '$ngaytruc', id = $id
                WHERE idtruc = $idtruc";
    } else {
        // Display error if ID does not exist in sukien
        echo "<script language='javascript'>
                alert('ID không tồn tại trong bảng sự kiện');
                window.location='QLLT.php';
              </script>";
        exit; // Exit script after displaying the alert
    }
} else {
    // Update lichtruc without the ID
    $sql = "UPDATE lichtruc SET ngaytruc = '$ngaytruc', id = NULL
            WHERE idtruc = $idtruc";
}

// Execute the update query
$kq = mysqli_query($conn, $sql);

if ($kq) {
    echo "<script language='javascript'>
            alert('Cập nhật thành công');
            window.location='QLLT.php';
          </script>";
} else {
    echo "<script language='javascript'>
            alert('Cập nhật thất bại');
            window.location='QLLT.php';
          </script>";
}

mysqli_close($conn);
?>
