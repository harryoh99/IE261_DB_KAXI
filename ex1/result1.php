<?php


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
                    <TH> Departure</TH><TH>Arrival</TH><TH>Current Count </TH><TH>Completed</TH>";   
    echo "</TR>";



	$servername = 'localhost';
	$username = 'root';
	$pw = '1234';
    $db = 'kaxi';
    $id = $_POST['ID'];
    $conn = mysqli_connect($servername, $username, $pw, $db);
    $sql = "select requestTBL.reqNum, year, month,day, hour, minute, deptNum, arvNum, count, requestTBL.completed from requestTBL,customerTBL
            where(requestTBL.reqNum = customerTBL.reqNum and userid='".$id."');";
    $sql2 = "select matchCandTBL.reqNum, year, month,day, hour, minute, deptNum, arvNum, count, requestTBL.completed, matchCandNum.completed, from requestTBL, matchCandTBL 
            where(select reqNum from customerTBL where userid='".$id."'and matchCandTBL.reqNum = requestTBL.reqNum and requestTBL.completed=1);";
    $sql3 = "select matchCandTBL.reqNum, year, month,day, hour, minute, deptNum, arvNum, count, requestTBL.completed, matchCandNum.completed, from requestTBL, matchCandTBL 
                 where(select reqNum from customerTBL where userid='".$id."' and requestTBL.completed=1);";
    
    
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
        echo "<TD>", bool_to_str($row['completed']), "</TD>";
        echo "</TR>";	  
    }


    echo "</TABLE>";
	
	echo "<br>&nbsp;<button type=".'"button" onclick='.'"location.href='."'result.php'".' "'.">back</button></br>";
	echo "</html>";


?>

