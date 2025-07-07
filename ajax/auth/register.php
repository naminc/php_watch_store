<?php
require_once '../../system/core/database.php';
if (empty($_SESSION['username'])) {
  $email = isset($_POST['email']) ? $DB->real_escape_string(xss($_POST['email'])) : exit;
  $username = isset($_POST['username']) ? $DB->real_escape_string(xss($_POST['username'])) : exit;
  $password = isset($_POST['password']) ? $DB->real_escape_string(xss($_POST['password'])) : exit;
  $hashedPassword = enPassword($password);
  $ip = ip_address();
  $user_agent = $_SERVER['HTTP_USER_AGENT'];
  $check = $DB->fetch_assoc("SELECT * FROM `users` WHERE `username` = '{$username}'", 1);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = ['error' => 'Địa chỉ email không hợp lệ, vui lòng thử lại'];
  } else if ($DB->fetch_assoc("SELECT * FROM `users` WHERE `email` = '{$email}'", 1)) {
    $msg = ['error' => 'Email đã tồn tại, vui lòng chọn email khác'];
  } else if (!valid_str_data($username)) {
    $msg = ['error' => 'Tên đăng nhập phải từ 6 đến 32 kí tự'];
  } else if (strlen($password) < 6) {
    $msg = ['error' => 'Mật khẩu phải có ít nhất 6 kí tự'];
  } else if ($check) {
    $msg = ['error' => 'Tên đăng nhập đã tồn tại, vui lòng chọn tài khoản khác'];
  } else if ($username != $_POST['username'] || $password != $_POST['password'] && $email != $_POST['email']) {
    $msg = ['error' => ERROR];
  } else {
    $DB->query("INSERT INTO `users`
    (`email`, `username`, `password`, `role`, `ip_address`, `status`, `user_agent`, `created_at`, `updated_at`)
    VALUES 
    ('{$email}','{$username}','{$hashedPassword}','user','{$ip}',1,'{$user_agent}', NOW(), NOW())");
    $msg = ['success' => 'Đăng ký thành công, đang chuyển hướng'];
  }
  echo json_encode($msg);
  exit;
}