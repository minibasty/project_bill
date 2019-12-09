var manual_msg = '';

var manualComId = 'command';
var manualIpId = 'ip';


//ปุ่มส่งคำสั่ง
function btnManualCom(id) {
    manualComId = manualComId + id;
    dest = document.getElementById("dest").value;
    manual_msg = document.getElementById(manualComId).value;

    set_manual();
    alertShow();
    manualComId = "command";
}

// ปุ่ม Setip
function btnManualIp(id) {
    manualIpId = manualIpId + id;
    dest = document.getElementById("dest").value;
    manual_msg = document.getElementById(manualIpId).value;

    set_manual();
    alertShow();
    manualIpId = "ip";
}


var changeSn = '';
//ปุ่ม ChangeSn
function btnChangeSn() {
    dest = document.getElementById("dest").value;
    var commandtxt = document.getElementById('ChangeSn').value;
    changeSn = 'W000000,010,';
    manual_msg = changeSn + commandtxt;
    set_manual();
    alertShow();
    changeSn = "W000000,010,";
}

//ปุ่ม Custom
function btnCustom() {
    dest = document.getElementById("dest").value;
    var commandtxt = document.getElementById('custom').value;
    manual_msg = commandtxt;
    set_manual();
    alertShow();
}

//ตั้งค่า Sim
function set_manual() {
    var jsonObj = { "username": username, "password": password, "secret": secret, "sender": phonsender, "glist": glist, "dest": dest, "lang": lang, "msg": manual_msg }
    $.ajax({
        type: "POST",
        url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
        data: jsonObj,
        success: function(data) {
            console.log(data);
            // alert("ส่งข้อมูลสำเร็จ");
        }
    });
}