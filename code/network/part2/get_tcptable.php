<?php
include 'env_variables.php';

$c1 = snmp2_walk(ip,community,'.1.3.6.1.2.1.6.13.1.1');
$c2 = snmp2_walk(ip,community,'.1.3.6.1.2.1.6.13.1.2');
$c3 = snmp2_walk(ip,community,'.1.3.6.1.2.1.6.13.1.3');
$c4 = snmp2_walk(ip,community,'.1.3.6.1.2.1.6.13.1.4');
$c5 = snmp2_walk(ip,community,'.1.3.6.1.2.1.6.13.1.5');

$c6 = [];
for($i=0;$i<count($c1);$i++){

    array_push($c6,"$i,".$c1[$i].",".$c2[$i].",".$c3[$i].",".$c4[$i].",".$c5[$i]);
}

header("HTTP/1.1 200 OK");
echo json_encode($c6);

?>