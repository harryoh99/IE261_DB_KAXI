<?php
    $servername = 'localhost';
    $username = 'root';
    $pw = '1234';
    $db = 'kaxi';
    $id = $_POST['id'];
    $reqNum = $_POST['reqNum'];

    $conn = mysqli_connect($servername, $username, $pw, $db) or die("SQL DEAD");
    $sql0 = "select * from customerTBL where (userid = '".$id."' and reqNum = ".$reqNum.");";
    $ret0 = mysqli_query($conn, $sql0) or die("sql: ".$sql0."<br><br>".$conn->error);
    if(mysqli_num_rows($ret0) ==0){
        $sql = "insert into customerTBL values('".$id."', ".$reqNum.", 0);";
        $sql2 = "update requestTBL set count = count +1 where reqNum=".$reqNum.";";
    
        $sql3 = "select count from requestTBL where reqNum=".$reqNum.";";
        $ret1 = mysqli_query($conn, $sql) or die("sql: ".$sql."<br><br>".$conn->error);
        $ret2 = mysqli_query($conn,$sql2) or die("DOOM2");
        $ret3 = mysqli_query($conn, $sql3) or die("DOOM3");
    
        if($row = mysqli_fetch_array($ret1)) {
            $count = $row['count'];
        }
    
        if($count==4){
            $sql4 = "insert into matchCandTbl(reqNum, completed) values(".$reqNum.", 0);";
            $ret4 = mysqli_query($conn, $sql4) or die("DOOM4");
        }
        if($ret1&&$ret2){
            echo '<script type="text/javascript">alert("Successfully Inserted");location.replace("right_main.php");</script>';
        }
        else{
            '<script type="text/javascript">alert("Insertion Fail"); history.back(-1)</script>';
        }
    
    }
    else{
        echo '<script type="text/javascript">alert("You are already in this Group!"); location.replace("search.php");</script>';
    }


    

?>