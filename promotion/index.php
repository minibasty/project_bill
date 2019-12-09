<!-- Promotion Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Promotion Manage</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="promotion_style.css"> -->
    <style>
    .card-body{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    /* text-align: center; */
    }
      body{
            font-family:tahoma, Arial,"Times New Roman";
            font-size:14px;
        }
    </style>
</head>
<?php 
    // require '../config.php';

    // select list promotion 
    $sql_promo="SELECT * FROM promotions ORDER BY promo_code DESC";
    $qr_promo=$conn->query($sql_promo);

?>
<body>
    <form action="" method="post">
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-body bg-white">
                <div class="form-row">
                    <div class="form-group col">
                        <h3 class="card-title">Promotion Manager</h3>
                    </div>
                    <div class="form-group col text-right">
                        <a href="?p=promotionadd"><button class="btn btn-primary" type="button" > <span class="fas fa-plus"></span> เพิ่มโปรโมชั่น</button></a>
                    </div>
                </div>
                <hr style="margin-top:0px;">
                <div class="form-row">
                    <div class="form-group col">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>รหัสโปรโมชั่น</td>
                                    <td>รายละเอียด</td>
                                    <td>รูปภาพ</td>
                                    <td style="width:auto">โปรเริ่มต้น</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row_promo=$qr_promo->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td class="text-center"><?= $row_promo['promo_id'] ?></td>
                                    <td class="text-center"><?= $row_promo['promo_code'] ?></td>
                                    <td><?= $row_promo['promo_note'] ?></td>
                                    <td class="text-center"><?= $row_promo['promo_pic'] ?></td>
                                    <td class="text-center"><?= $row_promo['promo_default'] ?></td>
                                    <td>
                                      <a href="?p=promotionedit&promo=<?= $row_promo['promo_id'] ?>"><button class="btn btn-info btn-sm" type="button" >แก้ไข</button></a>
                                    <button class="btn btn-danger btn-sm" type="submit" name="del" value="<?= $row_promo['promo_id'] ?>" onclick="return confirm('ยืนยันการลบ')">ลบ</button>
                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <?php 
    if (isset($_POST['del'])) {
        $del="DELETE FROM promotions WHERE promo_id='$_POST[del]'";
        $qr_del=$conn->query($del);
        if ($qr_del) {
            echo "<script> alert('ลบสำเร็จ');";
            echo "window.location = '?p=promotion';";
            echo "</script>";
        }
    }
    ?>
</body>
</html>
    <script src="../js/jquery-3.4.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>