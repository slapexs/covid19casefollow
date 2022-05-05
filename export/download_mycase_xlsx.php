<?php
include_once('../backend/condb.php');
$mid = $_GET['mid'];
$casestatus = ['กำลังรักษาตัว', 'รักษาหาย', 'รอรับเคส'];

$mycase = "SELECT * FROM `cases` WHERE `c_ref_docid` = :mid GROUP BY `c_village_num` ASC ORDER BY `c_timestamp` ASC";
$qmycase = $conn->prepare($mycase);
$qmycase->bindParam(':mid', $mid);
$qmycase->execute();

$doc = "SELECT * FROM `members` WHERE `m_id` = :docid";
$qdoc = $conn->prepare($doc);
$qdoc->bindParam(':docid', $mid);
$qdoc->execute();
$rdoc = $qdoc->fetch();


include '../vendor/autoload.php';

// Export xlsx file
use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['file_content'])) {
    $temporary_html_file = '../tmp_html/' . time() . '.html';

    file_put_contents($temporary_html_file, $_POST["file_content"]);

    $reader = IOFactory::createReader('Html');

    $spreadsheet = $reader->load($temporary_html_file);

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $filename = 'mycase_' . time() . '.xlsx';

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
    <title>Export xlsx mycase</title>
</head>

<body>
    <form action="" method="POST" id="download_mycase_xlsx">
        <table id="table_content" style="display: none;">
        <tr>
            <td><strong>แพทย์ผู้รับผิดชอบ</strong></td>
            <td><?= $rdoc['m_fname'].' '.$rdoc['m_lname'] ?></td>
        </tr>
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

            </tr>
            <?php while ($rmycase = $qmycase->fetch()) { 
              
            $cardid = "";
            $cardid .= $rmycase['c_cardid'][0];
            $cardid .= "-";
            for ($i=1; $i<5; $i++){
                $cardid .= $rmycase['c_cardid'][$i];
            }
            $cardid .= "-";
            for ($j=5; $j<10; $j++){
                $cardid .= $rmycase['c_cardid'][$i];
            }
            $cardid .= "-";
            for ($j=10; $j<12; $j++){
                $cardid .= $rmycase['c_cardid'][$i];
            }
            $cardid .= "-";
            $cardid .= $rmycase['c_cardid'][12];
           
            ?>
                <tr>
                    <td><?= $rmycase['c_id']; ?></td>
                    <td><?= $rmycase['c_fname'] . ' ' . $rmycase['c_lname']; ?></td>
                    <td><?= $cardid; ?></td>
                    <td class="text-center"><?= $rmycase['c_village_num']; ?></td>
                    <td class="text-center"><?= $rmycase['c_address']; ?></td>
                    <td class="text-center"><?= $rmycase['c_phone']; ?></td>
                    <td class="text-center"><?= $rmycase['c_detail']; ?></td>
                    <td class="text-center"><?= $rmycase['c_start_quarantine']; ?></td>
                    <td class="text-center"><?= $rmycase['c_end_quarantine']; ?></td>
                    <td class="text-center"><?= $casestatus[$rmycase['c_status']]; ?></td>
                    <td class="text-center"><?= $rmycase['c_note']; ?></td>
                    <td class="text-center"><?= $rmycase['c_timestamp']; ?></td>
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
        $('#download_mycase_xlsx').submit();
    });

    setInterval(() => {
        redirect()
    }, 1000)
</script>