<?php
	session_start();
?>
<html>
	<head>
	<title> result </title>
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
			background-color: gray;
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
		<br><br><br>
		<form method = "post" action = 'modify2.php'>
			<table align='center' width='400'>
				<tr align='center' height='50'>
					<td> <B> Enter your ID and Password! </B> </td>
				</tr>
				<tr align='center' height='50'>
					<td> <input type="text" name="ID" size="10" value = <?php echo $_SESSION['ID']?> placeholder="ID.." readonly></input><br> </td>
				</tr>
				<tr align='center' height='50'>
					<td> <input type="text" name="Password" size="10" maxlength="8"placeholder="Password.."></input><br> </td>
				</tr>
				<tr align='center' height='40'>
					<td> <input type="submit" value="Check"></input> </td>
				</tr>
			</table>
		</form>
	</body>
</html>