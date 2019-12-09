<?php 
    require('../../config.php');
    $id_value = $_POST['id'];
    $detail_value = $_POST['total'];

    $sql_changeDetail = "UPDATE invoice_service SET inv_total_price = '$detail_value' WHERE inv_service_id = $id_value";
    $qr_changeDetail = $conn->query($sql_changeDetail);
    if ($qr_changeDetail) {
        echo "ok";
    }else{
        echo $conn->error;
    }
?>