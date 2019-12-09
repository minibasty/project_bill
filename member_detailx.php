<?php
require_once("config.php");
require_once("pagination_function.php");
session_start();
if (isset($_SESSION['login_true']) == "") {
  echo "<meta http-equiv=refresh content=0;URL=login.php>";
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <style type="text/css">
    html {
        font-family: tahoma, Arial, "Times New Roman";
        font-size: 14px;
    }

    body {
        font-family: tahoma, Arial, "Times New Roman";
        font-size: 14px;
    }

    .margin_top_5 {
        margin-top: 5px;
    }
    </style>
</head>

<body>
    <?php
  if (isset($_POST['postServer'])) {
    echo "มาข้า";
  }
  ?>
    <br>
    <br>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-success">
                <div class="row">
                    <div class="col-sm-4 offset-sm-4 text-center">
                        <h3 class="text-white">รายการลูกค้า</h3>
                    </div>
                    <div class="col-sm-4 text-right text-white">

                        <form class="" action="" method="post">
                            <strong>
                                สถานะ
                                <?php
                echo $_SESSION['login_status'];
                ?>
                            </strong>
                            <button type="button" name="logout" class="btn btn-danger btn-sm"
                                onClick="this.form.action='logout.php'; submit()">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">


                <form name="form1" method="get" action="">
                    <br>
                    <div class="form-group row">
                        <label for="keyword" class="col-sm-4 col-form-label text-right">
                        </label>
                        <div class="form-group">
                            <a href="add_member.php" class="btn btn-primary"><i class="fas fa-plus"></i> เพิ่ม</a>
                            <a href="add_member2.php" class="btn btn-warning"><i class="fas fa-plus"></i> เพิ่ม 2</a>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="keyword" id="keyword"
                                placeholder="พิมพ์ ชื่อ IMEI ทะเบียนรถ หรือคัดซี เพื่อค้นหา"
                                value="<?= (isset($_GET['keyword'])) ? $_GET['keyword'] : "" ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="btn_search" id="btn_search"> <i
                                    class="fas fa-search"></i> ค้นหา</button>
                            <a href="member_detail.php" class="btn btn-danger"> <i class="fas fa-times"></i> ล้างค่า</a>
                        </div>
                    </div>
                    <div class="row-clearfix">
                        <div class="form-group text-center">
                            <a href="bill.php" class="btn btn-info"> <i class="fas fa-dollar-sign"></i> ปริ้นบิล</a>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="text-center bg-success text-white">
                                <th style="width:12%"><input type="button" name="" value="ล็อกอินตาจบ"
                                        onclick="frmlogin()"></th>
                                <th style="width:30%">ชื่อผู้ประกอบการ</th>
                                <th style="width:10%">IMEI</th>
                                <th style="width:5%">ทะเบียนรถ</th>
                                <th style="width:10%">เลขคัทซี</th>
                                <th style="width:10%">วันที่ติดตั้ง</th>
                                <th style="width:10%">เพิ่มเติม</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
              $num = 0;
              $sql = "SELECT * FROM member WHERE 1";

              //////////////////// MORE QUERY
              // เงื่อนไขสำหรับ radi
              $keyword = isset($_GET['keyword']);
              if (isset($_GET['myradio']) && $_GET['myradio'] != "") {
                // ต่อคำสั่ง sql
                $sql .= " AND province_name LIKE '%" . trim($_GET['myradio']) . "%' ";
              }

              // เงื่อนไขสำหรับ input text
              if (isset($_GET['keyword']) && $_GET['keyword'] != "") {
                // ต่อคำสั่ง sql
                $sql .= " AND zipcode LIKE '%" . trim($_GET['keyword']) . "%' ";
                $sql .= " OR user LIKE '%" . trim($_GET['keyword']) . "%'";
                $sql .= " OR zipcode LIKE '%" . trim($_GET['keyword']) . "%' ";
                $sql .= " OR name LIKE '%" . trim($_GET['keyword']) . "%' ";
                $sql .= " OR amper LIKE '%" . trim($_GET['keyword']) . "%' ";
              }

              // เงื่อนไขสำหรับ select
              if (isset($_GET['myselect']) && $_GET['myselect'] != "") {
                // ต่อคำสั่ง sql
                $sql .= " AND province_name LIKE '" . trim($_GET['myselect']) . "%' ";
              }

              // เงื่อนไขสำหรับ checkbox
              if ((isset($_GET['mycheckbox1']) && $_GET['mycheckbox1'] != "")
                || (isset($_GET['mycheckbox2']) && $_GET['mycheckbox2'] != "")
              ) {
                // ต่อคำสั่ง sql
                if ($_GET['mycheckbox1'] != "" && $_GET['mycheckbox2'] != "") {
                  $sql .= "
         AND (province_name LIKE '%" . trim($_GET['mycheckbox1']) . "'
         OR province_name LIKE '%" . trim($_GET['mycheckbox2']) . "' )
         ";
                } elseif ($_GET['mycheckbox1'] != "") {
                  $sql .= " AND province_name LIKE '%" . trim($_GET['mycheckbox1']) . "' ";
                } elseif ($_GET['mycheckbox2'] != "") {
                  $sql .= " AND province_name LIKE '%" . trim($_GET['mycheckbox2']) . "' ";
                } else { }
              }
              //////////////////// MORE QUERY
              $result = mysqli_query($conn, $sql);
              $total = mysqli_num_rows($result); ?>
                            <!-- แสดงจำนวนทั้งหมด -->
                            <div class="alert alert-warning" role="alert">
                                <?php
                if ($keyword) {
                  echo "ค้นหา ( "; ?>
                                <font color="red">
                                    <b><?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : ""; ?></b></font>
                                <?php
                  echo " )";
                }
                ?>

                                จำนวนทั้งหมด
                                <font color=red><b><?= $total ?></b></font>
                                รายการ
                            </div>

                            <?php
              $e_page = 10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า
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
              $sql .= " ORDER BY id DESC LIMIT " . $s_page . ",$e_page";
              $result = mysqli_query($conn, $sql);
              if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                while ($row = $result->fetch_array()) { // วนลูปแสดงรายการ
                  $num++;
                  ?>
                            <tr>

                                <!--////////////// button -->
                                <th class="text-center">
                                    <!-- ปุ่มแก้ไขข้อมูล -->
                                    <a href="test3.php?user=<?= $row['user'] ?>">
                                        <button type="button" id="add" name="add" class="btn btn-warning btn-sm">
                                            <i class="fa fa-upload"></i>
                                        </button>
                                    </a>
                                    <a href="edit.php?user=<?= $row['user'] ?>">
                                        <button type="button" id="edit" name="edit" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="detail.php?user=<?= $row['user'] ?>">
                                        <!-- ปุ่มปริ้นเอกสาร -->
                                        <button type="button" id="print" name="print" class="btn btn-info btn-sm">
                                            <i class="fa fa-print"></i>
                                        </button>
                                    </a>
                                    <!-- ปุ่มลบ -->
                                    <!-- <a href="member_detail.php?del=<?php //echo $row['user'] 
                                                              ?>"> -->
                                    <button type="submit" id="del" name="del" value="<?= $row['user'] ?>"
                                        class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบ')">
                                        <i class="fa fa-trash"></i></button>
                                    <!-- </a> -->
                                </th>

                                <td class="text-left"><?= $row['name'] ?></td>
                                <td scope="row"><?= $row['zipcode'] ?></td>
                                <td><?= $row['amper'] ?></td>
                                <td><?= $row['user'] ?></td>
                                <td><?= $row['signup'] ?></td>
                                <td class="text-center"> <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#viewMember<?= $row['user'] ?>" data-id=>
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="viewMember<?= $row['user'] ?>" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-muted">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">รายละเอียด
                                                <?= $row['user'] ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="font1">เลขที่หนังสือ
                                                <?= $row['year'] . '/' . $row['age'] . '-' . $row['member_id'] ?></p>
                                            <p><b>หมายเลขเครื่อง :</b> <?= $row['zipcode'] ?> </p>
                                            <p><b>วันที่ติดตั้ง :</b> <?= $row['signup'] ?></p>
                                            <p><b>ชื่อผู้ประกอบการขนส่ง/เจ้าของรถ :</b> <?= $row['name'] ?></p>
                                            <p><b>ยี่ห้อรถ :</b> <?= $row['amper'] ?></p>
                                            <p><b>เลขทะเบียนรถ :</b> <?= $row['address'] ?></p>
                                            <p><b>หมายเลขคัสซี :</b> <?= $row['user'] ?></p>
                                            <p><b>ที่อยู่ :</b> <?= $row['contrack'] ?></p>
                                            <p><b>เบอร์ติดต่อลูกค้า :</b> <?= $row['tel_contact'] ?></p>
                                            <p><b>เบอร์ Sim ในเครื่อง :</b> <?= $row['simno'] ?></p>
                                            <p><b>User ลูกค้า :</b> <?= $row['phone'] ?></p>
                                            <p><b>ดิวจ่ายเงินรอบต่อไป :</b> <?= $row['dill'] ?></p>
                                            <p><b>คอมเม้น :</b> <?= $row['comment'] ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                }
              }
              ?>
                        </tbody>
                    </table>

                    <?php
          page_navi($total, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page, $_GET);
          ?>
                </div>
                <!-- //////////////////////////////////////////////LOGIN TO SERVER  -->
                <form name="formlogin" id="formlogin" class="navbar-form navbar-right" role="search"
                    action="http://27.254.81.34/login.php" target="_blank" onsubmit="rememberMe()" method="post">
                    <div class="form-group hidden">
                        <input hidden type="text" class="form-control" id="username" name="username"
                            placeholder="Username" required="" value="admin" autofocus>
                    </div>
                    <div class="form-group hidden">
                        <input hidden type="password" class="form-control" id="password" name="password"
                            placeholder="Password" required="" value="1234">
                    </div>
                    <label hidden>
                        <input type="checkbox" checked id="remember" name="remember" value="yes" /> จำรหัสผ่าน</label>
                </form>
                <!-- //////////////////////////////////////////////LOGIN TO SERVER END  -->
                <!-- ปิด card body -->
            </div>
            <!-- ปิด card -->
        </div>
        <script>
        function frmlogin() {
            document.formlogin.submit();
        }

        function frmPostServer() {
            document.postServerfrm.submit();
        }

        function rememberMe() {
            if ($('#remember:checked').length > 0) {
                setCookie('username', $('#username').val(), 30);
                setCookie('password', $('#password').val(), 30);
            }
        }
        </script>
        <!-- ปิด container -->
    </div>

    <?php
  if (isset($_POST['del'])) {
    $del = "DELETE FROM `member` WHERE user='$_POST[del]'";
    $result_del = mysqli_query($conn, $del);
    if ($result_del) {
      echo "<script> alert('ลบข้อมูลสำเร็จ')</script>";
      print "<meta http-equiv=refresh content=0; URL=member_detail.php>";
      mysqli_close($result_del);
    }
  }
  ?>

</body>

</html>

<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#viewMember').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        modal.find('#emp_id').val(id);
    });
});
</script>
<script type="text/javascript">
$(function() {

});
</script>