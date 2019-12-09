<html>
<head>
  <title>เพิมข้อมูลหนังสือรับรอง</title>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- icon -->
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
  
  <!-- js -->
  <link rel="stylesheet" href="vendor/select2/css/select2.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  <style>
  		   .card{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        /* text-align: center; */
        }
  </style>
</head>
<?php
function monthThai($strDate)
{
 $strMonth= date("n"); $strMonthCut=Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
 $strMonthThai=$strMonthCut[$strMonth];
 return $strMonthThai ;
}

 ?>
<body>
  
    <form name="checkForm" action="?p=action_addMember_tech" method="post" onSubmit="return check()">
      <div class="container-fluid mt-4">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-12">
                <h3>เพิ่มข้อมูลรถ</h3>
                <hr>
              </div>
              
              <div class="form-group col-md-6">
                <label for="user_name">เลขคัทซี</label>
                <input type="text" class="form-control  form-control-sm" name="user_name" id="user_name" value="">
              </div>
              <div class="form-group col-md-6">
                <label for="address">ยี่ห้อรถ</label>
                <select name="address" id="address" class="select2 form-control form-control-sm" onChange="dis(this.value)">
                  <option value="">------เลือกยี่ห้อรถ-----</option>
                  <option value="BENZ">BENZ</option>
                  <option value="MERCEDES">MERCEDES</option>
                  <option value="MERCEDES BENZ">MERCEDES BENZ</option>
                  <option value="BMW">BMW</option>
                  <option value="CHEETAH">CHEETAH</option>
                  <option value="CHEPPEL">CHEPPEL</option>
                  <option value="CHERDCHAI">CHERDCHAI</option>
                  <option value="CHEVROLET">CHEVROLET</option>
                  <option value="DAEWOO">DAEWOO</option>
                  <option value="DODGE">DODGE</option>
                  <option value="FAW">FAW</option>
                  <option value="FORD">FORD</option>
                  <option value="GOLDEN DRAGON">GOLDEN DRAGON</option>
                  <option value="HINO" selected>HINO</option>
                  <option value="HONDA">HONDA</option>
                  <option value="HYUNDAI">HYUNDAI</option>
                  <option value="ISUZU">ISUZU</option>
                  <option value="LEYLAND">LEYLAND</option>
                  <option value="MITSUBISHI">MITSUBISHI</option>
                  <option value="MITSUBISHI FUSO">MITSUBISHI FUSO</option>
                  <option value="FUSO">FUSO</option>
                  <option value="MAN">MAN</option>
                  <option value="NISSAN">NISSAN</option>
                  <option value="NISSAN DIESEL">NISSAN DIESEL</option>
                  <option value="SANY">SANY</option>
                  <option value="REO">REO</option>
                  <option value="SCANIA">SCANIA</option>
                  <option value="SUNLONG">SUNLONG</option>
                  <option value="KINGLONG">KINGLONG</option>
                  <option value="JOYLONG">JOYLONG</option>
                  <option value="SINOTRUK">SINOTRUK</option>
                  <option value="SINOTRUK HOHAN">SINOTRUK HOHAN</option>
                  <option value="SINOTRUK HOWO">SINOTRUK HOWO</option>
                  <option value="S.T.TUK TUK">S.T.TUK TUK</option>
                  <option value="STIE">STIE</option>
                  <option value="SUZUKI">SUZUKI</option>
                  <option value="TOYOTA">TOYOTA</option>
                  <option value="UD">UD</option>
                  <option value="UD TRUCK">UD TRUCK</option>
                  <option value="VOLVO">VOLVO</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="register_type">ประเภทรถ</label>
                <select name=register_type id="register_type" class="select2 form-control form-control-sm">
                  <option value="0">ไม่มีข้อมูลประเภทและชนิดรถ</option>
                  <option value="1000">รถโดยสารไมได้ระบุมาตรฐานรถและประเภทการขนส่ง</option>
                  <option value="1101">รถโดยสาร มาตรฐาน 1 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1111">รถโดยสาร มาตรฐาน 1 ก ส่วนบุคคล</option>
                  <option value="1121">รถโดยสาร มาตรฐาน 1 ก ไม่ประจำทาง</option>
                  <option value="1131">รถโดยสาร มาตรฐาน 1 ก ประจำทาง</option>
                  <option value="1102">รถโดยสาร มาตรฐาน 1 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1112">รถโดยสาร มาตรฐาน 1 ข ส่วนบุคคล</option>
                  <option value="1122">รถโดยสาร มาตรฐาน 1 ข ไม่ประจำทาง</option>
                  <option value="1132">รถโดยสาร มาตรฐาน 1 ข ประจำทาง</option>
                  <option value="1201">รถโดยสาร มาตรฐาน 2 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1211">รถโดยสาร มาตรฐาน 2 ก ส่วนบุคคล</option>
                  <option value="1221">รถโดยสาร มาตรฐาน 2 ก ไม่ประจำทาง</option>
                  <option value="1231">รถโดยสาร มาตรฐาน 2 ก ประจำทาง</option>
                  <option value="1202">รถโดยสาร มาตรฐาน 2 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1212">รถโดยสาร มาตรฐาน 2 ข ส่วนบุคคล</option>
                  <option value="1222">รถโดยสาร มาตรฐาน 2 ข ไม่ประจำทาง</option>
                  <option value="1232">รถโดยสาร มาตรฐาน 2 ข ประจำทาง</option>
                  <option value="1203">รถโดยสาร มาตรฐาน 2 ค ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1213">รถโดยสาร มาตรฐาน 2 ค ส่วนบุคคล</option>
                  <option value="1223">รถโดยสาร มาตรฐาน 2 ค ไม่ประจำทาง</option>
                  <option value="1233">รถโดยสาร มาตรฐาน 2 ค ประจำทาง</option>
                  <option value="1204">รถโดยสาร มาตรฐาน 2 ง ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1214">รถโดยสาร มาตรฐาน 2 ง ส่วนบุคคล</option>
                  <option value="1224">รถโดยสาร มาตรฐาน 2 ง ไม่ประจำทาง</option>
                  <option value="1234">รถโดยสาร มาตรฐาน 2 ง ประจำทาง</option>
                  <option value="1205">รถโดยสาร มาตรฐาน 2 จ ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1215">รถโดยสาร มาตรฐาน 2 จ ส่วนบุคคล</option>
                  <option value="1225">รถโดยสาร มาตรฐาน 2 จ ไม่ประจำทาง</option>
                  <option value="1235">รถโดยสาร มาตรฐาน 2 จ ประจำทาง</option>
                  <option value="1301">รถโดยสาร มาตรฐาน 3 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1311">รถโดยสาร มาตรฐาน 3 ก ส่วนบุคคล</option>
                  <option value="1321">รถโดยสาร มาตรฐาน 3 ก ไม่ประจำทาง</option>
                  <option value="1331">รถโดยสาร มาตรฐาน 3 ก ประจำทาง</option>
                  <option value="1302">รถโดยสาร มาตรฐาน 3 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1312">รถโดยสาร มาตรฐาน 3 ข ส่วนบุคคล</option>
                  <option value="1322">รถโดยสาร มาตรฐาน 3 ข ไม่ประจำทาง</option>
                  <option value="1332">รถโดยสาร มาตรฐาน 3 ข ประจำทาง</option>
                  <option value="1303">รถโดยสาร มาตรฐาน 3 ค ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1313">รถโดยสาร มาตรฐาน 3 ค ส่วนบุคคล</option>
                  <option value="1323">รถโดยสาร มาตรฐาน 3 ค ไม่ประจำทาง</option>
                  <option value="1333">รถโดยสาร มาตรฐาน 3 ค ประจำทาง</option>
                  <option value="1304">รถโดยสาร มาตรฐาน 3 ง ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1314">รถโดยสาร มาตรฐาน 3 ง ส่วนบุคคล</option>
                  <option value="1324">รถโดยสาร มาตรฐาน 3 ง ไม่ประจำทาง</option>
                  <option value="1334">รถโดยสาร มาตรฐาน 3 ง ประจำทาง</option>
                  <option value="1305">รถโดยสาร มาตรฐาน 3 จ ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1315">รถโดยสาร มาตรฐาน 3 จ ส่วนบุคคล</option>
                  <option value="1325">รถโดยสาร มาตรฐาน 3 จ ไม่ประจำทาง</option>
                  <option value="1335">รถโดยสาร มาตรฐาน 3 จ ประจำทาง</option>
                  <option value="1306">รถโดยสาร มาตรฐาน 3 ฉ ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1316">รถโดยสาร มาตรฐาน 3 ฉ ส่วนบุคคล</option>
                  <option value="1326">รถโดยสาร มาตรฐาน 3 ฉ ไม่ประจำทาง</option>
                  <option value="1336">รถโดยสาร มาตรฐาน 3 ฉ ประจำทาง</option>
                  <option value="1401">รถโดยสาร มาตรฐาน 4 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1411">รถโดยสาร มาตรฐาน 4 ก ส่วนบุคคล</option>
                  <option value="1421">รถโดยสาร มาตรฐาน 4 ก ไม่ประจำทาง</option>
                  <option value="1431">รถโดยสาร มาตรฐาน 4 ก ประจำทาง</option>
                  <option value="1402">รถโดยสาร มาตรฐาน 4 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1412">รถโดยสาร มาตรฐาน 4 ข ส่วนบุคคล</option>
                  <option value="1422">รถโดยสาร มาตรฐาน 4 ข ไม่ประจำทาง</option>
                  <option value="1432">รถโดยสาร มาตรฐาน 4 ข ประจำทาง</option>
                  <option value="1403">รถโดยสาร มาตรฐาน 4 ค ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1413">รถโดยสาร มาตรฐาน 4 ค ส่วนบุคคล</option>
                  <option value="1423">รถโดยสาร มาตรฐาน 4 ค ไม่ประจำทาง</option>
                  <option value="1433">รถโดยสาร มาตรฐาน 4 ค ประจำทาง</option>
                  <option value="1404">รถโดยสาร มาตรฐาน 4 ง ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1414">รถโดยสาร มาตรฐาน 4 ง ส่วนบุคคล</option>
                  <option value="1424">รถโดยสาร มาตรฐาน 4 ง ไม่ประจำทาง</option>
                  <option value="1434">รถโดยสาร มาตรฐาน 4 ง ประจำทาง</option>
                  <option value="1405">รถโดยสาร มาตรฐาน 4 จ ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1415">รถโดยสาร มาตรฐาน 4 จ ส่วนบุคคล</option>
                  <option value="1425">รถโดยสาร มาตรฐาน 4 จ ไม่ประจำทาง</option>
                  <option value="1435">รถโดยสาร มาตรฐาน 4 จ ประจำทาง</option>
                  <option value="1406">รถโดยสาร มาตรฐาน 4 ฉ ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1416">รถโดยสาร มาตรฐาน 4 ฉ ส่วนบุคคล</option>
                  <option value="1426">รถโดยสาร มาตรฐาน 4 ฉ ไม่ประจำทาง</option>
                  <option value="1436">รถโดยสาร มาตรฐาน 4 ฉ ประจำทาง</option>
                  <option value="1501">รถโดยสาร มาตรฐาน 5 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1511">รถโดยสาร มาตรฐาน 5 ก ส่วนบุคคล</option>
                  <option value="1521">รถโดยสาร มาตรฐาน 5 ก ไม่ประจำทาง</option>
                  <option value="1531">รถโดยสาร มาตรฐาน 5 ก ประจำทาง</option>
                  <option value="1502">รถโดยสาร มาตรฐาน 5 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1512">รถโดยสาร มาตรฐาน 5 ข ส่วนบุคคล</option>
                  <option value="1522">รถโดยสาร มาตรฐาน 5 ข ไม่ประจำทาง</option>
                  <option value="1532">รถโดยสาร มาตรฐาน 5 ข ประจำทาง</option>
                  <option value="1601">รถโดยสาร มาตรฐาน 6 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1611">รถโดยสาร มาตรฐาน 6 ก ส่วนบุคคล</option>
                  <option value="1621">รถโดยสาร มาตรฐาน 6 ก ไม่ประจำทาง</option>
                  <option value="1631">รถโดยสาร มาตรฐาน 6 ก ประจำทาง</option>
                  <option value="1602">รถโดยสาร มาตรฐาน 6 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1612">รถโดยสาร มาตรฐาน 6 ข ส่วนบุคคล</option>
                  <option value="1622">รถโดยสาร มาตรฐาน 6 ข ไม่ประจำทาง</option>
                  <option value="1632">รถโดยสาร มาตรฐาน 6 ข ประจำทาง</option>
                  <option value="1700">รถโดยสาร มาตรฐาน 7 ไม่ได้ระบุประเภทการขนส่ง</option>
                  <option value="1710">รถโดยสาร มาตรฐาน 7 ส่วนบุคคล</option>
                  <option value="1720">รถโดยสาร มาตรฐาน 7 ไม่ประจำทาง</option>
                  <option value="2000">รถบรรทุก ไม่ได้ระบุลักษณะและประเภทรถ</option>
                  <option value="2100">รถบรรทุก ลักษณะ 1 ไม่ได้ระบุประเภทรถ</option>
                  <option value="2110">รถบรรทุก ลักษณะ 1 ส่วนบุคคล</option>
                  <option value="2120" selected>รถบรรทุก ลักษณะ 1 ไม่ประจำทาง</option>
                  <option value="2200">รถบรรทุก ลักษณะ 2 ไม่ได้ระบุประเภทรถ</option>
                  <option value="2210">รถบรรทุก ลักษณะ 2 ส่วนบุคคล</option>
                  <option value="2220">รถบรรทุก ลักษณะ 2 ไม่ประจำทาง</option>
                  <option value="2300">รถบรรทุก ลักษณะ 3 ไม่ได้ระบุประเภทรถ</option>
                  <option value="2310">รถบรรทุก ลักษณะ 3 ส่วนบุคคล</option>
                  <option value="2320">รถบรรทุก ลักษณะ 3 ไม่ประจำทาง</option>
                  <option value="2400">รถบรรทุก ลักษณะ 4 ไม่ได้ระบุประเภทรถ</option>
                  <option value="2410">รถบรรทุก ลักษณะ 4 ส่วนบุคคล</option>
                  <option value="2420">รถบรรทุก ลักษณะ 4 ไม่ประจำทาง</option>
                  <option value="2500">รถบรรทุก ลักษณะ 5 ไม่ได้ระบุประเภทรถ</option>
                  <option value="2510">รถบรรทุก ลักษณะ 5 ส่วนบุคคล</option>
                  <option value="2520">รถบรรทุก ลักษณะ 5 ไม่ประจำทาง</option>
                  <option value="2600">รถบรรทุก ลักษณะ 6 ไม่ได้ระบุประเภทรถ</option>
                  <option value="2610">รถบรรทุก ลักษณะ 6 ส่วนบุคคล</option>
                  <option value="2620">รถบรรทุก ลักษณะ 6 ไม่ประจำทาง</option>
                  <option value="2700">รถบรรทุก ลักษณะ 7 ไม่ได้ระบุประเภทรถ</option>
                  <option value="2710">รถบรรทุก ลักษณะ 7 ส่วนบุคคล</option>
                  <option value="2720">รถบรรทุก ลักษณะ 7 ไม่ประจำทาง</option>
                  <option value="2800">รถบรรทุก ลักษณะ 8 ไม่ได้ระบุประเภทรถ</option>
                  <option value="2810">รถบรรทุก ลักษณะ 8 ส่วนบุคคล</option>
                  <option value="2820">รถบรรทุก ลักษณะ 8 ไม่ประจำทาง</option>
                  <option value="2900">รถบรรทุก ลักษณะ 9 ไม่ได้ระบุประเภทรถ</option>
                  <option value="2910">รถบรรทุก ลักษณะ 9 ส่วนบุคคล</option>
                  <option value="2920">รถบรรทุก ลักษณะ 9 ไม่ประจำทาง</option>
                  <option value="3000">รถยนต์ ไม่ระบุประเภทรถ</option>
                  <option value="3010">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                  <option value="3011">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                  <option value="3012">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                  <option value="3013">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                  <option value="3014">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                  <option value="3020">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                  <option value="3021">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                  <option value="3022">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                  <option value="3023">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                  <option value="3024">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                  <option value="3025">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                  <option value="3030">รถยนต์บรรทุกส่วนบุคคล (รย.3)</option>
                  <option value="3031">รถยนต์บรรทุกส่วนบุคคล (รย.ร)</option>
                  <option value="3032">รถยนต์บรรทุกส่วนบุคคล (รย.ร)</option>
                  <option value="3033">รถยนต์บรรทุกส่วนบุคคล (รย.ร)</option>
                  <option value="3040">รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                  <option value="3041">รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                  <option value="3042">รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                  <option value="3043">รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                  <option value="3044">รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                  <option value="3050">รถยนต์รับจ้างระหว่างจังหวัด (รย.ร)</option>
                  <option value="3060">รถยนต์รับจ้างบรรทุกคนโดยสารไม่เกินเจ็ดคน (รย.6)</option>
                  <option value="3070">รถยนต์สี่ล้อเล็กรับจ้าง (รย.7)</option>
                  <option value="3080">รถยนต์รับจ้างสามล้อ (รย.8)</option>
                  <option value="3090">รถยนต์บริการธุรกิจ (รย.9)</option>
                  <option value="3100">รถยนต์บริการทัศนาจร (รย.10)</option>
                  <option value="3110">รถยนต์บริการให้เช่า (รย.11)</option>
                  <option value="4120">รถจักรยานยนต์ (รย.12)</option>
                  <option value="3130">รถแทรกเตอร์ (รย.13)</option>
                  <option value="3140">รถบดถนน (รย.14)</option>
                  <option value="3150">รถใช้งานเกษตรกรรม (รย.15)</option>
                  <option value="3160">รถพ่วง (รย.16)</option>
                  <option value="4170">รถจักรยานยนต์สาธารณะ (รย.17)</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="amper">เลขทะเบียนรถ</label>
                <div class="form-inline">
                  <input type="text" class="form-control  form-control-sm col" name="amper" id="amper" value="">
                  &nbsp;
                  <select name=province2 id="province2" class="select2 form-control  form-control-sm col">
                    <option value="" selected="selected">เลือกจังหวัด</option>
                    <?php 
                  $sql_province="SELECT * FROM province_code order by code asc";
                  $rs_province=$conn->query($sql_province);
                  while($row_province=$rs_province->fetch_assoc()){
                  ?>
                  <option value="<?= $row_province['code'] ?>"><?= $row_province['name']; ?></option>
                  <?php
                    } 
                  ?> 
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="car_approve_id">เครื่องรุ่น</label>
                <select name="car_approve_id" id="car_approve_id" class="form-control  form-control-sm">
                  <option value="T333">T333</option>
                  <option value="AW">AW</option>
                  <option value="VT_1" selected>VT900</option>
                  <option value="VT_2" >VT900(U)</option>
                  <option value="VT_3" >VT900(A)</option>
                  <option value="T1">T1</option>
                  <option value="GT06E">GT06E</option>
                  <option value="GT06E(Box)">GT06E(Box)</option>
                  <option value="fm11">Teltonika FM1100</option>
                  <option value="ts107">TS107</option>
                  <option value="tk103">TK103</option>
                  <option value="MVT380">MVT380</option>
                  <option value="VT300">VT300</option>
                  <option value="GM901">GM901</option>
                  <option value="ST901">ST901</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="sim">SIM + IMEI</label>
                <div class="form-inline">
                  <select name="sim" id="sim" class="form-control form-control-sm col-2">
                    <option value="TRUE" selected>TRUE</option>
                    <option value="5">DTAC</option>
                    <option value="AIS">AIS</option>
                  </select>
                  <input name="simno" class="form-control  form-control-sm col-5" type="text" id="imeiall" value="" size="30" placeholder="เบอร์ซิม">
                  <input name="zipcode" class="form-control  form-control-sm col-5" type="text" id="imeiall" value="" size="30" placeholder="IMEI ซิม">

                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label for="date">วันที่ติดตั้ง</label>
                <div class="form-inline">
                  วันที่ &nbsp;
                  <select name="date" id="date" class="form-control  form-control-sm">
                    <option value='<?php echo date("j"); ?>' selected="selected">
                      <?php echo date("j"); ?>
                    </option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select> &nbsp;
                  เดือน &nbsp;
                  <select name="sex" id="month" class="form-control  form-control-sm">
                    <option value="
                    <?php echo "" .monthThai('$strDate'); ?>" selected="selected">
                      <?php echo "".monthThai('$strDate');
                      ?>
                    </option>
                    <option value="มกราคม">มกราคม</option>
                    <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                    <option value="มีนาคม">มีนาคม</option>
                    <option value="เมษายน">เมษายน</option>
                    <option value="พฤษภาคม">พฤษภาคม</option>
                    <option value="มิถุนายน">มิถุนายน</option>
                    <option value="กรกฎาคม">กรกฎาคม</option>
                    <option value="สิงหาคม">สิงหาคม</option>
                    <option value="กันยายน">กันยายน</option>
                    <option value="ตุลาคม">ตุลาคม</option>
                    <option value="พฤศจิกายน">พฤศจิกายน</option>
                    <option value="ธันวาคม">ธันวาคม</option>
                  </select> &nbsp;
                  พ.ศ. &nbsp;
                  <input name="year" type="text" id="year" class="form-control  form-control-sm" value="<?php echo date('Y')+543; ?>" size="5">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="email">Server</label>
                <select name="email" id="email" class="form-control  form-control-sm">
                  <option value="sv1.greenboxgps.com" >ตาจบ 2</option>
                  <option value="sv2.greenboxgps.com">New Greenbox sv2</option>
                  <option value="greenboxsv3.com">ตาจบ</option>
                  <option value="greensv1.com">หาร</option>
                  <option value="greensv2.com">ตี๋</option>
                  <option value="greenboxsv.com">ก๊อช</option>
                  <option value="gpsgreenbox.com">greenbox</option>
                  <option value="s1.gpsgreenbox.com" selected>S1</option>
                  <option value="s2.gpsgreenbox.com">S2</option>
                  <option value="s3.gpsgreenbox.com">S3</option>
                  <option value="s4.gpsgreenbox.com">S4</option>
                  <option value="s5.gpsgreenbox.com">S5</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                  <label for="phone">User</label>
                  <input name="phone" type="text" id="phone" value="" size="20" placeholder="" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-6">
                  <label for="name">ชื่อผู้ประกอบการณ์</label>
                  <input name="name" type="text" id="name" value="" size="50" placeholder="ชื่อผู้ประกอบการณ์" class="form-control form-control-sm">
               </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                  <label for="contrack">ที่อยู่</label>
                  <input name="contrack" type="text" id="contrack" value="" placeholder="ที่อยู่" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-6">
                  <label for="tel_contact">เบอร์โทรติดต่อ</label>
                  <input name="tel_contact" type="text" id="tel_contact" value="" maxlength="10" placeholder="เบอร์โทรติดต่อ" class="form-control form-control-sm">
               </div>
            </div>

            <hr style="border-color:green;">

            <div class="row">
              <div class="form-group col-md-6">
                  <label for="education" hidden>ชื่อคนเซ็น + ตำแหน่ง</label>
                  <div class="form-inline">
                    <select name=education id="education" class="form-control form-control-sm  col" hidden>
                      <option value="นางสาวกันตณา ยี่จันทึก" selected="selected">นา</option>
                      <option value="นายรัตนพล ธนะโสภณ">เปิ้ล</option>
                      <option value="นายวีรวิขญ์ จิตรคูณเศรษฐ์">wit</option>
                      <option value="ว่าที่ ร.ต. เจษฎา  พรหมกุลจันทร์">เจษฎา ระยอง</option>
                      <option value="นายโชคชัย ไชยพิพัฒนขจร">นายโชคชัย ไชยพิพัฒนขจร (Dealer จ.เลย)</option>
                      <option value="นาย ณัฐพงษ์ แสนจำลา">นาย ณัฐพงษ์ แสนจำลา (Dealer จ.101)</option>
                      <option value="นาย ธนากร นิ่มวิไลย">นาย ธนากร นิ่มวิไลย (Dealer จ.ชัยนาท)</option>
                      <option value="นาย ทวี ลิ้มเจริญ">นาย ทวี ลิ้มเจริญ (Dealer จ.ชัยนาท2)</option>
                      <option value="นาย เพชร ทองเฟื้อง">นาย เพชร ทองเฟื้อง (Dealer จ.ระยอง)</option>
                    </select>
                    &nbsp;
                    <select name=work class="form-control form-control-sm col" hidden>
                      <option value="กรรมการ" selected>กรรมการ</option>
                      <option value="Service Area Manager">Service Area Manager</option>
                    </select>
                  </div>
               </div>

            </div>
          </div>
          <!-- ปิด body-card -->
          <div class="card-footer">
            <div class="row">
              <div class="col-4">
                <a href="?p=main_tech"><button type="button" class="btn btn-warning" name="button" onclick=""> <i class="fas fa-angle-left"></i> กลับหน้ารายการ</button></a>
              </div>
              <div class="col-4 text-center">
                <input name="age" type="text" id="age" value="<?php echo date("m"); ?>" size="5" hidden>
                <button type="submit" class="btn btn-success" name="button">บันทึก</button>
                <button style="text-align: left;" type="reset" class="btn btn-danger" name="button">เคลีย</button>
              </div>
            </div>

          </div>
        </div>
      </div>
      </div>
      <script src="vendor/select2/js/select2.min.js"></script>
      <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
      </script>
      <script language="javascript">
        function check() {
          if (document.checkForm.user_name.value == "") {
            alert("กรุณากรอกเลขคัดซีด้วยครับ");
            document.checkForm.user_name.focus();
            return false;
          }
          if (document.checkForm.amper.value == "") {
            alert("กรุณากรอกทะเบียนรถด้วยครับ");
            document.checkForm.amper.focus();
            return false;
          }
          if (document.checkForm.province2.value == "") {
            alert("กรุณาเลือกจังหวัด");
            document.checkForm.province2.focus();
            return false;
          }
          if (document.checkForm.simno.value == "") {
            alert("กรอกเบอร์");
            document.checkForm.simno.focus();
            return false;
          }
          if (isNaN(document.checkForm.simno.value)) {
            alert("เบอร์โทรกรอกเฉพาะตัวเลข");
            document.checkForm.simno.focus();
            return false;
          }

          if (document.checkForm.zipcode.value == "") {
            alert("กรอกเบอร์ IEMI");
            document.checkForm.zipcode.focus();
            return false;
          }
          if (document.checkForm.phone.value == "") {
            alert("กรอก USER ");
            document.checkForm.phone.focus();
            return false;
          }
          if (document.checkForm.name.value == "") {
            alert("กรุณากรอกชื่อ-นามสกุลด้วยครับ");
            document.checkForm.name.focus();
            return false;
          }
          if (isNaN(document.checkForm.year.value)) {
            alert("กรุณากรอกเฉพาะตัวเลขนะครับ");
            document.checkForm.year.focus();
            return false;

          } else if (document.checkForm.age.value == "") {
            alert("กรุณากรอกอายุด้วยครับ");
            document.checkForm.age.focus();
            return false;
          } else if (isNaN(document.checkForm.age.value)) {
            alert("กรุณากรอกอายุด้วยตัวเลขเท่านั้นครับ");
            document.checkForm.age.focus();
            return false;
          } else if (document.checkForm.province.selectedIndex == 0) {
            alert("กรุณาระบุจังหวัดที่ท่านอยู่ด้วยครับ");
            return false;
          } else if (isNaN(document.checkForm.zipcode.value)) {
            alert("รหัสไปรษณีย์ต้องเป็นตัวเลขครับ");
            document.checkForm.zipcode.focus();
            return false;
          } else if (document.checkForm.user_name.value == "") {
            alert("กรุณาระบุชื่อที่ท่านต้องการใช้ในการเข้าระบบด้วยครับ");
            document.checkForm.user_name.focus();
            return false;
          } else if (document.checkForm.pwd_name1.value == "") {
            alert("กรุณากรอกรหัสผ่านที่ต้องการด้วยครับ");
            document.checkForm.pwd_name1.focus();
            return false;
          } else if (document.checkForm.pwd_name2.value == "") {
            alert("กรุณายืนยันรหัสผ่านอีกครั้ง");
            document.checkForm.pwd_name2.focus();
            return false;
          } else
            return true;
        }
      </script>
    </form>
</body>

</html>
