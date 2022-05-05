<?php
include_once('../backend/condb.php');
$casestatus = ['กำลังรักษาตัว', 'รักษาหาย', 'รอรับเคส'];

$allcase = "SELECT * FROM `cases` GROUP BY `c_village_num` ASC ORDER BY `c_timestamp` ASC";
$qallcase = $conn->prepare($allcase);
$qallcase->execute();




include '../vendor/autoload.php';

// Export xlsx file
use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['file_content'])) {
    $temporary_html_file = '../tmp_html/' . time() . '.html';

    file_put_contents($temporary_html_file, $_POST["file_content"]);

    $reader = IOFactory::createReader('Html');

    $spreadsheet = $reader->load($temporary_html_file);

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $filename = 'allcase_' . time() . '.xlsx';

    $writer->save($filename);

    header('Content-Type: application/x-www-form-urlencoded');

    header('Content-Transfer-Encoding: Binary');

    header("Content-disposition: attachment; filename=\"" . $filename . "\"");

    readfile($filename);

    unlink($temporary_html_file);

    unlink($filename);

    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export xlsx allcase</title>
</head>

<body>
    <form action="" method="POST" id="download_allcase_xlsx">
        <table id="table_content" style="display: none;">

            <tr>
                <th>รหัสเคส</th>
                <th>ผู้ป่วย</th>
                <th>เลขประจำตัวระชาชน</th>
                <th>หมู่ที่</th>
                <th>ที่อยู่</th>
                <th>เบอร์โทรศัพท์</th>
                <th>อาการ</th>
                <th>เริ่มกักตัว</th>
                <th>สิ้นสุดกักตัว</th>
                <th>สถานะ</th>
                <th>หมายเหตุ</th>
                <th>วันที่ลงข้อมูล</th>
                <th>แพทย์ผู้รับผิดชอบ</th>

            </tr>
            <?php while ($rallcase = $qallcase->fetch()) { 
                $docid = $rallcase['c_ref_docid'];
            $doc = "SELECT * FROM `members` WHERE `m_id` = :docid";
            $qdoc = $conn->prepare($doc);
            $qdoc->bindParam(':docid', $docid);
            $qdoc->execute();
            $rdoc = $qdoc->fetch();

            $cardid = "";
            $cardid .= $rallcase['c_cardid'][0];
            $cardid .= "-";
            for ($i=1; $i<5; $i++){
                $cardid .= $rallcase['c_cardid'][$i];
            }
            $cardid .= "-";
            for ($j=5; $j<10; $j++){
                $cardid .= $rallcase['c_cardid'][$i];
            }
            $cardid .= "-";
            for ($j=10; $j<12; $j++){
                $cardid .= $rallcase['c_cardid'][$i];
            }
            $cardid .= "-";
            $cardid .= $rallcase['c_cardid'][12];
           
            ?>
                <tr>
                    <td><?= $rallcase['c_id']; ?></td>
                    <td><?= $rallcase['c_fname'] . ' ' . $rallcase['c_lname']; ?></td>
                    <td><?= $cardid; ?></td>
                    <td class="text-center"><?= $rallcase['c_village_num']; ?></td>
                    <td class="text-center"><?= $rallcase['c_address']; ?></td>
                    <td class="text-center"><?= $rallcase['c_phone']; ?></td>
                    <td class="text-center"><?= $rallcase['c_detail']; ?></td>
                    <td class="text-center"><?= $rallcase['c_start_quarantine']; ?></td>
                    <td class="text-center"><?= $rallcase['c_end_quarantine']; ?></td>
                    <td class="text-center"><?= $casestatus[$rallcase['c_status']]; ?></td>
                    <td class="text-center"><?= $rallcase['c_note']; ?></td>
                    <td class="text-center"><?= $rallcase['c_timestamp']; ?></td>
                    <td><?= $rdoc['m_fname'] . ' ' . $rdoc['m_lname']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <input type="hidden" name="file_content" id="file_content" />
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</body>

</html>

<script>
    function redirect() {
        window.history.back()
    }
    $(document).ready(function() {
        var table_content = '<table>';
        table_content += $('#table_content').html();
        table_content += '</table>';
        $('#file_content').val(table_content);
        $('#download_allcase_xlsx').submit();
    });

    setInterval(() => {
        redirect()
    }, 1000)
</script>