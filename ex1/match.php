<?php
    $servername = 'localhost';
    $username = 'root';
    $pw = '1234';
    $db = 'kaxi';
    $reqNum = $_POST['reqNum'];
    $id = $_POST['id'];
    $matchCandNum = $_POST['matchCandNum'];
    $price = $_POST['price'];



    $conn = mysqli_connect($servername, $username, $pw, $db) or die("SQL DEAD");
    
  
    $sql = "insert into matchTBL(matchCandNum, taxiID, price) values('".$matchCandNum."', '".$id."',".$price.");";
    $sql2 = "update matchCandTBL set completed=1 where reqNum=".$reqNum.";";


    $ret1 = mysqli_query($conn, $sql) or die("sql: ".$sql."<br><br>".$conn->error);
    $ret2 = mysqli_query($conn,$sql2) or die("sql: ".$sql2."<br><br>".$conn->error);



   
    if($ret1&&$ret2){
        echo '<script type="text/javascript">alert("Successfully Inserted");location.replace("taxi_right_main.php");</script>';
    }
    else{
        '<script type="text/javascript">alert("Insertion Fail"); history.back(-1)</script>';
    }


   


?>
