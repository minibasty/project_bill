<?php
include('function.php');
date_default_timezone_set("Asia/Bangkok");
$user = "root";
$pass = "Ple01010";
$dbname = "traccar";
$host = "traccar.c8vllhupqgdl.ap-southeast-1.rds.amazonaws.com";

// $user = "root";
// $pass = "12345678";
// $dbname = "traccar";
// $host = "localhost";

$login = 'mirada.thp';
$password = 'mirada@2018';
$url = '122.155.167.137/WSDLSERV11_GPS/service.asmx/AddLocation';
$service_key = "mirada.thp:mirada@2018";

$conn = new mysqli ($host , $user, $pass, $dbname);
/*echo base64_encode("mirada_test:k5OmVT");
exit;*/
//echo date("Y-m-d H:i:s") . " ************** \n";

	function positions()
	{
		// $user = "root";
		// $pass = "12345678";
		// $dbname = "traccar";
		// $host = "localhost";

		$user = "root";
		$pass = "Ple01010";
		$dbname = "traccar";
		$host = "traccar.c8vllhupqgdl.ap-southeast-1.rds.amazonaws.com";

		$conn = new mysqli ($host , $user, $pass, $dbname);

		$sql_positions="SELECT
			`positions`.`id`,
			`positions`.`deviceid`,
			`positions`.`servertime`,
			`positions`.`devicetime`,
			`positions`.`fixtime`,
			`positions`.`valid`,
			`positions`.`latitude`,
			`positions`.`longitude`,
			`positions`.`altitude`,
			`positions`.`speed`,
			`positions`.`course`,
			`positions`.`address`,
			`positions`.`attributes`,
			`positions`.`accuracy`,
			`positions`.`network`
		FROM
			`positions`
    ORDER BY id DESC
		LIMIT 500";
		$positionArray=array();
		$rs_positions=$conn->query($sql_positions);
		while ($row_positions=$rs_positions->fetch_assoc())
		{
			array_push($positionArray,$row_positions);
		}
		mysqli_close($conn);
		return json_encode($positionArray);
	}


	$jsonPosition = positions();
	$decodePosition = json_decode($jsonPosition, true);

	$sql_devices="SELECT
  `devices`.`id`,
  `devices`.`uniqueid`,
  `devices`.`connect_post`
	FROM
  `devices`
	WHERE
  `devices`.`connect_post` = '1'";
	$rs_devices=$conn->query($sql_devices);
	// print_r($decodePosition);
	$countData=0;
	$resultArray=array();
	//devices
while ($row_device=$rs_devices->fetch_assoc()) {

	//positions
	foreach ($decodePosition as $position_data) {
		echo $devicetime=$position_data['devicetime']." ";
		echo $timeNow=date("Y-m-d H:m:s")." =";
		$timeDiff=DateTimeDiff($timeNow,$devicetime);
		echo $timeDiff."<br>";
			if ($row_device['id']==$position_data['deviceid'])
			{
				$countData++;
	      $null="";
	      // $attributesShow=$row['attributes'];
	      // $attributes=json_decode($attributesShow, true);
	      // $attributes['status'];
	      $vender_id = "17";
	      $unit_vender= "0170001";
	      $unit_id = $unit_vender . str_pad($row_device['uniqueid'], 20, "0", STR_PAD_LEFT);// set unit id
	      $utc_ts = $position_data['devicetime'];  //utc_ts
	      $recv_utc_ts=$position_data['servertime'];
	      $lat = $position_data['latitude'];
	      $long = $position_data['longitude'];
	      $alt = $position_data['altitude'];
	      $speed = ($position_data['speed']* 1.60934);
	      $engine_status=0;
	      $fix=0;
	      $license="";
	      $course=$position_data['course']."<br />";
	      // $hdop= $attributes['hdop'];

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
	        "ext_power_status"=> $null,
	        "ext_power"=> $null,
	        "high_acc_count"=> $null,
	        "high_de_acc_count"=> $null,
	        "over_speed_count"=> $null,
	        "max_speed"=> $null));
			}
		}
	}
	// echo $countData."<br />";
	$dataArray = json_encode(array("vender_id"=>$vender_id,"locations_count"=>$countData,"locations"=>$resultArray));
	// print_r($dataArray);

	// $ch = curl_init();
	// curl_setopt($ch, CURLOPT_URL, $url);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	// curl_setopt($ch, CURLOPT_POST, 1);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $dataArray);
	// //        curl_setopt($ch, CURLOPT_USERPWD, "mirada_test:k5OmVT");
	// curl_setopt($ch, CURLOPT_USERPWD, $service_key);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	// $curl_response = curl_exec($ch);
	// echo $curl_response;
	// //        echo("result :");
	// //        echo($curl_response);
	// if ($curl_response === false) {
	//     $info = curl_getinfo($ch);
	//     curl_close($ch);
	//     die('error occured during curl exec. Additioanl info: ' . var_export($info));
	// }
	// // echo $curl_response;
	// curl_close($ch);


?>
