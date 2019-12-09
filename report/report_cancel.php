<head>
    <meta charset="utf-8">
    <title>ดาวโหลดรายงาน</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../vendor\datetimepicker\jquery.datetimepicker.css">
    <style type="text/css" media="screen">
        .container{
            padding-top: 50px;
        }
        .text-white{
            font-weight: bold;
        }
    </style>
</head>
<?php 
require '../vendor/PHPspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
date_default_timezone_set("Asia/Bangkok");
include('../config.php');
include('../all_function.php');
$spreadsheet = new Spreadsheet();


$headStyle = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    // 'borders' => [
    //     'top' => [
    //         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //     ],
    // ],
];
$headMenu = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];

$content = [
    'font' => [
        'bold' => false,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];
$borderAll = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '#000000'],
        ],
    ],
];

$monthStr=$_POST['monthStr'];
$yearStr=$_POST['yearStr'];

// เปลี่ยนชื่อ Sheet
$spreadsheet->getActiveSheet()->setTitle('Simple');

//Set ฟอร์น
$spreadsheet->getDefaultStyle()->getFont()->setName('TH SarabunPSK');
$spreadsheet->getDefaultStyle()->getFont()->setSize(16);

//Set Column Width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5.13);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(16.13);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15.13);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15.13);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(29.13);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20.13);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(12.13);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(12.13);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20.13);
$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(16.13);
$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(18.13);
$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(56.5);
$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(60.13);
$spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(30.13);

// เพิ่มข้อมูล
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'รายงานประจำเดือน '.$monthStr.' '.$yearStr)->mergeCells('A1:N1')->getStyle('A1:N1')->applyFromArray($headStyle);
$sheet->setCellValue('A2', 'แบบรายงานการถอดหรือยกเลิกการใช้ เครื่องบันทึกข้อมูลการเดินทางของรถ')->mergeCells('A2:N2')->getStyle('A2:N2')->applyFromArray($headStyle);
$sheet->setCellValue('A3', 'โดย บริษัท .มิรดา คอร์ปอเรชั่น จำกัด... Vendor…84….')->mergeCells('A3:N3')->getStyle('A3:N3')->applyFromArray($headStyle);

//ส่วนเมนู
$sheet->setCellValue('A5', 'ลำดับ')->mergeCells('A5:A6')->getStyle('A5:A6')->applyFromArray($headMenu);
$sheet->setCellValue('B5', 'หมายเลขทะเบียน')->mergeCells('B5:B6')->getStyle('B5:B6')->applyFromArray($headMenu);
$sheet->setCellValue('C5', 'จังหวัด')->mergeCells('C5:C6')->getStyle('C5')->applyFromArray($headMenu);
$sheet->setCellValue('D5', 'ยี่ห้อ')->mergeCells('D5:D6')->getStyle('D5')->applyFromArray($headMenu);
$sheet->setCellValue('E5', 'หมายเลขคัสซี')->mergeCells('E5:E6')->getStyle('E5')->applyFromArray($headMenu);
$sheet->setCellValue('F5', 'ประเภทรถ/ลักษณะรถ')->mergeCells('F5:F6')->getStyle('F5')->applyFromArray($headMenu);
$sheet->setCellValue('G5', 'เครื่องบันทึกข้อมูลการเดินทางของรถ')->mergeCells('G5:I5')->getStyle('G5')->applyFromArray($headMenu);
$sheet->setCellValue('G6', 'ชนิด')->getStyle('G6')->applyFromArray($headMenu);
$sheet->setCellValue('H6', 'แบบ')->getStyle('H6')->applyFromArray($headMenu);
$sheet->setCellValue('I6', 'หมายเลขเครื่อง')->getStyle('I6')->applyFromArray($headMenu);
$sheet->setCellValue('J5', 'วันที่ติดตั้ง')->mergeCells('J5:J6')->getStyle('J5')->applyFromArray($headMenu);
$sheet->setCellValue('K5', 'ชนิดของผู้ให้บริการ SIM')->mergeCells('K5:K6')->getStyle('K5')->applyFromArray($headMenu);
$sheet->setCellValue('L5', 'ผู้ประกอบการขนส่ง')->mergeCells('L5:L6')->getStyle('L5')->applyFromArray($headMenu);
$sheet->setCellValue('M5', 'สาเหตุการถอดหรือยกเลิก')->mergeCells('M5:M6')->getStyle('M5')->applyFromArray($headMenu);
$sheet->setCellValue('N5', 'หมายเหตุ')->mergeCells('N5:N6')->getStyle('N5')->applyFromArray($headMenu);
$sheet->getStyle('A5:N6')->applyFromArray($borderAll);

// คำสั่ง Query ข้อมูล
$startMonth=date("1-m-Y");
$startMonth=YearTh2($startMonth);

$endMonth=date("t-m-Y");
$endMonth=YearTh2($endMonth);

    $i = 7;
    $num=1;
    for($ii=0;$ii<count($_POST["chk"]);$ii++)
    {   

        $strSQL = "SELECT * FROM `member` WHERE id =".$_POST["chk"][$ii]."";
        $objQuery = $conn->query($strSQL);
        $objResult = $objQuery->fetch_array();
        if($_POST["chk"][$ii] !="")
        {
                $simStr=trim($objResult['sim']);
                if ($simStr=="0" OR strtoupper($simStr)=="TRUE"){
                   $sim="TRUE";
                }elseif ($simStr=="3" OR strtoupper($simStr)=="AIS") {
                   $sim="AIS";
                }
                $ConvertDate=$objResult['date']."/".monthShut($objResult['sex'])."/".$objResult['year'];
                $conModel=conModel($objResult['gpsmodel1']);
                list($model,$modeltype)=explode("-",$conModel);
                $spreadsheet->getActiveSheet()->setCellValue('A' . $i, $num)->getStyle('A' . $i)->applyFromArray($content);
                $spreadsheet->getActiveSheet()->setCellValue('B' . $i, $objResult['amper'])->getStyle('B' . $i)->applyFromArray($content);
                $spreadsheet->getActiveSheet()->setCellValue('C' . $i, $objResult['province'])->getStyle('C' . $i)->applyFromArray($content);
                $spreadsheet->getActiveSheet()->setCellValue('D' . $i, $objResult['address'])->getStyle('D' . $i)->applyFromArray($content);
                $spreadsheet->getActiveSheet()->setCellValue('E' . $i, $objResult['user'])->getStyle('E' . $i)->applyFromArray($content);
                $spreadsheet->getActiveSheet()->setCellValue('F' . $i, $objResult['register_type'])->getStyle('F' . $i)->applyFromArray($content);
                $spreadsheet->getActiveSheet()->setCellValue('G' . $i, $modeltype)->getStyle('G' . $i)->applyFromArray($content);
                $spreadsheet->getActiveSheet()->setCellValue('H' . $i, $model)->getStyle('H' . $i)->applyFromArray($content);
                $spreadsheet->getActiveSheet()->setCellValue('I' . $i, $objResult['zipcode'])->getStyle('I' . $i)->applyFromArray($content);
                $spreadsheet->getActiveSheet()->setCellValue('J' . $i, $ConvertDate)->getStyle('J' . $i)->applyFromArray($content);
                $spreadsheet->getActiveSheet()->setCellValue('K' . $i, strtoupper($sim))->getStyle('K' . $i)->applyFromArray($content);
                $spreadsheet->getActiveSheet()->setCellValue('L' . $i, $objResult['name']);
                $spreadsheet->getActiveSheet()->setCellValue('M' . $i, '');
                $spreadsheet->getActiveSheet()->setCellValue('N' . $i, '');
                $spreadsheet->getActiveSheet()->getStyle('A' . $i.':N'.$i)->applyFromArray($borderAll);
        $i++;
        $num++;
        }

    }
while($objResult = $objQuery->fetch_array())
{	

}
$writer = new Xlsx($spreadsheet);
// non-approve
$writer->save('excel/cancel_report.xlsx');

 ?>
 <?php if ($writer): ?>

    <div class="container">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <div class="form-row">
                     <div class="col">
                        ดาวน์โหลดรายงานการยกเลิก
                    </div>
                    <div class="col text-right">
                        <a href="report.php" title=""><button type="button" class="btn btn-sm btn-warning">กลับหน้ารายงาน</button></a>
                    </div>
                    </div>
                </div>
                <div class="card-body text-center">
                    <a href="excel/cancel_report.xlsx" title=""> <button type="button" class="btn btn-info">
                    <span class="fa fa-download"></span>
                    Download File</button></a>
                </div>
            </div>
        </div>
    </div>
 <?php endif ?>
