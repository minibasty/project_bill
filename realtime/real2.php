
<?php

  date_default_timezone_set("Asia/Bangkok");
  // $user = "root";
  // $pass = "12345678";
  // $dbname = "traccar1";
  // $host = "localhost";

  $user = "root";
  $pass = "Ple01010";
  $dbname = "traccar";
  $host ="traccar.c8vllhupqgdl.ap-southeast-1.rds.amazonaws.com";
  // base64_encode("mirada_test:k5OmVT");
  //echo date("Y-m-d H:i:s") . " ************** \n";
  $conn = new mysqli($host, $user, $pass, $dbname);
  // $conn = mysqli_connect($host, $user, $pass, $dbname) or die('Could not connect: ' . mysqli_error());
  //$db_selected = mysqli_select_db($dbname, $conn) or die ('Can\'t use Database : ' . mysqli_error());
  // mysqli_query($conn,"SET NAMES UTF8");
  error_reporting(~E_NOTICE);
  $login = 'mirada.thp';
  $password = 'mirada@2018';
  $url = '122.155.167.137/WSDLSERV11_GPS/service.asmx/AddLocation';
  $service_key = "mirada.thp:mirada@2018";
  echo $dateNow =date("Y-m-d H:i:s", strtotime("- 3 DAY"));
  $readcount = 0;
    $vender_id = '17';
    $sql = "SELECT
  *
  FROM
  `positions`
  ORDER BY id DESC
  LIMIT 9900";
    $msc=microtime(true);
    $query=mysqli_query($conn, $sql);
    $msc=microtime(true)-$msc;
    echo "<br>".$msc.' seconds'; // in seconds
    // $resultArray = array();
    // $dataArray = array();
    // $resultIdData = array();//เก็บค่า data_id ไว้ update status
    //$num = $query->num_rows;
    $resultArray=array();
    echo $row;
    $num;
    while ($row=$query->fetch_assoc())
    {
      $readcount++;
      $null="";
      $timeset1="";
      $timeset2="";
      $attributesShow=$row['attributes'];
      // $attributes=json_decode($attributesShow, true);
      // $attributes['status'];
      $vender_id = "17";
      $unit_vender= "0170001";
      $unit_id = $unit_vender . str_pad($row['uniqueid'], 20, "0", STR_PAD_LEFT);// set unit id
      $utc_ts = $row['devicetime'];  //utc_ts
      $recv_utc_ts=$row['servertime'];
      $lat = $row['latitude'];
      $long = $row['longitude'];
      $alt = $row['altitude'];
      $speed = ($row['speed']* 1.60934);
      $engine_status=0;
      $fix=0;
      $license="";
      $course=$row['course']."<br />";
      $hdop= $attributes['hdop'];

      //ประกาศ Array ให้ตัวแปร $resultArray
      array_push($resultArray,array(
        "driver_id"=>$null,
        "unit_id"=> $unit_id,
        "seq"=> '0',
        "utc_ts"=> $utc_ts,
        "recv_utc_ts"=> $recv_utc_ts,
        "lat"=> $lat,
        "lon"=> $long,
        "alt"=> $alt,
        "speed"=> $speed,
        // "engine_status"=> ////////////////////,
        "fix"=> $null,
        "license"=> $null,
        "course"=> $course,
        // "hdop"=> round($rw['HDOP']),//ปัดเศษ
        // "num_sats"=> $rw['Number_satellites'],
        "gsm_cell"=> $null,
        "gsm_loc"=> $null,
        // "gsm_rssi"=> $rw['GSM_signal_strength'],
        "mileage"=> $null,
        "ext_power_status"=> $ext_power_status,
        "ext_power"=> $null,
        "high_acc_count"=> $null,
        "high_de_acc_count"=> $null,
        "over_speed_count"=> $null,
        "max_speed"=> $null
      ));
    } //ปิด while
    echo $readcount;
    $dataArray = json_encode(array("vender_id"=>$vender_id,"locations_count"=>$readcount,"locations"=>$resultArray));
    // echo $dataArray[vender_id];
    // $ch = curl_init();
    //
    // curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    // curl_setopt($ch, CURLOPT_POST, 1);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $dataArray);
    // //        curl_setopt($ch, CURLOPT_USERPWD, "mirada_test:k5OmVT");
    // curl_setopt($ch, CURLOPT_USERPWD, $service_key);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    //
    // $curl_response = curl_exec($ch);
    // //        echo("result :");
    // //        echo($curl_response);
    // if ($curl_response === false) {
    //     $info = curl_getinfo($ch);
    //     curl_close($ch);
    //     die('error occured during curl exec. Additioanl info: ' . var_export($info));
    // }
    // curl_close($ch);
    // echo json_decode($curl_response);
 ?>
