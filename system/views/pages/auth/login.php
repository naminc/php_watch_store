<?php
require_once './system/core/database.php';
if (isset($_SESSION['username'])) {
    header('Location: /');
    exit;
} else {
    $title = 'Đăng nhập &amp; Đăng ký';
    require_once LAYOUT . '/header.php';
?>
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đăng nhập &amp; Đăng ký</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content-wrap section-ptb lagin-and-register-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 m-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-bs-toggle="tab" href="#form-login">
                                <h4> Đăng nhập </h4>
                            </a>
                            <a data-bs-toggle="tab" href="#form-register">
                                <h4> Đăng ký </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="form-login" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <div class="login-input-box">
                                            <input type="text" id="login-username" placeholder="Tên đăng nhập">
                                            <input type="password" id="login-password" placeholder="Mật khẩu">
                                        </div>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" checked>
                                                <label>Ghi nhớ?</label>
                                                <a href="#">Quên mật khẩu?</a>
                                            </div>
                                            <div class="button-box text-center">
                                                <button type="button" class="login-btn btn" id="login"><span><i class="fa fa-sign-in"></i> Đăng nhập</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="form-register" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <div class="login-input-box">
                                            <input type="email" id="register-email" placeholder="Email">
                                            <input type="text" id="register-username" placeholder="Tên đăng nhập">
                                            <input type="password" id="register-password" placeholder="Mật khẩu">
                                        </div>
                                        <div class="button-box text-center">
                                            <button type="button" class="register-btn btn" id="register"><span><i class="fa fa-user-plus"></i> Đăng ký</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once LAYOUT . '/footer.php';
}
?>