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
		.btn-grad { 
			background-color : #aa66cc;
			color : #ffffff;
		}
		.btn-grad:hover {
			background-color : #783399;
			color : #ffffff;
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
	$a_mthai[9]    =    'กันยายน';
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
 <script>
 	function imgLink(str){
		var result = str;
		return window.location.href = "index.php?p=old_data&m="+result;
	}
 </script>
<body>
	<div class="background-image"></div>
	<div class="container-fluid">
		<div class="content">
			<div class="card-body optical-non">
				<div class="container form-group">
					<form action="" method="post" accept-charset="utf-8">
					<div class="card mb-2">
					
					<div class="form-group">
						<div class="form-row">
							<div class="ml-2 mt-2">
							<h5>ข้อมูลย้อนหลัง</>
							</div>
						</div>
					
						<div class="text-center col">
							<button class="btn btn-sm btn-grad" type="button" onclick="imgLink('61-3')">มี.ค. 61</button>
							<button class="btn btn-sm btn-grad" type="button" onclick="imgLink('61-4')">เม.ย. 61</button>
							<button class="btn btn-sm btn-grad" type="button" onclick="imgLink('61-5')">พ.ค. 61</button>
							<button class="btn btn-sm btn-grad" type="button" onclick="imgLink('61-6')">มิ.ย. 61</button>
							<button class="btn btn-sm btn-grad" type="button" onclick="imgLink('61-7')">ก.ค. 61</button>
							<button class="btn btn-sm btn-grad" type="button" onclick="imgLink('61-8')">ส.ค. 61</button>
							<button class="btn btn-sm btn-grad" type="button" onclick="imgLink('61-9')">ก.ย. 61</button>
							<button class="btn btn-sm btn-grad" type="button" onclick="imgLink('61-10')">ต.ค. 61</button>
							<button class="btn btn-sm btn-grad" type="button" onclick="imgLink('61-11')">พ.ย. 61</button>
							<button class="btn btn-sm btn-grad" type="button" onclick="imgLink('61-12')">ธ.ค. 61</button>
						</div>
						<div class="text-center col p-1">
							<button class="btn btn-sm btn-info" type="button" onclick="imgLink('62-1')">ม.ค. 62</button>
							<button class="btn btn-sm btn-info" type="button" onclick="imgLink('62-2')">ก.พ. 62</button>
							<button class="btn btn-sm btn-info" type="button" onclick="imgLink('62-3')">มี.ค. 62</button>
							<button class="btn btn-sm btn-info" type="button" onclick="imgLink('62-4')">เม.ย. 62</button>
							<button class="btn btn-sm btn-info" type="button" onclick="imgLink('62-5')">พ.ค. 62</button>
						</div>
					</div>

						
					</div>
					<div class="card"> 
						<div class="card-header bg-dark text-white">
							<div class="form-row">
								<div class="col">
									<h5 style="font-weight: bold;" >สรุปรายงานติดตั้ง</h5>
								</div>
							</div>
						</div>
						<div class="card-body row">
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
										<a href="?p=conclude_setup" title=""><input class="btn btn-danger" type="button" name="clear" value="เคลียร์"></a>
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
                        $monthStart = $yearEN."-".$monthNum."-1";
                        $monthEnd = $yearEN."-".$monthNum."-31";
                        $strSQL = "SELECT * FROM `member` WHERE signup BETWEEN '$monthStart' AND '$monthEnd' ORDER BY `signup` ";
                        // echo '<form action="?p=reportSetup" method="post" accept-charset="utf-8">';
						$objQuery = $conn->query($strSQL);
					?>

				<div class="container form-group">
					<div class="card">
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>คันที่</th>
										<th>ที่อยู่</th>
										<th>ผู้ติดตั้ง</th>
										<th>วันที่</th>
									</tr>
								</thead>
								<tbody>
                                    <?php 
                                        $a = 1;
										while ($objResult=$objQuery->fetch_array()) {
									 ?>
									<tr>
										<td><?= $a++ ?></td>
										<td><?= $objResult['contrack'] ?></td>
										<td><?= $objResult['tech'] ?></td>
										<td><?= DateDMY($objResult['signup']) ?></td>				
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="card-footer" style="display:none">
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