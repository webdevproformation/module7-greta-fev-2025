## première liste de commandes 

### créer un projet

```sh
symfony new <projet> --webapp
```

### démarrer le serveur de dev

```sh
cd <projet>
symfony serve 
```

### créer une base de données

- modifier le fichier .env => activer le type de base de données 

```sh
symfony console doctrine:database:create
```

### créer des tables

```sh
symfony console make:entity
## attention bien regarder le contenu des entités créées
symfony console make:migration
## attention bien regarder les fichiers de migrations
symfony console doctrine:migration:migrate
## créer les tables
```


Astuce
 

```sh
symfony console doctrine:migrations:migrate prev
```

## créer fixture

```sh
symfony console make:fixture
# il faut coder
symfony console doctrine:fixture:load
# remplir mes tables de données 
```

### créer mes vues

```sh
symfony console make:controller
symfony console make:form
symfony console make:crud 
```

### créer l'authentification

```sh
symfony console make:auth
```