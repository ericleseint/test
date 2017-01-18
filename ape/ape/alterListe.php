<?php 
require("connectDB.php");
$active="alterliste";
$listeName="";
$depositaireName="";
$depositaireSurname="";
$cle_name="";
if (!isset($_GET['listeName'])) {


	$query="select * from liste order by CLE asc";
	
	$sth = $dbh->prepare($query);
	$sth->execute();
	$resultat= $sth->fetchAll();
	
	require("tpl_alterListe.php");
	
}

?>