<?php
include ("header_nhanvien.php");
include ("ketnoi.php");

// Bắt đầu session để sử dụng session variables
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Lấy idnhanvien từ session
$idnhanvien_dangnhap = $_SESSION['idnhanvien'];

// Truy vấn SQL để lấy thông tin cần thiết
$sql = "
SELECT 
    phancong.idpc,
    taikhoan.hoten AS nguoitrc,
    lichtruc.ngaytruc,
    IFNULL(sukien.tensukien, 'Không có sự kiện') AS tensukien,
    phancong.trangthai,
    phancong.nguoitruccu,
    phancong.lydo,
    phancong.nguoiduyet
FROM 
    phancong
JOIN 
    lichtruc ON phancong.idtruc = lichtruc.idtruc
LEFT JOIN 
    sukien ON phancong.id = sukien.id
JOIN 
    taikhoan ON phancong.idnhanvien = taikhoan.idnhanvien
WHERE 
    phancong.idnhanvien = $idnhanvien_dangnhap
";
$kq = mysqli_query($conn, $sql) or die("Không thể truy vấn: " . mysqli_error($conn));
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"
                    style="font-size: 25px; padding-left: 270px; padding-top:15px;">
                    LỊCH TRỰC CÁ NHÂN CÔNG TÁC TẠI ĐỀN THỜ</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Người trực</th>
                            <th>Ngày trực</th>
                            <th>Sự kiện</th>
                            <th>Trạng thái</th>
                            <th>Người trực cũ</th>
                            <th>Lý do</th>
                            <th>Người duyệt</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($kq)) {
                            echo "<tr>";
                            // echo "<td>" . $row['idpc'] . "</td>";
                            echo "<td>" . $row['nguoitrc'] . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($row['ngaytruc'])) . "</td>";
                            echo "<td>" . $row['tensukien'] . "</td>";
                            echo "<td>" . $row['trangthai'] . "</td>";
                            echo "<td>" . $row['nguoitruccu'] . "</td>";
                            echo "<td>" . $row['lydo'] . "</td>";
                            echo "<td>" . $row['nguoiduyet'] . "</td>";
                            echo "<td>";
                            if (empty($row['lydo'])) {
                                echo "<a href='sua_lichtruc_canhan.php?user=" . $row['idpc'] . "'><button style='border: none; background: #faebd700; color: #26355D;'><ion-icon name='sync-outline'></ion-icon></button></a>";
                            } else {
                                echo ""; // Nếu có lý do thì không hiển thị nút chỉnh sửa
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include ("footer_nhanvien.php"); ?>






<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "Không có dữ liệu",
                "info": "Đang hiển thị _START_ đến _END_ của _TOTAL_ mục",
                "infoEmpty": "Đang hiển thị 0 đến 0 của 0 mục",
                "infoFiltered": "(đã lọc từ tổng số _MAX_ mục)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Hiển thị _MENU_ mục",
                "loadingRecords": "Đang tải...",
                "processing": "Đang xử lý...",
                "search": "Tìm kiếm:",
                "zeroRecords": "Không tìm thấy kết quả phù hợp",
                "paginate": {
                    "first": "Đầu",
                    "last": "Cuối",
                    "next": "Tiếp",
                    "previous": "Trước"
                },
                "aria": {
                    "sortAscending": ": sắp xếp tăng dần",
                    "sortDescending": ": sắp xếp giảm dần"
                },
                "searchPlaceholder": "Nhập từ khóa..."
            },
            "pageLength": 10,

        });
    });


</script>