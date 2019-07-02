<?php
error_reporting(0);

function kntl($jumlah){
    $x = 0; 
    while($x < $jumlah) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://localhost:8080/fak.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        echo $server_output."\n";
        $x++;
        flush();
    }
}
echo 
"
Save

\n";
echo "Jumlah: ";
$jumlah = trim(fgets(STDIN));
$pukis = kntl($jumlah);
print $pukis;
print "DONE\n";
?>