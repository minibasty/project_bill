<!DOCTYPE html>
<html>
<head>
    <?php require'../config.php'; ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">

    <script>
function showCustomer(str) {
if (str == "") {
document.getElementById("listData").innerHTML = "";
return;
} else {
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
document.getElementById("listData").innerHTML = this.responseText;
}
};
xmlhttp.open("GET","queryServer.php?q="+str,true);
xmlhttp.send();
}
}
</script>
</head>
<body>
    <form action="" method="post" onchange="showCustomer(this.value)">
        <div class="container">
            <div class="card-body">
            <select name="server">
                <option value=""><-- เลือกรำยกำรบุคคลที่ต้องกำรออกรำยงำน --></option>
                <option value="0">แสดงทุกเซอเวอร์</option>
                <?php
                $sql = "SELECT * FROM member GROUP BY email";
                $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['email'];?>"><?php echo $row['email'];?></option>
                <?php
                }
                ?>
            </select>
            
            </div>
        </div>
    </form>

    <div class="container" id="listData">
    
    </div>
</body>
</html>