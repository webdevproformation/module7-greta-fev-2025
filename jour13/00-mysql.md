# je souhaite travailler avec une base de données MySQL / MariaBD 

- Windows

=> installer une serveur MySQL en local => XAMPP
=> démarrer les services => Apache et MySQL 
=> jeter un coup d'oeil sur phpMyAdmin
=> récupérer le type de SGBD que j'ai : `Version du serveur : 10.4.24-MariaDB - mariadb.org binary distribution `

=> modifier le code 
    - renommer le dossier migrations => migrations_sqlite
    - créer un nouveau dossier migrations 
    
    - .env
    - DATABASE_URL="mysql://root:@127.0.0.1:3306/recettes_demo?serverVersion=10.4.24-MariaDB&charset=utf8mb4"
    - lancer un terminal
    - cd fils_rouge
    - symfony console d:d:c
    - symfony console make:migration
    - symfony console d:m:m
    - symfony console d:f:l

- Linux



 
- MacOS 

- dans une machine Virtuelle (Docker / Vagrant) 