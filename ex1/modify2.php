<?php
	$servername = 'localhost';
	$username = 'root';
	$pw = '1234';
	$db = 'kaxi';

	$conn = mysqli_connect($servername,$username,$pw,$db) or die("Mysql connection failed");

	$id = $_POST['ID'];
	$u_pw = $_POST['Password'];

	$sql = "select * from personTBL where (userid='".$id."' and pw = '".$u_pw."');";
	$ret = mysqli_query($conn,$sql);
	$continue = 0
	if($ret){
		$count = mysqli_num_rows($ret);
		if($count==0){

			echo '<script type="text/javascript">alert("no data!!"); history.back(-1)</script>';
		}
		else{
			$continue = 1;
			$row = mysqli_fetch_array($ret);
			$name = $row['username'];
			$sex = $row['sex'];
			$phoneNum = $row['phoneNum'];
		}
	}
	else{
		echo '<script type="text/javascript">alert("Search Fail"); history.back(-1)</script>';
	}

	assert($continue==1);
	$sql2 = "select * from userTBL where userid='".$id."';";
	$ret2 = mysqli_query($conn,$sql2);
	if($ret2){
		$count = mysqli_num_rows($ret2);
		if($count!>0){
			$row = mysqli_fetch_array($ret2);
			$email = $row['email'];
		}
		else{
			//이 부분은 taxi 관련된 거라 따로 뺄꺼면, 사실 따로 쓰면 될듯
			$sql3 = "select * from driverTBL where userid='".$id."';";
			$ret3 = mysqli_query($conn,$sql3);
			if($ret3){
				$count = mysqli_num_rows($ret3);
				if($count!>0){
					$row = mysqli_fetch_array($ret3);
					$taxiNum = $row['taxiNUM'];
					$taxiCompanyName = $row['taxiCompanyName'];

				}
				else{
					'<script type="text/javascript">alert("Search Fail"); history.back(-1)</script>';
				}
			}
			else{
				echo '<script type="text/javascript">alert("Search Fail"); history.back(-1)</script>';
			}
		}
	}
	else{
		echo '<script type="text/javascript">alert("Search Fail"); history.back(-1)</script>';
	}
	



	



?>


<html>
	<head>
	<title> Register </title>
	<style>
		button {
			width:100px;
			background-color: gray;
			border: none;
			border-radius:10px;
			color:#fff;
			padding: 15px 0;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 15px;
			margin: 4px;
			cursor: pointer;
		}

		input[type=text] {
			width: 100%;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color: white;
			background-image: url('searchicon.png');
			background-position: 10px 10px; 
			background-repeat: no-repeat;
			padding: 12px 20px 12px 40px;
		}
		input[type=submit]{
			width:80px;
			background-color: black;
			border: none;
			border-radius:8px;
			color:#fff;
			padding: 12px 0;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 12px;
			margin: 3.5px;
			cursor: pointer;
		}	

	</style>
	</head>
	<body>
		<form method = "post" action = 'modify_result.php'>
			<table align='center'  width='500'>
				<tr align='center' height='50'>
					<td> <B>Modify your information!!</B> </td> 
					<!-- 정민아 여기다가 id 받는거 하나만 넣어줘(대신 우리가 이건 못 바꾸게 하면 될듯?그래야 뒤의 sql에서 id를 받아올 수 있어
						기본으로 id위에서 받은거 넣으면 되니까 $id로 되어 있어.-->
				</tr>
				<tr align='center' height='50'>
					<td> <input type="text" name="name" size="10" maxlength="12" placeholder="Name.."></input><br> </td>
				</tr>
				<tr align='center' height='50'>
					<td align='center'> <B> Choose Your Gender: </B> <input type= 'radio', name='gender' value='M'> Male <input type= 'radio', name='gender' value='F'> Female </td>
				</tr>
				<tr align='center' height='50'>
					<td> <input type="text" name="phonenumber" size="10" maxlength="11" placeholder="phonenumber.."></input><br> </td>
				</tr>
				<tr align='center' height='50'>
					<td> <input type="text" name="e-mail" size="10" placeholder="email.."></input><br> </td>
				</tr>
				<tr align='center' height='40'>
					<td> <input type="submit" value="modify"></input> </td>
				</tr>
			</table>
		</form>
		<button type="button" onclick="location.href='modify.php'"><B>Back</B></button>
	</body>
</html>