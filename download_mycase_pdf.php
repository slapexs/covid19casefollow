<?php
include_once('./backend/condb.php');

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'sarabun' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'Sarabun-Regular.ttf',
            'I' => 'Sarabun-Italic.ttf',
            'B' => 'Sarabun-Bold.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);

// Line height
$mpdf->adjustFontDescLineheight = 1.14;
$casestatus = ['กำลังรักษาตัว', 'รักษาหาย', 'รอรับเคส'];
$mid = $_GET['mid'];

$mycase = "SELECT * FROM `cases` WHERE `c_ref_docid` = :mid GROUP BY `c_village_num` ASC ORDER BY `c_timestamp` ASC";
$qmycase = $conn->prepare($mycase);
$qmycase->bindParam(':mid', $mid);
$qmycase->execute();

$doc = "SELECT * FROM `members` WHERE `m_id` = :docid";
$qdoc = $conn->prepare($doc);
$qdoc->bindParam(':docid', $mid);
$qdoc->execute();
$rdoc = $qdoc->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export allcase | .pdf</title>

</head>

<body>
    <?php ob_start(); ?>
    <div class="text-center">
        <h3 style="margin-bottom: 0;">ข้อมูลรายชื่อผู้ป่วย</h3>
        <span style="font-size: 18px;">แพทย์ผู้รับผิดชอบ <?= $rdoc['m_fname'].' '.$rdoc['m_lname']; ?></span>
    </div>

    <table class="table_print mt-2">
        <thead>
            <tr style="align-items:center;">
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
        </thead>
        <tbody>
            <?php while ($rmycase = $qmycase->fetch()) {

                $cardid = "";
                $cardid .= $rmycase['c_cardid'][0];
                $cardid .= "-";
                for ($i = 1; $i < 5; $i++) {
                    $cardid .= $rmycase['c_cardid'][$i];
                }
                $cardid .= "-";
                for ($j = 5; $j < 10; $j++) {
                    $cardid .= $rmycase['c_cardid'][$i];
                }
                $cardid .= "-";
                for ($j = 10; $j < 12; $j++) {
                    $cardid .= $rmycase['c_cardid'][$i];
                }
                $cardid .= "-";
                $cardid .= $rmycase['c_cardid'][12];

            ?>
                <tr style="align-items:center;">
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
        </tbody>
    </table>


    <?php
    $date = date('d-m-Y');
    $docname = $rdoc['m_fname'];
    $filename = "ข้อมูลรายชื่อผู้ป่วยของแพทย์$docname-$date.pdf";
    $print = ob_get_contents();
    ob_end_flush();
    $stylesheet = file_get_contents('print_style.css');

    $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($print, \Mpdf\HTMLParserMode::HTML_BODY);
    $mpdf->Output('download/' . $filename);

    ?>
    <input type="hidden" id="filename" name="filename" value="<?php echo $filename; ?>" required readonly>

    <script>
        function redirect() {
            const file = document.querySelector('#filename');
            window.location.href = `./download/${file.value}`
        }

        redirect()
    </script>
</body>

</html>