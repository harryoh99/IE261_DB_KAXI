<?php
	session_start();
?>

<html>
	<head>
	<title> top </title>
	</head>
	<body bgcolor = '#E6E6E6'>
		<p style = 'text-align:center;'> <img src = 'logo.jpg' width = '160' height = '80'> <br> <B> Welcome <?php echo $_SESSION['ID'];?> ! </B> </p>
	</body>
</html>