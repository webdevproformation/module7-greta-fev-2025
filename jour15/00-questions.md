# créer table catégorie

=> qui est en relation OneToMany / ManyToOne avec Recette 

=> symfony console make:entity => OK !!! 

=> symfony console make:migration => KO => SQlite ne sait pas générer les ALTER FOREIGN KEY 

=> Problème !!!!!!!!!!!!!!!

----------------------

# solution possible 

=> renommer le dossier migrations en migrations_sqlite
=> créer un nouveau dossier migrations vierge 
=> renommer la base de données /var/data.db en /var/data_old.db
=> symfony console d:d:c          # re créer la base à neuf
=> symfony console make:migration # nouveau fichier de migration
=> symfony console d:m:m          # exécuter la migration