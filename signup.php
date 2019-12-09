<html>
<head>
<title>เพิมข้อมูลหนังสือรับรอง</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>

<body background="image/bg_member.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p align="center"><br>
<br>
  <font color="#FF6600" size="3" face="MS Sans Serif, Tahoma, sans-serif"><strong><u>เพิ่มข้อมูล</u></strong></font></p>
<form name ="checkForm" action="member_add_new.php" method="post" onSubmit="return check()">
  <table border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#0066CC">
    <tr>
      <td colspan="2" bgcolor="#0099CC"> <p align="center">&nbsp;</p></td>
    </tr>
    <tr>
      <td width="87" bgcolor="#FFFFFF"><p>เลขคัทซี</p></td>
      <td width="510" bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
        <input name="user_name" type="text" id="user_name" size="50" maxlength="30">
      </font></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"> <font size="2" face="MS Sans Serif, Tahoma, sans-serif">ยี่ห้อรถ<br>
        <br>
      </font></td>
      <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
        <select name="address" id="address" onChange="dis(this.value)">
      <option value="">------เลือกยี่ห้อรถ-----</option>
<option value="BENZ">BENZ</option>
<option value="MERCEDES" >MERCEDES</option>
<option value="MERCEDES BENZ" >MERCEDES BENZ</option>
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
<option value="MITSUBISHI FUSO" >MITSUBISHI FUSO</option>
<option value="FUSO" >FUSO</option>
<option value="MAN" >MAN</option>
<option value="NISSAN">NISSAN</option>
<option value="NISSAN DIESEL" >NISSAN DIESEL</option>
<option value="SANY">SANY</option>
<option value="REO" >REO</option>
<option value="SCANIA">SCANIA</option>
 <option value="SUNLONG" >SUNLONG</option>
<option value="KINGLONG" >KINGLONG</option>
<option value="JOYLONG" >JOYLONG</option>
 <option value="SINOTRUK" >SINOTRUK</option>
<option value="SINOTRUK HOHAN" >SINOTRUK HOHAN</option>
<option value="SINOTRUK HOWO" >SINOTRUK HOWO</option>
 <option value="S.T.TUK TUK" >S.T.TUK TUK</option>
<option value="STIE">STIE</option>
<option value="SUZUKI">SUZUKI</option>
<option value="TOYOTA">TOYOTA</option>
 <option value="UD" >UD</option>
 <option value="UD TRUCK" >UD TRUCK</option>
<option value="VOLVO">VOLVO</option>
        </select>
      </font></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">ประเภทรถ</td>
      <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
        <select name=register_type id="register_type" >
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
      </font></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เลขทะเบียนรถ</font></td>
      <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;
        <input name="amper" type="text" id="amper" size="10">

        <select name=province2 id="province2" >
          <option value="" selected="selected">เลือกจังหวัด</option>
          <option value="805">กระบี่</option>
          <option value="001">กรุงเทพมหานคร</option>
          <option value="701">กาญจนบุรี</option>
          <option value="406">กาฬสินธ์</option>
          <option value="604">กำแพงเพชร</option>
          <option value="405">ขอนแก่น</option>
          <option value="205">จันทบุรี</option>
          <option value="202">ฉะเชิงเทรา</option>
          <option value="203">ชลบุรี</option>
          <option value="100">ชัยนาท</option>
          <option value="300">ชัยภูมิ</option>
          <option value="800">ชุมพร</option>
          <option value="901">ตรัง</option>
          <option value="206">ตราด</option>
          <option value="602">ตาก</option>
          <option value="200">นครนายก</option>
          <option value="702">นครปฐม</option>
          <option value="403">นครพนม</option>
          <option value="305">นครราชสีมา</option>
          <option value="804">นครศรีธรรมราช</option>
          <option value="607">นครสวรรค์</option>
          <option value="107">นนทบุรี</option>
          <option value="906">นราธิวาส</option>
          <option value="504">น่าน</option>
          <option value="309">บึงกาฬ</option>
          <option value="904">บึตตานี</option>
          <option value="304">บุรีรัมย์</option>
          <option value="106">ปทุมธานี</option>
          <option value="707">ประจวบคีรีขันธ์</option>
          <option value="201">ปราจีนบุรี</option>
          <option value="105">พระนครศรีอยุธยา</option>
          <option value="503">พะเยา</option>
          <option value="803">พังงา</option>
          <option value="900">พัทลุง</option>
          <option value="605">พิจิตร</option>
          <option value="603">พิษณุโลก</option>
          <option value="806">ภูเก็ต</option>
          <option value="407">มหาสารคาม</option>
          <option value="409">มุกดาหาร</option>
          <option value="905">ยะลา</option>
          <option value="301">ยโสธร</option>
          <option value="801">ระนอง</option>
          <option value="204">ระยอง</option>
          <option value="703">ราชบุรี</option>
          <option value="408">ร้อยเอ็ด</option>
          <option value="102">ลพบุรี</option>
          <option value="506">ลำปาง</option>
          <option value="505">ลำพูน</option>
          <option value="303">ศรีสะเกษ</option>
          <option value="404">สกลนคร</option>
          <option value="902">สงขลา</option>
          <option value="903">สตูล</option>
          <option value="108">สมุทรปราการ</option>
          <option value="705">สมุทรสงคราม</option>
          <option value="704">สมุทรสาคร</option>
          <option value="104">สระบุรี</option>
          <option value="207">สระแก้ว</option>
          <option value="101">สิงห์บุรี</option>
          <option value="700">สุพรรณบุรี</option>
          <option value="802">สุราษฎร์ธานี</option>
          <option value="306">สุรินทร์</option>
          <option value="601">สุโขทัย</option>
          <option value="400">หนองคาย</option>
          <option value="308">หนองบัวลำภู</option>
          <option value="307">อำนาจเจริญ</option>
          <option value="402">อุดรธานี</option>
          <option value="600">อุตรดิตถ์</option>
          <option value="608">อุทัยธานี</option>
          <option value="302">อุบลราชธานี</option>
          <option value="103">อ่างทอง</option>
          <option value="500">เชียงราย</option>
          <option value="502">เชียงใหม่</option>
          <option value="606">เพชรบุรณ์</option>
          <option value="706">เพชรบุรี</option>
          <option value="401">เลย</option>
          <option value="507">แพร่</option>
          <option value="501">แม่ฮ่องสอน</option>
        </select>
      </font></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">เครื่องรุ่น</td>
      <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
            <select name="car_approve_id" id="car_approve_id" >
          <option value="132/2559">T333</option>
          <option value="218/2560">AW</option>
          <option value="207/2560" selected>VT900</option>
          <option value="201/2560">T1</option>
          <option value="224/2560">GT06E</option>
          <option value="fm11">Teltonika FM1100</option>
          <option value="ts107">TS107</option>
          <option value="tk103">TK103</option>
                        </select>
      </font></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;SIM + &nbsp;IMEI </font></td>
      <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
   &nbsp;&nbsp;&nbsp;
   <input name="imeiall" type="text" id="imeiall" value="000000000000" size="30">
      </font></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;วันที่ติดตั้ง</font></td>
      <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">วันที่
          <select name="date" id="date">
               <option value='<? echo date("j"); ?>' selected="selected"><? echo date("j"); ?></option>
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
          </select>
&nbsp;เดือน
<select name="sex" id="month">
  <option value="<?php
 function DateThai($strDate)
 {
  $strMonth= date("n");
  $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
  $strMonthThai=$strMonthCut[$strMonth];
  return "$strMonthThai";
 }

 echo "".DateThai($strDate);
?>" selected="selected"><?php
 echo "".DateThai($strDate);
?></option>
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
</select>
&nbsp; พ.ศ.
<input name="year" type="text" id="year" value="<? echo date("Y")+543; ?>" size="5">
      </font></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;</font></td>
      <td bgcolor="#FFFFFF">Server
        <label><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
        <select name="email" id="select">
          <option value="greenboxsv3.com">ตาจบ</option>
          <option value="greensv1.com">หาร</option>
          <option value="greensv2.com">ตี๋</option>
          <option value="greenboxsv.com">ก๊อช</option>
          <option value="gpsgreenbox.com">greenbox</option>
          <option value="s1.gpsgreenbox.com">S1</option>
          <option value="s2.gpsgreenbox.com">S2</option>
          <option value="s3.gpsgreenbox.com">S3</option>
		            <option value="s4.gpsgreenbox.com" selected>S4</option>
          <option value="s5.gpsgreenbox.com">S5</option>
        </select>
        </font></label>
         <br>
        User
      <input name="phone" type="text" id="phone" value="NoUser" size="20">
      ID
      <input name="uid" type="text" id="uid" value="0" size="20"></td>
    </tr>
    <tr>
      <td bgcolor="#FFCCFF"><font color="#00FF00">&nbsp;</font></td>
      <td bgcolor="#FFCCFF"><font color="#00FF00">&nbsp;</font></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;</font></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"> <font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชื่อคนเซ็น</font><br>
        ตำแหน่ง <br>
      <font size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;ชื่อผู้ประกอบการณ์</font></td>
      <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
        <select name=education  >
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
        <br>
        <select name=work >
          <option value="กรรมการ">กรรมการ</option>
          <option value="Service Area Manager">Service Area Manager</option>
        </select>
        <br>
        <input name="name" type="text" id="name" value="0" size="50">
      </font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"> <div align="center">&nbsp;</div></td>
    </tr>
    <tr bgcolor="#FFCCFF">
      <td colspan="2"> <div align="center"><img src="image/stargmod.gif" width="16" height="16" align="absmiddle"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้ามเปลี่ยน</font></strong>
          <img src="image/stargmod.gif" width="16" height="16" align="absmiddle"></div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#FFFFFF"><table border="0" align="left" cellpadding="3" cellspacing="0">
          <tr>
            <td>&nbsp;&nbsp;<font size="2" face="MS Sans Serif, Tahoma, sans-serif">ี</font></td>
            <td><br><input name="age" type="text" id="age" value="<? echo date("m"); ?>" size="5">
            <input name="month" type="radio" value="1" checked>
            <input name="month" type="radio" value="1">      <font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;            </font></td>
            <td width="10"> <div align="center"></div></td>
            <td colspan="2"><input name="province" type="hidden" value="province"></td>
          </tr>
          <tr>
            <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;&nbsp;</font></td>
            <td><input name="pwd_name1" type="password" id="pwd_name1" value="1234" size="20" maxlength="30">
            &nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input name="pwd_name2" type="password" id="pwd_name2" value="1234" size="20" maxlength="30">
            &nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr bgcolor="#0066CC">
      <td colspan="2">
        <div align="center">
          <input type="submit" name="Submit" value="เพิ่มข้อมูลนี้">
          &nbsp;
          <input type="reset" name="Submit2" value=" เคลียร์">
          <input name="ok" type="hidden" id="ok" value="ok_pass">
        </div></td>
    </tr>
  </table>
<script language="javascript">

function check() {
if(document.checkForm.name.value=="") {
alert("กรุณากรอกชื่อ-นามสกุลด้วยครับ") ;
document.checkForm.name.focus() ;
return false ;
}
else if(document.checkForm.year.value=="") {
alert("กรุณากรอก วัน/เดือน/ปีเกิด ให้ครบถ้วนด้วยนะครับ") ;
document.checkForm.year.focus() ;
return false ;
}
else if(isNaN(document.checkForm.year.value)) {
alert("ปีเกิดของท่าน กรุณากรอกเฉพาะตัวเลขนะครับ") ;
document.checkForm.year.focus() ;
return false ;
}
else if(document.checkForm.age.value=="") {
alert("กรุณากรอกอายุด้วยครับ") ;
document.checkForm.age.focus() ;
return false ;
}else if(isNaN(document.checkForm.age.value)) {
alert("กรุณากรอกอายุด้วยตัวเลขเท่านั้นครับ") ;
document.checkForm.age.focus() ;
return false ;
}
else if(document.checkForm.province.selectedIndex==0) {
alert("กรุณาระบุจังหวัดที่ท่านอยู่ด้วยครับ") ;
return false ;
}
else if(isNaN(document.checkForm.zipcode.value)) {
alert("รหัสไปรษณีย์ต้องเป็นตัวเลขครับ") ;
document.checkForm.zipcode.focus() ;
return false ;
}
else if(document.checkForm.user_name.value=="") {
alert("กรุณาระบุชื่อที่ท่านต้องการใช้ในการเข้าระบบด้วยครับ") ;
document.checkForm.user_name.focus() ;
return false ;
}
else if(document.checkForm.pwd_name1.value=="") {
alert("กรุณากรอกรหัสผ่านที่ต้องการด้วยครับ") ;
document.checkForm.pwd_name1.focus() ;
return false ;
}
else if(document.checkForm.pwd_name2.value=="") {
alert("กรุณายืนยันรหัสผ่านอีกครั้ง") ;
document.checkForm.pwd_name2.focus() ;
return false ;
}


else
return true ;
}

  </script>
</form>
</body>
</html>
