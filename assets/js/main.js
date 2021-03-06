// Get Phrae covid-19 stat
const getstatcovid = async () => {
  const urlapi =
    "https://covid19.ddc.moph.go.th/api/Cases/today-cases-by-provinces";

  try {
    const response = await axios.get(urlapi);
    const data = response.data[75];
    document.querySelector("#stat-newcase").innerHTML =
      data.new_case.toLocaleString("en-US");
    document.querySelector("#stat-totalcase").innerHTML =
      data.total_case.toLocaleString("en-US");
    document.querySelector("#stat-newdeath").innerHTML =
      data.new_death.toLocaleString("en-US");
    document.querySelector("#stat-totaldeath").innerHTML =
      data.total_death.toLocaleString("en-US");
    document.querySelector("#date-update").innerHTML = data.update_date;
  } catch (error) {
    console.log(error);
  }
};

// Delete user
function deluser(mid, smid) {
  const statedel = confirm("ต้องการลบบัญชีผู้ใช้นี้ ?");

  // Check current user
  if (statedel == true) {
    if (mid == smid) {
      alert("ผิดพลาด! ไม่สามารถลบบัญชีกำลังใช้งานได้");
      window.location.href = "./?page=users";
    } else {
      $.ajax({
        url: "./backend/function.php",
        type: "post",
        data: { deluser: mid },
        dataType: "json",
        success: (res) => {
          if (res.msg == "deleted") {
            alert("ลบบัญชีผู้ใช้เรียบร้อย");
            window.location.reload();
          } else {
            alert("ผิดพลาด! ไม่สามารถลบบัญชีผู้ใช้ได้");
            window.location.reload();
          }
        },
      });
    }
  }
}

// Add user
$("#formadduser").submit((e) => {
  e.preventDefault();
  const form_data = [
    $("#m_username").val(),
    $("#m_password").val(),
    $("#m_fname").val(),
    $("#m_lname").val(),
    $("#m_role").val(),
  ];

  $.ajax({
    url: "./backend/function.php",
    type: "post",
    data: { adduser: form_data },
    dataType: "json",
    success: (res) => {
      if (res.msg == "inserted") {
        alert("เพิ่มบัญชีผู้ใช้เรียบร้อย");
        window.location.reload();
      } else if (res.msg == "not_insert") {
        alert("ผิดพลาด! เพิ่มบัญชีผู้ใช้ได้");
        window.location.reload();
      } else if (res.msg == "username_invalid") {
        alert("ผิดพลาด! ไม่สามารถใช้ชื่อบัญชีผู้ใช้ซ้ำได้");
        window.location.reload();
      } else {
        alert("ผิดพลาด! เพิ่มบัญชีผู้ใช้ได้");
        window.location.reload();
      }
    },
    error: (err) => console.log(err),
  });
});


