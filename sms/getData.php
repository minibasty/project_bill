<?php
$sc = isset($_POST['data']) ? $_POST['data'] : '';
require 'config.php';
$strSQL = "select 
id,
name,
amper,
province,
simno,
zipcode,
user,
tel_contact
FROM member";
if ($sc !== "") {
  $strSQL .= " WHERE devi_name LIKE '%$sc%' ";
}
$objQuery = $conn->query($strSQL) or die(mysql_error());
$intNumField = mysqli_num_fields($objQuery);
$resultArray = array();
while ($obResult = $objQuery->fetch_assoc()) {
  $arrCol = array();
  $arrCol = array(
    'id' => $obResult['id'],
    'name' => $obResult['name'],
    'amper' => $obResult['amper'],
    'province' => $obResult['province'],
    'simno' => $obResult['simno'],
    'zipcode' => $obResult['zipcode'],
    'user' => $obResult['user'],
    'tel_contact' => $obResult['tel_contact']
  );
  array_push($resultArray, $arrCol);
}
// echo $strSQL;
mysqli_close($conn);

echo json_encode($resultArray, JSON_UNESCAPED_UNICODE);
