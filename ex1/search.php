<html>
	<head meta charset="utf-8">
	<title> right_main </title>
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
	<br><br><br>
	<form method = "post" action = 'Search_result.php'>
		<table align='center' width = '600'>
			<tr bgcolor = '#E6E6E6'>
				<td Colspan = "2"> <H2> <B>  <p style = 'text-align:center;'> Search groups </p> </B> </H2> </td>
			</tr>
			<tr align='center' height='80'>
				<td width='80'> <B> Type </B> </td>
				<td><B>To kaist</B> <Input type='radio' value='ToKaist' Name='type'> </input> &nbsp <B>From kaist</B> <Input type='radio' value='FromKaist' Name='type'> </input>
					<select name = 'place'> <option value='Anywhere'>Anywhere</option> <option value='1'>기계동</option><option value='2'>희망관</option><option value='3'>오리연못</option><option value='4'>N1</option> </select>
					<br> 
				</td>
			</tr>
			<tr align='center' height='100'>
				<td width='80'> <B> Departure<br>/Destination </B> </td>
				<td>
				<input type="text" name="Destination" size="10" placeholder="Departure / Destination.."></input>
				</td>
			</tr>
			<tr align='center' height='80'>
				<td colspan = '2'> 
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
		</table>
		<br> <p style = 'text-align:center;'> <input type="submit" value="Search"></input> </p>
	</form>
		<br> <button type="button" onclick="parent.right.location.href='create.php'"><B>Create Group</B></button>
	</body>
</html>