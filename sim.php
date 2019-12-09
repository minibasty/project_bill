<?php
require_once("config.php");
// require_once("pagination_function.php");
// include("all_function.php");
  if (isset($_SESSION['login_true'])=="")
  {
  echo "<meta http-equiv=refresh content=0;URL=login.php>";
  }
  date_default_timezone_set("Asia/Bangkok");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: จัดการซิม :: </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
    <link rel="stylesheet" href="vendor\datetimepicker\jquery.datetimepicker.css">
    <style type="text/css">
        html{
            font-family:tahoma, Arial,"Times New Roman";
            font-size:14px;
        }
        body{
          background-color: #d7d7d7;

            font-family:tahoma, Arial,"Times New Roman";
            font-size:14px;
        }
        .margin_top_5{
            margin-top: 5px;
        }
        .card-body{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        /* text-align: center; */
        }
    </style>
</head>
<body>
  <?php 
$num = 0;
$month = date("m");
$day = 5;
$year = date("Y")+543;
$now = date("Y-m-d", strtotime("+7 DAY"));
$sql = "SELECT * FROM member";
$sql .=" WHERE simexp<='$now'";
//////////////////// MORE QUERY
// เงื่อนไขสำหรับ radi
// echo $sql;
$selectDate = isset($_POST['selectDate']) ? $_POST['selectDate'] : '';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
if(isset($_POST['myradio']) && $_POST['myradio']!=""){
    // ต่อคำสั่ง sql
    $sql.=" AND province_name LIKE '%".trim($_POST['myradio'])."%' ";
}

// เงื่อนไขสำหรับ input text
if((isset($_POST['selectDate']) && $_POST['selectDate']!="") OR (isset($_GET['selectDate']) && $_GET['selectDate']!="")){
  if(isset($_GET['selectDate'])){
    $selectDate = $_GET['selectDate'];
  }else{
    $selectDate = $_POST['selectDate'];
  }
  // ต่อคำสั่ง sql
    $getDate=DateYMD($selectDate);
    // ต่อคำสั่ง sql
    $sql = "SELECT * FROM member";
    $sql .=" WHERE simexp='$getDate'";
}

if((isset($_GET['keyword']) && $_GET['keyword']!="") OR (isset($_GET['keyword']) && $_GET['keyword']!="")){
      
  if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
  }else{
    $keyword = $_GET['keyword'];
  }
    // ต่อคำสั่ง sql
    $sql = "SELECT * FROM member WHERE";
    $sql.=" zipcode LIKE '%".trim($keyword)."%' ";
    $sql.=" OR user LIKE '%".trim($keyword)."%'";
    $sql.=" OR zipcode LIKE '%".trim($keyword)."%' ";
    $sql.=" OR name LIKE '%".trim($keyword)."%' ";
    $sql.=" OR amper LIKE '%".trim($keyword)."%' ";
    $sql.=" OR phone LIKE '%".trim($keyword)."%' ";
    $sql.=" OR simno LIKE '%".trim($keyword)."%' ";
    $sql.=" OR main_user LIKE '%".trim($keyword)."%' ";
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
  ?>
<div class="container-fluid mt-4">
  <div class="card">
<div class="card-body">
  <form name="form1" method="GET" action="?p=sim" autocomplete="off">
      <input type="text" name="p" id="" value="sim" hidden>
      <div class="col-sm-12">
        <h3 class="">รายการซิม</h3>
      </div>
    <br>
  <div class="form-row ">
      <div class="col-sm-6 offset-sm-3 form-inline">
        <input type="text" name="selectDate" class="form-control col testdate5" autocomplete="off" readonly placeholder="ค้นหาจากวันที่หมดอายุซิม"
        value="<?= $selectDate ?>" >
        &nbsp
        <input type="text" name="keyword" id="testdate5" class="form-control col" autocomplete="off" placeholder="ชื่อ IMEI ทะเบียนรถ คัดซี user ย่อย/หลัก หมายเลขซิม"
        value="<?= $keyword ?>" >
      </div>
      <div class="col-sm-3 form-inline">
          <button type="submit" class="btn btn-primary" name="btn_search" id="btn_search">ค้นหา</button>
          &nbsp;
          <a href="?p=sim" class="btn btn-danger">ล้างค่า</a>
      </div>
</div>
</form>
<hr>
  <div class="table-responsive">
    <table class="table table-sm table-bordered table-striped table-hover">
  <thead >
    <tr class="text-center bg-success text-white">
      <th style="width:25%">ชื่อผู้ประกอบการ</th>
      <th style="width:10%">IMEI</th>
      <th style="width:10%">ทะเบียนรถ</th>
      <th style="width:15%">เลขคัทซี</th>
      <th style="width:auto">เครือข่าย</th>
      <th style="width:auto">หมายเลข</th>
      <th style="width:10%">จำนวนเงิน</th>
      <th style="width:10%">วันหมดอายุ</th>
      <th style="width:10%">วันที่บันทึกล่าสุด</th>
      <th style="width:5%">แก้ไขรายคัน</th>
    </tr>
  </thead>
  <tbody>

<?php

// echo $sql;
$result=mysqli_query($conn, $sql);
$total=mysqli_num_rows($result); ?>
  <!-- แสดงจำนวนทั้งหมด -->
  <div class="alert alert-warning" role="alert">
    <?php
    echo "วันที่ ( ";
    if ($selectDate)
    {
      echo $selectDate;
    }elseif ($keyword)
    {
      echo $keyword;
    }
    else
    {
      echo $now;
      }
      echo " )";
    ?>
    จำนวนทั้งหมด
    <font color=red><?=$total ?></font>
    รายการ
  </div>
  <?php
  $checkupdate = isset($_POST['update']) ? $_POST['update'] : '';
  if ($checkupdate=="1") {
  ?>
  <div class="alert alert-success text-center" role="alert">
    บันทึกข้อมูลสำเร็จ
  </div>
  <?php
}elseif ($checkupdate=="0") { ?>
  <div class="alert alert-danger text-center" role="alert">
    บันทืึกข้อมูลไม่สำเร็จ กรุณาตรวจสอบ
  </div>
  <?php
}
  ?>
  <div class="">

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
        $check_cancelS="SELECT * FROM canceler_service WHERE member_id=$row[id]";
        $check_cancel_rs=$conn->query($check_cancelS);
        $check_cancel_row=$check_cancel_rs->num_rows;
        if ($check_cancel_row>0) {
          echo '<tr style="color:red;">';
        }else{
          echo '<tr>';
        }

        // เช็คค่าว่าง simexp
        if ($row['simexp']=="") {
          $simexp=$row['simexp'];
        }else{
          $simexp=DateDMY($row['simexp']);
        }

        if ($row['sim_stamp']=="") {
          $sim_stamp=$row['sim_stamp'];
        }else{
          $sim_stamp=DateDMY($row['sim_stamp']);
        }


?>
      <td class="text-left" ><?= $row['name']?></td>
      <td scope="row"><?= $row['zipcode'] ?></td>
      <td><?= $row['amper'] ?></td>
      <td><?= $row['user'] ?></td>
      <td class="text-center"><?= $row['sim'] ?></td>
      <td class="text-center"><?= $row['simno'] ?></td>
      <td class="text-center"><?= $row['sim_money'] ?></td>
      <td class="text-center"><?= $simexp; ?></td>
      <td class="text-center"><?= $sim_stamp; ?></td>
      <td class="text-center">
        <button class="btn btn-info btn-sm" type="button" name="button" data-toggle="modal" data-target="#addbill<?= $row['user'] ?>">
          <i class="fas fa-sim-card"></i>
        </button>
      </td>
    </tr>

    <!-- Modal -->
    <div class="modal fade" id="addbill<?= $row['user'] ?>"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form class="" action="" method="post">
          <input type="text" name="keyword" hidden value="<?= $keyword ?>">
          <input type="text" name="selectDate" hidden value="<?= $selectDate ?>">
          <div class="modal-header bg-muted">
            <h5 class="modal-title" id="exampleModalCenterTitle">รายละเอียด <?= $row['user'] ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body"  id="testdate5">
            <div class="row">
              <div class="col-12">
                <label for="sim_money">จำนวนเงินในซิม</label>
                    <input type="text"  class="form-control" id="sim_money" name="sim_money"
                    value="<?= $row['sim_money'] ?>" placeholder="ค่าบริการรายเดือน" onkeypress="key_number();">
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <label for="simexp">วันหมดอายุซิม</label>
                <input type="text"  class="form-control testdate5" name="simexp" readonly value="<?= DateDMY($row['simexp']) ?>">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="text" hidden name="check" value="<?= $row['user'] ?>">
            <button type="submit" class="btn btn-primary" name="save">บันทึก</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- Modal END -->

<?php
// loop while
    }
    //บันทึกบิล
    if (isset($_POST['save']))
    {
      $check=$_POST['check'];
      $sim_money=$_POST['sim_money'];
      // $sim_money=DateYMD($sim_money);

      $simexp=$_POST['simexp'];
      $simexp=DateYMD($simexp);

      $yy3=(date("Y")+543);
      $timenow = date("d-m-$yy3 H:i:s");
       $check="UPDATE member SET
        sim_money='$sim_money',
        simexp='$simexp',
        sim_manage='$_SESSION[login_true]',
        sim_stamp=NOW()
         WHERE user='$check'";
      $rs_check=$conn->query($check);
      if ($rs_check) {
        print "<meta http-equiv=refresh content=0;URL=?p=sim&update=1&selectDate=$_POST[selectDate]&keyword=$_POST[keyword]>";
      }else {
        print "<meta http-equiv=refresh content=0;URL=?p=sim&update=0&selectDate=$_POST[selectDate]&keyword=$_POST[keyword]>";
      }
    }
}else { ?>
  <!-- // ไม่มีรายการ -->
<tr>
  <td colspan="9">
    <div class="alert alert-danger text-center" role="alert">
     <p>ไม่มีรายการของวันที่
     <?php
     echo " ( ";
     if ($selectDate) {
       echo (isset($_POST['selectDate']))?$_POST['selectDate']:"";
     }else{
       echo $now;
      }
       echo " )";
     ?>
     </p>
    </div>
  </td>
</tr>
<?php
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
<script src="vendor\maskinput\jquery.inputmask.js" charset="utf-8"></script>
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
<script src="vendor\datetimepicker\jquery.datetimepicker.full.js" charset="utf-8"></script>

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
</body>
</html>
<!-- pagination function  -->
<?php
function page_navi($total_item, $cur_page, $per_page=10, $query_str="", $min_page=5){

$total_page = ceil($total_item/$per_page);
$cur_page = (isset($cur_page))?$cur_page:1;
$diff_page = NULL;
if($cur_page>$min_page){
    $diff_page = $total_page-$cur_page;
}
$limit_page = $min_page;
$f_num_page = ($cur_page<=$min_page)?1:(floor($cur_page/$min_page)*$min_page)+1;
if($diff_page>$min_page){
    $limit_page = ($min_page + $f_num_page)-1;
}else{
    if(isset($diff_page)){
        $limit_page = $total_page;
    }else{
        $limit_page = $min_page;
    }
}
$show_page = ($total_page<=$min_page)?$total_page:$limit_page;
$l_num_page = 1;
$prev_page = $cur_page-1;
$next_page = $cur_page+1;
$temp_query_str = $query_str;
$query_str = "";
if($temp_query_str && is_array($temp_query_str) && count($temp_query_str)>0){
    array_pop($temp_query_str);
    $query_str = http_build_query($temp_query_str);
    if($query_str!=""){
        $query_str = "?".$query_str;
    }
}
$mark_char = ($query_str!="")?"&":"?";

  echo '<nav>
      <ul class="pagination justify-content-center">
        <li class="page-item">
        <a class="page-link" href="'.$query_str.$mark_char.'page=1"> First</a>
        </li>
        ';
    echo '
        <li class="page-item '.(($cur_page==1)?"disabled":"").'">
          <a class="page-link"  href="'.$query_str.$mark_char.'page='.$prev_page.'"> Previous</a>
        </li>
    ';
    for($i = $f_num_page; $i<=$show_page;$i++){
    echo '
        <li class="page-item '.(($i==$cur_page)?"active":"").'">
          <a class="page-link" href="'.$query_str.$mark_char.'page='.$i.'"> '.$i.' </a>
        </li>
    ';
    }
    echo '
        <li class="page-item '.(($next_page>$total_page)?"disabled":"").'">
            <a class="page-link"  href="'.$query_str.$mark_char.'page='.$next_page.'"> Next</a>
        </li>
    ';
    echo '
        <li class="page-item">
          <input type="number" class="form-control" min="1" max="'.$total_page.'"
                  style="width:80px;" onClick="this.select()" onchange="window.location=\''.$query_str.$mark_char.'page=\'+this.value"  value="'.$cur_page.'" />
        </li>
    ';
    echo '
        <li class="page-item">
            <a class="page-link"  href="'.$query_str.$mark_char.'page='.$total_page.'"> Last</a>
        </li>
      </ul>
    </nav>
    ';
}
?>