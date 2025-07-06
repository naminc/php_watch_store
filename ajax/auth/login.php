<?php
require_once '../../system/core/database.php';
if ($_POST && isset($_POST['username']) && isset($_POST['password'])) {
  $username = xss(addslashes($_POST['username']));
  $password = xss(addslashes($_POST['password']));
  $md5Pass = md5($password);
  $check = $DB->fetch_assoc("SELECT * FROM `users` WHERE `username` = '{$username}'", 1);
  if (strlen($username) < 6 || strlen($username) > 32 || strlen($password) < 6 || strlen($password) > 32) {
    $msg = ['error' => 'Độ dài tài khoản hoặc mật khẩu không hợp lệ'];
  } else if (!$check) {
    $msg = ['error' => 'Tài khoản không tồn tại, vui lòng đăng ký tài khoản'];
  } else if ($check['id'] && $md5Pass != $check['password']) {
    $msg = ['error' => 'Mật khẩu không chính xác, vui lòng thử lại'];
  } else {
    $_SESSION['username'] = $username;
    $msg = ['success' => 'Đăng nhập thành công, đang chuyển hướng'];
  }
  echo json_encode($msg);
  exit;
}