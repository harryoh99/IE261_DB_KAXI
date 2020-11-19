<?php

$servername = 'localhost';
$username = 'root';
$pw = '1234';
$dbname = 'kaxi';

$conn  = mysqli_connect($servername, $username, $pw, $dbname) or die("MySql Connection Failed!");

$driverid = $_POST['ID'];
$driverpw = $_POST['Password'];
$drivername = $_POST['name'];
$driverPhone = $_POST['phonenumber'];
$driverTaxi = $_POST['taxiNumber'];

$sql = "insert into personTBL(userid, username, pw, phoneNum) values";
$sql = $sql."('".$driverid."', '".$drivername."', '".$driverpw."',".$driverPhone.");";

$sql2 = "insert into driverTBL(userid, taxiNUM) values ('".$driverid."', '".$driverTaxi."');";

$result1 = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
if($result1&&$result2) {
	
	echo '<script type="text/javascript">alert("Successfully Registered"); history.back(-1)</script>';
 
}
else{
	 echo "ERROR: " . $sql . "<br>" . $conn->error;
	 //echo '<script type="text/javascript">alert("Registration Fail"); history.back(-1)</script>';	   
}






?>