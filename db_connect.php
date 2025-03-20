<?php
$servername = "localhost";
$username = "root"; // Tài khoản mặc định trong XAMPP
$password = ""; // Mặc định không có mật khẩu
$dbname = "test1"; // Đổi thành tên database của bạn

// Kết nối đến MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
