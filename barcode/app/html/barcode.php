
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="margin: 50px;">
    <img src="image.php?filetype=PNG&amp;dpi=72&amp;scale=1&amp;rotation=0&amp;font_family=Arial.ttf&amp;font_size=8&amp;text=<?php echo $_GET['b1'] ?>&amp;thickness=30&amp;checksum=&amp;code=BCGcode39"
         alt="Barcode Image">
    <br/>
    <font style="color: red; font-weight: bold;"><?= $_GET['text']; ?></font>
    <br/>
    <img src="image.php?filetype=PNG&amp;dpi=72&amp;scale=1&amp;rotation=0&amp;font_family=Arial.ttf&amp;font_size=8&amp;text=<?php echo $_GET['b2'] ?>&amp;thickness=30&amp;checksum=&amp;code=BCGcode39"
         alt="Barcode Image">

     <hr>

     <img src="image.php?filetype=PNG&amp;dpi=72&amp;scale=1&amp;rotation=0&amp;font_family=Arial.ttf&amp;font_size=8&amp;text=<?php echo $_GET['b2'] ?>&amp;thickness=30&amp;checksum=&amp;code=BCGcode39"
         alt="Barcode Image">
</div>
</body>
</html>