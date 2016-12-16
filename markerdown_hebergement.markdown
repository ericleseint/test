# Fonctionnement cyber / hébergement

## Etape 1, on initialise le dialogue entre les services

### CYBER > API tierce en mode "GET".
#### L'établissement n'existe pas

* L'API retourne une 404. 
* on créé l'établissement avec un appel POST


#### L'établissement existe

* L'API retourne une 200.
* retour, sous format JSON de l'état de déploiement de l'état de déploiement (code chiffre ci dessous) 

### CYBER > API tierce en mode POST
* on fourni les informations suivantes 
	+ RNE
	+ griffe
	+ code
	+ type de version (CL ou SP).
* on sécurise l'accès à cette fonction de l'API (cette clé ne sera connue que de la cyberlibrairie et ne sera jamais publiée sur le web).
* l'API nous retourne 200 en cas de réussite, 404 en cas d'échec.
* en cas de réussite, l'api fourni une clé de type hash, unique à l'établissement. 
* cette clé est stockée côté cyberlibrairie et servira dans les échanges entres les plates formes.
## Etape 2, traitement des différentes étapes

### Liste des étapes et code retour
* l'établissement est créé
	+ code retour : **START**	
* l'établissement est créé, le serveur BCDI est installé, on attend les bases de données
	+ code retour : **BCDIDBWAIT**
* les bases sont uploadées, elles sont en attente de traitement
	+ code retour : **BCDIDBUPLOADED**	
* les bases sont uploadées, elles ont bien été montées
	+ code retour : **BCDIDBUPLOADEDRIGHT**	
* les bases uploadées sont installables
	+ code retour : **BCDIREDADY**
	+ information sur l'interconnexion
* modification des informations établissement (griffe, code ...)
	+ code retour **BCDIALTER**
* demande de suppression de l'hébergement BCDI 
	+ code retour **BCDIDELETE**
* supression effective du serveur BCDI
	+ code retour **BCDIDELETED**
	+ liens pour télécharger les bases BCDI
* erreur dans la création de l'installation
	+ code retour : **STARTERROR**
* erreur dans la récupération des données uploadées
	+ code retour : **BCDIUPLOADEDERROR**
* ...
### Traitement
#### cas START

* Côté CYBER : on indique à l'établissement que la création est en cours
* on lui indique qu'il peut consulter l'état d'avancement
* on lui indique qu'il sera notifié quand la création du BCDI sera opérationnelle
#### cas BCDIDBWAIT

* Côté CYBER : on indique qu'il peut uploader les pages.
* Côté CYBER : création d'une iframe, minimaliste permettant d'uploader plusieurs bases à la fois. 
* Côté SERVICE TIERS : on sécurise l'accès à la page avec les informations suivantes : RNE + CLE transmise par le service tiers au moment de la création de l'établissement. 
* Côté SERVICE TIERS : on propose d'uploader plusieurs fichiers, le premier fichier correspondant à la base principale.


#### cas BCDIDBUPLOADED

Côté CYBER : on indique à l'établissement que le montage des bases est en cours, on lui affiche le temps avant mise à disposition

#### cas BCDIREDADY 

Côté CYBER : on l'informe que le serveur BCDI est opérationnel, on lui affiche les informations nécessaires à la connexion, on lui propose de télécharger un client BCDI.

#### cas STARTERROR 

?

#### cas BCDIUPLOADEDERROR 

**quel va être la reprise sur incident ?**

# Notification aux établissements 

Côté CYBER on stock le timestamp lors de la réalisation des étapes. Périodiquement (tlj ?), on contrôle l'information. Si l'étape suivante est disponible, on génère une alerte mail à l'établissement.

# Mise à jour des informations établissement
* Appel de l'API en mode PUT depuis le backoffice client
* retour de l'API **BCDIALTER**
* quand la modification est effective, on se trouve en état **BCDIREADY**

# Suppression d'un hébergement
* Appel de l'API en mode DELETE depuis le backoffice client
* retour de l'API **BCDIDELETE**
* quand la suppression est réalisée, retour **BCDIDELETED**, on propose le téléchargement des bases BCDI.



