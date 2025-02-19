# Installation :
- xamp (php 8.2 ou 8.3)
- composer (https://getcomposer.org/)
- symfony cli (https://symfony.com/download)


# Composer 
- Télécharger les librairies (https://packagist.org/)
- Autoloader (super reaquire)


# namespace

```php
<?php 
namespace App; //Le systeme d'autoload de composer utilise les namespace

// symfony utilise composer pour sont autoload OBLIGATOIRE


class Etudiant {
    public $nom = "Alain";
}
``` 

# YAML (fichiers qui contienne des valeurs de type tableau)

Format de partage d'information notament comme le JSON ou du XML

```yaml
nom: Alain
age: 20
texte: > texte
        texte
        texte
tableau: [Jasmin, Tulipe, Rose ]
tableau2: 
    
Jasmin
Rose
Tulipe
tableau_associatif:
    rue: 75 rue de Paris
    code_postal: 75500
    ville: Paris

# commentaire 
```