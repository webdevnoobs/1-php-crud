<?php
	$username  = 'root';
	$password = 'mysql';
    $dbname = 'contact_manager';
	try {
		$connection = new PDO('mysql:host=localhost;dbname='.$dbname.';',$username,$password);
		$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}catch (PDOException $e) {
		print "Connection error : " . $e->getMessage() . "<br/>";
		die();
	}
?>