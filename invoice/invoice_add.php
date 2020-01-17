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
$inv_id = 0;
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
$inv_mail  = isset($row_invoice['inv_email']) ? $row_invoice['inv_email'] : '';
$inv_date  = isset($row_invoice['inv_date']) ? $row_invoice['inv_date'] : '';


$vatValue = isset($row_invoice['inv_vat']) ? $row_invoice['inv_vat'] : '';
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
                            <div class="form-group col-md-4">
                                <label for="customer">ชื่อลูกค้า</label>
                                <select class="form-control select2 form-control-sm" name="customer" id="customer" onchange="getAddressCus(this.value)">
                                    <option value="" disabled selected hidden> >--- เลือกรายการลูกค้า ---< </option> <?php
                                                                                                                        $sql_customer = "SELECT * FROM customer";
                                                                                                                        $qr_customer = $conn->query($sql_customer);
                                                                                                                        while ($rowsCustomer = $qr_customer->fetch_assoc()) {
                                                                                                                        ?> <option value="<?php echo $rowsCustomer['cus_id'] ?>">
                                            <?php echo $rowsCustomer['cus_user'] ?> | <?php echo $rowsCustomer['cus_name'] ?></option>
                                <?php
                                                                                                                        }
                                ?>
                                </select>
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group col-md-4">
                                <label for="date1">ลงวันที่</label>

                                <input type="text" id="billDate" class="form-control form-control-sm" size="10" name="billDate" onchange="changeinvNumber(this.value)" autocomplete="off" readonly>
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                        <?php } ?>
                        <div id="invoice-number" class="form-group col-md-4 align-self-center bg-info p-2 text-white">
                            <label for="">เลขที่ :</label>
                            <span id="numberBillShow"><?php echo $invNo_all ?></span>
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                    </div>

                    <hr>

                    <div class="table-responsive">
                        <input type="text" name="inv_id" id="inv_id" value="<?php echo $inv_id ?>" hidden>
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
                                    <td><input type="text" class="form-control-plaintext form-control-sm" id="dateThai" value="<?php echo $inv_date; ?>" readonly></td>
                                    <?php if ($inv_id != 0) { ?>
                                        <th colspan="2" class="text-right"> <button type="button" class="btn btn-info btn-sm " name="edit_cus" id="edit_cus" onclick="editCustomer()"><i class="fad fa-edit"></i> แก้ไขข้อมูลลูกค้า</button></th>
                                    <?php } ?>
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
                                    <td rowspan="2"><textarea id="cus_address" class="form-control form-control-sm" name="cus_address" cols="30" rows="3" required><?php echo $inv_address ?></textarea> </td>
                                    <th>เลขประจำตัวผู้เสียภาษี</th>
                                    <td><input id="cus_taxno" name="cus_taxno" class="form-control form-control-sm" type="text" value="<?php echo $inv_taxno ?>"></td>
                                </tr>


                                <tr>
                                    <th>เลขที่สาขา</th>
                                    <td><input id="cus_company" name="cus_company" class="form-control form-control-sm" type="text" value="<?php echo $inv_company ?>"></th>
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
                                    <td><input id="cus_name" name="cus_name" class="form-control form-control-sm" type="text" value="<?php echo $inv_name ?>" required></td>

                                    <th>เบอร์โทร</th>
                                    <td><input id="cus_tel" name="cus_tel" class="form-control form-control-sm" type="text" value="<?php echo $inv_tel ?>"></td>
                                </tr>
                                <tr>
                                    <th>รหัสลูกค้า</td>
                                    <td><input id="cus_user" name="cus_user" class="form-control form-control-sm" type="text" value="<?php echo $inv_user ?>" readonly></td>
                                    <th>อีเมลล์</td>
                                    <td><input id="cus_mail" name="cus_mail" class="form-control form-control-sm" type="text" value="<?php echo $inv_mail ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group col text-center">
                            <button type="submit" class="btn btn-sm btn-success" name="ok_head" id="ok_head" style="display: inline"><i class="fad fa-save"></i> บันทึก</button>
                            <button type="button" class="btn btn-danger btn-sm" name="close_bill" id="close_bill" style="display: none"> <i class="far fa-times"></i> ปิดบิล</button>
                        </div>
                </form>
                <hr>
                <?php
                if (isset($_GET['inv'])) {
                    $sql_invService = "SELECT * FROM v_service_lists WHERE inv_id = $_GET[inv]";
                    $qr_invService = $conn->query($sql_invService);
                    $countOfService = $qr_invService->num_rows;
                ?>
                    <selection id="sevrice_list" class="col p-0" style="display: block">
                        <div class="form-group m-0">
                            <button type="button" class="btn btn-sm btn-primary " data-toggle="modal" data-target="#service_list"> <span class="far fa-plus"></span> เพิ่มรายการ</button>
                        </div>
                        <form id="form-service" action="" method="post" onsubmit="">
                            <table id="list" class="table table-bordered table-sm ">
                                <thead class="bg-info text-white">
                                    <tr>

                                        <th>รายการ</th>
                                        <th colspan="2">รายละเอียด</th>
                                        <th>จำนวน/คัน</th>
                                        <th class="text-right price">รวมเป็นเงิน</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalPrice = 0;
                                    $vatStr = 0;
                                    $priceNovat = 0;
                                    $totalVat = 0;
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
                                                <td class="text-left" style="width : 25%; font-size: small;"><?php echo $row_invService['inv_list_name'] ?></td>
                                                <td class="text-left" style="width : 45%">
                                                    <i class="fal fa-check" id="okDetail<?php echo $inv_service_id ?>" style="display: none; color:green"></i>
                                                    <input alt="<?php echo $row_invService['inv_service_id'] ?>" value="<?php echo $inv_service_detail ?>" type="text" name="inv_service_detail<?php echo $row_invService['inv_service_id'] ?>" id="inv_service_detaill<?php echo $row_invService['inv_service_id'] ?>" onkeydown="return (event.keyCode!=13);" onchange="changeServiceDetail(this.alt, this.value)">
                                                    <?php
                                                    if ($countOfitems > 0) {
                                                        while ($row_items = $qr_invItems->fetch_assoc()) {
                                                            echo '<span class="service-carlist">' . $row_items['address'] . "/" . $row_items['amper'] . "/" . $row_items['user'] . ', <span>';
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td style="width : auto"><button type="button" class="btn btn-sm btn-warning btn-block" data-toggle="modal" data-target="#carList" data-whatever="<?php echo $row_invService['inv_service_id']; ?>"> <i class="fad fa-car"></i> </>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $countOfitems ?>
                                                </td>
                                                <td>
                                                    <input lang="5" alt="<?php echo $row_invService['inv_service_id'] ?>" value="<?php echo $inv_total_price ?>" class="" onkeypress="return chkNumber(this)" onchange="changeServiceTotal(this.alt, this.value)" type="text" name="service_total<?php echo $row_invService['inv_service_id'] ?>" id="service_total<?php echo $row_invService['inv_service_id'] ?>" required data-value-missing="Translate('Required')">
                                                    <i class="far fa-check" id="okTotal<?php echo $inv_service_id ?>" style="display: none; color:green"></i>
                                                </td>
                                                <td><button type="submit" class="btn btn-link btn-sm" name="del_serv_list" id="del_serv_list" value="<?php echo $row_invService['inv_service_id'] ?>">ลบ</button></td>
                                            </tr>
                                        <?php
                                        }  //end while 
                                        // คำนวณยอดเงิน
                                        $totalPrice = $totalPrice;
                                        $vatStrValue = $vatValue;
                                        if ($vatStrValue == 1) {
                                            $vatStr = ($totalPrice - ($totalPrice / 1.07));
                                            $priceNovat = ($totalPrice - $vatStr);
                                            $totalVat = ($vatStr + $priceNovat);
                                        } elseif ($vatStrValue == 7) {
                                            $vatStr = ($totalPrice * (7 / 100));
                                            $priceNovat = ($totalPrice);
                                            $totalVat = ($vatStr + $totalPrice);
                                        }

                                        $withholding = ($totalVat * ($withholdingValue / 100));
                                        $totalPay = ($totalVat - $withholding);

                                        $totalPriceStr = number_format($totalPrice, 2);
                                        $vatStr = number_format($vatStr, 2);
                                        $priceNovatStr = number_format($priceNovat, 2);
                                        $totalVatStr = number_format(($totalVat), 2);
                                        $withholdingStr = number_format(($totalPrice * ($withholdingValue / 100)), 2);
                                        $totalPayStr = number_format(($totalVat - $withholding), 2);
                                    } //end if


                                    if ($countOfService > 0) {
                                        ?>

                                        <tr id="">
                                            <td colspan="3">รวมเป็นเงิน</td>
                                            <td></td>
                                            <td><input type="text" readonly class="form-control-plaintext form-control-sm" id="totalPrice" name="totalPrice" value="<?php echo $totalPriceStr ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">ภาษีมูลค่าเพิ่ม 7%</td>
                                            <td>
                                                <div class="">
                                                    <select class="" name="value_vat" id="value_vat" onchange="changeInvoiceVat(this)">
                                                        <option <?php if ($vatValue == 0) {
                                                                    echo 'selected';
                                                                } ?> value="0">ไม่บวกภาษี</option>
                                                        <option <?php if ($vatValue == 7) {
                                                                    echo 'selected';
                                                                } ?> value="7">Vat นอก</option>
                                                        <option <?php if ($vatValue == 1) {
                                                                    echo 'selected';
                                                                } ?> value="1">Vat ใน</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td><input type="text" readonly class="form-control-plaintext form-control-sm" id="vat" name="vat" value="<?php echo $vatStr ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">ราคาไม่รวมภาษีมูลค่าเพิ่ม</td>
                                            <td></td>
                                            <td><input type="text" readonly class="form-control-plaintext form-control-sm" id="priceNovatStr" name="priceNovatStr" value="<?php echo $priceNovatStr ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" id="bahtText">(<?php echo bahtText($totalVat) ?>)</td>
                                            <td colspan="2">จำวนวเงินรวมทั้งสิ้น</td>
                                            <td></td>
                                            <td><input type="text" readonly class="form-control-plaintext form-control-sm" id="totalVat" name="totalVat" value="<?php echo $totalVatStr ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">หัก ณ ที่จ่าย (%)</td>
                                            <td style="width: auto;">
                                                <input type="text" onkeypress="return chkNumber(this)" onchange="changeInvoiceWithholding(this.value)" name="value_withholding" id="value_withholding" class="form-control form-control-sm" size="2" value="<?php echo $withholdingValue ?>">
                                            </td>
                                            <td><input type="text" readonly class="form-control-plaintext form-control-sm" id="withholding" name="withholding" value="<?php echo $withholding ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">ยอดชำระ</td>
                                            <td></td>
                                            <td><input type="text" readonly class="form-control-plaintext form-control-sm" id="totalPay" name="totalPay" value="<?php echo $totalPay ?>"></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="col text-center">
                                <button type="button" class="btn btn-sm btn-success" onclick="return confirm_swal2(this)" id="printBill"><i class="fad fa-print"></i> Print</button>
                                <button type="button" class="btn btn-sm btn-success" onclick="return confirm_swal2(this)" id="printInvoice"><i class="fad fa-print"></i> Print</button>
                                <!-- <button style="display: none" type="button" class="btn btn-sm btn-primary" onclick="fxprintInvoice()" id="printInvoice" name="printInvoice"><i class="fad fa-print"></i> Print</button> -->
                            </div>
                            <div class="col text-center text-success" style="display: none" id="printSuccess">
                                <b><i class="fad fa-check"></i>success</b>
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
                                        <td><?php echo $row_list['inv_list_id'] ?></td>
                                        <td class="text-left"><?php echo $row_list['inv_list_name'] ?></td>
                                        <td class="text-center"> <button type="submit" name="add_list" value="<?php echo $row_list['inv_list_id'] ?>" class="btn btn-primary btn-sm"><i class="far fa-plus"></i></button> </td>
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
                                        <td class="text-center"><?php echo $row_carlist['id'] ?></td>
                                        <td class="text-center"><?php echo $row_carlist['amper'] ?></td>
                                        <td class="text-center"><?php echo $row_carlist['province'] ?></td>
                                        <td class="text-center"><?php echo $row_carlist['zipcode'] ?></td>
                                        <td class="text-center"><input type="checkbox" class="form-comtrol" name="select-car[]" value="<?php echo $row_carlist['id'] ?>"></td>
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
require 'model/model_actionForm.php';
?>