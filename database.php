<?php
class MyConnect {
    public $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "TEN_KH", "MATKHAU", "clothingshop");

        // Kiểm tra kết nối
        if ($this->conn->connect_error) {
            die("Kết nối cơ sở dữ liệu thất bại: " . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function error() {
        return $this->conn->error;
    }

    public function close() {
        $this->conn->close();
    }
}
?>
