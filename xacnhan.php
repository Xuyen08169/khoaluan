<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Đường dẫn đến file autoload.php của Composer

// Kết nối cơ sở dữ liệu
include("ketnoi.php");

header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');

$usern = $_GET['user'];
$idtq = $_GET['id'];

// Cập nhật trạng thái thành "đã duyệt"
$sql = "UPDATE dkthamquan SET trangthai='đã duyệt' WHERE idtq='$idtq'";

if ($conn->query($sql) === TRUE) {
    echo "Cập nhật thành công.";

    // Lấy thông tin email để gửi
    $result = $conn->query("SELECT hoten, email, tendoan, ngaythamquan, soluong FROM dkthamquan WHERE idtq='$idtq'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hoten = $row['hoten'];
        $email = $row['email'];
        $tendoan = $row['tendoan'];
        $ngaythamquan = date('d/m/Y', strtotime($row['ngaythamquan']));
        $soluong = $row['soluong'];

        // Nội dung email
        $subject = 'Xác nhận tham quan';
        $body = "
        <p>Xin chào, $hoten,</p>
        <p>Bạn đã đăng kí thành công tham quan khu di tích.</p>
        <p><strong>Tên đoàn:</strong> $tendoan</p>
        <p><strong>Ngày tham quan:</strong> $ngaythamquan</p>
        <p><strong>Số lượng người tham gia:</strong> $soluong</p>
        <p>Cảm ơn bạn đã đăng kí!</p>";

        // Gửi email xác nhận
        $mail = new PHPMailer(true);

        try {
            // Cấu hình server SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Sử dụng máy chủ SMTP của Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'hihilife22@gmail.com'; // Địa chỉ email của bạn
            $mail->Password = 'rokv wtvz tlhw qtmd'; // Mật khẩu ứng dụng của bạn
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Sử dụng SSL
            $mail->Port = 465; // Cổng cho SSL

            // Vô hiệu hóa xác thực chứng chỉ SSL
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            // Đảm bảo mã hóa UTF-8 cho tiêu đề và người gửi
            $mail->CharSet = 'UTF-8';

            // Cấu hình chi tiết email
            $mail->setFrom('hihilife22@gmail.com', 'BQL KHU DI TÍCH');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();
            echo 'Email xác nhận đã được gửi.';
        } catch (Exception $e) {
            echo "Email không thể gửi được. Lỗi: {$mail->ErrorInfo}";
        }
    } else {
        echo "Không tìm thấy địa chỉ email.";
    }
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
