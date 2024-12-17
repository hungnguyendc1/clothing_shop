<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Vui lòng đăng nhập trước!");
}

include("admin/includes/database.php");

// Kết nối tới cơ sở dữ liệu
$MyConn = new MyConnect();

// Lấy user_id từ session
$userId = $_SESSION['user_id'];

// Truy vấn thông tin người dùng
$query = "SELECT * FROM KH WHERE MA_KH = $userId";
$result = $MyConn->query($query);

if (!$result) {
    die("Truy vấn thất bại: " . $MyConn->error());
}

// Kiểm tra và lấy thông tin người dùng
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Không tìm thấy thông tin người dùng!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Hồ Sơ</title>
    <style>
        /* CSS cải tiến */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            width: 100%;
            max-width: 500px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        input[type="file"]:focus {
            border-color: #007BFF;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .form-group:last-child {
            margin-bottom: 0;
        }
        small {
            display: block;
            margin-top: 5px;
            color: #999;
            font-size: 12px;
        }
        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Chỉnh Sửa Hồ Sơ</h2>
        <form action="process_profile.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['TEN_KH']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['EMAIL']); ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" value="<?php echo htmlspecialchars($user['DIENTHOAI']); ?>" required>
                <small>Ví dụ: 0123456789</small>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['DIACHI']); ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Ảnh đại diện:</label>
                <!-- Hiển thị ảnh đại diện nếu tồn tại -->
                <?php if (!empty($user['AVATAR'])): ?>
                    <div style="text-align: center; margin-bottom: 10px;">
                        <img src="<?php echo htmlspecialchars($user['AVATAR']); ?>" alt="Ảnh đại diện">
                    </div>
                <?php endif; ?>
                <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg">
                <small>Chỉ chấp nhận định dạng PNG, JPG, JPEG.</small>
            </div>
            
            <button type="submit">Lưu</button>
        </form>
    </div>
</body>
</html>
