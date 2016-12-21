
```
clients/V1/{RNE}
```
# APIs d'upload des bases de données
```
databaseBCDI/V1
```
## consulter le nombre de bases pouvant être uploadées
```
GET /init/{RNE}/
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
  "nombrebases": "3"
}
```

```
Status: 403 FORBIDDEN
Content-Type: text/json
```
```
{
  error:"Upload de base impossible"
}
```
#### Dans le cas où rien n'a été initialisé, on retourne le nombre de bases max possibles
```
Status: 404 NOT FOUND
Content-Type: text/json
```
```
{
  error:"pas d'initialisation réalisé",
  nombredebasesmax:"XXX"
}
```
## initialisation du nombre de bases à uploader
```
POST /init/{RNE}/{nombrebases}
```
### Paramètres

| Name        | Type           | Description  |
| ------------- |:-------------:| -----:|
| RNE      | string | RNE de l'établissement |
| nombrebases      | number | nombre de bases à uploader |


### Réponse
```
Status: 200 OK
Content-Type: text/json
```
```
{
}
```
#### dans le cas ou le nombre fourni n'est pas cohérent avec le nombre max
```
Status: 403 FORBIDDEN
Content-Type: text/json
```
```
{
  error:"nombre de bases supérieur au nombre de bases max"
}
```
## modification du nombre de bases à uploader
```
PUSH /init/{RNE}/{nombrebases}
```
### Paramètres

| Name        | Type           | Description  |
| ------------- |:-------------:| -----:|
| RNE      | string | RNE de l'établissement |
| nombrebases      | number | nombre de bases à uploader |


### Réponse
```
Status: 200 OK
Content-Type: text/json
```
```
{
}
```
## réinitialisation
```
DELETE /init/{RNE}
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
}
```
## consulter le détail d'une base à uploader
```
GET /databaseBCDI/{RNE}/{numero}
```
### Paramètres

| Name        | Type           | Description  |
| ------------- |:-------------:| -----:|
| RNE      | string | RNE de l'établissement |
| numero | integer | numéro de la base |

### Réponse

#### la base est correctement uploadée
```
Status: 200 OK
Content-Type: text/json
```
```
{
}
```

#### la base n'a jamais été uploadée
```
Status: 404 NOT FOUND
Content-Type: text/json
```
```
{
}
```

#### la base n'est pas compatible avec BCDI
```
Status: 403 FORBIDDEN
Content-Type: text/json
```
```
{
}
```

## uploader une base BCDI 
```
POST /databaseBCDI/{RNE}/{numero}
```
### Paramètres

| Name        | Type           | Description  |
| ------------- |:-------------:| -----:|
| RNE      | string | RNE de l'établissement |
| numero | integer | numéro de la base |
| binaire | binary | flux binaire du fichier |

### Réponse

#### la base est correctement uploadée

```
Status: 200 OK
Content-Type: text/json
```
```
{
}
```
_note : dans le cas d'une base déjà existante, on force la MAJ de la base en réalisant un nouveau POST_


## supprimer une base BCDI précédemment uploadé 
```
DELETE /databaseBCDI/{RNE}/{numero}
```
### Paramètres

| Name        | Type           | Description  |
| ------------- |:-------------:| -----:|
| RNE      | string | RNE de l'établissement |
| numero | integer | numéro de la base |


### Réponse

#### la base est correctement uploadée

```
Status: 200 OK
Content-Type: text/json
```
```
{
}
```
```
## consulter l'état global des transferts 
```
GET /databaseBCDI/{RNE}/
```
### Paramètres

| Name        | Type           | Description  |
| ------------- |:-------------:| -----:|
| RNE      | string | RNE de l'établissement |


### Réponse

#### état des transferts
```
Status: 200 OK
Content-Type: text/json
```
```
{
tableau du nombre de bases attentues avec l'état de chacune de ces bases.
}
```



GET etat de la base
DELETE : suppression de la base uploadée
databaseBCDI/V1/state/{RNE}/{number}
GET : état des transfert
	nombre de bases attendues
	nombre de bases transférées
	nombre de base correctes
	
