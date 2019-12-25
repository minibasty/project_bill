<html lang="en" dir="ltr">
<?php 
  include('config.php');
 ?>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.js">
    <!-- <script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8" async defer></script> -->

    <style>
    body{
      /* background-image: url("img/bg/IMG_145114.jpg"); */
      /* background-color: $c0c0c0 ; */
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100vw;
      }
    .bg_head{
      background-color: #E8EBA7 ;
      color: #000000;
      font-weight: bold;
    }

    .bg_opticity{
        opacity: 0.9;
        background-color: #C3B086;
      }

    .menu_cs{
      font-weight: bold;
      color: #000000;
    }
    input[type="text"]{
      background-color: #FFFFFF;
    }
    .card{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        /* text-align: center; */
        }
    </style>
  </head>
  <body>

    <?php 

      // เรียกใช้ตาราง Province_code ในฐานข้อมูล เพื่อดึง
      $sql_province="SELECT * FROM province_code";
      $result_province=$conn->query($sql_province);

      // เรียกใช้ตาราง Province_code ในฐานข้อมูล เพื่อดึง
      $sql_member="SELECT * FROM member WHERE user='$_GET[user]'";
      $result_member=$conn->query($sql_member);
      $row=$result_member->fetch_array();
     ?>
<form action="" method="Post" accept-charset="utf-8">
    <div class="container" style="padding-top:50px">
      <div class="card">
        <div class="card-header text-center bg_head">
          <h4>สร้าง MasterFile</h4>
        </div>
        
        <div class="card-body"">
          <div class="card-header text-right">
            <!-- Server  -->
            <div class="form-group row">
              <label for="server" class="col-sm-4 col-form-label menu_cs">Server</label>
              <div class="col-sm-8">
                <select name="server" class="form-control" readonly>
                  <option value="1" <?php if($row['email']=="s1.gpsgreenbox.com"){ echo "selected"; } ?>>Server 1</option>
                  <option value="2" <?php if($row['email']=="s2.gpsgreenbox.com"){ echo "selected"; } ?>>Server 2</option>
                  <option value="3" <?php if($row['email']=="s3.gpsgreenbox.com"){ echo "selected"; } ?>>Server 3</option>
                  <option value="4" <?php if($row['email']=="s4.gpsgreenbox.com"){ echo "selected"; } ?>>Server 4</option>
                  <option value="5" <?php if($row['email']=="s5.gpsgreenbox.com"){ echo "selected"; } ?>>Server 5</option>
                </select>
              </div>
            </div>

            <!-- Protocol -->
            <div class="form-group row">
              <label for="protocol" class="col-sm-4 col-form-label menu_cs">GPS รุ่น</label>
              <div class="col-sm-8">
                <input class="form-control" readonly type="text" name="protocol" value="<?= $row['gpsmodel1'] ?>">
              </div>
            </div>
            
            <!-- IMEI -->
            <div class="form-group row">
              <label for="imei" class="col-sm-4 col-form-label menu_cs">IMEI</label>
              <div class="col-sm-8">
                <input class="form-control" readonly type="text" name="imei" value="<?= $row['zipcode'] ?>">
              </div>
            </div>
          </div>
          
        <div class="card-header text-right">
          <!-- ทะเบียน -->
          <div class="form-group row ">
            <label for="number" class="col-sm-4 col-form-label menu_cs">ทะเบียน</label>
            <div class="col-sm-8">
              <input class="form-control" readonly type="text" name="number" value="<?= $row['amper'] ?>">
            </div>
          </div>

          <!-- ยี่ห้อรถ -->
          <div class="form-group row">
            <label for="brand" class="col-sm-4 col-form-label menu_cs">ยี้ห้อรถ</label>
            <div class="col-sm-8">
              <input class="form-control" readonly type="text" name="number" value="<?= $row['address'] ?>">
            </div>
          </div> 
          
          <!-- ตัวถังรถ -->
          <div class="form-group row">
            <label for="chassis" class="col-sm-4 col-form-label menu_cs">เลขตัวถังรถ</label>
            <div class="col-sm-8">
              <input class="form-control" readonly type="text" name="chassis" value="<?= $row['user'] ?>">
            </div>
          </div>

          <!-- จังหวัดที่จดทะเบียน -->
          <div class="form-group row">
            <label for="province" class="col-sm-4 col-form-label menu_cs">จังหวัดที่จดทะเบียน</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" readonly name="" value="<?= $row['province2'] ?>">
            </div>
          </div>

          <!-- *** ชนิดการจดทะเบียน -->
          <div class="form-group row">
            <label for="register_type" class="col-sm-4 col-form-label menu_cs">ชนิดการจดทะเบียน</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" readonly name="" value="<?= $row['register_type'] ?>">
            </div>
          </div>

          <!-- *** ชื่อผู้ประกอบการขนส่ง/เจ้าของรถ -->
          <div class="form-group row">
            <label for="regis_name" class="col-sm-4 col-form-label menu_cs">ชื่อผู้ประกอบการขนส่ง/เจ้าของรถ</label>
            <div class="col-sm-8">
              <input class="form-control"  readonly type="text" name="regis_name" value="<?= $row['name'] ?>">
            </div>
          </div>
          
        </div>
        <div class="offset-4" style="margin-top: 20px ">
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" checked name="connect" value="dlt" class="custom-control-input">
            <label class="custom-control-label" for="customRadio1">ส่งข้อมูลขนส่ง
            <img src="img/connect/dlt.jpg" width="30px" alt="">
            </label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio2" name="connect" value="post" class="custom-control-input">
            <label class="custom-control-label" for="customRadio2">ส่งข้อมูลไปรษณีย์
              <img src="img/connect/post.jpg" width="30px" alt="">
            </label>
          </div>
        </div>
        </div>
        <div class="card-footer text-center bg_head">
          <div class="row">
            
            <div class="col-sm-4 offset-sm-4">
              <button class="btn btn-success" name="ok" type="submit">บันทึก</button>
              <button class="btn btn-danger">ยกเลิก</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </form>
  <?php



// Convert
$numberInput = $row['amper'];
$connect = isset($_POST['connect']) ? $_POST['connect'] : '';
$vender_id = isset($vender_id) ? $vender_id : '';
  if($row['gpsmodel1']=="T333"){ $modelInput="1"; }
  elseif($row['gpsmodel1']=="T1"){ $modelInput="2"; }
  elseif ($row['gpsmodel1']=="AW GPS 3G"){ $modelInput="3"; }
  elseif($row['gpsmodel1']=="VT900"){ $modelInput="4"; }
  elseif($row['gpsmodel1']=="VT900(A)"){ $modelInput="4"; }
  elseif($row['gpsmodel1']=="VT900(U)"){ $modelInput="4"; }
  elseif($row['gpsmodel1']=="VT900(Box)"){ $modelInput="4"; }
  elseif($row['gpsmodel1']=="VT900(Box)(U)"){ $modelInput="4"; }
  elseif($row['gpsmodel1']=="VT900(Box)(A)"){ $modelInput="4"; }
  elseif($row['gpsmodel1']=="GT06E"){ $modelInput="5"; }
  elseif($row['gpsmodel1']=="GT06E(Box)"){ $modelInput="5"; }

$imeiInput = $row['zipcode'];

if ($numberInput=="ป้ายแดง") {
  $vehicle_id="";
}else{
  $numberInput=explode("-",$numberInput);
  $numArr1=mb_strlen($numberInput[0]);
  if ($numArr1==2) {
    $num1="0".$numberInput[0];
  }elseif($numArr1==3){
    $num1=$numberInput[0];
  }
  $num2=str_pad($numberInput[1],4,"0",STR_PAD_LEFT);
  $vehicle_id=$num1.$num2;
}

if ($connect=="dlt") {
  // ถ้าส่ง ขนส่ง
  $url = 'https://gpsservice.dlt.go.th/masterfile/add';
  $key= "mirada:XNpA32WCdcUb";
  $vender_id=84;
  $unitVender="084000";
  $unitModel=$modelInput;
  $unitImei=str_pad($imeiInput,20,"0",STR_PAD_LEFT);
  $unit_id=$unitVender.$unitModel.$unitImei;
  $unit_id=trim($unit_id);

}elseif ($connect=="post") {
  // ถ้าส่ง ปณ
  $url = 'http://122.155.167.137:3000/masterfile/add';
  $vender_id="17";
  $key ="mirada.thp:mirada@2018";
  $unitVender="0170001";
  $unitImei=str_pad($imeiInput,20,"0",STR_PAD_LEFT);
  $unit_id=$unitVender.$unitImei;
  $unit_id=trim($unit_id);
}

$vehicle_type=$row['address'];
$vehicle_chassis_no=$row['user'];
$vehicle_register_type=$row['register_type'];
$province_code=$row['province2'];
$unit_id=isset($unit_id) ? $unit_id : '';

$data_array = array
('vender_id' => $vender_id,
  'unit_id' => $unit_id,
  'vehicle_id' => $vehicle_id,
  'vehicle_type' => $vehicle_type,
  'vehicle_chassis_no' => $vehicle_chassis_no,
  'vehicle_register_type' => $vehicle_register_type,
  'card_reader' => 1,
  'province_code' => $province_code
 );
// $data_iconv = iconv("tis-620","utf-8",$data_array);
$data_json=json_encode($data_array, JSON_UNESCAPED_UNICODE);

// $data_json='{
// "vender_id" : 84,
// "unit_id" : $unit_id,
// "vehicle_id" : "$vehicle_id",
// "vehicle_type" : "$vehicle_type",
// "vehicle_chassis_no" : "$vehicle_chassis_no",
// "vehicle_register_type" : $vehicle_register_type,
// "card_reader" : 1,
// "province_code" : $province_code
// }';

if (isset($_POST['ok'])) {
  // echo $data_json;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
  curl_setopt($ch, CURLOPT_USERPWD, $key);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  $response  = curl_exec($ch);
  $response_decode=(json_decode($response));
  curl_close($ch);
  echo'<div class="card col-6 offset-3">
          <div class="card-header">
           <a href="?p=sendreal&user='.$_GET['user'].'" title=""><button type="button" class="btn btn-outline-info btn-round btn-block">ส่งข้อมูล Realtime</button></a> 
          </div>
          <div class="card-header">
            ข้อมูลที่ส่งไป
          </div>
          <div class="card-body">';
            print_r($data_json);
   echo   '</div>
          <div class="card-header">
            ข้อมูลตอบกลับ
          </div>
          <div class="card-body">';
            print_r($response_decode);
  echo'</div>
    </div>';
}
?>
  <script src="js/jquery-3.2.1.slim.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/popper.min.js" type="text/javascript" charset="utf-8"></script>
</html>


