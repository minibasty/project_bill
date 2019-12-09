<?php
//The url you wish to send the POST request to
$url = 'http://www.thaiwebsms.com/vip/api_zsrt.php';

//The data you want to send via POST
$fields = [
	'username' => '014959561',
	'password' => '66882000',
	 'secret' => 'o2r5ttjt',
	  'glist' => '014959561',
	 'lang' => 'tha',
	 'musecre' => '0',
	 'sender' => '0804932560',
	 'restcre' => '1219',
	 'dest' => '0804932560',
	 'msg' => 'ทดสอบ',
];

//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);
echo $result;
?>