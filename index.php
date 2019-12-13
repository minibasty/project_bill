<?php

include("config.php");
ob_start(); 
session_start();
if (isset($_SESSION['login_true']) == "") {
  echo "<meta http-equiv=refresh content=0;URL=login.php>";
} else {
  require('all_function.php');
  date_default_timezone_set("Asia/Bangkok");
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GREENBOX BILL</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor\select2\css\select2.css">

    <!-- font  -->
    <link href="https://fonts.googleapis.com/css?family=Prompt|Sarabun&display=swap" rel="stylesheet">

    <style type="text/css">
      body {
        background-color: #d7d7d7;
        font-family: 'Sarabun', Arial, "Times New Roman" !important;
        /* font-family: 'Sarabun', Arial, "Times New Roman"; */
        font-size: 16px;
      }

      .wrapper {
        /* background-color: green; */
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        text-align: center;
      }

      .list-group {
        font-size: 14px;
      }

      a>.fas {
        color: green;
      }

      i {
        margin: 0;
        padding: 0;
      }
    </style>


    <script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8" async defer></script>

    <!-- Bootstrap core JavaScript -->

    <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="vendor/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="vendor\datetimepicker\jquery.datetimepicker.full.js" charset="utf-8"></script>
    <script src="js/fontawesome-pro.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->

  </head>

  <body>
    <?php
      $status = isset($_SESSION['login_status']) ? $_SESSION['login_status'] : '';
      ?>
    <div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"><?= "สถานะ :: " . $status ?></div>
        <div class="list-group list-group-flush">
          <?php if ($status == "admin") { ?>
            <a href="?p=main_admin" class="list-group-item list-group-item-action bg-light px-5"><i class="fal fa-cat-space"></i> รายการลูกค้า</a>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-0 text-muted">
              เพิ่มข้อมูล</h6>
            <a href="?p=add_member" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-plus"></i> เพิ่มข้อมูล #1</a>
            <a href="?p=add_member2" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-plus"></i> เพิ่มข้อมูล #2</a>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-0 text-muted">
              ระบบจัดการ</h6>
            <a href="?p=main_admin" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-file-word"></i> รายการลูกค้า</a>
            <a href="?p=bill" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-file-word"></i> จัดการบิล</a>
            <a href="?p=sim" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-sim-card"></i> จัดการซิม</a>
            <a href="?p=report" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-file-alt"></i> พิมพ์รายงาน</a>
            <a href="?p=barcode" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-barcode"></i> พิมพ์ Barcode</a>
            <a href="../pdf/main.php" target="_BLANK" class="list-group-item list-group-item-action bg-light px-5">
              <i class="fas fa-upload"></i> Upload PDF</a>
            <a href="?p=setip" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-satellite-dish"></i> Set ip</a>
            <a href="?p=promotion" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-images"></i> จัดการ Promotions</a>
            <a href="sms/sms.htm" target="_BLANK" class="list-group-item list-group-item-action bg-light px-5">
              <i class="fas fa-sms"></i> Send SMS</a>
            <a href="../gps-shop/" target="_BLANK" class="list-group-item list-group-item-action bg-light px-5">
              <i class="fas fa-cart-plus"></i> GPS Shop</a>
            <a href="?p=invoice_main" target="" class="list-group-item list-group-item-action bg-light px-5">
              <i class="fas fa-cart-plus"></i> Invoice</a>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-0 text-muted">
              Masterfiles</h6>
            <a href="?p=masterdlt" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-file-word"></i> Masterfile ขนส่ง</a>
            <a href="?p=masterpost" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-sim-card"></i> Masterfile ปณ. </a>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3  mb-0 text-muted">
              รายงานสรุป</h6>
            <a href="?p=conclude_setup" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-chart-bar"></i> รายงานติดตั้ง</a>
            <a href="?p=report_model" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-chart-bar"></i> รายงานเครื่องที่ใช้</a>
            <a href="?p=off_list" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-chart-bar"></i> รายงานแจ้งรถ Offline</a>
            <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-0 text-muted"></h6>
        <a href="#" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-file-word"> Masterfile ขนส่ง</a>
        <a href="#" class="list-group-item list-group-item-action bg-light px-5"> <i class="fas fa-sim-card"> Masterfile ปณ. </a> -->
          <?php } ?>
          <?php if ($status == "tech") { ?>
            <a href="?p=main_tech" class="list-group-item list-group-item-action bg-light px-5"><i class="fal fa-cat-space"></i> หน้าแรก (รายการลูกค้า)</a>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-0 text-muted"> เมนู
            </h6>
            <a href="?p=main_tech" class="list-group-item list-group-item-action bg-light px-5"><i class="fal fa-cat-space"></i> รายการลูกค้า</a>
            <a href="?p=add_member_tech" class="list-group-item list-group-item-action bg-light px-5"> <i class="fad fa-plus"></i> เพิ่มข้อมูล</a>
            <a href="?p=setip" class="list-group-item list-group-item-action bg-light px-5"> <i class="fad fa-chart-area"></i> Set ip</a>
          <?php } ?>
        </div>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <div class="col">
            <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>
          </div>
          <div class="col text-right">
            <a href="logout.php"><button class="btn btn-danger mt-auto" id="menu-toggle" type="button"><i class="fas fa-sign-out-alt"></i> Logout</button></a>
          </div>
        </nav>

        <!-- content -->
        <div class="container-fluid">
          <?php
            // error_reporting(~E_NOTICE);
            $page = isset($_GET['p']) ? $_GET['p'] : '';
            switch ($page) {
                // member Mange
              case 'edit':
                require_once('edit.php');
                break;
              case 'detail':
                require_once('detail.php');
                break;
              case 'canceler':
                require_once('canceler.php');
                break;
              case 'canceler_service':
                require_once('canceler_service.php');
                break;

              case 'main_admin':
                require_once('member_detail.php');
                break;
              case 'main_tech':
                require_once('member_detail_tech.php');
                break;
              case 'add_member':
                require_once('add_member.php');
                break;
              case 'add_member2':
                require_once('add_member2.php');
                break;
              case 'add_member_tech':
                require_once('add_member_tech.php');
                break;
              case 'bill':
                require_once('bill.php');
                break;
              case 'bill':
                require_once('bill.php');
                break;
              case 'sim':
                require_once('sim.php');
                break;
              case 'report':
                require_once('report/report.php');
                break;
              case 'barcode':
                require_once('barcode_form.php');
                break;


                // report
              case 'reportSetup':
                require('report/report_setup.php');
                break;
              case 'reportCancel':
                require_once('report/report_cancel.php');
                break;

                // invoice
              case 'invoice_main':
                require_once('invoice/invoice.php');
                break;
              case 'invoice_add':
                require_once('invoice/invoice_add.php');
                break;

                // offline report
              case 'off_list':
                require_once('report_offline/offline_report_list.php');
                break;
              case 'off_form':
                require_once('report_offline/offline_report_form.php');
                break;

                //report Conclude
              case 'conclude_setup':
                require_once('report_conclude/conclude_setup.php');
                break;
              case 'old_data':
                require_once('report_conclude/old_data.php');
                break;

                //report Model
              case 'report_model':
                require_once('report_model/index.php');
                break;

                // send masterfile
              case 'sendmaster':
                require_once('send_masterfile.php');
                break;
                //send realtime
              case 'sendreal':
                require_once('send_realtime.php');
                break;

                // -------------setip-----------------
              case 'setip':
                require_once('setip/index.php');
                break;
              case 'setipadd':
                require_once('setip/set_ipadd.php');
                break;
              case 'setiplist':
                require_once('setip/set_iplist.php');
                break;
              case 'setipedit':
                require_once('setip/set_ipedit.php');
                break;
              case 'setcommand':
                require_once('setip/set_command.php');
                break;
              case 'setvt900':
                require_once('setip/vt900/set_vt900.php');
                break;
              case 'setvt900a':
                require_once('setip/vt900a/set_vt900a.php');
                break;
              case 'setvt900u':
                require_once('setip/vt900u/set_vt900u.php');
                break;
              case 'setgt06':
                require_once('setip/gt06/set_gt06.php');
                break;

              case 'promotion':
                require_once('promotion/index.php');
                break;
              case 'promotionadd':
                require_once('promotion/promo_add.php');
                break;
              case 'promotionedit':
                require_once('promotion/promo_edit.php');
                break;
                // Masterfile 
              case 'masterdlt':
                require_once('masterfiles/masterfile_getlist_dlt.php');
                break;
              case 'masterpost':
                require_once('masterfiles/masterfile_getlist_post.php');
                break;

              case 'action_addMember':
                require_once('action_addMember.php');
                break;
              case 'action_addMember_tech':
                require_once('action_addMember_tech.php');
                break;
              default:
              if ($status == "admin") {
                include('member_detail.php') ;
              }elseif($status == "admin"){
                include('member_detail_tech.php') ;
              }
            break;
            }
            ?>
        </div>
        <!-- <div class="container-fluid"> -->
      </div>
      <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->


    <!-- Menu Toggle Script -->
    <script>
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>


  </body>

  </html>
<?php } ?>