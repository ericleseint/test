# Ajouter des extensions à php par défaut

on créé un fichier *Dockerfile*

on veut ajouter pdo

```
FROM php:5.6.28-apache

RUN docker-php-ext-install pdo pdo_mysql
```

on décide d'appeler l'image *phpextend*

on créé l'image
```
docker built -t phpextend .
```

on lance le conteneur

```
docker run -d -p 80:80 --name glpi -v /c/Users/eric.leseint/developpement/docker/glpi:/var/www/html/ --link mysqlserver:db phpextend
```