# synthese

- dans le monde de PHP il est possible de télécharger des librairies de la communauté (de très bonne qualité) avec `composer`
- pour installer / télécharger une librairie 
    1. `cd <nom_dossier>` (choisir le dossier OU vous voulez utiliser la librairie)
    2. `composer require <nom/librairie>`
    3. le site internet qui permet de trouver une librairie (et la commande d'installation) <packagist.org>

- utiliser la librairie
    1. créer un fichier .php 
    2. `require_once  "vendor/autoload.php"` 
    3. YAML::parseFile()
    4. Carbon::createFromDate()
    5. enfin attention les librairies sont stockées dans des namespace
        1. use Carbon\Carbon;
        1. use Symfony\Component\Yaml\Yaml;
    6. rappel => les namespace sont utilisés par composer pour l'autoload 

- chaque librairie bien faite dispose d'un mode d'emploi
    - <https://carbon.nesbot.com>
    - <https://symfony.com/doc/current/components/yaml.html>
