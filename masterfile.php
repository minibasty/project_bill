
<?php
#### สคริ๊ปนี้ใช้ในการเช็ค ว่าล็อกอินหรือยัง ให้นำสคริ๊ปนี้ไปไว้ที่หน้าที่คุณต้องการให้เช็ค ####
session_start() ;
if (!isset($_GET['user'])) {
     header("Location: index.php");
     exit;
}
### จบการเช็ค ###
?>

<?php
include("config.php");
// mysqli_select_db($db) ;
## Please Don't delete it. It will Error.  You can tell me about bug of program this way ##
$echo = "Program by <a href='http://www.funwhan.com' target='_blank'>Ittiphol pudgrajang</a>
&nbsp;copy right&copy;2003 <a href='mailto:tohm357@hotmail.com'>Contact us</a>" ;
$result = mysqli_query($conn, "select * from member where user='$_GET[user]'") or die ("Err Can not to result");
$dbarr = mysqli_fetch_array($result) ;

?>



<!DOCTYPE html>
<html class=""><head>
		<title>www.greenboxsv3.com</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="robots" content="nofollow">
		<meta name="viewport" content="width=device-width,maximum-scale=1.0,minimum-scale=1.0">
    <link rel="shortcut icon" href="http://www.greenboxsv3.com/images/GPS-icon.ico">
		<!-- <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.flat.css" /> -->
		<link rel="stylesheet" href="vendor/masterfile/bootstrap.css">
		<link rel="stylesheet" href="vendor/masterfile/styles.css">
		<!-- <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css" /> -->
		<link rel="stylesheet" href="vendor/masterfile/jquery-ui.css">
		<link rel="stylesheet" href="vendor/masterfile/responsive-nav.css">
		<link rel="stylesheet" href="vendor/masterfile/colpick.css">
		<link rel="stylesheet" href="vendor/masterfile/jquery_002.css">
		<link rel="stylesheet" href="vendor/masterfile/dataTables.css">
		<link rel="stylesheet" href="vendor/masterfile/daterangepicker-bs3.css">
		<link rel="stylesheet" href="vendor/masterfile/notify-metro.css">
		<link rel="stylesheet" href="vendor/masterfile/jquery.css" media="screen">
		<link rel="stylesheet" href="vendor/masterfile/bootstrap-combobox.css" media="screen">
		<link rel="stylesheet" href="vendor/masterfile/font-awesome.css">

		<script src="vendor/masterfile/jquery_002.js" style=""></script>
		<script src="vendor/masterfile/jquery-ui.js"></script>
		<script src="vendor/masterfile/jquery.js"></script>
		<script src="vendor/masterfile/bootstrap.js"></script>
		<script src="vendor/masterfile/mustache.js"></script>
		<script src="vendor/masterfile/moment-with-langs.js"></script>
		<script src="vendor/masterfile/responsive-nav.js"></script>
		<script src="vendor/masterfile/colpick.js"></script>
		<script src="vendor/masterfile/jquery_003.js"></script>
		<script src="vendor/masterfile/dataTables.js"></script>
		<script src="vendor/masterfile/daterangepicker.js"></script>
		<script src="vendor/masterfile/isMobile.js"></script>
		<script src="vendor/masterfile/amcharts.js"></script>
		<script src="vendor/masterfile/serial.js"></script>
		<script src="vendor/masterfile/pie.js"></script>
		<script src="vendor/masterfile/chalk.js"></script>
		<script src="vendor/masterfile/amexport.js"></script>
		<script src="vendor/masterfile/canvg.js"></script>
		<script src="vendor/masterfile/filesaver.js"></script>
		<script src="vendor/masterfile/jspdf.js"></script>
		<script src="vendor/masterfile/jspdf_002.js"></script>
		<script src="vendor/masterfile/rgbcolor.js"></script>
		<script src="vendor/masterfile/notify.js"></script>
		<script src="vendor/masterfile/notify-bootstrap.js"></script><style type="text/css" id="notify-bootstrap">.notifyjs-bootstrap-base {
  font-weight: bold;
  padding: 8px 15px 8px 14px;
  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
  background-color: #fcf8e3;
  border: 1px solid #fbeed5;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  white-space: nowrap;
  padding-left: 25px;
  background-repeat: no-repeat;
  background-position: 3px 7px;
}
.notifyjs-bootstrap-error {
  color: #B94A48;
  background-color: #F2DEDE;
  border-color: #EED3D7;
  background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAtRJREFUeNqkVc1u00AQHq+dOD+0poIQfkIjalW0SEGqRMuRnHos3DjwAH0ArlyQeANOOSMeAA5VjyBxKBQhgSpVUKKQNGloFdw4cWw2jtfMOna6JOUArDTazXi/b3dm55socPqQhFka++aHBsI8GsopRJERNFlY88FCEk9Yiwf8RhgRyaHFQpPHCDmZG5oX2ui2yilkcTT1AcDsbYC1NMAyOi7zTX2Agx7A9luAl88BauiiQ/cJaZQfIpAlngDcvZZMrl8vFPK5+XktrWlx3/ehZ5r9+t6e+WVnp1pxnNIjgBe4/6dAysQc8dsmHwPcW9C0h3fW1hans1ltwJhy0GxK7XZbUlMp5Ww2eyan6+ft/f2FAqXGK4CvQk5HueFz7D6GOZtIrK+srupdx1GRBBqNBtzc2AiMr7nPplRdKhb1q6q6zjFhrklEFOUutoQ50xcX86ZlqaZpQrfbBdu2R6/G19zX6XSgh6RX5ubyHCM8nqSID6ICrGiZjGYYxojEsiw4PDwMSL5VKsC8Yf4VRYFzMzMaxwjlJSlCyAQ9l0CW44PBADzXhe7xMdi9HtTrdYjFYkDQL0cn4Xdq2/EAE+InCnvADTf2eah4Sx9vExQjkqXT6aAERICMewd/UAp/IeYANM2joxt+q5VI+ieq2i0Wg3l6DNzHwTERPgo1ko7XBXj3vdlsT2F+UuhIhYkp7u7CarkcrFOCtR3H5JiwbAIeImjT/YQKKBtGjRFCU5IUgFRe7fF4cCNVIPMYo3VKqxwjyNAXNepuopyqnld602qVsfRpEkkz+GFL1wPj6ySXBpJtWVa5xlhpcyhBNwpZHmtX8AGgfIExo0ZpzkWVTBGiXCSEaHh62/PoR0p/vHaczxXGnj4bSo+G78lELU80h1uogBwWLf5YlsPmgDEd4M236xjm+8nm4IuE/9u+/PH2JXZfbwz4zw1WbO+SQPpXfwG/BBgAhCNZiSb/pOQAAAAASUVORK5CYII=);
}
.notifyjs-bootstrap-success {
  color: #468847;
  background-color: #DFF0D8;
  border-color: #D6E9C6;
  background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAutJREFUeNq0lctPE0Ecx38zu/RFS1EryqtgJFA08YCiMZIAQQ4eRG8eDGdPJiYeTIwHTfwPiAcvXIwXLwoXPaDxkWgQ6islKlJLSQWLUraPLTv7Gme32zoF9KSTfLO7v53vZ3d/M7/fIth+IO6INt2jjoA7bjHCJoAlzCRw59YwHYjBnfMPqAKWQYKjGkfCJqAF0xwZjipQtA3MxeSG87VhOOYegVrUCy7UZM9S6TLIdAamySTclZdYhFhRHloGYg7mgZv1Zzztvgud7V1tbQ2twYA34LJmF4p5dXF1KTufnE+SxeJtuCZNsLDCQU0+RyKTF27Unw101l8e6hns3u0PBalORVVVkcaEKBJDgV3+cGM4tKKmI+ohlIGnygKX00rSBfszz/n2uXv81wd6+rt1orsZCHRdr1Imk2F2Kob3hutSxW8thsd8AXNaln9D7CTfA6O+0UgkMuwVvEFFUbbAcrkcTA8+AtOk8E6KiQiDmMFSDqZItAzEVQviRkdDdaFgPp8HSZKAEAL5Qh7Sq2lIJBJwv2scUqkUnKoZgNhcDKhKg5aH+1IkcouCAdFGAQsuWZYhOjwFHQ96oagWgRoUov1T9kRBEODAwxM2QtEUl+Wp+Ln9VRo6BcMw4ErHRYjH4/B26AlQoQQTRdHWwcd9AH57+UAXddvDD37DmrBBV34WfqiXPl61g+vr6xA9zsGeM9gOdsNXkgpEtTwVvwOklXLKm6+/p5ezwk4B+j6droBs2CsGa/gNs6RIxazl4Tc25mpTgw/apPR1LYlNRFAzgsOxkyXYLIM1V8NMwyAkJSctD1eGVKiq5wWjSPdjmeTkiKvVW4f2YPHWl3GAVq6ymcyCTgovM3FzyRiDe2TaKcEKsLpJvNHjZgPNqEtyi6mZIm4SRFyLMUsONSSdkPeFtY1n0mczoY3BHTLhwPRy9/lzcziCw9ACI+yql0VLzcGAZbYSM5CCSZg1/9oc/nn7+i8N9p/8An4JMADxhH+xHfuiKwAAAABJRU5ErkJggg==);
}
.notifyjs-bootstrap-info {
  color: #3A87AD;
  background-color: #D9EDF7;
  border-color: #BCE8F1;
  background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QYFAhkSsdes/QAAA8dJREFUOMvVlGtMW2UYx//POaWHXg6lLaW0ypAtw1UCgbniNOLcVOLmAjHZolOYlxmTGXVZdAnRfXQm+7SoU4mXaOaiZsEpC9FkiQs6Z6bdCnNYruM6KNBw6YWewzl9z+sHImEWv+vz7XmT95f/+3/+7wP814v+efDOV3/SoX3lHAA+6ODeUFfMfjOWMADgdk+eEKz0pF7aQdMAcOKLLjrcVMVX3xdWN29/GhYP7SvnP0cWfS8caSkfHZsPE9Fgnt02JNutQ0QYHB2dDz9/pKX8QjjuO9xUxd/66HdxTeCHZ3rojQObGQBcuNjfplkD3b19Y/6MrimSaKgSMmpGU5WevmE/swa6Oy73tQHA0Rdr2Mmv/6A1n9w9suQ7097Z9lM4FlTgTDrzZTu4StXVfpiI48rVcUDM5cmEksrFnHxfpTtU/3BFQzCQF/2bYVoNbH7zmItbSoMj40JSzmMyX5qDvriA7QdrIIpA+3cdsMpu0nXI8cV0MtKXCPZev+gCEM1S2NHPvWfP/hL+7FSr3+0p5RBEyhEN5JCKYr8XnASMT0xBNyzQGQeI8fjsGD39RMPk7se2bd5ZtTyoFYXftF6y37gx7NeUtJJOTFlAHDZLDuILU3j3+H5oOrD3yWbIztugaAzgnBKJuBLpGfQrS8wO4FZgV+c1IxaLgWVU0tMLEETCos4xMzEIv9cJXQcyagIwigDGwJgOAtHAwAhisQUjy0ORGERiELgG4iakkzo4MYAxcM5hAMi1WWG1yYCJIcMUaBkVRLdGeSU2995TLWzcUAzONJ7J6FBVBYIggMzmFbvdBV44Corg8vjhzC+EJEl8U1kJtgYrhCzgc/vvTwXKSib1paRFVRVORDAJAsw5FuTaJEhWM2SHB3mOAlhkNxwuLzeJsGwqWzf5TFNdKgtY5qHp6ZFf67Y/sAVadCaVY5YACDDb3Oi4NIjLnWMw2QthCBIsVhsUTU9tvXsjeq9+X1d75/KEs4LNOfcdf/+HthMnvwxOD0wmHaXr7ZItn2wuH2SnBzbZAbPJwpPx+VQuzcm7dgRCB57a1uBzUDRL4bfnI0RE0eaXd9W89mpjqHZnUI5Hh2l2dkZZUhOqpi2qSmpOmZ64Tuu9qlz/SEXo6MEHa3wOip46F1n7633eekV8ds8Wxjn37Wl63VVa+ej5oeEZ/82ZBETJjpJ1Rbij2D3Z/1trXUvLsblCK0XfOx0SX2kMsn9dX+d+7Kf6h8o4AIykuffjT8L20LU+w4AZd5VvEPY+XpWqLV327HR7DzXuDnD8r+ovkBehJ8i+y8YAAAAASUVORK5CYII=);
}
.notifyjs-bootstrap-warn {
  color: #C09853;
  background-color: #FCF8E3;
  border-color: #FBEED5;
  background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABJlBMVEXr6eb/2oD/wi7/xjr/0mP/ykf/tQD/vBj/3o7/uQ//vyL/twebhgD/4pzX1K3z8e349vK6tHCilCWbiQymn0jGworr6dXQza3HxcKkn1vWvV/5uRfk4dXZ1bD18+/52YebiAmyr5S9mhCzrWq5t6ufjRH54aLs0oS+qD751XqPhAybhwXsujG3sm+Zk0PTwG6Shg+PhhObhwOPgQL4zV2nlyrf27uLfgCPhRHu7OmLgAafkyiWkD3l49ibiAfTs0C+lgCniwD4sgDJxqOilzDWowWFfAH08uebig6qpFHBvH/aw26FfQTQzsvy8OyEfz20r3jAvaKbhgG9q0nc2LbZxXanoUu/u5WSggCtp1anpJKdmFz/zlX/1nGJiYmuq5Dx7+sAAADoPUZSAAAAAXRSTlMAQObYZgAAAAFiS0dEAIgFHUgAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAHdElNRQfdBgUBGhh4aah5AAAAlklEQVQY02NgoBIIE8EUcwn1FkIXM1Tj5dDUQhPU502Mi7XXQxGz5uVIjGOJUUUW81HnYEyMi2HVcUOICQZzMMYmxrEyMylJwgUt5BljWRLjmJm4pI1hYp5SQLGYxDgmLnZOVxuooClIDKgXKMbN5ggV1ACLJcaBxNgcoiGCBiZwdWxOETBDrTyEFey0jYJ4eHjMGWgEAIpRFRCUt08qAAAAAElFTkSuQmCC);
}
</style>
		<script src="vendor/masterfile/jquery_004.js"></script>
		<script src="vendor/masterfile/bootstrap-combobox.js"></script>
		<script src="vendor/masterfile/howler.js"></script>
		<script src="vendor/masterfile/main.js"></script>

		<script>
			var alert_sound = null;
			AmCharts.monthNames = [
			  'มกราคม',
			  'กุมภาพันธ์',
			  'มีนาคม',
			  'เมษายน',
			  'พฤษภาคม',
			  'มิถุนายน',
			  'กรกฎาคม',
			  'สิงหาคม',
			  'กันยายน',
			  'ตุลาคม',
			  'พฤศจิกายน',
			  'ธันวาคม'];

			/** Converts numeric degrees to radians */
			function distance(p1,p2) {
				return google.maps.geometry.spherical.computeDistanceBetween(p1,p2);
			}

			function showPromoteText(){
				$.fancybox({type:'ajax',href:'/api/getPromote.php'});
			}

			function changeReport(report_name){
				setCookie('report',report_name,30);
				window.location.reload();
			}

			DataTableConfig = {
				iDisplayLength:25,
				oLanguage : {
					sLengthMenu : 'แสดง _MENU_ แถวต่อหน้า',
					sZeroRecords : "ไม่พบข้อมูล",
					sInfo : "แสดง _START_ - _END_ จากทั้งหมด _TOTAL_ ",
					sInfoEmpty : "ไม่พบผลลัพธ์",
					sInfoFiltered : "จากข้อมูลทั้งหมด _MAX_ แถว",
					sSearch : "ค้นหา",
					oPaginate : {
						sFirst : "หน้าแรก",
						sLast : "หน้าสุดท้าย",
						sNext : "ถัดไป",
						sPrevious : "ก่อนหน้า"
					},
					oAria : {
						sSortAscending : 'น้อยไปมาก',
						sSortDescending : 'มากไปน้อย'
					}
				}
			}
		moment.lang('th');
			$('[data-toggle=tooltip]').tooltip();
			function showSidebar(){
				$('#showSidebar').hide();
				$('#hideSidebar').show();
				$('#header').removeAttr('style');
				$('#main').removeAttr('style').height($(window).height()-30);
			}

			function hideSidebar(){
				$('#showSidebar').show();
				$('#hideSidebar').hide();
				$('#header').css({'left':'-15%'});
				$('#main').css({'margin-left':'5%'});
			}
			function rePositionDraggable(element){

				$(element).draggable({
					stop:function(event,ui){
						var element_id = $(this).attr('id');
						setCookie(element_id+'_top',ui.position.top);
						setCookie(element_id+'_left',ui.position.left);
					},
					cancel : '.panel-body,.list-group',
					handle : '.panel-heading'
				});
				// $(element).each(function(index,elem){
				// 	var element_id = $(this).attr('id');
				// 	if (getCookie(element_id+'_top') && getCookie(element_id+'_left')){
				// 		$('#'+element_id).css({
				// 			'left' : getCookie(element_id+'_left') +'px',
				// 			'top' : getCookie(element_id+'_top') +'px'
				// 		});
				// 	}
				// });
			}
			function makeDatePicker(id){
				$(id).datepicker({
					dateFormat : 'dd/mm/yy'
				});
				$(id).datepicker( "setDate", new Date());
			}
		</script>
		<!-- <script src="//maps.googleapis.com/maps/api/js?libraries=places,geometry&sensor=false&language=th" type="text/javascript"></script> -->
		<script src="vendor/masterfile/js"></script>
		<script src="vendor/masterfile/marker.js"></script>
		<link rel="stylesheet" href="vendor/masterfile/style-gps.css">
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	<style type="text/css" id="core-notify">.notifyjs-corner {
  position: fixed;
  margin: 5px;
  z-index: 1050;
}

.notifyjs-corner .notifyjs-wrapper,
.notifyjs-corner .notifyjs-container {
  position: relative;
  display: block;
  height: inherit;
  width: inherit;
  margin: 3px;
}

.notifyjs-wrapper {
  z-index: 1;
  position: absolute;
  display: inline-block;
  height: 0;
  width: 0;
}

.notifyjs-container {
  display: none;
  z-index: 1;
  position: absolute;
  cursor: pointer;
}

[data-notify-text],[data-notify-html] {
  position: relative;
}

.notifyjs-arrow {
  position: absolute;
  z-index: 2;
  width: 0;
  height: 0;
}</style><style type="text/css">.fancybox-margin{margin-right:17px;}</style><script type="text/javascript" charset="UTF-8" src="vendor/masterfile/common.js"></script><script type="text/javascript" charset="UTF-8" src="vendor/masterfile/util.js"></script><script type="text/javascript" charset="UTF-8" src="vendor/masterfile/stats.js"></script><script type="text/javascript" charset="UTF-8" src="vendor/masterfile/AuthenticationService.Authenticate"></script></head>
<?php
error_reporting(~E_NOTICE);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$isPost = $_POST['Object']['isPost'];
        $intCode ='084000'.$_POST['Object']['box_id'];
        $vender_id = 84;

        if($isPost){
            $vender_id = 17;
            $intCode ='0170001';
        }
		$unit_id_new = $intCode . str_pad($_POST['Object']['imei'], 20, "0", STR_PAD_LEFT);

		if($_POST['Object']['server']  == 1){
			$url = 'http://52.221.48.153/connect/frontend/web/index.php?r=master-file-web-service/create';
		}elseif($_POST['Object']['server']  == 2){
			$url = 'http://52.74.26.188/connect/frontend/web/index.php?r=master-file-web-service/create';
		}elseif($_POST['Object']['server']  == 3){
			$url = 'http://52.220.67.210/connect/frontend/web/index.php?r=master-file-web-service/create';
		}elseif($_POST['Object']['server']  == 4){
			$url = 'http://13.250.128.141/connect/frontend/web/index.php?r=master-file-web-service/create';
		}elseif($_POST['Object']['server']  == 5){
			$url = 'http://13.251.97.19/connect/frontend/web/index.php?r=master-file-web-service/create';
		}

		$resultArray = array(
					"vender_id"=> $vender_id,
				    "vehicle_id"=> $_POST['Object']['number_sendToG'] ,
				    "emi"=> $_POST['Object']['imei'] ,
				    "vehicle_type"=> $_POST['Object']['brand'],
				    "type"=> $_POST['Object']['box_id'],
				    "vehicle_chassis_no"=> $_POST['Object']['chassis'],
				    "vehicle_register_type"=> $_POST['Object']['register_type'],
				    "data_status"=> "1",
				    "province_code"=> $_POST['Object']['number_province'],
				    "card_reader"=> 1,
				    "utc"=> $_POST['Object']['utc']
			);


		$dataArray = json_encode(array("isPost" => $_POST['Object']['isPost'] , "MasterFile"  => $resultArray));

		echo $dataArray;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataArray);
        curl_setopt($ch, CURLOPT_USERPWD, "admini:admini");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $response = curl_exec($ch);
        echo "<br>========== response ==========<br>";
		      echo $response;
        $json = json_decode($response, true);

    	   echo "<br>====================<br>";
;

}
?>
	<body>
<div class="mainMenu">
	<div>
		<div class="btn-group btn-group-justified">
		</div>
	</div>
</div>	<div class="col-md-12">
		<div class="clearfix"><hr></div>
<div class="col-md-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Setting</h3  >
		</div>
		<div class="panel-body" style="padding:5px">

						<div class="panel panel-success">
				<ul class="list-group">
					<li class="list-group-item"><a href="detail.php?user=<?= $_GET['user'] ?>">กลับไปหน้าก่อนหน้า </a></li>
					<li class="list-group-item"><a href="member_detail.php">กลับไปหน้ารายการ </a></li>
					<!-- <li class="list-group-item"><a href="/drivers.php">จัดการข้อมูลคนขับ</a></li> -->
										                    <!--<li class="list-group-item"><a href="/carCheckLimit.php">จัดการระยะการตรวจเช็คสภาพยานพาหนะ</a></li>-->
				</ul>
			</div>
		</div>
	</div>
</div>		<div class="col-md-9">
						<!-- <form class="form-horizontal col-md-11" action="http://103.246.17.184/api/saveObject.php" method="POST"> -->
							<form class="form-horizontal col-md-11"  method="POST">
				<input name="Object[object_id]" value="" type="hidden">
					<ul class="nav nav-tabs">
  						<li class="active"><h2>ข้อมูลยานพาหนะ</h2></li>
  					</ul><br><br>
					<div class="form-group">
						<label class="col-md-3 control-label" for="box_id">Server</label>
						<div class="col-md-8">
							<select id="server_id" name="Object[server]" class="form-control">
<option value="1" <?php if($dbarr['email']=="s1.gpsgreenbox.com"){ echo "selected" ; } ?>>s1</option>
<option value="2" <?php if($dbarr['email']=="s2.gpsgreenbox.com"){ echo "selected" ; } ?>>s2</option>
<option value="3" <?php if($dbarr['email']=="s3.gpsgreenbox.com"){ echo "selected" ; } ?>>s3</option>
<option value="4" <?php if($dbarr['email']=="s4.gpsgreenbox.com"){ echo "selected" ; } ?>>s4</option>
<option value="5" <?php if($dbarr['email']=="s5.gpsgreenbox.com"){ echo "selected" ; } ?>>s5</option>
							</select>
						</div>
					</div>

                    <div class="form-group">
						<label class="col-md-3 control-label">ไปรษณีย์</label>
						<div class="col-md-8">

							<input name="Object[isPost]" type="checkbox" id="relay" value="1" placeholder="" >
							<label for="relay" class="control-label"> ไปรษณีย์</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">UTC</label>
						<div class="col-md-8">
						<div class="col-md-8">
							<select id="server_id" name="Object[utc]" class="form-control">
								<option value="0">UTC</option>
								<option value="7">UTC7</option>
							</select>
						</div>
						</div>
					</div>
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="box_id">GPS รุ่น</label>
						<div class="col-md-8">
							<select id="box_id" name="Object[box_id]" class="form-control">
<option value="1" <?php if($dbarr['car_approve_id']=="132/2559"){ echo "selected" ; } ?>>T333</option>
<option value="2" <?php if($dbarr['car_approve_id']=="201/2560"){ echo "selected" ; } ?>>T1</option>
<option value="3" <?php if($dbarr['car_approve_id']=="218/2560"){ echo "selected" ; } ?>>AW GPS 3G</option>
<option value="4" <?php if($dbarr['car_approve_id']=="207/2560"){ echo "selected" ; } ?>>VT900</option>
<option value="5" <?php if($dbarr['car_approve_id']=="224/2560"){ echo "selected" ; } ?>>GT06E</option>
<option value="6" <?php if($dbarr['car_approve_id']=="fm11"){ echo "selected" ; } ?>>Fm11</option>
<option value="7" <?php if($dbarr['car_approve_id']=="ts107"){ echo "selected" ; } ?>>TS</option>
<option value="7" <?php if($dbarr['car_approve_id']=="tk103"){ echo "selected" ; } ?>>TK103</option>
							</select>
													</div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="box_id">เครื่องรูดบัตร รุ่น</label>
						<div class="col-md-8">
							<select id="skimer_id" name="Object[skimer_id]" class="form-control">
								<option value="2"></option><option value="4"selected="selected">CR1300</option><option value="1">S1</option><option value="3">S1</option><option value="5">Z1</option>							</select>
													</div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="user_id">เจ้าของยานพาหนะ</label>
						<div class="col-md-8">
							<select id="user_id" name="Object[user_id]" class="form-control">
								<option value="342">cei17043</option><option value="341">greenboxgps</option><option value="343">hpsanpatong</option><option value="<?php echo $dbarr['uid'] ; ?>" selected="selected"><?php echo $dbarr['phone'] ; ?></option>							</select>
													</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="imei">หมายเลข IMEI</label>
						<div class="col-md-8">
							<input id="imei" name="Object[imei]" placeholder="" class="form-control input-md" required="" type="text" value="<?php echo $dbarr['zipcode'] ; ?>">

						</div>
					</div>


					<!-- <div class="form-group">
						<label class="col-md-3 control-label">ติดกล้อง</label>
						<div class="col-md-8">

							<input id="camera1" name="Object[camera1]" type="checkbox" placeholder="" value="1"  >
							<label for="camera1" class="control-label"> กล้อง 1</label>
							&nbsp;&nbsp;
							<input id="camera2" name="Object[camera2]" type="checkbox" placeholder="" value="1"  >
							<label for="camera2" class="control-label"> กล้อง 2</label>

						</div>
					</div> -->

                    <div class="form-group">
						<label class="col-md-3 control-label">ดับเครื่องยนต์</label>
						<div class="col-md-8">

							<input name="Object[relay]" type="checkbox" id="relay" value="1" placeholder="">
							<label for="relay" class="control-label"> ดับเครื่องยนต์</label>
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="col-md-3 control-label">เจาะจงติดตาม</label>
						<div class="col-md-8">

							<input id="data_transfer1" name="Object[datatransfer]" type="radio" placeholder="" value="1"  >
							<label for="data_transfer1" class="control-label">เปิดใช้งาน</label>
							&nbsp;&nbsp;
							<input id="data_transfer2" name="Object[datatransfer]" type="radio" placeholder="" value="0"  >
							<label for="data_transfer2" class="control-label">ปิดใช้งาน</label>

						</div>
					</div> -->

					<div class="form-group">
						<label class="col-md-3 control-label">แจ้งเตือนเข้า-ออกพื้นที่ผ่านอีเมล</label>
						<div class="col-md-8">


							<input name="Object[checkpoi]" type="radio" id="data_transfer1" value="1" checked placeholder="">
							<label for="data_transfer1" class="control-label">เปิดใช้งาน</label>
							&nbsp;&nbsp;
							<input id="data_transfer2" name="Object[checkpoi]" placeholder="" value="0" type="radio">
							<label for="data_transfer2" class="control-label">ปิดใช้งาน</label>

						</div>
					</div>

										<div class="form-group">
						<label class="col-md-3 control-label" for="sim">หมายเลขซิม</label>
						<div class="col-md-8">
							<input id="sim" name="Object[sim]" placeholder="" class="form-control input-md" required="" size="10" type="text" value="1234">
						</div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="simbrand">เครือข่าย</label>
						<div class="col-md-8">
							<select id="simbrand" name="Object[simbrand]" class="form-control">
								<option value="">----------กรุณาเลือก----------</option><option value="3">AIS</option><option value="1">dtac</option><option value="2" selected="selected">true</option>							</select>
													</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="detail">รายละเอียด</label>
						<div class="col-md-8">
							<textarea id="detail" name="Object[detail]" placeholder="รายละเอียดยานพาหนะ" class="form-control input-md" value="" size="10">0</textarea>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="name">ชื่อยานพาหนะ</label>
						<div class="col-md-8">
							<input id="name" name="Object[name]" placeholder="" class="form-control input-md" required="" value="0" type="text">

						</div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="brand" style="color:red">*** ยี่ห้อรถ</label>
						<div class="col-md-8">
							<select id="brand" name="Object[brand]" class="form-control">
							<option value="<?php echo $dbarr['address'] ; ?>" selected="selected"><?php echo $dbarr['address'] ; ?></option>
								<option value="">----------กรุณาเลือก----------</option><option value="BENZ">BENZ</option><option value="BMW">BMW</option><option value="CHEETAH">CHEETAH</option><option value="CHEPPEL">CHEPPEL</option><option value="CHERDCHAI">CHERDCHAI</option><option value="CHEVROLET">CHEVROLET</option><option value="DAEWOO">DAEWOO</option><option value="DODGE">DODGE</option><option value="FAW">FAW</option><option value="FORD">FORD</option><option value="GOLDEN DRAGON">GOLDEN DRAGON</option><option value="HINO">HINO</option><option value="HONDA">HONDA</option><option value="HYUNDAI">HYUNDAI</option><option value="ISUZU">ISUZU</option><option value="LEYLAND">LEYLAND</option><option value="MITSUBISHI">MITSUBISHI</option><option value="NISSAN">NISSAN</option><option value="SANY">SANY</option><option value="SCANIA">SCANIA</option><option value="SINOTRUK HOWO">SINOTRUK HOWO</option><option value="STIE">STIE</option><option value="SUZUKI">SUZUKI</option><option value="TOYOTA">TOYOTA</option><option value="VOLVO">VOLVO</option>								</select>
													</div>
					</div>

					<!-- Text input-->
					<!--<div class="form-group">
						<label class="col-md-3 control-label" for="brand"  style="color:red">*** ยี่ห้อรถ</label>
						<div class="col-md-8">
							<input id="brand" name="Object[brand]" type="text" placeholder=""  class="form-control input-md" required="" value="0" >

						</div>
					</div>-->

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="number">ทะเบียน</label>
						<div class="col-md-8">
							<input id="number" name="Object[number]" placeholder="" class="form-control input-md" required="" value="<?php echo $dbarr['amper'] ; ?>" type="text">
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="number" style="color:red">*** ทะเบียนส่งขนส่ง</label>
						<div class="col-md-8">
							<input id="number_sendToG" name="Object[number_sendToG]" placeholder="" class="form-control input-md" required="" value="<?php echo $dbarr['amper'] ; ?>" type="text">

						</div>
					</div>



					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="number_province" style="color:red">*** จังหวัดที่จดทะเบียน</label>
						<div class="col-md-8">
							<select id="number_province" name="Object[number_province]" class="form-control">
							<option value="<?php echo $dbarr['province2'] ; ?>" selected="selected"><?php echo $dbarr['province2'] ; ?></option>
								<option value="">----------กรุณาเลือก----------</option><option value="805">กระบี่</option><option value="001">กรุงเทพมหานคร</option><option value="701">กาญจนบุรี</option><option value="406">กาฬสินธ์</option><option value="604">กำแพงเพชร</option><option value="405">ขอนแก่น</option><option value="205">จันทบุรี</option><option value="202">ฉะเชิงเทรา</option><option value="203">ชลบุรี</option><option value="100">ชัยนาท</option><option value="300">ชัยภูมิ</option><option value="800">ชุมพร</option><option value="901">ตรัง</option><option value="206">ตราด</option><option value="602">ตาก</option><option value="200">นครนายก</option><option value="702">นครปฐม</option><option value="403">นครพนม</option><option value="305">นครราชสีมา</option><option value="804">นครศรีธรรมราช</option><option value="607">นครสวรรค์</option><option value="107">นนทบุรี</option><option value="906">นราธิวาส</option><option value="504">น่าน</option><option value="309">บึงกาฬ</option><option value="904">บึตตานี</option><option value="304">บุรีรัมย์</option><option value="106">ปทุมธานี</option><option value="707">ประจวบคีรีขันธ์</option><option value="201">ปราจีนบุรี</option><option value="105">พระนครศรีอยุธยา</option><option value="503">พะเยา</option><option value="803">พังงา</option><option value="900">พัทลุง</option><option value="605">พิจิตร</option><option value="603">พิษณุโลก</option><option value="806">ภูเก็ต</option><option value="407">มหาสารคาม</option><option value="409">มุกดาหาร</option><option value="905">ยะลา</option><option value="301">ยโสธร</option><option value="801">ระนอง</option><option value="204">ระยอง</option><option value="703">ราชบุรี</option><option value="408">ร้อยเอ็ด</option><option value="102">ลพบุรี</option><option value="506">ลำปาง</option><option value="505">ลำพูน</option><option value="303">ศรีสะเกษ</option><option value="404">สกลนคร</option><option value="902">สงขลา</option><option value="903">สตูล</option><option value="108">สมุทรปราการ</option><option value="705">สมุทรสงคราม</option><option value="704">สมุทรสาคร</option><option value="104">สระบุรี</option><option value="207">สระแก้ว</option><option value="101">สิงห์บุรี</option><option value="700">สุพรรณบุรี</option><option value="802">สุราษฎร์ธานี</option><option value="306">สุรินทร์</option><option value="601">สุโขทัย</option><option value="400">หนองคาย</option><option value="308">หนองบัวลำภู</option><option value="307">อำนาจเจริญ</option><option value="402">อุดรธานี</option><option value="600">อุตรดิตถ์</option><option value="608">อุทัยธานี</option><option value="302">อุบลราชธานี</option><option value="103">อ่างทอง</option><option value="500">เชียงราย</option><option value="502">เชียงใหม่</option><option value="606">เพชรบุรณ์</option><option value="706">เพชรบุรี</option><option value="401">เลย</option><option value="507">แพร่</option><option value="501">แม่ฮ่องสอน</option>							</select>
													</div>
					</div>

					<!-- Text input-->
					-<!--<div class="form-group">
						<label class="col-md-3 control-label" for="number"  style="color:red">*** จังหวัดที่จดทะเบียน</label>
						<div class="col-md-8">
							<input id="number_province" name="Object[number_province]" type="text" placeholder="" class="form-control input-md" required="" value="0" >

						</div>
					</div>-->


                    <!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="number">หมายเลขเครื่อง</label>
						<div class="col-md-8">
							<input id="number" name="Object[mortor]" placeholder="" class="form-control input-md" required="" value="0" type="text">

						</div>
					</div>

                    <!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="number" style="color: red;">*** เลขตัวรถ</label>
						<div class="col-md-8">
							<input id="number" name="Object[chassis]" placeholder="" class="form-control input-md" required="" value="<?php echo $dbarr['user'] ; ?>" type="text">

						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="car_mile">เลขไมล์</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="car_mile" name="Object[car_mile]" min="0" placeholder="" class="form-control input-md" required="" value="0" type="number">
								<span class="input-group-addon">
									กม.
								</span>
							</div>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="overspeed">จำกัดความเร็ว</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="overspeed" name="Object[overspeed]" placeholder="" class="form-control input-md" required="" min="0" step="1" max="300" value="80" type="number">
								<span class="input-group-addon">
									กม./ชม.
								</span>
							</div>
						</div>
					</div>

					<!-- Text input-->
					<!-- <div class="form-group">
						<label class="col-md-3 control-label" for="ngvconsume2">เตือนความเร็ว [Bus01/Bus02]</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="ngvconsume2" name="Object[ngvconsume2]" type="number" placeholder="" class="form-control input-md" required="" min="0" step="1" max="300" value="0" />
								<span class="input-group-addon">
									กม./ชม.
								</span>
							</div>
						</div>
					</div> -->

                    <!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="fuel_tank_size">ขนาดถังน้ำมัน</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="fuel_tank_size" name="Object[fuel_tank_size]" placeholder="" class="form-control input-md" required="" min="0" step="1" max="600" value="100" type="number">
								<span class="input-group-addon">
									ลิตร.
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="oil_min">กระแสไฟน้ำมัน</label>
						<div class="col-md-8">
							<div class="input-group">
								<span class="input-group-addon">
									Min
								</span>
								<input id="oil_min" name="Object[oil_min]" step="1" min="0" placeholder="" class="form-control input-md" required="" value="0" type="number">
								<span class="input-group-addon">
									mV
								</span>
							</div> -
							<div class="input-group">
								<span class="input-group-addon">
									Max
								</span>
								<input id="oil_max" name="Object[oil_max]" step="1" min="0" placeholder="" class="form-control input-md" required="" value="0" type="number">
								<span class="input-group-addon">
									mV
								</span>
							</div>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="oilconsume">อัตราการใช้น้ำมัน</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="oilconsume" name="Object[oilconsume]" step=".1" min="0" placeholder="" class="form-control input-md" required="" value="0" type="number">
								<span class="input-group-addon">
									กม./ลิตร
								</span>
							</div>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="ngvconsume">อัตราการใช้แก๊ส</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="ngvconsume" name="Object[ngvconsume]" step=".1" min="0" placeholder="" class="form-control input-md" required="" value="0" type="number">
								<span class="input-group-addon">
									กม./กก.
								</span>
							</div>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="object_AD1LH">ระยะเวลาจอดรถ</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="object_AD1LH" name="Object[object_AD1LH]" step=".5" min="0" max="60" placeholder="" class="form-control input-md" required="" value="0" type="number">
								<span class="input-group-addon">
									นาที
								</span>
							</div>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="color">สีเส้น</label>
						<div class="col-md-8">
							<input id="color" class="colorpicker" name="Object[color]" placeholder="คลิกเพื่อเลือกสี" value="0" style="border-color: rgb(0, 0, 0);" type="text">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="icon">ไอคอนรถ</label>
						<div class="col-md-8">
														<label><input name="Object[icon]" value="" type="radio"> <img src="vendor/masterfile/left.png"></label>
														<label><input name="Object[icon]" value="10" type="radio"> <img src="vendor/masterfile/10left.png"></label>
														<label><input name="Object[icon]" value="4" type="radio"> <img src="vendor/masterfile/4left.png"></label>
														<label><input name="Object[icon]" value="6" type="radio"> <img src="vendor/masterfile/6left.png"></label>
														<label><input name="Object[icon]" value="b1" type="radio"> <img src="vendor/masterfile/b1left.png"></label>
														<label><input name="Object[icon]" value="bus" type="radio"> <img src="vendor/masterfile/busleft.png"></label>
														<label><input name="Object[icon]" value="bus2" type="radio"> <img src="vendor/masterfile/bus2left.png"></label>
														<label><input name="Object[icon]" value="bus3" type="radio"> <img src="vendor/masterfile/bus3left.png"></label>
														<label><input name="Object[icon]" value="c1" type="radio"> <img src="vendor/masterfile/c1left.png"></label>
														<label><input name="Object[icon]" value="m1" type="radio"> <img src="vendor/masterfile/m1left.png"></label>
														<label><input name="Object[icon]" value="p1" type="radio"> <img src="vendor/masterfile/p1left.png"></label>
														<label><input name="Object[icon]" value="t4" type="radio"> <img src="vendor/masterfile/t4left.png"></label>
														<label><input name="Object[icon]" value="y" type="radio"> <img src="vendor/masterfile/yleft.png"></label>
														<label><input name="Object[icon]" value="n" type="radio"> <img src="vendor/masterfile/nleft.png"></label>
														<label><input name="Object[icon]" value="red" type="radio"> <img src="vendor/masterfile/redleft.png"></label>
														<label><input name="Object[icon]" value="tr" type="radio"> <img src="vendor/masterfile/trleft.png"></label>
														<label><input name="Object[icon]" value="cr1" type="radio"> <img src="vendor/masterfile/cr1left.png"></label>
														<label><input name="Object[icon]" value="bus6" type="radio"> <img src="vendor/masterfile/bus6left.png"></label>
														<label><input name="Object[icon]" value="amb1" type="radio"> <img src="vendor/masterfile/amb1left.png"></label>
														<label><input name="Object[icon]" value="tr1" type="radio"> <img src="vendor/masterfile/tr1left.png"></label>
														<label><input name="Object[icon]" value="bus1" type="radio"> <img src="vendor/masterfile/bus1left.png"></label>
														<label><input name="Object[icon]" value="car1" type="radio"> <img src="vendor/masterfile/car1left.png"></label>
														<label><input name="Object[icon]" value="car2" type="radio"> <img src="vendor/masterfile/car2left.png"></label>
														<label><input name="Object[icon]" value="car3" type="radio"> <img src="vendor/masterfile/car3left.png"></label>
														<label><input name="Object[icon]" value="car4" type="radio"> <img src="vendor/masterfile/car4left.png"></label>
														<label><input name="Object[icon]" value="car5" type="radio"> <img src="vendor/masterfile/car5left.png"></label>
														<label><input name="Object[icon]" value="car6" type="radio"> <img src="vendor/masterfile/car6left.png"></label>
														<label><input name="Object[icon]" value="car7" type="radio"> <img src="vendor/masterfile/car7left.png"></label>
														<label><input name="Object[icon]" value="car8" type="radio"> <img src="vendor/masterfile/car8left.png"></label>
														<label><input name="Object[icon]" value="car9" type="radio"> <img src="vendor/masterfile/car9left.png"></label>
														<label><input name="Object[icon]" value="tr2" type="radio"> <img src="vendor/masterfile/tr2left.png"></label>
														<label><input name="Object[icon]" value="b2" type="radio"> <img src="vendor/masterfile/b2left.png"></label>

																					<script>
								$('input[name="Object[icon]"]').on('change',function(){
									$('input[name="Object[icon]"]').parents('label').css('border','none');
									$(this).parents('label').css('border','1px solid #f00');
								});
								$('input[name="Object[icon]"][value="amb1"]').get(0).checked = true;
								$('input[name="Object[icon]"][value="amb1"]').parents('label').css('border','1px solid #f00');
							</script>




																				</div>
					</div>

                           	<input name="Object[object_id]" value="" type="hidden">

                           	<ul class="nav nav-tabs">
  						<li class="active">
  						  <h2>ข้อมูลการจดทะเบียนรถ/ผู้ขับ</h2>
  						</li>
  					</ul><br><br>

  					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="driver">ชื่อผู้ขับ</label>
						<div class="col-md-8">
							<input id="driver" name="Object[driver]" placeholder="" class="form-control input-md" value="0" type="text">
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="driver_tel">เบอร์โทรศัพท์ผู้ขับ</label>
						<div class="col-md-8">
							<input id="driver_tel" name="Object[driver_tel]" placeholder="" class="form-control input-md" value="0" type="text">
						</div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="car_type">ลักษณะรถบรรทุก</label>
						<div class="col-md-8">
							<select id="car_type" name="Object[car_type]" class="form-control">
								<option value="" selected="selected">----------กรุณาเลือก----------</option><option value="1">ลักษณะ 1 รถกระบะบรรทุก</option><option value="2">ลักษณะ 2 รถตู้บรรทุก</option><option value="3">ลักษณะ 3 รถบรรทุกของเหลว</option><option value="4">ลักษณะ 4 รถบรรทุกวัตถุอันตราย</option><option value="5">ลักษณะ 5 รถเฉพาะกิจ</option><option value="6">ลักษณะ 6 รถพ่วง</option><option value="7">ลักษณะ 7 รถกึ่งพ่วง</option><option value="8">ลักษณะ 8 รถกึ่งพ่วงบรรทุกวัสดุยาว</option><option value="9">ลักษณะ 9 รถลากจูง</option><option value="10">ลักษณะ 10 รถเก๋ง</option><option value="11">ลักษณะ 11 รถตู้</option><option value="12">ลักษณะ 12 รถบัส</option><option value="13">ลักษณะ 13 รถกระบะ</option><option value="14">ลักษณะ 14 รถจักรยานยนต์</option><option value="15">ลักษณะ 15 รถขุดตัก</option><option value="16">ลักษณะ 16 รถบรรทุกเล็ก</option><option value="17">ลักษณะ 17 รถบรรทุกใหญ่</option>							</select>
													</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="regis_name" style="color:red;">*** ชื่อผู้ประกอบการขนส่ง/เจ้าของรถ</label>
						<div class="col-md-8">
							<input id="regis_name" name="Object[regis_name]" placeholder="" class="form-control input-md" value="<?php echo $dbarr['name'] ; ?>" type="text">
						</div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="register_type" style="color:red">*** ชนิดการจดทะเบียน</label>
						<div class="col-md-8">
							<select id="register_type" name="Object[register_type]" class="form-control">
								<option value="<?php echo $dbarr['register_type'] ; ?>" selected="selected"><?php echo $dbarr['register_type'] ; ?></option>
								<option value="0">ไม่มีข้อมูลประเภทและชนิดรถ</option>
								<option value="1000">รถโดยสารไมได้ระบุมาตรฐานรถและประเภทการขนส่ง</option><option value="1101">รถโดยสาร มาตรฐาน 1 ก ไม่ได้ระบุประเภทการขนส่ง</option><option value="1111">รถโดยสาร มาตรฐาน 1 ก ส่วนบุคคล</option><option value="1121">รถโดยสาร มาตรฐาน 1 ก ไม่ประจำทาง</option><option value="1131">รถโดยสาร มาตรฐาน 1 ก ประจำทาง</option><option value="1102">รถโดยสาร มาตรฐาน 1 ข ไม่ได้ระบุประเภทการขนส่ง</option><option value="1112">รถโดยสาร มาตรฐาน 1 ข ส่วนบุคคล</option><option value="1122">รถโดยสาร มาตรฐาน 1 ข ไม่ประจำทาง</option><option value="1132">รถโดยสาร มาตรฐาน 1 ข ประจำทาง</option><option value="1201">รถโดยสาร มาตรฐาน 2 ก ไม่ได้ระบุประเภทการขนส่ง</option><option value="1211">รถโดยสาร มาตรฐาน 2 ก ส่วนบุคคล</option><option value="1221">รถโดยสาร มาตรฐาน 2 ก ไม่ประจำทาง</option><option value="1231">รถโดยสาร มาตรฐาน 2 ก ประจำทาง</option><option value="1202">รถโดยสาร มาตรฐาน 2 ข ไม่ได้ระบุประเภทการขนส่ง</option><option value="1212">รถโดยสาร มาตรฐาน 2 ข ส่วนบุคคล</option><option value="1222">รถโดยสาร มาตรฐาน 2 ข ไม่ประจำทาง</option><option value="1232">รถโดยสาร มาตรฐาน 2 ข ประจำทาง</option><option value="1203">รถโดยสาร มาตรฐาน 2 ค ไม่ได้ระบุประเภทการขนส่ง</option><option value="1213">รถโดยสาร มาตรฐาน 2 ค ส่วนบุคคล</option><option value="1223">รถโดยสาร มาตรฐาน 2 ค ไม่ประจำทาง</option><option value="1233">รถโดยสาร มาตรฐาน 2 ค ประจำทาง</option><option value="1204">รถโดยสาร มาตรฐาน 2 ง ไม่ได้ระบุประเภทการขนส่ง</option><option value="1214">รถโดยสาร มาตรฐาน 2 ง ส่วนบุคคล</option><option value="1224">รถโดยสาร มาตรฐาน 2 ง ไม่ประจำทาง</option><option value="1234">รถโดยสาร มาตรฐาน 2 ง ประจำทาง</option><option value="1205">รถโดยสาร มาตรฐาน 2 จ ไม่ได้ระบุประเภทการขนส่ง</option><option value="1215">รถโดยสาร มาตรฐาน 2 จ ส่วนบุคคล</option><option value="1225">รถโดยสาร มาตรฐาน 2 จ ไม่ประจำทาง</option><option value="1235">รถโดยสาร มาตรฐาน 2 จ ประจำทาง</option><option value="1301">รถโดยสาร มาตรฐาน 3 ก ไม่ได้ระบุประเภทการขนส่ง</option><option value="1311">รถโดยสาร มาตรฐาน 3 ก ส่วนบุคคล</option><option value="1321">รถโดยสาร มาตรฐาน 3 ก ไม่ประจำทาง</option><option value="1331">รถโดยสาร มาตรฐาน 3 ก ประจำทาง</option><option value="1302">รถโดยสาร มาตรฐาน 3 ข ไม่ได้ระบุประเภทการขนส่ง</option><option value="1312">รถโดยสาร มาตรฐาน 3 ข ส่วนบุคคล</option><option value="1322">รถโดยสาร มาตรฐาน 3 ข ไม่ประจำทาง</option><option value="1332">รถโดยสาร มาตรฐาน 3 ข ประจำทาง</option><option value="1303">รถโดยสาร มาตรฐาน 3 ค ไม่ได้ระบุประเภทการขนส่ง</option><option value="1313">รถโดยสาร มาตรฐาน 3 ค ส่วนบุคคล</option><option value="1323">รถโดยสาร มาตรฐาน 3 ค ไม่ประจำทาง</option><option value="1333">รถโดยสาร มาตรฐาน 3 ค ประจำทาง</option><option value="1304">รถโดยสาร มาตรฐาน 3 ง ไม่ได้ระบุประเภทการขนส่ง</option><option value="1314">รถโดยสาร มาตรฐาน 3 ง ส่วนบุคคล</option><option value="1324">รถโดยสาร มาตรฐาน 3 ง ไม่ประจำทาง</option><option value="1334">รถโดยสาร มาตรฐาน 3 ง ประจำทาง</option><option value="1305">รถโดยสาร มาตรฐาน 3 จ ไม่ได้ระบุประเภทการขนส่ง</option><option value="1315">รถโดยสาร มาตรฐาน 3 จ ส่วนบุคคล</option><option value="1325">รถโดยสาร มาตรฐาน 3 จ ไม่ประจำทาง</option><option value="1335">รถโดยสาร มาตรฐาน 3 จ ประจำทาง</option><option value="1306">รถโดยสาร มาตรฐาน 3 ฉ ไม่ได้ระบุประเภทการขนส่ง</option><option value="1316">รถโดยสาร มาตรฐาน 3 ฉ ส่วนบุคคล</option><option value="1326">รถโดยสาร มาตรฐาน 3 ฉ ไม่ประจำทาง</option><option value="1336">รถโดยสาร มาตรฐาน 3 ฉ ประจำทาง</option><option value="1401">รถโดยสาร มาตรฐาน 4 ก ไม่ได้ระบุประเภทการขนส่ง</option><option value="1411">รถโดยสาร มาตรฐาน 4 ก ส่วนบุคคล</option><option value="1421">รถโดยสาร มาตรฐาน 4 ก ไม่ประจำทาง</option><option value="1431">รถโดยสาร มาตรฐาน 4 ก ประจำทาง</option><option value="1402">รถโดยสาร มาตรฐาน 4 ข ไม่ได้ระบุประเภทการขนส่ง</option><option value="1412">รถโดยสาร มาตรฐาน 4 ข ส่วนบุคคล</option><option value="1422">รถโดยสาร มาตรฐาน 4 ข ไม่ประจำทาง</option><option value="1432">รถโดยสาร มาตรฐาน 4 ข ประจำทาง</option><option value="1403">รถโดยสาร มาตรฐาน 4 ค ไม่ได้ระบุประเภทการขนส่ง</option><option value="1413">รถโดยสาร มาตรฐาน 4 ค ส่วนบุคคล</option><option value="1423">รถโดยสาร มาตรฐาน 4 ค ไม่ประจำทาง</option><option value="1433">รถโดยสาร มาตรฐาน 4 ค ประจำทาง</option><option value="1404">รถโดยสาร มาตรฐาน 4 ง ไม่ได้ระบุประเภทการขนส่ง</option><option value="1414">รถโดยสาร มาตรฐาน 4 ง ส่วนบุคคล</option><option value="1424">รถโดยสาร มาตรฐาน 4 ง ไม่ประจำทาง</option><option value="1434">รถโดยสาร มาตรฐาน 4 ง ประจำทาง</option><option value="1405">รถโดยสาร มาตรฐาน 4 จ ไม่ได้ระบุประเภทการขนส่ง</option><option value="1415">รถโดยสาร มาตรฐาน 4 จ ส่วนบุคคล</option><option value="1425">รถโดยสาร มาตรฐาน 4 จ ไม่ประจำทาง</option><option value="1435">รถโดยสาร มาตรฐาน 4 จ ประจำทาง</option><option value="1406">รถโดยสาร มาตรฐาน 4 ฉ ไม่ได้ระบุประเภทการขนส่ง</option><option value="1416">รถโดยสาร มาตรฐาน 4 ฉ ส่วนบุคคล</option><option value="1426">รถโดยสาร มาตรฐาน 4 ฉ ไม่ประจำทาง</option><option value="1436">รถโดยสาร มาตรฐาน 4 ฉ ประจำทาง</option><option value="1501">รถโดยสาร มาตรฐาน 5 ก ไม่ได้ระบุประเภทการขนส่ง</option><option value="1511">รถโดยสาร มาตรฐาน 5 ก ส่วนบุคคล</option><option value="1521">รถโดยสาร มาตรฐาน 5 ก ไม่ประจำทาง</option><option value="1531">รถโดยสาร มาตรฐาน 5 ก ประจำทาง</option><option value="1502">รถโดยสาร มาตรฐาน 5 ข ไม่ได้ระบุประเภทการขนส่ง</option><option value="1512">รถโดยสาร มาตรฐาน 5 ข ส่วนบุคคล</option><option value="1522">รถโดยสาร มาตรฐาน 5 ข ไม่ประจำทาง</option><option value="1532">รถโดยสาร มาตรฐาน 5 ข ประจำทาง</option><option value="1601">รถโดยสาร มาตรฐาน 6 ก ไม่ได้ระบุประเภทการขนส่ง</option><option value="1611">รถโดยสาร มาตรฐาน 6 ก ส่วนบุคคล</option><option value="1621">รถโดยสาร มาตรฐาน 6 ก ไม่ประจำทาง</option><option value="1631">รถโดยสาร มาตรฐาน 6 ก ประจำทาง</option><option value="1602">รถโดยสาร มาตรฐาน 6 ข ไม่ได้ระบุประเภทการขนส่ง</option><option value="1612">รถโดยสาร มาตรฐาน 6 ข ส่วนบุคคล</option><option value="1622">รถโดยสาร มาตรฐาน 6 ข ไม่ประจำทาง</option><option value="1632">รถโดยสาร มาตรฐาน 6 ข ประจำทาง</option><option value="1700">รถโดยสาร มาตรฐาน 7 ไม่ได้ระบุประเภทการขนส่ง</option><option value="1710">รถโดยสาร มาตรฐาน 7 ส่วนบุคคล</option><option value="1720">รถโดยสาร มาตรฐาน 7 ไม่ประจำทาง</option><option value="2000">รถบรรทุก ไม่ได้ระบุลักษณะและประเภทรถ</option><option value="2100">รถบรรทุก ลักษณะ 1 ไม่ได้ระบุประเภทรถ</option><option value="2110">รถบรรทุก ลักษณะ 1 ส่วนบุคคล</option><option value="2120">รถบรรทุก ลักษณะ 1 ไม่ประจำทาง</option><option value="2200">รถบรรทุก ลักษณะ 2 ไม่ได้ระบุประเภทรถ</option><option value="2210">รถบรรทุก ลักษณะ 2 ส่วนบุคคล</option><option value="2220">รถบรรทุก ลักษณะ 2 ไม่ประจำทาง</option><option value="2300">รถบรรทุก ลักษณะ 3 ไม่ได้ระบุประเภทรถ</option><option value="2310">รถบรรทุก ลักษณะ 3 ส่วนบุคคล</option><option value="2320">รถบรรทุก ลักษณะ 3 ไม่ประจำทาง</option><option value="2400">รถบรรทุก ลักษณะ 4 ไม่ได้ระบุประเภทรถ</option><option value="2410">รถบรรทุก ลักษณะ 4 ส่วนบุคคล</option><option value="2420">รถบรรทุก ลักษณะ 4 ไม่ประจำทาง</option><option value="2500">รถบรรทุก ลักษณะ 5 ไม่ได้ระบุประเภทรถ</option><option value="2510">รถบรรทุก ลักษณะ 5 ส่วนบุคคล</option><option value="2520">รถบรรทุก ลักษณะ 5 ไม่ประจำทาง</option><option value="2600">รถบรรทุก ลักษณะ 6 ไม่ได้ระบุประเภทรถ</option><option value="2610">รถบรรทุก ลักษณะ 6 ส่วนบุคคล</option><option value="2620">รถบรรทุก ลักษณะ 6 ไม่ประจำทาง</option><option value="2700">รถบรรทุก ลักษณะ 7 ไม่ได้ระบุประเภทรถ</option><option value="2710">รถบรรทุก ลักษณะ 7 ส่วนบุคคล</option><option value="2720">รถบรรทุก ลักษณะ 7 ไม่ประจำทาง</option><option value="2800">รถบรรทุก ลักษณะ 8 ไม่ได้ระบุประเภทรถ</option><option value="2810">รถบรรทุก ลักษณะ 8 ส่วนบุคคล</option><option value="2820">รถบรรทุก ลักษณะ 8 ไม่ประจำทาง</option><option value="2900">รถบรรทุก ลักษณะ 9 ไม่ได้ระบุประเภทรถ</option><option value="2910">รถบรรทุก ลักษณะ 9 ส่วนบุคคล</option><option value="2920">รถบรรทุก ลักษณะ 9 ไม่ประจำทาง</option><option value="3000">รถยนต์ ไม่ระบุประเภทรถ</option><option value="3010">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option><option value="3011">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option><option value="3012">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option><option value="3013">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option><option value="3014">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option><option value="3020">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option><option value="3021">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option><option value="3022">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option><option value="3023">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option><option value="3024">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option><option value="3025">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option><option value="3030">รถยนต์บรรทุกส่วนบุคคล (รย.3)</option><option value="3031">รถยนต์บรรทุกส่วนบุคคล (รย.ร)</option><option value="3032">รถยนต์บรรทุกส่วนบุคคล (รย.ร)</option><option value="3033">รถยนต์บรรทุกส่วนบุคคล (รย.ร)</option><option value="3040">รถยนต์สามล้อส่วนบุคคล (รย.4)</option><option value="3041">รถยนต์สามล้อส่วนบุคคล (รย.4)</option><option value="3042">รถยนต์สามล้อส่วนบุคคล (รย.4)</option><option value="3043">รถยนต์สามล้อส่วนบุคคล (รย.4)</option><option value="3044">รถยนต์สามล้อส่วนบุคคล (รย.4)</option><option value="3050">รถยนต์รับจ้างระหว่างจังหวัด (รย.ร)</option><option value="3060">รถยนต์รับจ้างบรรทุกคนโดยสารไม่เกินเจ็ดคน (รย.6)</option><option value="3070">รถยนต์สี่ล้อเล็กรับจ้าง (รย.7)</option><option value="3080">รถยนต์รับจ้างสามล้อ (รย.8)</option><option value="3090">รถยนต์บริการธุรกิจ (รย.9)</option><option value="3100">รถยนต์บริการทัศนาจร (รย.10)</option><option value="3110">รถยนต์บริการให้เช่า (รย.11)</option><option value="4120">รถจักรยานยนต์ (รย.12)</option><option value="3130">รถแทรกเตอร์ (รย.13)</option><option value="3140">รถบดถนน (รย.14)</option><option value="3150">รถใช้งานเกษตรกรรม (รย.15)</option><option value="3160">รถพ่วง (รย.16)</option><option value="4170">รถจักรยานยนต์สาธารณะ (รย.17)</option>							</select>
													</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="car_approve_id" style="color:red">*** หมายเลขการรับรอง</label>
						<div class="col-md-8">
							<input id="car_approve_id" name="Object[car_approve_id]" placeholder="" class="form-control input-md" value="<?php echo $dbarr['car_approve_id'] ; ?>" type="text">
						</div>
					</div>

				<!-- Text input Date-->
                    <div class="form-group clearfix">
                        <label class="col-sm-3 control-label" for="registration_epd">วันที่เพิ่มเข้าระบบขนส่ง </label>
                        <div class="col-sm-9">
                            <input class="form-control daterangepicker" name="Object[sendToG_date]" id="sendToG_date" placeholder="เลือกวันที่" readonly="readonly" type="text">
                        </div>
                    </div>

                    <!-- Text input Date-->
                    <div class="form-group clearfix">
                        <label class="col-sm-3 control-label" for="registration_epd">วันที่ติดตั้ง GPS</label>
                        <div class="col-sm-9">
                            <input class="form-control daterangepicker" name="Object[setupGps_date]" id="setupGps_date" placeholder="เลือกวันที่" readonly="readonly" type="text">
                        </div>
                    </div>

							<input id="sendToG" name="Object[sendToG]" placeholder="" value="1" type="checkbox">
							<label for="sendToG" class="control-label"> ส่งข้อมูล</label>



									<ul class="nav nav-tabs">
  						<li class="active">
  						  <h2>ข้อมูลการตรวจเช็คระยะการบำรุงรักษายานพาหนะ</h2>
  						</li>
  					</ul><br><br>

                     <!-- Text input Date-->
                    <div class="form-group clearfix">
                        <label class="col-sm-3 control-label" for="registration_epd">วันหมดอายุทะเบียนรถ </label>
                        <div class="col-sm-9">
                            <input class="form-control daterangepicker" name="Object[registration_epd]" id="registration_epd" placeholder="เลือกวันที่" readonly="readonly" type="text">
                        </div>
                    </div>

                    <!-- Text input Date-->
                    <div class="form-group clearfix">
                        <label class="col-sm-3 control-label" for="insurance_epd">วันหมดอายุประกันภัย/พ.ร.บ.</label>
                        <div class="col-sm-9">
                            <input class="form-control daterangepicker" name="Object[insurance_epd]" id="insurance_epd" placeholder="เลือกวันที่" readonly="readonly" type="text">
                        </div>
                    </div>

  					<!-- Text input-->
				<!-- 	<div class="form-group">
						<label class="col-md-3 control-label" for="lubricator">น้ำมันเครื่อง</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="lubricator" name="Object[lubricator]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									กม.
								</span>
							</div>
						</div>
					</div> -->

					<!-- Text input-->
	<!-- 				<div class="form-group">
						<label class="col-md-3 control-label" for="lubricator">อายุน้ำมันเครื่อง</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="lubricator_ex" name="Object[lubricator_ex]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									เดือน
								</span>
							</div>
						</div>
					</div> -->

				 	<!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="tire">ยาง1</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="tire" name="Object[tire]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									กม.
								</span>
							</div>
						</div>
					</div> -->

					<!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="tire_ex">อายุยาง1</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="tire_ex" name="Object[tire_ex]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									เดือน
								</span>
							</div>
						</div>
					</div> -->

					<!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="tire1">ยาง2</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="tire1" name="Object[tire1]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									กม.
								</span>
							</div>
						</div>
					</div> -->

					<!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="tire1_ex1">อายุยาง2</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="tire1_ex" name="Object[tire1_ex]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									เดือน
								</span>
							</div>
						</div>
					</div> -->

					<!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="tire2">ยาง3</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="tire2" name="Object[tire2]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									กม.
								</span>
							</div>
						</div>
					</div>
 -->
					<!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="tire2_ex">อายุยาง3</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="tire2_ex" name="Object[tire2_ex]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									เดือน
								</span>
							</div>
						</div>
					</div>
 -->
					<!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="tire">ยาง4</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="tire3" name="Object[tire3]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									กม.
								</span>
							</div>
						</div>
					</div> -->

					<!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="tire3_ex">อายุยาง4</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="tire3_ex" name="Object[tire3_ex]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									เดือน
								</span>
							</div>
						</div>
					</div>
 -->
                  	<!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="differential_oil">น้ำมันเฟืองท้าย</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="differential_oil" name="Object[differential_oil]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									กม.
								</span>
							</div>
						</div>
					</div> -->

					<!-- Text input-->
	<!-- 				<div class="form-group">
						<label class="col-md-3 control-label" for="differential_oil_ex">อายุน้ำมันเฟืองท้าย</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="differential_oil_ex" name="Object[differential_oil_ex]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									เดือน
								</span>
							</div>
						</div>
					</div> -->

                    <!-- Text input-->
	<!-- 				<div class="form-group">
						<label class="col-md-3 control-label" for="gear_oil">น้ำมันเกียร์</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="gear_oil" name="Object[gear_oil]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									กม.
								</span>
							</div>
						</div>
					</div> -->

					<!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="gear_oil_ex">อายุน้ำมันเกียร์</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="gear_oil_ex" name="Object[gear_oil_ex]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									เดือน
								</span>
							</div>
						</div>
					</div> -->

                    <!-- Text input-->
	<!-- 				<div class="form-group">
						<label class="col-md-3 control-label" for="oil_blake">น้ำมันเบรค</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="oil_blake" name="Object[oil_blake]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									กม.
								</span>
							</div>
						</div>
					</div> -->

					<!-- Text input-->
	<!-- 				<div class="form-group">
						<label class="col-md-3 control-label" for="oil_blake_ex">อายุน้ำมันเบรค</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="oil_blake_ex" name="Object[oil_blake_ex]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									เดือน
								</span>
							</div>
						</div>
					</div> -->

                    <!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="plate_clutch">แผ่นคลัทช์</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="plate_clutch" name="Object[plate_clutch]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									กม.
								</span>
							</div>
						</div>
					</div> -->

					<!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="plate_clutch_ex">อายุแผ่นคลัทช์</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="plate_clutch_ex" name="Object[plate_clutch_ex]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									เดือน
								</span>
							</div>
						</div>
					</div> -->

                    <!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="brake">ผ้าเบรค</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="brake" name="Object[brake]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									กม.
								</span>
							</div>
						</div>
					</div> -->

					<!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="brake_ex">อายุผ้าเบรค</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="brake_ex" name="Object[brake_ex]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									เดือน
								</span>
							</div>
						</div>
					</div> -->

                    <!-- Text input-->
<!-- 					<div class="form-group">
						<label class="col-md-3 control-label" for="belt">สายพาน</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="belt" name="Object[belt]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									กม.
								</span>
							</div>
						</div>
					</div> -->

                    <!-- Text input-->
		<!-- 			<div class="form-group">
						<label class="col-md-3 control-label" for="belt_ex">อายุสายพาน</label>
						<div class="col-md-8">
							<div class="input-group">
								<input id="belt_ex" name="Object[belt_ex]" type="number"  min="0" placeholder="" class="form-control input-md" required="" value="0">
								<span class="input-group-addon">
									เดือน
								</span>
							</div>
						</div>
					</div> -->

				<!-- Button -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="singlebutton"></label>
						<div class="col-md-8">
							<button type="submit" id="singlebutton" class="btn btn-success">บันทึก</button>
							<a href="http://www.greenboxsv3.com/objects.php"><button type="button" id="singlebutton" class="btn btn-warning">กลับ</button></a>
						</div>
					</div>
					<hr>
			</form>
		</div>
	</div>
	<div class="hidden">
	</div>

		<script>
			$('#hideSidebar').on('click',hideSidebar);
			$('#showSidebar').on('click',showSidebar);
			rePositionDraggable('.movable');
			$('input.daterangepicker').daterangepicker({
				singleDatePicker : true,
				startDate : new Date(),
				//timePicker:true,
				timePicker12Hour:false,
				timePickerIncrement:1,
				format : 'YYYY-MM-DD',
				dateLimit : 1,
				separator : '|'
			}).on('show.daterangepicker',function(ev,picker){
				picker.element.removeClass('opensright');
				picker.element.find('.ranges').insertBefore('.calendar.right');
				picker.element.find('.ranges').insertBefore('.calendar.right');
				picker.element.find('.calendar.left').insertBefore('.calendar.right');
				picker.element.find('.applyBtn').text('ตกลง');
				picker.element.find('.cancelBtn').text('ยกเลิก');

			}).attr('readonly',true);
			$('#dateHistory').val('')
			//console.log('init daterangepicker');
			//alert('test');
			$('[data-tooltip=tooltip]').tooltip();

			$('.colorpicker').colpick({
				layout:'hex',
				submit:0,
				//color : this.value.substring(1),
				colorScheme:'dark',
				onChange:function(hsb,hex,rgb,el,bySetColor) {
					$(el).css('border-color','#'+hex);
					// Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
					if(!bySetColor) $(el).val('#'+hex);
				}
			}).keyup(function(){
				$(this).colpickSetColor(this.value);
			});
			if ($('#color').val()) $('#color').colpickSetColor($('#color').val().substring(1));
			function toggleItem(itemname){
				if ($(itemname).is(':visible')){
					$(itemname).hide();
				} else {
					$(itemname).show();
				}
			}
			if (isMobile.phone){
				$('.car-action').css('font-size','20px');
				$('.movable').css('width',$(window).width());
			} else {
				$('#device ul').css('max-height',$(window).height()-200);
			}

			if (isMobile.apple) window.scrollTo(0,1);


			$(window).on('load',function(){
				//$('#main').removeAttr('style').height($(window).height()-30);
				if (typeof console != 'undefined') console.log('test');
			});
			// $('body').bind("dragstart", function(event, ui){
			// 	event.preventDefault();
			// });
			// $(document).bind("dragstart", function(event, ui){
			// 	event.preventDefault();
			// });

		</script><div class="daterangepicker dropdown-menu opensright"><div class="calendar right" style="display: none;"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">มิถุนา 2017</th><th class="next available"><i class="fa fa-arrow-right icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>อา.</th><th>จ.</th><th>อ.</th><th>พ.</th><th>พฤ.</th><th>ศ.</th><th>ส.</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">28</td><td class="off disabled" data-title="r0c1">29</td><td class="off disabled" data-title="r0c2">30</td><td class="off disabled" data-title="r0c3">31</td><td class="off disabled" data-title="r0c4">1</td><td class="available active start-date end-date" data-title="r0c5">2</td><td class="available" data-title="r0c6">3</td></tr><tr><td class="available" data-title="r1c0">4</td><td class="available" data-title="r1c1">5</td><td class="available" data-title="r1c2">6</td><td class="available" data-title="r1c3">7</td><td class="available" data-title="r1c4">8</td><td class="available" data-title="r1c5">9</td><td class="available" data-title="r1c6">10</td></tr><tr><td class="available" data-title="r2c0">11</td><td class="available" data-title="r2c1">12</td><td class="available" data-title="r2c2">13</td><td class="available" data-title="r2c3">14</td><td class="available" data-title="r2c4">15</td><td class="available" data-title="r2c5">16</td><td class="available" data-title="r2c6">17</td></tr><tr><td class="available" data-title="r3c0">18</td><td class="available" data-title="r3c1">19</td><td class="available" data-title="r3c2">20</td><td class="available" data-title="r3c3">21</td><td class="available" data-title="r3c4">22</td><td class="available" data-title="r3c5">23</td><td class="available" data-title="r3c6">24</td></tr><tr><td class="available" data-title="r4c0">25</td><td class="available" data-title="r4c1">26</td><td class="available" data-title="r4c2">27</td><td class="available" data-title="r4c3">28</td><td class="available" data-title="r4c4">29</td><td class="available" data-title="r4c5">30</td><td class="available off" data-title="r4c6">1</td></tr><tr><td class="available off" data-title="r5c0">2</td><td class="available off" data-title="r5c1">3</td><td class="available off" data-title="r5c2">4</td><td class="available off" data-title="r5c3">5</td><td class="available off" data-title="r5c4">6</td><td class="available off" data-title="r5c5">7</td><td class="available off" data-title="r5c6">8</td></tr></tbody></table></div></div><div class="calendar single left" style="display: block;"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">มิถุนา 2017</th><th class="next available"><i class="fa fa-arrow-right icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>อา.</th><th>จ.</th><th>อ.</th><th>พ.</th><th>พฤ.</th><th>ศ.</th><th>ส.</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">28</td><td class="available off" data-title="r0c1">29</td><td class="available off" data-title="r0c2">30</td><td class="available off" data-title="r0c3">31</td><td class="available" data-title="r0c4">1</td><td class="available active start-date end-date" data-title="r0c5">2</td><td class="available" data-title="r0c6">3</td></tr><tr><td class="available" data-title="r1c0">4</td><td class="available" data-title="r1c1">5</td><td class="available" data-title="r1c2">6</td><td class="available" data-title="r1c3">7</td><td class="available" data-title="r1c4">8</td><td class="available" data-title="r1c5">9</td><td class="available" data-title="r1c6">10</td></tr><tr><td class="available" data-title="r2c0">11</td><td class="available" data-title="r2c1">12</td><td class="available" data-title="r2c2">13</td><td class="available" data-title="r2c3">14</td><td class="available" data-title="r2c4">15</td><td class="available" data-title="r2c5">16</td><td class="available" data-title="r2c6">17</td></tr><tr><td class="available" data-title="r3c0">18</td><td class="available" data-title="r3c1">19</td><td class="available" data-title="r3c2">20</td><td class="available" data-title="r3c3">21</td><td class="available" data-title="r3c4">22</td><td class="available" data-title="r3c5">23</td><td class="available" data-title="r3c6">24</td></tr><tr><td class="available" data-title="r4c0">25</td><td class="available" data-title="r4c1">26</td><td class="available" data-title="r4c2">27</td><td class="available" data-title="r4c3">28</td><td class="available" data-title="r4c4">29</td><td class="available" data-title="r4c5">30</td><td class="available off" data-title="r4c6">1</td></tr><tr><td class="available off" data-title="r5c0">2</td><td class="available off" data-title="r5c1">3</td><td class="available off" data-title="r5c2">4</td><td class="available off" data-title="r5c3">5</td><td class="available off" data-title="r5c4">6</td><td class="available off" data-title="r5c5">7</td><td class="available off" data-title="r5c6">8</td></tr></tbody></table></div></div><div class="ranges" style="display: none;"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="2017-06-02" disabled="disabled" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="2017-06-02" disabled="disabled" type="text"></div><button class="applyBtn btn btn-small btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-default">Cancel</button></div></div></div><div class="daterangepicker dropdown-menu opensright"><div class="calendar right" style="display: none;"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">มิถุนา 2017</th><th class="next available"><i class="fa fa-arrow-right icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>อา.</th><th>จ.</th><th>อ.</th><th>พ.</th><th>พฤ.</th><th>ศ.</th><th>ส.</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">28</td><td class="off disabled" data-title="r0c1">29</td><td class="off disabled" data-title="r0c2">30</td><td class="off disabled" data-title="r0c3">31</td><td class="off disabled" data-title="r0c4">1</td><td class="available active start-date end-date" data-title="r0c5">2</td><td class="available" data-title="r0c6">3</td></tr><tr><td class="available" data-title="r1c0">4</td><td class="available" data-title="r1c1">5</td><td class="available" data-title="r1c2">6</td><td class="available" data-title="r1c3">7</td><td class="available" data-title="r1c4">8</td><td class="available" data-title="r1c5">9</td><td class="available" data-title="r1c6">10</td></tr><tr><td class="available" data-title="r2c0">11</td><td class="available" data-title="r2c1">12</td><td class="available" data-title="r2c2">13</td><td class="available" data-title="r2c3">14</td><td class="available" data-title="r2c4">15</td><td class="available" data-title="r2c5">16</td><td class="available" data-title="r2c6">17</td></tr><tr><td class="available" data-title="r3c0">18</td><td class="available" data-title="r3c1">19</td><td class="available" data-title="r3c2">20</td><td class="available" data-title="r3c3">21</td><td class="available" data-title="r3c4">22</td><td class="available" data-title="r3c5">23</td><td class="available" data-title="r3c6">24</td></tr><tr><td class="available" data-title="r4c0">25</td><td class="available" data-title="r4c1">26</td><td class="available" data-title="r4c2">27</td><td class="available" data-title="r4c3">28</td><td class="available" data-title="r4c4">29</td><td class="available" data-title="r4c5">30</td><td class="available off" data-title="r4c6">1</td></tr><tr><td class="available off" data-title="r5c0">2</td><td class="available off" data-title="r5c1">3</td><td class="available off" data-title="r5c2">4</td><td class="available off" data-title="r5c3">5</td><td class="available off" data-title="r5c4">6</td><td class="available off" data-title="r5c5">7</td><td class="available off" data-title="r5c6">8</td></tr></tbody></table></div></div><div class="calendar single left" style="display: block;"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">มิถุนา 2017</th><th class="next available"><i class="fa fa-arrow-right icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>อา.</th><th>จ.</th><th>อ.</th><th>พ.</th><th>พฤ.</th><th>ศ.</th><th>ส.</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">28</td><td class="available off" data-title="r0c1">29</td><td class="available off" data-title="r0c2">30</td><td class="available off" data-title="r0c3">31</td><td class="available" data-title="r0c4">1</td><td class="available active start-date end-date" data-title="r0c5">2</td><td class="available" data-title="r0c6">3</td></tr><tr><td class="available" data-title="r1c0">4</td><td class="available" data-title="r1c1">5</td><td class="available" data-title="r1c2">6</td><td class="available" data-title="r1c3">7</td><td class="available" data-title="r1c4">8</td><td class="available" data-title="r1c5">9</td><td class="available" data-title="r1c6">10</td></tr><tr><td class="available" data-title="r2c0">11</td><td class="available" data-title="r2c1">12</td><td class="available" data-title="r2c2">13</td><td class="available" data-title="r2c3">14</td><td class="available" data-title="r2c4">15</td><td class="available" data-title="r2c5">16</td><td class="available" data-title="r2c6">17</td></tr><tr><td class="available" data-title="r3c0">18</td><td class="available" data-title="r3c1">19</td><td class="available" data-title="r3c2">20</td><td class="available" data-title="r3c3">21</td><td class="available" data-title="r3c4">22</td><td class="available" data-title="r3c5">23</td><td class="available" data-title="r3c6">24</td></tr><tr><td class="available" data-title="r4c0">25</td><td class="available" data-title="r4c1">26</td><td class="available" data-title="r4c2">27</td><td class="available" data-title="r4c3">28</td><td class="available" data-title="r4c4">29</td><td class="available" data-title="r4c5">30</td><td class="available off" data-title="r4c6">1</td></tr><tr><td class="available off" data-title="r5c0">2</td><td class="available off" data-title="r5c1">3</td><td class="available off" data-title="r5c2">4</td><td class="available off" data-title="r5c3">5</td><td class="available off" data-title="r5c4">6</td><td class="available off" data-title="r5c5">7</td><td class="available off" data-title="r5c6">8</td></tr></tbody></table></div></div><div class="ranges" style="display: none;"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="2017-06-02" disabled="disabled" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="2017-06-02" disabled="disabled" type="text"></div><button class="applyBtn btn btn-small btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-default">Cancel</button></div></div></div><div class="daterangepicker dropdown-menu opensright"><div class="calendar right" style="display: none;"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">มิถุนา 2017</th><th class="next available"><i class="fa fa-arrow-right icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>อา.</th><th>จ.</th><th>อ.</th><th>พ.</th><th>พฤ.</th><th>ศ.</th><th>ส.</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">28</td><td class="off disabled" data-title="r0c1">29</td><td class="off disabled" data-title="r0c2">30</td><td class="off disabled" data-title="r0c3">31</td><td class="off disabled" data-title="r0c4">1</td><td class="available active start-date end-date" data-title="r0c5">2</td><td class="available" data-title="r0c6">3</td></tr><tr><td class="available" data-title="r1c0">4</td><td class="available" data-title="r1c1">5</td><td class="available" data-title="r1c2">6</td><td class="available" data-title="r1c3">7</td><td class="available" data-title="r1c4">8</td><td class="available" data-title="r1c5">9</td><td class="available" data-title="r1c6">10</td></tr><tr><td class="available" data-title="r2c0">11</td><td class="available" data-title="r2c1">12</td><td class="available" data-title="r2c2">13</td><td class="available" data-title="r2c3">14</td><td class="available" data-title="r2c4">15</td><td class="available" data-title="r2c5">16</td><td class="available" data-title="r2c6">17</td></tr><tr><td class="available" data-title="r3c0">18</td><td class="available" data-title="r3c1">19</td><td class="available" data-title="r3c2">20</td><td class="available" data-title="r3c3">21</td><td class="available" data-title="r3c4">22</td><td class="available" data-title="r3c5">23</td><td class="available" data-title="r3c6">24</td></tr><tr><td class="available" data-title="r4c0">25</td><td class="available" data-title="r4c1">26</td><td class="available" data-title="r4c2">27</td><td class="available" data-title="r4c3">28</td><td class="available" data-title="r4c4">29</td><td class="available" data-title="r4c5">30</td><td class="available off" data-title="r4c6">1</td></tr><tr><td class="available off" data-title="r5c0">2</td><td class="available off" data-title="r5c1">3</td><td class="available off" data-title="r5c2">4</td><td class="available off" data-title="r5c3">5</td><td class="available off" data-title="r5c4">6</td><td class="available off" data-title="r5c5">7</td><td class="available off" data-title="r5c6">8</td></tr></tbody></table></div></div><div class="calendar single left" style="display: block;"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">มิถุนา 2017</th><th class="next available"><i class="fa fa-arrow-right icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>อา.</th><th>จ.</th><th>อ.</th><th>พ.</th><th>พฤ.</th><th>ศ.</th><th>ส.</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">28</td><td class="available off" data-title="r0c1">29</td><td class="available off" data-title="r0c2">30</td><td class="available off" data-title="r0c3">31</td><td class="available" data-title="r0c4">1</td><td class="available active start-date end-date" data-title="r0c5">2</td><td class="available" data-title="r0c6">3</td></tr><tr><td class="available" data-title="r1c0">4</td><td class="available" data-title="r1c1">5</td><td class="available" data-title="r1c2">6</td><td class="available" data-title="r1c3">7</td><td class="available" data-title="r1c4">8</td><td class="available" data-title="r1c5">9</td><td class="available" data-title="r1c6">10</td></tr><tr><td class="available" data-title="r2c0">11</td><td class="available" data-title="r2c1">12</td><td class="available" data-title="r2c2">13</td><td class="available" data-title="r2c3">14</td><td class="available" data-title="r2c4">15</td><td class="available" data-title="r2c5">16</td><td class="available" data-title="r2c6">17</td></tr><tr><td class="available" data-title="r3c0">18</td><td class="available" data-title="r3c1">19</td><td class="available" data-title="r3c2">20</td><td class="available" data-title="r3c3">21</td><td class="available" data-title="r3c4">22</td><td class="available" data-title="r3c5">23</td><td class="available" data-title="r3c6">24</td></tr><tr><td class="available" data-title="r4c0">25</td><td class="available" data-title="r4c1">26</td><td class="available" data-title="r4c2">27</td><td class="available" data-title="r4c3">28</td><td class="available" data-title="r4c4">29</td><td class="available" data-title="r4c5">30</td><td class="available off" data-title="r4c6">1</td></tr><tr><td class="available off" data-title="r5c0">2</td><td class="available off" data-title="r5c1">3</td><td class="available off" data-title="r5c2">4</td><td class="available off" data-title="r5c3">5</td><td class="available off" data-title="r5c4">6</td><td class="available off" data-title="r5c5">7</td><td class="available off" data-title="r5c6">8</td></tr></tbody></table></div></div><div class="ranges" style="display: none;"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="2017-06-02" disabled="disabled" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="2017-06-02" disabled="disabled" type="text"></div><button class="applyBtn btn btn-small btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-default">Cancel</button></div></div></div><div class="daterangepicker dropdown-menu opensright"><div class="calendar right" style="display: none;"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">มิถุนา 2017</th><th class="next available"><i class="fa fa-arrow-right icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>อา.</th><th>จ.</th><th>อ.</th><th>พ.</th><th>พฤ.</th><th>ศ.</th><th>ส.</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">28</td><td class="off disabled" data-title="r0c1">29</td><td class="off disabled" data-title="r0c2">30</td><td class="off disabled" data-title="r0c3">31</td><td class="off disabled" data-title="r0c4">1</td><td class="available active start-date end-date" data-title="r0c5">2</td><td class="available" data-title="r0c6">3</td></tr><tr><td class="available" data-title="r1c0">4</td><td class="available" data-title="r1c1">5</td><td class="available" data-title="r1c2">6</td><td class="available" data-title="r1c3">7</td><td class="available" data-title="r1c4">8</td><td class="available" data-title="r1c5">9</td><td class="available" data-title="r1c6">10</td></tr><tr><td class="available" data-title="r2c0">11</td><td class="available" data-title="r2c1">12</td><td class="available" data-title="r2c2">13</td><td class="available" data-title="r2c3">14</td><td class="available" data-title="r2c4">15</td><td class="available" data-title="r2c5">16</td><td class="available" data-title="r2c6">17</td></tr><tr><td class="available" data-title="r3c0">18</td><td class="available" data-title="r3c1">19</td><td class="available" data-title="r3c2">20</td><td class="available" data-title="r3c3">21</td><td class="available" data-title="r3c4">22</td><td class="available" data-title="r3c5">23</td><td class="available" data-title="r3c6">24</td></tr><tr><td class="available" data-title="r4c0">25</td><td class="available" data-title="r4c1">26</td><td class="available" data-title="r4c2">27</td><td class="available" data-title="r4c3">28</td><td class="available" data-title="r4c4">29</td><td class="available" data-title="r4c5">30</td><td class="available off" data-title="r4c6">1</td></tr><tr><td class="available off" data-title="r5c0">2</td><td class="available off" data-title="r5c1">3</td><td class="available off" data-title="r5c2">4</td><td class="available off" data-title="r5c3">5</td><td class="available off" data-title="r5c4">6</td><td class="available off" data-title="r5c5">7</td><td class="available off" data-title="r5c6">8</td></tr></tbody></table></div></div><div class="calendar single left" style="display: block;"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">มิถุนา 2017</th><th class="next available"><i class="fa fa-arrow-right icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>อา.</th><th>จ.</th><th>อ.</th><th>พ.</th><th>พฤ.</th><th>ศ.</th><th>ส.</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">28</td><td class="available off" data-title="r0c1">29</td><td class="available off" data-title="r0c2">30</td><td class="available off" data-title="r0c3">31</td><td class="available" data-title="r0c4">1</td><td class="available active start-date end-date" data-title="r0c5">2</td><td class="available" data-title="r0c6">3</td></tr><tr><td class="available" data-title="r1c0">4</td><td class="available" data-title="r1c1">5</td><td class="available" data-title="r1c2">6</td><td class="available" data-title="r1c3">7</td><td class="available" data-title="r1c4">8</td><td class="available" data-title="r1c5">9</td><td class="available" data-title="r1c6">10</td></tr><tr><td class="available" data-title="r2c0">11</td><td class="available" data-title="r2c1">12</td><td class="available" data-title="r2c2">13</td><td class="available" data-title="r2c3">14</td><td class="available" data-title="r2c4">15</td><td class="available" data-title="r2c5">16</td><td class="available" data-title="r2c6">17</td></tr><tr><td class="available" data-title="r3c0">18</td><td class="available" data-title="r3c1">19</td><td class="available" data-title="r3c2">20</td><td class="available" data-title="r3c3">21</td><td class="available" data-title="r3c4">22</td><td class="available" data-title="r3c5">23</td><td class="available" data-title="r3c6">24</td></tr><tr><td class="available" data-title="r4c0">25</td><td class="available" data-title="r4c1">26</td><td class="available" data-title="r4c2">27</td><td class="available" data-title="r4c3">28</td><td class="available" data-title="r4c4">29</td><td class="available" data-title="r4c5">30</td><td class="available off" data-title="r4c6">1</td></tr><tr><td class="available off" data-title="r5c0">2</td><td class="available off" data-title="r5c1">3</td><td class="available off" data-title="r5c2">4</td><td class="available off" data-title="r5c3">5</td><td class="available off" data-title="r5c4">6</td><td class="available off" data-title="r5c5">7</td><td class="available off" data-title="r5c6">8</td></tr></tbody></table></div></div><div class="ranges" style="display: none;"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="2017-06-02" disabled="disabled" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="2017-06-02" disabled="disabled" type="text"></div><button class="applyBtn btn btn-small btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-default">Cancel</button></div></div></div><div class="colpick colpick_hex colpick_hex_ns colpick_dark" id="collorpicker_252" style="position: absolute;"><div class="colpick_color" style="background-color: rgb(255, 0, 255);"><div class="colpick_color_overlay1"><div class="colpick_color_overlay2"><div class="colpick_selector_outer" style="left: 0px; top: 156px;"><div class="colpick_selector_inner"></div></div></div></div></div><div class="colpick_hue" style="background:-webkit-linear-gradient(top,#ff0000,#ff0080,#ff00ff,#8000ff,#0000ff,#0080ff,#00ffff,#00ff80,#00ff00,#80ff00,#ffff00,#ff8000,#ff0000); background: -o-linear-gradient(top,#ff0000,#ff0080,#ff00ff,#8000ff,#0000ff,#0080ff,#00ffff,#00ff80,#00ff00,#80ff00,#ffff00,#ff8000,#ff0000); background: -ms-linear-gradient(top,#ff0000,#ff0080,#ff00ff,#8000ff,#0000ff,#0080ff,#00ffff,#00ff80,#00ff00,#80ff00,#ffff00,#ff8000,#ff0000); background:-moz-linear-gradient(top,#ff0000,#ff0080,#ff00ff,#8000ff,#0000ff,#0080ff,#00ffff,#00ff80,#00ff00,#80ff00,#ffff00,#ff8000,#ff0000); -webkit-linear-gradient(top,#ff0000,#ff0080,#ff00ff,#8000ff,#0000ff,#0080ff,#00ffff,#00ff80,#00ff00,#80ff00,#ffff00,#ff8000,#ff0000); background:linear-gradient(to bottom,#ff0000,#ff0080,#ff00ff,#8000ff,#0000ff,#0080ff,#00ffff,#00ff80,#00ff00,#80ff00,#ffff00,#ff8000,#ff0000); "><div class="colpick_hue_arrs" style="top: 26px;"><div class="colpick_hue_larr"></div><div class="colpick_hue_rarr"></div></div></div><div class="colpick_new_color" style="background-color: rgb(0, 0, 0);"></div><div class="colpick_current_color" style="background-color: rgb(0, 0, 0);"></div><div class="colpick_hex_field"><div class="colpick_field_letter">#</div><input maxlength="6" size="6" value="000000" type="text"></div><div class="colpick_rgb_r colpick_field"><div class="colpick_field_letter">R</div><input maxlength="3" size="3" value="0" type="text"><div class="colpick_field_arrs"><div class="colpick_field_uarr"></div><div class="colpick_field_darr"></div></div></div><div class="colpick_rgb_g colpick_field"><div class="colpick_field_letter">G</div><input maxlength="3" size="3" value="0" type="text"><div class="colpick_field_arrs"><div class="colpick_field_uarr"></div><div class="colpick_field_darr"></div></div></div><div class="colpick_rgb_b colpick_field"><div class="colpick_field_letter">B</div><input maxlength="3" size="3" value="0" type="text"><div class="colpick_field_arrs"><div class="colpick_field_uarr"></div><div class="colpick_field_darr"></div></div></div><div class="colpick_hsb_h colpick_field"><div class="colpick_field_letter">H</div><input maxlength="3" size="3" value="300" type="text"><div class="colpick_field_arrs"><div class="colpick_field_uarr"></div><div class="colpick_field_darr"></div></div></div><div class="colpick_hsb_s colpick_field"><div class="colpick_field_letter">S</div><input maxlength="3" size="3" value="0" type="text"><div class="colpick_field_arrs"><div class="colpick_field_uarr"></div><div class="colpick_field_darr"></div></div></div><div class="colpick_hsb_b colpick_field"><div class="colpick_field_letter">B</div><input maxlength="3" size="3" value="0" type="text"><div class="colpick_field_arrs"><div class="colpick_field_uarr"></div><div class="colpick_field_darr"></div></div></div><div class="colpick_submit">OK</div></div>

</body></html>
