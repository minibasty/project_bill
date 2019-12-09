<!DOCTYPE html>
<?php 

    // require'../config.php';

?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>:: ADD IP ::</title>
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
    <div class="container">
      <form action="" method="post">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col">
                    <h5>เพิ่ม IP</h5>
                </div>
                <div class="form-group col text-right">
                    <a href="?p=setip"><button class="btn btn-warning btn-sm" type="button"><span class="fas fa-backward"></span> กลับรายการ IP</button></a>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="ipname">ชื่อ Server</label>
                </div>
                <div class="form-group col-sm-8">
                    <input class="form-control col-12" type="text" name="ipname" id="ipname"> 
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="ipvt900">IP VT900</label>
                </div>
                <div class="form-group col-sm-8">
                    <input class="form-control col-12" type="text" name="ipvt900" id="ipvt900">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="ipvt900a">IP VT900a</label>
                </div>
                <div class="form-group col-sm-8">
                    <input class="form-control col-12" type="text" name="ipvt900a" id="ipvt900a">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="ipvt900u">IP VT900u</label>
                </div>
                <div class="form-group col-sm-8">
                    <input class="form-control col-12" type="text" name="ipvt900u" id="ipvt900u">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="ipgt06e">IP GT06E</label>
                </div>
                <div class="form-group col-sm-8">
                    <input class="form-control col-12" type="text" name="ipgt06e" id="ipgt06e">
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-sm-12 text-center">
                    <button class="btn btn-success" name="add">เพิ่ม</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
<?php
    if (isset($_POST['add']))
    {
        $insert_ip="INSERT INTO setip VALUES ('', '$_POST[ipname]', '$_POST[ipvt900]' , '$_POST[ipvt900a]', '$_POST[ipvt900u]', '$_POST[ipgt06e]','ip')";
        $insert_ip_q=$conn->query($insert_ip);
        if ($insert_ip_q) {
           echo "<script> alert('เพิ่ม IP :: ".$_POST['ipname']." สำเร็จ ')</script>";
           echo "<meta http-equiv=refresh content=0;URL=?p=setip>";
        }else{
            echo "<script> alert('เพิ่มข้อมูลไม่สำเร็จ')</script>";
        }
    }
?>
</html>
<!-- <script> -->
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
