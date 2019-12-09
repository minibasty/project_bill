// ข้อมูล SET IP
var ip = ''
var username = document.getElementById("username").value;
var password = document.getElementById("password").value;
var secret = document.getElementById("secret").value;
var phonsender = document.getElementById("phone").value;
var glist = document.getElementById("glist").value;
var dest = '';
var lang = document.getElementById("lang").value;
var musecre = document.getElementById("musecre").value;
var restcre = document.getElementById("restcre").value;

var countCom = 0;
var msgopen = '';
var msgip = '';
var msgcommand1 = '';
var msgcommand2 = '';
var msgcommand3 = '';
var msgcommand4 = '';
var msgcommand5 = '';
var msgcommand6 = '';
var msgcommand7 = '';
var msgcommand8 = '';
var msgcommand9 = '';

// ส่ง SET IP
function set_ip() {
    var jsonObj = { "username": username, "password": password, "secret": secret, "sender": phonsender, "glist": glist, "dest": dest, "lang": lang, "msg": msgip }
    $.ajax({
        type: "POST",
        url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
        data: jsonObj,
        success: function(data) {
            console.log(jsonObj);
        }
    });

} //function set_ip(){

// เปิดก่อนส่งคำสั่งอื่น
function set_open() {
    var jsonObj = { "username": username, "password": password, "secret": secret, "sender": phonsender, "glist": glist, "dest": dest, "lang": lang, "msg": msgopen }
    $.ajax({
        type: "POST",
        url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
        data: jsonObj,
        success: function(data) {
            console.log(jsonObj);
        }
    });

}
// ตั้งค่า Acc Off
function set_acc() {
    var jsonObj = { "username": username, "password": password, "secret": secret, "sender": phonsender, "glist": glist, "dest": dest, "lang": lang, "msg": msgcommand0 }
    $.ajax({
        type: "POST",
        url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
        data: jsonObj,
        success: function(data) {
            console.log(jsonObj);
        }
    });

}

//ตั้งค่า รูดบัตร10 นาที
function set_alarm() {
    var jsonObj = { "username": username, "password": password, "secret": secret, "sender": phonsender, "glist": glist, "dest": dest, "lang": lang, "msg": msgcommand1 }
    $.ajax({
        type: "POST",
        url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
        data: jsonObj,
        success: function(data) {
            console.log(jsonObj);
        }
    });

}

//ตั้งค่า มุมเลี้ยว
function set_turn() {
    var jsonObj = { "username": username, "password": password, "secret": secret, "sender": phonsender, "glist": glist, "dest": dest, "lang": lang, "msg": msgcommand2 }
    $.ajax({
        type: "POST",
        url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
        data: jsonObj,
        success: function(data) {
            console.log(jsonObj);
        }
    });

}

//ตั้งค่า ใบขับขี่
function set_rfid() {
    var jsonObj = { "username": username, "password": password, "secret": secret, "sender": phonsender, "glist": glist, "dest": dest, "lang": lang, "msg": msgcommand3 }
    $.ajax({
        type: "POST",
        url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
        data: jsonObj,
        success: function(data) {
            console.log(jsonObj);
        }
    });

}

//ตั้งค่า GMT
function set_gmt() {
    var jsonObj = { "username": username, "password": password, "secret": secret, "sender": phonsender, "glist": glist, "dest": dest, "lang": lang, "msg": msgcommand4 }
    $.ajax({
        type: "POST",
        url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
        data: jsonObj,
        success: function(data) {
            console.log(jsonObj);
        }
    });

}

//ตั้งค่า TCP
function set_tcp() {
    var jsonObj = { "username": username, "password": password, "secret": secret, "sender": phonsender, "glist": glist, "dest": dest, "lang": lang, "msg": msgcommand5 }
    $.ajax({
        type: "POST",
        url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
        data: jsonObj,
        success: function(data) {
            console.log(jsonObj);
        }
    });
}

//ตั้งค่า TIMER
function set_timer() {
    var jsonObj = { "username": username, "password": password, "secret": secret, "sender": phonsender, "glist": glist, "dest": dest, "lang": lang, "msg": msgcommand6 }
    $.ajax({
        type: "POST",
        url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
        data: jsonObj,
        success: function(data) {
            console.log(jsonObj);
        }
    });
}

//ตั้งค่า แจ้งเตือนความเร็วที่
function set_speedAlarm() {
    var jsonObj = { "username": username, "password": password, "secret": secret, "sender": phonsender, "glist": glist, "dest": dest, "lang": lang, "msg": msgcommand7 }
    $.ajax({
        type: "POST",
        url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
        data: jsonObj,
        success: function(data) {
            console.log(jsonObj);
        }
    });
}

//ตั้งค่า Sim
function set_sim() {
    var jsonObj = { "username": username, "password": password, "secret": secret, "sender": phonsender, "glist": glist, "dest": dest, "lang": lang, "msg": msgcommand8 }
    $.ajax({
        type: "POST",
        url: "http://www.thaiwebsms.com/vip/api_zsrt.php",
        data: jsonObj,
        success: function(data) {
            console.log(jsonObj);
            alert("ส่งข้อมูลสำเร็จ ปิดได้ !!");
        }
    });
}

function open_wite() {
    $('#loading').show();
}

function close_wite() {
    $('#loading').hide();
}
//หน่วงเวลา
function send_auto() {
    open_wite();
    setTimeout(set_open, 0);
    setTimeout(set_ip, 30000);
    setTimeout(set_acc, 35000);
    setTimeout(set_alarm, 40000);
    setTimeout(set_turn, 45000);
    setTimeout(set_rfid, 50000);
    setTimeout(set_gmt, 55000);
    setTimeout(set_tcp, 60000);
    setTimeout(set_timer, 65000);
    setTimeout(set_speedAlarm, 70000);
    setTimeout(set_sim, 75000);
    setTimeout(alertShow, 75000);
    setTimeout(close_wite, 74999);

}
// ดัก Event ปุ่ม เลือก Server
var txtid = "svStr";

function clickbtn(id) {
    txtid = txtid + id;
    countCom = document.getElementById("countCommandAuto").value;
    dest = document.getElementById("dest").value;
    msgip = document.getElementById(txtid).value;
    msgopen = document.getElementById('commandAuto0').value;
    msgcommand0 = document.getElementById('commandAuto0').value;
    msgcommand1 = document.getElementById('commandAuto1').value;
    msgcommand2 = document.getElementById('commandAuto2').value;
    msgcommand3 = document.getElementById('commandAuto3').value;
    msgcommand4 = document.getElementById('commandAuto4').value;
    msgcommand5 = document.getElementById('commandAuto5').value;
    msgcommand6 = document.getElementById('commandAuto6').value;
    msgcommand7 = document.getElementById('commandAuto7').value;
    msgcommand8 = document.getElementById('commandAuto8').value;
    // msgcommand9 = document.getElementById('command9').value;
    send_auto();
    txtid = "svStr";
    console.log(countCom);
} // function clickbtn(id){