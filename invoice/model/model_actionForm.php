<?php 

// Head bill 
if (isset($_POST['ok_head'])) {
    echo "headbill";
    if ($inv_id != 0) {
        $sql_updateHead = "UPDATE invoice SET `inv_name`='$_POST[cus_name]', `inv_tel`='$_POST[cus_tel]', `inv_taxno`='$_POST[cus_taxno]', `inv_address`='$_POST[cus_address]', `inv_company`='$_POST[cus_company]', `inv_email`='$_POST[cus_mail]' WHERE inv_id = $inv_id";
        $qr_updateHead = $conn->query($sql_updateHead);
        if ($qr_updateHead) {
            echo '<script> swal2Success("'.$url_str.'")</script>';
        } else {
            echo '<script> swal2Error("'.$url_str.'")</script>';
        }
    } else {
        $sql_insert = "INSERT INTO `invoice`(`inv_status`, `inv_cus_id`, `inv_name`, `inv_tel`, `inv_taxno`, `inv_address`, `inv_company`, `inv_email`, `invNo_prefix`, `invNo_y`, `invNo_m`, `invNo_count`, `invNo_all`, `inv_date`) 
        VALUES ('0','$_POST[cus_id]','$_POST[cus_name]','$_POST[cus_tel]','$_POST[cus_taxno]','$_POST[cus_address]','$_POST[cus_company]','$_POST[cus_mail]','$_POST[inv_prefix]','$_POST[inv_y]','$_POST[inv_m]','$_POST[inv_count]','$_POST[inv_all]','$_POST[inv_date]')";
        $qr_insert = $conn->query($sql_insert);
        echo "insert";
        if ($qr_insert) {
            $last_insert_id = $conn->insert_id;
            header("location:" . $url_str . "&inv=" . $last_insert_id);
        } else {
            echo $conn->error;
            echo '<script>document.getElementById("alert-Duplicate").style.display="block";
            console.log(' . $conn->error . ');
        </script>';
        }
    }
}

// insert list serivce 
if (isset($_POST['add_list'])) {
    echo "insert service";
    $list_id_ins = $_POST['add_list'];
    $inv_id_ins = $_GET['inv'];
    $sql_ins_list = "INSERT INTO `invoice_service`(`inv_list_id`, `inv_id`) ";
    $sql_ins_list .= " VALUES ('$list_id_ins','$inv_id_ins')";
    $qr_ins_list = $conn->query($sql_ins_list);
    if ($qr_ins_list) {
        header("location:" . $url_str);
    } else {
        $error = $conn->error;
        echo '<script> swal2Error("'.$error.'","'.$url_str.'")</script>';
    }
}

// insert car list 
if (isset($_POST['add_car'])) {
    echo "insert car list";
    $carSelects = $_POST['select-car'];
    $service_id = $_POST['inv_service_id'];
    $sql_insertCar = "INSERT INTO invoice_service_items VALUES ";

    $countSelect = count($carSelects);
    $i = 0;
    foreach ($carSelects as $key => $value) {
        $i++;
        $sql_insertCar .= " ('$service_id','$value')";
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
// delete car list 
if (isset($_POST['del_serv_list'])) {
    echo "del car list";
}


?>