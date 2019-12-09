<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    include("config.php") ;
    require_once __DIR__ . '/mpdf/vendor/autoload.php';
    include'function_date_thai.php';
    session_start() ;
?>

<?php 
  $result = mysqli_query($conn,"select * from member where user='$_GET[user]'") or die ("Err Can not to result") ;
  $dbarr = mysqli_fetch_array($result) ;

  if($dbarr['tech_service']==""){
    $techName = $dbarr['tech'];
  }else{
    $techName = $dbarr['tech_service'];
  }
$page1 = '<div>
<h3 style="text-align: center; padding:10px;"><b> แบบสอบถามความพึงพอใจในการให้บริการของช่างผู้ปฏิบัติงาน </b></h3>
<table id="Evaluation" border="1" cellpadding="0" cellspacing="0">
  <tr id="choice">
    <td>รายการประเมิน</td>
    <td>ดีมาก</td>
    <td>ดี</td>
    <td>ปานกลาง</td>
    <td>แย่</td>
    <td>แย่มาก</td>
  </tr>
  <tr>
    <td>1. ความสะดวกในการติดต่อสื่อสาร</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td style="padding:5px"> 2. การสนทนาของช่างผู้ปฏิบัติงาน</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td style="padding:5px"> 3. การแต่งกายของช่างผู้ปฏิบัติงาน</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td style="padding:5px"> 4. คุณภาพการให้บริการโดยรวมของช่างผู้ปฏิบัติงาน</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

<table style="margin-top: 20px;" width="70%" height="59%" border="1" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                  <tr>
                    <td width="61%" height="78" bordercolor="#FF0000" bgcolor="#FFFFFF" style="text-align: center;">
                    <div align="left">
                    <span class="style19">ช่างผู้ปฏิบัติงาน : '.$techName.' <br /> <p>เลขคัทซี : '.$dbarr['user'].'</p>
                    </div>
                    </td>
                    <td width="30%" style="text-align: center;">
                      <div align="left"><span class="style13"><span class="style19">ลงชื่อเจ้าของรถ</span>  <br />
                      <br />
                    <u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</u></span><br />
                    <span class="style19">'. DateTime('now') .'</span><br />
                      <br />
                    </div>
                    </td>
                  </tr>
                </tbody>
            </table>
  <div >
  <table style="margin-top: 40px;"  width="20%">
    <tr border="1" cellpadding="0" cellspacing="0">
      <td ><img src="img\print/uniform.jpg" height="200px" ></td>
    </tr>
    <tr>
      <td style="font-size:12px; text-align:center">ตัวอย่างชุดพนักงาน</td>
    </tr>
  </table>
  </div>
</div>
';
?>

<?php
    $mpdf = new \Mpdf\Mpdf(
      ['mode' => 'utf-8', 'format' => 'A4',
      'default_font_size' => 16,
      'default_font' => 'sarabun',
      'margin_top' => 9,
      'margin_left' => 9,
      'margin_right' => 9,
      'mirrorMargins' => true
    ]);
    $css = file_get_contents('css/style_pdf/pdf.css');
    $mpdf->writeHTML($css, 1);
    $mpdf->WriteHTML($page1);
    $mpdf->Output();
   ?>
</body>
</html>