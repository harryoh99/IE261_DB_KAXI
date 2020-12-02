<?php
    session_start();
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
                search_result
                </TITLE>";
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />"; 
    echo "<TITLE> Taxi Search Result </TITLE>";
    echo "</HEAD>";
    echo "<H2> &nbsp; Find Your Taxi and Save Money </H2>";
    echo "<TABLE align = 'center'>";
    echo "<TR height='20'>";
	echo "<TH> Request Number </TH><TH> Departure </TH><TH> Destination </TH><TH> Time </TH><TH> Current Count </TH><TH>Expected Price</th><th>Join</th>";   
	echo "</TR>";
	$servername = 'localhost';
	$username = 'root';
	$pw = '1234';
    $db = 'kaxi';
    $id=$_SESSION['ID'];
    
    $type = $_POST['type'];
    if($type =='ToKaist'){
        $dest = $_POST['INKAIST'];
        $depart = $_POST['OUTKAIST'];
    }

    else if($type == 'FromKaist'){
        $dest = $_POST['OUTKAIST'];
        $depart = $_POST['INKAIST'];
    }
    $year = 2020;
    $month = 12;
    $date = $_POST['Date'];

    $conn = mysqli_connect($servername, $username, $pw, $db) or die("MYSQL CONNECT FAILED");
    if($dest=="Anywhere" && $depart =="Anywhere"){
        $sql = "select reqNum,hour, minute,count,deptNum, arvNum from requestTBL where (year=".$year." and month=".$month." and day=".$date." and completed = 0);";
    }
    else if($dest=="Anywhere"){
        $sql = "select reqNum,hour, minute,count,deptNum, arvNum from requestTBL where (year=".$year." and month=".$month." and day=".$date." and deptNum=".$depart." and completed = 0);";
    }
    else if($depart=="Anywhere"){
        $sql = "select reqNum,hour, minute,count,deptNum, arvNum from requestTBL where (year=".$year." and month=".$month." and day=".$date." and arvNum =".$dest." and completed = 0);";
    }
    else{
        $sql = "select reqNum,hour, minute,count,deptNum, arvNum from requestTBL where (year=".$year." and month=".$month." and day=".$date." and deptNum=".$depart." and arvNum=".$dest." and completed = 0);";
    }
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
        echo "<TD>", loc_to_str($row['deptNum']), "</TD>";
        echo "<TD>", loc_to_str($row['arvNum']), "</TD>";
        echo "<TD>", $row['hour'].'시 '.$row['minute'].'분', "</TD>";
        echo "<TD>", $row['count'], "</TD>";
        echo "<TD>", (compute_price($row['deptNum'],$row['arvNum'])/$row['count'] +500), "</TD>";
        echo "<TD> 
        <form method = 'post' action = 'join.php'>
            <input type='hidden' name = 'id' value = '".$id."'>
            <input type='hidden' name = 'reqNum' value = '".$row['reqNum']."'>
            <input type='submit' value='Join'>
        </form>
        </TD>";
        echo "</TR>";	  
    }
    mysqli_close($conn);

	

	echo "</TABLE>";
	
	echo "<br>&nbsp;<button type=".'"button" onclick='.'"location.href='."'search.php'".' "'.">back</button></br>";
	echo "</html>";




?>

<html>

</html>