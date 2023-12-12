<?php
include 'env_variables.php';

$UDPConnLocalAddress = snmp2_walk(ip, community, '.1.3.6.1.2.1.7.5.1.1');
$UDPConnLocalPort = snmp2_walk(ip, community, '.1.3.6.1.2.1.7.5.1.2');

$udpData = [];
for ($i = 0; $i < count($UDPConnLocalAddress); $i++) {
    array_push($udpData, "$i," . $UDPConnLocalAddress[$i] . "," . $UDPConnLocalPort[$i]);
}

header("HTTP/1.1 200 OK");
echo json_encode($udpData);
?>
