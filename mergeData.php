<?php 

$dbh = new PDO('mysql:host=mysqlserveur;dbname=data_education', "root", "root");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query="select * from data_education where numero_uai not '' order by numero_uai";

foreach  ($dbh->query($query) as $row) {
	print_r($row);
	exit();
}



?>