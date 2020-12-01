<?php
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
    $id = $_POST['ID'];
    $date = (int)$_POST['Date'];
    $hour = $_POST['hour'];
    $minute = $_POST['minute'];

    $conn = mysqli_connect($servername, $username, $pw, $db) or die("MYSQLI_CONNECT FAILED!");
   
    $sql = "call insert_request(".$year.", ".$month.",".$date.",".$hour.",".$minute.",".$depart.",".$dest.");";
    $ret = mysqli_query($conn,$sql) or die("ERROR: " . $sql . "<br>" . $conn->error);
    $sql2 = "update customerTBL set userid = '".$id."', ishost = 1 where reqNum=(select LAST_INSERT_ID());";
    $ret2 = mysqli_query($conn,$sql2) or die("ERROR: " . $sql . "<br>" . $conn->error);
    if($ret&&$ret2){
        echo '<script type="text/javascript">alert("Successfully Registered");location.replace("right_main.php");</script>';
    }
    else{
        '<script type="text/javascript">alert("Create Fail"); history.back(-1)</script>';
    }
?>
