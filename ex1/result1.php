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
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
            <TITLE> Taxi Search Result </TITLE>
            </HEAD>
            <H3> &nbsp; Pending Requests </H3>
            <TABLE border = '2' align = 'center'>
                <TR height='20'>
                    <TH> Request Number </TH><TH>Date</TH><TH> Time </TH>
                    <TH> Departure</TH><TH>Arrival</TH><TH>Current Count </TH><th>Expected Price</th><TH>Completed</TH>";   
    echo "</TR>";



	$servername = 'localhost';
	$username = 'root';
	$pw = '1234';
    $db = 'kaxi';
    $id = $_POST['ID'];
    $conn = mysqli_connect($servername, $username, $pw, $db);
    $sql = "select requestTBL.reqNum, year, month,day, hour, minute, deptNum, arvNum, count, requestTBL.completed from requestTBL,customerTBL
            where(requestTBL.completed =0 and requestTBL.reqNum = customerTBL.reqNum and userid='".$id."');";
    $sql2 = "select matchCandTBL.reqNum, requestTBL.year, requestTBL.month, requestTBL.day, requestTBL.hour, requestTBL.minute, deptNum, arvNum, count, matchCandTBL.completed 
             from requesttbl, matchcandtbl, customertbl 
             where (matchCandTBL.reqNum = requestTBL.reqNum and requestTBL.reqNum = customerTBL.reqNum 
             and requestTBL.completed = 1 and matchCandTBL.completed = 0 and userid = '".$id."');";
    
    $sql3 = "select matchCandTBL.reqNum, requestTBL.year, requestTBL.month, requestTBL.day, requestTBL.hour, requestTBL.minute, deptNum, arvNum, count, driverTBL.taxiNUM, price
    from requesttbl, matchcandtbl, customertbl, matchTBL, driverTBL
    where ( matchTBL.matchCandNum = matchCandTBL.matchCandNum and matchCandTBL.completed = 1 and matchCandTBL.reqNum = requestTBL.reqNum and requestTBL.reqNum = customerTBL.reqNum and driverTBL.userid=matchTBL.taxiID and 
             requestTBL.completed = 1 and customerTBL.userid = '".$id."');";

    
    
    $ret = mysqli_query($conn,$sql) or die("sql: ".$sql."<br><br>".$conn->error);
    $count = mysqli_num_rows($ret);
    if($count!=0){
        echo '<script type="text/javascript">alert("'.$count.' records are searched..."); </script>';
    }
    else {
        #echo " sql: ".$sql."<br><br>";
        echo '<script type="text/javascript">alert("no data!!"); location.replace("search.php"); </script>';
             
    }
    while($row = mysqli_fetch_array($ret)) {
        echo "<TR align='center'>";
        echo "<TD>", $row['reqNum'], "</TD>";
        echo "<TD>", $row['year'].'-'.$row['month'].'-'.$row['day'], "</TD>";
        echo "<TD>", $row['hour'].'시 '.$row['minute'].'분', "</TD>";
        echo "<TD>", loc_to_str($row['deptNum']), "</TD>";
        echo "<TD>", loc_to_str($row['arvNum']), "</TD>";
        echo "<TD>", $row['count'], "</TD>";
        echo "<TD>", (compute_price($row['deptNum'],$row['arvNum'])/$row['count'] +500), "</TD>";
        echo "<TD>", bool_to_str($row['completed']), "</TD>";
        echo "<TD> 
                    <form method = 'post' action = 'complete.php'>
                            <input type='hidden' name = 'id' value = '".$id."'>
                            <input type='hidden' name = 'reqNum' value = '".$row['reqNum']."'>
                            <input type='submit' value='Complete'>
                        </form>
            </TD>";
        echo "</TR>";	  
    }
    echo"</table>";


    
    $ret2 = mysqli_query($conn,$sql2) or die("sql: ".$sql2."<br><br>".$conn->error);
    $count2 = mysqli_num_rows($ret2);
    if($count2!=0){
        #echo '<script type="text/javascript">alert("'.$count2.' records are searched..."); </script>';

        echo"
            <H3> &nbsp; Matching Candidates </H3>
                    <TABLE border = '2' align = 'center'>
                        <TR height='20'>
                            <TH> Request Number </TH><TH>Date</TH><TH> Time </TH>
                            <TH> Departure</TH><TH>Arrival</TH><TH>Current Count</TH><th>Expected Price</th><TH>Match Completed</TH>";   
        echo "</TR>";
        while($row = mysqli_fetch_array($ret2)) {
            echo "<TR align='center'>";
            echo "<TD>", $row['reqNum'], "</TD>";
            echo "<TD>", $row['year'].'-'.$row['month'].'-'.$row['day'], "</TD>";
            echo "<TD>", $row['hour'].'시 '.$row['minute'].'분', "</TD>";
            echo "<TD>", loc_to_str($row['deptNum']), "</TD>";
            echo "<TD>", loc_to_str($row['arvNum']), "</TD>";
            echo "<TD>", $row['count'], "</TD>";
            echo "<TD>", (compute_price($row['deptNum'],$row['arvNum'])/$row['count'] +500), "</TD>";
            echo "<TD>", bool_to_str($row['completed']),"</TD>";
            echo "</TR>";	  
        }
        echo"</table>";
    }


    $ret3 = mysqli_query($conn,$sql3) or die("sql: ".$sql3."<br><br>".$conn->error);
    $count3 = mysqli_num_rows($ret3);
    if($count3!=0){
        #echo '<script type="text/javascript">alert("'.$count2.' records are searched..."); </script>';

        echo"
            <H3> &nbsp; Match Completed </H3>
                    <TABLE border = '2' align = 'center'>
                        <TR height='20'>
                            <TH> Request Number </TH><TH>Date</TH><TH> Time </TH>
                            <TH> Departure</TH><TH>Arrival</TH><TH>Current Count</TH><TH>Taxi Number</TH><TH>Estimated Price</TH>";   
        echo "</TR>";
        while($row = mysqli_fetch_array($ret3)) {
            echo "<TR align='center'>";
            echo "<TD>", $row['reqNum'], "</TD>";
            echo "<TD>", $row['year'].'-'.$row['month'].'-'.$row['day'], "</TD>";
            echo "<TD>", $row['hour'].'시 '.$row['minute'].'분', "</TD>";
            echo "<TD>", loc_to_str($row['deptNum']), "</TD>";
            echo "<TD>", loc_to_str($row['arvNum']), "</TD>";
            echo "<TD>", $row['count'], "</TD>";
            echo "<TD>", $row['taxiNUM'],"</TD>";
            echo "<TD>", (int)($row['price']/$row['count']+500),"</TD>";
            echo "</TR>";	  
        }
        echo"</table>";
    }
    




   
	
	echo "<br>&nbsp;<button type=".'"button" onclick='.'"location.href='."'result.php'".' "'.">back</button></br>";
	echo "</html>";


?>

