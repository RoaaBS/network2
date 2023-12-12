<?php
echo("****Testing started *** <br>");
#define NO_ZEROLENGTH_COMMUNITY 1


//$ip = "192.168.1.112";
$ip = "127.0.0.1:161";
print("<br>-------(ARP)IPNetToMedia table-----------<br>");
//////added in lect 15

$a = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.2");
echo("<br>");
$b = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.3");
$c = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.4");
$aa = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4");
echo("=== here ======><br>");
print_r($aa);
echo("<br><br>=== =ARP TABLE ======><br>");
$i =0;
echo"<table>";
echo "<tr> <td > Index </td><td> Mac </td> <td > IP </td><td> type </td>  </tr>";
foreach ($a as $k=>$val) {
echo "<tr> <td> $i </td><td> $a[$i] </td> <td> $b[$i] </td><td> $c[$i] </td>  </tr>";
 //  echo "($i) $val  $b[$i] ------ $c[$i] <br>\n";
	$i++;
}
echo"</table>";
print("<br>----------2--------<br>");
//print "Uptime: ".snmp2_get($ip, "public", "system.sysUpTime.0" ) ."<br>";
//print "Name: ".snmp2_get($ip, "public", "system.SysName" )."<br>";
print("<br>----------3--------<br>");
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.1.0"). "<br>";
print snmp2_get($ip,"fff",".1.3.6.1.2.1.1.2.0"). "<br>";
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.3.0"). "<br>";
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.4.0"). "<br>";
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.5.0"). "<br>";
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.6.0"). "<br>";
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.7.0"). "<br>";
//print("<br>--------end -----<br>");
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.1.0"). "<br>";
//print snmp2_walk($ip,"public",".1.3.6.1.2.1.4.22"). "<br>";
print("<br>-------- 888888 -----<br>");
$obj = (snmp2_walk($ip,"public",".1.3.6.1.2.1.1"));//. "<br>";
print("<br>--------obj -----<br>");
//print_r($obj);
echo"<table>";
echo "<tr> <td > key </td><td> val </td>   </tr>";
foreach ($obj as $k=>$val) {
 echo "<tr> <td> $k </td><td> $val </td </tr>";
	$i++;
}
echo"</table>";
print("<br>--------end -----<br>");
//////added in lect 15
$syscontact = snmp2_get("127.0.0.1", "public", "system.SysName.0");
print ("<br> System Contact: $syscontact <br>");

?>




