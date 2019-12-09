<?php
// require_once("config.php");
require_once("pagination_function.php");
// session_start();
//   if (isset($_SESSION['login_true'])=="") {
//   echo "<meta http-equiv=refresh content=0;URL=login.php>";
// }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
    <style type="text/css">
        html{
            font-family:tahoma, Arial,"Times New Roman";
            font-size:14px;
        }
        body{
            font-family:tahoma, Arial,"Times New Roman";
            font-size:14px;
        }
        .margin_top_5{
            margin-top: 5px;
        }
        .card{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        /* text-align: center; */
        }
    </style>
</head>
<body>
<div class="container-fluid mt-4">
  <div class="card">
    <div class="card-header bg-success">
      <div class="row">
        <div class="col-sm-4 offset-sm-4 text-center">
          <h3 class="text-white">รายการลูกค้า</h3>
        </div>
      </div>
    </div>
    <div class="card-body">
<form name="form1" method="GET" action="?p=main_tech">
<input type="text" name="p" id="" value="main_tech" hidden> 

  <br>
  <div class="form-group row">
    <label for="keyword" class="col-sm-4 col-form-label text-right">
    </label>
    <div class="form-group">
    </div>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="keyword" id="keyword" placeholder="พิมพ์ ชื่อ IMEI ทะเบียนรถ หรือคัดซี เพื่อค้นหา"
       value="<?=(isset($_GET['keyword']))?$_GET['keyword']:""?>">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" name="btn_search" id="btn_search">ค้นหา</button>
      <a href="?p=main_tech" class="btn btn-danger">ล้างค่า</a>
    </div>
</div>
</form>
        <hr>
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover table-sm">
  <thead >
    <tr class="text-center bg-success text-white">
      <th style="width:5%">ปริ้น</th>
      <th style="width:5%">ip</th>
      <th style="width:auto">ทะเบียนรถ</th>
      <th style="width:10%">จังหวัด</th>
      <th style="width:10%">User ลูกค้า</th>
      <th style="width:10%">เบอร์ Sim ในเครื่อง</th>
      <th style="width:10%">IMEI</th>
      <th style="width:18%">เลขคัทซี</th>
      
      
      <th style="width:10%">วันที่ติดตั้ง</th>
    </tr>
  </thead>

  <tbody>

<?php
$num = 0;
$sql = "SELECT * FROM member WHERE 1";

//////////////////// MORE QUERY
// เงื่อนไขสำหรับ radi
$keyword = isset($_GET['keyword']);
if(isset($_POST['myradio']) && $_POST['myradio']!=""){
    // ต่อคำสั่ง sql
    $sql.=" AND province_name LIKE '%".trim($_POST['myradio'])."%' ";
}

// เงื่อนไขสำหรับ input text
if(isset($_GET['keyword']) && $_GET['keyword']!=""){
    // ต่อคำสั่ง sql
    $sql.=" AND zipcode LIKE '%".trim($_GET['keyword'])."%' ";
    $sql.=" OR user LIKE '%".trim($_GET['keyword'])."%'";
    $sql.=" OR zipcode LIKE '%".trim($_GET['keyword'])."%' ";
    $sql.=" OR name LIKE '%".trim($_GET['keyword'])."%' ";
    $sql.=" OR amper LIKE '%".trim($_GET['keyword'])."%' ";
}

// เงื่อนไขสำหรับ select
if(isset($_POST['myselect']) && $_POST['myselect']!=""){
    // ต่อคำสั่ง sql
    $sql.=" AND province_name LIKE '".trim($_POST['myselect'])."%' ";
}

// เงื่อนไขสำหรับ checkbox
if((isset($_POST['mycheckbox1']) && $_POST['mycheckbox1']!="")
|| (isset($_POST['mycheckbox2']) && $_POST['mycheckbox2']!="")){
    // ต่อคำสั่ง sql
    if($_POST['mycheckbox1']!="" && $_POST['mycheckbox2']!=""){
         $sql.="
         AND (province_name LIKE '%".trim($_POST['mycheckbox1'])."'
         OR province_name LIKE '%".trim($_POST['mycheckbox2'])."' )
         ";
    }elseif($_POST['mycheckbox1']!=""){
         $sql.=" AND province_name LIKE '%".trim($_POST['mycheckbox1'])."' ";
    }elseif($_POST['mycheckbox2']!=""){
         $sql.=" AND province_name LIKE '%".trim($_POST['mycheckbox2'])."' ";
    }else{

    }
}
//////////////////// MORE QUERY
$result=mysqli_query($conn, $sql);
$total=mysqli_num_rows($result); 
?>
  <!-- แสดงจำนวนทั้งหมด -->
  <div class="col alert alert-warning" role="alert">
    <?php
    if ($keyword) {
      echo "ค้นหา ( ";
      echo (isset($_GET['keyword']))? $_GET['keyword']:"";
      echo " )";
    }
    ?>
    จำนวนทั้งหมด
    <font color=red><?=$total ?></font>
    รายการ
  </div>

<?php
$e_page=10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า
$step_num=0;
if(!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page']==1)){
    $_GET['page']=1;
    $step_num=0;
    $s_page = 0;
}else{
    $s_page = $_GET['page']-1;
    $step_num=$_GET['page']-1;
    $s_page = $s_page*$e_page;
}
$sql.=" ORDER BY id DESC LIMIT ".$s_page.",$e_page";
$result=mysqli_query($conn, $sql);
if($result && $result->num_rows>0){  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
    while($row = $result->fetch_array()){ // วนลูปแสดงรายการ
        $num++;
?>
    <tr>
      <th class="text-center">
      <a href="<?= linkdocument($row['gpsmodel1'])?>?user=<?= $row['user'] ?>" target="_BLANK">
      <button type="button" class="btn btn-dark btn-sm" name="button">
        <i class="fa fa-print"></i>
      </button> </a></th>
      <th class="text-center">
      <a href="?p=<?= linkSetip($row['gpsmodel1'])?>&number=<?= $row['simno'] ?>">
      <button type="button" class="btn btn-warning btn-sm" name="button">
        <i class="fas fa-satellite-dish"></i>
      </button> </a></th>
      <td><?= $row['amper'] ?></td>
      <td><?= $row['province'] ?></td>
      <td><?= $row['phone'] ?><font style="color: red; font-weight: bold;"> (<?= checkServer($row['email']) ?>)</font></td>
      <td><a href="tel:<?= $row['simno'] ?>" target="_BLANK"><?= $row['simno'] ?></a> </td>
      <td scope="row"><?= $row['zipcode'] ?></td>
      <td><?= $row['user'] ?></td>
      
      
      <td><?= $row['signup'] ?></td>
    </tr>
<?php
    }
}
?>
  </tbody>
</table>

<?php
page_navi($total,(isset($_GET['page']))?$_GET['page']:1,$e_page,$_GET);
?>
</div>

<br>

<br>
      <!-- ปิด card body -->
      </div>
  <!-- ปิด card -->
  </div>
<!-- ปิด container -->
</div>

<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function(){

});
</script>
</body>
</html>
