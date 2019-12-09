<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ข้อมูลเก่า</title>
    <script>
        function btnBack(page){
            var result = page;
		    return window.location.href = "index.php?p="+result;

        }
    </script>
</head>
<body>
    <div>
        <div class="container mt-3"> <button class="btn btn-sm btn-danger" type="button" onclick="btnBack('conclude_setup')"><-- กลับ </button> </div>
        <div style="padding-top: 30px" class="text-center"
            <?php 
            $check=isset($_GET['m']) ? $_GET['m'] : '';
            
			$dirname = "report_conclude/old_data/".$check."/";
            $images = glob($dirname."*.jpg");
            // print($dirname);
			$i=0;
			foreach($images as $image) {
            $i++;
            // echo image;
			    echo '<a href="'.$image.'" target="_BLANK" ><img class="" src="'.$image.'" width="50%" /></a>';
			    ?>
			<?php
			}
			 ?>
    </div>
    <!-- <img src="report_conclude\old_data\61-3\S__5251086.jpg" alt=""> -->
</body>
</html>