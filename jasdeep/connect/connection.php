<?php
$host="localhost";
$db="jsdp";
$user="admin";
$pwd="toiohomai1234";

$dsn="mysql:host=$host; dbname=$db";
try
{
    $conn= new PDO($dsn,$user,$pwd);
}
catch(PDOException $error)
{
echo "<h3> Error </h3>" . $error->getMessage(); 
}

$selectall="select * from products ";
	$record=$conn->prepare($selectall);
	$record->execute();

?>
