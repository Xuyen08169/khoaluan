<?php include ("header.php"); 
include("ketnoi.php");
?>


<!-- trang này chứa thông tin của nhân viên đăng nhập vào tài khoản của chính bản thân -->
<link rel="stylesheet" href="text.css">
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"
                    style=" font-size: 25px; padding-left: 270px; padding-top:15px;">
                    QUẢN LÝ CÁC BÀI TIN TỨC</h6>
            </div>

          

               
            <div style="padding-top: 15px; padding-left:15px;">
            <a href="them_tintuc.php" style="padding-top: 15px;"><button type="button" class="btn btn-primary" > Thêm mới </button> </a>


            </div>
            </a>




            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <!-- <th>id</th> -->
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Ngày đăng</th>
                            <th> Người đăng</th>
                            <th> Nổi bật</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php


function truncateString($string, $limit = 10) {
    if (mb_strlen($string) > $limit) {
        return mb_substr($string, 0, $limit) . '...';
    } else {
        return $string;
    }
}

// Sử dụng trong mã HTML


                    
                    include("ketnoi.php");
                    $sql="select * from tintuc";
                    $kq=mysqli_query($conn,$sql) or die ("Không thể xuất thông tin thiết bị ".mysqli_error());
                    while($row=mysqli_fetch_array($kq))
                    {

                        $taikhoans = $row["idnhanvien"];//////////nếu không có khóa ngoại thì ko cần dùng đến
                        $sql3 = "SELECT * FROM taikhoan WHERE idnhanvien='" . $taikhoans . "'";
                        $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin " . mysqli_error());
                        $taikhoan = mysqli_fetch_array($kq3);

            echo "<tr>";
            // echo "<td>" . $row["idtintuc"] . "</td>";
            $usern = $row["idtintuc"]; // Gán dữ liệu cột username vào biến $usern
            
            echo "<td>" . $row["tieude"] . "</td>";
          
            echo "<td>" . htmlspecialchars(truncateString($row["noidung"])) . "</td>";
            echo "<td>" . date('d/m/Y', strtotime($row["ngaydang"])) . "</td>";

            echo "<td> " . $taikhoan["hoten"] . "</td>";
            echo "<td>" . $row["noibat"] . "</td>";
          
        
            echo "<td  style=' font-size: 20px;'>
            <a href='#' class='view-details' data-id='$usern'><button style=' border: none;background: #faebd700; color: #26355D;'><ion-icon name='eye-outline'></ion-icon></button></a>
            <a href='sua_tintuc.php?user=$usern'><button style=' border: none;background: #faebd700; color: #26355D'><ion-icon name='pencil'></ion-icon></button></a>
            <a href='xoa_tintuc.php?user=$usern'><button style=' border: none;background: #faebd700; color: #26355D'><ion-icon name='trash'></button></ion-icon></a>
                
                   
                    
                </td>";
            echo "</tr>";
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
                <h5 class="modal-title" id="eventDetailModalLabel">Chi Tiết Bài Tin Tức</h5>
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
            url: 'HTthongtin_tintuc.php', // File PHP xử lý yêu cầu
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