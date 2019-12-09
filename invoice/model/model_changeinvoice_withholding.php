<?php 
    require('../../config.php');
    $id = $_POST['id'];
    $withholding = $_POST['withholding'];

    $sql_vat = "UPDATE invoice SET inv_withholding = $withholding WHERE inv_id = $id";
    $qr_vat = $conn->query($sql_vat);
    if ($qr_vat) {
        echo "ok";
    }else{
        echo $conn->error;
    }
?>