<?php
	session_start();
?>

<html>
	<head>
	<title> top </title>
	</head>
	<body bgcolor = '#ffffbf'>
		<p style = 'text-align:center;'> <img src = 'logo.jpg' width = '160' height = '80'> <br> <B> Welcome <?php echo $_SESSION['ID'];?> ! </B> </p>
	</body>
</html>