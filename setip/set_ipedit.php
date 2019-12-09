<!DOCTYPE html>
<?php 

    // require'../config.php';

?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>:: Edit IP ::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script> -->
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
        $showip="SELECT * FROM setip WHERE set_id='$_GET[ip]'";
        $showip_q=$conn->query($showip);
        $showip_r=$showip_q->fetch_assoc();
    ?>
    <div class="container">
      <form action="" method="post">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col">
                    <h5>แก้ไข IP :: <?= $showip_r['set_name'] ?></h5>
                </div>
                <div class="form-group col text-right">
                    <a href="set_iplist.php"><button class="btn btn-warning btn-sm" type="button"><span class="fas fa-backward"></span> กลับ</button></a>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="ipname">ชื่อ Server</label>
                </div>
                <div class="form-group col-sm-8">
                    <input class="form-control col-12" type="text" name="ipname" id="ipname" value="<?= $showip_r['set_name'] ?>"> 
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="ipvt900">IP VT900</label>
                </div>
                <div class="form-group col-sm-8">
                    <input class="form-control col-12" type="text" name="ipvt900" id="ipvt900" value="<?= $showip_r['set_msg_vt900'] ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="ipvt900a">IP VT900a</label>
                </div>
                <div class="form-group col-sm-8">
                    <input class="form-control col-12" type="text" name="ipvt900a" id="ipvt900a" value="<?= $showip_r['set_msg_vt900a'] ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="ipvt900u">IP VT900u</label>
                </div>
                <div class="form-group col-sm-8">
                    <input class="form-control col-12" type="text" name="ipvt900u" id="ipvt900u" value="<?= $showip_r['set_msg_vt900u'] ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="ipgt06e">IP GT06E</label>
                </div>
                <div class="form-group col-sm-8">
                    <input class="form-control col-12" type="text" name="ipgt06e" id="ipgt06e" value="<?= $showip_r['set_msg_gt06'] ?>">
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-sm-12 text-center">
                    <button class="btn btn-success" name="save"> <span class="fas fa-save "></span> บันทึก</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
<?php
    if (isset($_POST['save']))
    {
        $update_ip="UPDATE setip SET set_name='$_POST[ipname]', set_msg_vt900='$_POST[ipvt900]', set_msg_vt900a='$_POST[ipvt900a]', set_msg_vt900u='$_POST[ipvt900u]', set_msg_gt06='$_POST[ipgt06e]' WHERE set_id='$_GET[ip]'";
        $update_ip_q=$conn->query($update_ip);
        if ($update_ip_q) {
           echo "<script> alert('แก้ไข IP :: ".$_POST['ipname']." สำเร็จ ')</script>";
           echo "<meta http-equiv=refresh content=0;URL=?p=setiplist>";
        }else{
            echo $update_ip;
            echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ')</script>";
        }
    }
?>
</html>
<!-- <script> -->
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
