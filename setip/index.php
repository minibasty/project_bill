<!DOCTYPE html>
<?php 
    // session_start();
  //   if (isset($_SESSION['login_true'])=="") {
  //   echo "<meta http-equiv=refresh content=0;URL=../login.php>";
  // }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style media="screen">
      body{
        background-color: #d7d7d7;
      }
      .card-body{
          margin-top: 10px;
          background-color: white;
      }
    </style>
    <title>:: SET IP ::</title>
  </head>
  <body>
    <div class="container">
    <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <h4>ระบบ SET IP / ตั้งค่าเครื่อง</h4>
            </div>
            <div class="form-group col-md-6 text-right">
              <!-- <a href="../index.php"><button class="btn btn-warning btn-sm" type="button"> <span class="fas fa-backward"></span> กลับหน้ารายการ</button></a> -->
            </div>
          </div>
      </div>
      <?php 
        if ($_SESSION['login_status']=="admin") {
      ?>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-sm-12">
              <h5>จัดการ IP</h5>
            </div>
            <div class="form-group col-sm-6">
              <a href="?p=setiplist"><button class="btn btn-block btn-warning" type="button" name="button" value="vt900">รายการ ip</button></a>
            </div>
            <div class="form-group col-sm-6">
              <a href="?p=setipadd"><button class="btn btn-block btn-warning" type="button" name="button" value="">เพิ่ม IP</button></a>
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col-sm-12">
            <h5>จัดการคำสั่ง</h5>
          </div>
          <div class="form-group col-sm-6">
            <a href="?p=setcommand&model=vt900"><button class="btn btn-block btn-primary" type="button" name="button" value="vt900">VT900</button></a>
          </div>
          <div class="form-group col-sm-6">
            <a href="?p=setcommand&model=vt900a"><button class="btn btn-block btn-primary" type="button" name="button" value="vt900a">VT900(A)</button></a>
          </div>
          <div class="form-group col-sm-6">
            <a href="?p=setcommand&model=vt900u"><button class="btn btn-block btn-primary" type="button" name="button" value="vt900u">VT900(U)</button></a>
          </div>
          <div class="form-group col-sm-6">
            <a href="?p=setcommand&model=gt06"><button class="btn btn-block btn-primary" type="button" name="button" value="gt06">GT06E</button></a>
          </div>
        </div>
      </div>
      <?php 
                }
      ?>
      <div class="card-body">
        <h5>ส่งคำสั่ง</h5>
        <div class="form-row">
          <div class="form-group col-sm-6">
            <a href="?p=setvt900"><button class="btn btn-block btn-info" type="button" name="button" value="vt900">VT900</button></a>
          </div>
          <div class="form-group col-sm-6">
            <a href="?p=setvt900a"><button class="btn btn-block btn-info" type="button" name="button" value="vt900">VT900(A)</button></a>
          </div>
          <div class="form-group col-sm-6">
            <a href="?p=setvt900u"><button class="btn btn-block btn-info" type="button" name="button" value="vt900">VT900(U)</button></a>
          </div>
          <div class="form-group col-sm-6">
            <a href="?p=setgt06"><button class="btn btn-block btn-info" type="button" name="button" value="vt900">GT06E</button></a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
