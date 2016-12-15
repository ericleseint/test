<?php 

class dataEducation {
	
	
	function __construct(){
		$this->dbh = new PDO('mysql:host=mysqlserveur;dbname=data_education', "root", "root");
		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	
	function prepareQuery(){
		
		$this->stmt = $this->dbh->prepare("INSERT IGNORE INTO
				data_education
				(numero_uai,localite_acheminement_uai,secteur_public_prive_libe,adresse_uai,etat_etablissement,appariement,longitude,nature_uai_libe,appellation_officielle,denomination_principale,code_postal_uai,nature_uai,record_timestamp) VALUES
				(:numero_uai,:localite_acheminement_uai,:secteur_public_prive_libe,:adresse_uai,:etat_etablissement,:appariement,:longitude,:nature_uai_libe,:appellation_officielle,:denomination_principale,:code_postal_uai,:nature_uai,:record_timestamp)");
		
		
		$this->stmt->bindParam(':numero_uai', $this->numero_uai);
		$this->stmt->bindParam(':localite_acheminement_uai',$this->localite_acheminement_uai);
		$this->stmt->bindParam(':secteur_public_prive_libe',$this->secteur_public_prive_libe);
		$this->stmt->bindParam(':adresse_uai',$this->adresse_uai);
		$this->stmt->bindParam(':etat_etablissement',$this->etat_etablissement);
		$this->stmt->bindParam(':appariement',$this->appariement);
		$this->stmt->bindParam(':longitude',$this->longitude);
		$this->stmt->bindParam(':nature_uai_libe',$this->nature_uai_libe);
		$this->stmt->bindParam(':appellation_officielle',$this->appellation_officielle);
		$this->stmt->bindParam(':denomination_principale',$this->denomination_principale);
		$this->stmt->bindParam(':code_postal_uai',$this->code_postal_uai);
		$this->stmt->bindParam(':nature_uai',$this->nature_uai);
		$this->stmt->bindParam(':record_timestamp',$this->record_timestamp);
		
		
	}
	
	function insertData($v) {
		
		$this->numero_uai=$v[fields][numero_uai];
		$this->localite_acheminement_uai=$v[fields][localite_acheminement_uai];
		$this->secteur_public_prive_libe=$v[fields][secteur_public_prive_libe];
		$this->adresse_uai=$v[fields][adresse_uai];
		$this->etat_etablissement=$v[fields][etat_etablissement];
		$this->appariement=$v[fields][appariement];
		$this->longitude=$v[fields][longitude];
		$this->nature_uai_libe=$v[fields][nature_uai_libe];
		$this->appellation_officielle=$v[fields][appellation_officielle];
		$this->denomination_principale=$v[fields][denomination_principale];
		$this->code_postal_uai=$v[fields][code_postal_uai];
		$this->nature_uai=$v[fields][nature_uai];
		$this->record_timestamp=$v[fields][record_timestamp];		
		
		$this->stmt->execute();
		
		//echo $this->numero_uai."<br>";
		
	}
	
	function recuperationSet(){
		
		$url="https://data.education.gouv.fr/api/records/1.0/search/?dataset=fr-en-adresse-et-geolocalisation-etablissements-premier-et-second-degre";
		
		// pas de récupération
		$rows=500;
		//$nbStart=0;
		//$maxSet=1;
		while ($nbStart <= $maxSet) {			
			echo "Recup : ".$nbStart."<br>";
			echo $url."&rows=".$rows."&start=".$nbStart;
			$source=json_decode(file_get_contents($url."&rows=".$rows."&start=".$nbStart),true);
			echo $source[nhits];
			if (!is_numeric($source[nhits])) {
				exit();
			}
			if ($nbStart > 10000) {
				exit();
				
			}
			if (!isset($maxSet)) {				
				$maxSet = $source[nhits];
			}
						
			foreach ($source["records"] as $k=>$v) {
			
				$this->insertData($v);
			}
			$nbStart=$nbStart+$rows;
		}
		
		
	}
	
	
}


