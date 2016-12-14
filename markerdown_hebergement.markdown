# Fonctionnement cyber / hébergement

##Etape 1, on initialise de dialogue entre les services

###CYBER > API tierce en mode "GET".
####L'établissement n'existe pas

* L'API retourne une 404. 
* on créé l'établissement avec un appel POST


####L'établissement existe

* L'API retourne une 200.
* retour, sous format JSON de l'état de déploiement de l'état de déploiement (code chiffre ci dessous) avec une date d'execution pour la réalisation de l'étape (par exemple, on retourne 1 et une timestamp pour dire quand l'étape 2 sera disponible).

###CYBER > API tierce en mode POST
* on fourni les informations suivantes 
	+ RNE
	+ griffe
	+ code
	+ type de version (CL ou SP).
* on sécurise l'accès à cette fonction de l'API (cette clé ne sera connue que de la cyberlibrairie et ne sera jamais publiée sur le web).
* l'API nous retour 200 en cas de réussite, 404 en cas d'échec.
* en cas de réussite, l'api fourni une clé de type hash, unique à l'établissement. 
* cette clé est stockée côté cyberlibrairie et servira dans les échanges entres les plates formes.
##Etape 2, traitement des différentes étapes

###Liste des étapes et code retour
* l'établissement est créé
	+ code retour : 1
	+ timestamp (réalisation tache suivante)
* l'établissement est créé, le serveur BCDI est installé, on attend les bases de données
	+ code retour : 2
* les bases sont uploadées, elles sont en attente de traitement
	+ code retour : 3
	+ timestamp (réalisation tache suivante)
* les bases sont uploadées, elles ont bien été montées
	+ code retour : 4
	+ information sur l'interconnexion
* erreur dans la création de l'installation
	+ code retour : E1
* erreur dans la récupération des données uploadées
	+ code retour : E2
* ...
###Traitement
####cas "1"

Côté CYBER : on indique à l'établissement que la création est en cours, on lui affiche le temps avant mise à disposition
####cas "2"

* Côté CYBER : on indique qu'il peut uploader les pages.
* Côté CYBER : création d'une iframe, minimaliste permettant d'uploader plusieurs bases à la fois. 
* Côté SERVICE TIERS : on sécurise l'accès à la page avec les informations suivantes : RNE + CLE transmise par le service tiers au moment de la création de l'établissement. 

#### cas "3"

Côté CYBER : on indique à l'établissement que le montage des bases est en cours, on lui affiche le temps avant mise à disposition

#### cas "4" 

Côté CYBER : on l'informe que le serveur BCDI est opérationnel, on lui affiche les informations nécessaires à la connection, on lui propose de télécharger un client BCDI.

####cas E1 

?

####cas E2 


?

#notification aux établissements 
stockage du timestamp.