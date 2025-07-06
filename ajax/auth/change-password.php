<?php
require_once '../../system/core/database.php';

if ($_POST && isset($_POST['password'], $_POST['new_password'], $_POST['confirm_password'])) {
    $password = xss(addslashes($_POST['password']));
    $new_password = xss(addslashes($_POST['new_password']));
    $confirm_password = xss(addslashes($_POST['confirm_password']));

    if ($new_password != $confirm_password) {
        echo json_encode(['error' => 'Mật khẩu mới không khớp, vui lòng thử lại']);
        exit;
    }
    if (strlen($new_password) < 6 || strlen($new_password) > 32 || strlen($password) < 6 || strlen($password) > 32) {
        echo json_encode(['error' => 'Độ dài mật khẩu không hợp lệ, vui lòng thử lại']);
        exit;
    }
    if($password == $new_password){
        echo json_encode(['error' => 'Mật khẩu mới không được trùng với mật khẩu hiện tại, vui lòng thử lại']);
        exit;
    }
    $md5Pass = md5($password);
    $md5NewPass = md5($new_password);

    $check = $DB->fetch_assoc("SELECT * FROM `users` WHERE `username` = '{$_SESSION['username']}' AND `password` = '{$md5Pass}'", 1);
    if (!$check) {
        echo json_encode(['error' => 'Mật khẩu hiện tại không chính xác, vui lòng thử lại']);
        exit;
    }
    $DB->query("UPDATE `users` SET `password` = '{$md5NewPass}' WHERE `username` = '{$_SESSION['username']}'");
    echo json_encode(['success' => 'Đổi mật khẩu thành công']);
    exit;
} else {
    echo json_encode(['error' => 'Thiếu dữ liệu']);
    exit;
}
