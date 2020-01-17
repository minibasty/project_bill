<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- select2 -->
    <!-- <link rel="stylesheet" href="vendor/select2/css/select2.min.css"> -->
    <!-- fontawesome all -->
    <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
    <!-- datetimepicker -->
    <link rel="stylesheet" href="vendor\datetimepicker\jquery.datetimepicker.css">

    <!-- js -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
    <!-- language -->
    <!-- calendar -->
    <link rel="stylesheet" href="vendor\datepicker_buddhist\css\ui-lightness\jquery-ui-1.8.10.custom.css">
    <script type="text/javascript" src="vendor\datepicker_buddhist\js\jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="vendor\datepicker_buddhist\js\jquery-ui-1.8.10.offset.datepicker.min.js">
    </script>


    <meta charset="utf-8">
    <title>:: EDIT ::</title>
    <script type="text/javascript">
        // ป้องกันไม่ให้ jQueryชนกัน
        jq14 = jQuery.noConflict();
        jq14(function($) {
            var d = new Date();
            var toDay = d.getDate() + '-' + (d.getMonth() + 1) + '-' + (d.getFullYear() + 543);

            // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)
            // console.log(toDay);
            $(".calander").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd-mm-yy',
                isBuddhist: true,
                defaultDate: toDay,
                dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
                monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม',
                    'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
                ],
                monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.',
                    'ต.ค.', 'พ.ย.', 'ธ.ค.'
                ]
            });
 
        });
    </script>


    <style media="screen">
        body {
            background-color: #d7d7d7;
        }

        a:visited,
        a:v {
            color: white;
        }

        a:hover {
            color: #107400;
        }

        .t-red {
            color: red;
            font-weight: bold;
        }

        .btn-purple {
            border-style: solid;
            border-width: medium;
            border-color: #AD0BE2;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            /* text-align: center; */
        }
    </style>
</head>

<body>
    <?php
    // include("all_function.php");
    // include("config.php");
    date_default_timezone_set("Asia/Bangkok");

    $sql = "SELECT * FROM member WHERE user='$_GET[user]'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
    if (isset($_POST['save'])) {

        $sql_pro = "SELECT * FROM province_code";
        $rs_pro = $conn->query($sql_pro);
        while ($r_pro = $rs_pro->fetch_array()) {
            if ($r_pro['code'] == $_POST['province2']) {
                $province = $r_pro['name'];
            }
        }

        $post_signup = DateYMD($_POST['datesetup']);
        $sim = trim($_POST['sim']);
        $zipcode = trim($_POST['zipcode']);
        $tech = trim($_POST['tech']);
        $tech_service = trim($_POST['tech_service']);
        $update = "UPDATE `member` SET
    `name`='$_POST[name]',
    `date`='$_POST[date]',
    `year`='$_POST[year]',
    `sex`='$_POST[sex]',
    `address`='$_POST[address]',
    `province`='$province',
    `amper`='$_POST[amper]',
    `zipcode`='$zipcode',
    `phone`='$_POST[phone]',
    `main_user`='$_POST[main_user]',
    `education`='$_POST[education]',
    `work`='$_POST[work]',
    `user`='$_POST[user]',
    `email`='$_POST[email]',
    `uid`='$_POST[uid]',
    `car_approve_id`='$_POST[car_approve_id]',
    `register_type`='$_POST[register_type]',
    `province2`='$_POST[province2]',
    `contrack`='$_POST[contrack]',
    `tel_contact`='$_POST[tel_contact]',
    `signup`='$post_signup',
    `telgps`='$_POST[telgps]',
    `passgps`='$_POST[passgps]',
    `tech`='$tech',
    `tech_service`='$tech_service',
    `poc`='$_POST[poc]',
    `sim`='$sim',
    `sim_money`='$_POST[sim_money]',
    `service_charge`='$_POST[service_charge]',
    `simno`='$_POST[simno]',";
        if ($_POST['simexp'] == "") {
            $update .= "`simexp`=NULL,";
        } else {
            $post_simexp = DateYMD($_POST['simexp']);
            $update .= "`simexp`='$post_simexp',";
        }
        if ($_POST['bill'] == "") {
            $update .= "`bill`=NULL,";
        } else {
            $post_bill = DateYMD($_POST['bill']);
            $update .= "`bill`='$post_bill',";
        }
        $update .= "`bill_comment`='$_POST[bill_comment]',
    `gpsmodel1`='$_POST[gpsmodel1]',";
        if ($_POST['dill'] == "") {
            $update .= "`dill`=NULL,";
        } else {
            $post_dill = DateYMD($_POST['dill']);
            $update .= "`dill`='$post_dill',";
        }
        if ($_POST['tax_exp'] == "") {
            $update .= "`tax_exp`=NULL,";
        } else {
            $post_tax_exp = DateYMD($_POST['tax_exp']);
            $update .= "`tax_exp`='$post_tax_exp',";
        }
        $update .= "`passc`='$_POST[passc]',
    `comment`='$_POST[comment]',
    `promo`='$_POST[promo]' ,
    `taxpayer_no`='$_POST[taxpayer_no]'
    WHERE user='$_GET[user]'";
        $result_update = mysqli_query($conn, $update);
        if ($result_update) {
            echo " <script> alert('บันทึกสำเร็จ') </script> ";
            // echo $update;
            print "<meta http-equiv=refresh content=0;URL=?p=edit&user=$_POST[user]&>";
        } else {
            // echo $update;
            echo " <script> alert('บันทึกไม่สำเร็จ กรุณาตรวจสอบ') </script> ";
            print "<meta http-equiv=refresh content=0;URL=?p=edit&user=$_POST[user]>";
        }
    }

    ?>
    <div class="container-fluid mt-4">
        <div class="card" id="document">
            <div class="card-header bg-success text-white">
                <div class="row">
                    <div class="col">
                        <h2> <a href="?p=main_admin"><i class="fas fa-arrow-left"></i></a>
                            แก้ไขข้อมูล
                        </h2>
                    </div>
                    <div class="col text-right">
                        <a href="?p=canceler&user=<?= $_GET['user'] ?>" title="ยกเลิกการติดตั้ง"><button type="button" class="btn btn-warning btn-sm">ยกเลิกขนส่ง <span class="fa fa-ban"></span></button></a>
                        <a href="?p=canceler_service&user=<?= $_GET['user'] ?>" title="ยกเลิกการติดตั้ง"><button type="button" class="btn btn-danger btn-sm">ยกเลิกการให้บริการ <span class="fa fa-times"></span></button></a>
                    </div>
                </div>
            </div>
            <form method="post" name="edit_data" onsubmit="return checkFrm();">
                <br />
                <div class="container-fluid">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="operator">ชื่อผู้ประกอบการ</label>
                            <input type="text" class="form-control  form-control-sm" name="name" id="operator" value="<?= $rows['name']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="operator">เลขประจำตัวผู้เสียภาษี</label>
                            <input type="text" class="form-control  form-control-sm" name="taxpayer_no" id="taxpayer_no" value="<?= $rows['taxpayer_no']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tel_contact">เบอร์ติดต่อ <small>(กรอกได้มากกว่า 1 เบอร์)</small> </label>
                            <input type="text" class="form-control form-control-sm" name="tel_contact" id="tel_contact" value="<?= $rows['tel_contact']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contrack">ที่อยู่</label>
                            <input type="text" class="form-control  form-control-sm" name="contrack" id="contrack" value="<?= $rows['contrack']; ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="imei">IMEI</label>
                            <input type="text" class="form-control form-control-sm" name="zipcode" id="imei" value="<?= $rows['zipcode']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="chassis">เลขคัทซี</label>
                            <input type="text" class="form-control form-control-sm" name="user" id="chassis" value="<?= $rows['user']; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="license">ทะเบียนรถ</label>
                            <input type="license" class="form-control  form-control-sm" name="amper" id="license" value="<?= $rows['amper']; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="province2">จังหวัด</label>
                            <select id="province2" class="form-control form-control-sm select2" name="province2" id="province2">
                                <?php
                                $sql_province = "SELECT * FROM province_code ORDER BY code";
                                $rs_province = $conn->query($sql_province);

                                while ($row_province = $rs_province->fetch_assoc()) {
                                ?>
                                    <option value="<?= $row_province['code'] ?>" <?php if ($rows['province2'] == $row_province['code']) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                        <?= $row_province['name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="brand">ยี่ห้อ</label>
                            <input type="text" class="form-control  form-control-sm" name="address" id="brand" value="<?= $rows['address']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="gpsmodel1">รุ่นเครื่อง GPS จริง</label>
                            <select name="gpsmodel1" id="gpsmodel1" class="form-control  form-control-sm select2">
                                <option value="T333" <?php if ($rows['gpsmodel1'] == "T333") {
                                                            echo "selected";
                                                        } ?>>T333
                                </option>
                                <option value="AW" <?php if ($rows['gpsmodel1'] == "AW") {
                                                        echo "selected";
                                                    } ?>>AW
                                </option>
                                <option value="VT900" <?php if ($rows['gpsmodel1'] == "VT900") {
                                                            echo "selected";
                                                        } ?>>
                                    VT900</option>
                                <option value="VT900(Box)" <?php if ($rows['gpsmodel1'] == "VT900(Box)") {
                                                                echo "selected";
                                                            } ?>>VT900(Box)
                                </option>
                                <option value="VT900(U)" <?php if ($rows['gpsmodel1'] == "VT900(U)") {
                                                                echo "selected";
                                                            } ?>>VT900(U)</option>
                                <option value="VT900(Box)(U)" <?php if ($rows['gpsmodel1'] == "VT900(Box)(U)") {
                                                                    echo "selected";
                                                                } ?>>VT900(Box)(U)
                                </option>
                                <option value="VT900(A)" <?php if ($rows['gpsmodel1'] == "VT900(A)") {
                                                                echo "selected";
                                                            } ?>>VT900(A)</option>
                                <option value="VT900(Box)(A)" <?php if ($rows['gpsmodel1'] == "VT900(Box)(A)") {
                                                                    echo "selected";
                                                                } ?>>VT900(Box)(A)
                                </option>
                                <option value="T1" <?php if ($rows['gpsmodel1'] == "T1") {
                                                        echo "selected";
                                                    } ?>>T1
                                </option>
                                <option value="GT06E(Box)" <?php if ($rows['gpsmodel1'] == "GT06E(Box)") {
                                                                echo "selected";
                                                            } ?>>GT06E(Box)
                                </option>
                                <option value="GT06E" <?php if ($rows['gpsmodel1'] == 'GT06E') {
                                                            echo "selected";
                                                        } ?>>
                                    GT06E</option>
                                <option value="fm11" <?php if ($rows['gpsmodel1'] == "fm1") {
                                                            echo "selected";
                                                        } ?>>
                                    Teltonika FM1100</option>
                                <option value="ts107" <?php if ($rows['gpsmodel1'] == "ts107") {
                                                            echo "selected";
                                                        } ?>>
                                    TS107</option>
                                <option value="tk103" <?php if ($rows['gpsmodel1'] == "tk103") {
                                                            echo "selected";
                                                        } ?>>
                                    TK103</option>
                                <option value="MVT380" <?php if ($rows['gpsmodel1'] == "MVT380") {
                                                            echo "selected";
                                                        } ?>>
                                    MVT380</option>
                                <option value="VT300" <?php if ($rows['gpsmodel1'] == "VT300") {
                                                            echo "selected";
                                                        } ?>>
                                    VT300</option>
                                <option value="GM901" <?php if ($rows['gpsmodel1'] == "GM901") {
                                                            echo "selected";
                                                        } ?>>
                                    GM901</option>
                                <option value="ST901" <?php if ($rows['gpsmodel1'] == "ST901") {
                                                            echo "selected";
                                                        } ?>>
                                    ST901</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="car_approve_id">รุ่นเข้าขนส่ง</label>
                            <select id="car_approve_id" class="form-control form-control-sm" name="car_approve_id" id="car_approve_id">
                                <option value="132/2559" <?php if ($rows['car_approve_id'] == "132/2559") {
                                                                echo "selected";
                                                            } ?>>T333
                                    (132/2559>)</option>
                                <option value="201/2560" <?php if ($rows['car_approve_id'] == "201/2560") {
                                                                echo "selected";
                                                            } ?>>T1 (201/2560)
                                </option>
                                <option value="218/2560" <?php if ($rows['car_approve_id'] == "218/2560") {
                                                                echo "selected";
                                                            } ?>>AW GPS 3G
                                    (218/2560)</option>
                                <option value="207/2560" <?php if ($rows['car_approve_id'] == "207/2560") {
                                                                echo "selected";
                                                            } ?>>VT900
                                    (207/2560)</option>
                                <option value="224/2560" <?php if ($rows['car_approve_id'] == "224/2560") {
                                                                echo "selected";
                                                            } ?>>GT06E
                                    (224/2560)</option>
                                <option value="non-approve" <?php if ($rows['car_approve_id'] == "non-approve") {
                                                                echo "selected";
                                                            } ?>>
                                    ไม่เข้าขนส่ง</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="email">server</label>
                            <select id="email" class="form-control form-control-sm" name="email" id="email">
                                <option value="sv1.greenboxgps.com" <?php if ($rows['email'] == "greenboxsv3.com") {
                                                                        echo "selected";
                                                                    } ?>>ตาจบ 2</option>
                                <option value="greenboxsv3.com" <?php if ($rows['email'] == "greenboxsv3.com") {
                                                                    echo "selected";
                                                                } ?>>ตาจบ</option>
                                <option value="greensv1.com" <?php if ($rows['email'] == "greensv1.com") {
                                                                    echo "selected";
                                                                } ?>>หาร</option>
                                <option value="greensv2.com" <?php if ($rows['email'] == "greensv2.com") {
                                                                    echo "selected";
                                                                } ?>>ตี๋</option>
                                <option value="greenboxsv.com" <?php if ($rows['email'] == "greenboxsv.com") {
                                                                    echo "selected";
                                                                } ?>>ก๊อช</option>
                                <option value="gpsgreenbox.com" <?php if ($rows['email'] == "gpsgreenbox.com") {
                                                                    echo "selected";
                                                                } ?>>greenbox
                                </option>
                                <option value="s1.gpsgreenbox.com" <?php if ($rows['email'] == "s1.gpsgreenbox.com") {
                                                                        echo "selected";
                                                                    } ?>>s1</option>
                                <option value="s2.gpsgreenbox.com" <?php if ($rows['email'] == "s2.gpsgreenbox.com") {
                                                                        echo "selected";
                                                                    } ?>>s2</option>
                                <option value="s3.gpsgreenbox.com" <?php if ($rows['email'] == "s3.gpsgreenbox.com") {
                                                                        echo "selected";
                                                                    } ?>>s3</option>
                                <option value="s4.gpsgreenbox.com" <?php if ($rows['email'] == "s4.gpsgreenbox.com") {
                                                                        echo "selected";
                                                                    } ?>>s4</option>
                                <option value="s5.gpsgreenbox.com" <?php if ($rows['email'] == "s5.gpsgreenbox.com") {
                                                                        echo "selected";
                                                                    } ?>>s5</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="user">User <font class="t-red">(ย่อย)</font></label>
                            <input type="user" class="form-control form-control-sm" name="phone" id="user" value="<?= $rows['phone'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="user">User <font class="t-red">(หลัก)</font> </label>
                            <input type="main_user" class="form-control form-control-sm" name="main_user" id="main_user" value="<?= $rows['main_user'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pass">Pass</label>
                            <input type="pass" class="form-control  form-control-sm" name="passc" id="pass" value="<?= $rows['passc']; ?>">
                        </div>
                        <div class="form-group col-md-3" hidden>
                            <label for="userid">User ID</label>
                            <input type="userid" class="form-control form-control-sm" name="uid" id="userid" value="<?= $rows['uid']; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="simbrand">ค่าย sim</label>
                            <input type="simbrand" class="form-control form-control-sm" name="sim" id="simbrand" value="<?= $rows['sim']; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="simphone">เบอร์ sim ในเครื่อง</label>
                            <input type="simphone" class="form-control  form-control-sm" name="simno" id="simphone" value="<?= $rows['simno']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="passphone">pass เครื่อง</label>
                            <input type="passphone" class="form-control  form-control-sm" name="passgps" id="passphone" value="<?= $rows['passgps']; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="sim_money">จำนวนเงินในซิม</label>
                            <input type="sim_money" class="form-control form-control-sm" name="sim_money" id="amount" value="<?= $rows['sim_money']; ?>" onkeypress="key_number();">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="amount">วันหมดอายุซิม</label>

                            <?php
                            // echo $rows['simexp'];
                            $simexp = $rows['simexp'];
                            if ($simexp == "") {
                                $simexp = "";
                            } else {
                                $simexp = DateDMY($simexp);
                            }
                            ?>
                            <input type="amount" class="form-control form-control-sm calander" name="simexp" id="simexp" value="<?= $simexp ?>" readonly>
                        </div>
                        <?php
                        $show_promo = "SELECT * FROM promotions ORDER BY promo_id desc";
                        $qr_show_promo = $conn->query($show_promo);

                        ?>
                        <div class="form-group col-md-6">
                            <label for="promo">รหัสโปรโมชั่น</label>
                            <select class="select2 form-control" name="promo" id="promo">
                                <option value="">--- โปรโมชั่นเริ่มต้น ---</option>
                                <?php while ($row_show_promo = $qr_show_promo->fetch_assoc()) { ?>
                                    <option value="<?= $row_show_promo['promo_code'] ?>" <?php if ($row_show_promo['promo_code'] == $rows['promo']) {
                                                                                                echo 'selected';
                                                                                            } ?>>
                                        <?= $row_show_promo['promo_code'] . ' | ' . $row_show_promo['promo_note'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <?php $bill = ($rows['bill']);
                            $billAmout = ($rows['service_charge'] * $rows['bill_cycle']);
                            ?>
                            <label for="service_charge">ยอดก่อน Vat</label>
                            <input type="service_charge" class="form-control form-control-sm" autocomplete="off" name="service_charge" id="service_charge" onkeypress="return chkNumber(this)" value="<?= $rows['service_charge']; ?>">
                            <small class="t-red">กรอกเป็นยอดต่อเดือน</small>
                        </div>
                        <div class="form-group col-md-3">
                            <?php $bill = ($rows['bill']);
                            if ($bill == "") {
                                $bill = "";
                            } else {
                                $bill = DateDMY($bill);
                            }
                            ?>
                            <label for="beforecollect">วันที่เก็บเงินรอบที่แล้ว</label>
                            <input type="beforecollect" class="form-control form-control-sm calander readonly" autocomplete="off" name="bill" id="next_bill" readonly value="<?= $bill; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <?php $dill = ($rows['dill']);
                            if ($dill == "") {
                                $dill = "";
                            } else {
                                $dill = DateDMY($dill);
                            }
                            ?>
                            <label for="nextcollect">เก็บเงินรอบถัดไป</label>
                            <input type="nextcollect" class="form-control form-control-sm calander readonly" autocomplete="off" name="dill" id="next_dill" readonly value="<?= $dill; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php $tax_exp = ($rows['tax_exp']);
                            if ($tax_exp == "0000-00-00" or $tax_exp == "") {
                                $tax_exp = "";
                            } else {
                                $tax_exp = DateDMY($tax_exp);
                            }
                            ?>
                            <label for="tax_exp">วันครบกำหนดต่อภาษี <span class="fas fa-calendar-day"></span></label>
                            <input type="tax_exp" class="form-control form-control-sm calander readonly" autocomplete="off" name="tax_exp" id="tax_exp" readonly value="<?= $tax_exp ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <!-- ------ empty ------ -->
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="beforecollect">หมายเหตุเกี่ยวกับบิล</label>
                            <input type="text" class="form-control form-control-sm" autocomplete="off" placeholder="หมายเหตุเกี่ยวกับบิล" name="bill_comment" id="beforecollect" value="<?= $rows['bill_comment']; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="setup">วันที่ติดตั้ง จริง</label>
                            <?php
                            $signup = ($rows['signup']);
                            if ($signup == "") {
                                $signup = "";
                            } else {
                                $signup = DateDMY($signup);
                            }
                            ?>
                            <input type="setup" class="form-control form-control-sm calander" name="datesetup" id="setup" readonly value="<?= $signup; ?>">
                        </div>
                        <div class="form col-md-10">
                            <label for="setup1">วันที่ติดตั้งตามหนังสือ</label>
                            <div class="form-inline">
                                วันที่ &nbsp;<select id="date" class="form-control form-control-sm" name="date" id="date">
                                    <option value="1" <?php if ($rows['date'] == "1") { ?> selected <?php } ?>>1
                                    </option>
                                    <option value="2" <?php if ($rows['date'] == "2") { ?> selected <?php } ?>>2
                                    </option>
                                    <option value="3" <?php if ($rows['date'] == "3") { ?> selected <?php } ?>>3
                                    </option>
                                    <option value="4" <?php if ($rows['date'] == "4") { ?> selected <?php } ?>>4
                                    </option>
                                    <option value="5" <?php if ($rows['date'] == "5") { ?> selected <?php } ?>>5
                                    </option>
                                    <option value="6" <?php if ($rows['date'] == "6") { ?> selected <?php } ?>>6
                                    </option>
                                    <option value="7" <?php if ($rows['date'] == "7") { ?> selected <?php } ?>>7
                                    </option>
                                    <option value="8" <?php if ($rows['date'] == "8") { ?> selected <?php } ?>>8
                                    </option>
                                    <option value="9" <?php if ($rows['date'] == "9") { ?> selected <?php } ?>>9
                                    </option>
                                    <option value="10" <?php if ($rows['date'] == "10") { ?> selected <?php } ?>>10
                                    </option>
                                    <option value="11" <?php if ($rows['date'] == "11") { ?> selected <?php } ?>>11
                                    </option>
                                    <option value="12" <?php if ($rows['date'] == "12") { ?> selected <?php } ?>>12
                                    </option>
                                    <option value="13" <?php if ($rows['date'] == "13") { ?> selected <?php } ?>>13
                                    </option>
                                    <option value="14" <?php if ($rows['date'] == "14") { ?> selected <?php } ?>>14
                                    </option>
                                    <option value="15" <?php if ($rows['date'] == "15") { ?> selected <?php } ?>>15
                                    </option>
                                    <option value="16" <?php if ($rows['date'] == "16") { ?> selected <?php } ?>>16
                                    </option>
                                    <option value="17" <?php if ($rows['date'] == "17") { ?> selected <?php } ?>>17
                                    </option>
                                    <option value="18" <?php if ($rows['date'] == "18") { ?> selected <?php } ?>>18
                                    </option>
                                    <option value="19" <?php if ($rows['date'] == "19") { ?> selected <?php } ?>>19
                                    </option>
                                    <option value="20" <?php if ($rows['date'] == "20") { ?> selected <?php } ?>>20
                                    </option>
                                    <option value="21" <?php if ($rows['date'] == "21") { ?> selected <?php } ?>>21
                                    </option>
                                    <option value="22" <?php if ($rows['date'] == "22") { ?> selected <?php } ?>>22
                                    </option>
                                    <option value="23" <?php if ($rows['date'] == "23") { ?> selected <?php } ?>>23
                                    </option>
                                    <option value="24" <?php if ($rows['date'] == "24") { ?> selected <?php } ?>>24
                                    </option>
                                    <option value="25" <?php if ($rows['date'] == "25") { ?> selected <?php } ?>>25
                                    </option>
                                    <option value="26" <?php if ($rows['date'] == "26") { ?> selected <?php } ?>>26
                                    </option>
                                    <option value="27" <?php if ($rows['date'] == "27") { ?> selected <?php } ?>>27
                                    </option>
                                    <option value="28" <?php if ($rows['date'] == "28") { ?> selected <?php } ?>>28
                                    </option>
                                    <option value="29" <?php if ($rows['date'] == "29") { ?> selected <?php } ?>>29
                                    </option>
                                    <option value="30" <?php if ($rows['date'] == "30") { ?> selected <?php } ?>>30
                                    </option>
                                    <option value="31" <?php if ($rows['date'] == "31") { ?> selected <?php } ?>>31
                                    </option>
                                </select>&nbsp;
                                เดือน &nbsp;<select id="month" name="sex" class="form-control  form-control-sm">
                                    <option value="มกราคม" <?php if ($rows['sex'] == "มกราคม") {
                                                                echo "selected";
                                                            } ?>>
                                        มกราคม</option>
                                    <option value="กุมภาพันธ์" <?php if ($rows['sex'] == "กุมภาพันธ์") {
                                                                    echo "selected";
                                                                } ?>>กุมภาพันธ์</option>
                                    <option value="มีนาคม" <?php if ($rows['sex'] == "มีนาคม") {
                                                                echo "selected";
                                                            } ?>>
                                        มีนาคม</option>
                                    <option value="เมษายน" <?php if ($rows['sex'] == "เมษายน") {
                                                                echo "selected";
                                                            } ?>>
                                        เมษายน</option>
                                    <option value="พฤษภาคม" <?php if ($rows['sex'] == "พฤษภาคม") {
                                                                echo "selected";
                                                            } ?>>
                                        พฤษภาคม</option>
                                    <option value="มิถุนายน" <?php if ($rows['sex'] == "มิถุนายน") {
                                                                    echo "selected";
                                                                } ?>>
                                        มิถุนายน</option>
                                    <option value="กรกฎาคม" <?php if ($rows['sex'] == "กรกฎาคม") {
                                                                echo "selected";
                                                            } ?>>
                                        กรกฎาคม</option>
                                    <option value="สิงหาคม" <?php if ($rows['sex'] == "สิงหาคม") {
                                                                echo "selected";
                                                            } ?>>
                                        สิงหาคม</option>
                                    <option value="กันยายน" <?php if ($rows['sex'] == "กันยายน") {
                                                                echo "selected";
                                                            } ?>>
                                        กันยายน</option>
                                    <option value="ตุลาคม" <?php if ($rows['sex'] == "ตุลาคม") {
                                                                echo "selected";
                                                            } ?>>
                                        ตุลาคม</option>
                                    <option value="พฤศจิกายน" <?php if ($rows['sex'] == "พฤศจิกายน") {
                                                                    echo "selected";
                                                                } ?>>พฤศจิกายน</option>
                                    <option value="ธันวาคม" <?php if ($rows['sex'] == "ธันวาคม") {
                                                                echo "selected";
                                                            } ?>>
                                        ธันวาคม</option>
                                </select> &nbsp;
                                พ.ศ. &nbsp;<input name="year" type="year" class="form-control  form-control-sm" id="year" value="<?= $rows['year']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <?php
                        $show_service = "SELECT * FROM service WHERE serv_status = 'tech' or serv_status = 'dealer' ORDER BY service_id desc";
                        $qr_show_service = $conn->query($show_service);
                        ?>
                        <div class="form-group col-md-3">
                            <label for="tech">ช่างติดตั้งคนแรก</label>
                            <!-- <input type="text" class="form-control form-control-sm" name="tech" id="tech" value="<?= $rows['tech']; ?>"> -->
                            <select name="tech" id="tech" class="form-control form-control-sm">

                                <?php while ($row_show_service = $qr_show_service->fetch_assoc()) {
                                    // กำหนคำนำหน้า
                                    if ($row_show_service['serv_status'] == 'tech') {
                                        $serv_prefix = "ช่าง ";
                                    } else {
                                        $serv_prefix = "ดีลเลอร์";
                                    }


                                    if ($row_show_service['service_id'] != $rows['tech']) {
                                        $service_match = 0;
                                        $service_value = $rows['tech'];
                                    } else {
                                        $service_match = 1;
                                        $service_value = $row_show_service['service_id'];
                                    }
                                ?>
                                    <option value="<?= $row_show_service['service_id'] ?>"><?= $serv_prefix . $row_show_service['serv_name'] ?></option>
                                <?php
                                }
                                if ($service_match == 0) {
                                    echo '<option value="' . $rows['tech'] . '" selected >' . $rows['tech'] . ' **กรุณาเปลี่ยน</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <?php
                            $qr_show_service2 = $conn->query($show_service);
                            ?>
                            <label for="tech_service">ช่างซ่อมบำรุง</label>
                            <select name="tech_service" id="tech_service" class="form-control form-control-sm">
                                <?php while ($row_show_service2 = $qr_show_service2->fetch_assoc()) {
                                    // กำหนคำนำหน้า
                                    if ($row_show_service2['serv_status'] == 'tech') {
                                        $serv_prefix = "ช่าง ";
                                    } else {
                                        $serv_prefix = "ดีลเลอร์";
                                    }


                                    if ($row_show_service2['service_id'] != $rows['tech_service']) {
                                        $service_match = 0;
                                        $service_value = $rows['tech_service'];
                                    } else {
                                        $service_match = 1;
                                        $service_value = $row_show_service2['service_id'];
                                    }
                                ?>
                                    <option value="<?= $row_show_service2['service_id'] ?>"><?= $serv_prefix . $row_show_service2['serv_name'] ?></option>
                                <?php
                                }
                                if ($service_match == 0) {
                                    echo '<option value="' . $rows['tech_service'] . '" selected >' . $rows['tech_service'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="education">ชื่อคนเซ็นหนังสือ</label>
                            <select id="education" class="form-control form-control-sm" name="education" id="education">
                                <option value="นางสาวกันตณา ยี่จันทึก" <?php if ($rows['education'] == "นางสาวกันตณา ยี่จันทึก") {
                                                                            echo "selected";
                                                                        } ?>>
                                    นางสาวกันตณา ยี่จันทึก</option>
                                <option value="นายรัตนพล ธนะโสภณ" <?php if ($rows['education'] == "นายรัตนพล ธนะโสภณ") {
                                                                        echo "selected";
                                                                    } ?>>นายรัตนพล
                                    ธนะโสภณ</option>
                                <option value="นายวีรวิขญ์ จิตรคูณเศรษฐ์" <?php if ($rows['education'] == "นายวีรวิขญ์ จิตรคูณเศรษฐ์") {
                                                                                echo "selected";
                                                                            } ?>>
                                    นายวีรวิขญ์ จิตรคูณเศรษฐ์</option>
                                <option value="ว่าที่ ร.ต. เจษฎา  พรหมกุลจันทร์" <?php if ($rows['education'] == "ว่าที่ ร.ต. เจษฎา  พรหมกุลจันทร์") {
                                                                                        echo "selected";
                                                                                    } ?>>
                                    ว่าที่ ร.ต. เจษฎา พรหมกุลจันทร์</option>
                                <option value="นายโชคชัย ไชยพิพัฒนขจร" <?php if ($rows['education'] == "นายโชคชัย ไชยพิพัฒนขจร") {
                                                                            echo "selected";
                                                                        } ?>>
                                    นายโชคชัย ไชยพิพัฒนขจร</option>
                                <option value="นาย ณัฐพงษ์ แสนจำลา" <?php if ($rows['education'] == "นาย ณัฐพงษ์ แสนจำลา") {
                                                                        echo "selected";
                                                                    } ?>>นาย
                                    ณัฐพงษ์ แสนจำลา</option>
                                <option value="นาย ธนากร นิ่มวิไลย" <?php if ($rows['education'] == "นาย ธนากร นิ่มวิไลย") {
                                                                        echo "selected";
                                                                    } ?>>นาย
                                    ธนากร นิ่มวิไลย</option>
                                <option value="นาย ทวี ลิ้มเจริญ" <?php if ($rows['education'] == "นาย ทวี ลิ้มเจริญ") {
                                                                        echo "selected";
                                                                    } ?>>นาย ทวี
                                    ลิ้มเจริญ</option>
                                <option value="นาย เพชร ทองเฟื้อง" <?php if ($rows['education'] == "นาย เพชร ทองเฟื้อง") {
                                                                        echo "selected";
                                                                    } ?>>นาย เพชร
                                    ทองเฟื้อง</option>
                                <option value="นายศศินษ์ คูธนพิทักษ์กุล" <?php if ($rows['education'] == "นายศศินษ์ คูธนพิทักษ์กุล​") {
                                                                                echo "selected";
                                                                            } ?>>
                                    นายศศินษ์ คูธนพิทักษ์กุล​</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="poc">ป๊อกแป๊ก</label>
                            <select id="poc" name="poc" class="form-control  form-control-sm">
                                <option value="n" <?php if ($rows['poc'] == "n") {
                                                        echo "selected";
                                                    } ?>>ไม่มีป๊อกแป๊ก
                                </option>
                                <option value="y" <?php if ($rows['poc'] == "y") {
                                                        echo "selected";
                                                    } ?>>มีป๊อกแป๊ก
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telgps">การ link เข้าขนส่ง y / n</label>
                            <select id="telgps" name="telgps" class="form-control  form-control-sm" id="telgps">
                                <option value="n" <?php if ($rows['telgps'] == "n") {
                                                        echo "selected";
                                                    } ?>>n</option>
                                <option value="y" <?php if ($rows['telgps'] == "y") {
                                                        echo "selected";
                                                    } ?>>y</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="work">ตำแหน่งคนเซ็นหนังสือ</label>
                            <select name="work" class="form-control  form-control-sm" id="work">
                                <option value="กรรมการ" <?php if ($rows['work'] == "กรรมการ") {
                                                            echo "selected";
                                                        } ?>>
                                    กรรมการ</option>
                                <option value="Service Area Manager" <?php if ($rows['work'] == "Service Area Manager") {
                                                                            echo "selected";
                                                                        } ?>>Service Area
                                    Manager</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="register_type">ประเภทรถ การจดทะเบียน</label>
                            <div class="form-inline">
                                <font color="RED"> <strong><?php echo $rows['register_type']; ?></strong> &nbsp;</font>
                                <select id="register_type" name="register_type" class="form-control form-control-sm select2" id="register_type">
                                    <option value="0" <?php if ($rows['register_type'] == "0") {
                                                            echo "selected";
                                                        } ?>>
                                        ไม่มีข้อมูลประเภทและชนิดรถ</option>
                                    <option value="1000" <?php if ($rows['register_type'] == "1000") {
                                                                echo "selected";
                                                            } ?>>
                                        รถโดยสารไมได้ระบุมาตรฐานรถและประเภทการขนส่ง</option>
                                    <option value="1101" <?php if ($rows['register_type'] == "1101") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 1 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1111" <?php if ($rows['register_type'] == "1111") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 1 ก ส่วนบุคคล</option>
                                    <option value="1121" <?php if ($rows['register_type'] == "1121") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 1 ก ไม่ประจำทาง</option>
                                    <option value="1131" <?php if ($rows['register_type'] == "1131") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 1 ก ประจำทาง</option>
                                    <option value="1102" <?php if ($rows['register_type'] == "1102") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 1 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1112" <?php if ($rows['register_type'] == "1112") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 1 ข ส่วนบุคคล</option>
                                    <option value="1122" <?php if ($rows['register_type'] == "1122") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 1 ข ไม่ประจำทาง</option>
                                    <option value="1132" <?php if ($rows['register_type'] == "1132") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 1 ข ประจำทาง</option>
                                    <option value="1201" <?php if ($rows['register_type'] == "1201") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1211" <?php if ($rows['register_type'] == "1211") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ก ส่วนบุคคล</option>
                                    <option value="1221" <?php if ($rows['register_type'] == "1221") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ก ไม่ประจำทาง</option>
                                    <option value="1231" <?php if ($rows['register_type'] == "1231") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ก ประจำทาง</option>
                                    <option value="1202" <?php if ($rows['register_type'] == "1202") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1212" <?php if ($rows['register_type'] == "1212") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ข ส่วนบุคคล</option>
                                    <option value="1222" <?php if ($rows['register_type'] == "1222") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ข ไม่ประจำทาง</option>
                                    <option value="1232" <?php if ($rows['register_type'] == "1232") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ข ประจำทาง</option>
                                    <option value="1203" <?php if ($rows['register_type'] == "1203") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ค ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1213" <?php if ($rows['register_type'] == "1213") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ค ส่วนบุคคล</option>
                                    <option value="1223" <?php if ($rows['register_type'] == "1223") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ค ไม่ประจำทาง</option>
                                    <option value="1233" <?php if ($rows['register_type'] == "1233") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ค ประจำทาง</option>
                                    <option value="1204" <?php if ($rows['register_type'] == "1204") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ง ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1214" <?php if ($rows['register_type'] == "1214") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ง ส่วนบุคคล</option>
                                    <option value="1224" <?php if ($rows['register_type'] == "1224") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ง ไม่ประจำทาง</option>
                                    <option value="1234" <?php if ($rows['register_type'] == "1234") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 ง ประจำทาง</option>
                                    <option value="1205" <?php if ($rows['register_type'] == "1205") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 จ ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1215" <?php if ($rows['register_type'] == "1215") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 จ ส่วนบุคคล</option>
                                    <option value="1225" <?php if ($rows['register_type'] == "1225") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 จ ไม่ประจำทาง</option>
                                    <option value="1235" <?php if ($rows['register_type'] == "1235") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 2 จ ประจำทาง</option>
                                    <option value="1301" <?php if ($rows['register_type'] == "1301") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1311" <?php if ($rows['register_type'] == "1311") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ก ส่วนบุคคล</option>
                                    <option value="1321" <?php if ($rows['register_type'] == "1321") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ก ไม่ประจำทาง</option>
                                    <option value="1331" <?php if ($rows['register_type'] == "1331") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ก ประจำทาง</option>
                                    <option value="1302" <?php if ($rows['register_type'] == "1302") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1312" <?php if ($rows['register_type'] == "1312") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ข ส่วนบุคคล</option>
                                    <option value="1322" <?php if ($rows['register_type'] == "1322") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ข ไม่ประจำทาง</option>
                                    <option value="1332" <?php if ($rows['register_type'] == "1332") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ข ประจำทาง</option>
                                    <option value="1303" <?php if ($rows['register_type'] == "1303") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ค ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1313" <?php if ($rows['register_type'] == "1313") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ค ส่วนบุคคล</option>
                                    <option value="1323" <?php if ($rows['register_type'] == "1323") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ค ไม่ประจำทาง</option>
                                    <option value="1333" <?php if ($rows['register_type'] == "1333") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ค ประจำทาง</option>
                                    <option value="1304" <?php if ($rows['register_type'] == "1304") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ง ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1314" <?php if ($rows['register_type'] == "1314") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ง ส่วนบุคคล</option>
                                    <option value="1324" <?php if ($rows['register_type'] == "1324") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ง ไม่ประจำทาง</option>
                                    <option value="1334" <?php if ($rows['register_type'] == "1334") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ง ประจำทาง</option>
                                    <option value="1305" <?php if ($rows['register_type'] == "1305") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 จ ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1315" <?php if ($rows['register_type'] == "1315") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 จ ส่วนบุคคล</option>
                                    <option value="1325" <?php if ($rows['register_type'] == "1325") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 จ ไม่ประจำทาง</option>
                                    <option value="1335" <?php if ($rows['register_type'] == "1335") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 จ ประจำทาง</option>
                                    <option value="1306" <?php if ($rows['register_type'] == "1306") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ฉ ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1316" <?php if ($rows['register_type'] == "1316") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ฉ ส่วนบุคคล</option>
                                    <option value="1326" <?php if ($rows['register_type'] == "1326") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ฉ ไม่ประจำทาง</option>
                                    <option value="1336" <?php if ($rows['register_type'] == "1336") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 3 ฉ ประจำทาง</option>
                                    <option value="1401" <?php if ($rows['register_type'] == "1401") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1411" <?php if ($rows['register_type'] == "1411") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ก ส่วนบุคคล</option>
                                    <option value="1421" <?php if ($rows['register_type'] == "1421") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ก ไม่ประจำทาง</option>
                                    <option value="1431" <?php if ($rows['register_type'] == "1431") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ก ประจำทาง</option>
                                    <option value="1402" <?php if ($rows['register_type'] == "1402") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1412" <?php if ($rows['register_type'] == "1412") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ข ส่วนบุคคล</option>
                                    <option value="1422" <?php if ($rows['register_type'] == "1422") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ข ไม่ประจำทาง</option>
                                    <option value="1432" <?php if ($rows['register_type'] == "1432") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ข ประจำทาง</option>
                                    <option value="1403" <?php if ($rows['register_type'] == "1403") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ค ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1413" <?php if ($rows['register_type'] == "1413") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ค ส่วนบุคคล</option>
                                    <option value="1423" <?php if ($rows['register_type'] == "1423") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ค ไม่ประจำทาง</option>
                                    <option value="1433" <?php if ($rows['register_type'] == "1433") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ค ประจำทาง</option>
                                    <option value="1404" <?php if ($rows['register_type'] == "1404") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ง ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1414" <?php if ($rows['register_type'] == "1414") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ง ส่วนบุคคล</option>
                                    <option value="1424" <?php if ($rows['register_type'] == "1424") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ง ไม่ป���ะจำทาง</option>
                                    <option value="1434" <?php if ($rows['register_type'] == "1434") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ง ประจำทาง</option>
                                    <option value="1405" <?php if ($rows['register_type'] == "1405") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 จ ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1415" <?php if ($rows['register_type'] == "1415") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 จ ส่วนบุคคล</option>
                                    <option value="1425" <?php if ($rows['register_type'] == "1425") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 จ ไม่ประจำทาง</option>
                                    <option value="1435" <?php if ($rows['register_type'] == "1435") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 จ ประจำทาง</option>
                                    <option value="1406" <?php if ($rows['register_type'] == "1406") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ฉ ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1416" <?php if ($rows['register_type'] == "1416") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ฉ ส่วนบุคคล</option>
                                    <option value="1426" <?php if ($rows['register_type'] == "1426") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ฉ ไม่ประจำทาง</option>
                                    <option value="1436" <?php if ($rows['register_type'] == "1436") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 4 ฉ ประจำทาง</option>
                                    <option value="1501" <?php if ($rows['register_type'] == "1501") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 5 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1511" <?php if ($rows['register_type'] == "1511") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 5 ก ส่วนบุคคล</option>
                                    <option value="1521" <?php if ($rows['register_type'] == "1521") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 5 ก ไม่ประจำทาง</option>
                                    <option value="1531" <?php if ($rows['register_type'] == "1531") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 5 ก ประจำทาง</option>
                                    <option value="1502" <?php if ($rows['register_type'] == "1502") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 5 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1512" <?php if ($rows['register_type'] == "1512") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 5 ข ส่วนบุคคล</option>
                                    <option value="1522" <?php if ($rows['register_type'] == "1522") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 5 ข ไม่ประจำทาง</option>
                                    <option value="1532" <?php if ($rows['register_type'] == "1532") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 5 ข ประจำทาง</option>
                                    <option value="1601" <?php if ($rows['register_type'] == "1601") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 6 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1611" <?php if ($rows['register_type'] == "1611") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 6 ก ส่วนบุคคล</option>
                                    <option value="1621" <?php if ($rows['register_type'] == "1621") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 6 ก ไม่ประจำทาง</option>
                                    <option value="1631" <?php if ($rows['register_type'] == "1631") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 6 ก ประจำทาง</option>
                                    <option value="1602" <?php if ($rows['register_type'] == "1602") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 6 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1612" <?php if ($rows['register_type'] == "1612") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 6 ข ส่วนบุคคล</option>
                                    <option value="1622" <?php if ($rows['register_type'] == "1622") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 6 ข ไม่ประจำทาง</option>
                                    <option value="1632" <?php if ($rows['register_type'] == "1632") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 6 ข ประจำทาง</option>
                                    <option value="1700" <?php if ($rows['register_type'] == "1700") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 7 ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1710" <?php if ($rows['register_type'] == "1710") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 7 ส่วนบุคคล</option>
                                    <option value="1720" <?php if ($rows['register_type'] == "1720") {
                                                                echo "selected";
                                                            } ?>>รถโดยสาร
                                        มาตรฐาน 7 ไม่ประจำทาง</option>
                                    <option value="2000" <?php if ($rows['register_type'] == "2000") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก
                                        ไม่ได้ระบุลักษณะและประเภทรถ</option>
                                    <option value="2100" <?php if ($rows['register_type'] == "2100") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        1 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2110" <?php if ($rows['register_type'] == "2110") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        1 ส่วนบุคคล</option>
                                    <option value="2120" <?php if ($rows['register_type'] == "2120") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        1 ไม่ประจำทาง</option>
                                    <option value="2200" <?php if ($rows['register_type'] == "2200") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        2 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2210" <?php if ($rows['register_type'] == "2210") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        2 ส่วนบุคคล</option>
                                    <option value="2220" <?php if ($rows['register_type'] == "2220") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        2 ไม่ประจำทาง</option>
                                    <option value="2300" <?php if ($rows['register_type'] == "2300") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        3 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2310" <?php if ($rows['register_type'] == "2310") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        3 ส่วนบุคคล</option>
                                    <option value="2320" <?php if ($rows['register_type'] == "2320") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        3 ไม่ประจำทาง</option>
                                    <option value="2400" <?php if ($rows['register_type'] == "2400") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        4 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2410" <?php if ($rows['register_type'] == "2410") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        4 ส่วนบุคคล</option>
                                    <option value="2420" <?php if ($rows['register_type'] == "2420") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        4 ไม่ประจำทาง</option>
                                    <option value="2500" <?php if ($rows['register_type'] == "2500") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        5 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2510" <?php if ($rows['register_type'] == "2510") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        5 ส่วนบุคคล</option>
                                    <option value="2520" <?php if ($rows['register_type'] == "2520") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        5 ไม่ประจำทาง</option>
                                    <option value="2600" <?php if ($rows['register_type'] == "2600") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        6 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2610" <?php if ($rows['register_type'] == "2610") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        6 ส่วนบุคคล</option>
                                    <option value="2620" <?php if ($rows['register_type'] == "2620") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        6 ไม่ประจำทาง</option>
                                    <option value="2700" <?php if ($rows['register_type'] == "2700") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        7 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2710" <?php if ($rows['register_type'] == "2710") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        7 ส่วนบุคคล</option>
                                    <option value="2720" <?php if ($rows['register_type'] == "2720") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        7 ไม่ประจำทาง</option>
                                    <option value="2800" <?php if ($rows['register_type'] == "2800") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        8 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2810" <?php if ($rows['register_type'] == "2810") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        8 ส่วนบุคคล</option>
                                    <option value="2820" <?php if ($rows['register_type'] == "2820") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        8 ไม่ประจำทาง</option>
                                    <option value="2900" <?php if ($rows['register_type'] == "2900") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        9 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2910" <?php if ($rows['register_type'] == "2910") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        9 ส่วนบุคคล</option>
                                    <option value="2920" <?php if ($rows['register_type'] == "2920") {
                                                                echo "selected";
                                                            } ?>>รถบรรทุก ลักษณะ
                                        9 ไม่ประจำทาง</option>
                                    <option value="3000" <?php if ($rows['register_type'] == "3000") {
                                                                echo "selected";
                                                            } ?>>รถยนต์
                                        ไม่ระบุประเภทรถ</option>
                                    <option value="3010" <?php if ($rows['register_type'] == "3010") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                                    <option value="3011" <?php if ($rows['register_type'] == "3011") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                                    <option value="3012" <?php if ($rows['register_type'] == "3012") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                                    <option value="3013" <?php if ($rows['register_type'] == "3013") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                                    <option value="3014" <?php if ($rows['register_type'] == "3014") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                                    <option value="3020" <?php if ($rows['register_type'] == "3020") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                                    <option value="3021" <?php if ($rows['register_type'] == "3021") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                                    <option value="3022" <?php if ($rows['register_type'] == "3022") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                                    <option value="3023" <?php if ($rows['register_type'] == "3023") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                                    <option value="3024" <?php if ($rows['register_type'] == "3024") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                                    <option value="3025" <?php if ($rows['register_type'] == "3025") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                                    <option value="3030" <?php if ($rows['register_type'] == "3030") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์บรรทุกส่วนบุคคล (รย.3)</option>
                                    <option value="3031" <?php if ($rows['register_type'] == "3031") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์บรรทุกส่วนบุคคล (รย.ร)</option>
                                    <option value="3032" <?php if ($rows['register_type'] == "3032") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์บรรทุกส่วนบุคคล (รย.ร)</option>
                                    <option value="3033" <?php if ($rows['register_type'] == "3033") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์บรรทุกส่วนบุคคล (รย.ร)</option>
                                    <option value="3040" <?php if ($rows['register_type'] == "3040") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                                    <option value="3041" <?php if ($rows['register_type'] == "3041") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                                    <option value="3042" <?php if ($rows['register_type'] == "3042") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                                    <option value="3043" <?php if ($rows['register_type'] == "3043") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                                    <option value="3044" <?php if ($rows['register_type'] == "3044") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                                    <option value="3050" <?php if ($rows['register_type'] == "3050") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์รับจ้างระหว่างจังหวัด (รย.ร)</option>
                                    <option value="3060" <?php if ($rows['register_type'] == "3060") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์รับจ้างบรรทุกคนโดยสารไม่เกินเจ็ดคน (รย.6)</option>
                                    <option value="3070" <?php if ($rows['register_type'] == "3070") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์สี่ล้อเล็กรับจ้าง (รย.7)</option>
                                    <option value="3080" <?php if ($rows['register_type'] == "3080") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์รับจ้างสามล้อ (รย.8)</option>
                                    <option value="3090" <?php if ($rows['register_type'] == "3090") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์บริการธุรกิจ (รย.9)</option>
                                    <option value="3100" <?php if ($rows['register_type'] == "3100") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์บริการทัศนาจร (รย.10)</option>
                                    <option value="3110" <?php if ($rows['register_type'] == "3110") {
                                                                echo "selected";
                                                            } ?>>
                                        รถยนต์บริการให้เช่า (รย.11)</option>
                                    <option value="4120" <?php if ($rows['register_type'] == "4120") {
                                                                echo "selected";
                                                            } ?>>รถจักรยานยนต์
                                        (รย.12)</option>
                                    <option value="3130" <?php if ($rows['register_type'] == "3130") {
                                                                echo "selected";
                                                            } ?>>รถแทรกเตอร์
                                        (รย.13)</option>
                                    <option value="3140" <?php if ($rows['register_type'] == "3140") {
                                                                echo "selected";
                                                            } ?>>รถบดถนน (รย.14)
                                    </option>
                                    <option value="3150" <?php if ($rows['register_type'] == "3150") {
                                                                echo "selected";
                                                            } ?>>
                                        รถใช้งานเกษตรกรรม (รย.15)</option>
                                    <option value="3160" <?php if ($rows['register_type'] == "3160") {
                                                                echo "selected";
                                                            } ?>>รถพ่วง (รย.16)
                                    </option>
                                    <option value="4170" <?php if ($rows['register_type'] == "4170") {
                                                                echo "selected";
                                                            } ?>>
                                        รถจักรยานยนต์สาธารณะ (รย.17)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="comment">คอมเม้นอื่นๆ</label>
                            <textarea class="form-control  form-control-sm" name="comment" rows="3" id="comment"><?= $rows['comment']; ?></textarea>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button type="submit" name="save" class="btn btn-success btn-sm">บันทึก</button>
                        <a href="member_detail.php"><button type="button" name="cancel" class="btn btn-danger btn-sm">ยกเลิก</button></a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<!-- <script src="vendor\datetimepicker\jquery.datetimepicker.full.js" charset="utf-8"></script> -->
<!-- <script src="vendor/select2/js/select2.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
    });

    $(function() {


        // กรณีใช้แบบ inline
        $("#testdate4").datetimepicker({
            timepicker: false,
            format: 'd-m-Y', // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000
            lang: 'th', // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
            inline: true
        });


        // กรณีใช้แบบ input
        $(".testdate5").datetimepicker({
            zIndex: 2048,
            timepicker: false,
            format: 'd-m-Y', // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000
            lang: 'th', // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
            onSelectDate: function(dp, $input) {
                var yearT = new Date(dp).getFullYear() - 0;
                var yearTH = yearT + 543;
                var fulldate = $input.val();
                var fulldateTH = fulldate.replace(yearT, yearTH);
                $input.val(fulldateTH);
            },
        });
        // กรณีใช้กับ input ต้องกำหนดส่วนนี้ด้วยเสมอ เพื่อปรับปีให้เป็น ค.ศ. ก่อนแสดงปฏิทิน
        $(".testdate5").on("mouseenter mouseleave", function(e) {
            var dateValue = $(this).val();
            if (dateValue != "") {
                var arr_date = dateValue.split("-"); // ถ้าใช้ตัวแบ่งรูปแบบอื่น ให้เปลี่ยนเป็นตามรูปแบบนั้น
                // ในที่นี้อยู่ในรูปแบบ 00-00-0000 เป็น d-m-Y  แบ่งด่วย - ดังนั้น ตัวแปรที่เป็นปี จะอยู่ใน array
                //  ตัวที่สอง arr_date[2] โดยเริ่มนับจาก 0
                if (e.type == "mouseenter") {
                    var yearT = arr_date[2] - 543;
                }
                if (e.type == "mouseleave") {
                    var yearT = parseInt(arr_date[2]) + 543;
                }
                dateValue = dateValue.replace(arr_date[2], yearT);
                $(this).val(dateValue);
            }
        });
    });
</script>

<script>
    function chkNumber(ele) {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
        ele.onKeyPress = vchar;
    }
</script>

<script>
    function checkFrm() {
        const taxpayer_no = document.edit_data.taxpayer_no;
        // const simexp = document.edit_data.simexp;
        const promo = document.edit_data.promo;
        // const next_bill = document.edit_data.next_bill;
        const next_dill = document.edit_data.next_dill;
        // const tax_exp = document.edit_data.tax_exp;
        const tech = document.edit_data.tech;

        if (taxpayer_no.value === "") {
            taxpayer_no.focus();
            alert("กรุณากรอกเลขประจำตัวผู้เสียภาษี");
            return false;
        } else if (promo.value === "") {
            promo.focus();
            alert("กรุณาเลือกรหัสโปรโมชั่น");
            return false;
        } else if (next_dill.value === "") {
            next_dill.focus();
            alert("กรุณาเลือกวันที่เก็บเงินรอบถัดไป");
            return false;
        } else if (tech.value === "") {
            tech.focus();
            alert("กรุณากรอกช่างติดตั้งคนแรก");
            return false;
        }
        // console.log(customerSelect);
        return true;
    }
</script>

</html>