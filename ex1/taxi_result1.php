<?php

    function compute_price(int $depart, int $arrival){
        if($depart>=1 && $depart<=4){
            switch ($arrival){
                case 5:
                    return 5500;
                case 6:
                    return 4000;
                case 7:
                    return 5000;
                default:
                    return 10000;
            }
        }
        switch($depart){
            case 5:
                return 5500;
            case 6:
                return 4000;
            case 7:
                return 5000;
            default:
                return 10000;
        }
    }
    function loc_to_str(int $a) {
        switch ($a) {
            case 1:
                return "기계동";
            case 2:
                return "희망관";
            case 3:
                return "오리연못";
            case 4:
                return "N1";
            case 5:
                return "둔산 갤러리아";
            case 6:
                return "궁동 로데오거리";
            case 7:
                return "유성버스터미널";
            case 8:
                return "대전복합터미널";
            case 9:
                return "대전역";
            case 10:
                return "서대전역";
        }
    }
    function bool_to_str(int $a){
        if($a==0)
            return "NOT COMPLETED";
        else   
            return "COMPLETED";
    }


    echo "<HEAD>
            <style>
            table {
                border-top: 1px solid #ccc;
                border-left: 3px solid #369;
                border-right: 3px solid #369;
            }
            th, td {
                border-bottom: 1px solid #444444;
                border-right: 1px solid;
                padding: 5px;
            }
            button {
            width:80px;
            background-color: #E6E6E6;
            border: none;
            border-radius:8px;
            color: black;
            padding: 12px 0;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 3.5px;
            cursor: pointer;
            }
            </style>
            <TITLE>
                result
            </TITLE>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
            <TITLE> Taxi Search Result </TITLE>
            </HEAD>
            <H3> &nbsp; Pending Requests </H3>
            <TABLE align = 'center'>
                <TR height='20'>
                    <TH>#</TH><TH>Date</TH><TH> Time </TH>
                    <TH> Departure</TH><TH>Arrival</TH><TH>Current Count </TH><th>Expected Price</th>";   
    echo "</TR>";



	$servername = 'localhost';
	$username = 'root';
	$pw = '1234';
    $db = 'kaxi';
    $id = $_POST['ID'];
    $conn = mysqli_connect($servername, $username, $pw, $db);
    $sql = "select matchNum, requestTBL.year, requestTBL.month, requestTBL.day, requestTBL.hour, requestTBL.minute, deptNum, arvNum, count, price
    from requesttbl, matchcandtbl, matchTBL, driverTBL
    where (matchTBL.matchCandNum = matchCandTBL.matchCandNum and matchCandTBL.reqNum = requestTBL.reqNum and driverTBL.userid = matchTBL.taxiID   and matchTBL.taxiID = '".$id."');";

    
    
    $ret = mysqli_query($conn,$sql) or die("sql: ".$sql."<br><br>".$conn->error);
    $count = mysqli_num_rows($ret);
    if($count!=0){
        echo '<script type="text/javascript">alert("'.$count.' records are searched..."); </script>';
    }
    else {
        #echo " sql: ".$sql."<br><br>";
        echo '<script type="text/javascript">alert("no data!!"); location.replace("taxi_search.php"); </script>';
             
    }
    while($row = mysqli_fetch_array($ret)) {
        echo "<TR align='center'>";
        echo "<TD>", $row['matchNum'], "</TD>";
        echo "<TD>", $row['year'].'-'.$row['month'].'-'.$row['day'], "</TD>";
        echo "<TD>", $row['hour'].'시 '.$row['minute'].'분', "</TD>";
        echo "<TD>", loc_to_str($row['deptNum']), "</TD>";
        echo "<TD>", loc_to_str($row['arvNum']), "</TD>";
        echo "<TD>", $row['count'], "</TD>";
        echo "<TD>", $row['price'], "</TD>";
        echo "</TR>";	  
    }
    echo"</table>";



   
	
	echo "<br>&nbsp;<button type=".'"button" onclick='.'"location.href='."'taxi_result.php'".' "'.">back</button></br>";
	echo "</html>";


?>

