
<!DOCTYPE html>
<html xml: lang>
<head>
    <title>System Group</title>
    <style>
        .img{
            width: 100%;
            height: 100%;
        }
        * {
            box-sizing: border-box;
        }

        li a:hover {
            background-color:#ffb380;
        }
        li a.active {
            background-color: #ff8533;
            color: white;
        }

        li a:hover:not(.active) {
            background-color: #111111;
            color: white;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;

        }
        @media screen and (max-width: 2000px) {
            .input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>
<!-- <body style = "margin: 0; background-image: url(66.jfif);background-repeat: no-repeat;background-size: 100%;"> -->

<body style = "margin: 0; ">

<ul style="list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #333333; float: left;">
    <li style="float: left;"><a href="page1.php" class="active" style="display: block; color: white; text-align: center; padding: 16px; text-decoration: none;">System Group</a></li>
    <li style="float: left;"><a href="pag2.php" style="display: block; color: white; text-align: center; padding: 16px; text-decoration: none;">TCP Table</a></li>
    <li style="float: left;"><a href="p4.php" style="display: block; color: white; text-align: center; padding: 16px; text-decoration: none;">UDP Table</a></li>
    <li style="float: left;"><a href="p3.php" style="display: block; color: white; text-align: center; padding: 16px; text-decoration: none;">ARP Table</a></li>
</ul>

<div style="margin-left:50;padding:0px;height:1000px;">
    <div class="container" style = "border-radius: 5px;  padding: 20px;">
        <form action="page1.php" method="post">
            <div class="row" style = "margin-left: 584px;">
                <div class="col-25" style = "float: left; width: 10%; margin-top: 6px;">
                    <label for="contact" style = "padding: 12px 12px 12px 0; display: inline-block;color: white;">Contact</label>
                </div>
                <div class="col-75" style = "float: left; width: 75%; margin-top: 6px;">
                    <input type="text" id="contact" name="contact" style = "width: 32%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; resize: vertical;" placeholder="Contact" required>
                </div>
            </div>
            <div class="row" style = "margin-left: 584px;">
                <div class="col-25" style = "float: left; width: 10%; margin-top: 6px;">
                    <label for="location" style = "padding: 12px 12px 12px 0; display: inline-block; color: white;">Location</label>
                </div>
                <div class="col-75" style = "float: left; width: 75%; margin-top: 6px;">
                    <input type="text" id="location" name="location" style = "width: 32%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; resize: vertical;" placeholder="Location" required>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Edit" style="margin-right: 674px; margin-top: 10px; background-color: #4997d0; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; float: right; width: 7%;">
            </div>
        </form>
    </div>
    <?php
    #define NO_ZEROLENGTH_COMMUNITY 1
    $ip = "127.0.0.1";
    if (isset($_POST['contact'])){
        snmp2_set("localhost","public",".1.3.6.1.2.1.1.4.0","s",$_POST['contact']); // set the value of an SNMP object specified by the object_id.
    }

    if (isset($_POST['location'])){
        snmp2_set("localhost","public",".1.3.6.1.2.1.1.6.0","s",$_POST['location']); // set the value of an SNMP object specified by the object_id.
    }
    ?>
    <?php
    #define NO_ZEROLENGTH_COMMUNITY 1

    $ip = "127.0.0.1";
    $SysDesc        = snmp2_get($ip, "public", ".1.3.6.1.2.1.1.1.0");
    $SysObjectID    = snmp2_get($ip, "public", ".1.3.6.1.2.1.1.2.0");
    $SysUpTime      = snmp2_get($ip, "public", ".1.3.6.1.2.1.1.3.0");
    $SysContact     = snmp2_get($ip, "public", ".1.3.6.1.2.1.1.4.0");
    $SysName        = snmp2_get($ip, "public", ".1.3.6.1.2.1.1.5.0");
    $SysLocation    = snmp2_get($ip, "public", ".1.3.6.1.2.1.1.6.0");
    $SysServices    = snmp2_get($ip, "public", ".1.3.6.1.2.1.1.7.0");
    ?>

    <div>
        <div style="overflow-x:auto;">
            <?php
            echo "<table border = '1' bgcolor = '#FFFFE9' style = 'width: 100%' >";
            ?>
            <tr>
                <td style="width: 25%; text-align: center; padding: 8px; background-color:  #ff6600;">SysDesc</td>
                <td style="width: 15%; text-align: center; padding: 8px; background-color:  #ff6600;">SysObjectID</td>
                <td style="width: 10%; text-align: center; padding: 8px; background-color:  #ff6600;">SysUpTime</td>
                <td style="width: 10%; text-align: center; padding: 8px; background-color:  #ff6600;">SysContact</td>
                <td style="width: 10%; text-align: center; padding: 8px; background-color:  #ff6600;">SysName</td>
                <td style="width: 10%; text-align: center; padding: 8px; background-color:  #ff6600;">SysLocation</td>
                <td style="width: 10%; text-align: center; padding: 8px; background-color:  #ff6600;">SysServices</td>
            </tr>
            <tr>
                <td style="width: 25%; text-align: center; padding: 8px; background-color: #f2f2f2;"><?php echo $SysDesc?></td>
                <td style="width: 15%; text-align: center; padding: 8px; background-color: #f2f2f2;"><?php echo $SysObjectID?></td>
                <td style="width: 10%; text-align: center; padding: 8px; background-color: #f2f2f2;"><?php echo $SysUpTime?></td>
                <td style="width: 10%; text-align: center; padding: 8px; background-color: #f2f2f2;"><?php echo $SysContact?></td>
                <td style="width: 10%; text-align: center; padding: 8px; background-color: #f2f2f2;"><?php echo $SysName?></td>
                <td style="width: 10%; text-align: center; padding: 8px; background-color: #f2f2f2;"><?php echo $SysLocation?></td>
                <td style="width: 10%; text-align: center; padding: 8px; background-color: #f2f2f2;"><?php echo $SysServices?></td>
            </tr>
            </table>
        </div>
    </div>
</div>
</body>
</body>
</html>
