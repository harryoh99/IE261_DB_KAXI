<?php

$servername = 'localhost';
$username = 'root';
$pw = '1234';
$dbname = 'kaxi';

$conn  = mysqli_connect($servername, $username, $pw, $dbname) or die("MySql Connection Failed!");

$driverid = $_POST['ID'];
$driverpw = $_POST['Password'];
$drivername = $_POST['name'];
$driverSex = $_POST['gender'];
$driverPhone = $_POST['phonenumber'];
$driverTaxi = $_POST['taxiNumber'];
$driverCompany = $_POST['Company'];

$sql = "insert into personTBL(userid, username, pw, sex, phoneNum) values";
$sql = $sql."('".$driverid."', '".$drivername."', '".$driverpw."', '".$driverSex."'," .$driverPhone.");";

$sql2 = "insert into driverTBL(userid, taxiCompanyNum, taxiNUM) values ('".$driverid."', ".$driverCompany.",'".$driverTaxi."');";

$result1 = mysqli_query($conn, $sql) or die('<script type="text/javascript">alert("Registration Fail"); history.back(-1)</script>');
$result2 = mysqli_query($conn, $sql2) or die('<script type="text/javascript">alert("Registration Fail"); history.back(-1)</script>');
if($result1&&$result2) {
	
	echo '<script type="text/javascript">alert("Successfully Registered"); location.replace("Loginpage2.html");</script>';
 
}
else{
	 //echo "ERROR: " . $sql . "<br>" . $conn->error;
	 echo '<script type="text/javascript">alert("Registration Fail"); history.back(-1)</script>';	   
}






?>