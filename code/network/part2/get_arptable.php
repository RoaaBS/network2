<?php
include 'env_variables.php';

$c1 = snmp2_walk(ip,community,'.1.3.6.1.2.1.4.22.1.1');
$c2 = snmp2_walk(ip,community,'.1.3.6.1.2.1.4.22.1.2');
$c3 = snmp2_walk(ip,community,'.1.3.6.1.2.1.4.22.1.3');
$c4 = snmp2_walk(ip,community,'.1.3.6.1.2.1.4.22.1.4');

$c6 = [];
for($i=0;$i<count($c1);$i++){

    array_push($c6,"$i,".$c1[$i].",".$c2[$i].",".$c3[$i].",".$c4[$i]);
}

header("HTTP/1.1 200 OK");
echo json_encode($c6);

?>
