<?php
include ("header_nhanvien.php");
include ("ketnoi.php");

// Bắt đầu session để sử dụng session variables
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Lấy idnhanvien từ session
$idnhanvien_dangnhap = $_SESSION['idnhanvien'];
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"
                    style=" font-size: 25px; padding-left: 270px; padding-top:15px;">
                    LỊCH TRỰC CÔNG TÁC TẠI ĐỀN THỜ</h6>
            </div>

            <div style="padding-top: 15px; padding-left:15px;">
                <a href="them_lich.php" style="padding-top: 15px;"><button type="button" class="btn btn-primary"> Thêm
                        lịch </button> </a>
            </div>


            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Người trực</th>
                            <th>Ngày trực</th>
                            <th> Sự kiện</th>

                            <th>Trạng thái</th>
                            <th>Người trực cũ</th>
                            <th>Lý do</th>
                            <th>Người duyệt</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Sử dụng idnhanvien từ session để lọc dữ liệu
                        $sql = "SELECT * FROM phancong WHERE idnhanvien='$idnhanvien_dangnhap'";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin thiết bị " . mysqli_error($conn));
                        while ($row = mysqli_fetch_array($kq)) {

                            $idnhanviens = $row["idnhanvien"];
                            $sql3 = "SELECT * FROM taikhoan WHERE idnhanvien='" . $idnhanviens . "'";
                            $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin " . mysqli_error($conn));
                            $taikhoan = mysqli_fetch_array($kq3);

                            $idtrucs = $row["idtruc"];
                            $sql3 = "SELECT * FROM lichtruc WHERE idtruc='" . $idtrucs . "'";
                            $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin " . mysqli_error($conn));
                            $lichtruc = mysqli_fetch_array($kq3);

                            $ids = $row["id"];//////////nếu không có khóa ngoại thì ko cần dùng đến
                            $sql5 = "SELECT * FROM sukien WHERE id='" . $ids . "'";
                            $kq5 = mysqli_query($conn, $sql5) or die("Không thể xuất thông tin " . mysqli_error());
                            $sukien = mysqli_fetch_array($kq5);

                            echo "<tr>";
                            // echo "<td>" . $row["idpc"] . "</td>";
                            $usern = $row["idpc"]; // Gán dữ liệu cột username vào biến $usern

                            echo "<td>" . $taikhoan["hoten"] . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($lichtruc["ngaytruc"])) . "</td>";
                          
                            if ($sukien !== null && isset($sukien["tensukien"])) {
                                echo "<td>" . $sukien["tensukien"] . "</td>";
                            } else {
                                echo "<td> Không có sự kiện nào hết </td>"; // Hoặc thông báo lỗi khác tùy ý của bạn
                            }
                
                
                            echo "<td>" . $row["trangthai"] . "</td>";
                            echo "<td>" . $row["nguoitruccu"] . "</td>";
                            echo "<td>" . $row["lydo"] . "</td>";
                            echo "<td>" . $row["nguoiduyet"] . "</td>";
                          
                            if (empty($row["lydo"])) {
                                echo "<td style=' font-size: 20px;'>
                                    <a href='sua_lichtruc_canhan.php?user=" . $row["id"] . "'><button style=' border: none;background: #faebd700; color: #26355D;'><ion-icon name='sync-outline'></ion-icon></button></a>
                                </td>";
                            } else {
                                echo "<td></td>"; // Nếu có lý do thì không hiển thị nút chỉnh sửa
                            }
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