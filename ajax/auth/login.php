<?php
require_once '../../system/core/database.php';
if (empty($_SESSION['username'])) {
  $username = isset($_POST['username']) ? $DB->real_escape_string(xss($_POST['username'])) : exit;
  $password = isset($_POST['password']) ? $DB->real_escape_string(xss($_POST['password'])) : exit;
  $check = $DB->fetch_assoc("SELECT * FROM `users` WHERE `username` = '{$username}'", 1);
  if (!valid_str_data($username)) {
    $msg = ['error' => 'Tên đăng nhập phải từ 6 đến 32 kí tự'];
  } else if (strlen($password) < 6) {
    $msg = ['error' => 'Mật khẩu phải có ít nhất 6 kí tự'];
  } else if (!$check) {
    $msg = ['error' => 'Tên đăng nhập không tồn tại, vui lòng đăng ký tài khoản'];
  } else if ($check['id'] && !dePassword($password, $check['password'])) {
    $msg = ['error' => 'Mật khẩu không chính xác, vui lòng thử lại'];
  } else {
    $_SESSION['username'] = $username;
    $msg = ['success' => 'Đăng nhập thành công, đang chuyển hướng'];
  }
  echo json_encode($msg);
  exit;
}