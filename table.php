<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title></title>
</head>

<body>
<?
include'config.php';
$sql="SELECT * FROM member limit 10";
$result=$conn->query($sql);
?>
<br/>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2>ตาราง->ช่าง</h2>
      </div>
      <div class="card-body">
        <form class="form-inline">
          <div class="form-group ">
            <input type="text" id="" class="form-control mx-sm-3">
            <button type="submit" class="btn btn-success" name="button">Search</button>
          </div>
        </form>
        <br/>
        <table class="table table-striped table-bordered table-sm">
          <thead>
            <tr>
              <th>
                <center>ทะเบียนรถ</center>
              </th>
              <th>
                <center>เลขคุชซี</center>
              </th>
              <th>
                <center>User ลูกค้า</center>
              </th>
            </tr>
          </thead>
          <?php
          while ($rs=$result->fetch_array()) {
           ?>
          <tbody>
            <tr>
              <td><?= $rs['amper'] ?></td>
              <td><?= $rs['user'] ?></td>
              <td><?= $rs['phone'] ?></td>
              <td width="5%"><button class="btn btn-info" type="submit" name="button">พิมพ์</button></td>
            </tr>
          </tbody>
        <?php } ?>
        </table>
      </div>
    </div>
  </div>
</body>
</html>