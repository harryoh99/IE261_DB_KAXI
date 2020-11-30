<?php

echo "<HEAD><TITLE> Feedbacklist </TITLE></HEAD>";
	echo "<H2> &nbsp; Feedbacklist </H2>";	
		
	echo "<TABLE border=1 width = '1000' align='center'>";
	echo "<TR allign='center'>";
	echo "<TD>", "feedbackNumber","</TD>";
	echo "<TD>", "userid","</TD>";
	echo "<TD>", "rate","</TD>";
	echo "<TD>", "feedback content","</TD>";
	echo "</TR>";
	
$servername = "localhost:3306";
$username = "root";
$password = "1234";
$dbname = "kaxi";
	
// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");

$sql = "SELECT * from feedbacktbl";

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
	
	









?>
