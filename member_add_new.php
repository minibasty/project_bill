<?php
session_start() ;

/* add by kergrit(redthird.com) for compatible global variable off/on php.ini */
$name = $_POST['name'];
$date = $_POST['date'];
// $month = $_POST['month'];
$car_approve_id = $_POST['car_approve_id'];
$year = $_POST['year'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$amper = $_POST['amper'];
// $province = $_POST['province'];
$imeiall = $_POST['imeiall'];
$phone = $_POST['phone'];
$education = $_POST['education'];
$uid = $_POST['uid'];
$work = $_POST['work'];

// $contrack = $_POST['contrack'];
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
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>:: บันทึกข้อมูล ::</title>
</head>

<body>
<?php
include("config.php") ;

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

$signup = date("j/n/").(date("Y")+543) ;

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

$member_id = $member_in; 
$insert_member="insert into member (name,date,year,address,amper,zipcode,phone,education,
work,user,email,uid,car_approve_id,register_type,province2,signup,sim,simno,member_id,age,sex)
        values('$name','$date','$year','$address','$amper','$zipcode',
        '$phone','$education','$work','$user_name','$email','$uid','$car_approve_id',
        '$register_type','$province2','$signup','$sim','$simno','$member_id','$age','$sex')";
$result = mysqli_query($conn, $insert_member);

if($result) {
$_SESSION['login_true'] = $user_name;
echo "<script> alert('บันทึกข้อมูลสำเร็จ') </script>";
echo "<meta http-equiv='refresh' content='0; url=z_member_detail.php'>" ;
}else{
echo "<script> alert('บันทึกไม่สำเร็จ') </script>";
echo $insert_member;
}

?>
</body>

</html>
