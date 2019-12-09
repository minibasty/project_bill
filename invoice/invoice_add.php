<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="invoice/css/invoice-add.css">
    <link rel="stylesheet" href="vendor\datepicker_buddhist\css\ui-lightness\jquery-ui-1.8.10.custom.css">
    <script type="text/javascript" src="vendor\datepicker_buddhist\js\jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="vendor\datepicker_buddhist\js\jquery-ui-1.8.10.offset.datepicker.min.js">
    </script>
    <script type="text/javascript">
        // ป้องกันไม่ให้ jQueryชนกัน 
        jq14 = jQuery.noConflict();
        jq14(function($) {
            var d = new Date();
            var toDay = d.getDate() + '-' + (d.getMonth() + 1) + '-' + (d.getFullYear() + 543);

            // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)
            console.log(toDay);
            $("#billDate").datepicker({
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




    <title>Invoice Add</title>
    <style>
        table tbody {
            text-align: right;
        }

        table tbody td {
            width: auto;
        }

        table tbody th {
            width: 15%;
        }

        table thead tr {
            height: 2em;
        }

        #list thead tr {
            width: auto;
            text-align: center;
        }

        .price {
            width: 10%
        }
    </style>
</head>
<?php

// Query invoice if have param inv
if (isset($_GET['inv'])) {
    $inv_id = $_GET['inv'];
    $sql_invoice = "SELECT * FROM v_invoice_user WHERE inv_id = $inv_id";
    $qr_invoice = $conn->query($sql_invoice);
    $row_invoice = $qr_invoice->fetch_assoc();
}

$invNo_all  = isset($row_invoice['invNo_all']) ? $row_invoice['invNo_all'] : '';
$inv_address  = isset($row_invoice['inv_address']) ? $row_invoice['inv_address'] : '';
$inv_taxno  = isset($row_invoice['inv_taxno']) ? $row_invoice['inv_taxno'] : '';
$inv_company  = isset($row_invoice['inv_company']) ? $row_invoice['inv_company'] : '';
$inv_name  = isset($row_invoice['inv_name']) ? $row_invoice['inv_name'] : '';
$inv_tel  = isset($row_invoice['inv_tel']) ? $row_invoice['inv_tel'] : '';
$inv_user  = isset($row_invoice['cus_user']) ? $row_invoice['cus_user'] : '';
$inv_mail  = isset($row_invoice['inv_mail']) ? $row_invoice['inv_mail'] : '';
$inv_date  = isset($row_invoice['inv_date']) ? $row_invoice['inv_date'] : '';


echo $vatValue = isset($row_invoice['inv_vat']) ? $row_invoice['inv_vat'] : '';
$withholdingValue = isset($row_invoice['inv_withholding']) ? $row_invoice['inv_withholding'] : '';
// check vat 

?>

<body>
    <div class="container-fluid mt-4">
        <div id="alert-Duplicate" class="row" style="display:none">
            <div class="col-12">
                <div id="alert-show" class="alert alert-red ">หมายเลขใบเสร็จซ้ำก่อนหน้านี้ กรุณาสร้างใหม่ !!</div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form name="inv_head" action="" method="post" onsubmit="return checkFrm()">
                    <div class="form-row justify-content-between">
                        <?php
                        if (!isset($_GET['inv'])) {
                            ?>
                            <div class="form-group col-md-3">
                                <label for="customer">ชื่อลูกค้า</label>
                                <select class="form-control select2 form-control-sm" name="customer" id="customer" onchange="getAddressCus(this.value)">
                                    <option value="" disabled selected hidden> >--- เลือกรายการลูกค้า ---< </option> <?php
                                                                                                                            $sql_customer = "SELECT * FROM customer";
                                                                                                                            $qr_customer = $conn->query($sql_customer);
                                                                                                                            while ($rowsCustomer = $qr_customer->fetch_assoc()) {
                                                                                                                                ?> <option value="<?= $rowsCustomer['cus_id'] ?>">
                                            <?= $rowsCustomer['cus_user'] ?> | <?= $rowsCustomer['cus_name'] ?></option>
                                <?php
                                    }
                                    ?>
                                </select>
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group col-md-3">
                                <label for="date1">ลงวันที่</label>

                                <input type="text" id="billDate" class="form-control form-control-sm" size="10" name="billDate" onchange="changeinvNumber(this.value)" autocomplete="off" readonly>
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                        <?php } ?>
                        <div id="invoice-number" class="form-group col-md-6 align-self-center bg-info p-2 text-white">
                            <label for="">เลขที่ :</label>
                            <span id="numberBillShow"><?= $invNo_all ?></span>
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                    </div>

                    <hr>

                    <div class="table-responsive">
                        <input type="text" name="inv_id" id="inv_id" value="<?= $inv_id ?>" hidden>
                        <input type="text" name="cus_id" id="cus_id" hidden>
                        <!-- hidden invoice number for submit form  -->
                        <input type="text" name="inv_prefix" id="inv_prefix" hidden>
                        <input type="text" name="inv_m" id="inv_m" hidden>
                        <input type="text" name="inv_y" id="inv_y" hidden>
                        <input type="text" name="inv_count" id="inv_count" hidden>
                        <input type="text" name="inv_all" id="inv_all" hidden>
                        <input type="text" name="inv_date" id="inv_date" hidden>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th class="text-right">วันที่</th>
                                    <td><input type="text" readonly class="form-control-plaintext form-control-sm" id="dateThai" value="<?= $inv_date; ?>"></td>
                                </tr>
                            </thead>
                            <thead>
                                <tr cellspacing="10" class="bg-secondary text-white">
                                    <th colspan="6">ข้อมูลที่อยู่</th>
                                    <!-- <th colspan="2">ทดสอบ</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th rowspan="2">ที่อยู่</td>
                                    <td rowspan="2"><textarea id="cus_address" class="form-control form-control-sm" name="cus_address" cols="30" rows="3"><?= $inv_address ?></textarea> </td>
                                    <th>เลขประจำตัวผู้เสียภาษี</th>
                                    <td><input id="cus_taxno" name="cus_taxno" class="form-control form-control-sm" type="text" value="<?= $inv_taxno ?>"></td>
                                </tr>


                                <tr>
                                    <th>เลขที่สาขา</th>
                                    <td><input id="cus_company" name="cus_company" class="form-control form-control-sm" type="text" value="<?= $inv_company ?>"></th>
                                </tr>
                            </tbody>
                            <thead>
                                <tr cellspacing="10" class="bg-secondary text-white">
                                    <th colspan="6">ข้อมูลผู้ติดต่อ</th>
                                    <!-- <th colspan="2">ทดสอบ</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>ชื่อลูกค้า</td>
                                    <td><input id="cus_name" name="cus_name" class="form-control form-control-sm" type="text" value="<?= $inv_name ?>"></td>

                                    <th>เบอร์โทร</th>
                                    <td><input id="cus_tel" name="cus_tel" class="form-control form-control-sm" type="text" value="<?= $inv_tel ?>"></td>
                                </tr>
                                <tr>
                                    <th>รหัสลูกค้า</td>
                                    <td><input id="cus_user" name="cus_user" class="form-control form-control-sm" type="text" value="<?= $inv_user ?>"></td>
                                    <th>อีเมลล์</td>
                                    <td><input id="cus_mail" name="cus_mail" class="form-control form-control-sm" type="text" value="<?= $inv_mail ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                        if (!isset($_GET['inv'])) {
                            ?>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-sm" name="ok_head"><i class="fad fa-save"></i>
                                    บันทึก</button>
                            </div>
                        <?php } else { ?>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger btn-sm" name="del_head"><i class="fad fa-save"></i> ลบใบเสร็จ</button>
                            </div>
                        <?php } ?>
                </form>
                <hr>
                <?php
                if (isset($_GET['inv'])) {
                    $sql_invService = "SELECT * FROM v_service_lists WHERE inv_id = $_GET[inv]";
                    $qr_invService = $conn->query($sql_invService);
                    $countOfService = $qr_invService->num_rows;
                    ?>
                    <selection class="col p-0">
                        <div class="form-group m-0">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#service_list"> <span class="fa fa-plus"></span> เพิ่มรายการ</button>
                        </div>
                        <form action="" method="post">
                            <table id="list" class="table table-bordered table-sm ">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>รายการ</th>
                                        <th colspan="2">รายละเอียด</th>
                                        <th>จำนวน/คัน</th>
                                        <th class="text-right price">รวมเป็นเงิน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $totalPrice = 0;
                                        if ($countOfService > 0) {
                                            while ($row_invService = $qr_invService->fetch_assoc()) {

                                                // list items from service 
                                                $sql_invItems = "SELECT * FROM v_service_items WHERE inv_service_id = $row_invService[inv_service_id]";
                                                $qr_invItems = $conn->query($sql_invItems);
                                                $countOfitems = $qr_invItems->num_rows;

                                                // all Price total
                                                $totalPrice += $row_invService['inv_total_price'];


                                                $inv_service_detail = isset($row_invService['inv_service_detail']) ? $row_invService['inv_service_detail'] : '';
                                                $inv_total_price = isset($row_invService['inv_total_price']) ? $row_invService['inv_total_price'] : '';
                                                $inv_service_id = isset($row_invService['inv_service_id']) ? $row_invService['inv_service_id'] : '';
                                                ?>
                                            <tr>
                                                <td class="text-left"><?= $row_invService['inv_list_name'] ?></td>
                                                <td class="text-left" style="width : auto">
                                                    <i class="fal fa-check" id="okDetail<?= $inv_service_id ?>" style="display: none; color:green"></i>
                                                    <input alt="<?= $row_invService['inv_service_id'] ?>" value="<?= $inv_service_detail ?>" type="text" name="inv_service_detail<?= $row_invService['inv_service_id'] ?>" id="inv_service_detaill<?= $row_invService['inv_service_id'] ?>" onkeydown="return (event.keyCode!=13);" onchange="changeServiceDetail(this.alt, this.value)">
                                                    <?php
                                                                if ($countOfitems > 0) {
                                                                    while ($row_items = $qr_invItems->fetch_assoc()) {
                                                                        echo $row_items['amper'] . ", ";
                                                                    }
                                                                }

                                                                ?>
                                                </td>
                                                <td style="width : auto"><button type="button" class="btn btn-sm btn-warning btn-block" data-toggle="modal" data-target="#carList" data-whatever="<?= $row_invService['inv_service_id']; ?>"> <i class="fad fa-car"></i> </>
                                                </td>
                                                <td class="text-center">
                                                    <?= $countOfitems ?>
                                                </td>
                                                <td>
                                                    <input lang="5" alt="<?= $row_invService['inv_service_id'] ?>" value="<?= $inv_total_price ?>" class="" onkeypress="return chkNumber(this)" onchange="changeServiceTotal(this.alt, this.value)" type="text" name="service_total<?= $row_invService['inv_service_id'] ?>" id="service_total<?= $row_invService['inv_service_id'] ?>">
                                                    <i class="far fa-check" id="okTotal<?= $inv_service_id ?>" style="display: none; color:green"></i>
                                                </td>
                                            </tr>
                                        <?php
                                                }  //end while 
                                                // คำนวณยอดเงิน
                                                $totalPrice = number_format($totalPrice, 2);
                                                $vat = number_format(($totalPrice * ($vatValue / 100)), 2);
                                                $totalVat = number_format(($totalPrice + $vat), 2);
                                                $withholding = number_format(($totalPrice * ($withholdingValue / 100)), 2);
                                                $totalPay = number_format(($totalVat - $withholding), 2);
                                            } //end if


                                            if ($countOfService > 0) {
                                                ?>

                                        <tr id="">
                                            <td colspan="3">รวมเป็นเงิน</td>
                                            <td></td>
                                            <td><input type="text" readonly class="form-control-plaintext form-control-sm" id="totalPrice" name="totalPrice" value="<?= $totalPrice ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">ภาษีมูลค่าเพิ่ม 7%</td>
                                            <td>
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input alt="" type="checkbox" class="custom-control-input" <?php if ($vatValue == 7) { echo "checked"; } ?> id="value_vat" onclick="changeInvoiceVat(this)">
                                                    <label class="custom-control-label" for="value_vat"></label>
                                                </div>
                                            </td>
                                            <td><input type="text" readonly class="form-control-plaintext form-control-sm" id="vat" name="vat" value="<?= $vat ?>"></td>
                                        </tr>
                                        <tr>
                                            <td id="bahtText">(<?= bahtText($totalVat) ?>)</td>
                                            <td colspan="2">จำวนวเงินรวมทั้งสิ้น</td>
                                            <td></td>
                                            <td><input type="text" readonly class="form-control-plaintext form-control-sm" id="totalVat" name="totalVat" value="<?= $totalVat ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">หัก ณ ที่จ่าย (%)</td>
                                            <td style="width: auto;">
                                                <input type="text" onkeypress="return chkNumber(this)" onchange="changeInvoiceWithholding(this.value)" name="value_withholding" id="value_withholding" class="form-control form-control-sm" size="2" value="<?= $withholdingValue ?>">
                                            </td>
                                            <td><input type="text" readonly class="form-control-plaintext form-control-sm" id="inv_withholding" name="inv_withholding" value="<?= $withholding ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">ยอดชำระ</td>
                                            <td></td>
                                            <td><input type="text" readonly class="form-control-plaintext form-control-sm" id="totalPay" name="totalPay" value="<?= $totalPay ?>"></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="col text-center">
                                <button id="saveInvoice" type="button" class="btn btn-sm btn-success" onclick="return (confirm('ยืนยันการบันบึก!'), setInvoiceTotal())"><i class="fad fa-save"></i> Save</button>
                                <button id="printInvoice" style="display: none" type="button" class="btn btn-sm btn-primary" onclick=""><i class="fad fa-print"></i> Print</button>
                            </div>
                        </form>
                    </selection>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->

    <?php
    $sql_list = "SELECT * FROM invoice_list";
    $qr_list = $conn->query($sql_list);
    ?>
    <form name="form-list" action="" method="post">
        <div class="modal fade" id="service_list" tabindex="-1" role="dialog" aria-labelledby="service_list" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="service_list-title">เลือกรายการ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>รหัส</th>
                                    <th>รายการ</th>
                                    <th>เลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row_list = $qr_list->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?= $row_list['inv_list_id'] ?></td>
                                        <td class="text-left"><?= $row_list['inv_list_name'] ?></td>
                                        <td class="text-center"> <button type="submit" name="add_list" value="<?= $row_list['inv_list_id'] ?>" class="btn btn-primary btn-sm"><i class="far fa-plus"></i></button> </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- modal list car  -->
    <?php
    $sql_carlist = "SELECT id, amper, phone, user, province,zipcode  FROM member WHERE phone = '$inv_user'";
    $qe_carlist = $conn->query($sql_carlist);
    ?>
    <form name="form-item" action="" method="post">
        <div class="modal fade" id="carList" tabindex="-1" role="dialog" aria-labelledby="carList" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="car_list-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="inv_service_id" id="inv_service_id" hidden>
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>รหัส</th>
                                    <th>ทะเบียน</th>
                                    <th>จังหวัด</th>
                                    <th>imei</th>
                                    <th>เลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row_carlist = $qe_carlist->fetch_assoc()) { ?>
                                    <tr>
                                        <td class="text-center"><?= $row_carlist['id'] ?></td>
                                        <td class="text-center"><?= $row_carlist['amper'] ?></td>
                                        <td class="text-center"><?= $row_carlist['province'] ?></td>
                                        <td class="text-center"><?= $row_carlist['zipcode'] ?></td>
                                        <td class="text-center"><input type="checkbox" class="form-comtrol" name="select-car[]" value="<?= $row_carlist['id'] ?>"></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="col text-center">
                            <button class="btn btn-success btn-sm" name="add_car"> <i class="fad fa-save"></i>
                                บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select2').select2();
    });

    // $("#customer").find("option").eq(0).remove();

    $('#carList').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('invoice list No. ' + recipient)
        modal.find('.modal-body #inv_service_id').val(recipient)
    });
</script>

<script src="invoice\js\app\invoice_add.js"></script>

<?php
$url_str =  $_SERVER['REQUEST_URI'];

if (isset($_POST['ok_head'])) {
    $sql_insert = "INSERT INTO `invoice`(`inv_status`, `inv_cus_id`, `inv_name`, `inv_tel`, `inv_taxno`, `inv_address`, `inv_company`, `inv_email`, `invNo_prefix`, `invNo_y`, `invNo_m`, `invNo_count`, `invNo_all`, `inv_date`) 
        VALUES ('0','$_POST[cus_id]','$_POST[cus_name]','$_POST[cus_tel]','$_POST[cus_taxno]','$_POST[cus_address]','$_POST[cus_company]','$_POST[cus_mail]','$_POST[inv_prefix]','$_POST[inv_y]','$_POST[inv_m]','$_POST[inv_count]','$_POST[inv_all]','$_POST[inv_date]')";
    $qr_insert = $conn->query($sql_insert);
    if ($qr_insert) {
        $last_insert_id = $conn->insert_id;
        header("location:" . $url_str . "&inv=" . $last_insert_id);
    } else {
        echo $conn->error;
        echo '<script>document.getElementById("alert-Duplicate").style.display="block"</script>';
    }
}

if (isset($_POST['add_list'])) {
    $list_id_ins = $_POST['add_list'];
    $inv_id_ins = $_GET['inv'];
    $sql_ins_list = "INSERT INTO `invoice_service`(`inv_list_id`, `inv_id`) ";
    $sql_ins_list .= " VALUES ('$list_id_ins','$inv_id_ins')";
    $qr_ins_list = $conn->query($sql_ins_list);
    if ($qr_ins_list) {
        header("location:" . $url_str);
    } else {
        echo $conn->error;
    }
}

if (isset($_POST['add_car'])) {
    $carSelects = $_POST['select-car'];
    $service_id = $_POST['inv_service_id'];
    $sql_insertCar = "INSERT INTO invoice_service_items VALUES ";

    $countSelect = count($carSelects);
    $i = 0;
    foreach ($carSelects as $key => $value) {
        $i++;
        $sql_insertCar .= " ('', '$service_id','$value')";
        if ($i < $countSelect) {
            $sql_insertCar .= ", ";
        }
    }
    $qr_insertCar = $conn->query($sql_insertCar);
    if ($qr_insertCar) {
        header("location:" . $url_str);
    } else {
        echo $conn->error;
    }
}


?>