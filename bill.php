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
  $after7Day = date("Y-m-d" , strtotime("+7 DAY"));
  $now = date("Y-m-d");
  $sql = "SELECT * FROM member";
  
  $sql .=" WHERE dill<='$after7Day' and dill!='' ";
  // MORE QUERY
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
      $sql = "SELECT * FROM member";
      $sql .=" WHERE dill='$getDate'";
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
  ?>
<div class="container-fluid mt-4" >
  <div class="card">
    <div class="card-body">
    <form name="form1" method="GET" action="?p=bill" autocomplete="off">
      <input type="text" name="p" id="" value="bill" hidden>
      <div class="col-sm-12">
        <h3 class="">จัดการบิล</h3>
      </div>
    <br>
    <div class="form-row">
        <div class="col-sm-6 offset-sm-3 form-inline">
          <input type="text" name="selectDate" class="form-control col testdate5" autocomplete="off" readonly placeholder="ค้นหาจากวันที่"
          value="<?= $selectDate ?>" >
          &nbsp
          <input type="text" name="keyword" id="testdate5" class="form-control col" autocomplete="off" placeholder="ค้นหา ชื่อผู้ประกอบการณ์ IMEI ทะเบียน userหลัก/ย่อย หรือคัดซี "
          value="<?= $keyword?>" >
        </div>
        <div class="col-sm-3 form-inline">
            <button type="submit" class="btn btn-primary" name="btn_search" id="btn_search">ค้นหา</button>
            &nbsp;
            <a href="?p=bill" class="btn btn-danger">ล้างค่า</a>
        </div>
    </div>
</form>
<hr>
  <div class="table-responsive">
    <table class="table table-sm table-bordered table-striped table-hover">
  <thead >
    <tr class="text-center bg-success text-white">
      <th style="width:auto">ปริ้น</th>
      <th style="width:auto">ชื่อผู้ประกอบการ</th>
      <th style="width:auto">ทะเบียนรถ</th>
      <th style="width:auto">userหลัก</th>
      <th style="width:auto">userย่อย</th>
      <th style="width:auto">เบอร์ติดต่อ</th>
      <th style="width:auto">วันต่อภาษี</th>
      <th style="width:auto">ยอดก่อนVat</th>
      <th style="width:auto">Due จ่ายรอบที่แล้ว</th>
      <th style="width:auto">Due จ่ายรอบถัดไป</th>
      <th style="width:auto">ลงเวลาจ่าย</th>

    </tr>
  </thead>
  <tbody>

<?php
//////////////////// MORE QUERY
// echo $sql;
$result=mysqli_query($conn, $sql);
$total=mysqli_num_rows($result); ?>
  <!-- แสดงจำนวนทั้งหมด -->
  <div class="alert alert-warning" role="alert">
    <?php
    echo "ค้นหา ( ";
    if ($selectDate)
    {
      echo $selectDate;
    }elseif ($keyword)
    {
      echo $keyword;
    }
    else
    {
      echo $after7Day;
      }
      echo " )";
    ?>
    จำนวนทั้งหมด
    <font color=red><?=$total ?></font>
    รายการ
  </div>

  
  <?php
  $vat = isset($_GET['update']) ? $_GET['update'] : '';
  if ($vat=="1") {
  ?>
  <div class="alert alert-success text-center" role="alert">
    บันทึกข้อมูลสำเร็จ
  </div>
  <?php
}elseif ($vat=="0") { ?>
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
$sql.=" ORDER BY dill DESC LIMIT ".$s_page.",$e_page";
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

        $check_cancelS="SELECT * FROM canceler_service WHERE member_id=$row[id]";
        $check_cancel_rs=$conn->query($check_cancelS);
        $check_cancel_row=$check_cancel_rs->num_rows;
        if ($check_cancel_row>0) {
          echo '<tr style="color:red;">';
        }else{
          echo '<tr>';
        }
?>
      <th class="text-center">
      <a href="p_bill.php?user=<?= $row['user'] ?>" target="_BLANK">
      <button type="button" class="btn btn-dark btn-sm" name="button">
        <i class="fa fa-print"></i>
      </button> </a></th>
      <td class="text-left" ><div title="<?= $row['name'] ?>"><?= mb_strimwidth($row['name'],0,30,'..','UTF-8');?></td>
      
      <td><?= $row['amper'] ?></td>
      <td><?= $row['main_user'] ?></td>
      <td><?= $row['phone'] ?></td>
      <td><div title="<?= $row['tel_contact'] ?>"><?= mb_strimwidth($row['tel_contact'],0,12,'..','UTF-8');?></td>
      <td class="text-center" style="width:auto"><?= $tax_exp ?></td>
      <td class="text-center"><?= billamout($row['service_charge'], $row['bill_cycle'])?> </td>
      <td class="text-center"><?= $bill ?></td>
      <td class="text-center"><?= $dill ?></td>
      <td class="text-center">
        <button class="btn btn-info btn-sm" type="button" name="button" data-toggle="modal" data-target="#addbill<?= $row['user'] ?>">
          <i class="fas fa-clock"></i>
        </button>
      </td>
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
                <?php 
                  if($row['bill']){
                    $bill = $row['bill'];
                  }else{
                    $bill = $now;
                  }
                ?>
                <input type="text"  class="form-control testdate5" name="billDate" readonly value="<?= DateDMY($bill)?>">
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
    //บันทึกบิล
    if (isset($_POST['save']))
    {
      $check=$_POST['check'];
      $billDate=$_POST['billDate'];

      // เก็บค่าวันที่ที่เป็น พศ
      $newBill=$billDate;
      // แปลงวันที่จาก พศ เป็น คศ เพื่อนำไปใช้ฟังชั่น
      $billDate=YearEn($newBill);
      $dillNext=$_POST['dillDate'];
      if ($dillNext=="1") {
         "<br />".$newDill = date("d-m-Y", strtotime("+1 month", strtotime($billDate)));
      }elseif ($dillNext=="3") {
         "<br />".$newDill = date("d-m-Y", strtotime("+3 month", strtotime($billDate)));
      }elseif ($dillNext=="6") {
         "<br />".$newDill = date("d-m-Y", strtotime("+6 month", strtotime($billDate)));
      }elseif ($dillNext=="12"){
         "<br />".$newDill = date("d-m-Y", strtotime("+12 month", strtotime($billDate)));
      }
      $dm1=date("d-m",  strtotime($newDill));
      $yy1=(date("Y",  strtotime($newDill))+543);
      $newDill="$dm1-$yy1";
      //
      $dm2=date("d-m",  strtotime($billDate));
      $yy2=(date("Y",  strtotime($billDate))+543);
      $billDate="$dm2-$yy2";

      $yy3=(date("Y")+543);
      $timenow = date("d-m-$yy3 H:i:s");

      // ค่าบริการ
      $service_charge = isset($_POST['service_charge']) ? $_POST['service_charge'] : '';
      $vat = isset($_POST['vat']) ? $_POST['vat'] : '';

          $post_bill=DateYMD($newBill);
          $post_dill=DateYMD($newDill);

        $check="UPDATE member SET
        bill='$post_bill',
        dill='$post_dill',
        stamp_bill=NOW(),
        service_charge='$service_charge',
        bill_cycle='$dillNext',
        bill_manage='$_SESSION[login_true]',
        vat='$vat'
         WHERE user='$check'";
      $rs_check=$conn->query($check);
      if ($rs_check) {
        print "<meta http-equiv=refresh content=0;URL=?p=bill&update=1&selectDate=$_POST[selectDate]&keyword=$_POST[keyword]>";
      }else {
        print "<meta http-equiv=refresh content=0;URL=?p=bill&update=0&selectDate=$_POST[selectDate]&keyword=$_POST[keyword]>";
      }
    }
}else { ?>
  <!-- // ไม่มีรายการ -->
<tr>
  <td colspan="10">
    <div class="alert alert-danger text-center" role="alert">
     <p>ไม่มีรายการของวันที่
     <?php
     echo " ( ";
     if ($selectDate) {
       echo (isset($_POST['selectDate']))?$_POST['selectDate']:"";
     }else{
       echo $after7Day;
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
  // echo $query_str;
  echo '<nav>
      <ul class="pagination justify-content-center">
        <li class="page-item">
        <a class="page-link" href="?p=bill'.$query_str.$mark_char.'page=1"> First</a>
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