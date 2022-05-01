// Edit profile

function show_div_editprofile(state) {
  const btn_editprofile = document.querySelector("#btn_editprofile");
  const div_editprofile = document.querySelector("#div_editprofile");
  if (state == "show") {
    div_editprofile.classList.remove("d-none");
    btn_editprofile.classList.add("disabled");
    btn_editprofile.setAttribute("disabled", "");
  } else {
    div_editprofile.classList.add("d-none");
    btn_editprofile.classList.remove("disabled");
    btn_editprofile.removeAttribute("disabled");
  }
}

// Submit edit profile
$("#formeditprofile").submit((e) => {
  e.preventDefault();
  const form_data = [
    $("#edit_mid").val(),
    $("#edit_mfname").val(),
    $("#edit_mlname").val(),
  ];
  $.ajax({
    url: "./backend/function.php",
    type: "POST",
    data: { editprofile: form_data },
    dataType: "json",
    success: (res) => {
      if (res.msg == "updated") {
        alert("แก้ไขข้อมูลส่วนตัวเรียบร้อย");
        window.location.reload();
      } else {
        alert("ผิดพลาด! แก้ไขข้อมูลส่วนตัวได้");
        window.location.reload();
      }
    },
    error: (err) => {
      console.log(err);
    },
  });
});

// Admin edit user
function modaladmin_edituser(smrole, mid, username, fname, lname, role) {
  if (smrole == 2) {
    $("#admedt_mid").val(mid);
    $("#admedt_username").val(username);
    $("#admedt_fname").val(fname);
    $("#admedt_lname").val(lname);
    $("#admedt_role").val(role);
    $("#modaledituser").modal("show");

    // Submit edit user
    $("#formadminedituser").submit((e) => {
      e.preventDefault();
      const form_data = [
        $("#admedt_mid").val(),
        $("#admedt_username").val(),
        $("#admedt_fname").val(),
        $("#admedt_lname").val(),
        $("#admedt_role").val(),
      ];
      $.ajax({
        url: "./backend/function.php",
        type: "post",
        data: { adminedituser: form_data },
        dataType: "json",
        success: (res) => {
          // console.log(res);
          if (res.msg == "updated") {
            alert("แก้ไขข้อมูลบัญชีผู้ใช้เรียบร้อย");
            window.location.reload();
          } else if (res.msg == "invalid_role") {
            alert("ผิดพลาด! บัญชีของคุณไม่มีสิทธิ์แก้ไขข้อมูลบัญชีผู้ใช้ได้");
            window.location.reload();
          } else {
            alert("ผิดพลาด! แก้ไขข้อมูลบัญชีผู้ใช้ได้");
            window.location.reload();
          }
        },
        error: (err) => console.log(err),
      });
    });
  } else {
    window.location.reload();
  }
}
