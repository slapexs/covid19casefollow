$('#formlogin').submit((e) => {
  e.preventDefault();
  const logindata = [$('#m_username').val(), $('#m_password').val()];
  $.ajax({
    url: './backend/function.php',
    type: 'POST',
    data: {
      checklogin: logindata,
    },
    dataType: 'JSON',
    success: (res) => {
      if (res.msg == 'success') {
        window.location.href = './';
      } else {
        alert('รหัสผ่านไม่ถูกต้อง');
      }
    },
    error: (err) => console.log(err),
  });
});
