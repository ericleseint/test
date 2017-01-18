<?php

function calculateNetVente($listeName=""){
	global $dbh;
	$netVente=array();
	//echo "<pre>";
	
	//echo "$listeName";
	
	$query="select CLE, SUM(NETVENDEUR) as NETVENDEUR, SUM(BENEFICE_APE) as BENEFICE_APE from liste_detail";
	if ($listeName) $query.=" where CLE='".$listeName."'";
	$query.=" GROUP BY CLE";
	$sth = $dbh->prepare($query);
	$sth->execute();
	$resultat= $sth->fetchAll();
	 
	//print_r($resultat);

	
	foreach ($resultat as $k=>$v) {
		
		$netVente['TOTAL'][$v['CLE']]['NETVENDEUR']=$v['NETVENDEUR'];
		$netVente['TOTAL'][$v['CLE']]['BENEFICE_APE']=$v['BENEFICE_APE'];
				
	}
	/*echo "<pre>";
	print_r($netVente);
	echo "</pre>";*/
	
	return $netVente;
}