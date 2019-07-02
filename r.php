<?php
function fetch_value($str,$find_start,$find_end) {
	$start = @strpos($str,$find_start);
	if ($start === false) {
		return "";
	}
	$length = strlen($find_start);
	$end    = strpos(substr($str,$start +$length),$find_end);
	return trim(substr($str,$start +$length,$end));
}
function asw($user) {
                $get = file_get_contents("https://api.randomuser.me");
	        $j = json_decode($get, true);
	        $getName = $j['results'][0]['name']['first'];
	        $getName2 = $j['results'][0]['name']['last'];
	        $rand = rand(0000,9999);
                $deviceid = "dc4e099a-3d00-42a5-97c7-840565d0".$rand;
                $rand2 = $getName." ".$getName2;
                $pass = $getName.$rand;
	        $email = $getName.$rand."@gmail.com";
                $phone = '08157345'.rand(0000,9999);

		$body = 'username='.$user.'@gmail.com&password=f7bf9bba06d80a89e533b185a6284d00060d5899db63573341cf90489651ae67&grant_type=password&';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://auth-api.mycreditchain.io/proc/oauth/login");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		$headers = array ();
			$headers[] = "Device-Id: ".$deviceid;
                        $headers[] = "Authorization: Basic bWNjLWFkbWluOjQzMjE=";
			$headers[] = "User-Agent: GoodMorn/1.2.6 (vivo 1610; Android 23;)";
                        $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);
                $token = fetch_value($result,'"access_token":"','"');
                $chat[0] = 'Gift back ya';
                $chat[1] = 'Gift me';
                $chat[2] = 'Gift lgi dong';
                $chat[3] = 'Gift Back kak';
                $chat[4] = 'Gift back donk';
                $chat[5] = 'Gift back';
                $chat1 = $chat[rand(0,5)];
                $body4 = '{
	"comment":"'.$chat1.'",
	"trnsmis_div_cd":"A",
	"trnsmis_seed_qty":"100"
}';
		curl_setopt($ch, CURLOPT_URL, "https://mobile-api.mycreditchain.io/api/v1/seed-comment/144904");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body4);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		$headers = array ();
			$headers[] = "Host: mobile-api.mycreditchain.io";
			$headers[] = "Content-Type: application/json; charset=UTF-8";
                        $headers[] = "User-Agent: GoodMorn/1.2.6 (vivo 1610; Android 23;)";
                        $headers[] = "Device-Id: ".$deviceid;
                        $headers[] = "Authorization: Bearer ".$token;
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result4 = curl_exec($ch);
        return $result4." [".$chat1."]";
	/*return $result4." [".$user."]";*/

}
/*$user = explode("\n",str_replace("\r","",file_get_contents("id3.txt"))); $a=1;
        while($a<=count($user)){
        $jnck = $user[$a];
        $asw = asw($jnck);
        echo "[$a] $asw\n";
        $a++;
}*/
echo "User : ";
$user = trim(fgets(STDIN));
echo asw($user);
?>





