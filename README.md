# Installation du projet

## Choix et installation du serveur

Suivant votre système d'exploitation plusieurs serveurs peuvent être installés :

    - Windows : WAMP (http://www.wampserver.com/)
    - MAC : MAMP (https://www.mamp.info/en/mamp/)
    - Linux : LAMP (https://doc.ubuntu-fr.org/lamp)
    - XAMP (https://www.apachefriends.org/fr/index.html) qui dispose d'une version pour chaque OS

## Récupération du projet

Il faudra tout d'abord avoir installé GIT :

    - GIT (https://git-scm.com/downloads)

Une fois GIT installé placer vous dans le répertoire de votre choix puis exécuter la commande suivante :

    - git clone https://github.com/MyrrdinAlsatian/blog-php.git

Le dossier sera automatiquement cloné dans votre répertoire.

## Lancement du projet

La première chose à faire sera de lancer votre serveur puis de définir votre base de données dans le fichier suivant :

    - blog-php\config\param.ini.php

Il faudra remplacer les informations présentes par les vôtres comme ceci :

-'SMTP_HOST', Hôte STMP;
-'SMTP_USER', Utilisateur SMTP;
-'SMTP_PASS', Mot de passe serveur SMTP;

// DB server configuration

- DB_HOST', Adresse de la base de données;
- DB_USER', Utilisateur de la base de données;
- DB_PASS', Mot de passe de la base de données;
- DB_NAME', Nom de la base de données;

Une fois ceci fait vous pourrez accéder au projet en local.
