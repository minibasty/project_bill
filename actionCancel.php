<?php 
	include_once('config.php');
	include_once('all_function.php');

	$sql_member="SELECT * FROM member WHERE user = '$_POST[user]'";
	$member_qr=$conn->query($sql_member);
	$member_row=$member_qr->fetch_array();

	$date_cancel = DateYMD($_POST['date_cancel']);
	$reason = $_POST['reason'];
	$member_id =$member_row['id'];

	// ดึงรหัสยกเลิก เพื่อนำไปอัพเดทในตาราง member
	$check_cancel="SELECT * FROM canceler WHERE member_id='$member_id'";
	$check_qr=$conn->query($check_cancel);		
	$check_row=$check_qr->fetch_array();

	if (isset($_POST['save'])) {
		// เพอ่มข้อมูลตาราง ผู้ยกเลิก
		$sql_update_cancel="INSERT INTO canceler VALUES ('','$member_id','$date_cancel','$reason')";
		$update_concel_qr=$conn->query($sql_update_cancel);

		// อัพเดืข้อมูลในตาราง member โดยใช่รหัสยกเลิก
		$sql_update_member="UPDATE `member` SET `cancel` = '$cancel_row[id_cancel]' WHERE id = '$cancel_row[member_id]'";
		$update_concel_qr=$conn->query($sql_update_member);
	}
 ?>