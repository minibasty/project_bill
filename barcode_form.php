<!DOCTYPE html>
<html>
<head>
	<title>Barcode Form</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.js">
    <script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<style type="text/css">
		.bg-dark{
			color: white;
			font-weight: bold;
		}
		body{
			background-color: #d7d7d7;

		}
	</style>
</head>
<body>
	<div class="container mt-4">
		<div class="card">
			<div class="card-header bg-dark text-center">
				กรอกข้อมูลเพื่อพิมพ์ Barcode
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4 text-center">
						<img  style="border-width: 1px; border-color: red; border: groove;" src="img/ex_barcode.PNG" alt="">
					</div>
				<div class="col-sm-8">
					<form action="barcode/app/html/barcode.php" method="get" accept-charset="utf-8" target="_BRANK">
						<div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 text-right col-form-label">Barcode ส่วนที่ 1</label>
						    <div class="col-sm-9">
								<input class="form-control" type="text" name="b1" value="" placeholder="เบอร์เครื่อง etc. 008045678910" required>
						    </div>
						 </div>
						 <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 text-right col-form-label">Barcode ส่วนที่ 2</label>
						    <div class="col-sm-9">
								<input class="form-control" type="text" name="b2" value="" placeholder="IMEI เครื่อง etc. 142180123456" required>
						    </div>
						 </div>
						 <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 text-right col-form-label">ข้อความ</label>
						    <div class="col-sm-9">
								<input class="form-control" type="text" name="text" value="" placeholder="ค่ายซิม + เบอร์ซิม etc. True0804567891" required> 						    
							</div>
						 </div>
						 <div class="text-center">
						 	<button type="submit" class="btn btn-success">พิมพ์</button>
					 </div>
					</form>

				</div>
				</div>
			</div>
		</div>
	</div>

</body>
     <script src="js/jquery-3.2.1.slim.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/popper.min.js" type="text/javascript" charset="utf-8"></script>
</html>