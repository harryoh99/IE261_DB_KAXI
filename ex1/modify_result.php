<?php
	$servername = 'localhost';
	$username = 'root';
	$pw = '1234';
	$db = 'kaxi';

    $conn = mysqli_connect($servername,$username,$pw,$db) or die("Mysql connection failed");
    $id = $_POST['ID']; //need to be implemented in the modify2.php
    $name = $_POST['name'];
    $sex = $_POST['gender'];
    $phoneNum = $_POST['phoneNum'];
    $email = $_POST['e-mail'];

    $sql = "update personTBL set name = '".$name."', sex = '".$sex."', phoneNum = '".$phoneNum."' where userid = '".$id."';";
    $sql2 = "update userTBL set email = '".$email."' where userid = '".$id."';";

    $res = mysqli_query($conn,$sql);
    $res2 = mysqli_query($conn,$sql2);

    if($res&&$res2){
        echo '<script type="text/javascript">alert("Successfully Modified"); history.go(-2)</script>';
    }
    else{
        //echo "ERROR: " . $sql . "<br>" . $conn->error;
        echo '<script type="text/javascript">alert("Modification Fail"); history.back(-1)</script>';	   
   }


?>