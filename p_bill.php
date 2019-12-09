<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/style_pdf/pdf.css">
</head>
<body>
  <?php
  require_once __DIR__ . '/mpdf/vendor/autoload.php';
  // include'function_date_thai.php';
  include'all_function.php';

  session_start() ;
  // if (!isset($_SESSION['login_true'])) {
  //    header("Location: index.php");
  //    exit;
  // }
//include("1mm.php") ;
//include("1yy.php") ;


  // ระยะเวลา

  ?>
  <?php
  $html ='
  <div style="border: 1px solid #000000; padding:10px">
  <p align="right"><b>สำหรับธนาคาร</b></p>
      ';
  include("config.php") ;
  // mysqli_select_db($db);
  
  $result = mysqli_query($conn,"select * from member where user='$_GET[user]'") or die ("Err Can not to result") ;
  $dbarr = mysqli_fetch_array($result);
  if ($dbarr['vat']=="0") {
    $service=($dbarr['service_charge']*$dbarr['bill_cycle']);
  }elseif($dbarr['vat']=="1"){
    $service=($dbarr['service_charge']*$dbarr['bill_cycle']);
    // +VAT 7%
    $service=$service+($service*(7/100));
  }

  $Datethai=YearEn($dbarr['dill']);
  $Datethai=date("Y-m-d", strtotime('+15 days', strtotime($Datethai)));
  $Datethai=DateFull($Datethai);

  $html .='
<table width="100%" height="94" >
  <tr>
    <td style="background-color:#55f40a">
       <h2 align="left">ใบนำฝากพิเศษ Special Pay-in Slip</h2>
    </td>
  </tr>
</table>


<div class="no1">
    <p style="font-size:20px;" ><img src="img/logo.jpg" alt="1" height="70px" align="left">เลขประจำตัวผู้เสียภาษี 0505556000510</p>
    <p class="par">เพื่อเข้าบัญชี บจก.มิรดา คอร์ปอเรชั่น , กระแสรายวัน</p>
    <img src="img/logobank.png" width="30" height="25" >&nbsp; บมจ. ธนาคารกสิกรไทย เลขที่บัญชี 414-1-02985-7
</div>

<div class="no2">
    <p style="font-size:20px;">สาขาผู้รับฝาก...........................................วันที่/Date.......................</p>
    <div style="border: 1px solid #000000;">
    <p class="par2">ชื่อลูกค้า </p>
    <p class="par3">Name :         '. $dbarr['name'] .'</p>
    <p class="par2">เลขอ้างอิง 1 </p>
    <p class="par3">Ref 1 :          '. $dbarr['user'] .'</p>
    <p class="par2">เลขอ้างอิง 2 </p>
    <p class="par3">Ref 2 :          '. DateDMY($dbarr['dill']) .' </p>
    </div>
</div>

<table class="table" width="100%" >
<tr>
  <td class="td" align="center" style="font-size:18px;">เงินสด(cash)</td>
  <td class="td" align="center" style="font-size:18px; background-color:#55f40a;">จำนวนเงินเป็นตัวอักษร (Amount in letter)</td>
  <td class="td" align="center" style="font-size:18px; background-color:#55f40a;">จำนวนเงินเป็นตัวเลข (Amount in Digit)</td>
</tr>
<tr>
<td class="td" style="font-size:18px;" align="center">บาท(Baht)</td>
<td class="td" style="font-size:18px;" align="center">'. bahtText($service) .'</td>
<td class="td" style="font-size:18px;" align="center">'. $service .'</td>
</tr>
<tr>
<td class="td" style="font-size:18px" colspan="2" valign="bottom">ผู้นำฝาก...................................................................................................................tel.................................................</td>
<td class="td" style="font-size:18px" align="center" height="55px" valign="top">เจ้าหน้าที่ธนาคาร</td>
</tr>
</table>

  <p style="font-size:18px;">กรุณานำเอกสารนี้ไปแจ้งชำระเงินได้ที่ ธนาคารกสิกรไทย ทุกสาขาทั่วประเทศ</p>
</div>
';
 ?>

<?php

// <p style="font-size:22px" align="center" color="red" ><b>ลูกค้า ควร ชำระเงินไม่เกินวันที่ '. $Datethai .' นะคะ</b></p>
$html1 .='
<p align="center">-------------------------------------------------------------------------------------------------------------------------------------------------------------</p>


    <div style="border: 1px solid #000000; padding:10px">
      <p align="right"><b>สำหรับลูกค้า</b></p>
';
$html1 .='
<table width="100%" height="94" >
<tr>
  <td style="background-color:#55f40a">
     <h2 align="left">ใบนำฝากพิเศษ Special Pay-in Slip</h2>
  </td>
</tr>
</table>

<div class="no1">
    <p style="font-size:20px;" ><img src="img/logo.jpg" alt="1" height="70px" align="left">เลขประจำตัวผู้เสียภาษี 0505556000510</p>
    <p class="par">เพื่อเข้าบัญชี บจก.มิรดา คอร์ปอเรชั่น , กระแสรายวัน</p>
    <img src="img/logobank.png" width="30" height="25" >&nbsp; บมจ. ธนาคารกสิกรไทย เลขที่บัญชี 414-1-02985-7
</div>

<div class="no2">
    <p style="font-size:20px;">สาขาผู้รับฝาก...........................................วันที่/Date.......................</p>
    <div style="border: 1px solid #000000;">
    <p class="par2">ชื่อลูกค้า </p>
    <p class="par3">Name :         '. $dbarr['name'] .'</p>
    <p class="par2">เลขอ้างอิง 1 </p>
    <p class="par3">Ref 1 :          '. $dbarr['user'] .'</p>
    <p class="par2">เลขอ้างอิง 2 </p>
    <p class="par3">Ref 2 :          '.  DateDMY($dbarr['dill']) .' </p>
    </div>
</div>


<table class="table" width="100%" >
<tr>
  <td class="td" align="center" style="font-size:18px;">เงินสด(cash)</td>
  <td class="td" align="center" style="font-size:18px; background-color:#55f40a;">จำนวนเงินเป็นตัวอักษร (Amount in letter)</td>
  <td class="td" align="center" style="font-size:18px; background-color:#55f40a;">จำนวนเงินเป็นตัวเลข (Amount in Digit)</td>
</tr>
<tr>
<td class="td" style="font-size:18px;" align="center">บาท(Baht)</td>
<td class="td" style="font-size:18px;" align="center">'. bahtText($service) .'</td>
<td class="td" style="font-size:18px;" align="center">'. $service .'</td>
</tr>
<tr>
<td class="td" style="font-size:18px" colspan="2" valign="bottom">ผู้นำฝาก...................................................................................................................tel.................................................</td>
<td class="td" style="font-size:18px" align="center" height="55px" valign="top">เจ้าหน้าที่ธนาคาร</td>
</tr>
</table>
<p style="font-size:18px;">กรุณานำเอกสารนี้ไปแจ้งชำระเงินได้ที่ ธนาคารกสิกรไทย ทุกสาขาทั่วประเทศ</p>
</div>
  <p class="par5" color="red"><b>เอกสารนี้ ใช้สำหรับการฝากที่เคาน์เตอร์ ที่ธนาคาร กสิกร เท่านั้น</b></p>
  <p class="par5" color="red"><b>ไม่สามารถไปชำระที่เคาน์เตอร์เซอร์วิสใดๆ ได้ทั้งสิ้นนะคะ</b></p>
  <p class="par5" color="red"><b>การฝากโดยใช้ใบนำฝาก มีข้อดี โดยที่ลูกค้าไม่ต้องโทรหรือจ้งข้อมูลโอนคะ</b></p>
  <p class="par5" color="red"><b>มีปัญหา ติดต่อ @greenboxgps หรือ 088-2528227</b></p><br/>
';
?>


<?php
    $mpdf = new \Mpdf\Mpdf(
      ['mode' => 'utf-8', 'format' => 'A4',
      'default_font_size' => 16,
    	'default_font' => 'sarabun',
      'margin_top' => 10,
      'margin_left' => 1,
      'margin_right' => 1,
      'mirrorMargins' => true
    ]);
    $css = file_get_contents('css/style_pdf/pdf.css');
    $mpdf->writeHTML($css, 1);
    $mpdf->WriteHTML($html);
    $mpdf->WriteHTML($html1);
    $mpdf->Output();
   ?>
</body>

</html>
