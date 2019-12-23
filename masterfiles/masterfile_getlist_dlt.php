<!DOCTYPE html>
<?php 
// include('../config.php'); 
?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../fontawesome/css/all.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.js">
    <script src="../js/sweetalert.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<style type="text/css">
		.bg-purple{
          background-color: #9a1fb9;
          color: #FFFFFF;
        }
	</style>
</head>
<body>
	<?php 

	function get_json($url,$login,$password){
	$server = $url;
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

	function delMasterfile($uniqid){
		
		$login = 'mirada';
		$password = 'XNpA32WCdcUb';
		$key= "mirada:XNpA32WCdcUb";
		$url = 'https://gpsservice.dlt.go.th/masterfile/rmvByUnit/'.$uniqid;
	// echo "<script>console.log( 'Debug Objects: " . $url . "' );</script>";
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

	$url = 'https://gpsservice.dlt.go.th/masterfile/getList/0/3000';
	$login="mirada";
	$password="XNpA32WCdcUb";
	$result = get_json($url,$login,$password);
	$json = json_decode($result, true);
?>

 	<div class="container-fluid" style="padding-top: 20px">
 		<div class="card">
 			<div class="card-header  bg-purple">
 				<div class="row">
 				<div class="col-sm-4 text-left">
 				</div>
 				<div class="col-sm-4 text-center" >
 					 <h4>Masterfile (กรมขนส่งทางบก)</h4>
 				</div>
 				</div>
			 </div>
			 
			 <form action="" method="post">
 			<div class="card-body">
	 			<table class="display" id="table_id" width="100%">
					<thead>
						<tr>
							<th>ลับดับ</th>
							<th>Unit_ID</th>
							<th>ทะเบียนรถ</th>
							<th>จังหวัด</th>						
							<th>หมายเลขตัวถัง</th>
							<th>ชนิดรถ (ยี่ห้อรถ)</th>						
							<th>ชนิดการจดทะเบียน</th>
							<th>วันที่แก้ไขข้อมูลล่าสุด</th>
							<th></th>						
						</tr>
					</thead>
					<tbody>
					<?php 	
					// print_r($json['results']);
						 	$i=0; 
						 	foreach($json['results'] as $data){ $i++;
						 	$province=str_pad($data['province_code'],3,"0",STR_PAD_LEFT);
				             $car_1=mb_substr($data['vehicle_id'],0,3,'UTF-8');
				             $car_2=mb_substr($data['vehicle_id'],3,4,'UTF-8');
						 	
						 	;
						 	if (strpos($car_1,"0")=="0") {
						 		$car_1=substr($car_1,1);
						 	}else{
						 		$car_1=$car_1;
						 	}

						 	$vehicle_id=$car_1."-".$car_2;
					?>
						<tr>
							<td><?= $i ?></td>
							<td><?= $data['unit_id'] ?></td>
							<td><?= $vehicle_id  ?></td>
							<td><?= provinceCk($province) ?></td>
							<td><?= $data['vehicle_chassis_no'] ?></td>
							<td><?= $data['vehicle_type'] ?></td>
							<td><?= $data['vehicle_register_type'] ?></td>
							<td><?= $data['log_time'] ?></td>
							<td>
								<a href="../send_masterfile.php?user=<?= $data['vehicle_chassis_no'] ?>" title=""><button type="button" class="btn btn-sm btn-info"> <span class="fas fa-edit"></span></button> </a>
								<button type="submit" class="btn btn-sm btn-danger" name="del" value="<?= $data['unit_id']?> " onclick="return confirm('ยืนยันการลบ Masterfile Unit_id : <?= $data['unit_id']?>')" > <span class="fas fa-trash-alt"></span></button>
							</td>
						</tr>
					<?php  }

					 ?>
					</tbody>
				</table>
				<?php //echo "$server"; ?>
			 </div>
			 </form>
 		</div>
 	</div>
</body>
</html>

<script src="../js/jquery-3.3.1.slim.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/popper.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
	$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
<?php 

if(isset($_POST['del'])){
	print_r(delMasterfile($_POST['del']));
}

function provinceCk ($province){
   if($province=="805"){ return "กระบี่"; }
   if($province=="001"){ return "กรุงเทพมหานคร"; }
   if($province=="701"){ return "กาญจนบุรี"; }
   if($province=="406"){ return "กาฬสินธ์"; }
   if($province=="604"){ return "กำแพงเพชร"; }
   if($province=="405"){ return "ขอนแก่น"; }
   if($province=="205"){ return "จันทบุรี"; }
   if($province=="202"){ return "ฉะเชิงเทรา"; }
   if($province=="203"){ return "ชลบุรี"; }
   if($province=="100"){ return "ชัยนาท"; }
   if($province=="300"){ return "ชัยภูมิ"; }
   if($province=="800"){ return "ชุมพร"; }
   if($province=="901"){ return "ตรัง"; }
   if($province=="206"){ return "ตราด"; }
   if($province=="602"){ return "ตาก"; }
   if($province=="200"){ return "นครนายก"; }
   if($province=="702"){ return "นครปฐม"; }
   if($province=="403"){ return "นครพนม"; }
   if($province=="305"){ return "นครราชสีมา"; }
   if($province=="804"){ return "นครศรีธรรมราช"; }
   if($province=="607"){ return "นครสวรรค์"; }
   if($province=="107"){ return "นนทบุรี"; }
   if($province=="906"){ return "นราธิวาส"; }
   if($province=="504"){ return "น่าน"; }
   if($province=="309"){ return "บึงกาฬ"; }
   if($province=="904"){ return "บัตตานี"; }
   if($province=="304"){ return "บุรีรัมย์"; }
   if($province=="106"){ return "ปทุมธานี"; }
   if($province=="707"){ return "ประจวบคีรีขันธ์"; }
   if($province=="201"){ return "ปราจีนบุรี"; }
   if($province=="105"){ return "พระนครศรีอยุธยา"; }
   if($province=="503"){ return "พะเยา"; }
   if($province=="803"){ return "พังงา"; }
   if($province=="900"){ return "พัทลุง"; }
   if($province=="605"){ return "พิจิตร"; }
   if($province=="603"){ return "พิษณุโลก"; }
   if($province=="806"){ return "ภูเก็ต"; }
   if($province=="407"){ return "มหาสารคาม"; }
   if($province=="409"){ return "มุกดาหาร"; }
   if($province=="905"){ return "ยะลา"; }
   if($province=="301"){ return "ยโสธร"; }
   if($province=="801"){ return "ระนอง"; }
   if($province=="204"){ return "ระยอง"; }
   if($province=="703"){ return "ราชบุรี"; }
   if($province=="408"){ return "ร้อยเอ็ด"; }
   if($province=="102"){ return "ลพบุรี"; }
   if($province=="506"){ return "ลำปาง"; }
   if($province=="505"){ return "ลำพูน"; }
   if($province=="303"){ return "ศรีสะเกษ"; }
   if($province=="303"){ return "สกลนคร"; }
   if($province=="902"){ return "สงขลา"; }
   if($province=="903"){ return "สตูล"; }
   if($province=="108"){ return "สมุทรปราการ"; }
   if($province=="705"){ return "สมุทรสงคราม"; }
   if($province=="704"){ return "สมุทรสาคร"; }
   if($province=="104"){ return "สระบุรี"; }
   if($province=="207"){ return "สระแก้ว"; }
   if($province=="101"){ return "สิงห์บุรี"; }
   if($province=="700"){ return "สุพรรณบุรี"; }
   if($province=="802"){ return "สุราษฎร์ธานี"; }
   if($province=="306"){ return "สุรินทร์"; }
   if($province=="601"){ return "สุโขทัย"; }
   if($province=="400"){ return "หนองคาย"; }
   if($province=="308"){ return "หนองบัวลำภู"; }
   if($province=="307"){ return "อำนาจเจริญ"; }
   if($province=="402"){ return "อุดรธานี"; }
   if($province=="600"){ return "อุตรดิตถ์"; }
   if($province=="608"){ return "อุทัยธานี"; }
   if($province=="302"){ return "อุบลราชธานี"; }
   if($province=="103"){ return "อ่างทอง"; }
   if($province=="500"){ return "เชียงราย"; }
   if($province=="502"){ return "เชียงใหม่"; }
   if($province=="606"){ return "เพชรบุรณ์"; }
   if($province=="706"){ return "เพชรบุรี"; }
   if($province=="401"){ return "เลย"; }
   if($province=="507"){ return "แพร่"; }
   if($province=="501"){ return "แม่ฮ่องสอน"; }
 } ?>
