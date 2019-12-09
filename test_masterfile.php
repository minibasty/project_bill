<?php

function addMasterfile(){
	
	$login = 'mirada';
	$password = 'XNpA32WCdcUb';
	// Add MasterFile
	$url = 'https://gpsservice.dlt.go.th/masterfile/add';
	/*-----------------------------------------------------------------*/
	//Data Json
	$data_json='{
	"vender_id" : 84,
	"unit_id" : "084000500000863835024637097",
	"vehicle_id" : "9Â¡Â§1002",
	"vehicle_type" : "TOYOTA",
	"vehicle_chassis_no" : "MIRADAT3330002",
	"vehicle_register_type" : 1,
	"card_reader" : 1,
	"province_code" : 500
	}';
	/*-----------------------------------------------------------------*/

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
	curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$response  = curl_exec($ch);
	return $response;
	print_r(json_decode($response));
	curl_close($ch);
}

function getMasterfile(){
	$server = 'https://gpsservice.dlt.go.th/masterfile/getByChassis/(à¸„à¸±à¸”à¸‹à¸µ)';
	$login = 'mirada';
	$password = 'XNpA32WCdcUb';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$server);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$result = curl_exec($ch);
	return $result;
	curl_close($ch);
}

function delMasterfile(){
	$login = 'mirada';
	$password = 'XNpA32WCdcUb';
	$key= "mirada:XNpA32WCdcUb";
		// Remove Masterfile
	$url = 'https://gpsservice.dlt.go.th/masterfile/rmvByUnit/084000500000359857080317266';
	// $url = 'https://gpsservice.dlt.go.th/masterfile/getByChassis/(à¸„à¸±à¸”à¸‹à¸µ)'
	/*-----------------------------------------------------------------*/

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL,$url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json;charset=utf-8'));
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl, CURLOPT_USERPWD, $key);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 

    $curl_response = curl_exec($curl);
    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }
    curl_close($curl);
    $result = json_decode($curl_response);
    print_r($result);
}

function getPost($unit){
	$server = 'http://122.155.167.137:3000/masterfile/getByUnit/'.$unit;
	$key= "mirada.thp:mirada@2018";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$server);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, "$key");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$result = curl_exec($ch);
	return $result;
	curl_close($ch);
}

function delPost($unit){
	$key= "mirada.thp:mirada@2018";
	// Remove Masterfile
	$url = 'http://122.155.167.137:3000/masterfile/rmvByUnit/'.$unit;
	/*-----------------------------------------------------------------*/

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL,$url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json;charset=utf-8'));
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl, CURLOPT_USERPWD, $key);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 

    $curl_response = curl_exec($curl);
    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }
    curl_close($curl);
    $result = json_decode($curl_response);
    print_r($result);
}




?>
<div >
	<form method="post" action="">
	<input type="text" name="unitId" id="unitId" placehoder="Unit ID">
	<hr>
	DLT
	<button style="margin-top: 10px" class="form-control" name="add" type="submit" hidden>Add Masterfile</button><br>
	<button style="margin-top: 10px" class="form-control" name="del" type="submit" >Delete Masterfile</button><br>
	<button style="margin-top: 10px" class="form-control" name="get" type="submit" >Get Masterfile</button><br>
	<hr>
	POST
	<button style="margin-top: 10px" class="form-control" name="getPost" type="submit" >Get Masterfile</button><br>
	<button style="margin-top: 10px" class="form-control" name="delpost" onclick="return confirm('ลบ Masterfile Post')" type="submit" >Get Masterfile</button><br>
	</form>
	Response :: 
	<?php 
	if(isset($_POST['add'])){
		// print_r(delMasterfile());
	}
	if(isset($_POST['get'])){
		print_r(getMasterfile());
	}
	if(isset($_POST['del'])){
		print_r(delMasterfile());
	}

	if(isset($_POST['getPost'])){
		print_r(getPost($_POST['unitId']));
	}

	if(isset($_POST['delpost'])){
		print_r(delPost($_POST['unitId']));
	}

	?> 
</div>