<?php
    $servername = 'localhost';
	$username = 'root';
	$pw = '1234';
    $db = 'kaxi';
    $id = $_POST['id'];
    $reqNum = $_POST['reqNum'];

    $sql = "update requestTBL set completed = 1 where reqNum = ".$reqNum.";";
    $sql2 = "insert into matchCandTBL(reqNum, completed) values (".$reqNum.", 0);";
    $sql3 = "select ishost from customerTBL where (reqNum = ".$reqNum." and userid = '".$id."');";
    $conn = mysqli_connect($servername, $username, $pw, $db);
    $ret0 = mysqli_query($conn, $sql3) or die("sql: ".$sql3."<br><br>".$conn->error);
    $count = mysqli_num_rows($ret0);
    if($count==1){
        $ret = mysqli_query($conn, $sql) or die("FIRST FAILED");
        $ret2 = mysqli_query($conn, $sql2) or die("SECOND FAILED");

        if($ret && $ret2){
            echo '<script type="text/javascript">alert("Completed! Now wait for the Driver to Accept"); location.replace("result.php"); </script>';
        }
        else{
            echo '<script type="text/javascript">alert("Failed!!"); location.replace("result.php"); </script>';
        }
    } 
    else{
        '<script type="text/javascript">alert("You are not the host! Host can only choose completion"); location.replace("result.php"); </script>';
    }


    


?>