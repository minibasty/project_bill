<body>
  <?php
  require_once __DIR__ . '/mpdf/vendor/autoload.php';

  session_start() ;
  // if (!isset($_SESSION['login_true'])) {
  //    header("Location: index.php");
  //    exit;
  // }
  // include("1mm.php") ;
  // include("1yy.php") ;
  ?>
<!--   <style>
  h1 {
    font-size: 16px;
  }
</style> -->
  <?php
  $html='
<div id="content" class="container_12 clearfix">
    <div class="grid_8 style3" id="content-main" >
      <table>
        <tbody>
          <tr>
            <td><img src="print_document_logo_greenbox.jpg" alt="1" height="70px" /> </td>
            <td style="font-size:18px;"> บริษัท มิรดา คอร์ปอเรชั่น จำกัด        ( MIRADA  Corporation  CO.,LTD.)<br />
              สำนักงานใหญ่    168 หมู่ 9 ตำบล อุโมง อำเภอ เมือง จังหวัด ลำพูน รหัสไปรษณีย์ 51150<br />
              http://www.greenboxgps.com  T. 093-1311728 , 088-2528227 FAX. 052-033703  </td>
          </tr>
        </tbody>
      </table>
      <div style="border: 1px solid #000000; padding:10px">
        <h1 style="text-align: center;" class="shadow1"><b>หนังสือรับรองการติดตั้งเครื่องบันทึกข้อมูลการเดินรถ</b>
  ';
  include("config.inc.php") ;
  mysqli_select_db($db) ;
  $echo = "Program by <a href='http://www.funwhan.com' target='_blank'>Ittiphol pudgrajang</a>
  &nbsp;copy right&copy;2003 <a href='mailto:tohm357@hotmail.com'>Contact us</a>" ;

  $result = mysql_query("select * from member where user='$_SESSION[login_true]'") or die ("Err Can not to result") ;
  $dbarr = mysql_fetch_array($result) ;
  $html .='</h1>
        <p class="font1">เลขที่หนังสือ'.$dbarr['year'].' / '.$dbarr['age'].'- '.$dbarr['member_id'].'</p>
        <p class="font1 justify1">บริษัท  มิรดา คอร์ปอเรชั่น จำกัด ที่อยู่ เลขที่ 168 หมู่ 9 ตำบล อุโมง อำเภอ เมือง จังหวัด ลำพูน รหัสไปรษณีย์ 51150 โทรศัพท์ 093-131128
      โทรสาร 052033703 ได้ติดตั้งเครื่องบันทึกข้อมูลการเดินทาง ของรถรายละเอียดดังนี้
        </p>
       <p class="font1 tab"><b>การรับรองจากกรมการขนส่งทางบก เลขที่</b> 207/2560</tab1><br />
        <tab1><b>ชนิด</b> iStartek <b>แบบ</b> VT900 T</tab1><br>
       <tab1><b>หมายเลขเครื่อง </b> '.$dbarr['zipcode'].'<br>
       <tab1><b>เครื่องอ่านแถบแม่เหล็ก ชนิด </b> OCOM <b>แบบ</b> CR1300</tab1><br>
       <tab1><b>วันที่ติดตั้ง </b>    '.$dbarr['date'].' '.$dbarr['sex'].' '.$dbarr['year'].'</tab1><br>
       <tab1><b>ชื่อผู้ประกอบการขนส่ง/เจ้าของรถ </b>  '.$dbarr['name'].'</tab1><br>
       <tab1><b>ยี่ห้อรถ </b> '.$dbarr['address'].' </tab1><br>
       <tab1><b>เลขทะเบียนรถ </b> '.$dbarr['amper'].'             ';
          if($dbarr['province2']=='805'){ echo 'กระบี่'; }
          if($dbarr['province2']=='001'){ echo 'กรุงเทพมหานคร' ; }
          if($dbarr['province2']=='701'){ echo 'กาญจนบุรี' ; }
          if($dbarr['province2']=='406'){ echo 'กาฬสินธ์' ; }
          if($dbarr['province2']=='604'){ echo 'กำแพงเพชร' ; }
          if($dbarr['province2']=='405'){ echo 'ขอนแก่น' ; }
          if($dbarr['province2']=='205'){ echo 'จันทบุรี' ; }
          if($dbarr['province2']=='202'){ echo 'ฉะเชิงเทรา' ; }
          if($dbarr['province2']=='203'){ echo 'ชลบุรี' ; }
          if($dbarr['province2']=='100'){ echo 'ชัยนาท' ; }
          if($dbarr['province2']=='300'){ echo 'ชัยภูมิ' ; }
          if($dbarr['province2']=='800'){ echo 'ชุมพร' ; }
          if($dbarr['province2']=='901'){ echo 'ตรัง' ; }
          if($dbarr['province2']=='206'){ echo 'ตราด' ; }
          if($dbarr['province2']=='602'){ echo 'ตาก' ; }
          if($dbarr['province2']=='200'){ echo 'นครนายก' ; }
          if($dbarr['province2']=='702'){ echo 'นครปฐม' ; }
          if($dbarr['province2']=='403'){ echo 'นครพนม' ; }
          if($dbarr['province2']=='305'){ echo 'นครราชสีมา' ; }
          if($dbarr['province2']=='804'){ echo 'นครศรีธรรมราช' ; }
          if($dbarr['province2']=='607'){ echo 'นครสวรรค์' ; }
          if($dbarr['province2']=='107'){ echo 'นนทบุรี' ; }
          if($dbarr['province2']=='906'){ echo 'นราธิวาส' ; }
          if($dbarr['province2']=='504'){ echo 'น่าน' ; }
          if($dbarr['province2']=='309'){ echo 'บึงกาฬ' ; }
          if($dbarr['province2']=='904'){ echo 'บึตตานี' ; }
          if($dbarr['province2']=='304'){ echo 'บุรีรัมย์' ; }
          if($dbarr['province2']=='106'){ echo 'ปทุมธานี' ; }
          if($dbarr['province2']=='707'){ echo 'ประจวบคีรีขันธ์' ; }
          if($dbarr['province2']=='201'){ echo 'ปราจีนบุรี' ; }
          if($dbarr['province2']=='105'){ echo 'พระนครศรีอยุธยา' ; }
          if($dbarr['province2']=='503'){ echo 'พะเยา' ; }
          if($dbarr['province2']=='803'){ echo 'พังงา' ; }
          if($dbarr['province2']=='900'){ echo 'พัทลุง' ; }
          if($dbarr['province2']=='605'){ echo 'พิจิตร' ; }
          if($dbarr['province2']=='603'){ echo 'พิษณุโลก' ; }
          if($dbarr['province2']=='806'){ echo 'ภูเก็ต' ; }
          if($dbarr['province2']=='407'){ echo 'มหาสารคาม' ; }
          if($dbarr['province2']=='409'){ echo 'มุกดาหาร' ; }
          if($dbarr['province2']=='905'){ echo 'ยะลา' ; }
          if($dbarr['province2']=='301'){ echo 'ยโสธร' ; }
          if($dbarr['province2']=='801'){ echo 'ระนอง' ; }
          if($dbarr['province2']=='204'){ echo 'ระยอง' ; }
          if($dbarr['province2']=='703'){ echo 'ราชบุรี' ; }
          if($dbarr['province2']=='408'){ echo 'ร้อยเอ็ด' ; }
          if($dbarr['province2']=='102'){ echo 'ลพบุรี' ; }
          if($dbarr['province2']=='506'){ echo 'ลำปาง' ; }
          if($dbarr['province2']=='505'){ echo 'ลำพูน' ; }
          if($dbarr['province2']=='303'){ echo 'ศรีสะเกษ' ; }
          if($dbarr['province2']=='404'){ echo 'สกลนคร' ; }
          if($dbarr['province2']=='902'){ echo 'สงขลา' ; }
          if($dbarr['province2']=='903'){ echo 'สตูล' ; }
          if($dbarr['province2']=='108'){ echo 'สมุทรปราการ' ; }
          if($dbarr['province2']=='705'){ echo 'สมุทรสงคราม' ; }
          if($dbarr['province2']=='704'){ echo 'สมุทรสาคร' ; }
          if($dbarr['province2']=='104'){ echo 'สระบุรี' ; }
          if($dbarr['province2']=='207'){ echo 'สระแก้ว' ; }
          if($dbarr['province2']=='101'){ echo 'สิงห์บุรี' ; }
          if($dbarr['province2']=='700'){ echo 'สุพรรณบุรี' ; }
          if($dbarr['province2']=='802'){ echo 'สุราษฎร์ธานี' ; }
          if($dbarr['province2']=='306'){ echo 'สุรินทร์' ; }
          if($dbarr['province2']=='601'){ echo 'สุโขทัย' ; }
          if($dbarr['province2']=='400'){ echo 'หนองคาย' ; }
          if($dbarr['province2']=='308'){ echo 'หนองบัวลำภู' ; }
          if($dbarr['province2']=='307'){ echo 'อำนาจเจริญ' ; }
          if($dbarr['province2']=='402'){ echo 'อุดรธานี' ; }
          if($dbarr['province2']=='600'){ echo 'อุตรดิตถ์' ; }
          if($dbarr['province2']=='608'){ echo 'อุทัยธานี' ; }
          if($dbarr['province2']=='302'){ echo 'อุบลราชธานี' ; }
          if($dbarr['province2']=='103'){ echo 'อ่างทอง' ; }
          if($dbarr['province2']=='500'){ echo 'เชียงราย' ; }
          if($dbarr['province2']=='502'){ echo 'เชียงใหม่' ; }
          if($dbarr['province2']=='606'){ echo 'เพชรบุรณ์' ; }
          if($dbarr['province2']=='706'){ echo 'เพชรบุรี' ; }
          if($dbarr['province2']=='401'){ echo 'เลย' ; }
          if($dbarr['province2']=='507'){ echo 'แพร่' ; }
          if($dbarr['province2']=='501'){ echo 'แม่ฮ่องสอน' ; }
        $html .='</tab1><br>
       <tab1><b>หมายเลขคัสซี  </b>'.$dbarr['user'].'</tab1><br>
       <tab1><b>หมายเหตุ</b>
........................................................................................................................................</tab1><br>
       <tab1>ขอรับรองว่าเครื่องบันทึกข้อมูลการเดินทางของรถดังกล่าวข้างต้นมีคุณลักษณะและระบบการทำงานที่ได้</tab1></p>
        <p class="tab font1"><tab1>รับรองจากกรมการขนส่งทางบก</tab1></p>
        <p class="tab font1">กรณีเครื่องบันทึกข้อมูลการเดินทาง
ของรถมีคุณลักษณะหรือระบบการทำงานไม่เป็นไปตามที่กรมการขนส่งทางบกได้ให้การ
รับรองหรือมีการรายงานข้อมูลไม่ตรงกับข้อเท็จจริงหรือไม่สามารถรายงานข้อมูล
ได้ตามที่กรมการขนส่งทางบกกำหนด <br />
บริษัท  มิรดา คอร์ปอเรชั่น จำกัด
ยินยอมรับผิดชอบต่อความเสียหายทั้งหมดที่เกิดขึ้นต่อเจ้าของรถหรือผู้ประกอบ
การขนส่งที่ได้ซื้อหรือใช้บริการเครื่องบันทึกข้อมูลการเดินทางของรถดัง
กล่าวทุกประการ</p>

        <div>
          <!-- <p class="tab font1>ออกให้ ณ วันที่ 4เมษายน2559</p>
          <p>ลงชื่อ ......................................................................</p>
          <p>( วรโชติ เทพรักษา)</p>
          <p>ห้างหุ้นส่วนจำกัด เวิลด์จีพีเอสแทรคเกอร์</p> -->
          <table style="margin: 0 0 0em;" width="100%">
              <tbody><tr><td rowspan="4" width="60%">
</td><td class="font1" style="text-align: center;">ออกให้ ณ วันที่   '.$dbarr['date'].' '.$dbarr['sex'].' '.$dbarr['year'].'</td></tr>
              <tr><td style="text-align: center;" class="font1"><BR>ลงชื่อ......................................................................</td></tr>
              <tr><td style="text-align: center;" class="font1"> ( '.$dbarr['education'].' )</td></tr>
              <tr><td style="text-align: center;" class="font1">'.$dbarr['work'].'</td></tr>
          </tbody></table>
       </div>

      </div>
        <h2><b>หมายเหตุ :</b></h2>
        <p class="font1 justify1 " style="padding-top: 0px">1.ชนิดและแบบของเครื่องบันทึกข้อมูลการเดินทางของรถและ
เครื่องอ่านบัตรชนิดแถบแม่เหล็กให้เป็นไปตามรายละเอียดที่ได้รับการรับรอง
จากกรมขนส่งทางบก</tab1>
        <p class="font1 justify1" style="padding-top:0px">2.กรณีเป็นการติดตั้งเครื่องใหม่ทดแทนของเดิมให้ระบุราย
ละเอียดของเครื่องบันทึกข้อมูลการเดินทางของรถเครื่องเดิมในช่องหมายเหตุ
เช่น ผู้ให้บริการเดิม ชนิดและแบบเดิม หมายเลขเครื่องเดิม</tab1></p>
  </div>
  ';

   ?>
   <!-- <======================================end page1=======================================> -->


   <!-- <======================================start page2=======================================> -->
   <?php
  $html2 .='<div id="div" class="container_12 clearfix">
          <div id="div2" class="grid_8">
            <table width="497" border="1" cellpadding="0" cellspacing="0" style="margin: 0 0 0em;">
              <tbody>
                <tr>
                  <td><img src="logo_1.jpg" height="100" width="100" /></td>
                  <td rowspan="2" style="padding: 5px;"><span class="style3"><b>การรับรองจากกรมการขนส่งทางบก เลขที่</b> 207/2560<br />
                      <b>ชนิด</b> iStartek <b>แบบ</b> VT900 T <br />
                        <b>หมายเลขเครื่อง </b>'.$dbarr["zipcode"] .'<br />
                        <b>เลขทะเบียนรถ </b> '. $dbarr["amper"];
                   if($dbarr["province2"]=="805"){ echo "กระบี่" ; }
                   if($dbarr["province2"]=="407"){ echo "มหาสารคาม" ; }
                   if($dbarr["province2"]=="001"){ echo "กรุงเทพมหานคร" ; }
                   if($dbarr["province2"]=="701"){ echo "กาญจนบุรี" ; }
                   if($dbarr["province2"]=="406"){ echo "กาฬสินธ์" ; }
                   if($dbarr["province2"]=="604"){ echo "กำแพงเพชร" ; }
                   if($dbarr["province2"]=="405"){ echo "ขอนแก่น" ; }
                   if($dbarr["province2"]=="205"){ echo "จันทบุรี" ; }
                   if($dbarr["province2"]=="202"){ echo "ฉะเชิงเทรา" ; }
                   if($dbarr["province2"]=="203"){ echo "ชลบุรี" ; }
                   if($dbarr["province2"]=="100"){ echo "ชัยนาท" ; }
                   if($dbarr["province2"]=="300"){ echo "ชัยภูมิ" ; }
                   if($dbarr["province2"]=="800"){ echo "ชุมพร" ; }
                   if($dbarr["province2"]=="901"){ echo "ตรัง" ; }
                   if($dbarr["province2"]=="206"){ echo "ตราด" ; }
                   if($dbarr["province2"]=="602"){ echo "ตาก" ; }
                   if($dbarr["province2"]=="200"){ echo "นครนายก" ; }
                   if($dbarr["province2"]=="702"){ echo "นครปฐม" ; }
                   if($dbarr["province2"]=="403"){ echo "นครพนม" ; }
                   if($dbarr["province2"]=="305"){ echo "นครราชสีมา" ; }
                   if($dbarr["province2"]=="804"){ echo "นครศรีธรรมราช" ; }
                   if($dbarr["province2"]=="607"){ echo "นครสวรรค์" ; }
                   if($dbarr["province2"]=="107"){ echo "นนทบุรี" ; }
                   if($dbarr["province2"]=="906"){ echo "นราธิวาส" ; }
                   if($dbarr["province2"]=="504"){ echo "น่าน" ; }
                   if($dbarr["province2"]=="309"){ echo "บึงกาฬ" ; }
                   if($dbarr["province2"]=="904"){ echo "บึตตานี" ; }
                   if($dbarr["province2"]=="304"){ echo "บุรีรัมย์" ; }
                   if($dbarr["province2"]=="106"){ echo "ปทุมธานี" ; }
                   if($dbarr["province2"]=="707"){ echo "ประจวบคีรีขันธ์" ; }
                   if($dbarr["province2"]=="201"){ echo "ปราจีนบุรี" ; }
                   if($dbarr["province2"]=="105"){ echo "พระนครศรีอยุธยา" ; }
                   if($dbarr["province2"]=="503"){ echo "พะเยา" ; }
                   if($dbarr["province2"]=="803"){ echo "พังงา" ; }
                   if($dbarr["province2"]=="900"){ echo "พัทลุง" ; }
                   if($dbarr["province2"]=="605"){ echo "พิจิตร" ; }
                   if($dbarr["province2"]=="603"){ echo "พิษณุโลก" ; }
                   if($dbarr["province2"]=="806"){ echo "ภูเก็ต" ; }
                   if($dbarr["province2"]=="409"){ echo "มุกดาหาร" ; }
                   if($dbarr["province2"]=="905"){ echo "ยะลา" ; }
                   if($dbarr["province2"]=="301"){ echo "ยโสธร" ; }
                   if($dbarr["province2"]=="801"){ echo "ระนอง" ; }
                   if($dbarr["province2"]=="204"){ echo "ระยอง" ; }
                   if($dbarr["province2"]=="703"){ echo "ราชบุรี" ; }
                   if($dbarr["province2"]=="408"){ echo "ร้อยเอ็ด" ; }
                   if($dbarr["province2"]=="102"){ echo "ลพบุรี" ; }
                   if($dbarr["province2"]=="506"){ echo "ลำปาง" ; }
                   if($dbarr["province2"]=="505"){ echo "ลำพูน" ; }
                   if($dbarr["province2"]=="303"){ echo "ศรีสะเกษ" ; }
                   if($dbarr["province2"]=="404"){ echo "สกลนคร" ; }
                   if($dbarr["province2"]=="902"){ echo "สงขลา" ; }
                   if($dbarr["province2"]=="903"){ echo "สตูล" ; }
                   if($dbarr["province2"]=="108"){ echo "สมุทรปราการ" ; }
                   if($dbarr["province2"]=="705"){ echo "สมุทรสงคราม" ; }
                   if($dbarr["province2"]=="704"){ echo "สมุทรสาคร" ; }
                   if($dbarr["province2"]=="104"){ echo "สระบุรี" ; }
                   if($dbarr["province2"]=="207"){ echo "สระแก้ว" ; }
                   if($dbarr["province2"]=="101"){ echo "สิงห์บุรี" ; }
                   if($dbarr["province2"]=="700"){ echo "สุพรรณบุรี" ; }
                   if($dbarr["province2"]=="802"){ echo "สุราษฎร์ธานี" ; }
                   if($dbarr["province2"]=="306"){ echo "สุรินทร์" ; }
                   if($dbarr["province2"]=="601"){ echo "สุโขทัย" ; }
                   if($dbarr["province2"]=="400"){ echo "หนองคาย" ; }
                   if($dbarr["province2"]=="308"){ echo "หนองบัวลำภู" ; }
                   if($dbarr["province2"]=="307"){ echo "อำนาจเจริญ" ; }
                   if($dbarr["province2"]=="402"){ echo "อุดรธานี" ; }
                   if($dbarr["province2"]=="600"){ echo "อุตรดิตถ์" ; }
                   if($dbarr["province2"]=="608"){ echo "อุทัยธานี" ; }
                   if($dbarr["province2"]=="302"){ echo "อุบลราชธานี" ; }
                   if($dbarr["province2"]=="103"){ echo "อ่างทอง" ; }
                   if($dbarr["province2"]=="500"){ echo "เชียงราย" ; }
                   if($dbarr["province2"]=="502"){ echo "เชียงใหม่" ; }
                   if($dbarr["province2"]=="606"){ echo "เพชรบุรณ์" ; }
                   if($dbarr["province2"]=="706"){ echo "เพชรบุรี" ; }
                   if($dbarr["province2"]=="401"){ echo "เลย" ; }
                   if($dbarr["province2"]=="507"){ echo "แพร่" ; }
                   if($dbarr["province2"]=="501"){ echo "แม่ฮ่องสอน" ; }
  $html2 .='<br />
                        <b>หมายเลขคัสซี </b>'.$dbarr["user"].'<br />
                        <b>ผู้ให้บริการระบบติดตามรถ </b>บริษัท  มิรดา คอร์ปอเรชั่น จำกัด<br />
                        <b>วันที่ติดตั้ง</b>  '.$dbarr["date"]." ".$dbarr["sex"]." ".$dbarr["year"] .'</span></td>
                </tr>
                <tr>
                  <td><img src="greenbox_logo.jpg" height="" width="100" /></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div id="div3" class="grid_3 push_1"><a class="print-preview">Print this page</a>
              <div id="div4">
                <!-- <h2>Consectetur adipisicing</h2>
            <ul>
                <li><a href="http://designfestival.com">Lorem</a></li>
                <li><a href="http://designfestival.com">Ipsum dollar</a></li>
                <li><a href="http://designfestival.com">Sit amet consectetur</a></li>
                <li><a href="http://designfestival.com">Sed do eiusmod</a></li>
                <li><a href="http://designfestival.com">Tempor incididunt</a></li>
            </ul>
        </div>

        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p> -->
              </div>
          </div>
          <div id="div5" class="container_12">
            <div class="grid_6">
              <!-- <p class="footer-links"><a href="#">Aliquam</a> | <a href="#">Iincidunt</a> | <a href="#">Mauris eu risus</a> | <a href="#">Consectetur</a></p> -->
            </div>
            <div class="grid_6">
              <!-- <p>&copy; All images copyright to their respective owners - courtousy of <a href="http://flickholdr.com/">http://flickholdr.com/</a></p> -->
            </div>
          </div>
        </div>
        <span class="style7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; http://'.$dbarr["email"].'<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; User : '.$dbarr["phone"].'</span><span class="style1"><br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style8">Pass  :&nbsp;123456</span></span><br />
 <span class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style22">&nbsp;<span class="style23">เบอร์โทรในเครื่อง GPS :&nbsp;';

    if($dbarr["sim"]=="0"){ echo "True" ; }
    if($dbarr["sim"]=="AIS"){ echo "AIS" ; }
    if($dbarr["sim"]=="3"){ echo "AIS" ; }
    if($dbarr["sim"]=="True"){ echo "True" ; }
    if($dbarr["sim"]=="DTAC"){ echo "DTAC" ; }
    if($dbarr["sim"]=="5"){ echo "DTAC" ; }

  $html2 .='&nbsp;'.$dbarr["simno"] .'</span></span></span><br />
 <br />';
    ?>
  <!-- <============================================end page2==========================================> -->
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
    $css = file_get_contents('css/print2.css');
    $mpdf->writeHTML($css, 1);
    $mpdf->WriteHTML($html);
    $mpdf->AddPage();
    $mpdf->WriteHTML($html2);
    $mpdf->Output();
   ?>
  </body>
</html>
