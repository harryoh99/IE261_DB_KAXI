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
    $row =  mysqli_fetch_array($ret0);
    if($row['ishost']==0)
        echo '<script type="text/javascript">alert("You are not the host! Ask the host!"); location.replace("search.php");</script>';
    else{
        $ret = mysqli_query($conn, $sql) or die("FIRST FAILED");
        $ret2 = mysqli_query($conn, $sql2) or die("SECOND FAILED");

        if($ret && $ret2){
            echo '<script type="text/javascript">alert("Completed! Now wait for the Driver to Accept"); location.replace("result.php"); </script>';
        }
        else{
            echo '<script type="text/javascript">alert("Failed!!"); location.replace("result.php"); </script>';
        }
    }

   

    


?>