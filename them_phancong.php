<?php
include ("header.php");
?>

<form enctype="multipart/form-data" action="xuly_them_phancong.php" name="themphancong" method="post">
    <link rel="stylesheet" href="lg.css">

    <div>
        <div class="table-center">
            <div class="btn-center">
                <div class="top-h4">
                    <h4 class="top-h4" style=" margin-left:80px;"> PHÂN CÔNG LỊCH TRỰC</h4>
                </div>
            </div>

            <div class="txt-gv-top">
                <div class="txt-gv-lb" style="display: none;">
                    <label>ID:</label>
                    <input type="text" name="idpc" readonly></input>
                </div>

                <div class="txt-gv-lb">
                    <label>Người trực:</label>
                    <select name="idnhanvien">
                        <?php
                        $sql = "SELECT idnhanvien, hoten FROM taikhoan WHERE quyen = 1";
                        $kq = mysqli_query($conn, $sql) or die("Không thể thêm : " . mysqli_error($conn));
                        while ($row = mysqli_fetch_assoc($kq)) {
                            $idnhanvien = $row['idnhanvien'];
                            $hoten = $row['hoten'];
                            echo "<option value=\"$idnhanvien\">$hoten</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- <div class="txt-gv-lb">
                    <label>Ngày trực:</label>
                    <select id="idtruc" name="idtruc">
                        <?php
                        //$sql = "SELECT idtruc, ngaytruc FROM lichtruc";
                        //$kq = mysqli_query($conn, $sql) or die("Không thể thêm: " . mysqli_error($conn));
                        //while ($row = mysqli_fetch_assoc($kq)) {
                        //$idtruc = $row['idtruc'];
                        //$ngaytruc = date('d/m/Y', strtotime($row['ngaytruc']));
                        //echo "<option value=\"$idtruc\">$ngaytruc</option>";
                        //}
                        ?>
                    </select>
                </div> -->



                <div class="#">
                    <label for="selectMonth">Chọn tháng:</label>
                    <select id="selectMonth" class="form-control" onchange="updateSelectOptions()">
                        <?php
                        // Mảng chứa tên các tháng bằng tiếng Việt
                        $months = array(
                            "01" => "Tháng 01",
                            "02" => "Tháng 02",
                            "03" => "Tháng 03",
                            "04" => "Tháng 04",
                            "05" => "Tháng 05",
                            "06" => "Tháng 06",
                            "07" => "Tháng 07",
                            "08" => "Tháng 08",
                            "09" => "Tháng 09",
                            "10" => "Tháng 10",
                            "11" => "Tháng 11",
                            "12" => "Tháng 12"
                        );

                        // Lặp qua mảng để tạo các option cho dropdown
                        foreach ($months as $monthValue => $monthName) {
                            echo "<option value=\"$monthValue\">$monthName</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="#">
                    <label for="selectYear">Chọn năm:</label>
                    <select id="selectYear" class="form-control" onchange="updateSelectOptions()">
                        <?php
                        // Lấy năm hiện tại và một số năm trước đó để tạo các option cho dropdown
                        $currentYear = date('Y');
                        for ($year = $currentYear; $year >= $currentYear - 5; $year--) {
                            echo "<option value=\"$year\">$year</option>";
                        }
                        ?>
                    </select>
                </div>


                <div class="#">
                    <label>Ngày trực:</label>
                    <select id="idtruc" name="idtruc" class="form-control" onchange="updateSuKien()">
                        <!-- Options sẽ được cập nhật bằng JavaScript -->
                    </select>
                </div>


                <div class="txt-gv-lb">
                    <label>Sự kiện:</label>
                    <input type="hidden" id="id_sukien" name="id_sukien"></input>
                    <input type="text" id="sukien" readonly></input>
                </div>

            </div>

            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QL_PHANCONG.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>

<?php
include ("footer.php");
?>

<script>
    function updateSuKien() {
        var idtruc = document.getElementById('idtruc').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'lay_su_kien.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById('sukien').value = response.tensukien;
                document.getElementById('id_sukien').value = response.id;
            }
        };

        xhr.send('idtruc=' + idtruc);
    }

    function updateSelectOptions() {
        var selectMonth = document.getElementById("selectMonth").value;
        var selectYear = document.getElementById("selectYear").value;

        // Gọi Ajax để lấy dữ liệu ngày trực cho tháng và năm đã chọn
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("idtruc").innerHTML = this.responseText;

                // Sau khi cập nhật options, gọi hàm updateSuKien() để cập nhật sự kiện
                updateSuKien();
            }
        };

        xmlhttp.open("GET", "get_ngaytruc.php?month=" + selectMonth + "&year=" + selectYear, true);
        xmlhttp.send();
    }

    // Khi trang được tải, cập nhật lần đầu tiên
    window.onload = function () {
        updateSelectOptions();
    };
</script>