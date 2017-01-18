# Fonctionnement cyber / hébergement


# APIs hébergement BCDI

```
https://api.hebergement
```
## Etat de l'avancement de l'hébergement

```
GET /clients/V1/{RNE}
```

### Paramètres

| Nom  			| Type           | Description  |
| ------------- |:-------------:| -----:|
| RNE      | string | code RNE de l'établissement |


### Réponse
* l'établissement n'existe pas
```
Status : 404 Resource not found
Content-Type: text/json
```

```
{
  "error": "non créé",
  "error_description": "l'établissement n'existe pas",
  "error_uri": "#"
}
```
* l'établissement existe
```
Status : 200 OK
Content-Type: text/json
```

```
{
  "status": "TO_CREATE",
  "status_description": "l'établissement est en cours de création"
}
```
```
{
  "status": "CREATED",
  "status_description": "l'établissement est créé, l'upload des bases est possible"
}
```

```
{
  "status": "TO_OPEN",
  "status_description": "le service va être ouvert"
}
```
```
{
  "status": "OPENED",
"status_description": "le service est prêt à être utilisé",
  "URL": "nom de l'hote",
  "PORT": "port de communication",
	...
}
```
```
{
  "status": "TO_ALTER",
  "status_description": "les informations établissement sont en cours de modification"
}
```
```
{
  "status": "TO_CLOSE",
  "status_description": "le service va être fermé "
}
```
```
{
  "status": "CLOSED",
  "status_description": "le service est fermé"
}
```
```
{
  "status": "TO_DELETE",
  "status_description": "L'hébergement est en cours de suppression"
}
```
```
{
  "status": "DELETED",
  "status_description": "L'hébergement est supprimé",
   "URL" : "{url des données à télécharger}"
}
```

## Création de l'hébergement
```
POST /clients/V1/{RNE}
```

### Paramètres

| Nom  			| Type           | Description  |
| ------------- |:-------------:| -----:|
|Authorization| string | token |
| RNE      | string | code RNE de l'établissement |
| GRIFFE| string | griffe d'installation de BCDI |
| CODE      | string | code d'installation de BCDI |
| TYPE_VERSION      | string | Version de BCDI à installer (CL/SP) |
| AGRICOLE      | string | Etablissement agricole 0 / 1 |


```
Status : 202 Accepted
Content-Type: text/json
```
```
{
  "status": "TO_CREATE",
  "status_description": "l'établissement est en cours de création"
}
```


## Modification de l'hébergement
_Cas d'un changement de griffe, changement de version_
```
PUT /clients/V1/{RNE}
```

### Paramètres

| Nom  			| Type           | Description  |
| ------------- |:-------------:| -----:|
|Authorization| string | token |
| RNE      | string | code RNE de l'établissement |
| GRIFFE| string | griffe d'installation de BCDI |
| CODE      | string | code d'installation de BCDI |
| TYPE_VERSION      | string | Version de BCDI à installer (CL/SP) |
| AGRICOLE      | string | Etablissement agricole 0 / 1 |

```
Status : 202 Accepted
Content-Type: text/json
```
```
{
  "status": "TO_ALTER",
  "status_description": "les informations établissement sont en cours de modification"
}
```

## On ouvre ou on ferme le port de communication
_Cas de fermeture du service en cas d'abonnement périmé_
```
PATCH /clients/V1/{RNE}
```

### Paramètres

| Nom  			| Type           | Description  |
| ------------- |:-------------:| -----:|
|Authorization| string | token |
| RNE      | string | code RNE de l'établissement |
| STATE| string | (OPEN/CLOSE) |

```
Status : 202 Accepted
Content-Type: text/json
```
```
{
  "status": "TO_CLOSE",
  "status_description": "les service va être fermé"
}
```
```
{
  "status": "TO_OPEN",
  "status_description": "le service va être ouvert"
}
```


## Suppression de l'hébergement
```
DELETE /clients/V1/{RNE}
```

### Paramètres

| Nom  			| Type           | Description  |
| ------------- |:-------------:| -----:|
|Authorization| string | token |
| RNE      | string | code RNE de l'établissement |

### Réponse
```
Status : 202 Accepted
Content-Type: text/json
```
```
{
  "status": "TO_DELETE",
  "status_description": "L'hébergement va être supprimé"
}
```

## Etat de l'upload des bases BCDI
_on propose de 1 à X téléchargement, durant cette phase, il peut changer d'avis c'est à chaque fois l'état en cours qui fait foi_

_4 états, UPLOADED : présent mais jamais joué, INSTALLED  : présent, joué, validé, ERROR : présent, joué, en erreur, TO_DELETE : en cours de suppression _

```
GET /databaseBCDI/V1/{RNE}/
```
### Paramètres

| Name        | Type           | Description  |
| ------------- |:-------------:| -----:|
| RNE      | string | RNE de l'établissement |


### Réponse


```
Status: 200 OK
Content-Type: text/json
```
```
{"databaseBCDI":{"1":{"state":"UPLOADED","name":"Principale"},"2":{"state":"INSTALLED","name":"manuel"},"3":{"state":"ERROR","name":"test"}}}
```

## Uploader une base BCDI

```
POST /databaseBCDI/V1/{RNE}/{id}
```
### Paramètres

| Name        | Type           | Description  |
| ------------- |:-------------:| -----:|
|Authorization| string | token |
| RNE      | string | RNE de l'établissement |
| id | integer | numéro auto-incrément |
| nombase| string | nom usuel de la base |
| binaire | binary | flux binaire du fichier |

### Réponse

#### la base est correctement uploadée

```
Status: 200 OK
Content-Type: text/json
```
```

{"databaseBCDI":{"1":{"state":"UPLOADED","name":"Principale"}}}

```
_note : dans le cas d'une base déjà existante, on force la MAJ de la base en réalisant un nouveau POST_


## Supprimer une base BCDI précédemment uploadée
_ne se fait que quand le statut de la base est UPLOADED ou INSTALLED
```
DELETE /databaseBCDI/V1/{RNE}/{id}
```
### Paramètres

| Name        | Type           | Description  |
| ------------- |:-------------:| -----:|
|Authorization| string | token |
| RNE      | string | RNE de l'établissement |
| id | integer | numéro de l'upload à supprimer |


### Réponse

```
Status: 200 OK
Content-Type: text/json
```
```
{"databaseBCDI":{"1":{"state":"TO_DELETE","name":"Principale"}}}
```

## Modifier une base BCDI précédemment uploadée
```
PUT /databaseBCDI/V1/{RNE}/{id}
```
### Paramètres

| Name        | Type           | Description  |
| ------------- |:-------------:
| -----:|
|Authorization| string | token |
| RNE      | string | RNE de l'établissement |
| id | integer | numéro de l'upload à modifier |
| nombase| string | nom usuel de la base |
| binaire | binary | flux binaire du fichier |



### Réponse

#### la base est correctement uploadée

```
Status: 200 OK
Content-Type: text/json
```
```
{
{"databaseBCDI":{"1":{"state":"UPLOADED","name":"Principale"}}}
}
```

## Valider la mise en production des bases précédemment uploadées
_note : dès qu'au moins un upload est valide, on peut proposer à l'établissement de mettre en production ces bases (techniquement elles le sont déjà) et d'indiquer quelle est la base qui est exportable vers esidoc_

```
POST /databaseBCDI/V1/{RNE}/accept/{id}
```
### Paramètres

| Name        | Type           | Description  |
| ------------- |:-------------:| -----:|
|Authorization| string | token |
| RNE      | string | RNE de l'établissement |
| id | integer | id de la base qui sera la base exportée vers esidoc |


### Réponse

```
Status: 200 OK
Content-Type: text/json
```
```

{"databaseBCDI":{"1":{"state":"INSTALLED","name":"Principale"}}}

```


## Création d'un token pour les appels PUT/POST/DELETE
_note : pour sécuriser les appels PUT/POST/DELETE. **cette appel doit être également sécurisé en s'asurant que seul la cyberlibrairie est en mesure de le réaliser.**

```
GET /createToken/V1/{RNE}
```
### Paramètres

| Name        | Type           | Description  |
| ------------- |:-------------:| -----:|
| RNE      | string | RNE de l'établissement |


### Réponse

```
Status: 200 OK
Content-Type: text/json
```
```

{
  "token": "AAAAAAAAAAAAAAAAAA"
}

```



