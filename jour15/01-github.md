# mettre en ligne (sur github) un projet 

git init
git add .
git commit -m "first commit"
git branch -M main
git remote add origin git@github.com:webdevproformation/projet-vendredi.git

## ici erreur !!! j'ai utiliser ssh au lieu de https 

git remote remove origin

git remote add origin https://github.com/webdevproformation/projet-vendredi.git

git push -u origin main