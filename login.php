<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

</head>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var emailField = document.getElementById("email");
    var passwordField = document.getElementById("matkhau");
    var submitButton = document.getElementById("submitButton");
    var errorMessage = document.getElementById("error-message");
    var rememberMeCheckbox = document.getElementById("rememberMe");
    var rememberDetails = document.getElementById("rememberDetails");

    function validateForm() {
        var email = emailField.value.trim();
        var password = passwordField.value.trim();

        if (email === "" || password === "") {
            errorMessage.style.display = "block";
            return false;
        } else {
            errorMessage.style.display = "none";
            return true;
        }
    }

    function checkInputFields() {
        var email = emailField.value.trim();
        var password = passwordField.value.trim();

        if (email !== "" && password !== "") {
            submitButton.style.backgroundColor =
            "#102C57"; // Thay đổi màu của nút thành màu xanh lá khi đã nhập đủ
            submitButton.style.color = "white"; // Màu chữ của nút thành màu trắng
        } else {
            submitButton.style.backgroundColor = ""; // Quay lại màu mặc định
            submitButton.style.color = ""; // Màu chữ quay lại mặc định
        }
    }

    function toggleRememberDetails() {
        if (rememberMeCheckbox.checked) {
            rememberDetails.style.display = "block"; // Hiển thị ô nhập liệu thêm
        } else {
            rememberDetails.style.display = "none"; // Ẩn ô nhập liệu thêm
        }
    }

    emailField.addEventListener("input", checkInputFields);
    passwordField.addEventListener("input", checkInputFields);
    rememberMeCheckbox.addEventListener("change", toggleRememberDetails);

    document.getElementById("loginForm").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault(); // Ngăn chặn gửi form nếu email hoặc mật khẩu trống
        }
    });
});
</script>




<body>

    <div class="container-scrollere">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">

                            <div class="H1">

                                <H1></i>ĐĂNG NHẬP </H1>
                            </div>
                            <h4>Mời điền thông tin đăng nhập!</h4>
                            <form class="pt-3" method="post" action="xuly_login.php" id="loginForm">
                                <div class="form-group1">
                                    <input type="email" class="form-control form-control-lg" name="email" id="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group1">
                                    <input type="password" class="form-control form-control-lg" name="matkhau"
                                        id="matkhau" placeholder="Password">
                                </div>
                                <div class="mt3">
                                    <button type="submit" name="dn" id="submitButton"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Đăng
                                        nhập</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" id="rememberMe"> Nhớ mật
                                            khẩu
                                        </label>
                                    </div>
                                </div>
                                <div id="rememberDetails" style="display: none; margin-top: 10px;">
                                    <div class="form-group1">
                                        <label for="securityQuestion">Security Question:</label>
                                        <input type="text" class="form-control form-control-lg" name="securityQuestion"
                                            id="securityQuestion" placeholder="Your favorite pet's name">
                                    </div>
                                </div>
                                <div id="error-message" style="color: red; display: none;">Vui lòng nhập email và mật
                                    khẩu</div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->



</body>

</html>