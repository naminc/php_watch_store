function swal(text, icon) {
    return Swal.fire({ title: "Thông báo", text, icon });
  }
  function wait(t, e, n) {
    return e
      ? $(t).prop("disabled", !1).html(n)
      : $(t)
          .prop("disabled", !0)
          .html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý');
  }
  function cop(element) {
    window.getSelection().removeAllRanges();
    let range = document.createRange();
    range.selectNode(
        typeof element === "string" ? document.getElementById(element) : element
    );
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
    swal('Sao chép thành công', 'success');
  }