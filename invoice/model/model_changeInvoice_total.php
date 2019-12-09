<?php 
    require('../../config.php');
    $id = $_POST['id'];
    $total = $_POST['totalpay'];

    $sql_vat = "UPDATE invoice SET inv_total = $total WHERE inv_id = $id";
    $qr_vat = $conn->query($sql_vat);
    if ($qr_vat) {
        echo "ok";
    }else{
        echo $conn->error;
    }
?>