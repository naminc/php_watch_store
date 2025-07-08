$(function () {
  $("#login").click(function (e) {
    e.preventDefault();
    let username = $("#login-username").val();
    let password = $("#login-password").val();
    if (!username) {
      toarst("", "Tên đăng nhập không được để trống", "error");
      return;
    }
    if (!password) {
      toarst("", "Mật khẩu không được để trống", "error");
      return;
    }
    $.ajax({
      type: "POST",
      url: "/ajax/auth/login.php",
      data: {
        username,
        password,
      },
      dataType: "json",
      beforeSend: function () {
        wait("#login", false);
      },
      complete: function () {
        wait("#login", true, '<i class="fa fa-sign-in"></i> Đăng nhập');
      },
      success: function (res) {
        if (res.success) {
          toarst("", res.success, "success");
          setTimeout(() => {
            window.location.reload();
          }, 1500);
        } else {
          toarst("", res.error, "error");
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
  $("#register").click(function (e) {
    e.preventDefault();
    let email = $("#register-email").val();
    let username = $("#register-username").val();
    let password = $("#register-password").val();
    if (!email) {
      toarst("", "Địa chỉ email không được để trống", "error");
      return;
    }
    if (!username) {
      toarst("", "Tên đăng nhập không được để trống", "error");
      return;
    }
    if (!password) {
      toarst("", "Mật khẩu không được để trống", "error");
      return;
    }
    $.ajax({
      type: "POST",
      url: "/ajax/auth/register.php",
      data: {
        email,
        username,
        password,
      },
      dataType: "json",
      beforeSend: function () {
        wait("#register", false);
      },
      complete: function () {
        wait("#register", true, '<i class="fa fa-user-plus"></i> Đăng ký');
      },
      success: function (res) {
        if (res.success) {
          toarst("", res.success, "success");
          setTimeout(() => {
            window.location.reload();
          }, 1500);
        } else {
          toarst("", res.error, "error");
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
});
    