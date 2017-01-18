<?php 

$active=""; 
require("connectDB.php");
require("functions.inc.php");
echo "<pre>";

$query="select cle_item,prix from liste_detail where vendu=1";

$sth = $dbh->prepare($query);
$sth->execute();
$resultat= $sth->fetchAll();
foreach ($resultat as $k=>$v) {
	//$netvendeur="";
	
	$netvendeur=round(($v["prix"]*75/100),2);
	$benef=$v["prix"]-$netvendeur;
	echo "update liste_detail set NETVENDEUR='$netvendeur',BENEFICE_APE='$benef' where CLE_ITEM='".$v["cle_item"]."';\n";
	
	//print_r($v);
	
}
