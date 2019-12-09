<?php
$login = 'mirada';
$password = 'XNpA32WCdcUb';

/*echo base64_encode("mirada_test:k5OmVT");
exit;*/
$unit_id="084000400000000142181256079";
$url = 'https://gpsservice.dlt.go.th/masterfile/add';
$data_json='{
"vender_id" : 84,
"unit_id" : .,
"vehicle_id" : "030-2589",
"vehicle_type" : "ISUZU",
"vehicle_chassis_no" : "CSA6502601390",
"vehicle_register_type" : 1122,
"card_reader" : 1,
"province_code" : 806
}';

echo "$data_json";
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
// curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

// $response  = curl_exec($ch);

// print_r(json_decode($response));
// curl_close($ch);
?>