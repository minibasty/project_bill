<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/style_pdf/pdf.css">

</head>

<style>
  div.a {
    font-size: 50px;
  }
</style>

<body>
  <?php
  require_once __DIR__ . '/mpdf/vendor/autoload.php';
  include'function_date_thai.php';
  session_start() ;
  // if (!isset($_SESSION['login_true'])) {
  //    header("Location: index.php");
  //    exit;
  // }
//include("1mm.php") ;
//include("1yy.php") ;
  ?>
  <?php
  //ส่วนหัว
  $html='
<div id="content" class="container_12 clearfix">
    <div class="grid_8 style3" id="content-main" >
      <table>
        <tbody>
          <tr>
            <td><img src="img/logo.jpg" alt="1" height="70px" /> </td>
            <td style="font-size:18px;"> บริษัท มิรดา คอร์ปอเรชั่น จำกัด        ( MIRADA  Corporation  CO.,LTD.)<br />
              สำนักงานใหญ่    168 หมู่ 9 ตำบล อุโมง อำเภอ เมือง จังหวัด ลำพูน รหัสไปรษณีย์ 51150<br />
              http://www.greenboxgps.com  T. 093-1311728 , 088-2528227 FAX. 052-033703  </td>
          </tr>
        </tbody>
      </table>
      <div style="border: 1px solid #000000; padding:10px">
        <h1 class="head1"><b>หนังสือรับรองการติดตั้งเครื่องบันทึกข้อมูลการเดินรถ</b>
  ';
  include("config.php") ;
  // mysqli_select_db($db);
  $result = mysqli_query($conn,"select * from member where user='$_GET[user]'") or die ("Err Can not to result") ;
  $dbarr = mysqli_fetch_array($result) ;
  $signup = DateFull($dbarr['signup']);

  // create Date from Database
  $signupExp = new DateTime($dbarr['signup']); 

  // Add 12 mouth or 1 year
  $signupExp->add(new DateInterval('P1Y'));

  // set Date Format
  $signupExp = date_format($signupExp, 'Y-m-d');

  // Convert To Date Thai Full
  $signupExp = DateFull($signupExp);
  $html .='</h1>
        <p class="font1">เลขที่หนังสือ '. $dbarr['year'].'/'.$dbarr['age'].'-'.$dbarr['member_id'].'</p>
        <p class="font1 par">บริษัท  มิรดา คอร์ปอเรชั่น จำกัด ที่อยู่ เลขที่ 168 หมู่ 9 ตำบล อุโมง อำเภอ เมือง จังหวัด ลำพูน รหัสไปรษณีย์ 51150 โทรศัพท์ 093-131128
      โทรสาร 052033703 ได้ติดตั้งเครื่องบันทึกข้อมูลการเดินทาง ของรถรายละเอียดดังนี้
        </p>
       <p class="font1 tab"><b>การรับรองจากกรมการขนส่งทางบก เลขที่</b> '.$dbarr['car_approve_id'].'<br />
       <b>ชนิด</b> MEITRACK <b>แบบ</b> T333<br>
       <b>หมายเลขเครื่อง </b> '.$dbarr['zipcode'].'<br>
       <b>เครื่องอ่านแถบแม่เหล็ก ชนิด </b> Greenbox <b>แบบ</b> Z1<br>
       <b>วันที่ติดตั้ง </b>    '.$signup.'<br>
       <b>วันหมดอายุ </b>    '.$signupExp.'<br>
       <b>ชื่อผู้ประกอบการขนส่ง/เจ้าของรถ </b>  '.$dbarr['name'].'<br>
       <b>ยี่ห้อรถ </b> '.$dbarr['address'].' <br>
       <b>เลขทะเบียนรถ </b> '.$dbarr['amper'].'  ';
       if($dbarr['province2']=='000'){ $html.= 'ไม่ระบุจังหวัด'; }
       if($dbarr['province2']=='805'){ $html.= 'กระบี่'; }
          if($dbarr['province2']=='001'){ $html.= 'กรุงเทพมหานคร' ; }
          if($dbarr['province2']=='701'){ $html.= 'กาญจนบุรี' ; }
          if($dbarr['province2']=='406'){ $html.= 'กาฬสินธ์' ; }
          if($dbarr['province2']=='604'){ $html.= 'กำแพงเพชร' ; }
          if($dbarr['province2']=='405'){ $html.= 'ขอนแก่น' ; }
          if($dbarr['province2']=='205'){ $html.= 'จันทบุรี' ; }
          if($dbarr['province2']=='202'){ $html.= 'ฉะเชิงเทรา' ; }
          if($dbarr['province2']=='203'){ $html.= 'ชลบุรี' ; }
          if($dbarr['province2']=='100'){ $html.= 'ชัยนาท' ; }
          if($dbarr['province2']=='300'){ $html.= 'ชัยภูมิ' ; }
          if($dbarr['province2']=='800'){ $html.= 'ชุมพร' ; }
          if($dbarr['province2']=='901'){ $html.= 'ตรัง' ; }
          if($dbarr['province2']=='206'){ $html.= 'ตราด' ; }
          if($dbarr['province2']=='602'){ $html.= 'ตาก' ; }
          if($dbarr['province2']=='200'){ $html.= 'นครนายก' ; }
          if($dbarr['province2']=='702'){ $html.= 'นครปฐม' ; }
          if($dbarr['province2']=='403'){ $html.= 'นครพนม' ; }
          if($dbarr['province2']=='305'){ $html.= 'นครราชสีมา' ; }
          if($dbarr['province2']=='804'){ $html.= 'นครศรีธรรมราช' ; }
          if($dbarr['province2']=='607'){ $html.= 'นครสวรรค์' ; }
          if($dbarr['province2']=='107'){ $html.= 'นนทบุรี' ; }
          if($dbarr['province2']=='906'){ $html.= 'นราธิวาส' ; }
          if($dbarr['province2']=='504'){ $html.= 'น่าน' ; }
          if($dbarr['province2']=='309'){ $html.= 'บึงกาฬ' ; }
          if($dbarr['province2']=='904'){ $html.= 'บึตตานี' ; }
          if($dbarr['province2']=='304'){ $html.= 'บุรีรัมย์' ; }
          if($dbarr['province2']=='106'){ $html.= 'ปทุมธานี' ; }
          if($dbarr['province2']=='707'){ $html.= 'ประจวบคีรีขันธ์' ; }
          if($dbarr['province2']=='201'){ $html.= 'ปราจีนบุรี' ; }
          if($dbarr['province2']=='105'){ $html.= 'พระนครศรีอยุธยา' ; }
          if($dbarr['province2']=='503'){ $html.= 'พะเยา' ; }
          if($dbarr['province2']=='803'){ $html.= 'พังงา' ; }
          if($dbarr['province2']=='900'){ $html.= 'พัทลุง' ; }
          if($dbarr['province2']=='605'){ $html.= 'พิจิตร' ; }
          if($dbarr['province2']=='603'){ $html.= 'พิษณุโลก' ; }
          if($dbarr['province2']=='806'){ $html.= 'ภูเก็ต' ; }
          if($dbarr['province2']=='407'){ $html.= 'มหาสารคาม' ; }
          if($dbarr['province2']=='409'){ $html.= 'มุกดาหาร' ; }
          if($dbarr['province2']=='905'){ $html.= 'ยะลา' ; }
          if($dbarr['province2']=='301'){ $html.= 'ยโสธร' ; }
          if($dbarr['province2']=='801'){ $html.= 'ระนอง' ; }
          if($dbarr['province2']=='204'){ $html.= 'ระยอง' ; }
          if($dbarr['province2']=='703'){ $html.= 'ราชบุรี' ; }
          if($dbarr['province2']=='408'){ $html.= 'ร้อยเอ็ด' ; }
          if($dbarr['province2']=='102'){ $html.= 'ลพบุรี' ; }
          if($dbarr['province2']=='506'){ $html.= 'ลำปาง' ; }
          if($dbarr['province2']=='505'){ $html.= 'ลำพูน' ; }
          if($dbarr['province2']=='303'){ $html.= 'ศรีสะเกษ' ; }
          if($dbarr['province2']=='404'){ $html.= 'สกลนคร' ; }
          if($dbarr['province2']=='902'){ $html.= 'สงขลา' ; }
          if($dbarr['province2']=='903'){ $html.= 'สตูล' ; }
          if($dbarr['province2']=='108'){ $html.= 'สมุทรปราการ' ; }
          if($dbarr['province2']=='705'){ $html.= 'สมุทรสงคราม' ; }
          if($dbarr['province2']=='704'){ $html.= 'สมุทรสาคร' ; }
          if($dbarr['province2']=='104'){ $html.= 'สระบุรี' ; }
          if($dbarr['province2']=='207'){ $html.= 'สระแก้ว' ; }
          if($dbarr['province2']=='101'){ $html.= 'สิงห์บุรี' ; }
          if($dbarr['province2']=='700'){ $html.= 'สุพรรณบุรี' ; }
          if($dbarr['province2']=='802'){ $html.= 'สุราษฎร์ธานี' ; }
          if($dbarr['province2']=='306'){ $html.= 'สุรินทร์' ; }
          if($dbarr['province2']=='601'){ $html.= 'สุโขทัย' ; }
          if($dbarr['province2']=='400'){ $html.= 'หนองคาย' ; }
          if($dbarr['province2']=='308'){ $html.= 'หนองบัวลำภู' ; }
          if($dbarr['province2']=='307'){ $html.= 'อำนาจเจริญ' ; }
          if($dbarr['province2']=='402'){ $html.= 'อุดรธานี' ; }
          if($dbarr['province2']=='600'){ $html.= 'อุตรดิตถ์' ; }
          if($dbarr['province2']=='608'){ $html.= 'อุทัยธานี' ; }
          if($dbarr['province2']=='302'){ $html.= 'อุบลราชธานี' ; }
          if($dbarr['province2']=='103'){ $html.= 'อ่างทอง' ; }
          if($dbarr['province2']=='500'){ $html.= 'เชียงราย' ; }
          if($dbarr['province2']=='502'){ $html.= 'เชียงใหม่' ; }
          if($dbarr['province2']=='606'){ $html.= 'เพชรบุรณ์' ; }
          if($dbarr['province2']=='706'){ $html.= 'เพชรบุรี' ; }
          if($dbarr['province2']=='401'){ $html.= 'เลย' ; }
          if($dbarr['province2']=='507'){ $html.= 'แพร่' ; }
          if($dbarr['province2']=='501'){ $html.= 'แม่ฮ่องสอน' ; }
        $html .='</tab1><br>
       <tab1><b>หมายเลขคัสซี  </b>'.$dbarr['user'].'</tab1><br>
       <tab1><b>ชนิดการจดทะเบียน  </b>';
        if($dbarr['register_type']=='0'){ $html.= 'ไม่มีข้อมูลประเภทและชนิดรถ' ; }
        if($dbarr['register_type']=='1000'){ $html.= 'รถโดยสารไมได้ระบุมาตรฐานรถและประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1101'){ $html.= 'รถโดยสาร มาตรฐาน 1 ก ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1111'){ $html.= 'รถโดยสาร มาตรฐาน 1 ก ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1121'){ $html.= 'รถโดยสาร มาตรฐาน 1 ก ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1131'){ $html.= 'รถโดยสาร มาตรฐาน 1 ก ประจำทาง' ; }
        if($dbarr['register_type']=='1102'){ $html.= 'รถโดยสาร มาตรฐาน 1 ข ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1112'){ $html.= 'รถโดยสาร มาตรฐาน 1 ข ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1122'){ $html.= 'รถโดยสาร มาตรฐาน 1 ข ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1132'){ $html.= 'รถโดยสาร มาตรฐาน 1 ข ประจำทาง' ; }
        if($dbarr['register_type']=='1201'){ $html.= 'รถโดยสาร มาตรฐาน 2 ก ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1211'){ $html.= 'รถโดยสาร มาตรฐาน 2 ก ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1221'){ $html.= 'รถโดยสาร มาตรฐาน 2 ก ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1231'){ $html.= 'รถโดยสาร มาตรฐาน 2 ก ประจำทาง' ; }
        if($dbarr['register_type']=='1202'){ $html.= 'รถโดยสาร มาตรฐาน 2 ข ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1212'){ $html.= 'รถโดยสาร มาตรฐาน 2 ข ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1222'){ $html.= 'รถโดยสาร มาตรฐาน 2 ข ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1232'){ $html.= 'รถโดยสาร มาตรฐาน 2 ข ประจำทาง' ; }
        if($dbarr['register_type']=='1203'){ $html.= 'รถโดยสาร มาตรฐาน 2 ค ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1213'){ $html.= 'รถโดยสาร มาตรฐาน 2 ค ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1223'){ $html.= 'รถโดยสาร มาตรฐาน 2 ค ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1233'){ $html.= 'รถโดยสาร มาตรฐาน 2 ค ประจำทาง' ; }
        if($dbarr['register_type']=='1204'){ $html.= 'รถโดยสาร มาตรฐาน 2 ง ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1214'){ $html.= 'รถโดยสาร มาตรฐาน 2 ง ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1224'){ $html.= 'รถโดยสาร มาตรฐาน 2 ง ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1234'){ $html.= 'รถโดยสาร มาตรฐาน 2 ง ประจำทาง' ; }
        if($dbarr['register_type']=='1205'){ $html.= 'รถโดยสาร มาตรฐาน 2 จ ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1215'){ $html.= 'รถโดยสาร มาตรฐาน 2 จ ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1225'){ $html.= 'รถโดยสาร มาตรฐาน 2 จ ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1235'){ $html.= 'รถโดยสาร มาตรฐาน 2 จ ประจำทาง' ; }
        if($dbarr['register_type']=='1301'){ $html.= 'รถโดยสาร มาตรฐาน 3 ก ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1311'){ $html.= 'รถโดยสาร มาตรฐาน 3 ก ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1321'){ $html.= 'รถโดยสาร มาตรฐาน 3 ก ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1331'){ $html.= 'รถโดยสาร มาตรฐาน 3 ก ประจำทาง' ; }
        if($dbarr['register_type']=='1302'){ $html.= 'รถโดยสาร มาตรฐาน 3 ข ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1312'){ $html.= 'รถโดยสาร มาตรฐาน 3 ข ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1322'){ $html.= 'รถโดยสาร มาตรฐาน 3 ข ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1332'){ $html.= 'รถโดยสาร มาตรฐาน 3 ข ประจำทาง' ; }
        if($dbarr['register_type']=='1303'){ $html.= 'รถโดยสาร มาตรฐาน 3 ค ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1313'){ $html.= 'รถโดยสาร มาตรฐาน 3 ค ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1323'){ $html.= 'รถโดยสาร มาตรฐาน 3 ค ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1333'){ $html.= 'รถโดยสาร มาตรฐาน 3 ค ประจำทาง' ; }
        if($dbarr['register_type']=='1304'){ $html.= 'รถโดยสาร มาตรฐาน 3 ง ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1314'){ $html.= 'รถโดยสาร มาตรฐาน 3 ง ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1324'){ $html.= 'รถโดยสาร มาตรฐาน 3 ง ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1334'){ $html.= 'รถโดยสาร มาตรฐาน 3 ง ประจำทาง' ; }
        if($dbarr['register_type']=='1305'){ $html.= 'รถโดยสาร มาตรฐาน 3 จ ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1315'){ $html.= 'รถโดยสาร มาตรฐาน 3 จ ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1325'){ $html.= 'รถโดยสาร มาตรฐาน 3 จ ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1335'){ $html.= 'รถโดยสาร มาตรฐาน 3 จ ประจำทาง' ; }
        if($dbarr['register_type']=='1306'){ $html.= 'รถโดยสาร มาตรฐาน 3 ฉ ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1316'){ $html.= 'รถโดยสาร มาตรฐาน 3 ฉ ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1326'){ $html.= 'รถโดยสาร มาตรฐาน 3 ฉ ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1336'){ $html.= 'รถโดยสาร มาตรฐาน 3 ฉ ประจำทาง' ; }
        if($dbarr['register_type']=='1401'){ $html.= 'รถโดยสาร มาตรฐาน 4 ก ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1411'){ $html.= 'รถโดยสาร มาตรฐาน 4 ก ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1421'){ $html.= 'รถโดยสาร มาตรฐาน 4 ก ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1431'){ $html.= 'รถโดยสาร มาตรฐาน 4 ก ประจำทาง' ; }
        if($dbarr['register_type']=='1402'){ $html.= 'รถโดยสาร มาตรฐาน 4 ข ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1412'){ $html.= 'รถโดยสาร มาตรฐาน 4 ข ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1422'){ $html.= 'รถโดยสาร มาตรฐาน 4 ข ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1432'){ $html.= 'รถโดยสาร มาตรฐาน 4 ข ประจำทาง' ; }
        if($dbarr['register_type']=='1403'){ $html.= 'รถโดยสาร มาตรฐาน 4 ค ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1413'){ $html.= 'รถโดยสาร มาตรฐาน 4 ค ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1423'){ $html.= 'รถโดยสาร มาตรฐาน 4 ค ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1433'){ $html.= 'รถโดยสาร มาตรฐาน 4 ค ประจำทาง' ; }
        if($dbarr['register_type']=='1404'){ $html.= 'รถโดยสาร มาตรฐาน 4 ง ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1414'){ $html.= 'รถโดยสาร มาตรฐาน 4 ง ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1424'){ $html.= 'รถโดยสาร มาตรฐาน 4 ง ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1434'){ $html.= 'รถโดยสาร มาตรฐาน 4 ง ประจำทาง' ; }
        if($dbarr['register_type']=='1405'){ $html.= 'รถโดยสาร มาตรฐาน 4 จ ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1415'){ $html.= 'รถโดยสาร มาตรฐาน 4 จ ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1425'){ $html.= 'รถโดยสาร มาตรฐาน 4 จ ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1435'){ $html.= 'รถโดยสาร มาตรฐาน 4 จ ประจำทาง' ; }
        if($dbarr['register_type']=='1406'){ $html.= 'รถโดยสาร มาตรฐาน 4 ฉ ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1416'){ $html.= 'รถโดยสาร มาตรฐาน 4 ฉ ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1426'){ $html.= 'รถโดยสาร มาตรฐาน 4 ฉ ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1436'){ $html.= 'รถโดยสาร มาตรฐาน 4 ฉ ประจำทาง' ; }
        if($dbarr['register_type']=='1501'){ $html.= 'รถโดยสาร มาตรฐาน 5 ก ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1511'){ $html.= 'รถโดยสาร มาตรฐาน 5 ก ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1521'){ $html.= 'รถโดยสาร มาตรฐาน 5 ก ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1531'){ $html.= 'รถโดยสาร มาตรฐาน 5 ก ประจำทาง' ; }
        if($dbarr['register_type']=='1502'){ $html.= 'รถโดยสาร มาตรฐาน 5 ข ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1512'){ $html.= 'รถโดยสาร มาตรฐาน 5 ข ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1522'){ $html.= 'รถโดยสาร มาตรฐาน 5 ข ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1532'){ $html.= 'รถโดยสาร มาตรฐาน 5 ข ประจำทาง' ; }
        if($dbarr['register_type']=='1601'){ $html.= 'รถโดยสาร มาตรฐาน 6 ก ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1611'){ $html.= 'รถโดยสาร มาตรฐาน 6 ก ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1621'){ $html.= 'รถโดยสาร มาตรฐาน 6 ก ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1631'){ $html.= 'รถโดยสาร มาตรฐาน 6 ก ประจำทาง' ; }
        if($dbarr['register_type']=='1602'){ $html.= 'รถโดยสาร มาตรฐาน 6 ข ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1612'){ $html.= 'รถโดยสาร มาตรฐาน 6 ข ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1622'){ $html.= 'รถโดยสาร มาตรฐาน 6 ข ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='1632'){ $html.= 'รถโดยสาร มาตรฐาน 6 ข ประจำทาง' ; }
        if($dbarr['register_type']=='1700'){ $html.= 'รถโดยสาร มาตรฐาน 7 ไม่ได้ระบุประเภทการขนส่ง' ; }
        if($dbarr['register_type']=='1710'){ $html.= 'รถโดยสาร มาตรฐาน 7 ส่วนบุคคล' ; }
        if($dbarr['register_type']=='1720'){ $html.= 'รถโดยสาร มาตรฐาน 7 ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='2000'){ $html.= 'รถบรรทุก ไม่ได้ระบุลักษณะและประเภทรถ' ; }
        if($dbarr['register_type']=='2100'){ $html.= 'รถบรรทุก ลักษณะ 1 ไม่ได้ระบุประเภทรถ' ; }
        if($dbarr['register_type']=='2110'){ $html.= 'รถบรรทุก ลักษณะ 1 ส่วนบุคคล' ; }
        if($dbarr['register_type']=='2120'){ $html.= 'รถบรรทุก ลักษณะ 1 ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='2200'){ $html.= 'รถบรรทุก ลักษณะ 2 ไม่ได้ระบุประเภทรถ' ; }
        if($dbarr['register_type']=='2210'){ $html.= 'รถบรรทุก ลักษณะ 2 ส่วนบุคคล' ; }
        if($dbarr['register_type']=='2220'){ $html.= 'รถบรรทุก ลักษณะ 2 ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='2300'){ $html.= 'รถบรรทุก ลักษณะ 3 ไม่ได้ระบุประเภทรถ' ; }
        if($dbarr['register_type']=='2310'){ $html.= 'รถบรรทุก ลักษณะ 3 ส่วนบุคคล' ; }
        if($dbarr['register_type']=='2320'){ $html.= 'รถบรรทุก ลักษณะ 3 ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='2400'){ $html.= 'รถบรรทุก ลักษณะ 4 ไม่ได้ระบุประเภทรถ' ; }
        if($dbarr['register_type']=='2410'){ $html.= 'รถบรรทุก ลักษณะ 4 ส่วนบุคคล' ; }
        if($dbarr['register_type']=='2420'){ $html.= 'รถบรรทุก ลักษณะ 4 ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='2500'){ $html.= 'รถบรรทุก ลักษณะ 5 ไม่ได้ระบุประเภทรถ' ; }
        if($dbarr['register_type']=='2510'){ $html.= 'รถบรรทุก ลักษณะ 5 ส่วนบุคคล' ; }
        if($dbarr['register_type']=='2520'){ $html.= 'รถบรรทุก ลักษณะ 5 ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='2600'){ $html.= 'รถบรรทุก ลักษณะ 6 ไม่ได้ระบุประเภทรถ' ; }
        if($dbarr['register_type']=='2610'){ $html.= 'รถบรรทุก ลักษณะ 6 ส่วนบุคคล' ; }
        if($dbarr['register_type']=='2620'){ $html.= 'รถบรรทุก ลักษณะ 6 ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='2700'){ $html.= 'รถบรรทุก ลักษณะ 7 ไม่ได้ระบุประเภทรถ' ; }
        if($dbarr['register_type']=='2710'){ $html.= 'รถบรรทุก ลักษณะ 7 ส่วนบุคคล' ; }
        if($dbarr['register_type']=='2720'){ $html.= 'รถบรรทุก ลักษณะ 7 ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='2800'){ $html.= 'รถบรรทุก ลักษณะ 8 ไม่ได้ระบุประเภทรถ' ; }
        if($dbarr['register_type']=='2810'){ $html.= 'รถบรรทุก ลักษณะ 8 ส่วนบุคคล' ; }
        if($dbarr['register_type']=='2820'){ $html.= 'รถบรรทุก ลักษณะ 8 ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='2900'){ $html.= 'รถบรรทุก ลักษณะ 9 ไม่ได้ระบุประเภทรถ' ; }
        if($dbarr['register_type']=='2910'){ $html.= 'รถบรรทุก ลักษณะ 9 ส่วนบุคคล' ; }
        if($dbarr['register_type']=='2920'){ $html.= 'รถบรรทุก ลักษณะ 9 ไม่ประจำทาง' ; }
        if($dbarr['register_type']=='3000'){ $html.= 'รถยนต์ ไม่ระบุประเภทรถ' ; }
        if($dbarr['register_type']=='3010'){ $html.= 'รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)' ; }
        if($dbarr['register_type']=='3011'){ $html.= 'รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)' ; }
        if($dbarr['register_type']=='3012'){ $html.= 'รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)' ; }
        if($dbarr['register_type']=='3013'){ $html.= 'รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)' ; }
        if($dbarr['register_type']=='3014'){ $html.= 'รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)' ; }
        if($dbarr['register_type']=='3020'){ $html.= 'รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)' ; }
        if($dbarr['register_type']=='3021'){ $html.= 'รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)' ; }
        if($dbarr['register_type']=='3022'){ $html.= 'รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)' ; }
        if($dbarr['register_type']=='3023'){ $html.= 'รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)' ; }
        if($dbarr['register_type']=='3024'){ $html.= 'รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)' ; }
        if($dbarr['register_type']=='3025'){ $html.= 'รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)' ; }
        if($dbarr['register_type']=='3030'){ $html.= 'รถยนต์บรรทุกส่วนบุคคล (รย.3)' ; }
        if($dbarr['register_type']=='3031'){ $html.= 'รถยนต์บรรทุกส่วนบุคคล (รย.ร)' ; }
        if($dbarr['register_type']=='3032'){ $html.= 'รถยนต์บรรทุกส่วนบุคคล (รย.ร)' ; }
        if($dbarr['register_type']=='3033'){ $html.= 'รถยนต์บรรทุกส่วนบุคคล (รย.ร)' ; }
        if($dbarr['register_type']=='3040'){ $html.= 'รถยนต์สามล้อส่วนบุคคล (รย.4)' ; }
        if($dbarr['register_type']=='3041'){ $html.= 'รถยนต์สามล้อส่วนบุคคล (รย.4)' ; }
        if($dbarr['register_type']=='3042'){ $html.= 'รถยนต์สามล้อส่วนบุคคล (รย.4)' ; }
        if($dbarr['register_type']=='3043'){ $html.= 'รถยนต์สามล้อส่วนบุคคล (รย.4)' ; }
        if($dbarr['register_type']=='3044'){ $html.= 'รถยนต์สามล้อส่วนบุคคล (รย.4)' ; }
        if($dbarr['register_type']=='3050'){ $html.= 'รถยนต์รับจ้างระหว่างจังหวัด (รย.ร)' ; }
        if($dbarr['register_type']=='3060'){ $html.= 'รถยนต์รับจ้างบรรทุกคนโดยสารไม่เกินเจ็ดคน (รย.6)' ; }
        if($dbarr['register_type']=='3070'){ $html.= 'รถยนต์สี่ล้อเล็กรับจ้าง (รย.7)' ; }
        if($dbarr['register_type']=='3080'){ $html.= 'รถยนต์รับจ้างสามล้อ (รย.8)' ; }
        if($dbarr['register_type']=='3090'){ $html.= 'รถยนต์บริการธุรกิจ (รย.9)' ; }
        if($dbarr['register_type']=='3100'){ $html.= 'รถยนต์บริการทัศนาจร (รย.10)' ; }
        if($dbarr['register_type']=='3110'){ $html.= 'รถยนต์บริการให้เช่า (รย.11)' ; }
        if($dbarr['register_type']=='4120'){ $html.= 'รถจักรยานยนต์ (รย.12)' ; }
        if($dbarr['register_type']=='3130'){ $html.= 'รถแทรกเตอร์ (รย.13)' ; }
        if($dbarr['register_type']=='3140'){ $html.= 'รถบดถนน (รย.14)' ; }
        if($dbarr['register_type']=='3150'){ $html.= 'รถใช้งานเกษตรกรรม (รย.15)' ; }
        if($dbarr['register_type']=='3160'){ $html.= 'รถพ่วง (รย.16)' ; }
        if($dbarr['register_type']=='4170'){ $html.= 'รถจักรยานยนต์สาธารณะ (รย.17)' ; }

       $html .='</tab1><br>
       <tab1><b>ติดต่อ  </b>'.$dbarr['contrack'].'</tab1><br>
       <tab1><b>หมายเหตุ</b>
........................................................................................................................................</tab1><br>
       <tab1>ขอรับรองว่าเครื่องบันทึกข้อมูลการเดินทางของรถดังกล่าวข้างต้นมีคุณลักษณะและระบบการทำงานที่ได้</tab1></p>
        <p class="tab font1"><tab1>รับรองจากกรมการขนส่งทางบก</tab1></p>
        <p class="tab font1">กรณีเครื่องบันทึกข้อมูลการเดินทาง
          ของรถมีคุณลักษณะหรือระบบการทำงานไม่เป็นไปตามที่กรมการขนส่งทางบกได้ให้การ
          รับรองหรือมีการ รายงานข้อมูลไม่ตรงกับข้อเท็จจริงหรือไม่สามารถรายงานข้อมูล
          ได้ตามที่กรมการขนส่งทางบกกำหนด <br />
          บริษัท  มิรดา คอร์ปอเรชั่น จำกัด
          ยินยอมรับผิดชอบต่อความเสียหายทั้งหมดที่เกิดขึ้นต่อเจ้าของรถหรือผู้ประกอบ
          การขนส่งที่ได้ซื้อหรือใช้ บริการเครื่องบันทึกข้อมูลการเดินทางของรถดัง
          กล่าวทุกประการ</p><br />

        <div>
          <table style="margin: 0 0 0em;" width="100%">
              <tbody><tr><td rowspan="4" width="60%">
              <td class="font1" style="text-align: center;">ออกให้ ณ วันที่   '.$dbarr['date'].' '.$dbarr['sex'].' '.$dbarr['year'].'</td></tr>
              <tr><td style="text-align: center;" class="font1"><BR>ลงชื่อ......................................................................</td></tr>
              <tr><td style="text-align: center;" class="font1"> ( '.$dbarr['education'].' )</td></tr>
              <tr><td style="text-align: center;" class="font1">'.$dbarr['work'].'</td></tr>
          </tbody></table>
       </div>

      </div>
        <p><b>หมายเหตุ :</b></p>
        <p class="font1 par">
        1.ชนิดและแบบของเครื่องบันทึกข้อมูลการเดินทางของรถและ เครื่องอ่านบัตรชนิดแถบแม่เหล็กให้เป็นไปตามรายละเอียดที่ได้รับการรับรอง จาก กรมขนส่งทางบก</p>
        <p class="font1 par" style="margin-top:0px">
        2.กรณีเป็นการติดตั้งเครื่องใหม่ทดแทนของเดิมให้ระบุราย
ละเอียดของเครื่องบันทึกข้อมูลการเดินทางของรถเครื่องเดิมในช่องหมายเหตุ
เช่น ผู้ให้บริการเดิม ชนิดและแบบเดิม หมายเลขเครื่องเดิม</p>
  </div>
  ';

   ?>
  <!-- <======================================end page1=======================================> -->


  <!-- <======================================start page2=======================================> -->
  <?php



  $html2 ='<div id="div" class="container_12 clearfix">
          <div id="div2" class="grid_8">

            <table width="497" border="1" cellpadding="0" cellspacing="0" style="margin: 0 0 0em;">
              <tbody>
                <tr>
                  <td align="center"><img src="img/logo_1.jpg" height="100" width="100"></td>
                  <td rowspan="2" style="padding: 5px;"><span class="font2"><b>การรับรองจากกรมการขนส่งทางบก เลขที่</b> 207/2560<br />
                      <b>ชนิด</b> iStartek <b>แบบ</b> T333 <br />
                        <b>หมายเลขเครื่อง </b>'.$dbarr["zipcode"] .'<br />
                        <b>เลขทะเบียนรถ </b> '. $dbarr["amper"] .'  ';
                        if($dbarr['province2']=='000'){ $html2.= 'ไม่ระบุจังหวัด'; }
                        if($dbarr['province2']=='805'){ $html2.= 'กระบี่'; }
                   if($dbarr["province2"]=="407"){ $html2.= "มหาสารคาม" ; }
                   if($dbarr["province2"]=="001"){ $html2.= "กรุงเทพมหานคร" ; }
                   if($dbarr["province2"]=="701"){ $html2.= "กาญจนบุรี" ; }
                   if($dbarr["province2"]=="406"){ $html2.= "กาฬสินธ์" ; }
                   if($dbarr["province2"]=="604"){ $html2.= "กำแพงเพชร" ; }
                   if($dbarr["province2"]=="405"){ $html2.= "ขอนแก่น" ; }
                   if($dbarr["province2"]=="205"){ $html2.= "จันทบุรี" ; }
                   if($dbarr["province2"]=="202"){ $html2.= "ฉะเชิงเทรา" ; }
                   if($dbarr["province2"]=="203"){ $html2.= "ชลบุรี" ; }
                   if($dbarr["province2"]=="100"){ $html2.= "ชัยนาท" ; }
                   if($dbarr["province2"]=="300"){ $html2.= "ชัยภูมิ" ; }
                   if($dbarr["province2"]=="800"){ $html2.= "ชุมพร" ; }
                   if($dbarr["province2"]=="901"){ $html2.= "ตรัง" ; }
                   if($dbarr["province2"]=="206"){ $html2.= "ตราด" ; }
                   if($dbarr["province2"]=="602"){ $html2.= "ตาก" ; }
                   if($dbarr["province2"]=="200"){ $html2.= "นครนายก" ; }
                   if($dbarr["province2"]=="702"){ $html2.= "นครปฐม" ; }
                   if($dbarr["province2"]=="403"){ $html2.= "นครพนม" ; }
                   if($dbarr["province2"]=="305"){ $html2.= "นครราชสีมา" ; }
                   if($dbarr["province2"]=="804"){ $html2.= "นครศรีธรรมราช" ; }
                   if($dbarr["province2"]=="607"){ $html2.= "นครสวรรค์" ; }
                   if($dbarr["province2"]=="107"){ $html2.= "นนทบุรี" ; }
                   if($dbarr["province2"]=="906"){ $html2.= "นราธิวาส" ; }
                   if($dbarr["province2"]=="504"){ $html2.= "น่าน" ; }
                   if($dbarr["province2"]=="309"){ $html2.= "บึงกาฬ" ; }
                   if($dbarr["province2"]=="904"){ $html2.= "บึตตานี" ; }
                   if($dbarr["province2"]=="304"){ $html2.= "บุรีรัมย์" ; }
                   if($dbarr["province2"]=="106"){ $html2.= "ปทุมธานี" ; }
                   if($dbarr["province2"]=="707"){ $html2.= "ประจวบคีรีขันธ์" ; }
                   if($dbarr["province2"]=="201"){ $html2.= "ปราจีนบุรี" ; }
                   if($dbarr["province2"]=="105"){ $html2.= "พระนครศรีอยุธยา" ; }
                   if($dbarr["province2"]=="503"){ $html2.= "พะเยา" ; }
                   if($dbarr["province2"]=="803"){ $html2.= "พังงา" ; }
                   if($dbarr["province2"]=="900"){ $html2.= "พัทลุง" ; }
                   if($dbarr["province2"]=="605"){ $html2.= "พิจิตร" ; }
                   if($dbarr["province2"]=="603"){ $html2.= "พิษณุโลก" ; }
                   if($dbarr["province2"]=="806"){ $html2.= "ภูเก็ต" ; }
                   if($dbarr["province2"]=="409"){ $html2.= "มุกดาหาร" ; }
                   if($dbarr["province2"]=="905"){ $html2.= "ยะลา" ; }
                   if($dbarr["province2"]=="301"){ $html2.= "ยโสธร" ; }
                   if($dbarr["province2"]=="801"){ $html2.= "ระนอง" ; }
                   if($dbarr["province2"]=="204"){ $html2.= "ระยอง" ; }
                   if($dbarr["province2"]=="703"){ $html2.= "ราชบุรี" ; }
                   if($dbarr["province2"]=="408"){ $html2.= "ร้อยเอ็ด" ; }
                   if($dbarr["province2"]=="102"){ $html2.= "ลพบุรี" ; }
                   if($dbarr["province2"]=="506"){ $html2.= "ลำปาง" ; }
                   if($dbarr["province2"]=="505"){ $html2.= "ลำพูน" ; }
                   if($dbarr["province2"]=="303"){ $html2.= "ศรีสะเกษ" ; }
                   if($dbarr["province2"]=="404"){ $html2.= "สกลนคร" ; }
                   if($dbarr["province2"]=="902"){ $html2.= "สงขลา" ; }
                   if($dbarr["province2"]=="903"){ $html2.= "สตูล" ; }
                   if($dbarr["province2"]=="108"){ $html2.= "สมุทรปราการ" ; }
                   if($dbarr["province2"]=="705"){ $html2.= "สมุทรสงคราม" ; }
                   if($dbarr["province2"]=="704"){ $html2.= "สมุทรสาคร" ; }
                   if($dbarr["province2"]=="104"){ $html2.= "สระบุรี" ; }
                   if($dbarr["province2"]=="207"){ $html2.= "สระแก้ว" ; }
                   if($dbarr["province2"]=="101"){ $html2.= "สิงห์บุรี" ; }
                   if($dbarr["province2"]=="700"){ $html2.= "สุพรรณบุรี" ; }
                   if($dbarr["province2"]=="802"){ $html2.= "สุราษฎร์ธานี" ; }
                   if($dbarr["province2"]=="306"){ $html2.= "สุรินทร์" ; }
                   if($dbarr["province2"]=="601"){ $html2.= "สุโขทัย" ; }
                   if($dbarr["province2"]=="400"){ $html2.= "หนองคาย" ; }
                   if($dbarr["province2"]=="308"){ $html2.= "หนองบัวลำภู" ; }
                   if($dbarr["province2"]=="307"){ $html2.= "อำนาจเจริญ" ; }
                   if($dbarr["province2"]=="402"){ $html2.= "อุดรธานี" ; }
                   if($dbarr["province2"]=="600"){ $html2.= "อุตรดิตถ์" ; }
                   if($dbarr["province2"]=="608"){ $html2.= "อุทัยธานี" ; }
                   if($dbarr["province2"]=="302"){ $html2.= "อุบลราชธานี" ; }
                   if($dbarr["province2"]=="103"){ $html2.= "อ่างทอง" ; }
                   if($dbarr["province2"]=="500"){ $html2.= "เชียงราย" ; }
                   if($dbarr["province2"]=="502"){ $html2.= "เชียงใหม่" ; }
                   if($dbarr["province2"]=="606"){ $html2.= "เพชรบุรณ์" ; }
                   if($dbarr["province2"]=="706"){ $html2.= "เพชรบุรี" ; }
                   if($dbarr["province2"]=="401"){ $html2.= "เลย" ; }
                   if($dbarr["province2"]=="507"){ $html2.= "แพร่" ; }
                   if($dbarr["province2"]=="501"){ $html2.= "แม่ฮ่องสอน" ; }
  $html2 .='<br />
                        <b>หมายเลขคัสซี </b>'.$dbarr["user"].'<br />
                        <b>ผู้ให้บริการระบบติดตามรถ </b>บริษัท  มิรดา คอร์ปอเรชั่น จำกัด<br />
                        <b>วันที่ติดตั้ง</b>  '.$signup.'
                        <b>วันหมดอายุ</b> '.$signupExp.'</span></td>
                </tr>
                <tr>
                  <td align="center"  class="text-center"><img src="img/logo.jpg" height="" width="120" /></td>
                </tr>
              </tbody>
            </table>
          </div>
          <br />
          <div id="div5" class="container_12">
            <div class="grid_6">
              <!-- <p class="footer-links"><a href="#">Aliquam</a> | <a href="#">Iincidunt</a> | <a href="#">Mauris eu risus</a> | <a href="#">Consectetur</a></p> -->
            </div>
            <div class="grid_6">
              <!-- <p>&copy; All images copyright to their respective owners - courtousy of <a href="http://flickholdr.com/">http://flickholdr.com/</a></p> -->
            </div>
          </div>
        </div>
        <p class="tab blue">
        http://'.$dbarr["email"].'<br/>
        User : '.$dbarr["phone"].'<br/>
        Pass  :&nbsp;123456</p>
        <p class="tab red" style="color:white;" > <strong> เบอร์โทรในเครื่อง GPS :&nbsp;';
    if($dbarr["sim"]=="0"){ echo "True" ; }
    if($dbarr["sim"]=="AIS"){ echo "AIS" ; }
    if($dbarr["sim"]=="3"){ echo "AIS" ; }
    if($dbarr["sim"]=="True"){ echo "True" ; }
    if($dbarr["sim"]=="DTAC"){ echo "DTAC" ; }
    if($dbarr["sim"]=="5"){ echo "DTAC" ; }
  $html2 .='&nbsp;'.$dbarr["simno"] .'</strong></p>';
?>
  <!-- <============================================end page2==========================================> -->

  <!-- <============================================start page3==========================================> -->

  <?php
$html3 .='<div class="" style="margin:0px;">
          <div align="center">
          <img src="img/logo.jpg" alt="cc" width="223" height="116">
          </div>
          <div style="text-align: center;">
          <p style="font-size: 40px" class="red"> <strong> ข้อตกลงการใช้บริการ</strong></p>
          </div>
          <ol class="font1">
          <li>ตามประกาศกรมการขนส่งทางบก รถบรรทุกและรถโดยสารต้องติดตั้ง GPS ทุกคัน บริษัทฯมีการเรียกเก็บค่าบริการเป็นรายเดือน หรือรายปี แล้วแต่แพคเกจที่ลูกค้าเลือก ณ.วันติดตั้ง ผู้ใช้บริการหรือเจ้าของรถ จำเป็นต้องชำระค่าบริการทุกเดือน หรือ ทุกปี ตาม แพคเกจที่ลูกค้าเลือก ณ.วันติดตั้ง</li>
          <li>หากชำระค่าบริการล่าช้าจะมีค่าปรับเพิ่มเติมเดือนละ 100 บาท การไม่ชำระค่าบริการรายเดือน มีผลต่อประกันตัวเครื่องชำระค่าบริการราย<br />เดือน / ปี ล่าช้าเกินกว่า 30 วัน ตัวเครื่องจะหมดประกันในทันที</li>
          <li>ทางบริษัทฯจะทำการตัดการเชื่อมต่อกรมการขนส่งทางบก และ ส่งรายงานให้กรมการขนส่งทางบก หากลูกค้าไม่ชำระค่าบริการราย<br /> เดือน / ปี เกินกว่า 30 วัน<br/></li>
          <li>ลูกค้าจำเป็นต้องดู User ของตัวเองทุกวันหากพบว่า GPS Offline (รูปรถสีแดง) ต้องแจ้งให้ทางบริษัทฯ ทราบโดยเร็วที่สุดเพื่อทางบริษัทฯ จะส่งเจ้าหน้าที่เข้าทำการแก้ไขโดยเร็วที่สุดกรณีรถซ่อมถอดแบตฯ หรือกิจกรรมใดๆที่อาจจะทำให้ GPSดับได้ ต้องแจ้งให้ทางบริษัทฯทราบ<br/>
          <font class="font16">
          4.1 GPS OFFLINE เกิน 24 ชั่วโมง ต้องแจ้งทางบริษัทฯ ภายใน 24 ชั่วโมง<br/>
          4.2 ลูกค้าปล่อย GPS OFFLINE เกิน 72 ชั่วโมงโดยไม่แจ้งทางบริษัทฯ ตัวเครื่องจะหมดประกันในทันที และทางบริษัทฯขอสงวนสิทธิ์ยกเลิกสัญญาให้บริการทันที โดยไม่ต้องแจ้งให้ทราบล่วงหน้า<br/>
          </font>
          </li>
          <li>หากพบว่า GPS ทำงานผิดปกติต้องแจ้งให้ทางบริษัทฯทราบโดยเร็วที่สุดเพื่อทางบริษัทฯ จะส่งเจ้าหน้าที่เข้าทำการแก้ไขโดยเร็วที่สุด</li>
          <li>การใช้เครื่องมือหรือ อุปกรณ์ กวนสัญญาณ หรือ ตัดสัญญาณ GPS/ GSM เป็นสาเหตุทำให้โมดูล GPS และ GSM ชำรุดใช้งานไม่ได้อีกต่อไป <br> เป็นผลให้หมดประกันในทันทีและทางบริษัทฯมีสิทธ์ยกเลิกการให้บริการทันที โดยไม่จำเป็นต้องแจ้งเป็นลายลักษณ์อักษร</li>
          <li>ความพยายามถอดเครื่องดัดแปลงแก้ไขระบบ GPS เพื่อการทุจริตมีความผิดตามกฎหมายและทางบริษัทฯ ไม่มีนโยบายช่วยเหลือลูกค้าในเรื่อง ดังกล่าว</li>
          <li>ตัวเครื่องรับประกันตลอดอายุการใช้งาน<br/>
          <font class="font16">
          8.1. ต้องชำระค่าบริการรายเดือนครบและตรงตามกำหนด<br/>
          8.2. ตัวเครื่องต้องไม่มีการแก้ไขใดๆ โดยผู้ที่มิใช่ช่างจากทางบริษัทฯ<br/>
          8.3. ภัยธรรมชาติ อุบัติเหตุ ความประมาทเลินเล่อของผู้ใช้ ไม่รับประกันและจะหมดประกันในทันที<br/>
          8.4. หากมีการพยายามทำลายเครื่องถือว่าหมดประกันในทันที<br/>
          8.5. ถอดเครื่อง งัด หรือ แก้ไขเครื่องหากไม่ได้ทำโดยช่างของทางบริษัทฯถือว่าหมดประกันในทันท<br/>
          8.6. การย้ายเครื่องไป ใช้ ของบริษัทฯ อื่นๆ ถือว่าหมดประกันทันทีทุกกรณี<br/>
          8.7. การย้ายคันต้องกระทำภายใน 3 ปี นับจากติดตั้งในรถคันแรกการย้ายคันหลังปีที่ 3 ถือว่าหมดประกัน<br/>
          </font>
          </li>
          <li>การทุจริตใดๆ ที่ทำให้ทางบริษัทเดือดร้อนหรือทางบริษัทฯ ต้องมีปัญหากับกรมการขนส่งทางบกรวมทั้ง เป็นต้นเหตุให้ทางบริษัทฯต้องเสียค่าปรับ ทางบริษัทฯจะ ยกเลิกการให้บริการทันทีโดยไม่จำเป็นต้องแจ้งให้ทราบล่วงหน้า และไม่ต้องแจ้งเป็นลายลักษณ์อักษร ทั้งนี้ลูกค้าเป็นรับผิดชอบ ค่าใช้จ่ายที่เกิดขึ้นทั้งหมด และต้องชดใช้ค่าเสียเวลา ค่าปรับ ค่าเสียผลประโยชน์ทั้งหมดด้วย
          </li>
                    <li>ถ้าเปลี่ยนเลขทะเบียน หรือ มีการเปลี่ยนแปลง ใดๆ ในรายการจดทะเบียน ต้องแจ้งทางบริษัท ภายใน 24 ช่วโมง เกินจากนั้น ขอยกเลิกบริการทันที โดยไม่ต้องแจ้งให้ทราบล่วงหน้า และตัวลูกค้าเองจะมีค่าปรับจากกรมขนส่งฯ</li>
        
                    <li>ค่าปรับ หรือ ค่าใช้จ่ายใดๆ ที่เกี่ยวข้องกับรถลูกค้า ลูกค้าเป็นผู้รับผิดชอบทุกกรณีย์ และไม่มีข้อยกเว้น</li>
                    </ol>
                    <br/>
                  <div style="text-align: center;" class="red font16"> ( ส่วนที่ 1 ลูกค้าเก็บไว้ เอกสารนี้ลงลายมือชื่อก่อนการติดตั้ง )</div>
                  <table  width="79%" height="59%" border="1" align="center">
                    <tbody>
                      <tr>
                        <td width="61%" height="78" bordercolor="#FF0000" bgcolor="#FFFFFF" style="text-align: center;">
                        <div align="left">
                        <span class="style19">เลขทะเบียนรถ : '.$dbarr['amper'].'  ';
                        if($dbarr['province2']=='000'){ $html3.= 'ไม่ระบุจังหวัด'; }
                        if($dbarr['province2']=='805'){ $html3.= 'กระบี่'; }
                        if($dbarr["province2"]=="407"){ $html3.= "มหาสารคาม" ; }
                        if($dbarr["province2"]=="001"){ $html3.= "กรุงเทพมหานคร" ; }
                        if($dbarr["province2"]=="701"){ $html3.= "กาญจนบุรี" ; }
                        if($dbarr["province2"]=="406"){ $html3.= "กาฬสินธ์" ; }
                        if($dbarr["province2"]=="604"){ $html3.= "กำแพงเพชร" ; }
                        if($dbarr["province2"]=="405"){ $html3.= "ขอนแก่น" ; }
                        if($dbarr["province2"]=="205"){ $html3.= "จันทบุรี" ; }
                        if($dbarr["province2"]=="202"){ $html3.= "ฉะเชิงเทรา" ; }
                        if($dbarr["province2"]=="203"){ $html3.= "ชลบุรี" ; }
                        if($dbarr["province2"]=="100"){ $html3.= "ชัยนาท" ; }
                        if($dbarr["province2"]=="300"){ $html3.= "ชัยภูมิ" ; }
                        if($dbarr["province2"]=="800"){ $html3.= "ชุมพร" ; }
                        if($dbarr["province2"]=="901"){ $html3.= "ตรัง" ; }
                        if($dbarr["province2"]=="206"){ $html3.= "ตราด" ; }
                        if($dbarr["province2"]=="602"){ $html3.= "ตาก" ; }
                        if($dbarr["province2"]=="200"){ $html3.= "นครนายก" ; }
                        if($dbarr["province2"]=="702"){ $html3.= "นครปฐม" ; }
                        if($dbarr["province2"]=="403"){ $html3.= "นครพนม" ; }
                        if($dbarr["province2"]=="305"){ $html3.= "นครราชสีมา" ; }
                        if($dbarr["province2"]=="804"){ $html3.= "นครศรีธรรมราช" ; }
                        if($dbarr["province2"]=="607"){ $html3.= "นครสวรรค์" ; }
                        if($dbarr["province2"]=="107"){ $html3.= "นนทบุรี" ; }
                        if($dbarr["province2"]=="906"){ $html3.= "นราธิวาส" ; }
                        if($dbarr["province2"]=="504"){ $html3.= "น่าน" ; }
                        if($dbarr["province2"]=="309"){ $html3.= "บึงกาฬ" ; }
                        if($dbarr["province2"]=="904"){ $html3.= "บึตตานี" ; }
                        if($dbarr["province2"]=="304"){ $html3.= "บุรีรัมย์" ; }
                        if($dbarr["province2"]=="106"){ $html3.= "ปทุมธานี" ; }
                        if($dbarr["province2"]=="707"){ $html3.= "ประจวบคีรีขันธ์" ; }
                        if($dbarr["province2"]=="201"){ $html3.= "ปราจีนบุรี" ; }
                        if($dbarr["province2"]=="105"){ $html3.= "พระนครศรีอยุธยา" ; }
                        if($dbarr["province2"]=="503"){ $html3.= "พะเยา" ; }
                        if($dbarr["province2"]=="803"){ $html3.= "พังงา" ; }
                        if($dbarr["province2"]=="900"){ $html3.= "พัทลุง" ; }
                        if($dbarr["province2"]=="605"){ $html3.= "พิจิตร" ; }
                        if($dbarr["province2"]=="603"){ $html3.= "พิษณุโลก" ; }
                        if($dbarr["province2"]=="806"){ $html3.= "ภูเก็ต" ; }
                        if($dbarr["province2"]=="409"){ $html3.= "มุกดาหาร" ; }
                        if($dbarr["province2"]=="905"){ $html3.= "ยะลา" ; }
                        if($dbarr["province2"]=="301"){ $html3.= "ยโสธร" ; }
                        if($dbarr["province2"]=="801"){ $html3.= "ระนอง" ; }
                        if($dbarr["province2"]=="204"){ $html3.= "ระยอง" ; }
                        if($dbarr["province2"]=="703"){ $html3.= "ราชบุรี" ; }
                        if($dbarr["province2"]=="408"){ $html3.= "ร้อยเอ็ด" ; }
                        if($dbarr["province2"]=="102"){ $html3.= "ลพบุรี" ; }
                        if($dbarr["province2"]=="506"){ $html3.= "ลำปาง" ; }
                        if($dbarr["province2"]=="505"){ $html3.= "ลำพูน" ; }
                        if($dbarr["province2"]=="303"){ $html3.= "ศรีสะเกษ" ; }
                        if($dbarr["province2"]=="404"){ $html3.= "สกลนคร" ; }
                        if($dbarr["province2"]=="902"){ $html3.= "สงขลา" ; }
                        if($dbarr["province2"]=="903"){ $html3.= "สตูล" ; }
                        if($dbarr["province2"]=="108"){ $html3.= "สมุทรปราการ" ; }
                        if($dbarr["province2"]=="705"){ $html3.= "สมุทรสงคราม" ; }
                        if($dbarr["province2"]=="704"){ $html3.= "สมุทรสาคร" ; }
                        if($dbarr["province2"]=="104"){ $html3.= "สระบุรี" ; }
                        if($dbarr["province2"]=="207"){ $html3.= "สระแก้ว" ; }
                        if($dbarr["province2"]=="101"){ $html3.= "สิงห์บุรี" ; }
                        if($dbarr["province2"]=="700"){ $html3.= "สุพรรณบุรี" ; }
                        if($dbarr["province2"]=="802"){ $html3.= "สุราษฎร์ธานี" ; }
                        if($dbarr["province2"]=="306"){ $html3.= "สุรินทร์" ; }
                        if($dbarr["province2"]=="601"){ $html3.= "สุโขทัย" ; }
                        if($dbarr["province2"]=="400"){ $html3.= "หนองคาย" ; }
                        if($dbarr["province2"]=="308"){ $html3.= "หนองบัวลำภู" ; }
                        if($dbarr["province2"]=="307"){ $html3.= "อำนาจเจริญ" ; }
                        if($dbarr["province2"]=="402"){ $html3.= "อุดรธานี" ; }
                        if($dbarr["province2"]=="600"){ $html3.= "อุตรดิตถ์" ; }
                        if($dbarr["province2"]=="608"){ $html3.= "อุทัยธานี" ; }
                        if($dbarr["province2"]=="302"){ $html3.= "อุบลราชธานี" ; }
                        if($dbarr["province2"]=="103"){ $html3.= "อ่างทอง" ; }
                        if($dbarr["province2"]=="500"){ $html3.= "เชียงราย" ; }
                        if($dbarr["province2"]=="502"){ $html3.= "เชียงใหม่" ; }
                        if($dbarr["province2"]=="606"){ $html3.= "เพชรบุรณ์" ; }
                        if($dbarr["province2"]=="706"){ $html3.= "เพชรบุรี" ; }
                        if($dbarr["province2"]=="401"){ $html3.= "เลย" ; }
                        if($dbarr["province2"]=="507"){ $html3.= "แพร่" ; }
                        if($dbarr["province2"]=="501"){ $html3.= "แม่ฮ่องสอน" ; }

              $html3 .='<br /> <p>เลขคัทซี : '.$dbarr['user'].'</p>
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

              ';

?>
    <?php
    $html4 ='<div class="" style="margin:0px;">
          <div align="center">
          <img src="img/logo.jpg" alt="cc" width="223" height="116">
          </div>
          <div style="text-align: center;">
          <p style="font-size: 40px" class="red"> <strong> ข้อตกลงการใช้บริการ</strong></p>
          </div>
          <ol class="font1">
          <li>ตามประกาศกรมการขนส่งทางบก รถบรรทุกและรถโดยสารต้องติดตั้ง GPS ทุกคัน บริษัทฯมีการเรียกเก็บค่าบริการเป็นรายเดือน หรือรายปี แล้วแต่แพคเกจที่ลูกค้าเลือก ณ.วันติดตั้ง ผู้ใช้บริการหรือเจ้าของรถ จำเป็นต้องชำระค่าบริการทุกเดือน หรือ ทุกปี ตาม แพคเกจที่ลูกค้าเลือก ณ.วันติดตั้ง</li>
          <li>หากชำระค่าบริการล่าช้าจะมีค่าปรับเพิ่มเติมเดือนละ 100 บาท การไม่ชำระค่าบริการรายเดือน มีผลต่อประกันตัวเครื่องชำระค่าบริการราย<br />เดือน / ปี ล่าช้าเกินกว่า 30 วัน ตัวเครื่องจะหมดประกันในทันที</li>
          <li>ทางบริษัทฯจะทำการตัดการเชื่อมต่อกรมการขนส่งทางบก และ ส่งรายงานให้กรมการขนส่งทางบก หากลูกค้าไม่ชำระค่าบริการราย<br /> เดือน / ปี เกินกว่า 30 วัน<br/></li>
          <li>ลูกค้าจำเป็นต้องดู User ของตัวเองทุกวันหากพบว่า GPS Offline (รูปรถสีแดง) ต้องแจ้งให้ทางบริษัทฯ ทราบโดยเร็วที่สุดเพื่อทางบริษัทฯ จะส่งเจ้าหน้าที่เข้าทำการแก้ไขโดยเร็วที่สุดกรณีรถซ่อมถอดแบตฯ หรือกิจกรรมใดๆที่อาจจะทำให้ GPSดับได้ ต้องแจ้งให้ทางบริษัทฯทราบ<br/>
          <font class="font16">
          4.1 GPS OFFLINE เกิน 24 ชั่วโมง ต้องแจ้งทางบริษัทฯ ภายใน 24 ชั่วโมง<br/>
          4.2 ลูกค้าปล่อย GPS OFFLINE เกิน 72 ชั่วโมงโดยไม่แจ้งทางบริษัทฯ ตัวเครื่องจะหมดประกันในทันที และทางบริษัทฯขอสงวนสิทธิ์ยกเลิกสัญญาให้บริการทันที โดยไม่ต้องแจ้งให้ทราบล่วงหน้า<br/>
          </font>
          </li>
          <li>หากพบว่า GPS ทำงานผิดปกติต้องแจ้งให้ทางบริษัทฯทราบโดยเร็วที่สุดเพื่อทางบริษัทฯ จะส่งเจ้าหน้าที่เข้าทำการแก้ไขโดยเร็วที่สุด</li>
          <li>การใช้เครื่องมือหรือ อุปกรณ์ กวนสัญญาณ หรือ ตัดสัญญาณ GPS/ GSM เป็นสาเหตุทำให้โมดูล GPS และ GSM ชำรุดใช้งานไม่ได้อีกต่อไป <br> เป็นผลให้หมดประกันในทันทีและทางบริษัทฯมีสิทธ์ยกเลิกการให้บริการทันที โดยไม่จำเป็นต้องแจ้งเป็นลายลักษณ์อักษร</li>
          <li>ความพยายามถอดเครื่องดัดแปลงแก้ไขระบบ GPS เพื่อการทุจริตมีความผิดตามกฎหมายและทางบริษัทฯ ไม่มีนโยบายช่วยเหลือลูกค้าในเรื่อง ดังกล่าว</li>
          <li>ตัวเครื่องรับประกันตลอดอายุการใช้งาน<br/>
          <font class="font16">
          8.1. ต้องชำระค่าบริการรายเดือนครบและตรงตามกำหนด<br/>
          8.2. ตัวเครื่องต้องไม่มีการแก้ไขใดๆ โดยผู้ที่มิใช่ช่างจากทางบริษัทฯ<br/>
          8.3. ภัยธรรมชาติ อุบัติเหตุ ความประมาทเลินเล่อของผู้ใช้ ไม่รับประกันและจะหมดประกันในทันที<br/>
          8.4. หากมีการพยายามทำลายเครื่องถือว่าหมดประกันในทันที<br/>
          8.5. ถอดเครื่อง งัด หรือ แก้ไขเครื่องหากไม่ได้ทำโดยช่างของทางบริษัทฯถือว่าหมดประกันในทันท<br/>
          8.6. การย้ายเครื่องไป ใช้ ของบริษัทฯ อื่นๆ ถือว่าหมดประกันทันทีทุกกรณี<br/>
          8.7. การย้ายคันต้องกระทำภายใน 3 ปี นับจากติดตั้งในรถคันแรกการย้ายคันหลังปีที่ 3 ถือว่าหมดประกัน<br/>
          </font>
          </li>
          <li>การทุจริตใดๆ ที่ทำให้ทางบริษัทเดือดร้อนหรือทางบริษัทฯ ต้องมีปัญหากับกรมการขนส่งทางบกรวมทั้ง เป็นต้นเหตุให้ทางบริษัทฯต้องเสียค่าปรับ ทางบริษัทฯจะ ยกเลิกการให้บริการทันทีโดยไม่จำเป็นต้องแจ้งให้ทราบล่วงหน้า และไม่ต้องแจ้งเป็นลายลักษณ์อักษร ทั้งนี้ลูกค้าเป็นรับผิดชอบ ค่าใช้จ่ายที่เกิดขึ้นทั้งหมด และต้องชดใช้ค่าเสียเวลา ค่าปรับ ค่าเสียผลประโยชน์ทั้งหมดด้วย
          </li>
                    <li>ถ้าเปลี่ยนเลขทะเบียน หรือ มีการเปลี่ยนแปลง ใดๆ ในรายการจดทะเบียน ต้องแจ้งทางบริษัท ภายใน 24 ช่วโมง เกินจากนั้น ขอยกเลิกบริการทันที โดยไม่ต้องแจ้งให้ทราบล่วงหน้า และตัวลูกค้าเองจะมีค่าปรับจากกรมขนส่งฯ</li>
                    <li>ค่าปรับ หรือ ค่าใช้จ่ายใดๆ ที่เกี่ยวข้องกับรถลูกค้า ลูกค้าเป็นผู้รับผิดชอบทุกกรณีย์ และไม่มีข้อยกเว้น</li>
                    </ol>
                    <br/>
                  <div style="text-align: center;" class="red font16"> ( ส่วนที่ 2 เก็บไว้ที่บริษัทฯ เอกสารนี้ลงลายมือชื่อก่อนการติดตั้ง )</div>
                  <table  width="79%" height="59%" border="1" align="center">
                    <tbody>
                      <tr>
                        <td width="61%" height="78" bordercolor="#FF0000" bgcolor="#FFFFFF" style="text-align: center;">
                        <div align="left">
                        <span class="style19">เลขทะเบียนรถ : '.$dbarr['amper'].'  ';
                        if($dbarr['province2']=='000'){ $html4.= 'ไม่ระบุจังหวัด'; }
                        if($dbarr['province2']=='805'){ $html4.= 'กระบี่'; }
                        if($dbarr["province2"]=="407"){ $html4.= "มหาสารคาม" ; }
                        if($dbarr["province2"]=="001"){ $html4.= "กรุงเทพมหานคร" ; }
                        if($dbarr["province2"]=="701"){ $html4.= "กาญจนบุรี" ; }
                        if($dbarr["province2"]=="406"){ $html4.= "กาฬสินธ์" ; }
                        if($dbarr["province2"]=="604"){ $html4.= "กำแพงเพชร" ; }
                        if($dbarr["province2"]=="405"){ $html4.= "ขอนแก่น" ; }
                        if($dbarr["province2"]=="205"){ $html4.= "จันทบุรี" ; }
                        if($dbarr["province2"]=="202"){ $html4.= "ฉะเชิงเทรา" ; }
                        if($dbarr["province2"]=="203"){ $html4.= "ชลบุรี" ; }
                        if($dbarr["province2"]=="100"){ $html4.= "ชัยนาท" ; }
                        if($dbarr["province2"]=="300"){ $html4.= "ชัยภูมิ" ; }
                        if($dbarr["province2"]=="800"){ $html4.= "ชุมพร" ; }
                        if($dbarr["province2"]=="901"){ $html4.= "ตรัง" ; }
                        if($dbarr["province2"]=="206"){ $html4.= "ตราด" ; }
                        if($dbarr["province2"]=="602"){ $html4.= "ตาก" ; }
                        if($dbarr["province2"]=="200"){ $html4.= "นครนายก" ; }
                        if($dbarr["province2"]=="702"){ $html4.= "นครปฐม" ; }
                        if($dbarr["province2"]=="403"){ $html4.= "นครพนม" ; }
                        if($dbarr["province2"]=="305"){ $html4.= "นครราชสีมา" ; }
                        if($dbarr["province2"]=="804"){ $html4.= "นครศรีธรรมราช" ; }
                        if($dbarr["province2"]=="607"){ $html4.= "นครสวรรค์" ; }
                        if($dbarr["province2"]=="107"){ $html4.= "นนทบุรี" ; }
                        if($dbarr["province2"]=="906"){ $html4.= "นราธิวาส" ; }
                        if($dbarr["province2"]=="504"){ $html4.= "น่าน" ; }
                        if($dbarr["province2"]=="309"){ $html4.= "บึงกาฬ" ; }
                        if($dbarr["province2"]=="904"){ $html4.= "บึตตานี" ; }
                        if($dbarr["province2"]=="304"){ $html4.= "บุรีรัมย์" ; }
                        if($dbarr["province2"]=="106"){ $html4.= "ปทุมธานี" ; }
                        if($dbarr["province2"]=="707"){ $html4.= "ประจวบคีรีขันธ์" ; }
                        if($dbarr["province2"]=="201"){ $html4.= "ปราจีนบุรี" ; }
                        if($dbarr["province2"]=="105"){ $html4.= "พระนครศรีอยุธยา" ; }
                        if($dbarr["province2"]=="503"){ $html4.= "พะเยา" ; }
                        if($dbarr["province2"]=="803"){ $html4.= "พังงา" ; }
                        if($dbarr["province2"]=="900"){ $html4.= "พัทลุง" ; }
                        if($dbarr["province2"]=="605"){ $html4.= "พิจิตร" ; }
                        if($dbarr["province2"]=="603"){ $html4.= "พิษณุโลก" ; }
                        if($dbarr["province2"]=="806"){ $html4.= "ภูเก็ต" ; }
                        if($dbarr["province2"]=="409"){ $html4.= "มุกดาหาร" ; }
                        if($dbarr["province2"]=="905"){ $html4.= "ยะลา" ; }
                        if($dbarr["province2"]=="301"){ $html4.= "ยโสธร" ; }
                        if($dbarr["province2"]=="801"){ $html4.= "ระนอง" ; }
                        if($dbarr["province2"]=="204"){ $html4.= "ระยอง" ; }
                        if($dbarr["province2"]=="703"){ $html4.= "ราชบุรี" ; }
                        if($dbarr["province2"]=="408"){ $html4.= "ร้อยเอ็ด" ; }
                        if($dbarr["province2"]=="102"){ $html4.= "ลพบุรี" ; }
                        if($dbarr["province2"]=="506"){ $html4.= "ลำปาง" ; }
                        if($dbarr["province2"]=="505"){ $html4.= "ลำพูน" ; }
                        if($dbarr["province2"]=="303"){ $html4.= "ศรีสะเกษ" ; }
                        if($dbarr["province2"]=="404"){ $html4.= "สกลนคร" ; }
                        if($dbarr["province2"]=="902"){ $html4.= "สงขลา" ; }
                        if($dbarr["province2"]=="903"){ $html4.= "สตูล" ; }
                        if($dbarr["province2"]=="108"){ $html4.= "สมุทรปราการ" ; }
                        if($dbarr["province2"]=="705"){ $html4.= "สมุทรสงคราม" ; }
                        if($dbarr["province2"]=="704"){ $html4.= "สมุทรสาคร" ; }
                        if($dbarr["province2"]=="104"){ $html4.= "สระบุรี" ; }
                        if($dbarr["province2"]=="207"){ $html4.= "สระแก้ว" ; }
                        if($dbarr["province2"]=="101"){ $html4.= "สิงห์บุรี" ; }
                        if($dbarr["province2"]=="700"){ $html4.= "สุพรรณบุรี" ; }
                        if($dbarr["province2"]=="802"){ $html4.= "สุราษฎร์ธานี" ; }
                        if($dbarr["province2"]=="306"){ $html4.= "สุรินทร์" ; }
                        if($dbarr["province2"]=="601"){ $html4.= "สุโขทัย" ; }
                        if($dbarr["province2"]=="400"){ $html4.= "หนองคาย" ; }
                        if($dbarr["province2"]=="308"){ $html4.= "หนองบัวลำภู" ; }
                        if($dbarr["province2"]=="307"){ $html4.= "อำนาจเจริญ" ; }
                        if($dbarr["province2"]=="402"){ $html4.= "อุดรธานี" ; }
                        if($dbarr["province2"]=="600"){ $html4.= "อุตรดิตถ์" ; }
                        if($dbarr["province2"]=="608"){ $html4.= "อุทัยธานี" ; }
                        if($dbarr["province2"]=="302"){ $html4.= "อุบลราชธานี" ; }
                        if($dbarr["province2"]=="103"){ $html4.= "อ่างทอง" ; }
                        if($dbarr["province2"]=="500"){ $html4.= "เชียงราย" ; }
                        if($dbarr["province2"]=="502"){ $html4.= "เชียงใหม่" ; }
                        if($dbarr["province2"]=="606"){ $html4.= "เพชรบุรณ์" ; }
                        if($dbarr["province2"]=="706"){ $html4.= "เพชรบุรี" ; }
                        if($dbarr["province2"]=="401"){ $html4.= "เลย" ; }
                        if($dbarr["province2"]=="507"){ $html4.= "แพร่" ; }
                        if($dbarr["province2"]=="501"){ $html4.= "แม่ฮ่องสอน" ; }

              $html4 .='<br /> <p>เลขคัทซี : '.$dbarr['user'].'</p>
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

              ';

?>
<?php
if ($dbarr['promo']=="") {
  $sql_promo="SELECT * FROM promotions WHERE promo_default='1'";
  $qr_promo=$conn->query($sql_promo);
  $row_promo=$qr_promo->fetch_assoc();
  $promo=$row_promo['promo_pic'];
}else{
  $promoDb=strtolower($dbarr['promo']);
  $sql_promo="SELECT * FROM promotions WHERE promo_code='$promoDb'";
  $qr_promo=$conn->query($sql_promo);
  $row_promo=$qr_promo->fetch_assoc();
  $promo=$row_promo['promo_pic'];
}

$html5 ='<p align="center"><img src="img/promo/'.$promo.'" width="651" height="409" /></p>
<div style="border: 5px solid greenyellow;">
<table width="809" height="264" border="0" align="center">
<tr>
  <td width="791" height="258"><strong><span class="style6">http://'.$dbarr['email'].'</span><br />
        </strong><span class="blue"><strong>User : <span class="red"> <b>'.$dbarr['phone'] .'</b> </span> <span class="style8">แจ้งเปลี่ยนชื่อ user ได้</span>    password : 123456<br />
      ทะเบียนรถ :<span class="red"> <b>'.$dbarr['amper'].'  ';
      if($dbarr['province2']=='000'){ $html5.= 'ไม่ระบุจังหวัด'; }
      if($dbarr['province2']=='805'){ $html5.= 'กระบี่'; }
      if($dbarr['province2']=="407"){ $html5.= "มหาสารคาม" ; }
      if($dbarr['province2']=="001"){ $html5.= "กรุงเทพมหานคร" ; }
      if($dbarr['province2']=="701"){ $html5.= "กาญจนบุรี" ; }
      if($dbarr['province2']=="406"){ $html5.= "กาฬสินธ์" ; }
      if($dbarr['province2']=="604"){ $html5.= "กำแพงเพชร" ; }
      if($dbarr['province2']=="405"){ $html5.= "ขอนแก่น" ; }
      if($dbarr['province2']=="205"){ $html5.= "จันทบุรี" ; }
      if($dbarr['province2']=="202"){ $html5.= "ฉะเชิงเทรา" ; }
      if($dbarr['province2']=="203"){ $html5.= "ชลบุรี" ; }
      if($dbarr['province2']=="100"){ $html5.= "ชัยนาท" ; }
      if($dbarr['province2']=="300"){ $html5.= "ชัยภูมิ" ; }
      if($dbarr['province2']=="800"){ $html5.= "ชุมพร" ; }
      if($dbarr['province2']=="901"){ $html5.= "ตรัง" ; }
      if($dbarr['province2']=="206"){ $html5.= "ตราด" ; }
      if($dbarr['province2']=="602"){ $html5.= "ตาก" ; }
      if($dbarr['province2']=="200"){ $html5.= "นครนายก" ; }
      if($dbarr['province2']=="702"){ $html5.= "นครปฐม" ; }
      if($dbarr['province2']=="403"){ $html5.= "นครพนม" ; }
      if($dbarr['province2']=="305"){ $html5.= "นครราชสีมา" ; }
      if($dbarr['province2']=="804"){ $html5.= "นครศรีธรรมราช" ; }
      if($dbarr['province2']=="607"){ $html5.= "นครสวรรค์" ; }
      if($dbarr['province2']=="107"){ $html5.= "นนทบุรี" ; }
      if($dbarr['province2']=="906"){ $html5.= "นราธิวาส" ; }
      if($dbarr['province2']=="504"){ $html5.= "น่าน" ; }
      if($dbarr['province2']=="309"){ $html5.= "บึงกาฬ" ; }
      if($dbarr['province2']=="904"){ $html5.= "บึตตานี" ; }
      if($dbarr['province2']=="304"){ $html5.= "บุรีรัมย์" ; }
      if($dbarr['province2']=="106"){ $html5.= "ปทุมธานี" ; }
      if($dbarr['province2']=="707"){ $html5.= "ประจวบคีรีขันธ์" ; }
      if($dbarr['province2']=="201"){ $html5.= "ปราจีนบุรี" ; }
      if($dbarr['province2']=="105"){ $html5.= "พระนครศรีอยุธยา" ; }
      if($dbarr['province2']=="503"){ $html5.= "พะเยา" ; }
      if($dbarr['province2']=="803"){ $html5.= "พังงา" ; }
      if($dbarr['province2']=="900"){ $html5.= "พัทลุง" ; }
      if($dbarr['province2']=="605"){ $html5.= "พิจิตร" ; }
      if($dbarr['province2']=="603"){ $html5.= "พิษณุโลก" ; }
      if($dbarr['province2']=="806"){ $html5.= "ภูเก็ต" ; }
      if($dbarr['province2']=="409"){ $html5.= "มุกดาหาร" ; }
      if($dbarr['province2']=="905"){ $html5.= "ยะลา" ; }
      if($dbarr['province2']=="301"){ $html5.= "ยโสธร" ; }
      if($dbarr['province2']=="801"){ $html5.= "ระนอง" ; }
      if($dbarr['province2']=="204"){ $html5.= "ระยอง" ; }
      if($dbarr['province2']=="703"){ $html5.= "ราชบุรี" ; }
      if($dbarr['province2']=="408"){ $html5.= "ร้อยเอ็ด" ; }
      if($dbarr['province2']=="102"){ $html5.= "ลพบุรี" ; }
      if($dbarr['province2']=="506"){ $html5.= "ลำปาง" ; }
      if($dbarr['province2']=="505"){ $html5.= "ลำพูน" ; }
      if($dbarr['province2']=="303"){ $html5.= "ศรีสะเกษ" ; }
      if($dbarr['province2']=="404"){ $html5.= "สกลนคร" ; }
      if($dbarr['province2']=="902"){ $html5.= "สงขลา" ; }
      if($dbarr['province2']=="903"){ $html5.= "สตูล" ; }
      if($dbarr['province2']=="108"){ $html5.= "สมุทรปราการ" ; }
      if($dbarr['province2']=="705"){ $html5.= "สมุทรสงคราม" ; }
      if($dbarr['province2']=="704"){ $html5.= "สมุทรสาคร" ; }
      if($dbarr['province2']=="104"){ $html5.= "สระบุรี" ; }
      if($dbarr['province2']=="207"){ $html5.= "สระแก้ว" ; }
      if($dbarr['province2']=="101"){ $html5.= "สิงห์บุรี" ; }
      if($dbarr['province2']=="700"){ $html5.= "สุพรรณบุรี" ; }
      if($dbarr['province2']=="802"){ $html5.= "สุราษฎร์ธานี" ; }
      if($dbarr['province2']=="306"){ $html5.= "สุรินทร์" ; }
      if($dbarr['province2']=="601"){ $html5.= "สุโขทัย" ; }
      if($dbarr['province2']=="400"){ $html5.= "หนองคาย" ; }
      if($dbarr['province2']=="308"){ $html5.= "หนองบัวลำภู" ; }
      if($dbarr['province2']=="307"){ $html5.= "อำนาจเจริญ" ; }
      if($dbarr['province2']=="402"){ $html5.= "อุดรธานี" ; }
      if($dbarr['province2']=="600"){ $html5.= "อุตรดิตถ์" ; }
      if($dbarr['province2']=="608"){ $html5.= "อุทัยธานี" ; }
      if($dbarr['province2']=="302"){ $html5.= "อุบลราชธานี" ; }
      if($dbarr['province2']=="103"){ $html5.= "อ่างทอง" ; }
      if($dbarr['province2']=="500"){ $html5.= "เชียงราย" ; }
      if($dbarr['province2']=="502"){ $html5.= "เชียงใหม่" ; }
      if($dbarr['province2']=="606"){ $html5.= "เพชรบุรณ์" ; }
      if($dbarr['province2']=="706"){ $html5.= "เพชรบุรี" ; }
      if($dbarr['province2']=="401"){ $html5.= "เลย" ; }
      if($dbarr['province2']=="507"){ $html5.= "แพร่" ; }
      if($dbarr['province2']=="501"){ $html5.= "แม่ฮ่องสอน" ; }
    $html5 .='</b>
    </b></span>
    เบอร์โทรลูกค้า  ........................................................................<br />
      ที่อยู่ปัจจุบันลูกค้า......................................................................................................................................<br />
       &nbsp;&nbsp;<img src="img/box.jpg" width="20" height="22" />หลอด LED เพิ่ม 100 จากราคาตามแพกเกต    /    <img src="img/box.jpg" width="20" height="22" /> Speed  meter เพิ่ม 2500 จากราคาตามแพกเกต<br />
      จ่ายเงินวันที่ติดตั้ง  ...........................  บาท : รายเดือน/รายปี  ...............................  <br />
      &nbsp;&nbsp;<img src="img/box.jpg" width="20" height="22" /> จ่ายเงินสด <br />
      &nbsp;&nbsp;<img src="img/box.jpg" width="20" height="22" /> โอนเงิน <br />
      วันที่ติดตั้ง  ............................................. ต้องการแจ้งเตือนความเร็วที่  ....................  <br />
      link ขนส่ง   <img src="img/box.jpg" width="20" height="22" />  ทันที <br />
    link ขนส่ง   <img src="img/box.jpg" width="20" height="22" /> ประมาณ  วันที่ .......................................ดู user ตัวเองต้อง online และโทรมาบอกล่วงหน้า 1 วัน .....</strong></span><br />
    <strong><span class="style7">
    
    <span class="blue"># กรณี <span class="red">เลือกราย ปี</span> เริ่ม'. NextYear('now') .'</span></span><br />
    <span class="blue text-white"># กรณี <span class="text-white">เลือกรายเดือน</span> เริ่ม '. Nextmonth($strDate) .'<br />
    <span class="blue">ลงชื่อช่างผู้ติดตั้ง .............................................<span></strong>
    
    </td>
</tr>
</table>
</div>
<table width="579" height="94" border="0" align="center">
<tr>
<td class="text-center">
<img src="img/print/line@greenboxgps.png" width="100" height="120">
</td>
  <td width="569" colspan="3"><p>
  
  <span class="style5">เลขที่บัญชี: 414-2-39279-3 | ชื่อบัญชี: บจก. มิรดา คอร์ปอเรชั่น ออมทรัพย์ <br />
  <strong>  <img src="img/kbank-mini.png" height="20" /> </strong> ธนาคารกสิกรไทย สาขาสี่แยกสนามบิน เชียงใหม่<br />
 </span><span >การแจ้งโอนเงิน  แจ้งที่   line ID : @greenboxgps หรือ  0931311728 / 0882528227 <br />
        หลังเข้าขนส่ง  เมื่อข้อมูลรถเปลี่ยน เช่น ทะเบียนรถ หรือ ผู้ประกอบการ ต้องถ่ายส่งมาอัพเดทด้วยคะ</span><br />
      </p></td>
  <td  class="text-center">
    <img src="img/print/qr-payment.png" width="100" height="120">
  </td>
</tr>
</table>
';
$strDate = date('Y-m-d', strtotime('+1 month'));
 ?>
<?php 

$page6 = '<div>
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

<table style="margin-top: 20px;" width="90%" height="59%" border="1" cellpadding="20" cellspacing="0" align="center">
                <tbody>
                  <tr>
                    <td><div ><p class="notic">GPS เกิดปัญหา การใช้งานไม่ได้ เข้าดู user ไม่ได้<br>
                    ให้โทร และ/หรือ แอดไลน์ บริษัท  เท่านั้น <br></p>
                    <p class="notic">สติกเกอร์เครื่องรูดบัตร จะแจ้งให้ลูกค้าหรือคนขับทราบอยู่แล้ว ว่าให้ติดต่อที่เบอร์ไหน<br></p>

                    <p class="notic-b">หมายเหตุ : ช่างไม่มีหน้าที่ รับปัญหา หรือจะเดินทางไปซ่อมโดยพละการ ลูกค้าไม่สามารถอ้างว่าแจ้งช่างไปแล้ว เพราะบริษัทไม่รับทราบ<br></p>
                    <hr>
                    <p class="notic">เบอร์บริษัท : 0931311728<br>
                    ไลน์บริษัท : @greenboxgps<br></p>
                    </div></td>
                    <td rowspan=2 style="text-align: center;">
                    <div align="left"><span class="style13"><span class="style19">ลงชื่อเจ้าของรถ</span>  <br />
                    <br />
                  <u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</u></span><br />
                  <span class="style19">'. DateTime('now') .'</span><br />
                    <br />
                  </div></td>
                  </tr>
                  <tr>
                    <td width="61%" height="78" bordercolor="#FF0000" bgcolor="#FFFFFF" style="text-align: center;">
                    
                    <div align="left">
                      <span class="style19">ช่างผู้ปฏิบัติงาน : '.$dbarr['tech'].' <br /> <p>เลขคัทซี : '.$dbarr['user'].'</p>
                    </div>
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
$mpdf->WriteHTML($html);
$mpdf->AddPage();
$mpdf->WriteHTML($html2);
$mpdf->AddPage();
$mpdf->WriteHTML($html3);
$mpdf->AddPage();
$mpdf->WriteHTML($html4);
$mpdf->AddPage();
$mpdf->WriteHTML($html5);
$mpdf->AddPage();
$mpdf->WriteHTML($page6);
$mpdf->Output();
?>
</body>

</html>
