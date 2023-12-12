<?php
include 'env_variables.php';

if($_SERVER['REQUEST_METHOD'] != 'GET'){
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(['status' => -1, 'message' => "Bad request"]);
}
else{
    header("HTTP/1.1 200 OK");
    $contact = $_GET['contact'];
    $location = $_GET['location'];
    if($contact)
        snmp2_set(ip,community,'.1.3.6.1.2.1.1.4.0','s',$contact); // System Contact
    if($location)
        snmp2_set(ip,community,'.1.3.6.1.2.1.1.6.0','s',$location); // System Location
}

?>