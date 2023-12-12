
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
                    echo "<table border = '1'  style='width: 100%; border-color: #4997d0;background-color: #ff6600;'>";
                ?>
                <tr>
                    <th style = "text-align: center; padding: 8px;">
                        tcpConnState
                    </th>
                    <th style = "text-align: center; padding: 8px;">
                        tcpConnLocalAddress
                    </th>
                    <th style = "text-align: center; padding: 8px;">
                        tcpConnLocalPort
                    </th>
                    <th style = "text-align: center; padding: 8px;">
                        tcpConnRemAddress
                    </th>
                    <th style = "text-align: center; padding: 8px;">
                        tcpConnRemPort
                    </th>
                </tr>
                <?php
                    #define NO_ZEROLENGTH_COMMUNITY 1
                    $tcpConnState = snmp2_walk("localhost", "public", "1.3.6.1.2.1.6.13.1.1");
                    $tcpConnLocalAddress = snmp2_walk("localhost", "public", "1.3.6.1.2.1.6.13.1.2");
                    $tcpConnLocalPort = snmp2_walk("localhost", "public", "1.3.6.1.2.1.6.13.1.3");
                    $tcpConnRemAddress = snmp2_walk("localhost", "public", "1.3.6.1.2.1.6.13.1.4");
                    $tcpConnRemPort = snmp2_walk("localhost", "public", "1.3.6.1.2.1.6.13.1.5");

                    for($i = 0; $i < count($tcpConnState); $i++)
                    {
                ?>
                    <tr>
                        <td style = "text-align: center; padding: 8px;">
                            <?php
                                echo $tcpConnState[$i]
                            ?>
                        </td>
                        <td style = "text-align: center; padding: 8px;">
                            <?php
                                echo $tcpConnLocalAddress[$i]
                            ?>
                        </td>
                        <td style = "text-align: center; padding: 8px;">
                            <?php
                                echo $tcpConnLocalPort[$i]
                            ?>
                        </td>
                        <td style = "text-align: center; padding: 8px;">
                            <?php
                                echo $tcpConnRemAddress[$i]
                            ?>
                        </td>
                        <td style = "text-align: center; padding: 8px;">
                            <?php
                                echo $tcpConnRemPort[$i]
                            ?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>

    </body>
</html>