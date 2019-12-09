<!DOCTYPE html>
<?php require('../config.php'); ?>

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

	function deleteMasterfile($unit_id){
	$server = 'http://gpsservice.dlt.go.th/masterfile/rmvByUnit/';
	$server .= '$unit_id';
	$login="mirada";	
	$password="XNpA32WCdcUb";
	

	// $ch = curl_init();
	// curl_setopt($ch, CURLOPT_URL,$server);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	// curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	// curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	// $result = curl_exec($ch);
	return $server;
	// curl_close($ch);	
	}

	$url = 'https://gpsservice.dlt.go.th/masterfile/getList/0/1500';
	$login="mirada";
	$password="XNpA32WCdcUb";
	// $password="XNpA32WCdcUb";
	$result = get_json($url,$login,$password);
    $json = json_decode($result, true);
    
    $i=0; 
    $dataArray=array();
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
    
    array_push($dataArray, array(
    'unit_id' => $data['unit_id'],
    'vehicle_id' => $vehicle_id,
    'vehicle_chassis_no' => $data['vehicle_chassis_no'])
    ); 

    }
?>

 	<div class="container-fluid" style="padding-top: 20px">
 		<div class="card">
 			<div class="card-header  bg-purple">
 				<div class="row">
 				<div class="col-sm-4 text-left">
 					<a href="../member_detail.php" title="">
 					 <button type="button" class="btn btn-warning btn-sm">
 					 	<span class="fas fa-chevron-left"></span>
 					 กลับเมนูหลัก</button></a>
 				</div>
 				<div class="col-sm-4 text-center" >
 					 <h4>Masterfile (กรมขนส่งทางบก)</h4>
 				</div>
 				</div>
 			</div>
 			<div class="card-body">
	 			<table class="display" width="100%">
					<thead>
						<tr>
							<th>ลับดับ</th>
							<th>Unit_ID</th>
							<th>ทะเบียนรถ</th>
							<th>จังหวัด</th>	
                            <th>Server</th>						
						</tr>
					</thead>
					<tbody>
                    <?php 
                        
                        $num = 0;
                        foreach ($dataArray as $key) {
                        $num++;
                        $sql="SELECT user, email FROM member ";
					?>
						<tr>
							<td><?= $num ?></td>
							<td><?= $key['unit_id'] ?></td>
							<td><?= $key['vehicle_id']  ?></td>
							<td><?= $key['vehicle_chassis_no'] ?></td>
                            <td><?php 
                            $sql.="WHERE user = '$key[vehicle_chassis_no]'";
                            $res=$conn->query($sql);
                            $row=$res->fetch_assoc();
                            echo $row['email'];
                            ?></td>
						</tr>
                    <?php  
                    }

                    // $dataJson= json_encode($dataArray);
					 ?>
					</tbody>
				</table>
				<?php ?>
 			</div>
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
function serverCk($chassi){
    require('../config.php');
    $sql="SELECT user, email FROM member WHERE user = '$chassi'";
    $res=$conn->query($sql);
    $row=$res->fetch_assoc();
    mysqli_close($conn);
    return $row['email'];
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
