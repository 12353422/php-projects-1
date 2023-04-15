<?php 

error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR | E_PARSE);

$conn=mysqli_connect("localhost","root","","smartpgdb");

if(!$conn)
{
	echo "Connection Failed. " . mysqli_connect_error();
}

?>