<!DOCTYPE html>
<?php include('config.php') ?>
<html>

<head>
  <title></title>
</head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.min.js">
<style type="text/css">
  body {
    /* background-image: url("img/bg/jack-b-736921-unsplash.jpg"); */
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 1920px 1080px;
  }

  .bg_head {
    background-color: #664F47;
    color: #FFFFFF;
    opacity: 0.8;
  }

  .menu_cs {
    font-weight: bold;
    /* color: #FFFFFF; */
  }

  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    /* text-align: center; */
  }
</style>

<body>

  <?php

  // เรียกใช้ตาราง Province_code ในฐานข้อมูล เพื่อดึง
  $sql_province = "SELECT * FROM province_code";
  $result_province = $conn->query($sql_province);

  // เรียกใช้ตาราง Province_code ในฐานข้อมูล เพื่อดึง
  $sql_member = "SELECT * FROM member WHERE user='$_GET[user]'";
  $result_member = $conn->query($sql_member);
  $row = $result_member->fetch_array();

  if ($row['email'] == "s1.gpsgreenbox.com") {
    $connect_sv = $conn1;
  } elseif ($row['email'] == "s2.gpsgreenbox.com") {
    $connect_sv = $conn2;
  } elseif ($row['email'] == "s3.gpsgreenbox.com") {
    $connect_sv = $conn3;
  } elseif ($row['email'] == "s4.gpsgreenbox.com") {
    $connect_sv = $conn4;
  } elseif ($row['email'] == "s5.gpsgreenbox.com") {
    $connect_sv = $conn5;
  }

  $sql_select = "SELECT * FROM devices WHERE uniqueid='$row[zipcode]' Or dlt = '$row[zipcode]'";
  $result_select = $connect_sv->query($sql_select);
  $row_select = $result_select->fetch_array();

  // if($row_select['uniqueid'] == $row['zipcode'])

  // echo $row_select['id'];
  ?>

  <div class="container" style="padding-top:50px">
    <div class="card">
      <div class="card-header text-center bg_head">
        <h4>ส่งข้อมูล Realtime</h4>
      </div>
      <form action="" method="Post" accept-charset="utf-8">
        <div class="card-body">
          <div class="card-header text-right">
            <!-- Server  -->
            <div class="form-group row">
              <label for="server" class="col-sm-4 col-form-label menu_cs">Server</label>
              <div class="col-sm-8">
                <select name="server" class="form-control" readonly>
                  <option value="1" <?php if ($row['email'] == "s1.gpsgreenbox.com") {
                                      echo "selected";
                                    } ?>>Server 1</option>
                  <option value="2" <?php if ($row['email'] == "s2.gpsgreenbox.com") {
                                      echo "selected";
                                    } ?>>Server 2</option>
                  <option value="3" <?php if ($row['email'] == "s3.gpsgreenbox.com") {
                                      echo "selected";
                                    } ?>>Server 3</option>
                  <option value="4" <?php if ($row['email'] == "s4.gpsgreenbox.com") {
                                      echo "selected";
                                    } ?>>Server 4</option>
                  <option value="5" <?php if ($row['email'] == "s5.gpsgreenbox.com") {
                                      echo "selected";
                                    } ?>>Server 5</option>
                </select>
              </div>
            </div>

            <!-- Protocol -->
            <div class="form-group row">
              <label for="protocol" class="col-sm-4 col-form-label menu_cs">GPS รุ่น</label>
              <div class="col-sm-8">
                <input class="form-control" readonly type="text" name="protocol" value="<?= $row['gpsmodel1'] ?>">
              </div>
            </div>

            <!-- IMEI -->
            <div class="form-group row">
              <label for="imei" class="col-sm-4 col-form-label menu_cs">IMEI</label>
              <div class="col-sm-8">
                <input class="form-control" readonly type="text" name="imei" value="<?= $row['zipcode'] ?>">
              </div>
            </div>
          </div>

          <div class="card-header text-right">
            <!-- ทะเบียน -->
            <div class="form-group row ">
              <label for="number" class="col-sm-4 col-form-label menu_cs">ทะเบียน</label>
              <div class="col-sm-8">
                <input class="form-control" readonly type="text" name="number" value="<?= $row['amper'] ?>">
              </div>
            </div>

            <!-- ยี่ห้อรถ -->
            <div class="form-group row">
              <label for="brand" class="col-sm-4 col-form-label menu_cs">ยี้ห้อรถ</label>
              <div class="col-sm-8">
                <input class="form-control" readonly type="text" name="number" value="<?= $row['address'] ?>">
              </div>
            </div>

            <!-- ตัวถังรถ -->
            <div class="form-group row">
              <label for="chassis" class="col-sm-4 col-form-label menu_cs">เลขตัวถังรถ</label>
              <div class="col-sm-8">
                <input class="form-control" readonly type="text" name="chassis" value="<?= $row['user'] ?>">
              </div>
            </div>

            <!-- จังหวัดที่จดทะเบียน -->
            <div class="form-group row">
              <label for="province" class="col-sm-4 col-form-label menu_cs">จังหวัดที่จดทะเบียน</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" readonly name="" value="<?= $row['province2'] ?>">
              </div>
            </div>

            <!-- *** ชนิดการจดทะเบียน -->
            <div class="form-group row">
              <label for="register_type" class="col-sm-4 col-form-label menu_cs">ชนิดการจดทะเบียน</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" readonly name="" value="<?= $row['register_type'] ?>">
              </div>
            </div>

            <!-- *** ชื่อผู้ประกอบการขนส่ง/เจ้าของรถ -->
            <div class="form-group row">
              <label for="regis_name" class="col-sm-4 col-form-label menu_cs">ชื่อผู้ประกอบการขนส่ง/เจ้าของรถ</label>
              <div class="col-sm-8">
                <input class="form-control" readonly type="text" name="regis_name" value="<?= $row['name'] ?>">
              </div>
            </div>

          </div>
          <div class="offset-4" style="margin-top: 20px ">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" id="customcheckbox1" name="dlt" value="1" class="custom-control-input" <?php if ($row_select['connect'] == "1") {
                                                                                                              echo "checked";
                                                                                                            } ?>>
              <label class="custom-control-label" for="customcheckbox1">ส่งข้อมูลขนส่ง
                <img src="img/connect/dlt.jpg" width="30px" alt="">
              </label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" id="customcheckbox2" name="post" value="1" class="custom-control-input" <?php if ($row_select['connect_post'] == "1") {
                                                                                                                echo "checked";
                                                                                                              } ?>>
              <label class="custom-control-label" for="customcheckbox2">ส่งข้อมูลไปรษณีย์
                <img src="img/connect/post.jpg" width="30px" alt="">
              </label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" id="customcheckbox3" name="acc" value="1" class="custom-control-input" <?php if ($row_select['connect_acc'] == "1") {
                                                                                                              echo "checked";
                                                                                                            } ?>>
              <label class="custom-control-label" for="customcheckbox3">ส่งข้อมูลปูนซีเมนต์ไทย
                <img src="img/connect/scc.jpg" width="30px" alt="">
              </label>
            </div>
          </div>
        </div>
    </div>
    <div class="card-footer bg_head">
      <div class="row">
        <div class="col-sm-4 offset-sm-4  text-center ">
          <button class="btn btn-success" name="ok" type="submit">บันทึก</button>
          <button class="btn btn-danger">ยกเลิก</button>
        </div>

      </div>
    </div>
    </form>
  </div>
  </div>
</body>

<?php if ($row['gpsmodel1'] == "T333") {
  $modelInput = "1";
} elseif ($row['gpsmodel1'] == "T1") {
  $modelInput = "2";
} elseif ($row['gpsmodel1'] == "AW GPS 3G") {
  $modelInput = "3";
} elseif ($row['gpsmodel1'] == "VT900") {
  $modelInput = "4";
} elseif ($row['gpsmodel1'] == "VT900(A)") {
  $modelInput = "4";
} elseif ($row['gpsmodel1'] == "VT900(U)") {
  $modelInput = "4";
} elseif ($row['gpsmodel1'] == "VT900(Box)") {
  $modelInput = "4";
} elseif ($row['gpsmodel1'] == "VT900(Box)(U)") {
  $modelInput = "4";
} elseif ($row['gpsmodel1'] == "VT900(Box)(A)") {
  $modelInput = "4";
} elseif ($row['gpsmodel1'] == "GT06E") {
  $modelInput = "5";
} elseif ($row['gpsmodel1'] == "GT06E(Box)") {
  $modelInput = "5";
} elseif ($row['gpsmodel1'] == "Fm11") {
  $modelInput = "6";
} elseif ($row['gpsmodel1'] == "TK103") {
  $modelInput = "7";
}
?>

<?php

$connect_dlt = isset($_POST['dlt']) ? $_POST['dlt'] : '0';
$connect_post = isset($_POST['post']) ? $_POST['post'] : '0';
$connect_acc = isset($_POST['acc']) ? $_POST['acc'] : '0';

if (isset($_POST['ok'])) {

  $sql_up = "UPDATE `devices` SET ";

  // เช็คการเชื่อมต่อ ขนส่ง
  if ($connect_dlt == "1") {
    $sql_up .= "`connect`='1',";
  } else {
    $sql_up .= "`connect`='0',";
  }
  // เช็คการเชื่อมต่อ ปณ
  if ($connect_post == "1") {
    $sql_up .= "`connect_post`='1',";
  } else {
    $sql_up .= "`connect_post`='0',";
  }
  // เช็คการเชื่อมต่อ ปูน
  if ($connect_acc == "1") {
    $sql_up .= "`connect_acc`='1',";
  } else {
    $sql_up .= "`connect_acc`='0',";
  }

  $sql_up .= "`type`='$modelInput'";
  $sql_up .= " WHERE uniqueid='$row[zipcode]'";
  // echo "$sql_up";
  $result_up = $connect_sv->query($sql_up);
  if ($result_up) {
    echo '<script>
        swal({
          title: "Success!",
          text: "บันทึกการส่ง Realtime สำเร็จ",
          icon: "success"
        }).then(function() {
          window.location = "?p=sendreal&user=' . $_GET['user'] . '";
        });
      </script>';
    // print "<meta http-equiv=refresh content=0; URL=send_realtime.php?user=$_GET[user]>";
  } else {
    echo '<script>
        swal({
          title: "Fail!",
          text: "การบันทึกผิดพลาด กรุณาแจ้งเจ้าหน้าที่",
          icon: "success"
        }).then(function() {
          window.location = "?p=sendreal&user=' . $_GET['user'] . '";
        });
      </script>';
  }
} //if หลัก

?>
<script src="js/jquery-3.2.1.slim.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/popper.min.js" type="text/javascript" charset="utf-8"></script>

</html>