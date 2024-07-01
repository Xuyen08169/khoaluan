<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration Form</title>
    <style>
        body {
            background: #c3cfe8;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            max-width: 800px;
            margin: 46px 255px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form1 {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .form-column {
            display: flex;
            flex-direction: column;
            width: 48%;
        }

        label {
            margin-top: 10px;
        }

        input,
        textarea,
        button {
            padding: 8px;
            margin-top: 5px;
            border-radius: 6px;
            background-color: #f1f1f1f2;
            border: 1px solid #22173c87;
        }

        .button {
            margin: 10px auto;
            width: 100px;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .button.register {
            background: #d30505;
        }

        .button.print {
            background: #FF8F00;
        }

        .button.reset {
            background: #26355d;
        }

        .button.thoat {
            background: #45474B;
        }

        .button:hover {
            background: #003285;
        }

        .button:disabled {
            background: #45474B;
            cursor: not-allowed;
        }

        .btu {
            display: flex;
            justify-content: center;
            gap: 18px;
        }
    </style>
    <script>
        function confirmRegistration() {
            if (confirm("Bạn có muốn đăng kí không?")) {
                document.getElementById("registrationForm").submit();
            }
        }

        function printForm() {
            window.print();
        }

        function resetForm() {
            document.getElementById("registrationForm").reset();
            document.getElementById("agreeCheckbox").checked = false;
            document.getElementById("registerButton").disabled = true;
        }

        function toggleSubmitButton() {
            const checkbox = document.getElementById("agreeCheckbox");
            const button = document.getElementById("registerButton");
            button.disabled = !checkbox.checked;
        }

        function validateForm() {
            const fields = ["hoten", "sodienthoai", "diachi", "email", "tendoan", "ngaythamquan", "soluong"];
            for (let field of fields) {
                if (!document.getElementById(field).value) {
                    alert("Tất cả các trường phải được điền đầy đủ.");
                    return false;
                }
            }
            confirmRegistration();
        }

        
    </script>
</head>

<body>
    <div class="container">
        <h4 style="text-align: center; font-size: 25px; color: #ff6331;">Phiếu Đăng Kí </br>Tham Quan Khu Di Tích Đền Thờ Bác Trà Vinh</h4>
        <form id="registrationForm" enctype="multipart/form-data" action="xuly_dkthamquan.php" name="sukien" method="post">
            <div class="form1">
                <div class="form-column">
                    <label for="hoten">Họ tên:</label>
                    <input type="text" id="hoten" name="hoten" required>

                    <label for="sodienthoai">Số điện thoại:</label>
                    <input type="number" id="sodienthoai" name="sdt" pattern="[0-9]{10}" required>

                    <label for="diachi">Địa chỉ:</label>
                    <input type="text" id="diachi" name="diachi" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-column">
                    <label for="tendoan">Tên đoàn tham quan:</label>
                    <input type="text" id="tendoan" name="tendoan" required>

                    <label for="ngaythamquan">Ngày tham quan:</label>
                    <input type="date" id="ngaythamquan" name="ngaythamquan" required>

                    <label for="soluong">Số lượng người:</label>
                    <input type="number" id="soluong" name="soluong" min="1" required>

                    <label for="ghichu">Ghi chú:</label>
                    <textarea id="ghichu" name="ghichu"></textarea>

                    <label>
                        <input type="checkbox" id="agreeCheckbox" onchange="toggleSubmitButton()"> Xác định đăng kí.
                    </label>
                </div>
            </div>
            <div class="btu">
                <button type="button" id="registerButton" class="button register" onclick="validateForm()" disabled>Đăng
                    kí</button>
                <button type="button" class="button print" onclick="printForm()">In phiếu</button>
                <button type="button" class="button reset" onclick="resetForm()">Hủy</button>
                <a href="trangchinh\sukienmoi.php" style=" text-align:center"><button type="button"
                        class="button thoat">Thoát</button></a>
            </div>
        </form>
    </div>
</body>

</html>
