<?php
session_start();
include("admin/includes/database.php");
if (isset($_POST['login'])) {
    $MyConn = new MyConnect();

    $email = mysqli_real_escape_string($MyConn->getConn(), $_POST['email']);
    $pass = mysqli_real_escape_string($MyConn->getConn(), $_POST['passwd']);

    $query = "SELECT MA_KH, TRANGTHAI FROM KH WHERE EMAIL='$email' AND MATKHAU='$pass'";

    $execute = $MyConn->query($query);

    $row = mysqli_fetch_array($execute);

    if ($row === null) { // Check if no data was fetched
        echo "<script>alert('Địa Chỉ Email Hoặc Mật Khẩu Không Đúng')</script>";
        echo "<script>window.history.back();</script>";
        die();
    }

    $result = count($row);

    $userID = $row['MA_KH'];

    if ($row['TRANGTHAI'] == "LOCKED") {

        echo "<script>alert('Tài khoản của bạn hiện bị tạm khóa.')</script>";

        echo "<script>window.history.back();</script>";

        die();
    }

    if ($result != 0) {
        $_SESSION['user_id'] = $userID;


        $_SESSION['user_email'] = $email;

        echo "<script>window.history.back();</script>";
    }
}
