<?php
	$type = $_POST['type'];
	$userid = $_POST['ID'];
?>
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
		<form method = "post" action = 'create_result.php'>
			<input type="hidden" name='type' value=<?php echo $type?>>
			<table align='center'  width='500'>
				<tr align='center' height='80'bgcolor = '#E6E6E6' >
					<td colspan ='2'> <B>Create</B> </td>
				</tr>
				<tr align='center' height='80'>
					<td colspan ='2'> <input type="text" name="ID" size="10" maxlength="20" value='<?php echo $userid ?>'></input><br> </td>
				</tr>
				<tr align='center' height='60'>
					<td colspan = '2'> 
					 <?php if($type=='ToKaist') {echo'<B> Destination : </B>';} if($type=='FromKaist') {echo'<B> Departure :  </B>';} ?> &nbsp<?php if($type=='ToKaist') { echo'<B>To kaist</B>';}  if($type=='FromKaist') { echo'<B>From kaist</B>';} ?> &nbsp  <select name = 'INKAIST'> <option value='Anywhere'>Anywhere</option> <option value='1'>기계동</option><option value='2'>희망관</option><option value='3'>오리연못</option><option value='4'>N1</option> </select> <br> 
					</td>
				</tr>
				<tr align='center' height='60'>
				<td colspan = '2'> 
					 <?php if($type=='ToKaist') {echo'<B> Departure : </B>';} if($type=='FromKaist') {echo'<B> Destination :  </B>';} ?> &nbsp  <select name = 'OUTKAIST'> <option value='Select'>Select</option> <option value='5'>둔산 갤러리아</option><option value='6'>궁동 로데오거리</option><option value='7'>유성버스터미널</option><option value='8'>대전복합터미널</option><option value='9'>대전역</option><option value='10'>서대전역</option> </select><br> 
					</td>
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
				</tr
				<tr align='center' height='80'>
					<td align = 'center'> 
						<B> Hour </B> &nbsp
						<select name = 'hour'>
										<script>
											for(var i =0; i<24; i++){
												document.write("<option value='"+i+"'>"+i+"시</option>");
											}
										</script>
						</select>
					</td width = '100' align = 'center'>
					<td> 
						<B> minute </B> &nbsp
						<select name = 'minute'>
										<script>
											for(var i =0; i<6; i++){
												document.write("<option value='"+i+"0'>"+i+"0분</option>");
											}
										</script>
						</select>
					</td>
				</tr>
			</table>
			<br>  <p style = 'text-align:center;'> <input type="submit" value="Create"></input> </p>
		</form>
	<button type="button" onclick="location.href='create.php'"><B>Back</B></button>
</html>