<?php
include("admin/includes/database.php");
session_start();

$userId = $_SESSION['user_id']; // Lấy user_id từ session

$MyConn = new MyConnect();

// Truy vấn lịch sử mua hàng của người dùng


$query = "SELECT HD.MA_HD, HD.TONGTIEN AS HD_TONGTIEN, HD.TRANGTHAI, HD.NGAY_MUA, CT.MA_SP, CT.SOLUONG, CT.TONGTIEN AS CT_TONGTIEN 
          FROM hoadon HD 
          JOIN ct_hoadon CT ON HD.MA_HD = CT.MA_HD 
          WHERE HD.MA_KH = '$userId'";
$result = $MyConn->query($query);


?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhật Ký Mua Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }
        h2 {
            color: #555;
        }
        table {
            width: 80%;
            margin: 20px 0;
            border-collapse: collapse;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
            margin-top: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
    <h2>Nhật Ký Mua Hàng</h2>
    <table>
        <tr>
            <th>Mã Hóa Đơn</th>
            <th>Mã Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Tổng Tiền (Chi Tiết)</th>
            <th>Tổng Tiền (Hóa Đơn)</th>
            <th>Thời Gian Mua Hàng</th>
            <th>Trạng Thái</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['MA_HD']; ?></td>
            <td><?php echo $row['MA_SP']; ?></td>
            <td><?php echo $row['SOLUONG']; ?></td>
            <td><?php echo number_format($row['CT_TONGTIEN'], 0, ',', '.'); ?> VND</td>
            <td><?php echo number_format($row['HD_TONGTIEN'], 0, ',', '.'); ?> VND</td>
            <td><?php echo date('d/m/Y H:i', strtotime($row['NGAY_MUA'])); ?></td>
            <td><?php echo $row['TRANGTHAI']; ?></td>
        </tr>
    <?php endwhile; ?>
    </table>

    <a href="profile.php">Quay lại hồ sơ</a>
</body>
</html>
