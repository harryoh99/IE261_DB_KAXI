<?php


$servername = 'localhost';
$username = 'root';
$pw = '1234';
$db = 'kaxi';

$conn = mysqli_connect($servername, $username, $pw, $db) or die ('MySQL connect failed');

$userid = $_POST['ID'];
$userpw = $_POST['Password'];
$username = $_POST['name'];
$usersex = $_POST['gender'];
$userphone = $_POST['phonenumber'];
$usermail = $_POST['e-mail'];

$sql1 = "insert into personTBL(userid, username, pw, sex, phoneNum) values";
$sql1 = $sql1."('".$userid."', '".$username."', '".$userpw."', '".$usersex."', ".$userphone.");";

$sql2 = "insert into userTBL(userid, email) values ( '".$userid."', '".$usermail."');";

$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
if($result1&&$result2) {
	
	echo '<script type="text/javascript">alert("Successfully Registered"); history.back(-1)</script>';
 
}
else{
	 echo "ERROR: " . $sql . "<br>" . $conn->error;
	 //echo '<script type="text/javascript">alert("Registration Fail"); history.back(-1)</script>';	   
}



/*
<html>
	<head>
	<title> Register_result </title>
	</head>
	<body>
		<h1> <p style = 'text-align:center;'> Kaxi </p></h1>
		<hr class = "one">
		<!-- 이거 DB랑 연결해서 하는거 코드 ㄱㄱ ㅎㅎ -->
		<button type="button" onclick="location.href='Loginpage1.html'"><B>Back to Login page</B></button>
	</body>
</html>*/


?>