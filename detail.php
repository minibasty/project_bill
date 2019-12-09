<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- icon -->
    <!-- <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css"> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>:: Detail ::</title>
  </head>
  <body>
    <?php
    //เชื่อมต่อฐานข้อมูล
      include'config.php';
      // error_reporting(~E_NOTICE);
    //Query ข้อมูลลูกค้า
      $select="SELECT * FROM member WHERE user ='$_GET[user]' ";
      $result=mysqli_query($conn,$select);
      $row=mysqli_fetch_assoc($result);
     ?>
    <div class="container-fluid">
      <br />
        <!-- menu -->
            <div class="form-row">
              <!-- left content -->
              <div class="form-group col-md-3 col-sm-12"> 
              <div class="card">
                <div class="card-header">
                  <i class="far fa-user"></i> <?= $row['name'] ?>
                </div>
                <div class="card-body">
                  <?php
                  $login_status=$_SESSION['login_status'];
                  if ($login_status!=="tech") { ?>
                    <ul class="list-group">
                      <!-- <li class="list-group-item"><a href="masterfile.php?user=<?= $_GET[user] ?>">สร้าง Masterfile</a></li> -->
                      <li class="list-group-item"><a href="?p=sendmaster&user=<?= $_GET['user'] ?>">สร้าง Masterfile</a></li>
                      <li class="list-group-item"><a href="?p=sendreal&user=<?= $_GET['user'] ?>">ส่ง Realtime</a></li>

                    </ul>
                      <?php
                    }
                      ?>
                </div>
              </div>
              </div>

              <!-- right content          -->
              <div class="form-group col-md-9 col-sm-12">
              <div class="card">
            <div class="card-header">
              <h4>พิมพ์เอกสาร</</h4>
            </div>
            <br />
            <div class="col-md-4 offset-md-4">
              <div class="card text-center">
                <button class="btn btn-success btn-sm" type="button" name="button">
                <h6>AW-GPS-3G</h6>
                </button>
              </div>
            </div>
            <div class="container">
              <br />
              <div class="row">
                <?php if ($row['gpsmodel1']=="VT900" OR $row['gpsmodel1']=="VT900(A)" OR $row['gpsmodel1']=="VT900(U)" OR $row['gpsmodel1']=="VT900(Box)" OR $row['gpsmodel1']=="VT900(Box)(A)" OR $row['gpsmodel1']=="VT900(Box)(U)" ): ?>
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>VT900T</h4>
                    </div>
                    <div class="card-body">
                      <a href="p_vt900t_1.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">VT900T(ธรรมดา)</button></a><br/>
                      <a href="p_vt900t_2.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">VT900T(มีวันหมดอายุ)</button></a><br/>
                      <a href="p_vt900t_3.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">VT900T(IMEI แบบยาว)</button></a><br />
                      <a href="p_vt900t_4.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">VT900T(IMEI แบบยาว + มีวันหมดอายุ)</button></a>
                      <a href="p_vt900t_5.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">VT900T(IMEI แบบยาว + สำเร็จรูป)</button></a>
                      <a href="p_vt900t_6.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">VT900T(IMEI แบบยาว + มีวันหมดอายุ + สำเร็จรูป)</button></a>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <?php if ($row['gpsmodel1']=="GT06E" OR $row['gpsmodel1']=="GT06E(Box)"): ?>
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>GT06E</h4>
                    </div>
                    <div class="card-body">
                      <h6>
                      <a href="p_gt06e_1.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">GT06E(ธรรมดา)</button></a><br />
                      <a href="p_gt06e_2.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">GT06E(มีวันหมดอายุ)</button></a><br />
                      <a href="p_gt06e_3.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">GT06E(IMEI แบบยาว)</button></a><br />
                      <a href="p_gt06e_4.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">GT06E(IMEI แบบยาว + มีวันหมดอาย)</button></a><br />
                      <a href="p_gt06e_5.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">GT06E(IMEI แบบยาว + สำเร็จรูป)</button></a><br />
                      <a href="p_gt06e_6.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">GT06E(IMEI แบบยาว + มีวันหมดอายุ + สำเร็จรูป)</button></a>

                      </h6>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
              </div>
              <br />
              <div class="row">
                <?php if ($row['gpsmodel1']=="T1"): ?>
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>T1</h4>
                    </div>
                    <div class="card-body">
                      <h6>
                      <a href="p_t1_1.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">T1(ธรรมดา)</button></a><br />
                      <a href="p_t1_2.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">T1(มีวันหมดอายุ)</button></a><br />
                      <a href="p_t1_3.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">T1(IMEI แบบยาว)</button></a><br />
                      <a href="p_t1_4.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">T1(IMEI แบบยาว + มีวันหมดอายุ)</button></a><br />
                      <a href="p_t1_5.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">T1(IMEI แบบยาว + สำเร็จรูป)</button></a><br />
                      <a href="p_t1_6.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">T1(IMEI แบบยาว + มีวันหมดอายุ + สำเร็จรูป)</button></a>

                      </h6>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <?php if ($row['gpsmodel1']=="T333"): ?>

                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>T333</h4>
                    </div>
                    <div class="card-body">
                      <h6>
                      <a href="p_t333_1.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">T333(ธรรมดา)</button></a><br />
                      <a href="p_t333_2.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">T333(มีวันหมดอายุ)</button></a><br />
                      <a href="p_t333_3.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">T333(IMEI แบบยาว)</button></a><br />
                      <a href="p_t333_4.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">T333(IMEI แบบยาว + มีวันหมดอายุ)</button></a><br />
                      <a href="p_t333_5.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">T333(IMEI แบบยาว + สำเร็จรูป)</button></a><br />
                      <a href="p_t333_6.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-info form-control" type="button" name="button">T333(IMEI แบบยาว + มีวันหมดอายุ + สำเร็จรูป)</button></a>

                      </h6>
                    </div>
                  </div>
                </div>

                <?php endif; ?>
                <div class="card-body">
                <div class="col-md-12 ">
              <div class="card text-center">
              <a href="p_end_service.php?user=<?= $_GET['user']?>" target="_BLANK"><button class="btn btn-success form-control" type="button" name="button">ใบจบงานซ่อม</button></a></div>
            </div>
                </div>
                
              </div>
              <br />
            </div>
          </div>
              </div>
            </div>
    </div>

  </body>
</html>
