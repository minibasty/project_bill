<?php
require_once("config.php");
include('pagination_function.php');

if (isset($_SESSION['login_true']) == "") {
	echo "<meta http-equiv=refresh content=0;URL=login.php>";
}
date_default_timezone_set("Asia/Bangkok");
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>:: ใบเสร็จ :: </title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
	<link rel="stylesheet" href="vendor\datetimepicker\jquery.datetimepicker.css">
	<style type="text/css">
		body {
			background-color: #3333;
		}

		.margin_top_5 {
			margin-top: 5px;
		}

		.card-body {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			/* text-align: center; */
		}
	</style>
</head>
<?php
$selectDate = isset($_POST['selectDate']) ? $_POST['selectDate'] : '';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
?>

<body>
	<div class="container-fluid mt-4">
		<div class="card form-group">
			<div class="card-body">
				<form name="form1" method="GET" action="?p=sim" autocomplete="off">
					<input type="text" name="p" id="" value="sim" hidden>
					<div class="col-sm-12">
						<h3 class="">ใบเสร็จ</h3>
					</div>
					<hr>

					<div class="form-row ">
						<div class="form-group col-sm-1 text-right align-self-center">
							<span class="">ค้นหา</span>
						</div>
						<div class="form-group col-sm-3 align-self-center">
							<input type="text" name="keyword" id="testdate5" class="form-control col" autocomplete="off" placeholder="" value="<?= $keyword ?>">
						</div>
						<div class="form-group col-sm-3 align-self-center">
							<button type="submit" class="btn btn-primary" name="btn_search" id="btn_search"><span class="fa fa-search"></span> </button>
							<a href="?p=sim" class="btn btn-danger"><span class="fa fa-times"></span> </a>
						</div>
					</div>
				</form>

				<!-- ปิด card body -->
			</div>
		</div>
		<div class="card ">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-sm table-bordered table-striped table-hover">
						<thead>
							<tr class="text-center bg-success text-white">
								<th style="width:auto">เลขที่</th>
								<th style="width:auto">วันที่</th>
								<th style="width:auto">ผู้ประกอบการ</th>
								<th style="width:auto">ยอรวม</th>
								<th style="width:auto">สถานะ</th>
								<th style="width:auto"></th>

							</tr>
						</thead>
						<tbody>

							<?php 
							$num = 0;
							$sql = "SELECT * FROM invoice";
							// echo $sql;
							$result = mysqli_query($conn, $sql);
							$total = mysqli_num_rows($result); ?>
							<!-- แสดงจำนวนทั้งหมด -->
							<div class="alert alert-secondary alert-sm" role="alert">
								<div class="form-row">
									<div class="col">จำนวนทั้งหมด <font color=red><?= $total ?></font> รายการ</div>
									<div class="col text-right">
										<a href="?p=invoice_add" target="" rel="noopener noreferrer">
											<button type="button" class="btn btn-sm btn-primary">
												<span class="fa fa-plus"></span>
												เพิ่มใบเสร็จรับเงิน
											</button>
										</a>
									</div>


								</div>

							</div>
							<?php
							$e_page = 15; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า
							$step_num = 0;
							if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] == 1)) {
								$_GET['page'] = 1;
								$step_num = 0;
								$s_page = 0;
							} else {
								$s_page = $_GET['page'] - 1;
								$step_num = $_GET['page'] - 1;
								$s_page = $s_page * $e_page;
							}
							$sql .= " ORDER BY inv_id DESC LIMIT " . $s_page . ",$e_page";
							$result = mysqli_query($conn, $sql);
							if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
								while ($row = $result->fetch_array()) { // วนลูปแสดงรายการ
									$num++;
									?>
									<tr>
										<td class="text-left"><?= $row['invNo_all'] ?></td>
										<td scope="row"><?= $row['inv_date'] ?></td>
										<td><?= $row['inv_name'] ?></td>
										<td><?= number_format($row['inv_total'],2) ?></td>
										<td class="text-center"></td>
										<td class="text-center">
											<a href="?p=invoice_add&inv=<?= $row['inv_id'] ?>">
											<button class="btn btn-sm btn-info"> <i class="fad fa-info-square"></i></button></a>
										</td>
									</tr>

							<?php
									// loop while
								}
							}
							?>

						</tbody>
					</table>

					<?php
					page_navi($total, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page, $_GET);
					?>
				</div>
			</div>
		</div>
		<!-- ปิด card -->

		<!-- ปิด container -->
	</div>
	<script src="vendor\maskinput\jquery.inputmask.js" charset="utf-8"></script>
	<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
	<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
	<script src="vendor\datetimepicker\jquery.datetimepicker.full.js" charset="utf-8"></script>

	<script type="text/javascript">
		$(function() {

			// กรณีใช้แบบ inline
			$("#testdate4").datetimepicker({
				timepicker: false,
				format: 'd-m-Y', // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000
				lang: 'th', // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
				inline: true
			});


			// กรณีใช้แบบ input
			$(".testdate5").datetimepicker({
				zIndex: 2048,
				timepicker: false,
				format: 'd-m-Y', // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000
				lang: 'th', // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
				onSelectDate: function(dp, $input) {
					var yearT = new Date(dp).getFullYear() - 0;
					var yearTH = yearT + 543;
					var fulldate = $input.val();
					var fulldateTH = fulldate.replace(yearT, yearTH);
					$input.val(fulldateTH);
				},
			});
			// กรณีใช้กับ input ต้องกำหนดส่วนนี้ด้วยเสมอ เพื่อปรับปีให้เป็น ค.ศ. ก่อนแสดงปฏิทิน
			$(".testdate5").on("mouseenter mouseleave", function(e) {
				var dateValue = $(this).val();
				if (dateValue != "") {
					var arr_date = dateValue.split(
						"-"); // ถ้าใช้ตัวแบ่งรูปแบบอื่น ให้เปลี่ยนเป็นตามรูปแบบนั้น
					// ในที่นี้อยู่ในรูปแบบ 00-00-0000 เป็น d-m-Y  แบ่งด่วย - ดังนั้น ตัวแปรที่เป็นปี จะอยู่ใน array
					//  ตัวที่สอง arr_date[2] โดยเริ่มนับจาก 0
					if (e.type == "mouseenter") {
						var yearT = arr_date[2] - 543;
					}
					if (e.type == "mouseleave") {
						var yearT = parseInt(arr_date[2]) + 543;
					}
					dateValue = dateValue.replace(arr_date[2], yearT);
					$(this).val(dateValue);
				}
			});
		});
	</script>
</body>

</html>

<?php
// ค้นหา 

// เงื่อนไขสำหรับ radi
// echo $sql;

if (isset($_POST['myradio']) && $_POST['myradio'] != "") {
	// ต่อคำสั่ง sql
	$sql .= " AND province_name LIKE '%" . trim($_POST['myradio']) . "%' ";
}

// เงื่อนไขสำหรับ input text
if ((isset($_POST['selectDate']) && $_POST['selectDate'] != "") or (isset($_GET['selectDate']) && $_GET['selectDate'] != "")) {
	if (isset($_GET['selectDate'])) {
		$selectDate = $_GET['selectDate'];
	} else {
		$selectDate = $_POST['selectDate'];
	}
	// ต่อคำสั่ง sql
	$getDate = DateYMD($selectDate);
	// ต่อคำสั่ง sql
	$sql = "SELECT * FROM member";
	$sql .= " WHERE simexp='$getDate'";
}

if ((isset($_GET['keyword']) && $_GET['keyword'] != "") or (isset($_GET['keyword']) && $_GET['keyword'] != "")) {

	if (isset($_GET['keyword'])) {
		$keyword = $_GET['keyword'];
	} else {
		$keyword = $_GET['keyword'];
	}
	// ต่อคำสั่ง sql
	$sql = "SELECT * FROM member WHERE";
	$sql .= " zipcode LIKE '%" . trim($keyword) . "%' ";
	$sql .= " OR user LIKE '%" . trim($keyword) . "%'";
	$sql .= " OR zipcode LIKE '%" . trim($keyword) . "%' ";
	$sql .= " OR name LIKE '%" . trim($keyword) . "%' ";
	$sql .= " OR amper LIKE '%" . trim($keyword) . "%' ";
	$sql .= " OR phone LIKE '%" . trim($keyword) . "%' ";
	$sql .= " OR simno LIKE '%" . trim($keyword) . "%' ";
	$sql .= " OR main_user LIKE '%" . trim($keyword) . "%' ";
}

// เงื่อนไขสำหรับ select
if (isset($_POST['myselect']) && $_POST['myselect'] != "") {
	// ต่อคำสั่ง sql
	$sql .= " AND province_name LIKE '" . trim($_POST['myselect']) . "%' ";
}

// เงื่อนไขสำหรับ checkbox
if ((isset($_POST['mycheckbox1']) && $_POST['mycheckbox1'] != "")
	|| (isset($_POST['mycheckbox2']) && $_POST['mycheckbox2'] != "")
) {
	// ต่อคำสั่ง sql
	if ($_POST['mycheckbox1'] != "" && $_POST['mycheckbox2'] != "") {
		$sql .= "
         AND (province_name LIKE '%" . trim($_POST['mycheckbox1']) . "'
         OR province_name LIKE '%" . trim($_POST['mycheckbox2']) . "' )
         ";
	} elseif ($_POST['mycheckbox1'] != "") {
		$sql .= " AND province_name LIKE '%" . trim($_POST['mycheckbox1']) . "' ";
	} elseif ($_POST['mycheckbox2'] != "") {
		$sql .= " AND province_name LIKE '%" . trim($_POST['mycheckbox2']) . "' ";
	} else { }
}

?>