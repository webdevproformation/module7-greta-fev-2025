# une fois que la partie base de données du site internet et opérationnelle

- il est conseillé de remplir la base de données de données factices 
- remplir mes tables avec des données factices 
- MAIS étant donnée que l'on n'a des relations entre les tables, il faut respecter un ordre d'INSERT de données 
- 
- Entity 
- Repository 
- Migration
- FIXTURE => <https://www.doctrine-project.org/projects/doctrine-data-fixtures/en/2.0/index.html>


```sh
composer require orm-fixtures --dev
composer require --dev fakerphp/faker

symfony console make:fixture
```