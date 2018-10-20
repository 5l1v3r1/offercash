<?php
function email($l){
	$data = "abcdefghijklmnopqrstuvexyz1234567890";
	$word = "";
	for($a=0;$a<$l;$a++){
		$word .= $data{rand(0,strlen($data))};
	}
	return $word;
}
function reg($reff){
	$email = email(10)."@grr.la";
	$pass = md5("123anjay");
	$did = "3".email(15);
	$data = "name=Putra&password=$pass&email=$email&hash=ZvOhowBCLCOdGW6BMZSP&reff=$reff&did=$did";
	$curl = curl("http://offercashapp.com/TNF6H9LcrLM7OloBKP76/register.php",$data);
	$data2 = "&password=$pass&email=$email&hash=ZvOhowBCLCOdGW6BMZSP&did=$did";
	$curl2 = curl("http://offercashapp.com/TNF6H9LcrLM7OloBKP76/getPoints.php",$data2)['user_data'];
	if($curl2['status']==2 && $curl2['p']==100){
		$re = "y";
	}else{
		$re = "n";
	}
	return $re;
}
function curl($url,$data){
	$h = array();
	$h[] = "Content-Type: application/x-www-form-urlencoded";
	$h[] = "User-Agent: Dalvik/2.1.0 (Linux; U; Android 7.1.2; Redmi 4X MIUI/V9.6.5.0.NAMMIFD)";
	$h[] = "Host: offercashapp.com";
	$h[] = "Connection: Keep-Alive";
	$h[] = "Content-Length: ".strlen($data);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$x = curl_exec($ch);
	curl_close($ch);
	return json_decode($x,true);
}
echo "[Copyright: @xptra x SGB Team\n]";
echo "?Reff		";
$reff = trim(fgets(STDIN));
echo "?Jumlah		";
$jum = trim(fgets(STDIN));
sleep(2);
$a = 0;
echo "[Your Code : $reff]\n";
while(true){
	$reg = reg("OC7BDB7X");
	if($reg=="y"){
		$a += 1;
		$percent = ceil(($a*100)/$jum);
		echo "Processing...";
		echo " $percent% Completed\r";
		if($a>=$jum){
			echo "\nDone..\n";
			break;
		}
	}
}
