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
        }
        .container {
            width: 50%;
            margin: auto;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thêm Sinh Viên</h2>
        <form action="process_student.php" method="POST">
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
