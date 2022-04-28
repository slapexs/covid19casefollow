$('#formchangepassword').submit((e) => {
  e.preventDefault();
  const form_data = [
    $('#smid').val(),
    $('#curpassword').val(),
    $('#newpassword').val(),
    $('#cf_newpassword').val(),
  ];

  $.ajax({
    url: './backend/function.php',
    type: 'post',
    data: { changepassword: form_data },
    dataType: 'json',
    success: (res) => {
      if (res.msg == 'pwd_changed') {
        alert('เปลี่ยนรหัสผ่านเรียบร้อย กรุณาเข้าสู่ระบบใหม่');
        window.location.href = './logout';
      } else if (res.msg == 'curpwd_invalid') {
        alert('กรุณาระบุรหัสผ่านปัจจุบันให้ถูกต้อง');
        window.location.reload();
      } else if (res.msg == 'newpwd_notmatch') {
        alert('กรุณาระบุรหัสผ่านใหม่ให้ตรงกัน');
        window.location.reload();
      } else {
        alert('ผิดพลาด! ไม่สามารถเปลี่ยรหัสผ่านได้');
        window.location.reload();
      }
    },
    error: (err) => console.log(err),
  });
});
