Assogest
========================

1) Installation
----------------
* git clone https://github.com/mabeur/assogest/tree/master/assogest
* modifier le fichier app/parameters.yml avec les valeurs voulues ( database / google app )
* php composer.phar update
* php app/console doctrine:database:create
* php app/console doctrine:schema:update --force

2) Initialisation
-----------------
Pour l’initialisation, il faut créer un premier user et lui attribuer le role  “ROLE_ADMIN” :
* php app/console fos:user:create
* php app/console fos:user:promote

3) Pour la conf sous OVH : 
-----------------------

* le dossier sur lequel doit pointer le vhost est “web” .
* l’hébergement “perso” chez OVH est à chier, je suis entrain d’installer un symfony2 dessus et je pette les plombs

