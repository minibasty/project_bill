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
  require_once 'mpdf\vendor\autoload.php';
  include 'all_function.php';

  // if (!isset($_SESSION['login_true'])) {
  //    header("Location: index.php");
  //    exit;
  // }
  //include("1mm.php") ;
  //include("1yy.php") ;
  ?>

  <?php
  include("config.php");
  $inv_id = $_GET["inv_id"];

  $sql_inv = "SELECT `v_invoice_user`.* FROM `v_invoice_user` WHERE inv_id = $inv_id";
  $query_inv = $conn->query($sql_inv);
  $result_inv = $query_inv->fetch_assoc();

  $vatValue = isset($result_inv['inv_vat']) ? $result_inv['inv_vat'] : '';
  $withholdingValue = isset($result_inv['inv_withholding']) ? $result_inv['inv_withholding'] : '';


  $sql_ser = "SELECT `v_service_lists`.* FROM `v_service_lists` WHERE inv_id = $inv_id";
  $query_ser = $conn->query($sql_ser);
  $countServiceList = $query_ser->num_rows;



  $contents = '
<table class="table-sm" border="0" cellpadding="0" cellspacing="0" style="width:100%">
  <tr>
    <td colspan="" style="width: 65%"><img src="img/logo.jpg" width="" height="10%"></td>
    <td colspan="2" ><p style="font-size:32px;">ใบแจ้งหนี้</p><p style="font-size:26px">&nbsp;&nbsp;&nbsp;ต้นฉบับ(เอกสารออกเป็นชุด)</p></td>
  </tr>
  <tr>
    <td colspan=""><p>บริษัท มิรดา คอร์ปอเรชั่น จำกัด</p>
    <p>168 หมู่ 9 ต.อุโมงค์ อ.เมืองลำพูน จ.ลำพูน 51150</p> 
    <p>เลขประจำตัวผู้เสียภาษี 0505556000510 (สำนักงานใหญ่)</p>
    <p>โทร. 0931311728</p>
    <p>เบอร์มือถือ 0882528227</p>
    <p>โทรสาร. 052033703</p>
    <p>http://www.greenboxgps.com/</p>
    <p>&nbsp;</p>
    </td>
    <td valign="top">
    <p>เลขที่ </p>
    <p>วันที่ </p>
    <p>ผู้ขาย </p>
    <hr>
    <p>ชื่องาน </p>
    </td>
    <td valign="top">
    <p>' .$result_inv['invNo_prefix'] .$result_inv['invNo_all'] . '&nbsp;</p>
    <p>' . date("d/m/Y", strtotime($result_inv['inv_date'])) . '&nbsp;</p>
    <p>' . $result_inv['inv_email'] . '&nbsp;</p>
    <hr>
    <p>' . $result_inv['cus_user'] . '&nbsp;</p>
    </td>
  </tr>
  <tr>
  <td colspan="3"><p>ลูกค้า</p>
  <p>ชื่อ ' . $result_inv['inv_name'] . '</p>
  <p>ที่อยู่ ' . $result_inv['inv_address'] . '</p>
  <p>เลขประจำตัวผู้เสียภาษี ' . $result_inv['inv_taxno'] . '</p></td>
</tr>
</table>

<div>
<table style="margin-top: 10px;" border="0"  cellpadding="0" cellspacing="0">
  <tr bgcolor="#34cb34" class="text-white">
    <td width="5%" align="center">#</td>
    <td width="40%" align="center">รายละเอียด</td>
    <td width="10%" align="center">จำนวน</td>
    <td width="10%" align="center">ราคาต่อหน่วย</td>.
    <td width="10%" align="center">ยอดรวม</td>
  </tr>';
  $i_service = 0;
  $totalprice = 0;
  while ($result_ser = $query_ser->fetch_assoc()) {
    $i_service++;
    $totalprice += ($result_ser['inv_total_price']);


    $contents .= '<tr>
    
    <th width="5%">' . $i_service . '</th>
    <th align="left" width="40%" class="f-small">' . $result_ser['inv_list_name'] . ' | ' . $result_ser['inv_service_detail'] . ' ';
    echo $sql_items = "SELECT * FROM v_service_items WHERE  inv_service_id = $result_ser[inv_service_id]";
    $query_items = $conn->query($sql_items);
    $countItems = $query_items->num_rows;
    while ($result_items = $query_items->fetch_assoc()) {
      $contents .= '<span class="f-small">('.$result_items['address'].'/'.$result_items['amper']. '/'.$result_items['user']. ')</span>, ';
    }

    $contents .= '</th>
    <th align="center" width="10%">' . $countItems . '</th>
    <th align="right" width="10%">' . number_format(($result_ser['inv_total_price'] / $countItems),2) . '</th>
    <th align="right" width="10%">' . number_format($result_ser['inv_total_price'],2) . '</th>
  </tr>';
  }

  $totalPrice = $totalprice;


  $vatStrValue = $vatValue;
  if ($vatStrValue==1) {
      $vatStr = ($totalPrice-($totalPrice / 1.07));
      $priceNovat = ($totalPrice-$vat);
      $totalVat = ($vat + $priceNovat);
  }elseif ($vatStrValue==7) {
      $vatStr = ($totalPrice * (7/100));
      $priceNovat = ($totalPrice);
      $totalVat = ($vatStr + $totalPrice);
  }
  
      $withholding = ($totalVat * ($withholdingValue / 100));
      $totalPay = ($totalVat - $withholding);

      $totalPriceStr = number_format($totalprice, 2);
      $vatStr = number_format($vatStr, 2);
      $priceNovatStr = number_format($priceNovat,2);
      $totalVatStr = number_format(($totalVat), 2);
      $withholdingStr = number_format(($totalPrice * ($withholdingValue / 100)), 2);
      $totalPayStr = number_format(($totalVat - $withholding), 2);

  $contents .= '</table>
</div>

<div>
<table style="margin-top: 10px;" border="0"   cellpadding="0" cellspacing="0">
<tr>
    <th valign="bottom" align="left" colspan="2">(' . bahtText($totalVat) . ')</th>
    <th align="right" colspan="2" >
      <p>รวมเป็นเงิน<p/>
      <p>ภาษีมูลค่าเพิ่ม 7%<p/>';
      if ($vatStrValue=='1') {
        $contents .= '<p>ราคาไม่รวมภาษีมูลค่าเพิ่ม<p/>';
      }
      $contents .='<p>จำนวนเงินทั้งสิ้น<p/>
    </th>
    <th align="right"> 
      <p>' . $totalPriceStr . ' บาท<p/>
      <p>' . $vatStr . ' บาท<p/>';
      if ($vatStrValue=='1') {
        $contents .= '<p>'.$priceNovatStr.' บาท<p/>';
      }
      $contents .= '<p>' . $totalVatStr . ' บาท<p/>
    </th>
  </tr>
  <tr>
    <th align="right" colspan="4" ><p>&nbsp;</p><p>หักภาษี ณ ที่จ่าย '.$withholdingValue.'%<p/><p>ยอดชำระ<p/></th>
    <th align="right"><p>&nbsp;</p><p>'.$withholdingStr.' บาท<p/><p>' . $totalPayStr . ' บาท<p/></th>
  </tr>
</table>
</div>
';


  ?>

  <?php
  $mpdf = new \Mpdf\Mpdf(
    [
      'mode' => 'utf-8', 'format' => 'A4',
      'default_font_size' => 14,
      'default_font' => 'sarabun',
      'margin_top' => 9,
      'margin_left' => 9,
      'margin_right' => 9,
      'mirrorMargins' => true
    ]
  );

  $css = file_get_contents('invoice\css\pdf.css');
  $mpdf->writeHTML($css, 1);

  $mpdf->WriteHTML($contents);
  $mpdf->SetFooter($footer);

  $mpdf->Output();
  ?>
</body>

</html>