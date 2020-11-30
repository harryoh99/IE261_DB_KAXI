<html>
	<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		label,
		textarea {
			font-size: .8rem;
			letter-spacing: 1px;
		}
		textarea {
			padding: 10px;
			line-height: 1.5;
			border-radius: 5px;
			border: 1px solid #ccc;
			box-shadow: 1px 1px 1px #999;
		}

		label {
			display: block;
			margin-bottom: 10px;
		}
	</style>
	</head>
	<body>
		<br> <br>
		<p style = 'text-align:center;'> <B>Freely Give your opinion!!</B> </p>
		 <form method = "post" action = 'feedback_result.php'>
		 <table align = 'center'>
			<tr align = 'left'>
				<td>
					 <select name = 'rating'>
					 <option value='5'>★★★★★</option>
					 <option value='4'>★★★★☆</option>
					 <option value='3'>★★★☆☆</option>
					 <option value='2'>★★☆☆☆</option>
					 <option value='1'>★☆☆☆☆</option> 
					 </select>
				</td>
			</tr>
			<tr align = 'center'>
				<td> <textarea COlS = '80' Rows='10' Name = 'text' placeholder="Enter your feedback!!" > </textarea> </td>
			<tr>
			<tr align = 'center'>
				<td> <input type="submit" value="Submit"> </td>
			<tr>
		</table>
		</form>
		<br> <button type="button" onclick="parent.right.location.href='Feedback_list.php'"><B>Feedback list</B></button>
	</body>
</html>
