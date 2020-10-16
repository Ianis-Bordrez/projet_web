# Instructions d'installation

## GitHub

- Allez sur l'adresse suivante https://github.com/Ianis-Bordrez/projet_web
- Cliquer sur "Clone or Download"
- Sélectionner Download Zip et extraire le dossier

## XAMPP

- Se diriger vers cette adresse https://www.apachefriends.org/fr/index.html
- Télécharger la version adaptée pour votre système d'exploitation
- Lors de l'installation sélectionnez Apache et MySQL
- Lorsque l'installation est terminée allez dans les options de port sur le menu principal vérifiez que MySQL est bien sur le port 3396 et le changer si ce n'est pas le cas
- Lorsque cela est fait appuyez sur start pour les 2 services: Apache / MySQL
- Déplacez le dossier projet_web dans le dossier d'installation de Xampp suivant le chemin: xampp/htdocs/projet_web


## MySQL


- Maintenant pour configurer la base de données dirigez vous vers http://localhost:80/phpmyadmin/
- Cliquez sur "Nouvelle base de données" et nommez la "ynovprojetweb_2020"
- Puis dans l'onglet SQL copier/coller le contenu du fichier présent dans le dépot nommé CreateBase.sql puis éxécutez
- Enfin suivez la même procédure pour le fichier "item.sql"
- Pour conclure allez sur l'adresse suivante http://localhost:80/projet_web/