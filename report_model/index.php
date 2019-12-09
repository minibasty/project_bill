<?php
require_once("config.php");
// require_once("pagination_function.php");
include_once("all_function.php");
// session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
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
            /* margin-top: 5px; */
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
  $year = date("Y")+543;
  $now = date("Y-m-d" , strtotime("+7 DAY"));
  $sql = "SELECT * FROM member";
  $sql .=" WHERE gpsmodel1 != 'VT900(Box)' AND gpsmodel1 != 'GT06E(Box)' ";
  ?>
<div class="container-fluid mt-4" >
  <div class="card">
    <div class="card-body">
    <form name="form1" method="GET" action="?p=bill" autocomplete="off">
      <input type="text" name="p" id="" value="bill" hidden>
      <div class="col-sm-12">
        <h3 class="">รายงานเครื่องที่ติดตั้ง</h3>
      </div>
    <br>
</form>
<hr>
  <div class="table-responsive">
    <table class="table table-sm table-bordered table-striped table-hover">
  <thead >
    <tr class="text-center bg-success text-white">
      <th style="width:auto">ชื่อผู้ประกอบการ</th>
      <th style="width:auto">IMEI</th>
      <th style="width:auto">ทะเบียนรถ</th>
      <th style="width:auto">เลขคัทซี</th>
      <th style="width:auto">วันที่ติดตั้ง</th>
      <th style="width:auto" >เครื่องที่ติดตั้ง</th>
    </tr>
  </thead>
  <tbody>

<?php
//////////////////// MORE QUERY
// echo $sql;
$result=mysqli_query($conn, $sql);
$total=mysqli_num_rows($result); ?>

<?php
$e_page=15; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า
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
        if ($row['bill']=="") {
          $bill="";
        }else{
          $bill=DateDMY($row['bill']);
        }

        if ($row['dill']=="") {
          $dill="";
        }else{
          $dill=DateDMY($row['dill']);
        }

        if ($row['tax_exp']=="" OR $row['tax_exp']=="0000-00-00") {
          $tax_exp="";
        }else{
          $tax_exp=DateDMY($row['tax_exp']);
        }
?>
    <tr>
      <td class="text-left" ><div title="<?= $row['name'] ?>"><?= mb_strimwidth($row['name'],0,30,'...','UTF-8');?></td>
      
      <td><?= $row['zipcode'] ?></td>
      <td class="text-center"><?= $row['amper'] ?></td>
      <td ><?= $row['user'] ?></td>
      <td class="text-center"><?= $row['signup'] ?></td>
      <td class="text-center"><?= $row['gpsmodel1'] ?></td>
    </tr>

    <!-- Modal -->
    <div class="modal fade" id="addbill<?= $row['user'] ?>"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form class="" action="" method="post">
          <div class="modal-header bg-muted">
            <h5 class="modal-title" id="exampleModalCenterTitle">รายละเอียด <?= $row['user'] ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body"  id="testdate5">
            <div class="row">
              <input type="text" name="keyword" hidden value="<?= $keyword ?>">
              <input type="text" name="selectDate" hidden value="<?= $selectDate ?>">
              <div class="col-6">
                <label for="bill">วันที่จ่ายล่าสุด</label>
                <input type="text"  class="form-control testdate5" name="billDate" readonly value="<?= DateDMY($now)?>">
              </div>
              <div class="col-6">
                <?php
                // $bill_cycle= isset($row['bill_cycle']) ? $_POST['update'] : '';
                 ?>
                <label for="bill">รอบบิลถัดไป</label>
                <select class="form-control" name="dillDate">
                  <option value="1" <?php if($row['bill_cycle']=="1"){ echo "selected"; } ?> >1 เดือน</option>
                  <option value="3" <?php if($row['bill_cycle']=="3"){ echo "selected"; } ?>>3 เดือน</option>
                  <option value="6" <?php if($row['bill_cycle']=="6"){ echo "selected"; } ?>>6 เดือน</option>
                  <option value="12" <?php if($row['bill_cycle']=="12"){ echo "selected"; } ?>>1 ปี</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label for="service_charge">ค่าบริการรายเดือน</label>
                    <input type="text"  class="form-control" id="service_charge" name="service_charge"
                    value="<?= $row['service_charge'] ?>" placeholder="ค่าบริการรายเดือน" onkeypress="key_number();">
              </div>
              <div class="col-6">
                <label for="customCheck1"> </label>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" value="1" name="vat" class="custom-control-input"
                  <?php if($row['vat']=="1"){ echo "checked";} ?> id="customCheck1">
                  <label class="custom-control-label"for="customCheck1">VAT 7%</label>
                </div>
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
    }
?>
  </tbody>
</table>

<?php
page_navi($total,(isset($_GET['page']))? $_GET['page']:1 ,$e_page ,$_GET);
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
<script type="text/javascript" src="vendor\maskinput\jquery.inputmask.js" charset="utf-8"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
<script type="text/javascript" src="vendor\datetimepicker\jquery.datetimepicker.full.js" charset="utf-8"></script>
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
