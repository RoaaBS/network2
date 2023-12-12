<?php
echo " Network2 \n";
echo " TCP Table \n \n".
       "index  "."   ".
       "tcpConnState "."   ".
       "tcpConnLocalAddress "."   ".
        "tcpConnLocalPort "."   ".
        "tcpConnRemAddress\n ";

    $ip = "127.0.0.1:161";
    $tcpConnState = snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.1");
    $tcpConnLocalAddress= snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.2");
    $tcpConnLocalPort = snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.3");
    $tcpConnRemAddress= snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.4");
    for($i = 0; $i < count($tcpConnState); $i++)
    {
     echo   "$i"."              ".
            "$tcpConnState[$i]"."         ".
           "$tcpConnLocalAddress[$i]"."          ".
           "$tcpConnLocalPort[$i] "."           ".
            " $tcpConnRemAddress[$i] "."   \n";

    }

         ?>