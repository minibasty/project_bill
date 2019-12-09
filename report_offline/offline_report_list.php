<?php
require_once "config.php";

// รันผ่าน index
require_once("pagination_function.php");
// session_start();
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Document</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
  <link rel="stylesheet" href="../vendor\datetimepicker\jquery.datetimepicker.css">
  <style type="text/css">
    html {
      font-family: tahoma, Arial, "Times New Roman";
      font-size: 14px;
    }

    body {
      background-color: #d7d7d7;
      font-family: tahoma, Arial, "Times New Roman";
      font-size: 14px;
    }

    .margin_top_5 {
      /* margin-top: 5px; */
    }

    .card-body {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      /* text-align: center; */
    }
  </style>
</head>

<body>
  <?php

  $sql = "SELECT
        `member`.`amper`,
        `member`.`province`,
        `member`.`user`,
        `member`.`zipcode`,
        `report_offline`.`report_title`,
        `title_type`.`title_name`,
        `report_offline`.`report_des`,
        `report_offline`.`report_contact`,
        `report_offline`.`report_stamp`
        FROM
        `title_type`
        INNER JOIN `report_offline` ON `report_offline`.`report_title` =
        `title_type`.`title_id`
        INNER JOIN `member` ON `report_offline`.`report_device` = `member`.`id`";

  $selectDate = isset($_POST['selectDate']) ? $_POST['selectDate'] : '';
  $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

  if ((isset($_GET['keyword']) && $_GET['keyword'] != "") or (isset($_GET['keyword']) && $_GET['keyword'] != "")) {

    if (isset($_GET['keyword'])) {
      $keyword = $_GET['keyword'];
    } else {
      $keyword = $_GET['keyword'];
    }

    // ต่อคำสั่ง sql
    $sql .= "  WHERE ";
    $sql .= " zipcode LIKE '%" . trim($keyword) . "%' ";
    $sql .= " OR user LIKE '%" . trim($keyword) . "%'";
    $sql .= " OR amper LIKE '%" . trim($keyword) . "%' ";
  }

  ?>
  <div class="container-fluid mt-4">
    <div class="card">
      <div class="card-body">
        <form name="form1" method="GET" action="?p=off_list" autocomplete="off">
          <input type="text" name="p" id="" value="off_list" hidden>
          <div class="col-sm-12">
            <h3 class="">แจ้งรถ Offline </h3>
          </div>
          <br>
          <div class="form-row">
            <div class="col-sm-3 offset-sm-4 form-inline">
              <input type="text" name="keyword" id="testdate5" class="form-control col" autocomplete="off" placeholder="ทะเบียน คัดซี imei" value="<?= $keyword ?>">
            </div>
            <div class="col-sm-3 form-inline">
              <button type="submit" class="btn btn-primary" name="btn_search" id="btn_search">ค้นหา</button>
              &nbsp;
              <a href="?p=off_list" class="btn btn-danger">ล้างค่า</a>
            </div>
          </div>
        </form>
        <hr>
        <div class="table-responsive">
          <table class="table table-sm table-bordered table-striped table-hover">
            <thead>
              <tr class="text-center bg-success text-white">
                <th>ทะเบียนรถ</th>
                <th>จังหวัด</th>
                <th>คัสซี</th>
                <th>หมายเหตุ</th>
                <th>รายละเอียกเพิ่มเติม</th>
                <th>เบอร์โทร</th>
                <th>เวลา</th>
              </tr>
            </thead>
            <tbody>

              <?php
              //////////////////// MORE QUERY
              // echo $sql;
              $result = mysqli_query($conn, $sql);
              $total = mysqli_num_rows($result); ?>
              <!-- แสดงจำนวนทั้งหมด -->
              <div class="alert alert-warning" role="alert">

                จำนวนทั้งหมด
                <font color=red><?= $total ?></font>
                รายการ
              </div>
              <div class="">

              </div>

              <?php
              $e_page = 20; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า
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
              $num = 0;
              $sql .= " ORDER BY report_id DESC LIMIT " . $s_page . ",$e_page";
              $result = mysqli_query($conn, $sql);
              if ($result && $result->num_rows > 0) { // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                while ($row = $result->fetch_array()) { // วนลูปแสดงรายการ
                  ?>
                  <tr class="text-center">
                  <td style="width=auto"><?= $row['amper'] ?></td>
                  <td style="width=auto"><?= $row['province'] ?></td>
                  <td style="width=auto"><?= $row['user'] ?></td>
                  <td style="width=auto"><?= $row['title_name'] ?></td>
                  <td style="width=10%;"><div title="<?= $row['report_des']  ?>"><?= mb_strimwidth($row['report_des'] ,0,50,'...','UTF-8');?></td>
                  <td style="width=auto"><?= $row['report_contact'] ?></td>
                  <td style="width=auto"><?= datetimeConvert($row['report_stamp']) ?></td>
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

  <!-- send SMS  -->
  <script>
    //ตั้งค่า Sim
    var username = '014959561';
    var password = '66882000';
    var secret = 'o2r5ttjt';
    var phonsender = document.getElementById("dest").value;;
    var glist = '014959561';
    var dest = document.getElementById("dest").value; //เบอร์ที่จะส่ง
    var msg = document.getElementById("msg").value;
    var lang = 'th';
    var musecre = '0';
    var restcre = '1219';

    function offlineSend() {
      var jsonObj = {
        "username": username,
        "password": password,
        "secret": secret,
        "sender": phonsender,
        "glist": glist,
        "dest": dest,
        "lang": lang,
        "msg": msg
      }
      console.log(jsonObj);
      $.ajax({
        type: "POST",
        url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
        data: jsonObj,
        success: function(data) {
          console.log(jsonObj);
        }
      });

    }
  </script>
</body>

</html>