<?php
$databaseHost = 'localhost';
$databaseName = 'ajaxpost';
$databaseUsername = 'root';
$databasePassword = '';
 
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
if(mysqli_connect_errno())
{
	echo "failed to connect to mysql";
	mysqli_connect_errno();
}
?>