<?php include ("header.php");
include ("ketnoi.php");
?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- trang này chứa thông tin của nhân viên đăng nhập vào tài khoản của chính bản thân -->
<link rel="stylesheet" href="text.css">
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"
                    style=" font-size: 25px; padding-left: 270px; padding-top:15px;">
                    QUẢN LÝ PHÂN CÔNG - HOÁN CHUYỂN CA TRỰC</h6>
            </div>

            <div style="padding-top: 15px; padding-left:15px;">
                <a href="them_phancong.php" style="padding-top: 15px;"><button type="button" class="btn btn-primary">
                        Thêm mới </button> </a>
            </div>

            <div style="padding-top: 15px; padding-left:15px;">
                <label for="filterStatus">Lọc theo trạng thái:</label>
                <select class="#" id="filterStatus">
                    <option value="">Tất cả</option>
                    <option value="Chờ duyệt">Chờ duyệt</option>
                    <option value="Không duyệt hoán đổi">Không duyệt hoán đổi</option>
                    <option value="Đã duyệt hoán đổi">Đã duyệt hoán đổi</option>
                </select>
                <button type="button" class="btn btn-primary" id="applyFilter">Áp dụng</button>
            </div>


            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <!-- <th> ID</th> -->
                            <th> Nhân viên trực</th>
                            <th> Ngày trực</th>
                            <!-- <th> Sự kiện </th> -->
                            <th> Trạng thái </th>
                            <th>Người trực cũ</th>
                            <th> Lý do</th>

                            <th> Người duyệt</th>
                            <th> Ngày duyệt</th>

                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        $sql = "select * from phancong";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin thiết bị " . mysqli_error());
                        while ($row = mysqli_fetch_array($kq)) {

                            $idnhanviens = $row["idnhanvien"];//////////nếu không có khóa ngoại thì ko cần dùng đến
                            $sql1 = "SELECT * FROM taikhoan WHERE idnhanvien='" . $idnhanviens . "'";
                            $kq1 = mysqli_query($conn, $sql1) or die("Không thể xuất thông tin " . mysqli_error());
                            $taikhoan = mysqli_fetch_array($kq1);

                            $idtrucs = $row["idtruc"];//////////nếu không có khóa ngoại thì ko cần dùng đến
                            $sql2 = "SELECT * FROM lichtruc WHERE idtruc='" . $idtrucs . "'";
                            $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin " . mysqli_error());
                            $lichtruc = mysqli_fetch_array($kq2);

                            $ids = $row["id"];//////////nếu không có khóa ngoại thì ko cần dùng đến
                            $sql3 = "SELECT * FROM sukien WHERE id='" . $ids . "'";
                            $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin " . mysqli_error());
                            $sukien = mysqli_fetch_array($kq3);


                            echo "<tr>";
                            // echo "<td>" . $row["idpc"] . "</td>";
                            $usern = $row["idpc"]; // Gán dữ liệu cột username vào biến $usern
                        
                            // -----------------------------------------
                        
                            echo "<td> " . $taikhoan["hoten"] . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($lichtruc["ngaytruc"])) . "</td>";
                            // echo "<td> " . $sukien["tensukien"] . "</td>";
                        
                            // ----------------------------------------
                        
                            echo "<td";
                            switch ($row["trangthai"]) {
                                case 'Chờ duyệt':
                                    echo " style='color: blue; font-weight:600'";
                                    break;
                                case 'Không duyệt hoán đổi':
                                    echo " style='color: red; font-weight:600'";
                                    break;
                                case 'Đã duyệt hoán đổi':
                                    echo " style='color: green; font-weight:600'";
                                    break;
                                default:
                                    // Nếu không khớp với bất kỳ trường hợp nào thì không áp dụng style
                                    break;
                            }
                            echo ">" . $row["trangthai"] . "</td>";


                            echo "<td>" . $row["nguoitruccu"] . "</td>";
                            echo "<td>" . $row["lydo"] . "</td>";
                            echo "<td>" . $row["nguoiduyet"] . "</td>";

                            echo "<td>";
                            if (!is_null($row["ngayduyet"])) {
                                echo date('d/m/Y', strtotime($row["ngayduyet"]));
                            }
                            echo "</td>";




                            echo "<td class='nut' style=' font-size: 20px;'>
                    <a href='sua_phancong.php?user=$usern'><button style=' border: none;background: #faebd700; color: #26355D'><i class='bi bi-browser-edge'></i></button></a>
                   <a href='#' class='view-details' data-id='$usern'><button style=' border: none;background: #faebd700; color: #26355D'><ion-icon name='eye-outline'></ion-icon></button></a>
                    <a href='xoa_phancong.php?user=$usern'><button style=' border: none;background: #faebd700; color: #26355D'><ion-icon name='trash'></ion-icon></button></a>
                    
                  
                </td>";
                            echo "</tr>";
                        }
                        ?>
                        <!-- <a href='hienthi_thongtin.php?user=$usern'><button><ion-icon name='eye-outline'></ion-icon></button></a> -->

                    </tbody>
                </table>

                <!-- <a href=".php"><button type="button" class="btn btn-primary"> Thoát </button> </a>
            -->

            </div>
        </div>
    </div>
</div>

<!-- Modal -->


<div class="modal fade" id="eventDetailModal" tabindex="-1" role="dialog" aria-labelledby="eventDetailModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventDetailModalLabel">Chi tiết phân công</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nội dung modal sẽ được điền bởi JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->






<?php include ("footer.php"); ?>
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
                "searchPlaceholder": "Tìm kiếm..."
            },
            "pageLength": 10,

        });
    });

    //----POPUP-------------------------------------------------------

    $(document).ready(function () {
        // Bắt sự kiện click vào nút xem chi tiết
        $('.view-details').on('click', function (e) {
            e.preventDefault(); // Ngăn không cho link điều hướng trang

            // Lấy ID của sự kiện từ thuộc tính data-id
            var eventId = $(this).data('id');

            // Gửi yêu cầu AJAX để lấy thông tin chi tiết
            $.ajax({
                url: 'HTthongtin_phancong.php', // File PHP xử lý yêu cầu
                type: 'GET',
                data: { id: eventId },
                success: function (response) {
                    // Hiển thị nội dung trả về trong modal
                    $('#eventDetailModal .modal-body').html(response);
                    // Hiển thị modal
                    $('#eventDetailModal').modal('show');
                },
                error: function (xhr, status, error) {
                    // Xử lý lỗi (nếu có)
                    alert('Đã xảy ra lỗi khi lấy dữ liệu.');
                }
            });
        });
    });
    // ----------end popup-----------------------------------------

    $('#applyFilter').on('click', function () {
            var filterValue = $('#filterStatus').val(); // Lấy giá trị lọc từ dropdown

            // Lọc và hiển thị lại các hàng trong bảng
            $('#dataTable').DataTable().columns(2).search(filterValue).draw();
        });




</script>