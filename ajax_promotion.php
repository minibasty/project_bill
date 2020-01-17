<?php 
include('config.php');
// $result=$_GET['shipping'];
$select_id=$_GET['promo_name'];

$sql="SELECT * FROM promotions WHERE promo_code='$select_id'";
$result=mysqli_query($conn, $sql);
$rows=mysqli_fetch_assoc($result);

	$sql="SELECT
	`pro_price`.*,
	`pricepromotion`.`price_pro`
  FROM
	`pricepromotion`
	INNER JOIN `pro_price` ON `pro_price`.`price_id` = `pricepromotion`.`price_id`
	INNER JOIN `promotions` ON `pro_price`.`pro_id` = `promotions`.`promo_id`
  WHERE
	`promotions`.`promo_code` = '$select_id'";
	$query=$conn->query($sql);
	echo $countNum=$query->num_rows;
	$strOption = null;
	if ($countNum>0) {
		while ($row=$query->fetch_assoc()) { 
		$strOption.= '<option value="'.$row["price_pro"].'"'.($row["price_pro"] ? 'selected':' ') .'>'.$row["price_pro"].'</option>';
		}
	}else{
		$strOption.= '<option value="">ไม่มีราคาในโปรนี้</option>';
		}
	echo $strOption;
?>