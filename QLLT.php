<?php include ("header.php"); 
include("ketnoi.php");
?>


<!-- trang này chứa thông tin của nhân viên đăng nhập vào tài khoản của chính bản thân -->
<!-- <link rel="stylesheet" href="lg.css"> -->
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary" style=" font-size: 25px; padding-left: 270px; padding-top:15px;"> 
                    LỊCH TRỰC CÔNG TÁC TẠI ĐỀN THỜ</h6>
            </div>

            <div style="padding-top: 15px; padding-left:15px;">
            <a href="them_lich.php" style="padding-top: 15px;"><button type="button" class="btn btn-primary" > Thêm lịch </button> </a>

      

            </div>
            
           
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>id</th>
                            <th>Ngày trực</th>
                            <th> Sự kiện</th>
                            
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                   
                    <tbody>

					<?php



// Sử dụng trong mã HTML


                    
                    include("ketnoi.php");
                    $sql="select * from lichtruc";
                    $kq=mysqli_query($conn,$sql) or die ("Không thể xuất thông tin thiết bị ".mysqli_error());
                    while($row=mysqli_fetch_array($kq))
                    {

                        $ids = $row["id"];//////////nếu không có khóa ngoại thì ko cần dùng đến
                        $sql3 = "SELECT * FROM sukien WHERE id='" . $ids . "'";
                        $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin " . mysqli_error());
                        $sukien = mysqli_fetch_array($kq3);


                
                        // $idnhanviens = $row["idnhanvien"];//////////nếu không có khóa ngoại thì ko cần dùng đến
                        // $sql4 = "SELECT * FROM taikhoan WHERE idnhanvien='" . $idnhanviens . "'";
                        // $kq4 = mysqli_query($conn, $sql4) or die("Không thể xuất thông tin " . mysqli_error());
                        // $taikhoan = mysqli_fetch_array($kq4);





            echo "<tr>";
            echo "<td>" . $row["idtruc"] . "</td>";
            $usern = $row["idtruc"]; // Gán dữ liệu cột username vào biến $usern
            echo "<td>" . date('d/m/Y', strtotime($row["ngaytruc"])) . "</td>";

            if ($sukien !== null && isset($sukien["tensukien"])) {
                echo "<td>" . $sukien["tensukien"] . "</td>";
            } else {
                echo "<td> Không có sự kiện nào hết </td>"; // Hoặc thông báo lỗi khác tùy ý của bạn
            }
            
            // echo "<td> " . $taikhoan["hoten"] . "</td>";
			
            echo "<td  style=' font-size: 20px;'>
                    <a href='sua_lich.php?user=$usern'><button style=' border: none;background: #faebd700; color: #26355D'><ion-icon name='pencil'></ion-icon></button></a>
                    <a href='xoa_lich.php?user=$usern'><button style=' border: none;background: #faebd700; color: #26355D'><ion-icon name='trash'></button></ion-icon></a>
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
				"searchPlaceholder": "Nhập từ khóa..."
			},
			"pageLength": 10,
			
		});
	});


</script>