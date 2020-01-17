<?php 

// เชื่อมต่อฐานข้อมูล Bill
$host = "27.254.81.17";
$username = "root";
$password = "Ple01010!@#";
$db = "project_bill";

//คำสั่ง Connect ฐานข้อมูล
$conn = new mysqli($host, $username, $password, $db);
mysqli_query($conn, "SET NAMES UTF8");
?>