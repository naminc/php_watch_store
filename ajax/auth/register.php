<?php
require_once '../../system/core/database.php';
if ($_POST && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repassword'])) {
  $email = xss(addslashes($_POST['email']));
  $username = xss(addslashes($_POST['username']));
  $password = xss(addslashes($_POST['password']));
  $repassword = xss(addslashes($_POST['repassword']));
  $md5Pass = md5($password);
  $ip = ip_address();
  $user_agent = $_SERVER['HTTP_USER_AGENT'];
  $check = $DB->fetch_assoc("SELECT * FROM `users` WHERE `username` = '{$username}'", 1);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = ['error' => 'Địa chỉ email không hợp lệ '];
  } else if ($DB->fetch_assoc("SELECT * FROM `users` WHERE `email` = '{$email}'", 1)) {
    $msg = ['error' => 'Email đã tồn tại, vui lòng chọn email khác'];
  } else if (strlen($username) < 6 || strlen($username) > 32 || strlen($password) < 6 || strlen($password) > 32) {
    $msg = ['error' => 'Độ dài tài khoản hoặc mật khẩu chưa đủ mạnh'];
  } else if ($check) {
    $msg = ['error' => 'Tài khoản đã tồn tại, vui lòng chọn tài khoản khác'];
  } else if ($username != $_POST['username']  || $password != $_POST['password'] && $email != $_POST['email']) {
    $msg = ['error' => 'Đã xảy ra lỗi, vui lòng thử lại'];
  } else if ($repassword != $password) {
    $msg = ['error' => 'Mật khẩu chưa trùng nhau, vui lòng thử lại'];
  } else {
    $DB->query("INSERT INTO `users`
    (`email`, `username`, `password`, `coin`, `coin_deposited`, `coin_used`, `role`, `ip_address`, `status`, `user_agent`, `created_at`, `updated_at`)
    VALUES 
    ('{$email}','{$username}','{$md5Pass}',0,0,0,'user','{$ip}',1,'{$user_agent}', NOW(), NOW())");
    $msg = ['success' => 'Đăng ký thành công, đang chuyển hướng'];
  }
  echo json_encode($msg);
  exit;
}