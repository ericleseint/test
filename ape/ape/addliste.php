<?php 
require("connectDB.php");
$active="addliste";
$listeName="";
$depositaireName="";
$depositaireSurname="";
$cle_name="";
if (isset($_GET['listeName'])) {

	$listeName=strtoupper($_GET['listeName']);
	if(isset($_GET['depositaireName'])) $depositaireName=ucfirst(utf8_decode(trim($_GET['depositaireName'])));
	if(isset($_GET['depositaireSurname'])) $depositaireSurname=ucfirst(utf8_decode(trim($_GET['depositaireSurname'])));
	
	if ($depositaireName && $depositaireSurname) {
	$cle_name=strtolower($depositaireName.$depositaireSurname);
	//$str = strtr($str, 'ÁÀÂÄÃÅÇÉÈÊËÍÏÎÌÑÓÒÔÖÕÚÙÛÜÝ', 'AAAAAACEEEEEIIIINOOOOOUUUUY');
	$cle_name = strtr($cle_name, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
	}
	
	$query="insert into liste (CLE,NAME,SURNAME,CLE_NAME) values ('".$listeName."','".addslashes($depositaireName)."','".addslashes($depositaireSurname)."','".addslashes($cle_name)."')";
	$dbh->exec($query);

	for ($i=1;$i<=$nbDefaultItems;$i++) {
		
		
		if ($i<10) 	$query="insert into liste_detail (CLE_ITEM,CLE,POURCENTAGE) values ('".$listeName."_0".$i."','".$listeName."','".key($pourcentage)."')";
		else $query="insert into liste_detail (CLE_ITEM,CLE,POURCENTAGE) values ('".$listeName."_".$i."','".$listeName."','".key($pourcentage)."')";
		$dbh->exec($query);
		
		
	}
	
	$query="select * from liste_detail where CLE='".$listeName."'";
	
	$sth = $dbh->prepare($query);
	$sth->execute();
	$resultat= $sth->fetchAll();
	
	
	require("tpl_addlisteDetail.php");
	
}
elseif (isset($_GET['listeItem'])) {
	
	
	foreach ($_GET['listeItem'] as $k=>$v) {
		
		if ($v != "" ) {
			$query="update liste_detail set PRIX='".preg_replace("/,/","\.",$v)."' where CLE_ITEM='".$k."'";
			$dbh->exec($query);
		}
		
		
	}
	
	
	$cle=explode("_",key($_GET['listeItem']));
	$listeName=$cle[0];
	$query="select * from liste_detail where CLE='".$listeName."'";
	
	$sth = $dbh->prepare($query);
	$sth->execute();
	$resultat= $sth->fetchAll();
	require("tpl_addlisteDetail.php");
}


else {
	
	
	require("tpl_addliste.php"); 

	
	
}

?>