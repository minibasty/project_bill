<?php 

require_once '../../mpdf/vendor/autoload.php';
echo "ok";
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();

?>