<?php 
    require('../../config.php');
    $id = $_POST['id'];
    $vat = $_POST['vat'];

    $sql_vat = "UPDATE invoice SET inv_vat = $vat WHERE inv_id = $id";
    $qr_vat = $conn->query($sql_vat);
    if ($qr_vat) {
        echo "ok";
    }else{
        echo $conn->error;
    }
?>