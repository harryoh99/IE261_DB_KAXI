<?php
	session_start();
?>

<html>
	<head>
	<title> Kaxi </title>
	<style>
		button {
			width:100px;
			background-color: #f8585b;
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

	</style>
	</head>
	<body bgcolor = '#E6E6E6'>
		<br>
		<p style = 'text-align:center;'> <img src = 'logo.jpg'> </p>
		<br>
		<br>
		<table align = 'center'>
			<tr>
				<td> <button type="button" onclick="location.href='Loginpage1.html'"><B>User</B></button> </td>
				<td> &nbsp <button type="button" onclick="location.href='Loginpage2.html'"><B>Taxi</B></button> </td>
			</tr>
		</table>
	</body>
</html>