<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ออกรายงาน</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
        integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
        integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
    </script>

    <style>
    table {
        max-width: 100%;
    }
    </style>
</head>

<body>


    <?php
require 'config.php';

$sql = "SELECT
        `member`.`amper`,
        `member`.`province`,
        `member`.`user`,
        `member`.`zipcode`,
        `report_offline`.`report_title`,
        `title_type`.`title_name`,
        `report_offline`.`report_des`,
        `report_offline`.`report_contact`
        FROM
        `title_type`
        INNER JOIN `report_offline` ON `report_offline`.`report_title` =
        `title_type`.`title_id`
        INNER JOIN `member` ON `report_offline`.`report_id` = `member`.`id`";
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ทะเบียนรถ</th>
                                            <th>จังหวัด</th>
                                            <th>คัสซี</th>
                                            <th>หมายเหตุ</th>
                                            <th>รายละเอียกเพิ่มเติม</th>
                                            <th>เบอร์โทร</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        while ($rs = $result->fetch_assoc()) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $rs['amper'] ?></td>
                                            <td><?= $rs['province'] ?></td>
                                            <td><?= $rs['user'] ?></td>
                                            <td><?= $rs['title_name'] ?></td>
                                            <td><?= $rs['report_des'] ?></td>
                                            <td><?= $rs['report_contact'] ?></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-info"  type="submit" name="ok">ออกรายงาน</button>
                            </p>
                        </div>
                </div>
            </div>
        </div>
</body>

</html>