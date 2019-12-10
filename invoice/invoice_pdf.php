<head>
    <meta charset="utf-8">
    <title></title>


</head>

<style>
div.a {
    font-size: 50px;
}
</style>

<body>
    <?php
  require_once '..\mpdf\vendor\autoload.php';
  include'../function_date_thai.php';

  // if (!isset($_SESSION['login_true'])) {
  //    header("Location: index.php");
  //    exit;
  // }
//include("1mm.php") ;
//include("1yy.php") ;
  ?>

<?php 
    include("../config.php");
   echo $inv_id = $_POST["id"];

   echo $sql_inv = "SELECT
   `v_invoice_user`.*
 FROM
   `v_invoice_user`WHERE inv_id = $inv_id";
    $query_inv = $conn->query($sql_inv);
    $result_inv = $query_inv->fetch_assoc();

  echo $sql_ser = "SELECT
  `v_service_lists`.*
  FROM
  `v_service_lists` Where inv_id = $inv_id";
  $query_ser = $conn->query($sql_ser);
  $result_ser = $query_ser->fetch_assoc();

    $page6 = '
<table id="Evaluation" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5"><img src="../img/logo.jpg" width="30%" height="10%"></td>
    <td><p style="font-size:32px;">ใบกำกับภาษี/ใบเสร็จรับเงิน</p><p style="font-size:26px">&nbsp;&nbsp;&nbsp;ต้นฉบับ(เอกสารออกเป็นชุด)</p></td>
  </tr>
  <tr>
    <td colspan="5"><p>บริษัท มิรดา คอร์ปอเรชั่น จำกัด</p>
    <p>168 หมู่ 9 ต.อุโมงค์ อ.เมือง จ.ลำพูน 51150</p> 
    <p>เลขประจำตัวผู้เสียภาษี 0505556000510 (สำนักงานใหญ่)</p>
    <p>โทร. 0931311728</p>
    <p>เบอร์มือถือ 0882528227</p>
    <p>โทรสาร. 052033703</p>
    <p>http://www.greenboxgps.com/</p></td>
    <td valign="top"><p>เลขที่ '.$result_inv['invNo_all'].'</p>
    <p>วันที่ '.$result_inv['inv_date'].'</p>
    <p>ผู้ขาย '.$result_inv['inv_email'].'</p>
    <p>&nbsp;</p>
    <p>ชื่องาน </p>
    </td>
  </tr>

  <tr>
  <td colspan="6"><p>ลูกค้า</p>
  <p>ชื่อบริษัท '.$result_inv['inv_name'].'</p> 
  <p>ที่อยู่ '.$result_inv['inv_address'].'</p> 
  <p>เลขประจำตัวผู้เสียภาษี '.$result_inv['inv_taxno'].'</p></td>
</tr>
</table>

<div>
<table style="margin-top: 10px;" border="0" id="Evaluation"  cellpadding="0" cellspacing="0">
  <tr bgcolor="#34cb34">
    <td width="5%" align="center">#</td>
    <td width="40%" align="center">รายละเอียด</td>
    <td width="10%" align="center">จำนวน</td>
    <td width="10%" align="center">ราคาต่อหน่วย</td>
    <td width="10%" align="center">ยอดรวม</td>
  </tr>
  <tr>
    <th width="5%">1</th>
    <th align="left" width="40%">'.$result_ser['inv_list_name'].'</th>
    <th align="right" width="10%"></th>
    <th align="right" width="10%">'.$result_ser['inv_total_price'].'</th>
    <th align="right" width="10%">'.$result_inv['inv_total'].'</th>
  </tr>
  
</table>
</div>

<div>
<table style="margin-top: 10px;" border="0" id="Evaluation"  cellpadding="0" cellspacing="0">
<tr>
    <th valign="bottom" align="left" colspan="2">'.$result_inv['inv_total'].'</th>
    <th align="right" colspan="2" >
      <p>รวมเป็นเงิน<p/>
      <p>ภาษีมูลค่าเพิ่ม 7%<p/>
      <p>จำนวนเงินทั้งสิ้น<p/>
    </th>
    <th align="right"> 
      <p>'.$result_inv['inv_total'].' บาท<p/>
      <p>147.00 บาท<p/>
      <p>2,247.00 บาท<p/>
    </th>
  </tr>
  <tr>
    <th align="right" colspan="4" ><p>&nbsp;</p><p>หักภาษี ณ ที่จ่าย 3%<p/><p>ยอดชำระ<p/></th>
    <th align="right"><p>&nbsp;</p><p>63.00 บาท<p/><p>'.$result_inv['inv_total'].' บาท<p/></th>
  </tr>
</table>
</div>
';

$footer = '<div>
<table style="margin-top:10px" border="0" id="Evaluation"  cellpadding="0" cellspacing="0">
  <tr>
    <th align="left" colspan="6">การชำระเงินจะสมบูรณ์เมื่อบริษัทได้รับเงินเรียบร้อยแล้ว เงินสด / เช็ค / โอนเงิน / บัตรเครดิต</th>
  </tr>
  <tr>
    <th align="left" colspan="6">ธนาคารกสิกรไทย จำกัด(มหาชน) เลขที่ &nbsp;&nbsp; 4142392785 &nbsp;&nbsp; วันที่ &nbsp;&nbsp; 01/08/2019 &nbsp;&nbsp; จำนวนเงิน &nbsp;&nbsp; 2,184.00</th>
   </tr>
  <tr>
    <th align="left" colspan="4">ในนาม '.$result_inv['inv_name'].'</th>
    <th align="right" colspan="2">ในนาม บริษัท มิรดา คอร์ปอเรชั่น จำกัด</th>
  </tr>
  <tr>
    <th ><p>&nbsp;</p><p>ผู้จ่ายเงิน</p></th>
    <th align="left" valign="bottom" colspan="3">วันที่</th>
    <th ><p>&nbsp;</p><p>ผู้รับเงิน</p></th>
    <th ><p>&nbsp;</p><p>วันที่</p></th>
  </tr>
</table>
</div>'
?>

    <?php
$mpdf = new \Mpdf\Mpdf(
  ['mode' => 'utf-8', 'format' => 'A4',
  'default_font_size' => 14,
  'default_font' => 'sarabun',
  'margin_top' => 9,
  'margin_left' => 9,
  'margin_right' => 9,
  'mirrorMargins' => true
]);

$css = file_get_contents('css\pdf.css');
$mpdf->writeHTML($css, 1);

$mpdf->WriteHTML($page6);
$mpdf->SetFooter($footer);

$mpdf->Output();
?>
</body>

</html>