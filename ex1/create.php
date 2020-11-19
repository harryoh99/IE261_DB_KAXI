<html>
	<head>
	<title> create </title>
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
		<br><br>
		<form method = "post" action = 'create_result.php'>
			<table align='center'  width='500'>
				<tr align='center' height='80'bgcolor = '#E6E6E6' >
					<td colspan ='2'> <B>Please Enter Group information you want to create!!</B> </td>
				</tr>
				<tr align='center' height='80'>
					<td colspan ='2'> <input type="text" name="ID" size="10" maxlength="20" placeholder="ID.."></input><br> </td>
				</tr>
				<tr align='center' height='80'>
					<td colspan ='2'> <input type="text" name="destination" size="10" maxlength="12" placeholder="Destination.."></input><br> </td>
				</tr>
				<tr align='center'>
					<td colspan ='2'>
					<table>
							<script>
								var a = new Date();
								document.write("<tr align = 'center'>");
								for(var i =0; i<7; i++) {
									document.write("<td>"+"<B>"+(a.getMonth()+1)+"/"+(a.getDate()) +"</B>" + "<br>"+"<Input type='radio' value='"+a.getDate()+"' Name='Date'>"+"</td>");
									a.setDate(a.getDate()+1);
								}
								document.write("</tr>");
								document.write("<tr align = 'center'>");
								for(var i =0; i<7; i++) {
									document.write("<td>"+"<B>"+(a.getMonth()+1)+"/"+(a.getDate()) +"</B>" + "<br>"+"<Input type='radio' value='"+a.getDate()+"' Name='Date'>"+"</td>");
									a.setDate(a.getDate()+1);
								}
								document.write("</tr>");
							</script>
					</table>
					</td>
				</tr>
				<tr align='center' height='80'>
					<td colspan ='2'> <input type="text" name="departure" size="10" placeholder="departure.."></input><br> </td>
				</tr>
				<tr align='center' height='80'>
					<td> <input type="text" name="hour" size="10" placeholder="Hour.."></input><br> </td>
					<td> <input type="text" name="min" size="10" placeholder="Minute.."></input><br> </td>
				</tr>
				<tr align='center' height='50'>
					<td colspan ='2'> <input type="submit" value="Register"></input> </td>
				</tr>
			</table>
		</form>
		<button type="button" onclick="location.href='search.php'"><B>Back</B></button>
	</body>
</html>