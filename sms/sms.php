<?php
require_once "../config.php";
require_once("../pagination_function.php");
include_once "../all_function.php";
// session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <META http-equiv=Content-Type content="text/html; charset=windows-874">
    <META http-equiv=EXPIRES content=0>
    <META content=DOCUMENT name=RESOURCE-TYPE>
    <META content=GLOBAL name=DISTRIBUTION>
    <META content="Copyright (c) 2005" name=COPYRIGHT>
    <META
        content="sms,SMS,thai sms,messaging,free sms,short message,send sms,thai free sms,short message service,��ͤ���,��ͤ������,�觢�ͤ���,�觢�ͤ������"
        name=KEYWORDS>
    <META
        content="sms,SMS,thai sms,messaging,free sms,short message,send sms,thai free sms,short message service,��ͤ���,��ͤ������,�觢�ͤ���,�觢�ͤ������"
        name=DESCRIPTION>
    <META content="1 DAYS" name=REVISIT-AFTER>
    <META content=GENERAL name=RATING>
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../vendor\datetimepicker\jquery.datetimepicker.css">

    <style type="text/css">
    html {
        font-family: tahoma, Arial, "Times New Roman";
        font-size: 14px;
    }

    body {
        background-color: #d7d7d7;
        font-family: tahoma, Arial, "Times New Roman";
        font-size: 14px;
    }

    .margin_top_5 {
        /* margin-top: 5px; */
    }

    .card-body {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        /* text-align: center; */
    }
    </style>
    <META content="MSHTML 6.00.2900.3243" name=GENERATOR>
</head>

<body>
    <?php

  $sql = "SELECT * FROM member WHERE 1";

  $selectDate = isset($_POST['selectDate']) ? $_POST['selectDate'] : '';
  $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

  if ((isset($_GET['keyword']) && $_GET['keyword'] != "") or (isset($_GET['keyword']) && $_GET['keyword'] != "")) {

    if (isset($_GET['keyword'])) {
      $keyword = $_GET['keyword'];
    } else {
      $keyword = $_GET['keyword'];
    }

    // ��ͤ���� sql
    $sql = "SELECT * FROM member WHERE";
    $sql .= " zipcode LIKE '%" . trim($keyword) . "%' ";
    $sql .= " OR user LIKE '%" . trim($keyword) . "%'";
    $sql .= " OR zipcode LIKE '%" . trim($keyword) . "%' ";
    $sql .= " OR name LIKE '%" . trim($keyword) . "%' ";
    $sql .= " OR amper LIKE '%" . trim($keyword) . "%' ";
    $sql .= " OR phone LIKE '%" . trim($keyword) . "%' ";
    $sql .= " OR main_user LIKE '%" . trim($keyword) . "%' ";
  }

  ?>
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-body">
                <form name="form1" method="GET" action="?p=off_list" autocomplete="off">
                    <input type="text" name="p" id="" value="off_list" hidden>
                    <div class="col-sm-12">
                        <h3 class="">��ö Offline </h3>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-sm-3 offset-sm-4 form-inline">
                            <input type="text" name="keyword" id="testdate5" class="form-control col" autocomplete="off"
                                placeholder="���� ���ͼ���Сͺ��ó� IMEI ����¹ user��ѡ/���� ���ͤѴ�� "
                                value="<?= $keyword ?>">
                        </div>
                        <div class="col-sm-3 form-inline">
                            <button type="submit" class="btn btn-primary" name="btn_search"
                                id="btn_search">����</button>
                            &nbsp;
                            <a href="?p=off_list" class="btn btn-danger">��ҧ���</a>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-striped table-hover">
                        <thead>

                            <tr class="text-center bg-success text-white">
                                <th style="width:auto">�� Sms</th>
                                <th style="width:auto">���ͼ���Сͺ���</th>
                                <th style="width:auto">����¹ö</th>
                                <th style="width:auto">�Ţ�ѷ��</th>
                                <th style="width:auto">user��ѡ</th>
                                <th style="width:auto">user����</th>
                                <th style="width:auto">����Դ���</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
              //////////////////// MORE QUERY
              // echo $sql;
              $result = mysqli_query($conn, $sql);
              $total = mysqli_num_rows($result); ?>
                            <!-- �ʴ��ӹǹ������ -->
                            <div class="alert alert-warning" role="alert">

                                �ӹǹ������
                                <font color=red><?= $total ?></font>
                                ��¡��
                            </div>
                            <?php
              $vat = isset($_GET['update']) ? $_GET['update'] : '';
              if ($vat == "1") {
                ?>
                            <div class="alert alert-success text-center" role="alert">
                                �ѹ�֡�����������
                            </div>
                            <?php
              } elseif ($vat == "0") { ?>
                            <div class="alert alert-danger text-center" role="alert">
                                �ѹ��֡�������������� ��سҵ�Ǩ�ͺ
                            </div>
                            <?php
              }
              ?>
                            <div class="">

                            </div>

                            <?php
              $e_page = 15; // ��˹� �ӹǹ��¡�÷���ʴ������˹��
              $step_num = 0;
              if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] == 1)) {
                $_GET['page'] = 1;
                $step_num = 0;
                $s_page = 0;
              } else {
                $s_page = $_GET['page'] - 1;
                $step_num = $_GET['page'] - 1;
                $s_page = $s_page * $e_page;
              }
              $num = 0;
              $sql .= " ORDER BY dill DESC LIMIT " . $s_page . ",$e_page";
              $result = mysqli_query($conn, $sql);
              if ($result && $result->num_rows > 0) { // ����������������������� �������¡�â������������
                while ($row = $result->fetch_array()) { // ǹ�ٻ�ʴ���¡��
                  $num++;
                  $check_cancelS = "SELECT * FROM canceler_service WHERE member_id=$row[id]";
                  $check_cancel_rs = $conn->query($check_cancelS);
                  $check_cancel_row = $check_cancel_rs->num_rows;
                  if ($check_cancel_row > 0) {
                    echo '<tr style="color:red;">';
                  } else {
                    echo '<tr>';
                  }
                  ?>
                            <th class="text-center">
                                <form name=frmsend action=http://www.thaiwebsms.com/vip/api_zsrt.php method="post">
                                    <button type="submit" class="btn btn-dark btn-sm" name="button">
                                        <i class="fa fa-sms"></i>
                                    </button>
                                    <!-- <button type="submit" class="btn btn-dark btn-sm" name="button" onclick="return confirm('�׹�ѹ����觤�������� :'+<?= $row['tel_contact'] ?>)? offlineSend():''">
                      <i class="fa fa-sms"></i>
                    </button> -->
                                    <input id="username" class="form-control col-sm-6" type="hidden" name="username"
                                        value="014959561" readonly hidden>
                                    <input id="password" class="form-control col-sm-6" type="hidden" name="password"
                                        value="66882000" readonly hidden>
                                    <input id="secret" class="form-control col-sm-6" type="hidden" name="secret"
                                        value="o2r5ttjt" readonly hidden>
                                    <input id="glist" class="form-control col-sm-6" type="hidden" name="glist"
                                        value="014959561" readonly hidden>
                                    <input id="lang" class="form-control col-sm-6" type="hidden" name="lang" value="tha"
                                        readonly hidden>
                                    <input id="musecre" class="form-control col-sm-6" type="hidden" name="musecre"
                                        value="0" readonly hidden>
                                    <input id="sender" class="form-control col-sm-6" type="hidden" name="sender"
                                        value="0804932560" readonly hidden>
                                    <input id="restcre" class="form-control col-sm-6" type="hidden" name="restcre"
                                        value="1219" readonly hidden>
                                    <input type="hidden" name="dest" id="dest" value="0804932560" hidden>
                                    <textarea wrap=VIRTUAL name="msg" id="msg" cols="30" rows="10"
                                        hidden><?= $row['amper'] ?>_���ͺ_</textarea>
                                </form>
                            </th>


                            <td class="text-left">
                                <div title="<?= $row['name'] ?>">
                                    <?= mb_strimwidth($row['name'], 0, 30, '...', 'UTF-8'); ?>
                            </td>
                            <td><?= $row['amper'] ?></td>
                            <td>
                                <div title="<?= $row['user'] ?>">
                                    <?= mb_strimwidth($row['user'], 0, 20, '...', 'UTF-8'); ?>
                            </td>
                            <td><?= $row['main_user'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td>
                                <div title="<?= $row['tel_contact'] ?>">
                                    <?= mb_strimwidth($row['tel_contact'], 0, 12, '...', 'UTF-8'); ?>
                            </td>
                            </tr>

                            <?php
                  // loop while
                }
              } else { ?>
                            <!-- // �������¡�� -->
                            <tr>
                                <td colspan="10">
                                    <div class="alert alert-danger text-center" role="alert">
                                        <p>�������¡�÷�����
                                            <?php
                        echo " ( ";
                        if ($selectDate) {
                          echo (isset($_POST['selectDate'])) ? $_POST['selectDate'] : "";
                        } else {
                          echo $now;
                        }
                        echo " )";
                        ?>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <?php
              }

              ?>

                        </tbody>
                    </table>

                    <?php
          page_navi($total, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page, $_GET);
          ?>
                </div>

                <br>

                <br>
                <!-- �Դ card body -->
            </div>
            <!-- �Դ card -->
        </div>
        <!-- �Դ container -->
    </div>

    <script type="text/javascript" src="vendor\maskinput\jquery.inputmask.js" charset="utf-8"></script>
    <!-- <script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script> -->
    <!-- <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script> -->
    <script type="text/javascript" src="vendor\datetimepicker\jquery.datetimepicker.full.js" charset="utf-8"></script>
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
    <!-- send SMS  -->
    <script>
    //��駤�� Sim
    var username = '014959561';
    var password = '66882000';
    var secret = 'o2r5ttjt';
    var phonsender = 'GreenBoxGPS';
    var glist = '014959561';
    var dest = document.getElementById("dest").value; //���������
    var msg = '���ͺ';
    var lang = 'tha';
    var musecre = '0';
    var restcre = '1219';

    function offlineSend() {
        var jsonObj = {
            "username": username,
            "password": password,
            "secret": secret,
            "sender": phonsender,
            "glist": glist,
            "dest": dest,
            "lang": lang,
            "msg": msg
        }
        console.log(jsonObj);
        $.ajax({
            type: "POST",
            url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
            data: jsonObj,

            success: function(data) {
                console.log(jsonObj);
            }
        });

    }
    </script>
</body>

</html>