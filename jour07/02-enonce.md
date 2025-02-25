# Enoncé

- par groupe de 2 ou 3 vous allez réaliser le projet suivant 

1. créer un nouveau projet Symfony intitulé jour07-tp
1. vous devez réaliser une site internet de type blog avec les pages suivantes :
    1. page d'accueil => affiche tous les articles de la table articles
    2. page de présentation => qui présente le groupe qui crée ce site
    3. page mention légale => page contenant les conditions d'utilisation du site 
    4. page de connexion => page qui contient un formulaire avec deux champs : login / password (pour l'instant ce n'est que du HTML)

2. ce site internet utilise une base de données Sqlite contenant 1 table "articles"
3. cette table contient les colonnes suivantes 
    1. id INT Primary Key Autoincrément
    2. titre texte avec un max de 255 caractères
    3. url_img texte avec un max de 255 caractères
    4. description texte de 65 000 caractères
    5. duree chiffre entier strictement supérieur à 0 et sa valeur par défaut est 1
    6. auteur texte avec un max de 255 caractères
    7. dt_creation DATETIME avec la date de maintenant par défaut 

Pour la création des articles utiliser SQL et SQLite pour créer 10 articles avec le contenu de votre choix 

Vous avez carte blanche pour la mise en page du site internet 

(Bonus)
4. mettre en place une page "admin" dans laquelle vous avez la possibilité de supprimer un article via son id  