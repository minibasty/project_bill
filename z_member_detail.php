<?php
  include("config.php");
  session_start();
    if (isset($_SESSION['login_true_admin'])=="") {
    echo "<meta http-equiv=refresh content=0;URL=login.php>";
  }
 ?>
<html lang="en" dir="ltr">
  <head>
    <title>:: Details ::</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" href="../logo.gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/r-2.1.0/se-1.2.0/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/datatable/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="vendor/datatable/css/responsive.bootstrap.min.css">

    <!-- icon -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

    <script type="text/javascript" src="vendor/datatable/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/responsive.bootstrap.min.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/datatables.min.js"></script>
    <script>
    $(document).ready(function() {
       var table = $('#example').DataTable({
          'ajax': '',
          'responsive': {
             'details': {
                'type': 'column',
                'target': 0
             }
          },
          'columnDefs': [
             {
                'data': null,
                'defaultContent': '',
                'className': 'control',
                'orderable': false,
                'targets': 0
             }
          ],
          'columns': [
             { 'data': null },
             { 'data': 0 },
             { 'data': 1 },
             { 'data': 2 },
             { 'data': 3 },
             { 'data': 4 },
             { 'data': 5 },
             { 'data': 6 },
             { 'data': 7 },
             { 'data': 8  },
             { 'data': 9 },
             { 'data': 10 },
             { 'data': 11 }
          ],
          'select': {
             'style': 'multi',
             'selector': 'td:not(.control)'
          },

       });
    });
    </script>

  </head>
  <?php
  error_reporting(~E_NOTICE);
  // คำสั่งดึงข้อมูลจาก Database
  $sql="SELECT * FROM member order by id desc";
  $result=$conn->query($sql);

   ?>
  <body>
    <?php
    echo $_SESSION["login_true_admin"]."  ".$_SESSION["login_status"];
     ?>
    <br/>
  <div class="container-fluid">
    <div class="card "style="width: 100%;">
        <div class="card-header bg-success text-white">
            <h2>รายการลูกค้า</h2>
        </div>
  			<div class="card-body">
<form method="post" enctype="multipart/form-data" action="">
 <p><button class="btn btn-info" Type="button" onClick="this.form.action='add_member.php'; submit()"> <I class="fas fa-car"></I> เพิ่มข้อมูลรถ</button><br></p>
  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
     <thead>
        <tr>
          <th></th>
           <th>เพิ่มเติม</th>
           <th>เลขที่เอกสาร</th>
           <th>ชื่อผู้ประกอบการ</th>
           <th>IMEI</th>
           <th>ทะเบียนรถ</th>
           <th>เลขคัทซี</th>
           <th>วันที่เพิ่มข้อมูล</th>
           <th class="none">เบอร์ ติดต่อลูกค้า :</th>
           <th class="none">เบอร์ Sim ในเครื่อง :</th>
           <th class="none">User ลูกค้า :</th>
           <th class="none">ดิวจ่ายเงินรอบต่อไป :</th>
           <th class="none">คอมเม้น :</th>
        </tr>
     </thead>
     <tbody>
       <?php
       while ($rs=$result->fetch_array()) {
        ?>
        <tr>
          <td></td>
            <td>
          <center>
            <input type="text" hidden name="user" value="<?= $rs['user'] ?>">
            <!-- ปุ่มแก้ไขข้อมูล -->
            <a href="edit.php?user=<?= $rs['user'] ?>">
            <button type="button" id="edit" name="edit" class="btn btn-success btn-sm">
              <i class="fa fa-edit"></i>
            </button>
            </a>
            <a href="detail.php?user=<?= $rs['user'] ?>">
            <!-- ปุ่มปริ้นเอกสาร -->
            <button type="button" id="print" name="print" class="btn btn-info btn-sm">
            <i class="fa fa-print"></i>
            </button>
            </a>
            <!-- ปุ่มลบ -->
            <a href="detail.php?user=<?= $rs['user'] ?>">
              <button type="submit" id="del" name="del" value="<?= $rs['user'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบ')"><i class="fa fa-trash"></i></button>
            </a>

          </center>
          </td>
          <td><?= $rs['age']."-". $rs['member_id'] ?></td>
          <td><?= $rs['name'] ?></td>
          <td><?= $rs['zipcode'] ?></td>
          <td><?= $rs['amper'] ?></td>
          <td><?= $rs['user'] ?></td>
          <td><?= $rs['signup'] ?></td>
          <td><?= $rs['contrack'] ?></td>
          <td><?= $rs['simno'] ?></td>
          <td><?= $rs['phone'] ?></td>
          <td><?= $rs['dill'] ?></td>
          <td><?= $rs['comment'] ?></td>
        </tr>
      <?php
    }
    ?>
     </tbody>
  </table>
  <button type="button" name="logout" class="btn btn-danger" onClick="this.form.action='logout.php'; submit()">Logout</button>
  </form>
  </div>
  </div>
  </div>
    </body>
</html>

<?php

  if (isset($_GET['del'])) {
    $del="DELETE FROM `member` WHERE user='$_POST[del]'";
    $result_del=mysqli_query($conn, $del);
    if ($result_del) {
      echo "<script> alert('ลบข้อมูลสำเร็จ')</script>";
      print "<meta http-equiv=refresh content=0;>";
    }
  }

 ?>
