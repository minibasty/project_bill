<html>
<?php
  // session_start();
  //   if (isset($_SESSION['login_true'])=="") {
  //   echo "<meta http-equiv=refresh content=0;URL=../../login.php>";
  // }
  // require '../../config.php';
 ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Setip</title>
    <style media="screen">
      .card-body{
        margin-top: 20px;
        background-color: #FFFFFF;
        -webkit-box-shadow: 0px 0px 30px -3px rgba(92,92,92,1);
        -moz-box-shadow: 0px 0px 30px -3px rgba(92,92,92,1);
        box-shadow: 0px 0px 30px -3px rgba(92,92,92,1);
      }
      #wait {
        position:absolute;
        left:50%;
        top:50%;
        color:navy;
        text-align:center;
        width:100px;
      }
      #loading {
    background: url('./img/loading/ajax-loader.gif') no-repeat center center;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 9999999;
}
    </style>
  </head>
  <body>
    <?php


    $select = "SELECT * FROM service WHERE service_id = '$_SESSION[login_id]'";
    $select_rs=$conn->query($select);
    $select_row=$select_rs->fetch_assoc();

    $select_ip="SELECT * FROM setip";
    $select_ip_rs=$conn->query($select_ip);
    $select_ip_rs_manual=$conn->query($select_ip);

    $getSimno = isset($_GET['number']) ? $_GET['number'] : '';
     ?>
     <div class="container">
      <!-- <form class="" action="" method="post"> -->
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col">
              <h4 >SetIP VT900</h4>
            </div>
            <div class="form-group col text-right">
              <a href="?p=setip"><button class="btn btn-warning btn-sm" type="button"> <span class="fas fa-backward"></span> กลับ</button></a>
            </div>
          </div>

          <div class="form-group">
            <label class="form-check-label" for="dest">
              เบอร์เครื่อง
            </label>
            <div class="form-inline">
              
              <input class="form-control col-8" id="dest" type="text" name="dest" value="<?= $getSimno ?>">
              <button id="ok" class="btn btn-primary " name="ok" onclick="checkDest()">ตกลง</button>
            </div>
          </div>
        </div>

        <div class="card-body" id="boxType" style="display:none;">
          <div class="form-group container">
            <label for="">เลือกรูปแบบการเซ็ตไอพี</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="exampleRadios" id="auto" onclick="checkType()" checked>
              <label class="form-check-label" for="auto">
                เซ็ตอัตโนมัติ
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="exampleRadios" id="manual" onclick="checkType()">
              <label class="form-check-label" for="manual">
                เซ็ตด้วยตัวเอง
              </label>
            </div>
            <div class="form-group">
            <h5>เบอร์ตอบกลับ</h5>
          </div>
          <div class="form-group">
          <div class="form-row">
              <input id="phone" class="form-control col-sm-6" type="text" name="phone" value="<?= $select_row['tel_sender'] ?>" <?php if($_SESSION['login_status']=="tech"){ echo "readonly"; } ?>>
              <input type="text" name="userService" id="userService" value="<?= $select_row['user'] ?>">
            </div>
          </div>
        </div>
        </div>

        <div class="card-body" id="ipauto" style="display:none">

          <div class="form-group">
            <div class="form-row">
              <input id="username" class="form-control col-sm-6" type="text" name="username" value="014959561" readonly hidden>
              <input id="password" class="form-control col-sm-6" type="text" name="password" value="66882000" readonly hidden>
              <input id="secret" class="form-control col-sm-6" type="text" name="secret" value="o2r5ttjt" readonly hidden>
              <input id="glist" class="form-control col-sm-6" type="text" name="glist" value="014959561" readonly hidden>
              <input id="lang" class="form-control col-sm-6" type="text" name="lang" value="eng" readonly hidden>
              <input id="musecre" class="form-control col-sm-6" type="text" name="musecre" value="0" readonly hidden>
              <input id="restcre" class="form-control col-sm-6" type="text" name="restcre" value="1219" readonly hidden>
            </div>
          </div>
          <div class="form-group">
            <h5>เลือก Server</h5>
            <small style="padding:0">ใช้เวลา 45 วินาทีโดยประมาณ</small>
          </div>
          <?php
          $i=0;
          while ($select_ip_row=$select_ip_rs->fetch_assoc()) {
          $i++;
          ?>
          <div class="row">
            <div class="form-group col-sm-12">
              <input type="text" name="" value="<?= $i ?>" hidden>
              <input id="svStr<?= $i ?>" type="text" name="" value="<?= $select_ip_row['set_msg_vt900'] ?>" hidden>
              <button id="sv<?= $i ?>" type="button" class="btn btn-success btn-block"  name="button" onclick="return confirm('ยืนยันการส่งคำสั่ง')? clickbtn(<?= $i ?>) :''"><?= $select_ip_row['set_name'] ?></button>
            </div>
          </div>
          <?php
          }  //while ($select_ip_row=$select_ip_rs->fetch_assoc()) {
          ?>
          <div class="form-row">
              <?php
              $select_command_auto="SELECT * FROM setcommand WHERE setcom_model='vt900' AND setcom_auto='1' ORDER BY setcom_que";
              $select_command_auto_rs=$conn->query($select_command_auto);
              $iAuto=0;
              while ($select_command_auto_row=$select_command_auto_rs->fetch_assoc()) {
              ?>
                <div class="form-group col-sm-12 col-md-6">
                <input id="commandAuto<?= $iAuto ?>" type="text" name="" value="<?= $select_command_auto_row['setcom_msg'] ?>" hidden>
                </div>

              <?php
              $iAuto++;
              } //  while ($select_command_row=$select_command_rs->fetch_assoc()) {
              ?>
              <input id="countCommandAuto" type="text" name="" value="<?= $iAuto ?>" hidden>
          </div>
        </div>




        <div id="ipmanual" style="display:none">
          <div class="card-body">
            <div class="form-row">
              <?php
                $i3 = 0;
                while ($select_ip_row_manual=$select_ip_rs_manual->fetch_assoc()) {
              ?>
                <div class="form-group col-sm-12 col-md-6">
                  <input id="ip<?= $i3 ?>" type="text" name="" value="<?= $select_ip_row_manual['set_msg_vt900'] ?>" hidden>
                  <button class="btn btn-info btn-block" onclick="return confirm('ยืนยันการส่งคำสั่ง')? btnManualIp(<?= $i3 ?>):''"><?= $select_ip_row_manual['set_name'] ?></button>
                </div>
              <?php
                $i3++;
                }  //while ($select_ip_row=$select_ip_rs->fetch_assoc()) {
              ?>
            </div>
            <hr>
            <div class="form-row">
              <?php
              $select_command="SELECT * FROM setcommand WHERE setcom_model='vt900' ORDER BY setcom_que";
              $select_command_rs=$conn->query($select_command);
              $ii=0;
              while ($select_command_row=$select_command_rs->fetch_assoc()) {

              ?>

                <div class="form-group col-sm-12 col-md-6">
                <input id="command<?= $ii ?>" type="text" name="" value="<?= $select_command_row['setcom_msg'] ?>" hidden>
                <button class="btn btn-primary btn-block" onclick="return confirm('ยืนยันการส่งคำสั่ง')? btnManualCom(<?= $ii ?>):''"><?= $select_command_row['setcom_name'] ?></button>
                </div>

              <?php
              $ii++;
              } //  while ($select_command_row=$select_command_rs->fetch_assoc()) {
              ?>
              <input id="countCommand" type="text" name="" value="<?= $ii ?>" hidden>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                <label for="btnChangeSn">ใส่ SN เก่า(ใช้เมื่อเปลี่ยนครื่องใหม่ เท่านั้น )</label>
                <div class="form-inline">
                  <input class="form-control col-sm-10" id="ChangeSn" type="text" name="ChangeSn" value="">
                  <button id="btnChangeSn" class="col-sm-2 btn btn-primary " name="ok" onclick="return confirm('ยืนยันการส่งคำสั่ง')? btnChangeSn():''">ตกลง</button>
                </div>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-sm-6">
                <label for="custom">คำสั่งอื่น ๆ</label>
                <div class="form-inline">
                  <input class="form-control col-sm-10" id="custom" type="text" name="custom" value="">
                  <button id="btnCustom" class="col-sm-2 btn btn-primary " name="btnCustom" onclick="return confirm('ยืนยันการส่งคำสั่ง')? btnCustom():''">ตกลง</button>
                </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <div id="loading" style="display:none"></div>

    <script type="text/javascript">
    var userService = document.getElementById("userService").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var secret = document.getElementById("secret").value;
    var phonsender = document.getElementById("phone").value;
    var glist = document.getElementById("glist").value;
    var dest = '';
    var lang = document.getElementById("lang").value;
    var musecre = document.getElementById("musecre").value;
    var restcre = document.getElementById("restcre").value;

    function alertShow() {
    alert("ส่งข้อมูลสำเร็จ!!");
    }

    function checkDest() {
      var dest = $("#dest").val();
      if (dest == '') {
        alert("กรุณากรอกเบอร์โทรก่อน");
        $("#user").focus();
      }else {
        var x = document.getElementById("boxType");
        if (x.style.display === "none") {
          document.getElementById('boxType').style.display = 'block';
          document.getElementById('ipauto').style.display = 'block';
        }
      }
    }

    function checkType(){
      if (document.getElementById('auto').checked) {
          document.getElementById('ipauto').style.display = 'block';
          document.getElementById('ipmanual').style.display = 'none';
      }
      if(document.getElementById('manual').checked){
        document.getElementById('ipmanual').style.display = 'block';
        document.getElementById('ipauto').style.display = 'none';
        // document.getElementById('ipmanual').style.display = 'block';
      }
    }
    </script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="setip/vt900/js/auto_vt900.js" charset="utf-8"></script>
<script src="setip/vt900/js/manual_vt900.js"></script>
  </body>
</html>
