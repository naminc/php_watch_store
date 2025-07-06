<?php
require_once './system/core/database.php';
if(isset($_SESSION['username'])){
    header('Location: /');
    exit;
}else{
require_once LAYOUT.'/header.php';
?>
   <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Đăng nhập &amp; Đăng ký</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb lagin-and-register-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 m-auto">
                        <div class="login-register-wrapper">
                            <!-- login-register-tab-list start -->
                            <div class="login-register-tab-list nav">
                                <a class="active" data-bs-toggle="tab" href="#lg1">
                                    <h4> Đăng nhập </h4>
                                </a>
                                <a data-bs-toggle="tab" href="#lg2">
                                    <h4> Đăng ký </h4>
                                </a>
                            </div>
                            <!-- login-register-tab-list end -->
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="#" method="post">
                                                <div class="login-input-box">
                                                    <input type="text" name="user-name" placeholder="Tên đăng nhập">
                                                    <input type="password" name="user-password" placeholder="Mật khẩu">
                                                </div>
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Ghi nhớ</label>
                                                        <a href="#">Quên mật khẩu?</a>
                                                    </div>
                                                    <div class="button-box">
                                                        <button class="login-btn btn" type="submit"><span>Đăng nhập</span></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="#" method="post">
                                                <div class="login-input-box">
                                                    <input type="text" name="user-name" placeholder="Tên đăng nhập">
                                                    <input type="password" name="user-password" placeholder="Mật khẩu">
                                                    <input name="user-email" placeholder="Email" type="email">
                                                </div>
                                                <div class="button-box">
                                                        <button class="register-btn btn" type="submit"><span>Đăng ký</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->

<!-- footer Start -->
      

   <!-- <script>
   
      $(function(){
        $('#login').click(function (e) { 
            e.preventDefault();
            let username = $('#username').val();
            let password = $('#password').val();
            if(!username){
                swal('Trường tài khoản không được để trống','error');
                return;
            }
            if(!password){
                swal('Trường mật khẩu không được để trống','error');
                return;
            }
            $.ajax({
                type: "POST",
                url: "/ajax/auth/login.php",
                data: {username, password},
                dataType: "json",
                beforeSend: function(){
                    wait('#login',false);
                },
                complete: function(){
                    wait('#login',true,"<i class=\"fa fa-sign-in\"></i> Đăng nhập");
                },
                success: function (res) {
                     if(res.success){
                        swal(res.success,'success');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    }else{
                        swal(res.error,'error');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    }
                },
                error: function (error) {
                console.log(error);
                }
            });
        });
    });
</script> -->
<?php
require_once LAYOUT.'/footer.php';
}
?>