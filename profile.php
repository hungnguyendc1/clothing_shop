<?php
include("admin/includes/database.php");

session_start();
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Kết nối tới cơ sở dữ liệu
    $MyConn = new MyConnect();

    // Truy vấn thông tin người dùng
    $query = "SELECT * FROM KH WHERE MA_KH = $userId";
    $result = $MyConn->query($query);

    if (!$result) {
        die("Truy vấn thất bại: " . $MyConn->error());
    }

    // Kiểm tra xem có dữ liệu trả về không
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy thông tin người dùng!";
        exit;
    }
} else {
    echo "Vui lòng đăng nhập để xem hồ sơ.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    
    <title>Hồ Sơ Người Dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-top: 20px;
        }
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        td:first-child {
            font-weight: bold;
            color: #555;
            width: 30%;
        }
        a {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            font-size: 14px;
        }
        a:hover {
            background-color: #0056b3;
        }
        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #ddd;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <!-- Hiển thị ảnh đại diện nếu có -->
        <?php if (!empty($user['AVATAR'])): ?>
            <img src="<?php echo htmlspecialchars($user['AVATAR']); ?>" alt="Ảnh đại diện" class="profile-img">
        <?php else: ?>
            <img src="default-avatar.png" alt="Ảnh đại diện" class="profile-img"> <!-- ảnh mặc định nếu không có ảnh -->
        <?php endif; ?>

        <h2><?php echo htmlspecialchars($user['TEN_KH']); ?></h2>
        <table>
            <tr>
                <td>Họ Tên:</td>
                <td><?php echo htmlspecialchars($user['TEN_KH']); ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo htmlspecialchars($user['EMAIL']); ?></td>
            </tr>
            <tr>
                <td>Số Điện Thoại:</td>
                <td><?php echo htmlspecialchars($user['DIENTHOAI']); ?></td>
            </tr>
            <tr>
                <td>Địa Chỉ:</td>
                <td><?php echo htmlspecialchars($user['DIACHI']); ?></td>
            </tr>
        </table>
        <a href="edit_profile.php">Chỉnh sửa hồ sơ</a>
    </div>
    
</body>
</html>
