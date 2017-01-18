<?php 


require("contact_simple.php");
exit();


if (isset($_POST["submit"])) {
	
	if ($_POST["userName"]== "") $erreur["userName"]="obligatoire";
	if ($_POST["userEmail"]== "") {
		$erreur["userEmail"]="obligatoire";
	}else {
		
		if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
			$erreur["userEmail"]="invalide";
		}
		
		
		
		
		
	}
	if ($_POST["userMsg"]== "") $erreur["userMsg"]="obligatoire";
	
	
	
	
}





if (!$_POST){
	require("contact_formulaire.php");
}
elseif (isset($erreur)) {
	require("contact_formulaire.php");
}
else {
	
	
	require("contact_formulaire_envoye.php");
}



?>