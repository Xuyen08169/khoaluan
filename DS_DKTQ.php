<?php include ("header.php"); 
include("ketnoi.php");
?>
<style>




    
</style>

<!-- trang này chứa thông tin của nhân viên đăng nhập vào tài khoản của chính bản thân -->
<link rel="stylesheet" href="text.css">
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"
                    style=" font-size: 25px; padding-left: 270px; padding-top:15px;">
                    DANH SÁCH ĐĂNG KÍ THAM QUAN ĐỀN THỜ</h6>
            </div>


            <div style="padding-top: 15px; padding-left:15px;">
                <a href="them_DK.php" style="padding-top: 15px;"><button type="button" class="btn btn-primary"> Thêm mới
                    </button> </a>


            </div>
            </a>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <!-- <th>id</th> -->
                            <th>Tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <!-- <th>Email</th> -->
                            <th>Tên đoàn</th>
                            <th>Ngày tham quan</th>
                            <th> Số lượng</th>

                            <!-- <th> Ghi chú</th> -->
                            <th> Trạng thái</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
include("ketnoi.php");
$sql = "SELECT * FROM dkthamquan";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin thiết bị " . mysqli_error($conn));

// Kiểm tra nếu có dữ liệu
if (mysqli_num_rows($kq) > 0) {
    while ($row = mysqli_fetch_array($kq)) {
        // Lấy dữ liệu từ hàng hiện tại
        $usern = $row["idtq"];
        $idtq = $row["idtq"];
        $trangthai = $row["trangthai"];

        echo "<tr>";
        echo "<td>" . $row["hoten"] . "</td>";
        echo "<td>" . $row["sdt"] . "</td>";
        echo "<td>" . $row["diachi"] . "</td>";
        echo "<td>" . $row["tendoan"] . "</td>";
        echo "<td>" . date('d/m/Y', strtotime($row["ngaythamquan"])) . "</td>";
        echo "<td>" . $row["soluong"] . "</td>";
        echo "<td>" . $trangthai . "</td>";
        
       echo "<td class='nut' style=' font-size: 20px;'>
                <a href='#' class='view-details' data-id='$usern'>
                    <button style='border: none;background: #faebd700; color: #26355D'>
                        <ion-icon name='eye-outline'></ion-icon>
                    </button>
                </a>";

        // Ẩn nút xác nhận nếu trạng thái là "Đã duyệt"
        if ($trangthai !== "đã duyệt") {
            echo "<a href='xacnhan.php?user=$usern&id=$idtq'>
                    <button style='border: none;background: #faebd700; color: #26355D'>
                      <ion-icon name='checkmark-circle-outline'></ion-icon>
                    </button>
                </a>";
        }

        echo "<a href='khongduyet.php?user=$usern&id=$idtq'>
                    <button style='border: none;background: #faebd700; color: #26355D'>
                      <ion-icon name='close-circle-outline'></ion-icon>
                    </button>
                </a>";

        echo "<a href='xoa_ds_thamquan.php?user=$usern'>
                    <button style='border: none;background: #faebd700; color: #26355D'>
                        <ion-icon name='trash'></ion-icon>
                    </button>
                </a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "Không có dữ liệu để hiển thị.";
}
?>


                    </tbody>
                </table>

            </div>

        </div>

    </div>

</div>

<!-- Modal -->


<div class="modal fade" id="eventDetailModal" tabindex="-1" role="dialog" aria-labelledby="eventDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventDetailModalLabel">Chi tiết danh sách tham quan</h5>
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
$(document).ready(function() {
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
//----POPUP-------------------------------------------------------

$(document).ready(function() {
    // Bắt sự kiện click vào nút xem chi tiết
    $('.view-details').on('click', function(e) {
        e.preventDefault(); // Ngăn không cho link điều hướng trang

        // Lấy ID của sự kiện từ thuộc tính data-id
        var eventId = $(this).data('id');

        // Gửi yêu cầu AJAX để lấy thông tin chi tiết
        $.ajax({
            url: 'HTthongtin_danhsach.php', // File PHP xử lý yêu cầu
            type: 'GET',
            data: {
                id: eventId
            },
            success: function(response) {
                // Hiển thị nội dung trả về trong modal
                $('#eventDetailModal .modal-body').html(response);
                // Hiển thị modal
                $('#eventDetailModal').modal('show');
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi (nếu có)
                alert('Đã xảy ra lỗi khi lấy dữ liệu.');
            }
        });
    });
});
// ----------end popup-----------------------------------------
</script>