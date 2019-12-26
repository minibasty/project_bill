<?php
require_once("config.php");
// require("all_function.php");
// require_once("pagination_function.php");

// session_start();
// <!-- pagination function  -->
function page_navi($total_item, $cur_page, $per_page = 10, $query_str = "", $min_page = 5)
{

  $total_page = ceil($total_item / $per_page);
  $cur_page = (isset($cur_page)) ? $cur_page : 1;
  $diff_page = NULL;
  if ($cur_page > $min_page) {
    $diff_page = $total_page - $cur_page;
  }
  $limit_page = $min_page;
  $f_num_page = ($cur_page <= $min_page) ? 1 : (floor($cur_page / $min_page) * $min_page) + 1;
  if ($diff_page > $min_page) {
    $limit_page = ($min_page + $f_num_page) - 1;
  } else {
    if (isset($diff_page)) {
      $limit_page = $total_page;
    } else {
      $limit_page = $min_page;
    }
  }
  $show_page = ($total_page <= $min_page) ? $total_page : $limit_page;
  $l_num_page = 1;
  $prev_page = $cur_page - 1;
  $next_page = $cur_page + 1;
  $temp_query_str = $query_str;
  $query_str = "?p=main_admin";
  if ($temp_query_str && is_array($temp_query_str) && count($temp_query_str) > 0) {
    array_pop($temp_query_str);
    $query_str = http_build_query($temp_query_str);
    if ($query_str != "") {
      $query_str = "?" . $query_str;
    }
  }
  $mark_char = ($query_str != "") ? "&" : "?";

  echo '<nav>
      <ul class="pagination justify-content-center">
        <li class="page-item">
        <a class="page-link" href="' . $query_str . $mark_char . 'page=1"> First</a>
        </li>
        ';
  echo '
        <li class="page-item ' . (($cur_page == 1) ? "disabled" : "") . '">
          <a class="page-link"  href="' . $query_str . $mark_char . 'page=' . $prev_page . '"> Previous</a>
        </li>
    ';
  for ($i = $f_num_page; $i <= $show_page; $i++) {
    echo '
        <li class="page-item ' . (($i == $cur_page) ? "active" : "") . '">
          <a class="page-link" href="' . $query_str . $mark_char . 'page=' . $i . '"> ' . $i . ' </a>
        </li>
    ';
  }
  echo '
        <li class="page-item ' . (($next_page > $total_page) ? "disabled" : "") . '">
            <a class="page-link"  href="' . $query_str . $mark_char . 'page=' . $next_page . '"> Next</a>
        </li>
    ';
  echo '
        <li class="page-item">
          <input type="number" class="form-control" min="1" max="' . $total_page . '"
                  style="width:80px;" onClick="this.select()" onchange="window.location=\'' . $query_str . $mark_char . 'page=\'+this.value"  value="' . $cur_page . '" />
        </li>
    ';
  echo '
        <li class="page-item">
            <a class="page-link"  href="' . $query_str . $mark_char . 'page=' . $total_page . '"> Last</a>
        </li>
      </ul>
    </nav>
    ';
}
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
  <style type="text/css">
    .table {
      font-size: 14px;
    }

    .btn-purple {
      background-color: #9a1fb9;
      color: #FFFFFF;
    }

    .btn-purple:hover {
      background-color: #6C006C;
      color: #FFFFFF;
    }

    .btn-orange {
      background-color: #EAAC17;
      color: #000000;
    }

    .btn-orange:hover {
      background-color: #B68613;
      color: #000000;
    }

    .card-body {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      /* text-align: center; */
    }
  </style>
</head>

<body>
  <div class="container-fluid mt-4 mb-4">
    <div class="card" style="">
      <div class="card-body">
        <form name="form1" method="GET" action="?p=main_admin">
          <input type="text" name="p" id="" value="main_admin" hidden>
          <div class="col-sm-12">
            <h3 class="">รายการลูกค้า</h3>
          </div>
          <br>
          <div class="form-row row">
            <div class="col-sm-3 offset-sm-4">
              <input type="text" class="form-control" name="keyword" id="keyword" placeholder="ชื่อ IMEI ทะเบียนรถ คัดซี userย่อย/หลัก เบอร์ซืม" value="<?= (isset($_GET['keyword'])) ? $_GET['keyword'] : "" ?>">
            </div>
            <div class="form-group col-md-2 col-sm">
              <button type="submit" class="btn btn-primary btn-block" name="btn_search" id="btn_search"> <i class="fas fa-search"></i> ค้นหา</button>
            </div>
            <div class="form-group col-md-2 col-sm">
              <a href="?p=main_admin" class="btn btn-danger btn-block"> <i class="fas fa-times text-white"></i> ล้างค่า</a>
            </div>
          </div>
        </form>
        <hr>
        <div class="table-responsive">
          <table class="table table-sm table-bordered table-striped table-hover ">
            <thead>
              <tr class="text-center bg-success text-white">
                <th style="width:10%"></th>
                <th style="width:auto">ชื่อผู้ประกอบการ</th>
                <th style="width:auto">IMEI</th>
                <th style="width:auto">ทะเบียน</th>
                <th style="width:auto">เลขคัทซี</th>
                <th style="width:auto">วันที่ติดตั้ง</th>
                <th style="width:5%">เบอร์ซิม</th>
                <th style="width:5%">User ย่อย</th>
                <th style="width:5%">User หลัก</th>
                <th>เบอร์ติดต่อ</th>
                <th style="width:auto">เพิ่มเติม</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $num = 0;
              $sql = "SELECT
`member`.*,
`canceler_service`.`id_cancelS`
FROM
`member`
LEFT JOIN `canceler_service` ON `canceler_service`.`member_id` = `member`.`id` ";

              //////////////////// MORE QUERY
              // เงื่อนไขสำหรับ radi
              $keyword = isset($_GET['keyword']);
              if (isset($_POST['myradio']) && $_POST['myradio'] != "") {
                // ต่อคำสั่ง sql
                $sql .= " AND province_name LIKE '%" . trim($_POST['myradio']) . "%' ";
              }

              // เงื่อนไขสำหรับ input text
              if (isset($_GET['keyword']) && $_GET['keyword'] != "") {
                // ต่อคำสั่ง sql
                $sql .= " WHERE zipcode LIKE '%" . trim($_GET['keyword']) . "%' ";
                $sql .= " OR user LIKE '%" . trim($_GET['keyword']) . "%'";
                $sql .= " OR zipcode LIKE '%" . trim($_GET['keyword']) . "%' ";
                $sql .= " OR name LIKE '%" . trim($_GET['keyword']) . "%' ";
                $sql .= " OR amper LIKE '%" . trim($_GET['keyword']) . "%' ";
                $sql .= " OR main_user LIKE '%" . trim($_GET['keyword']) . "%' ";
                $sql .= " OR phone LIKE '%" . trim($_GET['keyword']) . "%' ";
                $sql .= " OR simno LIKE '%" . trim($_GET['keyword']) . "%' ";
                $sql .= " OR tel_contact LIKE '%" . trim($_GET['keyword']) . "%' ";
              }

              // เงื่อนไขสำหรับ select
              if (isset($_POST['myselect']) && $_POST['myselect'] != "") {
                // ต่อคำสั่ง sql
                $sql .= " AND province_name LIKE '" . trim($_POST['myselect']) . "%' ";
              }

              // เงื่อนไขสำหรับ checkbox
              if ((isset($_POST['mycheckbox1']) && $_POST['mycheckbox1'] != "")
                || (isset($_POST['mycheckbox2']) && $_POST['mycheckbox2'] != "")
              ) {
                // ต่อคำสั่ง sql
                if ($_POST['mycheckbox1'] != "" && $_POST['mycheckbox2'] != "") {
                  $sql .= "
         AND (province_name LIKE '%" . trim($_POST['mycheckbox1']) . "'
         OR province_name LIKE '%" . trim($_POST['mycheckbox2']) . "' )
         ";
                } elseif ($_POST['mycheckbox1'] != "") {
                  $sql .= " AND province_name LIKE '%" . trim($_POST['mycheckbox1']) . "' ";
                } elseif ($_POST['mycheckbox2'] != "") {
                  $sql .= " AND province_name LIKE '%" . trim($_POST['mycheckbox2']) . "' ";
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
                  <font color="red"><b><?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : ""; ?></b></font>
                <?php
                  echo " )";
                }
                ?>

                จำนวนทั้งหมด
                <font color=red><b><?= $total ?></b></font>
                รายการ
              </div>

              <?php
              $e_page = 10; // กำหนดจำนวนรายการที่แสดงในแต่ละหน้า
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
                  if (!empty($row['id_cancelS'])) {
                    echo '<tr class="text-center text-danger">';
                  } else {
                    echo '<tr class="text-center">';
                  }
                  ?>
                  <!--////////////// button -->
                  <td class="text-center">
                    <form action="" method="post">
                      <a href="?p=edit&user=<?= $row['user'] ?>" title="แก้ไข">
                        <button type="button" id="edit<?= $row['id'] ?>" name="edit" class="btn btn-success btn-sm">
                          <i class="fa fa-edit"></i>
                        </button>
                      </a>
                      <a href="?p=detail&user=<?= $row['user'] ?>" title="พิมพ์เอกสาร">
                        <!-- ปุ่มปริ้นเอกสาร -->
                        <button type="button" id="print<?= $row['id'] ?>" name="print" class="btn btn-info btn-sm">
                          <i class="fa fa-print"></i>
                        </button>
                      </a>
                      <!-- ปุ่มลบ -->
                      <button type="submit" id="del<?= $row['id'] ?>" name="del" value="<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบ')">
                        <i class="fa fa-trash" title="ลบ"></i></button>
                      <?= $row['cancel']; ?>
                    </form>
                  </td>
                  <td class="text-left">
                    <div title="<?= $row['name'] ?>"><?= mb_strimwidth($row['name'], 0, 30, '...', 'UTF-8'); ?></div>
                  </td>
                  <td scope="row"><?= $row['zipcode']; ?><font style="color: blue;"> (<?= $row['tech'] ?>)</td>
                
                  <td><?= $row['amper'] ?> </td>
                  <td class="text-left">
                    <div title="<?= $row['user'] ?>"><?= mb_strimwidth($row['user'], 0, 10, '...', 'UTF-8'); ?></div>
                  </td>
                  <td class="text-center"><?= DateDMY($row['signup']) ?> <font style="color: red; font-weight: bold;"> (<?= checkServer($row['email']) ?>)</font>
                  </td>
                  <td><?= $row['simno'] ?></td>
                  <td class="text-left">
                    <div title="<?= $row['phone'] ?>"><?= mb_strimwidth($row['phone'], 0, 10, '...', 'UTF-8'); ?></div>
                  </td>
                  <td class="text-left">
                    <div title="<?= $row['main_user'] ?>"><?= mb_strimwidth($row['main_user'], 0, 10, '...', 'UTF-8'); ?></div>
                  </td>
                  <td class="text-left">
                    <div title="<?= $row['tel_contact'] ?>"><?= mb_strimwidth($row['tel_contact'], 0, 13, '...', 'UTF-8'); ?></div>
                  </td>

                  <td class="text-center">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewMember<?= $row['user'] ?>" data-id=>
                      <i class="fas fa-eye"></i>
                    </button>
                    <a href="vendor/upload/?chassi=<?= $row['user'] ?>" target="_BLANK" title="">
                      <button type="button" class="btn btn-orange">
                        <i class="fas fa-camera"></i>
                      </button></a>
                  </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="viewMember<?= $row['user'] ?>" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header bg-muted">
                          <h5 class="modal-title" id="exampleModalCenterTitle">รายละเอียด <?= $row['user'] ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="card">
                            <div class="card-header">
                              <strong>ข้อมูลทั่วไป</strong>
                            </div>
                            <div class="card-body">
                              <p class="font1">เลขที่หนังสือ <?= $row['year'] . '/' . $row['age'] . '-' . $row['member_id'] ?></p>
                              <p><b>หมายเลขเครื่อง (IMEI):</b> <?= $row['zipcode'] ?> </p>
                              <p><b>วันที่ติดตั้ง :</b> <?= DateThai($row['signup']) ?></p>
                              <p><b>ชื่อผู้ประกอบการขนส่ง/เจ้าของรถ :</b> <?= $row['name'] ?></p>
                              <p><b>ยี่ห้อรถ :</b> <?= $row['amper'] ?></p>
                              <p><b>เลขทะเบียนรถ :</b> <?= $row['address'] ?></p>
                              <p><b>หมายเลขคัสซี :</b> <?= $row['user'] ?></p>
                              <p><b>รุ่นเครื่อง GPS จริง :</b> <?= $row['gpsmodel1'] ?></p>
                              <p><b>รุ่นเครื่อง เข้าขนส่ง :</b> <?= $row['gpsmodel1'] . "(" . $row['car_approve_id'] . ")" ?></p>
                              <p><b>ที่อยู่ :</b> <?= $row['contrack'] ?></p>
                              <p><b>เบอร์ติดต่อลูกค้า :</b> <?= $row['tel_contact'] ?></p>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header">
                              <strong>ข้อมูลซิม <i class="fas fa-sim-card"></i> </strong>
                            </div>
                            <div class="card-body">
                              <p><b>เบอร์ Sim ในเครื่อง :</b> <?= $row['simno'] ?></p>
                              <p><b>เงินในซิม :</b> <?= $row['sim_money'] ?></p>
                              <p><b>วันที่บันทึกล่าสุด</b> <?= $row['sim_stamp'] ?></p>
                              <p><b>ผู้บันทึกล่าสุด :</b> <?= $row['sim_manage'] ?></p>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header">
                              <strong>ข้อมูลบิล <i class="fas fa-dollar-sign"></i> </strong>
                            </div>
                            <div class="card-body">
                              <p><b>วันที่จ่ายรอบที่แล้ว :</b> <?= $row['bill'] ?></p>
                              <p><b>ดิวจ่ายเงินรอบต่อไป :</b> <?= $row['dill'] ?></p>
                              <p><b>ผู้บันทึกล่าสุด :</b> <?= $row['bill_manage'] ?></p>
                              <p><b>คอมเม้น :</b> <?= $row['comment'] ?></p>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header">
                              <strong>ข้อมูล User <i class="fas fa-users"></i> </strong>
                            </div>
                            <div class="card-body">
                              <p><b>User(ย่อย) :</b> <?= $row['phone'] ?></p>
                              <p><b>User(หลัก) :</b> <?= $row['main_user'] ?></p>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    $del = "DELETE FROM `member` WHERE id='$_POST[del]'";
    $result_del = mysqli_query($conn, $del);
    if ($result_del) {
      echo "<script> alert('ลบข้อมูลสำเร็จ')</script>";
      print "<meta http-equiv=refresh content=0; URL=member_detail.php>";
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