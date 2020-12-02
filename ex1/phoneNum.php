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
                PhoneNumber
            </TITLE>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
            <TITLE> Passenger Phone Number </TITLE>
            </HEAD>";



    $servername = 'localhost';
	$username = 'root';
	$pw = '1234';
    $db = 'kaxi';
    $id = $_POST['id'];
    $reqNum = $_POST['reqNum'];

    $conn = mysqli_connect($servername, $username, $pw, $db);
    $sql  = "select year, month, day, hour, minute, deptNum, arvNum from requestTBL where reqNum  = ".$reqNum.";";
    $sql2 = "select personTBL.userid, phoneNum from customerTBL,personTBL 
            where (customerTBL.userid = personTBL.userid and customerTBL.userid = '".$id."' and reqNum  = ".$reqNum.");";

    $ret = mysqli_query($conn,$sql) or die("ERROR: " . $sql . "<br>" . $conn->error);
    if($ret){
        $count = mysqli_num_rows($ret);
        if($count!=1)
            echo '<script type="text/javascript">alert("Multiple Data ERROR!"); location.replace("result.php"); </script>';
        
        else{
            if($row = mysqli_fetch_array($ret)) {
                $year = $row['year'];
                $month = $row['month'];
                $day = $row['day'];
                $hour = $row['hour'];
                $minute  = $row['minute'];
                $deptNum = $row['deptNum'];
                $arvNum = $row['arvNum'];
            }
        }
        $ret2 = mysqli_query($conn,$sql2) or die("ERROR: " . $sql . "<br>" . $conn->error);
        $count2 = mysqli_num_rows($ret);

        echo "
            <H3>Ride on ".$year." - ".$month." - ".$day." " .$hour."시 ".$minute."분  <br>
            Departure: ".loc_to_str($deptNum)."<br> Destination: ".loc_to_str($arvNum)."<br></H3>
        ";

        if($count<=0)
            echo '<script type="text/javascript">alert("WRONG!"); location.replace("result.php"); </script>';
        
        else{
            echo "
            <TABLE align = 'center'>
                <TR height='20'>
                    <TH> Passenger ID </TH><TH>Phone Number</TH>";   
             echo "</TR>";
            while($row = mysqli_fetch_array($ret2)) {
                echo "<TR align='center'>";
                echo "<TD>", $row['userid'], "</TD>";
                echo "<TD>", $row['phoneNum'], "</TD>";
                echo "</TR>";
            }
        }
        echo"</table>";
        echo "<br>&nbsp;<button type=".'"button" onclick='.'"location.href='."'result.php'".' "'.">back</button></br>";
        echo "</html>";
    }
    else{
        echo '<script type="text/javascript">alert("Wrong Data!"); location.replace("result.php"); </script>';
    }

?>