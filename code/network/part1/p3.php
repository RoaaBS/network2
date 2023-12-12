<!DOCTYPE html>
<html xml: lang>
<head>
    <title>TCP Tables</title>
    <style>
        * {
            box-sizing: border-box;
        }
        li a:hover {
            background-color: #111111;
        }

        li a.active {
            background-color:  #ff8533;
            color: white;
        }

        li a:hover:not(.active) {
            background-color: #555;
            color: white;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(odd) {background-color: #f2f2f2;}
    </style>
</head>
<body style = "margin: 0;">
<ul style="list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #333333; float: left;">
    <li style="float: left;"><a href="page1.php" class="active" style="display: block; color: white; text-align: center; padding: 16px; text-decoration: none;">System Group</a></li>
    <li style="float: left;"><a href="pag2.php" style="display: block; color: white; text-align: center; padding: 16px; text-decoration: none;">TCP Table</a></li>
    <li style="float: left;"><a href="p4.php" style="display: block; color: white; text-align: center; padding: 16px; text-decoration: none;">UDP Table</a></li>
    <li style="float: left;"><a href="p3.php" style="display: block; color: white; text-align: center; padding: 16px; text-decoration: none;">ARP Table</a></li>
</ul>
<div style="margin-left:100; padding:1px 16px; height:1000px;">
    <div>
        <?php
        #define NO_ZEROLENGTH_COMMUNITY 1
        function ssnmpWALK($ip, $cm, $rt, $n){
            echo "<table border = '1'  style='width: 100%;border-color: #4997d0;background-color: #ff6600;'>";
            echo "<tr style = 'text-align: center;'>";
            for($j = 0; $j <= $n; $j++){
                if($j == 0){
                    echo "<td style = 'text-align: center;' > Number </td>";
                }else if($j == 1){
                    echo "<td style = 'text-align: center;'> ipNetToMediaIfIndex </td>";
                }else if($j == 2){
                    echo "<td style = 'text-align: center;'> ipNetToMediaPhysAddress </td>";
                }else if($j == 3){
                    echo "<td style = 'text-align: center;'> ipNetToMediaNetAddress </td>";
                }else if($j == 4){
                    echo "<td style = 'text-align: center;'> ipNetToMediaType </td>";
                }
            }
            echo "</tr>";
            $m = array();
            for($j = 1; $j <= $n; $j++){
                $m[$j-1] = snmp2_walk($ip, $cm, $rt."."."$j");
            }
            for($i = 0; $i < count($m[0]); $i++){
                echo "<tr style = 'text-align: center;'>";
                echo "<td style = 'text-align: center;'> $i </td>";
                for($j = 0; $j < $n; $j++){
                    $v = $m[$j][$i];
                    echo "<td style = 'text-align: center;'> $v </td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        $ip = "127.0.0.1";
        ssnmpWALK($ip, "public", ".1.3.6.1.2.1.4.22.1", 4);
        print("<br>------------------------------<br>");
        ?>
    </div>
</div>
</body>
</html>
