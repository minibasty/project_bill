<?php
require('../../config.php');
$customerId;
$param_cus_id = isset($_POST['param_id']) ? $_POST['param_id'] : '';

$sql_cus = "SELECT  `cus_id`,  `cus_name`,  `cus_user`,  `cus_pass`,  `cus_address`,  `cus_taxno`, `cus_company` ,  `cus_tel`,  `cus_mail`,  `timeInsert` FROM `project_bill`.`customer` WHERE cus_id = $param_cus_id";
$query_cus = $conn->query($sql_cus);
$row_cus = $query_cus->fetch_array();
$data_array = array(
    'cus_id' => $row_cus['cus_id'],
    'cus_name' => $row_cus['cus_name'],
    'cus_user' => $row_cus['cus_user'],
    'cus_address' => $row_cus['cus_address'],
    'cus_taxno' => $row_cus['cus_taxno'],
    'cus_company' => $row_cus['cus_company'],
    'cus_tel' => $row_cus['cus_tel'],
    'cus_mail' => $row_cus['cus_mail'],
);
echo json_encode($data_array, JSON_UNESCAPED_UNICODE);
?>