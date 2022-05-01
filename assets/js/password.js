$("#formchangepassword").submit((e) => {
  e.preventDefault();
  const form_data = [
    $("#smid").val(),
    $("#curpassword").val(),
    $("#newpassword").val(),
    $("#cf_newpassword").val(),
  ];

  $.ajax({
    url: "./backend/function.php",
    type: "post",
    data: { changepassword: form_data },
    dataType: "json",
    success: (res) => {
      if (res.msg == "pwd_changed") {
        alert("เปลี่ยนรหัสผ่านเรียบร้อย กรุณาเข้าสู่ระบบใหม่");
        window.location.href = "./logout";
      } else if (res.msg == "curpwd_invalid") {
        alert("กรุณาระบุรหัสผ่านปัจจุบันให้ถูกต้อง");
        window.location.reload();
      } else if (res.msg == "newpwd_notmatch") {
        alert("กรุณาระบุรหัสผ่านใหม่ให้ตรงกัน");
        window.location.reload();
      } else {
        alert("ผิดพลาด! ไม่สามารถเปลี่ยรหัสผ่านได้");
        window.location.reload();
      }
    },
    error: (err) => console.log(err),
  });
});

// Admin change user password
function modaladmin_changepassworduser(smrole, mid, username) {
  if (smrole == 2) {
    $("#admchgpwd_mid").val(mid);
    $("#admchgpwd_username").val(username);
    $("#modalchangepassword").modal("show");

    $("#formadminchangepassworduser").submit((e) => {
      e.preventDefault();
      const form_data = [
        mid,
        $("#admchgpwd_newpassword").val(),
        $("#admchgpwd_cfnewpassword").val(),
      ];

      // Check password match
      if (form_data[1] == form_data[2]) {
        // Submit change user password
        $.ajax({
          url: "./backend/function.php",
          type: "post",
          data: { adminchangeuserpassword: form_data },
          dataType: "json",
          success: (res) => {
            if (res.msg == "changed") {
              alert("เปลี่ยรหัสผ่านบัญชีผู้ใชเรียบร้อย");
              window.location.reload();
            } else if (res.msg == "password_not_match") {
              alert("กรุณาระบุรหัสผ่านให้ตรงกันทั้ง 2 ช่อง");
            } else if (res.msg == "invalid_role") {
              alert("ผิดพลาด! บัญชีของคุณไม่มีสิทธิ์แก้ไขข้อมูลบัญชีผู้ใช้ได้");
            } else {
              alert("ผิดพลาด! ไม่สามรถเปลี่ยนรหัสผ่านบัญชีผู้ใช้ได้");
            }
          },
          error: (err) => console.log(err),
        });
      } else {
        alert("กรุณาระบุรหัสผ่านให้ตรงกันทั้ง 2 ช่อง");
      }
    });
  } else {
    window.location.reload();
  }
}
