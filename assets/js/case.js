function edithousenum(e) {
  const default_addr = "ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140";
  let newaddr = `${e.value} ม.0 ${default_addr}`;
  document.querySelector("#c_address").textContent = newaddr;
}

function editvilnum(e) {
  const default_addr = "ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140";
  let housenum = document.querySelector("#c_housenumber").value;
  let newaddr = `${housenum} ม.${e.value} ${default_addr}`;
  document.querySelector("#c_address").textContent = newaddr;
}

// Add case
$("#formaddcase").submit((e) => {
  e.preventDefault();
  const form_data = [];

  const iddata = [
    "c_id",
    "c_ref_docid",
    "c_village_num",
    "c_fname",
    "c_lname",
    "c_cardid",
    "c_phone",
    "c_detail",
    "c_note",
    "c_start_quarantine",
    "c_end_quarantine",
    "c_housenumber",
  ];

  iddata.forEach((item) => {
    const data = $(`#${item}`).val();
    form_data.push(data);
  });

  $.ajax({
    url: "./backend/function.php",
    type: "post",
    data: { addcase: form_data },
    dataType: "json",
    success: (res) => {
      if (res.msg == "inserted") {
        alert("เพิ่มเคสผู้ป่วยในระบบเรียบร้อย");
        window.location.href = "./?page=allcase";
      } else {
        alert("ผิดพลาด! เพิ่มเคสผู้ป่วยในระบบได้");
      }
    },
    error: (err) => console.log(err),
  });
});

// View case by ID
function viewcasebyvillnum(villnum) {
  window.location.href = `./?page=allcase&villnum=${villnum}`;
}

// Search case
$("#formcasesearch").submit((e) => {
  e.preventDefault();

  const form_data = $("#searchcase_name").val();

  window.location.href = `./?page=searchcase&keyword=${btoa(form_data)}`;
  // $.ajax({
  //   url: "./backend/function.php",
  //   type: "post",
  //   data: { searchcase: form_data },
  //   dataType: "json",
  //   success: (res) => {
  //     console.log(res);
  //     $("#listsearchcase").modal("show");
  //   },
  //   error: (err) => console.log(err),
  // });
});

// doctor get case
function getcase(caseid, docid, smid) {
  const cf_getcase = confirm("ยืนยันรับเคสผู้ป่วย ?");
  if (cf_getcase == true) {
    if (docid == smid) {
      $.ajax({
        url: "./backend/function.php",
        type: "post",
        data: { getcase: caseid },
        dataType: "json",
        success: (res) => {
          if (res.msg == "geted") {
            alert("รับเคสเรียบร้อย");
            window.location.href = "./?page=mycase";
          } else if (res.msg == "mid_invalid") {
            alert(
              "ไม่สามารถรับเคสได้ เนื่องจากที่อยู่ผู้ป่วยอยู่นอกการรับผิดชอบ"
            );
            window.location.href = "./?page=allcase";
          } else {
            alert("ผิดพลาด! ไม่สามารถรับเคสได้");
            window.location.href = "./?page=allcase";
          }
        },
        error: (err) => console.log(err),
      });
    } else {
      alert("ไม่สามารถรับเคสได้ เนื่องจากที่อยู่ผู้ป่วยอยู่นอกการรับผิดชอบ");
      window.location.href = "./?page=allcase";
    }
  }
}

// Download file
function downloadmycase(type, mid) {
  if (type == "pdf") {
    window.location.href = `./download_mycase_pdf.php?mid=${mid}`;
  } else if (type == "xlsx") {
    window.location.href = `./export/download_mycase_xlsx.php?mid=${mid}`;
  }
}

function downloadallcase(type) {
  if (type == "pdf") {
    window.location.href = `./download_allcase_pdf.php`;
  } else if (type == "xlsx") {
    window.location.href = `./export/download_allcase_xlsx.php`;
  }
}

// Update case status
$("#updatecase").submit((e) => {
  e.preventDefault();
  const form_data = [$("#c_update_id").val(), $("#c_update_status").val()];

  $.ajax({
    url: "./backend/function.php",
    type: "post",
    data: { updatecase_status: form_data },
    dataType: "json",
    success: (res) => {
      if (res.msg == "updated") {
        alert("แก้ไขสถานะเคสผู้ป่วยเรียบร้อย");
        window.location.reload();
      } else {
        alert("ผิดพลาด! ไม่สามารถแก้ไขสถานะเคสผู้ป่วยได้");
        window.location.reload();
      }
    },
    error: (err) => {
      alert("ผิดพลาด! ไม่สามารถแก้ไขสถานะเคสผู้ป่วยได้");
      window.location.reload();
    },
  });
});

// Function delete case
function deletecase(caseid, mid) {
  const cf_delcase = confirm("ต้องการลบเคสผู้ป่วย ?");
  if (cf_delcase) {
    $.ajax({
      url: "./backend/function.php",
      type: "post",
      data: { deletecase: [caseid, mid] },
      dataType: "json",
      success: (res) => {
        if (res.msg == "deleted") {
          alert("ลบข้อมูลเคสผู้ป่วยเรียบร้อย");
          window.location.href = "./?page=mycase";
        } else {
          alert("ผิดพลาด! ลบข้อมูลเคสผู้ป่วยได้");
          window.location.reload();
        }
      },
      error: (err) => {
        alert("ผิดพลาด!!! ลบข้อมูลเคสผู้ป่วยได้");
        window.location.reload();
      },
    });
  }
}

// Function doctor edit case
function editcase(caseid) {
  // Get data
  $.ajax({
    url: "./backend/function.php",
    type: "post",
    data: { getcasedata_foredit: caseid },
    dataType: "json",
    success: (res) => {
      const address = res.c_address;
      const cutaddr = address.split(" ");

      $("#editcase_id").val(res.c_id);
      $("#editcase_fname").val(res.c_fname);
      $("#editcase_lname").val(res.c_lname);
      $("#editcase_housenumber").val(cutaddr[0]);
      $("#editcase_village_num").val(res.c_village_num);
      $("#editcase_address").val(res.c_address);
      $("#editcase_cardid").val(res.c_cardid);
      $("#editcase_phone").val(res.c_phone);
      $("#editcase_detail").val(res.c_detail);
      $("#editcase_note").val(res.c_note);
      $("#editcase_start_quarantine").val(res.c_start_quarantine);
      $("#editcase_end_quarantine").val(res.c_end_quarantine);
    },
  });
  $("#modaleditcase").modal("show");
}

// form submit edit case
$("#formeditcase").submit((e) => {
  e.preventDefault();

  const form_data = [
    $("#editcase_id").val(),
    $("#editcase_fname").val(),
    $("#editcase_lname").val(),
    $("#editcase_cardid").val(),
    $("#editcase_phone").val(),
    $("#editcase_village_num").val(),
    $("#editcase_address").val(),
    $("#editcase_detail").val(),
    $("#editcase_note").val(),
    $("#editcase_start_quarantine").val(),
    $("#editcase_end_quarantine").val(),
    $("#editcase_housenumber").val(),
  ];

  $.ajax({
    url: "./backend/function.php",
    type: "post",
    data: { editcase: form_data },
    dataType: "json",
    success: (res) => {
      if (res.msg == "updated") {
        alert("แก้ไขเคสผู้ป่วยเรียบร้อย");
        window.location.reload();
      } else if (res.msg == "mid_not_match") {
        alert("ผิดพลาด! ไม่สามารถแก้ไขเคสผู้ป่วยได้");
        window.location.reload();
      } else {
        alert("ผิดพลาด! ไม่สามารถแก้ไขเคสผู้ป่วยได้");
        window.location.reload();
      }
    },
    error: (err) => {
      alert("ผิดพลาด! ไม่สามารถแก้ไขเคสผู้ป่วยได้");
      window.location.reload();
    },
  });
});
