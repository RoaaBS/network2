<?php

include 'env_variables.php';

header('Content-Type: application/json; charset=utf-8');

$sys = snmp2_walk(ip,community,".1.3.6.1.2.1.1"); // Getting all of system group as array.
$array = [
    "sysDescr" => explode(":",$sys[0],2)[1],
    "sysObjectId" => explode(":",$sys[1],2)[1],
    "sysUpTime" => explode(":",$sys[2],2)[1],
    "sysContact" => $sys[3] != "\"\"" ? explode(":",$sys[3],2)[1]:"" ,
    "sysName" => $sys[4] != "\"\"" ? explode(":",$sys[4],2)[1]:"",
    "sysLocation" => $sys[5] != "\"\"" ? explode(":",$sys[5],2)[1]:"",
    "sysServices" => explode(":",$sys[6],2)[1],
];
if($sys == null){
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(['status' => -1, 'message' => "Bad request"]);
}else{
    header("HTTP/1.1 200 OK");
    echo json_encode($array);
}

?>