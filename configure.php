<?php
    $host = 'dbinnovationlight.mysql.database.azure.com';
    $username = 'InnovationLight@dbinnovationlight';
    $password1 = '1nnovationLight';
    $db_name = 'testdata';
    
//Establishes the connection//
	$conn = mysqli_init();
	mysqli_real_connect($conn, $host, $username, $password1, $db_name, 3306);
	if (mysqli_connect_errno($conn)) {
	die('Failed to connect to MySQL: '.mysqli_connect_error());
	}
	echo "Connected successfully!\n";
?>
