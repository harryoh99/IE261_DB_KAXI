<?php
	session_start();
    $servername = 'localhost';
    $username = 'root';
    $pw = '1234';
    $db = 'kaxi';
	
	
	$conn = mysqli_connect($servername, $username, $pw, $db) or die ('MySQL connect failed');

	$id= $_SESSION['ID'];
	$text=$_POST['text'];
	$rate=$_POST['rating'];
	
	
	
	if($text!=' ') {
		$sql= "insert into feedbackTaxitbl(userid,rating,feedback) values";
		$sql= $sql."('$id','$rate','$text');";
		$result=mysqli_query($conn,$sql);
					
		if($result){
			echo '<script type="text/javascript">alert("Successfully Saved"); location.replace("taxi_feedback_list.php");</script>';
		}
		else{
			echo '<script type="text/javascript">alert("Save fail"); location.replace("taxi_feedback.php");</script>';
		}
	}
	else{
		echo '<script type="text/javascript">alert("fill the content!!"); location.replace("taxi_feedback.php");</script>';}
	
	


?>
