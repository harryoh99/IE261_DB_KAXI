<?php
	session_start();
	$servername = 'localhost';
	$username = 'root';
	$pw = '1234';
	$db = 'kaxi';
	$conn = mysqli_connect($servername, $username, $pw, $db) or die("MYSQL CONNECTION FAILED");

	$id = $_POST['ID'];
	$d_pw = $_POST['Password'];
	$_SESSION['ID'] = $id;
	$sql = "select driverTBL.userid, pw from driverTBL, personTBL where (driverTBL.userid='".$id."' and personTBL.userid='".$id."' and pw ='".$d_pw."');";
	$ret = mysqli_query($conn, $sql);
	if($ret){
		$count = mysqli_num_rows($ret);
		if($count>0){
			$row = mysqli_fetch_array($ret);
			$tmp_id = $row['userid'];
			$tmp_pw = $row['pw'];
			if($tmp_id==$id && $tmp_pw==$d_pw){
				echo '
				<html>
					<head>
					<title> Kaxi </title>
					</head>
					<FRAMESET ROWS = "120, *">
						<FRAME SRC = "taxi_top.html" NAME = "top" noresize>
						<FRAMESET COLS = "200, *">
							<FRAME SRC = "taxi_menu.html" NAME = "left" noresize>
							<FRAME SRC = "taxi_right_main.php" NAME = "right" noresize>
						</Frameset>
					</Frameset>
					<Body>
				</html>';
			}
			else{
				//echo "1";
				echo '<script type="text/javascript">alert("Login Info Wrong"); history.back(-1)</script>';
			}
		}
		else{
			//echo "2";
			echo '<script type="text/javascript">alert("Login Info Wrong"); history.back(-1)</script>';
		}


	}
	else{
		//echo "3";
		echo '<script type="text/javascript">alert("Login Info Wrong"); history.back(-1)</script>';
	}

?>

