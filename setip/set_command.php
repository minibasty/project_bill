<!DOCTYPE html>
<?php
  // require'../config.php';
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

    input[type='checkbox'] {
      display:block;
      margin: 0 auto;
      margin-bottom: 10px;
      -webkit-appearance: button;
      border:none;
      /* background: url(http://www.pixelslip.be/img/check.png) no-repeat 0 0 transparent; */
      background-color: #ccc;
      width: 45px;
      height: 20px;
      border-radius: 3px;
      box-shadow: inset 0 1px 4px rgba(0,0,0,.2);
      cursor: pointer;
      position: relative;
      transition: background-color 1s;
    }
    input[type='checkbox'].error{
       background-color: #c63d3d;
    }
    input[type='checkbox']:after{
      content: "";
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      width: 45%;
      height: 80%;
      background-color: #fdfdfd;
      margin: 4%;
      border-radius: 3px;
      box-shadow: 0 1px 2px rgba(0,0,0,.2);

      background: rgb(255,255,255);
    background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(243,243,243,1) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(243,243,243,1)));
    background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 100%);
    background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 100%);
    background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 100%);
    background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f3f3f3',GradientType=0 );

     transition: .5s all;
    }

    input[type='checkbox']:checked{
      background-color: #79d122;
    }

    input[type='checkbox']:checked:after {
      left: 45%;
    }
    </style>
    <title>:: SET IP ::</title>
  </head>
  <body>
    <?php
    $sql_command="SELECT * FROM setcommand WHERE setcom_model = '$_GET[model]'";
    $sql_command_query=$conn->query($sql_command);

    $sql_ip="SELECT * FROM setip";
    $sql_ip_query=$conn->query($sql_ip);
     ?>
    <div class="container">
      <form class="" action="" method="post">

      <div class="card-body">
        <h5>แก้ไขคำสั่ง <?= $_GET['model'] ?></h5>
        <hr>
        <div class="form-row">
          <div class="col-sm-6">
            <h6>คำสั่ง SET IP</h6>
          </div>
          <div class="col-sm-2 offset-sm-4 text-right">
           <a href="?p=setipadd"><button type="button" class="btn btn-primary btn-sm btn-block">เพิ่ม IP</button></a>
          </div>
        </div>
        <?php 
          $i2=0;
         while($sql_ip_row=$sql_ip_query->fetch_assoc()){
        ?>
          <div class="form-row">
            <div class="form-group col-sm-3">
            <input class="form-control" type="text" name="ip_name[]" value="<?= $sql_ip_row['set_name'] ?>">
            </div>
            <div class="form-group col-sm-7">
              <input class="form-control" type="text" name="ip[]" value="<?= $sql_ip_row['set_id'] ?>" hidden>
              <input class="form-control" type="text" name="ip_msg[]" value="<?= $sql_ip_row['set_msg_'.$_GET['model']] ?>">
            </div>
          </div>
        <?php
        $i2++;
         }
        ?>
        <hr>
        <h6>คำสั่ง SETTING</h6>
        <?php
        $i=0;
        while ($sql_command_row=$sql_command_query->fetch_assoc()) {
        ?>
        <div class="form-row">
          <div class="form-group col-sm-3">
            <input class="form-control" type="text" name="com_name[]" value="<?= $sql_command_row['setcom_name'] ?>">
          </div>
          <div class="form-group col-sm-5">
            <input class="form-control" type="text" name="id[]" value="<?= $sql_command_row['setcom_id'] ?>" hidden>
            <input class="form-control" type="text" name="msg[]" value="<?= $sql_command_row['setcom_msg'] ?>">
          </div>
          <div class="form-group col-sm-2">
            <input class="form-control" type="number" name="com_que[]" value="<?= $sql_command_row['setcom_que'] ?>">
          </div>
          <div class="form-group col-sm-2 label-check">
            <input class="error" type="checkbox" name="check[<?= $i ?>]" value="1" <?php if($sql_command_row['setcom_auto']=="1"){ echo "checked"; } ?>>
          </div>
        </div>

      <?php
      $i++;
      }  //while ($sql_command_row=$sql_command_query->fetch_assoc()) {
      ?>
      <hr>
      <div class="form-row">
        <div class="form-group col-md-4">
        <a href="?p=setip"><button class="btn btn-warning" type="button" name="save"> < กลับ</button></a>  
        </div>
        <div class="form-gourp text-center col-md-4">
          <button class="btn btn-success" type="submit" name="save">บันทึก</button>
        </div>
      </div>
      </div>
    </div>

  </form>
  </body>
</html>
<?php
  if (isset($_POST['save'])) {

    //update Command
    for ($i=0; $i < count($_POST['id']) ; $i++) {
      $id=$_POST['id'][$i];
      
      $check=isset($_POST["check"][$i]) ? $_POST["check"][$i]:'0';
      $name=isset($_POST["com_name"][$i]) ? $_POST["com_name"][$i]:'';
      $que=isset($_POST["com_que"][$i]) ? $_POST["com_que"][$i]:'';
      $msg=isset($_POST["msg"][$i]) ? $_POST["msg"][$i]:'';

      // echo "id = ".$id;
      if($check == "1")
        {
          $update_comm="UPDATE setcommand SET setcom_name= '$name',setcom_que='$que', setcom_msg = '$msg', setcom_auto='1' WHERE setcom_id='$id'";
          // echo "Auto Update".$id."=". $msg."<br>";
        }elseif($check == "0"){
          $update_comm="UPDATE setcommand SET setcom_name= '$name',setcom_que='$que', setcom_msg = '$msg', setcom_auto='0' WHERE setcom_id='$id'";
          // echo "non-Auto Update".$id ."=". $msg."<br>";
        }
        // echo $update_comm;
        $update_comm_query=$conn->query($update_comm);
    }

    //Update IP
    for ($i=0; $i < count($_POST['ip']); $i++) { 
      $ipId=$_POST['ip'][$i];
      $ip_msg=$_POST['ip_msg'][$i];
      $ip_name=$_POST['ip_name'][$i];
      $update_ip="UPDATE setip SET set_name = '$ip_name' ,";   
      if ($_GET['model']=="vt900") {
        $update_ip.="set_msg_vt900='$ip_msg'";
      }elseif ($_GET['model']=="vt900a") {
        $update_ip.="set_msg_vt900a='$ip_msg'";
      }elseif ($_GET['model']=="vt900u") {
        $update_ip.="set_msg_vt900u='$ip_msg'";
      }elseif ($_GET['model']=="gt06") {
        $update_ip.="set_msg_gt06='$ip_msg'";
      }
      $update_ip.= "WHERE set_id='$ipId'";
      
      $update_ip_query=$conn->query($update_ip);
    }
    if ($update_ip_query) {
        if ($update_comm_query) {
           echo "<script> alert('บันทึกข้อมูลสำเร็จ')</script>";
           echo "<meta http-equiv=refresh content=0;URL=?p=setcommand&model=".$_GET['model'].">";
          }
    }
  }
 ?>
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
