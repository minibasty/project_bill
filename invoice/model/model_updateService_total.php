<?php 
    require('../../config.php');
    $id = $_POST['inv_id'];
    
    $price = 0;

    // head invoice 
    $sql_invoice = "SELECT * FROM invoice WHERE inv_id = $id";
    $qr_invoice =$conn->query($sql_invoice);
    $row_invoice = $qr_invoice->fetch_assoc();

    // service list invoice
    $sql_refrash = "SELECT inv_id, inv_total_price FROM invoice_service WHERE inv_id = $id";
    $qr_refrash =$conn->query($sql_refrash);
    while($row_rf=$qr_refrash->fetch_assoc()){
        $price += $row_rf['inv_total_price'];
    }

    $price = number_format($price,2 , '.', '');
    
    $vatStr = $row_invoice['inv_vat'];
    if ($vatStr==1) {
        $vat = number_format(($price-($price / 1.07)),2 , '.', '');
        $priceNovat = number_format(($price-$vat),2 , '.', '');
        $priceSum = number_format(($vat + $priceNovat),2 , '.', '');
    }elseif ($vatStr==7) {
        $vat = number_format(($price * (7/100)),2 , '.', '');
        $priceSum = number_format(($vat + $price),2 , '.', '');
    }else{
        $vat = number_format(($price * 0),2 , '.', '');
        $priceSum = number_format(($vat + $price),2 , '.', '');
    }
    
    $withholding = number_format(($price * ($row_invoice['inv_withholding']/100)),2 , '.', '');
    $totalPay = number_format(($priceSum - $withholding),2 , '.', '');
    
    $dataArr= array(
        'price' => $price, 
        'vat' => $vat,
        'priceSum' => $priceSum,
        'withholding' => $withholding,
        'totalPay' => $totalPay,
    );
    $datajson = json_encode($dataArr, JSON_UNESCAPED_UNICODE);
    print_r($datajson);
?>