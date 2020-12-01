<html>
	<head>
	<title> create </title>
<style>
		button {
			width:120px;
			background-color: Black;
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
		input[type=submit]{
			width:80px;
			background-color: #E6E6E6;
			border: none;
			border-radius:8px;
			color: black;
			padding: 12px 0;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 12px;
			margin: 3.5px;
			cursor: pointer;
		}
		input[type=text] {
			width: 100%;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 12px;
			background-color: white;
			background-image: url('searchicon.png');
			background-position: 10px 10px; 
			background-repeat: no-repeat;
			padding: 12px 20px 12px 20px;
		}
		table {
			border: 0px solid #444444;
			border-collapse: collapse;
		}
		th, td {
			border-bottom: 1px solid #444444;
			padding: 10px;
		}
	</style>
	</head>
	<body>
		<br><br>
		<form method = "post" action = 'create_de.php'>
			<table align='center'  width='500'>
				<tr align='center' height='80'bgcolor = '#E6E6E6' >
					<td colspan ='2'> <B>Create</B> </td>
				</tr>
				<tr align='center' height='80'>
					<td colspan ='2'> <input type="text" name="ID" size="10" maxlength="20" placeholder="ID.." required></input><br> </td>
				</tr>
				<tr align='center' height='80'>
				<td width='80'> <B> Type </B> </td>
					<td><B>To kaist</B> <Input type='radio' value='ToKaist' Name='type' required> </input> &nbsp <B>From kaist</B> <Input type='radio' value='FromKaist' Name='type'> </input>
					</td>
				</tr>
			</table>
			<br> <p style = 'text-align:center;'> <input type="submit" value="Create"></input> </p>
			</form>
		<button type="button" onclick="location.href='search.php'"><B>Back</B></button>
	</body>
</html>
