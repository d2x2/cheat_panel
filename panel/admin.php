<?php
header('Content-Type: text/html; charset=UTF-8');
include 'encrypt.php';

if($_COOKIE['adminid'] == AesEncrypt($adminID))
{
	if($_COOKIE['adminpw'] == AesEncrypt($adminPW))
	{
		if($_GET['mode'] == "deletecode")
		{
			unlink('Data/' . $_GET['name']);
			echo "<script>alert(\"" . AesDecrypt($_GET['name']) . " Key deletion complete.\"); window.location.replace('index.php');</script>";
		}
		if($_GET['mode'] == "createcode")
		{			
	        $trueDate = "+12 hours";
			if($_GET['date'] == "1")
				$trueDate = "+1 days";
			else if($_GET['date'] == "7")
				$trueDate = "+7 days";
			else if($_GET['date'] == "14")
				$trueDate = "+14 days";
			else if($_GET['date'] == "30")
				$trueDate = "+30 days";
			
		    for($i = 0; $i < intval($_GET['count']); $i++)	
			{
				$codeStr = generateRandomString(40);
				$fop = fopen('Data/' . $codeStr, 'w');
				fwrite($fop, $trueDate . '|0|HDNUM|4|MEMO|');
				fclose($fop);
				echo $codeStr . "<br>";
			}
		}
		
		if($_GET['mode'] == "alluseradddate")
		{
			$addTime = " +12 hours";
			if($_GET['date'] != "12")
				$addTime = " +" . $_GET['date'] . " days";
			if($dh = opendir('UserList/'))
			{
				while(($file = readdir($dh)) !== false)
				{
					if($file == '.' || $file == '..')
						continue;
					$readUser = fopen('UserList/' . $file, 'r');
					$getInfo = explode('|', AesDecrypt(fgets($readUser)));
					fclose($readUser);
					if($getInfo[3] == 'not charged')
						continue;
					$timeStamp = date("Y-m-d H:m:s", strtotime($getInfo[3] . $addTime));
					$thisStr = $getInfo[0] . "|" . $getInfo[1] . "|" . $getInfo[2] . "|" . $timeStamp . "|";
					$writeUser = fopen('UserList/' . $file, 'w');
					fwrite($writeUser, AesEncrypt($thisStr));
					fclose($writeUser);
				}
				echo "<script>alert(\"모든 유저에게 " . $_GET['date'] . "일을 추가하셨습니다.\");history.back();</script>";
			}
		}
		if($_GET['mode'] == "unlockhd")
		{
			$encryptedID = base64_encode(AesEncrypt($_GET['username']));
			if(file_exists('UserList/' . $encryptedID))
			{
				$fop = fopen('UserList/' . $encryptedID, 'r');
				$getStr = explode('|', AesDecrypt(fgets($fop)));
				fclose($fop);
				$ReStr = $getStr[0] . "|3|" . $getStr[2] . "|" . $getStr[3] . "|";
				
				$fwisno = fopen('UserList/' . $encryptedID, 'w');
				fwrite($fwisno, AesEncrypt($ReStr));
				fclose($fwisno);
				echo "<script>alert(\"아이피락 해제횟수 초기화 완료.\");history.back();</script>";
			}
			else
				echo "<script>alert(\"존재하지 않는 아이디입니다.\");history.back();</script>";
		}
	}
	else
		echo "<script>alert(\"비밀번호가 일치하지 않습니다.\");history.back();</script>";
}
else
		echo "<script>alert(\"아이디가 일치하지 않습니다.\");history.back();</script>";
	
function generateRandomString($length = 10) 
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>