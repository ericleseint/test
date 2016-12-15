<?php 
ini_set('memory_limit','-1');
echo "<pre>";
//$link = mysql_connect("localhost", "mysql_user", "mysql_password") or die("Impossible de se connecter : " . mysql_error());
//$conn = new mysqli_connect($servername, $username, $password);
//$conn = new PDO("mysql:host=mysqlserveur;dbname=myDB", $username, $password);

//$source=json_decode(file_get_contents("data/data_education.json"),true);

require("dataeducation.class.php");
$dataeducation = new dataEducation();
$dataeducation->prepareQuery();
//$dataeducation->recuperationSet();
//exit();
$source=json_decode(file_get_contents("data/data_education.json"),true);

//$test=print_r($source,true);
//file_put_contents("source.txt",$test);
//exit();
//echo $test;

//print_r($source["fields"]);
foreach ($source as $k=>$v) {

	$dataeducation->insertData($v);
}




