<?php
include ("header_nhanvien.php");
include ("ketnoi.php");

// Xử lý lấy tháng và năm từ dropdown nếu được chọn
$thang = isset($_GET['thang']) ? $_GET['thang'] : date('m');
$nam = isset($_GET['nam']) ? $_GET['nam'] : date('Y');

// Truy vấn SQL để lấy thông tin cần thiết với điều kiện lọc theo tháng và năm
$sql = "
SELECT 
    phancong.idpc,
    lichtruc.ngaytruc,
    IFNULL(sukien.tensukien, 'Không có sự kiện') AS tensukien,
    taikhoan.hoten AS nguoitrc
FROM 
    phancong
JOIN 
    lichtruc ON phancong.idtruc = lichtruc.idtruc
LEFT JOIN 
    sukien ON phancong.id = sukien.id
JOIN 
    taikhoan ON phancong.idnhanvien = taikhoan.idnhanvien
WHERE 
    MONTH(lichtruc.ngaytruc) = $thang
    AND YEAR(lichtruc.ngaytruc) = $nam
";
$kq = mysqli_query($conn, $sql) or die("Không thể truy vấn: " . mysqli_error($conn));
?>

<!-- trang này chứa thông tin của nhân viên đăng nhập vào tài khoản của chính bản thân -->
<!-- <link rel="stylesheet" href="lg.css"> -->
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"
                    style="font-size: 25px; padding-left: 270px; padding-top: 15px;">
                    LỊCH TRỰC CÔNG TÁC TẠI ĐỀN THỜ</h6>
            </div>

            <div class="card-body">
                <form class="form-inline mb-3" style="margin-bottom:25px !important;">
                    <label class="mr-2">Chọn tháng:</label>
                    <select class="form-control mr-2" id="thang" name="thang">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            $selected = ($i == $thang) ? 'selected' : '';
                            echo "<option value='$i' $selected>$i</option>";
                        }
                        ?>
                    </select>
                    <label class="mr-2">Chọn năm:</label>
                    <select class="form-control mr-2" id="nam" name="nam">
                        <?php
                        $currentYear = date('Y');
                        for ($i = $currentYear; $i >= $currentYear - 10; $i--) {
                            $selected = ($i == $nam) ? 'selected' : '';
                            echo "<option value='$i' $selected>$i</option>";
                        }
                        ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Lọc</button>
                </form>

                <!-- Bảng hiển thị thông tin lịch trực -->
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Ngày trực</th>
                            <th>Sự kiện</th>
                            <th>Người trực</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Lặp qua kết quả truy vấn và hiển thị từng dòng dữ liệu
                        while ($row = mysqli_fetch_assoc($kq)) {
                            echo "<tr>";
                            echo "<td>" . $row['idpc'] . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($row['ngaytruc'])) . "</td>";
                            echo "<td>" . $row['tensukien'] . "</td>";
                            echo "<td>" . $row['nguoitrc'] . "</td>";
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