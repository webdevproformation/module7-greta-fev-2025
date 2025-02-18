# Symfony 

=> framework => librairie ET manière de faire (MVC)

=> dans Symfony retrouver 
- MVC
- Base de données
- ...
- solution PRO pour créer des sites internet

# installer Symfony sur notre ordinateur 

- !!! l'installation dépend du Système d'exploitation de la machine

1. installer PHP en ligne de commande (version 8.2)
2. installer composer (autre outil en ligne de commande)
3. installer symfony-cli (autre outil en ligne de commande)

la manière d'installer ces logiciels dépend de votre OS
par contre l'ordre ne change pas 

## Linux 

### installer PHP

- terminal la commande suivante = `php -v`
- sudo su 
- apt install php libapache2-mod-php

### installer composer 

- https://getcomposer.org/
- php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
- php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }"
- php composer-setup.php
- php -r "unlink('composer-setup.php');"
- sudo mv composer.phar /usr/local/bin/composer

### installer symfony-cli

- https://symfony.com/download
- curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash
- sudo apt install symfony-cli

## dernière verif 

```sh
php -v
composer -v
symfony -v
```
