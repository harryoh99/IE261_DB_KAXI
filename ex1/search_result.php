<?php
    echo "<HEAD>";
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />"; 
    echo "<TITLE> Taxi Search Result </TITLE>";
    echo "</HEAD>";
    echo "<H2> &nbsp; Find Your Taxi and Save Money </H2>";
    echo "<TABLE border = '2' align = 'center'>";
    echo "<TR height='20'>";
	echo "<TH> Request Number </TH><TH> Hour </TH><TH> Minute </TH><TH> Current Count </TH>";   
	echo "</TR>";
	$servername = 'localhost';
	$username = 'root';
	$pw = '1234';
    $db = 'kaxi';
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
        $sql = "select reqNum,hour, minute,count from requestTBL where (year=".$year." and month=".$month." and day=".$date.");";
    }
    else if($dest=="Anywhere"){
        $sql = "select reqNum,hour, minute,count from requestTBL where (year=".$year."and month=".$month." and day=".$date." and deptNum=".$depart.");";
    }
    else if($depart=="Anywhere"){
        $sql = "select reqNum,hour, minute,count from requestTBL where (year=".$year."and month=".$month." and day=".$date." and arvNum =".$dest.");";
    }
    else{
        $sql = "select reqNum,hour, minute,count from requestTBL where (year=".$year."and month=".$month." and day=".$date."and deptNum=".$depart." and arvNum=".$dest.");";
    }
    $ret = mysqli_query($conn,$sql) or die("FUCK sql: ".$sql."<br><br>".$conn->error);
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
        echo "<TD>", $row['hour'], "</TD>";
        echo "<TD>", $row['minute'], "</TD>";	
        echo "<TD>", $row['count'], "</TD>";
        echo "</TR>";	  
    }
    mysqli_close($conn);

	
	
	echo "</TABLE>";
	
	echo "<br>&nbsp;<button type=".'"button" onclick='.'"location.href='."'search.php'".' "'.">back</button></br>";
	echo "</html>";




?>

<html>

</html>