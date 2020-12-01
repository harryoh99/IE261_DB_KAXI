<?php
	$servername = 'localhost';
	$username = 'root';
	$pw = '1234';
    $db = 'kaxi';
    $type = $_POST['type'];
    if($type =='ToKaist'){
        $dest = $_POST['INKAIST'];
        $depart = $_POST['OUTKAIST'];
    }

    else if($type == 'FromKaist'){
        $dest = $_POST['OUTKAIST'];
        $depart = $_POST['INKAIST'];
    }
    $date = $_POST['Date'];


?>

<html>

</html>