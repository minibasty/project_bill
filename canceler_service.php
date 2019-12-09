<!DOCTYPE html>
<?php 
	include_once('config.php');
	include_once('all_function.php');
 ?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.js">
      <!-- datetimepicker -->
  	<link rel="stylesheet" href="vendor\datetimepicker\jquery.datetimepicker.css">
  	<style type="text/css" media="screen">
  		body {
  			/* background-image: url(img/bg/bg5.jpg); */
	  			-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
  		}
  		.container { 
			padding-top: 30px;
  		 }
  		 .text-white{
  		 	font-weight: bold;
  		 }
		   .card{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        /* text-align: center; */
        }
  	</style>
<body>
	<?php $chassi=isset($_GET['user']) ? $_GET['user'] : '' ;
		// เช็คคัดซีว่ายกเลิกหรือยัง
	
	$sql_member="SELECT * FROM member WHERE user = '$_GET[user]'";
	$member_qr=$conn->query($sql_member);
	$member_row=$member_qr->fetch_array();
	$member_id =$member_row['id'];

	// ดึงรหัสยกเลิก เพื่อนำไปอัพเดทในตาราง member
	$check_cancel="SELECT * FROM canceler_service WHERE member_id='$member_id'";
	$check_qr=$conn->query($check_cancel);		
	$check_row=$check_qr->fetch_array();
	$check_num=$check_qr->num_rows;

	$cancel_date=isset($check_row['cancels_date']) ? $check_row['cancels_date'] : '';
	if ($cancel_date == "") {
		$cancel_date="";
	}else{
		$cancel_date=DateDMY($cancel_date);
	}
	$cancel_reason=isset($check_row['cancels_reason']) ? $check_row['cancels_reason'] : '';
	if (isset($_POST['save'])) {
		$reason = $_POST['reason'];
		$date_cancel = DateYMD($_POST['date_cancel']);
		// เพอ่มข้อมูลตาราง ผู้ยกเลิก
		echo $sql_update_cancel="INSERT INTO canceler_service VALUES ('','$member_id','$date_cancel','$reason')";
		$update_concel_qr=$conn->query($sql_update_cancel);

		if ($update_concel_qr) {
			print "<meta http-equiv=refresh content=0;URL=?p=canceler_service&user=".$_GET['user'].">";
		}
	}
	?>
	<form action="" method="post" accept-charset="utf-8">
	<div class="container">
		<div class="card">
			<div class="card-header bg-danger text-white">
				ยกเลิกการให้บริการ
			</div>
			<div class="card-body">
				<div class="form-group form-row">
					<div class="col-sm-4 text-right">
						คัดซี :
					</div>
					<div class="col-sm-4">
						<h6 class="text-1"><?= $chassi ?></h6>
					</div>
				</div>
				<div class="form-group form-row">
					<div class="col-sm-4 text-right">
						วันที่ยกเลิก
					</div>
					<div class="col-sm-4">
						<input class="form-control testdate5" type="text" name="date_cancel" value="<?= $cancel_date ?>" placeholder="วันที่ยกเลิก" readonly>
					</div>
				</div>
					<div class="form-group form-row">
						<div class="col-sm-4 text-right">
							สาเหตุการถอดหรือยกเลิก
						</div>
						<div class="col-sm-4">
							<textarea class="form-control" placeholder="สาเหตุที่ถอนการติดตั้ง" name="reason"><?= $cancel_reason ?></textarea>
						</div>
					</div>
			</div>
			<div class="card-footer">
				<div class="form-group row">
					<div class="col-sm-4">
						<a href="?p=edit&user=<?= $_GET['user'] ?>" title=""><button type="button" class="btn btn-warning">กลับหน้าแก้ไข</button></a>
					</div>
					<div class="col-sm-4  text-center ">
						<?php if ($check_num==0){ ?>
						<input type="text" name="user" value="<?= $_GET['user'] ?>" placeholder="" hidden>
						<button class="btn btn-success" type="submit" name="save">บันทึก</button>
						<?php }else{ ?>
						<p style="color: red"> คัดซีนี้มีรายการยยกเลิกแล้ว 
					 	<a href="edit.php?user=<?= $_GET['user'] ?>" title="">กลับ </a> 
						</p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>		
	</div>
	</form>
</body>
</html>
<script src="vendor\maskinput\jquery.inputmask.js" charset="utf-8"></script>
<script src="js/jquery-3.3.1.slim.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor\datetimepicker\jquery.datetimepicker.full.js" charset="utf-8"></script>
 <script src="js/popper.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(function(){

    // กรณีใช้แบบ inline
    $("#testdate4").datetimepicker({
        timepicker:false,
        format:'d-m-Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000
        lang:'th',  // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
        inline:true
    });

    // กรณีใช้แบบ input
    $(".testdate5").datetimepicker({
        zIndex: 2048,
        timepicker:false,
        format:'d-m-Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000
        lang:'th',  // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
        onSelectDate:function(dp,$input){
            var yearT=new Date(dp).getFullYear()-0;
            var yearTH=yearT+543;
            var fulldate=$input.val();
            var fulldateTH=fulldate.replace(yearT,yearTH);
            $input.val(fulldateTH);
        },
    });
    // กรณีใช้กับ input ต้องกำหนดส่วนนี้ด้วยเสมอ เพื่อปรับปีให้เป็น ค.ศ. ก่อนแสดงปฏิทิน
    $(".testdate5").on("mouseenter mouseleave",function(e){
        var dateValue=$(this).val();
        if(dateValue!=""){
                var arr_date=dateValue.split("-"); // ถ้าใช้ตัวแบ่งรูปแบบอื่น ให้เปลี่ยนเป็นตามรูปแบบนั้น
                // ในที่นี้อยู่ในรูปแบบ 00-00-0000 เป็น d-m-Y  แบ่งด่วย - ดังนั้น ตัวแปรที่เป็นปี จะอยู่ใน array
                //  ตัวที่สอง arr_date[2] โดยเริ่มนับจาก 0
                if(e.type=="mouseenter"){
                    var yearT=arr_date[2]-543;
                }
                if(e.type=="mouseleave"){
                    var yearT=parseInt(arr_date[2])+543;
                }
                dateValue=dateValue.replace(arr_date[2],yearT);
                $(this).val(dateValue);
        }
    });
});
</script>