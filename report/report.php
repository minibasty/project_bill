<!DOCTYPE html>
<?php 
// require('../config.php');
// require('../all_function.php');
 ?>
<html>
<head>
	<title>รายงาน</title>
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.js">
    <link rel="stylesheet" href="vendor\datetimepicker\jquery.datetimepicker.css"> -->
    <script language="JavaScript">
		function checkAll(ele) {
		     var checkboxes = document.getElementsByTagName('input');
		     if (ele.checked) {
		         for (var i = 0; i < checkboxes.length; i++) {
		             if (checkboxes[i].type == 'checkbox') {
		                 checkboxes[i].checked = true;
		             }
		         }
		     } else {
		         for (var i = 0; i < checkboxes.length; i++) {
		             console.log(i)
		             if (checkboxes[i].type == 'checkbox') {
		                 checkboxes[i].checked = false;
		             }
		         }
		     }
		 }
	</script>
	<style type="text/css" media="screen">
		html{
            font-family:tahoma, Arial,"Times New Roman";
            font-size:14px;
        }
		body{
				font-family:tahoma, Arial,"Times New Roman";
				font-size:14px;
			  /* background: url(img/bg/bg6.jpg) no-repeat center center fixed;  */
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
		}
		.optical{
			opacity: 1;
		}
		.optical-non{
			opacity: 1 ;
		}
		.container .content{
		  position: absolute;
		  bottom: 0;
		  background: rgb(0, 0, 0); /* Fallback color */
		  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
		  color: #f1f1f1;
		  width: 100%;
		  padding: 20px;
		}
	</style>
</head>
<?php 

	// เดือนไทย
	$a_mthai[1]    =    'มกราคม';
	$a_mthai[2]    =    'กุมภาพันธ์';
	$a_mthai[3]    =    'มีนาคม';
	$a_mthai[4]    =    'เมษายน';
	$a_mthai[5]    =    'พฤษภาคม';
	$a_mthai[6]    =    'มิถุนายน';
	$a_mthai[7]    =    'กรกฎาคม';
	$a_mthai[8]    =    'สิงหาคม';
	$a_mthai[9]    =    'กันยายน ';
	$a_mthai[10]    =    'ตุลาคม';
	$a_mthai[11]    =    'พฤศจิกายน';
	$a_mthai[12]    =    'ธันวาคม';

	//เลือกปีมาแสดงตามฐานข้อมูล
	$sql_year="SELECT COUNT(year) AS count, year
	FROM member
	GROUP BY year ORDER BY year DESC";
	$qr_year=$conn->query($sql_year);

	$checkReport=isset($_POST['selectReport']) ? $_POST['selectReport'] : '';

 ?>
<body>
	<div class="background-image"></div>
	<div class="container-fluid">
		<div class="content">
			<div class="card-body optical-non">
				<div class="container form-group">
					<form action="" method="post" accept-charset="utf-8">
					<div class="card"> 
						<div class="card-header bg-dark text-white">
							<div class="form-row">
								<div class="col">
									<h5 style="font-weight: bold;" >จัดการรายงาน</h5>
								</div>
							</div>
						</div>
						<div class="card-body row">
							<div class="col-sm-6 offset-sm-3 form-group">
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="customRadioInline1" name="selectReport" class="custom-control-input" value="setup" <?php if($checkReport=="setup" OR $checkReport==""){ echo "checked"; } ?>>
								  <label class="custom-control-label" for="customRadioInline1">รายงานติดตั้ง</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="customRadioInline2" name="selectReport" class="custom-control-input" value="offline" disabled>
								  <label class="custom-control-label" for="customRadioInline2">รายงานออฟไลน์</label>
								</div>	
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="customRadioInline3" name="selectReport" class="custom-control-input" value="cancel" <?php if($checkReport=="cancel"){ echo "checked"; } ?>>
								  <label class="custom-control-label" for="customRadioInline3">รายงานยกเลิก</label>
								</div>							
							</div>
												
							<div class="col-sm-6 offset-sm-3">
								<div class="form-row">
									<div class="col">
									<select name="month" class="form-control">
										<?php 
										$monthPost=isset($_POST['month']) ? $_POST['month'] : '';
										for($i=1;$i<=12;$i++) { 	
										?>
										  <option value="<?php echo $a_mthai[$i];?>" <?php if($monthPost==$a_mthai[$i]){ echo "selected"; } ?>><?php echo $a_mthai[$i];?></option>
										<?php } ?>
									</select>
									    
								    </div>
								    <div class="col">
							    	<select name="yearStr" class="form-control">
								    	<?php
								    	$yearPost=isset($_POST['yearStr']) ? $_POST['yearStr'] : '';
								    	while($r_year=$qr_year->fetch_array()) { 
								    	?>
									    	<option value="<?=  $r_year['year']?>" <?php if($yearPost==$r_year['year']){ echo "selected"; } ?>> <?php echo $r_year['year']?> </option>
								    	<?php } ?>
						    		</select>
								    </div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<div class="col">
										<input class="btn btn-success" type="submit" name="save" value="แสดง">
										<a href="report.php" title=""><input class="btn btn-danger" type="button" name="clear" value="เคลียร์"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					</form>
				</div>
				<?php if (isset($_POST['save'])): 
						$yearStr = isset($_POST['yearStr']) ? $_POST['yearStr'] : '';
						$month = isset($_POST['month']) ? $_POST['month'] : '';
						$selectReport = isset($_POST['selectReport']) ? $_POST['selectReport'] : '';
						$monthNum=monthNum($month);
						$yearEN=($yearStr-543);
						if ($selectReport=="setup") {
							$strSQL = "SELECT * FROM `member` WHERE year='$yearStr' AND sex='$month' AND car_approve_id !='non-approve' ORDER BY `date` ";
							echo '<form action="?p=reportSetup" method="post" accept-charset="utf-8">';
						}elseif ($selectReport=="offline"){
							# code...
						}elseif ($selectReport=="cancel"){
							echo $strSQL = "SELECT * FROM `v_canceler` WHERE MONTH(cancel_date)='$monthNum' AND YEAR(cancel_date)='$yearEN' AND car_approve_id !='non-approve' AND cancel!='' ORDER BY `date` ";
							echo '<form action="?p=reportCancel" method="post" accept-charset="utf-8">';
						}
						$objQuery = $conn->query($strSQL);
					?>

				<div class="form-group">
					<div class="card">
						<div class="card-header bg-dark text-white" style="font-weight: bold;">
							รายชื่อลูกค้า
						</div>
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="text-center" style="width: 5%"><INPUT type="checkbox" onchange="checkAll(this)"  checked/> </th>
										<th>ทะเบียน</th>
										<th>จังหวัด</th>
										<th>ยี่ห้อ</th>
										<th>หมายเลขคัสซี</th>
										<th>ประเภทรถ</th>
										<th>รุ่น GPS</th>
										<th>หมายเลขเครื่อง</th>
										<?php if ($selectReport=="setup") {
											echo "<th>วันทีั่ติดตั้ง</th>";
										}elseif ($selectReport=="cancel") {
											echo "<th>วันที่ยกเลิก</th>";
										} ?>
										
										<th>SIM</th>
										<th>ผู้ประกอบการ</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										while ($objResult=$objQuery->fetch_array()) {
										// แปลงรุ่น GPS  
										$conModel=conModel($objResult['gpsmodel1']);
    									list($model,$modeltype)=explode("-",$conModel);

    									// แปลงวันที่
    									$ConvertDate=$objResult['date']."/".monthShut($objResult['sex'])."/".$objResult['year'];

    									//แปลงค่ายซิม
    									$simStr=trim($objResult['sim']);
    									if ($simStr=="0" OR $simStr=="True"){
									       $sim="TRUE";
									    }elseif ($simStr=="3" OR strtoupper($simStr)=="AIS"){
									       $sim="AIS";
									    }
									 ?>
									<tr>
										<td class="text-center"><input type="checkbox" value="<?= $objResult['id']?>" name="chk[]" id="checkbox-1" checked></td>
										<td><?= $objResult['amper'] ?></td>
										<td><?= $objResult['province'] ?></td>
										<td><?= $objResult['address'] ?></td>
										<td><?= $objResult['user'] ?></td>
										<td><?= $objResult['register_type'] ?></td>
										<td><?= $model ?></td>
										<td><?= $objResult['zipcode'] ?></td>
										<?php if ($selectReport=="setup") {
											echo "<td>$ConvertDate</td>";
										}elseif ($selectReport=="cancel") {
											echo "<th>".DateThaiType2($objResult['cancel_date'])."</th>";
										} ?>
										
										<td><?= $sim ?></td>
										<td><?= $objResult['name'] ?></td>				
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="card-footer">
							<div class="form-group">
								<div class="col text-center">
									<input type="text" name="monthStr" value="<?= $_POST['month'] ?>" hidden>
									<input type="text" name="yearStr" value="<?= $_POST['yearStr'] ?>" hidden>
									<button type="submit" class="btn btn-info"><span class="fas fa-file-export"></span>
										ออกรายงาน
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				</form>
			<?php endif ?>
			</div>
		</div>
	</div>
</body>
<script src="..\vendor\maskinput\jquery.inputmask.js" charset="utf-8"></script>
<script src="..\js/jquery-3.2.1.slim.min.js" type="text/javascript" charset="utf-8"></script>
<script src="..\vendor\datetimepicker\jquery.datetimepicker.full.js" charset="utf-8"></script>
 <script src="..\js/popper.min.js" type="text/javascript" charset="utf-8"></script>
</html>