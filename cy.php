<?php

function kntl($socks){

$asw=0;
$socks = explode("\n", file_get_contents($socks)); 
while($asw<count($socks)){
$proxy = $socks[$asw];
	
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://localhost:8080/r.php?user=$proxy");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        echo "[$asw] $proxy - $server_output\n\n";
        $asw++;
        flush();
    }
 }
echo 
"
wkwk

";
echo "List Socks ? : ";
$socks = trim(fgets(STDIN));
$pukis = kntl($socks);
print $pukis;
print "DONE\n";
?>