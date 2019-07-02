<?php
error_reporting(0);



function saveFile($filename,$string)
{
	$handle = fopen($filename, 'a');
	fwrite($handle, $string);
	fclose($handle);
	return 1;
}

function ambil($str,$find_start,$find_end) {
	$start = @strpos($str,$find_start);
	if ($start === false) {
		return "";
	}
	$length = strlen($find_start);
	$end    = strpos(substr($str,$start +$length),$find_end);
	return trim(substr($str,$start +$length,$end));
}

$a = rand(5,300);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://mobile-api.mycreditchain.io:443/api/v1/friends/my?searchValue=&pageCount='.$a.'&order=L&userType=C&pageSize=50&');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	    $headers 	= array();
	    $headers[] = 'User-Agent: GoodMorn/1.2.6 (vivo 1610; Android 23;)';
	    $headers[] = 'Device-Id: 7d4d5e5f-6384-4575-820a-632649655a8a';
	    $headers[] = 'Accept-Language: en';
	    $headers[] = 'Authorization: Bearer 1078de29-8a58-4576-9785-bff9bc150559';
	    $headers[] = 'Host: mobile-api.mycreditchain.io';
	    $headers[] = 'Connection: Keep-Alive';
	
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$nick = ambil($result,'"nicknm":"','"');
if (!empty($nick)){
$simpan = "aw.txt";
saveFile($simpan, "$nick\n"); 
echo "Success -> $nick";
} else {
echo "Failed";
}