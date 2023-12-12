<!doctype html>
<html>
<head>
    <title>UDP Table</title>
    <style>
        
        body {
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }
    
        table {
            border-collapse: collapse;
            width: 60%;
            margin-top: 0; /* Remove top margin */
            padding-top: 0; /* Remove top padding */
        }

        th, td {
            text-align: left;
            font-size: 18px; 
            border: 2px solid #4997d0;
            padding-top: 0px; 
            padding-left: 8px;
        }
        * {
            box-sizing: border-box;
        }
        li a:hover {
            background-color: #111111;
        }

        li a.active {
            background-color:   #ff6600;
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

       

        tr:nth-child(odd) {background-color:  #ff6600;}
    </style>
</head>


<body>

<ul style="list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #333333; float: left;">
    <li style="float: left;"><a href="page1.php" class="active" style="display: block; color: white; text-align: center; padding: 16px; text-decoration: none;">System Group</a></li>
    <li style="float: left;"><a href="pag2.php" style="display: block; color: white; text-align: center; padding: 16px; text-decoration: none;">TCP Table</a></li>
    <li style="float: left;"><a href="p4.php" style="display: block; color: white; text-align: center; padding: 16px; text-decoration: none;">UDP Table</a></li>
    <li style="float: left;"><a href="p3.php" style="display: block; color: white; text-align: center; padding: 16px; text-decoration: none;">ARP Table</a></li>
</ul>
<div style="margin-left:100; padding:1px 16px; height:500px;">
<div >
    <table id="Table" style="border-collapse: collapse; width: 100%;" >
        <tr style="background-color:  #ff6600;">
            <th style="padding-left: 8px; padding-top: 8px; text-align: center;">index</th>
            <th style="padding-left: 8px; padding-top: 8px; text-align: center;">UDPConnLocalAddress</th>
            <th style="padding-left: 8px; padding-top: 8px; text-align: center;">UDPConnLocalPort</th>
        </tr>
        <?php
        $ip = "127.0.0.1:161";
        $UDPConnLocalAddress = snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.7.5.1.1");
        $UDPConnLocalPort = snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.7.5.1.2");
        for ($i = 0; $i < count($UDPConnLocalAddress); $i++) {
        ?>
            <tr>
                <th style="padding: 8px; text-align: center; "><?php echo $i ?></th>
                <th style="padding: 8px; text-align: center; "><?php echo $UDPConnLocalAddress[$i] ?></th>
                <th style="padding: 8px; text-align: center; "><?php echo $UDPConnLocalPort[$i] ?></th>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
</div>
</body>

</html>
