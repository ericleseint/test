<?php 

$active=""; 
require("connectDB.php");
require("functions.inc.php");
$nbListe=0;
$nbPers=0;
$BENEFICE_APE=0;
$PRIX=0;
$OBJETS=0;
$ListeA2euros=0;
$LISTE_PAYANTE=array();
$listeVendeurInfo=array();
$query="select count(CLE) as NbListe from liste";

$sth = $dbh->prepare($query);
$sth->execute();
$resultat= $sth->fetchAll();
$nbListe=$resultat[0]['NbListe'];

$query="SELECT COUNT(distinct(CLE_NAME)) as nbPers from liste";

$sth = $dbh->prepare($query);
$sth->execute();
$resultat= $sth->fetchAll();
$nbPers=$resultat[0]['nbPers'];

$query="SELECT SUM(BENEFICE_APE) as BENEFICE_APE,SUM(PRIX) as PRIX from liste_detail";

$sth = $dbh->prepare($query);
$sth->execute();
$resultat= $sth->fetchAll();

$BENEFICE_APE=$resultat[0]['BENEFICE_APE'];
$PRIX=$resultat[0]['PRIX'];

$query="SELECT count(CLE_ITEM) as OBJETS from liste_detail where PRIX != '0.00'";

$sth = $dbh->prepare($query);
$sth->execute();
$resultat= $sth->fetchAll();

$OBJETS=$resultat[0]['OBJETS'];

$query="SELECT count(CLE_ITEM) as OBJETSVENDUS from liste_detail where PRIX != '0.00' and VENDU=1";

$sth = $dbh->prepare($query);
$sth->execute();
$resultat= $sth->fetchAll();

$OBJETSVENDUS=$resultat[0]['OBJETSVENDUS'];

$query="SELECT CLE,LISTE_PAYANTE from liste";
$sth = $dbh->prepare($query);
$sth->execute();
$resultat= $sth->fetchAll();


foreach ($resultat as $k=>$v) {
	
	if ($v['LISTE_PAYANTE'] == 1) $ListeA2euros++;
	$LISTE_PAYANTE[$v['CLE']]=$v['LISTE_PAYANTE'];
}
//echo $ListeA2euros;
//print_r($LISTE_PAYANTE);
$netvente = calculateNetVente();

$query="select * from liste ORDER BY name, surname";

$sth = $dbh->prepare($query);
$sth->execute();
$resultat= $sth->fetchAll();

//print_r($resultat);




foreach ($resultat as $k=>$v) {
	$listeVendeurInfo[$v['CLE_NAME']]=strtoupper($v['NAME']." ".$v['SURNAME']);
	if(isset($netvente['TOTAL'][$v['CLE']]['NETVENDEUR'])) $listeVendeur[$v['CLE_NAME']][$v['CLE']]=$netvente['TOTAL'][$v['CLE']]['NETVENDEUR'];
	else $listeVendeur[$v['CLE_NAME']][$v['CLE']]="0.00";
}
/*print_r($netvente);
print_r($listeVendeurInfo);
print_r($listeVendeur);*/
require("tpl_index.php");


?>