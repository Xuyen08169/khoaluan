<?php include ("header.php"); 
include("ketnoi.php");
?>
<style>

   
</style>
 

<!-- trang này chứa thông tin của nhân viên đăng nhập vào tài khoản của chính bản thân -->
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary" style=" font-size: 25px; padding-left: 335px; padding-top:15px;"> 
            NHÓM TỔ TRỰC THUỘC</h6>
            </div>
            
            <div style="padding-top: 15px; padding-left:15px;">
            <a href="them_nhomto.php" style="padding-top: 15px;"><button type="button" class="btn btn-primary" > Thêm mới </button> </a>
            <a href="QLCV.php" style="padding-top: 15px; padding-left: 15px;">
            <button type="button" class="btn btn-primary" style="background: #ff5302;font-size: 12px;border: none;"> Chức vụ </button> </a>

            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>id</th>
                            <th>Tên nhóm tổ </th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                    <?php
                    
                    include("ketnoi.php");
                    $sql="select * from nhomto";
                    $kq=mysqli_query($conn,$sql) or die ("Không thể xuất thông tin thiết bị ".mysqli_error());
                    while($row=mysqli_fetch_array($kq)){
            echo "<tr>";
            echo "<td>" . $row["idnhomto"] . "</td>";
            $usern = $row["idnhomto"]; // Gán dữ liệu cột username vào biến $usern

            echo "<td>" . $row["tento"] . "</td>";
           
            echo "<td  style=' font-size: 20px;'>
            <a href='sua_nhomto.php?user=$usern'><button style=' border: none;background: #faebd700; color: #26355D'><ion-icon name='pencil'></ion-icon></button></a>
            <a href='xoa_nhomto.php?user=$usern'><button style=' border: none;background: #faebd700; color: #26355D'><ion-icon name='trash'></button></ion-icon></a>
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