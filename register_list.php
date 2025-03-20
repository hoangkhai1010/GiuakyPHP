<?php
include 'db_connect.php';

$sql = "SELECT * FROM hocphan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách học phần</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        .container { width: 80%; margin: auto; background: white; padding: 20px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background-color: #007bff; color: white; }
        .register-btn { background: #28a745; color: white; padding: 5px 10px; text-decoration: none; border-radius: 5px; }
        .register-btn:hover { background: #218838; }
    </style>
</head>
<body>
    <div class="container">
        <h2>DANH SÁCH HỌC PHẦN</h2>
        <table>
            <tr>
                <th>Mã Học Phần</th>
                <th>Tên Học Phần</th>
                <th>Số Tín Chỉ</th>
                <th>Đăng Ký</th>
            </tr>
            
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['MaHP']}</td>
                        <td>{$row['TenHP']}</td>
                        <td>{$row['SoTinChi']}</td>
                        <td><a href='register_course.php?id={$row['MaHP']}' class='register-btn'>Đăng Ký</a></td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Không có học phần nào</td></tr>";
            }
            ?>
        </table>
        <br>
        <a href="register_list.php">Xem danh sách học phần đã đăng ký</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>