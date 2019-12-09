<?php //require '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Promotion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="promotion_style.css">
    <style>
            .card-body{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    /* text-align: center; */
    }
    .responsive {
    width: 100%;
    max-width: 600px;
    height: auto;
    }
    </style>
</head>
<?php 
    $promo_edit="SELECT * FROM promotions WHERE promo_id='$_GET[promo]'";
    $qr_promo_edit=$conn->query($promo_edit) or dir(mysqli_error($conn));
    $row_promo=$qr_promo_edit->fetch_assoc();
?>
<body>
    <form class="needs-validation" action="" method="POST" enctype="multipart/form-data" novalidate>
    <div class="container mt-4" >
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col">
                        <h4>เพิ่มโปรโมชั่น</h4>
                    </div>
                    <div class="form-group col text-right">
                       <a href="?p=promotion"><button class="btn btn-warning" type="button"> กลับ</button></a> 
                    </div>
                </div>
                <hr style="margin:5px;">
                <div class="form-row">                 
                    <div class="form-group col-sm-12">
                        <div class="text-center">
                            <a target="" href="#">
                                <img src="img/promo/<?= $row_promo['promo_pic'] ?>" alt="" class="responsive">
                            </a>
                            <div class="desc"> <small><?= $row_promo['promo_pic'] ?></small></div>
                        </div>
                        <label for="promo_pic">แก้ไขรูปภาพ</label>
                        <input type="file" class="form-control form-control-file " id="promo_pic" name="promo_pic">
                        <div class="invalid-feedback">
                            กรุณาเลือกรูปภาพ
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="promo_code">รหัสโปรโมชั่น </label>
                        <input type="text" class="form-control" id="promo_code" name="promo_code" value="<?= $row_promo['promo_code'] ?>" placeholder="Promotion Code" required>
                        <small class="form-text text-muted">e.g. dlt999</small>
                        <div class="invalid-feedback">
                            กรุณากรอกรหัสโปรโมชั่น
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="promo_note">รายละเอียดโปรโมชั่น</label>
                        <textarea class="form-control" id="promo_note" rows="2" name="promo_note"><?= $row_promo['promo_note'] ?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="promo_default" <?php if($row_promo['promo_default']=='1'){ echo "checked"; } ?>>
                        <label class="custom-control-label" for="customCheck1">ตั้งเป็นค่าเริ่มต้น</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group text-center col-sm-12">
                        <button class="btn btn-success" type="submit" name="ok">Save</button>
                        <button class="btn btn-danger" type="reset">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <?php 

    if (isset($_POST['ok'])) {  //เมื่อมีการกด Submit

        // เช็ครหัสโค้ด
        $check_code="SELECT * FROM promotions WHERE promo_code = '$_POST[promo_code]' AND promo_id != '$_GET[promo]'";
        $qr_check_code=$conn->query($check_code) or die(mysqli_error($conn));
        $num_check_code=$qr_check_code->num_rows;
        if ($num_check_code > 0) {
            echo "<script> alert('รหัสโปรโมชั่นนี้มีแล้ว') </script>";
        }else{
            $path ="img/promo/";
            //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
            $type = strrchr($_FILES['promo_pic']['name'],".");

            // เก็บรหัสโปรโมชั่นเพื่อมาตั่งชื่อ
            $promoCode=strtolower($_POST['promo_code']);

            //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
            $newname = "promo".$promoCode.$type;
            echo $path_upload=$path.$newname;

            //เช็คว่าไฟล์เป็นรูปภาพหรือไม่
            $check = getimagesize($_FILES["promo_pic"]["tmp_name"]);

            if($check !== false) {
                if (move_uploaded_file($_FILES["promo_pic"]["tmp_name"], $path_upload)) {
                    //ถ้าไฟล์อัพโหลดสำเร็จ -> เพิ่มลงฐานข้อมูล
                    $update_promo="UPDATE `promotions` SET `promo_code`='$_POST[promo_code]',`promo_note`='$_POST[promo_note]',`promo_pic`='$newname' ";
                    //ถ้ามีการกำหนดให้โปรโมชั่นเป็นค่าเริ่มต้น
                    if (isset($_POST['promo_default'])) {
                        $update_def="UPDATE promotions SET promo_default='0'";
                        $qr_update_def=$conn->query($update_def) or die(mysqli_error($conn));
                        
                        if ($qr_update_def) {
                            // เพิ่มสถานะ Default เป็น 1 ให้ข้อมูลที่จะ Insert 
                            $update_promo.=", `promo_default`='1' ";
                        }//if ($qr_update_def) {
                    }else{
                        // echo $update_def;
                        // เพิ่มสถานะ Default เป็น 0 ให้ข้อมูลที่จะ Insert 
                        $update_promo.=", `promo_default`='0' ";
                    }  //if (isset($_POST['promo_default'])) {
                    $update_promo.=" WHERE promo_id='$_GET[promo]'";
                    $rs_update_promo=$conn->query($update_promo) or die(mysqli_error($conn));
                    $update_promo;
                    // ถ้าเพิ่มข้อมูลสำเร็จ
                    if($rs_update_promo){
                        echo "<script>";
                        echo "alert('เพิ่มโปรโมชั่นสำเร็จ');";
                        echo "window.location = 'index.php';";
                        echo "</script>";
                    }
                } else {
                    echo "<script> alert('ไฟล์ภาพอัพโหลดไม่สำเร็จ') </script>";
                }
            } else {
                $update_promo="UPDATE `promotions` SET `promo_code`='$_POST[promo_code]',`promo_note`='$_POST[promo_note]'";
                    //ถ้ามีการกำหนดให้โปรโมชั่นเป็นค่าเริ่มต้น
                    if (isset($_POST['promo_default'])) {
                        $update_def="UPDATE promotions SET promo_default='0'";
                        $qr_update_def=$conn->query($update_def) or die(mysqli_error($conn));
                        
                        if ($qr_update_def) {
                            // เพิ่มสถานะ Default เป็น 1 ให้ข้อมูลที่จะ Insert 
                            $update_promo.=", `promo_default`='1' ";
                        }//if ($qr_update_def) {
                    }else{
                        // echo $update_def;
                        // เพิ่มสถานะ Default เป็น 0 ให้ข้อมูลที่จะ Insert 
                        $update_promo.=", `promo_default`='0' ";
                    }  //if (isset($_POST['promo_default'])) {
                    $update_promo.=" WHERE promo_id='$_GET[promo]'";
                    $rs_update_promo=$conn->query($update_promo) or die(mysqli_error($conn));
                    $update_promo;
                    // ถ้าเพิ่มข้อมูลสำเร็จ
                    if($rs_update_promo){
                        echo "<script>";
                        echo "alert('เพิ่มโปรโมชั่นสำเร็จ');";
                        echo "window.location = '?p=promotion';";
                        echo "</script>";
                    }
            }
        // echo $update_promo;                
        }  //if (isset($_POST['ok'])) {
                    
    }
?>
</body>
</html>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>