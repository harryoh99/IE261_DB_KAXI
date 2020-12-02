<?php

echo "<HEAD>
	<style>
	table {
		 border-top: 1px solid #ccc;
		 border-left: 3px solid #369;
		 border-right: 3px solid #369;
    }
    th, td {
		 border-bottom: 1px solid #444444;
		 border-right: 1px solid;
		 padding: 5px;
    }
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
	</style>
		<TITLE>
			Feedbacklist
		</TITLE>
	</HEAD>";
	echo "<H2> &nbsp; Feedbacklist </H2>";	
	
	echo "<BR> <TABLE width = '1000' align='center'>";
	echo "<TR allign='center'>";
	echo "<TD width = '30' align = 'center'>", "<B>#</B>","</TD>";
	echo "<TD align = 'center'>", "<B>Userid</B>","</TD>";
	echo "<TD align = 'center'>", "<B>Rate</B>","</TD>";
	echo "<TD align = 'center'>", "<B>Feedback Content</B>","</TD>";
	echo "</TR>";
	
$servername = "localhost:3306";
$username = "root";
$password = "1234";
$dbname = "kaxi";
	
// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");

$sql = "SELECT * from feedbackTaxiTBL";

$result = mysqli_query($con, $sql);

 
   while($row = mysqli_fetch_array($result)) {
		if ($row['rating']==5){
	  echo "<TR align='center'>";
	  echo "<TD>", $row['feedbackNum'], "</TD>";
	  echo "<TD>", $row['userid'], "</TD>";
	  echo "<TD>", "★★★★★", "</TD>";
	  echo "<TD>", $row['feedback'], "</TD>";
	  echo "</TR>";
	   }
	   elseif ($row['rating']==4){
	  echo "<TR align='center'>";
	  echo "<TD>", $row['feedbackNum'], "</TD>";
	  echo "<TD>", $row['userid'], "</TD>";
	  echo "<TD>", "★★★★☆", "</TD>";
	  echo "<TD>", $row['feedback'], "</TD>";
	  echo "</TR>";
	   }
	   elseif ($row['rating']==3){
	  echo "<TR align='center'>";
	  echo "<TD>", $row['feedbackNum'], "</TD>";
	  echo "<TD>", $row['userid'], "</TD>";
	  echo "<TD>", "★★★☆☆", "</TD>";
	  echo "<TD>", $row['feedback'], "</TD>";
	  echo "</TR>";
	   }
	   elseif ($row['rating']==2){
	  echo "<TR align='center'>";
	  echo "<TD>", $row['feedbackNum'], "</TD>";
	  echo "<TD>", $row['userid'], "</TD>";
	  echo "<TD>", "★★☆☆☆", "</TD>";
	  echo "<TD>", $row['feedback'], "</TD>";
	  echo "</TR>";
	   }
	   else {
	  echo "<TR align='center'>";
	  echo "<TD>", $row['feedbackNum'], "</TD>";
	  echo "<TD>", $row['userid'], "</TD>";
	  echo "<TD>", "★☆☆☆☆", "</TD>";
	  echo "<TD>", $row['feedback'], "</TD>";
	  echo "</TR>";
	   }
   }
   
   mysqli_close($con);
   
	echo "</table>";
	echo '<br> <button type="button"'. 'onclick="parent.right.location.href='."'taxi_feedback.php'".'"><B>Write Feedback</B></button>';
	









?>
