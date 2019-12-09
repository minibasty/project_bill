<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
    </script>
    <script language="JavaScript">
        //พิมได้เฉพาะตัวเลข
        function chkNumber(ele) {
            var vchar = String.fromCharCode(event.keyCode);
            if ((vchar < '0' || vchar > '9')) return false;
            ele.onKeyPress = vchar;
        }
    </script>
</head>

<body>

    <?php
    date_default_timezone_set("Asia/Bangkok");
    $status = isset($_GET['status']) ? $_GET['status'] : '';
    require 'config.php';

    $sql = "SELECT
        `member`.`id`,
        `member`.`amper`,
        `member`.`province`,
        `member`.`zipcode`,
        `member`.`user`
    FROM
        `member` WHERE id='$_GET[c]'";

    $result = $conn->query($sql);
    $row = $result->fetch_array();


    ?>
    <?php


    if (isset($_POST['ok'])) {
        $now = date("Y-m-d H:i:s");
        $insertData = "INSERT INTO 
    report_offline(report_device,report_title,report_des,report_contact, report_stamp)
    values 
    ('$_GET[c]','$_POST[even]','$_POST[desc]', '$_POST[call]', '$now')";

        $resultData = $conn->query($insertData);

        if ($resultData) {
            // echo "<script> alert('ท่านได้ส่งข้อมูลสำเร็จแล้ว  ขอบคุณที่ให้ความร่วมมือค่ะ'); </script>";
            echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=?c=' . $_GET['c'] . '&status=ok">';
        }
    }
    ?>
    <form action="" method="post">
        <p>
            <div class="container-fluid">

                <div class="">
                    <div class="form-row">

                        <div class="card">
                            <div class="card-header bg-danger text-white">สอบถามสถานะรถ</div>

                            <div class="card-body">
                            <?php
                                    if ($status !== 'ok') {
                            ?>
                                <div class="form-group col-sm-12">
                                    <p>
                                        <div class="alert alert-danger" role="alert" style="color:red ; font-weight : bold">
                                            ** หากไม่ดำเนินการ อาจโดนค่าปรับจากขนส่ง !! **
                                        </div>
                                        <div class="alert alert-info role=" alert" style="">
                                            ทางบริษัทตรวจพบว่ารถคันดังกล่าว ออฟไลน์ หรือไม่มีการส่งข้อมูล GPS เข้ามาในระบบ<br>ทางบริษัทจึงต้องการทราบสถานะรถคันดังกล่าวและรายงานให้กรมขนส่งทราบ<br><b>กรุณาตอบตามความจริงเพื่อประโยชน์ของท่านเอง</b></div>
                                        <label>ทะเบียนรถ</label>
                                        <input type="email" class="form-control" placeholder="ทะเบียนรถ" value="<?= $row['amper'] ?>" readonly name="license">
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>จังหวัด</label>
                                    <input type="email" class="form-control" placeholder="จังหวัด" value="<?= $row['province'] ?>" readonly name="province">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>คัสซี</label>
                                    <input type="email" class="form-control" placeholder="คัสซี" value="<?= $row['user'] ?>" readonly name="chassis">
                                </div>

                            </div>
                            <div>
                                <div class="form-group col">
                                    <div class="radio">
                                        <label><input type="radio" name="even" value="1" checked> รถจอดไม่ทำงาน ใส่แบต</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="even" value="2"> รถจอดไม่ทำงาน หรือซ่อมถอดแบต</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="even" value="3"> รถใช้งานวิ่งปกติ</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="even" value="4"> อื่นๆ <small>(ใส่รายละเอียดเพิ่มเติมด่านล่าง)</small> </label>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">รายละเอียดเพิ่มเติม</div>
                                    <div class="form-group col-sm-12">
                                        <textarea class="form-control" rows="5" id="comment" name="desc"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12">
                                        <label>เบอร์โทรติดต่อ</label>
                                        <input type="tel" class="form-control" placeholder="" name="call" onkeypress="return chkNumber(this)" required>
                                        <small>ตัวอย่าง 0812345678</small>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success" id="ok" name="ok">ตกลง</button>
                                </div>

                                <p>
                            </div>
                            <?php }else{ ?>
                            <div class="form-group col-md-12 text-center">
                                <h4>** บันทึกข้อมูลเรียบร้อยแล้ว **</h4>
                                <p>ขอบคุณที่ให้ความร่วมมือค่ะ</p>
                            </div>
                                    <?php } ?>
                        </div>

                    </div>
                </div>
            </div>

    </form>

</body>

</html>
<script>
function close_window() {
    window.name='thisThing';
	window.open('','thisThing','');
    window.close();
}</script>