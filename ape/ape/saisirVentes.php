<?php 
require("connectDB.php");
require("functions.inc.php");
$active="saisirventes";
$listeName="";
$depositaireName="";
$depositaireSurname="";
$cle_name="";
$LISTE_PAYANTE="";
$NB_VENDU=0;

if (!isset($_GET['listeName'])) {


	$query="select * from liste order by CLE asc";
	
	$sth = $dbh->prepare($query);
	$sth->execute();
	$resultat= $sth->fetchAll();
	
	require("tpl_saisirventes.php");
	
}
else {
	/*echo "<pre>";
	print_r($_GET);
	echo "</pre>";*/
	
	if (isset($_GET['validateForm'])) {
		
		$query="select CLE_ITEM,PRIX from liste_detail where CLE='".$_GET['listeName']."'";
		
		$sth = $dbh->prepare($query);
		$sth->execute();
		$resultat= $sth->fetchAll();
		
		foreach ($resultat as $k=>$v) {
			$VENDU=0;
			$POURCENTAGE=key($pourcentage);
			$PERDU=0;
			$NETVENDEUR=0;
			$BENEFICE_APE=0;
			
			
			if (isset($_GET['vendu'][$v['CLE_ITEM']])) $VENDU=1;
			if (isset($_GET['perdu'][$v['CLE_ITEM']])) $PERDU=1;
			if (isset($_GET['pourcentage'][$v['CLE_ITEM']])) $POURCENTAGE=$_GET['pourcentage'][$v['CLE_ITEM']];
			
			if ($VENDU == 1 or $PERDU == 1) {
				$NETVENDEUR=$v['PRIX']-($v['PRIX']*$POURCENTAGE/100);
				$BENEFICE_APE=$v['PRIX']-$NETVENDEUR;
			}
			
			if ($PERDU == 1) {				
				$VENDU=0;
				$POURCENTAGE=key($pourcentage);
				$BENEFICE_APE=0-$NETVENDEUR;
			}
			
			// définition du nombre de vendu
			
			$NB_VENDU=$NB_VENDU+$VENDU;
			
			
			$query="update liste_detail set VENDU='".$VENDU."', POURCENTAGE='".$POURCENTAGE."',PERDU='".$PERDU."',NETVENDEUR='".$NETVENDEUR."',BENEFICE_APE='".$BENEFICE_APE."' where CLE_ITEM='".$v['CLE_ITEM']."'";
			$dbh->exec($query);
			//echo $query."<br>";
		}
		if ($NB_VENDU == 0) $LISTE_PAYANTE=0;
		else {
			if ($_GET['listePayante'] == 1) $LISTE_PAYANTE=1;
			else $LISTE_PAYANTE=0;
		}
		$query="update liste set LISTE_PAYANTE='".$LISTE_PAYANTE."' WHERE CLE='".$_GET['listeName']."'";
		$dbh->exec($query);
		//echo $query;
		
		
		
	}
	
	
	
	if (!isset($_GET['listeDetail'])) {
		
		// recherche si la liste est payante
		
		$query="select LISTE_PAYANTE from liste where CLE='".$_GET['listeName']."'";
		
		$sth = $dbh->prepare($query);
		$sth->execute();
		$resultat= $sth->fetchAll();
		
		$LISTE_PAYANTE=$resultat[0]['LISTE_PAYANTE'];
		
		
		
		
		$query="select * from liste_detail where CLE='".$_GET['listeName']."'";
		
		$sth = $dbh->prepare($query);
		$sth->execute();
		$resultat= $sth->fetchAll();
		
		
		$netvente = calculateNetVente($_GET['listeName']);
		//echo "<hr>";
		//print_r($netvente);
		
		
		require("tpl_saisirventesDetail.php");
		/*echo "<pre>";
	print_r($resultat);
	echo "</pre>";*/
	}
	
	
	
	
}

?>