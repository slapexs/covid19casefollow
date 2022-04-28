// Edit profile

function show_div_editprofile(state) {
  const btn_editprofile = document.querySelector('#btn_editprofile');
  const div_editprofile = document.querySelector('#div_editprofile');
  if (state == 'show') {
    div_editprofile.classList.remove('d-none');
    btn_editprofile.classList.add('disabled');
    btn_editprofile.setAttribute('disabled', '');
  } else {
    div_editprofile.classList.add('d-none');
    btn_editprofile.classList.remove('disabled');
    btn_editprofile.removeAttribute('disabled');
  }
}

// Submit edit profile
$('#formeditprofile').submit((e) => {
  e.preventDefault();
  const form_data = [
    $('#edit_mid').val(),
    $('#edit_mfname').val(),
    $('#edit_mlname').val(),
  ];
  $.ajax({
    url: './backend/function.php',
    type: 'POST',
    data: { editprofile: form_data },
    dataType: 'json',
    success: (res) => {
      if (res.msg == 'updated') {
        alert('แก้ไขข้อมูลส่วนตัวเรียบร้อย');
        window.location.reload();
      }else{
        alert('ผิดพลาด! แก้ไขข้อมูลส่วนตัวได้');
        window.location.reload();
      }
    },
    error: (err) => {
      console.log(err);
    },
  });
});
