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
    window.location.href = `./export/download_mycase_pdf.php`;
  } else if (type == "xlsx") {
    window.location.href = `./export/download_mycase_xlsx.php?mid=${mid}`;
  }
}
