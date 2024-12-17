<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    die("Vui lòng đăng nhập trước!");
}

$userId = $_SESSION['user_id'];

// Kết nối cơ sở dữ liệu
$MyConn = new mysqli("localhost", "root", "", "clothingshop");

// Kiểm tra kết nối
if ($MyConn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $MyConn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));

    // Kiểm tra dữ liệu nhập vào
    if (empty($name) || empty($email) || empty($phone)) {
        die("Vui lòng điền đầy đủ thông tin.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Email không hợp lệ.");
    }
    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        die("Số điện thoại không hợp lệ.");
    }

    // Xử lý ảnh đại diện
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/avatars/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Tạo thư mục nếu chưa tồn tại
        }

        $fileName = uniqid() . '-' . basename($_FILES['image']['name']);
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $targetFilePath = $uploadDir . $fileName;

        // Kiểm tra định dạng file (phần mở rộng)
        $allowedExtensions = ['png', 'jpg', 'jpeg'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            die("Định dạng file không hợp lệ. Chỉ chấp nhận PNG, JPG, JPEG.");
        }
        if (!move_uploaded_file($fileTmpPath, $targetFilePath)) {
            die("Không thể tải ảnh lên.");
        }

        $imagePath = $targetFilePath; // Lưu đường dẫn ảnh mới
    }

    // Nếu không tải ảnh mới, giữ nguyên ảnh cũ
    if (empty($imagePath)) {
        $query = "SELECT AVATAR FROM KH WHERE MA_KH = ?";
        $stmt = $MyConn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($currentAvatar);
        $stmt->fetch();
        $stmt->close();

        $imagePath = $currentAvatar; // Giữ nguyên đường dẫn ảnh cũ
    }

    // Cập nhật thông tin người dùng
    $query = "UPDATE KH SET TEN_KH = ?, EMAIL = ?, DIENTHOAI = ?, AVATAR = ? WHERE MA_KH = ?";
    $stmt = $MyConn->prepare($query);
    $stmt->bind_param("ssssi", $name, $email, $phone, $imagePath, $userId);

    if ($stmt->execute()) {
        echo "Cập nhật thành công!";
    } else {
        echo "Cập nhật thất bại!";
    }

    $stmt->close();
}

$MyConn->close();
?>
