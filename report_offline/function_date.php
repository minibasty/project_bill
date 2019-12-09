<?php
date_default_timezone_set("Asia/Bangkok");
	
  function DateUTC($strDate)
	{
		
		$strYear = date("Y",strtotime($strDate));
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay/$strMonth/$strYear $strHour:$strMinute:$strSeconds";
	}

	// $strDate = date('"Y-m-d"', strtotime('+1 month'));

	// echo Nextmonth($strDate);

	// declare(strict_types=1);
?>
