function edithousenum(e) {
  const default_addr = 'ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140';
  let newaddr = `${e.value} ม.0 ${default_addr}`;
  document.querySelector('#c_address').textContent = newaddr;
}

function editvilnum(e) {
  const default_addr = 'ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140';
  let housenum = document.querySelector('#c_housenumber').value;
  let newaddr = `${housenum} ม.${e.value} ${default_addr}`;
  document.querySelector('#c_address').textContent = newaddr;
}

// Add case
$('#formaddcase').submit((e) => {
  e.preventDefault();
  const iddata = [
    'c_id',
    'c_ref_docid',
    'c_village_num',
    'c_fname',
    'c_lname',
    'c_cardid',
    'c_phone',
    'c_detail',
    'c_note',
    'c_start_quarantine',
    'c_end_quarantine',
    'c_housenumber',
  ];
  const form_data = [];

  iddata.forEach((item) => {
    const data = $(`#${item}`).val();
    form_data.push(data);
  });

  $.ajax({
    url: './backend/function.php',
    type: 'post',
    data: { addcase: form_data },
    dataType: 'json',
    success: (res) => {
      if (res.msg == 'inserted') {
        alert('เพิ่มเคสผู้ป่วยในระบบเรียบร้อย');
        window.location.href = './?page=allcase';
      } else {
        alert('ผิดพลาด! เพิ่มเคสผู้ป่วยในระบบได้');
      }
    },
    error: (err) => console.log(err),
  });
});
