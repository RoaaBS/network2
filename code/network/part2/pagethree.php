<?php
echo " Network2 \n";
echo " ARP Table \n \n".
       
        

        

$ip="127.0.0.1:161";

$B=snmp2_walk($ip,"public",".1.3.6.1.2.1.6.13.1.1");
$C=snmp2_walk($ip,"public",".1.3.6.1.2.1.6.13.1.2");
$D=snmp2_walk($ip,"public",".1.3.6.1.2.1.6.13.1.3");
$E=snmp2_walk($ip,"public",".1.3.6.1.2.1.6.13.1.4");
$F=snmp2_walk($ip,"public",".1.3.6.1.2.1.6.13.1.5");
$j=0;
$i =0;
$A = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.2");
$B = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.3");
$C = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.4");
$AA = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4");

foreach ($A as $k=>$val) {
	echo"IP address :" . $A[$i] ."\n" ;
	echo" MAC address :" . $B[$i] ."\n" ;
    echo" Type :" . $A[$i]."\n" ;
    echo " \n ";
    

	$i++;
}

    $j++;
            

         ?>