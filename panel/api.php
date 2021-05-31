<?php
header('Content-Type: text/html; charset=UTF-8');
error_reporting(0);

if($_GET['mode'] == 'login')
{
	if(file_exists('Data/' . $_GET['id']))
	{
		$fp = fopen('Data/' . $_GET['id'], 'r');
		$fileread = fgets($fp);
		$filesp = explode("|", $fileread);
		if($filesp[1] == '1')
		{//사용된 코드
			if($filesp[2] == $_GET['COM'])
			{//하드번호 확인
				$datelimit = intval((strtotime($filesp[0]) - strtotime(date("Y-m-d H:m:s"))));
			    if($datelimit >= '0')
				{
			    	die(base64_encode($filesp[0] . '/SC/'));
			    }else
				{
		    		die('Expired Code');
		    	}
			}else{
				die('Please Unlock your HDD');
			}
		}else if($filesp[1] == 0)
		{//사용안된 코드
			$timeadded = date("Y-m-d H:m:s", strtotime($filesp[0]));
			$fmp = fopen('Data/' . $_GET['id'] , 'w');
			fwrite($fmp, $timeadded . "|1|" . $_GET['COM'] . "|4|" . $filesp[5] . "|");
			fclose($fmp);
			die(base64_encode($timeadded . '/SC/'));
		}else{
			die('Unknown Error');
		}
	}else{
		die('Unknown Serial');
	}
}else if($_GET['mode'] == 'CCM'){//하드락해제
	if(file_exists('Data/' . $_GET['id'])){
		$fp = fopen('Data/' . $_GET['id'], 'r');
		$fread = explode("|", fgets($fp));
		$intda = intval($fread[3]);
		if($intda > 0){
			$fopd = fopen('Data/' . $_GET['id'], 'w');
			fwrite($fopd, $fread[0] . '|' . $fread[1] . '|' . $_GET['COM'] . '|' . strval($intda - 1) . '|' . $fread[4] . '|');
			die('하드번호를 ' . $_GET['COM'] . '으로 변경하셨습니다. 남은 횟수 : ' . strval($intda - 1));
		}else{
			die('하드락해제 가능횟수가 남아있지 않습니다.');
		}
	}else{
		die('존재하지 않는 코드입니다.');
	}
}
?>