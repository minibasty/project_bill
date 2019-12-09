<?php
// session_start() ;
include('config.php');
/* add by kergrit(redthird.com) for compatible global variable off/on php.ini */
$name = $_POST['name'];
$date = $_POST['date'];
// $month = $_POST['month'];
$car_approve_id = $_POST['car_approve_id'];
	if ($car_approve_id=="VT") {
		# ธรรมดา VT900
		$car_approve_id="207/2560";
		$gpsmodel="VT900";
		
	}elseif ($car_approve_id=="VT(U)") {
		# URI VT900
		$car_approve_id="207/2560";
		$gpsmodel="VT900(U)";

	}elseif ($car_approve_id=="VT(A)") {
		# AUNDAMAN VT900
		$car_approve_id="207/2560";
		$gpsmodel="VT900(A)";
	}elseif ($car_approve_id=="VT(Box)") {
		# AUNDAMAN VT900
		$car_approve_id="207/2560";
		$gpsmodel="VT900(Box)";
	}
	elseif ($car_approve_id=="VT(Box)(A)") {
		# AUNDAMAN VT900
		$car_approve_id="207/2560";
		$gpsmodel="VT900(Box)(A)";
	}
	elseif ($car_approve_id=="VT(Box)(U)") {
		# AUNDAMAN VT900
		$car_approve_id="207/2560";
		$gpsmodel="VT900(Box)(U)";
	}
	elseif ($car_approve_id=="T333") {
		# T333
		$car_approve_id="132/2559";
		$gpsmodel="T333";
	}elseif ($car_approve_id=="AW") {
		# AW...
		$car_approve_id="218/2560";
		$gpsmodel="AW";
	}elseif ($car_approve_id=="T1") {
		# T1...
		$car_approve_id="201/2560";
		$gpsmodel="T1";
	}elseif ($car_approve_id=="GT06E(Box)") {
		# GT06E Box
		$car_approve_id="224/2560";
		$gpsmodel="GT06E";
	}elseif ($car_approve_id=="GT06E") {
		# GT06E...
		$car_approve_id="224/2560";
		$gpsmodel="GT06E";
	}elseif ($car_approve_id=="tk103") {
		# TK103...
		$car_approve_id="non-approve";
		$gpsmodel="tk103";
	}elseif ($car_approve_id=="fm11") {
		# Teltonika FM1100...
		$car_approve_id="non-approve";
		$gpsmodel="fm11";
	}elseif ($car_approve_id=="ts107") {
		# TS107...
		$car_approve_id="non-approve";
		$gpsmodel="ts107";
	}elseif ($car_approve_id=="MVT380") {
		# MVT380...
		$car_approve_id="non-approve";
		$gpsmodel="MVT380";
	}elseif ($car_approve_id=="VT300") {
		# VT300...
		$car_approve_id="non-approve";
		$gpsmodel="VT300";
	}elseif ($car_approve_id=="GM901") {
		# GM901...
		$car_approve_id="non-approve";
		$gpsmodel="GM901";
	}elseif ($car_approve_id=="ST901") {
		# ST901...
		$car_approve_id="non-approve";
		$gpsmodel="ST901";
	}

$year = $_POST['year'];
$age = $_POST['age'];
$sex = trim($_POST['sex']);
$address = $_POST['address'];
$amper = $_POST['amper'];
// $province = $_POST['province'];
$imeiall = $_POST['imeiall'];
$phone = $_POST['phone'];
$main_user = $_POST['main_user'];
$education = $_POST['education'];
// $uid = $_POST['uid'];
$work = $_POST['work'];
$contrack = $_POST['contrack'];
$tel_contact = $_POST['tel_contact'];
// $datesetup = $_POST['datesetup'];
// $telgps = $_POST['telgps'];
// $passgps = $_POST['passgps'];
// $tech = $_POST['tech'];
// $poc = $_POST['poc'];

$user_name = $_POST['user_name'];
// $pwd_name1 = $_POST['pwd_name1'];
// $pwd_name2 = $_POST['pwd_name2'];
$register_type = $_POST['register_type'];
$province2 = $_POST['province2'];
$email = $_POST['email'];
// $Submit = $_POST['Submit'];
// $ok = $_POST['ok'];
/* end of add */

$sql_pro="SELECT * FROM province_code";
$rs_pro=$conn->query($sql_pro);
while ($r_pro=$rs_pro->fetch_array()) {
	if ($r_pro['code']==$province2) {
		$province=$r_pro['name'];
	}
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>:: บันทึกข้อมูล ::</title>
</head>

<body>
<?php

$sim = substr($imeiall,0,1);
$simno = substr($imeiall,1,10);
$zipcode = substr($imeiall,12,23);

// if($name=="" || $age=="" || $user_name=="" || $email=="") {
// echo "มา 1";
// // echo "<meta http-equiv='refresh' content='0; url=signup.php'>" ;
// }


if((isset($ok)) and ($ok!="ok_pass")) {
  echo "มา 1";
// echo "<meta http-equiv='refresh' content='0; url=signup.php'>" ;
}
//ถ้าคัดซีซ้ำ
$sql = "select * from member where user='$user_name'" ;
$result = mysqli_query($conn, $sql) ;
$rowcheck= mysqli_fetch_array($result);
$numrow = mysqli_num_rows($result) ;
if($numrow!=0) {
echo "<br><br><center><font size='3' face='MS Sans Serif'>เลขคัดซี <b> $user_name   </b>มีอยู่ในระบบ<br> กรุณาตรวจสอบการธุจริตของลูกค้า <br>" ;
echo "<p style='color:red'>================================================================================================================ <br> <br>";
echo $rowcheck['comment']."<br> <br>";
echo "================================================================================================================ <br></p>";
echo ' <a href="add_member.php"> <button type="button" class="btn btn-warning" name="button">กลับ</button></a>';
exit() ;
}

$sql = "select * from member order by id desc" ;
$result = mysqli_query($conn, $sql) ;
$num_result  = mysqli_num_rows($result) ;
$dbarr = mysqli_fetch_row($result) ;
$member_db = $dbarr[0]+1 ; // �Ӥ�� id �����������Ѻ���������Ҫԡ�������1

if($member_db>=100) {
$member_in = "0$member_db" ;
}
else {
if($member_db >=10) {
$member_in = "00$member_db" ;
}
else {
$member_in = "000$member_db" ;
}
}

$member_id = $member_in; //
$insert_member="insert into member (name,date,year,address,amper,zipcode,phone,education,
work,user,email,car_approve_id,register_type,province2,signup,sim,simno,member_id,age,sex,contrack,tel_contact, gpsmodel1, main_user,province)
        values('$name','$date','$year','$address','$amper','$zipcode',
        '$phone','$education','$work','$user_name','$email','$car_approve_id',
        '$register_type','$province2',NOW(),'$sim','$simno','$member_id','$age','$sex', '$contrack', '$tel_contact', '$gpsmodel', '$main_user','$province')";
$result = mysqli_query($conn, $insert_member);

if($result) {
// $_SESSION['login_true'] = $user_name;
echo "<script> alert('บันทึกข้อมูลสำเร็จ') </script>";
echo "<meta http-equiv='refresh' content='0; url=?p=main_admin'>" ;
}else {
  echo $insert_member;
  echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ รบกวน Copy โค้ดส่งให้ผู้ดูแลเพื่อตรวจสอบ') </script>";
  echo "<a href='add_member.php'>กลับหน้าเพิ่มข้อมูล</a>" ;

}

?>
</body>

</html>
