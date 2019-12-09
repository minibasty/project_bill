<!DOCTYPE html>
<?php
    // require'../config.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>:: IP LIST ::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
    body{
        background-color: #d7d7d7;
      }
      .card-body{
          margin-top: 10px;
          background-color: white;
      }
    </style>
</head>
<body>
    <?php
        $showip="SELECT * FROM setip";
        $showip_q=$conn->query($showip);
    ?>
    <div class="container-fluid">
        <div class="card-body">
            <form action="" method="POST">
            <div class="form-row">
                <div class="form-group col">
                   <h5>รายชื่อ Server</h5> 
                </div>
                <div class="form-group text-right col">
                    <a href="?p=setip"><button class="btn btn-warning btn-sm" type="button"> <span class="fas fa-backward"></span> กลับ</button></a>
                </div>
            </div>
            <div class="form-group table-responsive">
                <table class="table table-sm table-striped table-bordered table-hover" sstyle="width:100%">
                <thead class="text-center">
                    <tr>
                        <th>รหัส</th>
                        <th>ชื่อ Ip / Server</th>
                        <th>คำสั่ง VT900</th>
                        <th>คำสั่ง VT900a</th>
                        <th>คำสั่ง VT900u</th>
                        <th>คำสั่ง GT60E</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($showip_row=$showip_q->fetch_assoc()) {
                ?>
                    <tr>
                        <td class="text-center"><?= $showip_row['set_id'] ?></td>
                        <td class="text-center"><?= $showip_row['set_name'] ?></td>
                        <td><?= $showip_row['set_msg_vt900'] ?></td>
                        <td><?= $showip_row['set_msg_vt900a'] ?></td>
                        <td><?= $showip_row['set_msg_vt900u'] ?></td>
                        <td><?= $showip_row['set_msg_gt06'] ?></td>
                        <td class="text-center">
                        <a href="?p=setipedit&ip=<?= $showip_row['set_id'] ?>"><button class="btn btn-info btn-sm" type="button"><span class="far fa-edit"></span> แก้ไข</button></a>
                        <button class="btn btn-danger btn-sm" type="submit" name="del" onclick="return confirm('ยืนยันการลบ')" value="<?= $showip_row['set_id'] ?>"><span class="far fa-trash-alt"></span> ลบ</button>
                        </td>
                    </tr>

                <?php 
                }
                ?>
                </tbody>
                </table>
            </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    if (isset($_POST['del'])) {
        $delip="DELETE FROM setip WHERE set_id = '$_POST[del]'";
        $delip_q=$conn->query($delip);
        if ($delip_q) {
            echo "<script> alert('ลบข้อมูลสำเร็จ')</script>";
            print "<meta http-equiv=refresh content=0; URL=?p=setiplist>";
            mysqli_close($delip_q);
        }
    }
?>
<!-- <script> -->
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
