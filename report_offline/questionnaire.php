<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ออกรายงาน</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
    </script>

    <style>
    table {
        max-width: 100%;
    }
    </style>
</head>

<body>
    <?php
require 'function_date.php';
require 'config.php';

$sql = "SELECT
`report_offline`.`report_id`,
  `member`.`amper`,
  `member`.`province`,
  `member`.`zipcode`,
  `member`.`user`,
  `report_offline`.`report_title`,
  `report_offline`.`report_des`,
  `report_offline`.`report_contact`,
  `report_offline`.`report_stamp`,
  `title_type`.`title_name`
  
FROM
  `member`
  INNER JOIN `report_offline` ON
    `member`.`id` = `report_offline`.`report_device`
  INNER JOIN `title_type` ON `report_offline`.`report_title` =
    `title_type`.`title_id`  ORDER BY report_id DESC";
$result = $conn->query($sql);
?>
    <p>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-success font-weight-bold text-white">
                    รายการ แบบสอบถาม
                </div>
                <div class="card-body">
                    <p>
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <table id="example" class="display " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ทะเบียนรถ</th>
                                            <th>จังหวัด</th>
                                            <th>คัสซี</th>
                                            <th>หมายเหตุ</th>
                                            <th>รายละเอียกเพิ่มเติม</th>
                                            <th>เบอร์โทร</th>
                                            <th>เวลา</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        while ($rs = $result->fetch_assoc()) {
                                    ?>

                                    <tr>
                                        <td width="1%"><?= $rs['report_id'] ?></td>
                                        <td width="4%"><?= $rs['amper'] ?></td>
                                        <td width="5%"><?= $rs['province'] ?></td>
                                        <td width="5%"><div title="<?= $rs['user'] ?>"><?= mb_strimwidth($rs['user'],0,10,'...','UTF-8');?></div></td>
                                        <td width="10%"><?= $rs['title_name'] ?></td>
                                        <td width="30%"><?= $rs['report_des'] ?></td>
                                        <td width="5%"><?= $rs['report_contact'] ?></td>
                                        <td width="7%"><?= DateUTC($rs['report_stamp'])?></td>
                                    </tr>


                                    <?php
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</body>

</html>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>