<?php 
    require('../../config.php');
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $dateStr = $year."-".$month."-".$day;
    $dateThaiStr = $day."-".$month."-".($year+543);

    $date = date("Y-m-d", strtotime($dateStr));
    $prefix = 'GB';
    $sql = "SELECT * FROM `invoice` WHERE invNo_y = '$year' AND invNo_m = '$month'";
    $query = $conn->query($sql) or die ($conn->error);
    // $result = $query
    $numrow = $query->num_rows;
    $inv_count = $numrow +1 ;
    $inv_countStr = str_pad($inv_count, 5, "0", STR_PAD_LEFT);
    $inv_all = $year.$month.$inv_countStr;
    $inv_data = array(
        "dateEng" => $date,
        "dateThai" => $dateThaiStr,
        "prefix" => $prefix,
        "day" => $day,
        "count" => $inv_countStr,
        "month" => $month,
        "year" => $year,
        "all" => $inv_all,
    );
    echo json_encode($inv_data, JSON_UNESCAPED_UNICODE);
?>