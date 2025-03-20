<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .navbar {
            background-color: #222;
            padding: 10px;
            color: white;
            text-align: left;
        }
        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }
        .container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Trang Chủ</a>
        <a href="student_list.html">Sinh Viên</a>
        <a href="course_list.html">Học Phần</a>
        <a href="register.html">Đăng Ký</a>
        <a href="login.html">Đăng Nhập</a>
    </div>
    <div class="container">
        <h2>Thêm Sinh Viên</h2>
        <form action="process_student.php" method="POST" enctype="multipart/form-data">
            <label for="MaSV">Mã SV:</label>
            <input type="text" id="MaSV" name="MaSV" required>
            
            <label for="HoTen">Họ Tên:</label>
            <input type="text" id="HoTen" name="HoTen" required>
            
            <label for="GioiTinh">Giới Tính:</label>
            <input type="text" id="GioiTinh" name="GioiTinh">
            
            <label for="NgaySinh">Ngày Sinh:</label>
            <input type="date" id="NgaySinh" name="NgaySinh">
            
            <label for="Hinh">Hình:</label>
            <input type="file" id="Hinh" name="Hinh">
            
            <label for="MaNganh">Mã Ngành:</label>
            <input type="text" id="MaNganh" name="MaNganh">
            
            <button type="submit">Thêm</button>
        </form>
        <a href="index.php">Quay lại</a>
    </div>
</body>
</html>

<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $maSV = $_POST['MaSV'];
    $hoTen = $_POST['HoTen'];
    $gioiTinh = $_POST['GioiTinh'];
    $ngaySinh = $_POST['NgaySinh'];
    
    // Xử lý upload file ảnh
    $targetDir = "images/";
    $fileName = basename($_FILES['Hinh']['name']);
    $targetFilePath = $targetDir . $fileName;
    move_uploaded_file($_FILES['Hinh']['tmp_name'], $targetFilePath);
    
    $maNganh = $_POST['MaNganh'];
    
    // Kiểm tra xem Mã SV đã tồn tại chưa
    $checkSql = "SELECT MaSV FROM sinhvien WHERE MaSV = '$maSV'";
    $result = $conn->query($checkSql);
    if ($result->num_rows > 0) {
        echo "<script>alert('Mã sinh viên đã tồn tại!'); window.history.back();</script>";
    } else {
        $sql = "INSERT INTO sinhvien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                VALUES ('$maSV', '$hoTen', '$gioiTinh', '$ngaySinh', '$fileName', '$maNganh')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
}
?>
