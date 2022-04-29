// Get Phrae covid-19 stat
const getstatcovid = async () => {
  const urlapi =
    'https://covid19.ddc.moph.go.th/api/Cases/today-cases-by-provinces';

  try {
    const response = await axios.get(urlapi);
    const data = response.data[75];
    document.querySelector('#stat-newcase').innerHTML =
      data.new_case.toLocaleString('en-US');
    document.querySelector('#stat-totalcase').innerHTML =
      data.total_case.toLocaleString('en-US');
    document.querySelector('#stat-newdeath').innerHTML =
      data.new_death.toLocaleString('en-US');
    document.querySelector('#stat-totaldeath').innerHTML =
      data.total_death.toLocaleString('en-US');
    document.querySelector('#date-update').innerHTML = data.update_date;
  } catch (error) {
    console.log(error);
  }
};
