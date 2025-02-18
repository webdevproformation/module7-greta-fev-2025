# composer 

- outil en ligne de commande qui permet plusieurs choses dans un projet PHP
- outil qui permet de télécharger des librairies en PHP 
- (dans React npm install .....)
- dans le monde de PHP => `composer require <librairie>`
- npm install <librairie> => npmjs.com

- composer require ... https://packagist.org 
- 
- => logiciel en ligne de commande que l'on appelle des "GESTIONNAIRES DE DEPENDANCES"
- logiciel qui permet de réconcilier les logiciels installés sur votre ordinateur 
- permet de veillé QUE le logiciel / le code que vous téléchargez est COMPATIBLE AVEC VOTRE environnement de travail 


- en PHP (et dans tous les langages ) il est conseillé de découper son code en plusieurs fichiers 
- index.php 
- Controller/AbstractController.php 
- Controller/FrontController.php 
- Controller/ErreurController.php 
- ....
- Model/BDD.php 
- Vue/front/header.php
- Vue/front/home.php
- Vue/front/footer.php

et PHP on utilise `require_once(  )` *** index.php et AbstractController.php 
- require_once() => copier coller dans le fichier index.php 

=> pour les projets PRO vous avez plus 100 000 lignes de code ET réparties dans plus de 7 000 fichiers 

=> Deuxieme rôle de composer => version supérieure de  require_once() / autoloader 

=> norme PSR-4 => <https://www.php-fig.org/>
=> PSR => PHP Standards Recommendations 
=> <https://www.php-fig.org/psr/>

si je veux respecter la norme PSR-4 pour autoloader mes fichiers je dois

- utiliser concept de PHP qui s'appelle `namespace`
- utiliser les noms de dossiers (arborescence) dans le `namespace ` 

```txt
src/
   Model/
     Etudiant.php 
```

```php
<?php 
namespace App\Model ; 

class Etudiant{
}
```

- pour info : `namespace` mot clé de PHP qui a été introduit à partir de la version 7 
- après le mot `namespace` il faudra utiliser l'arborescence des dossiers du fichier