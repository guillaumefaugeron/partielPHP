1. Qu'est-ce qu'un container de services ? Quel est son rôle ?

Le container de service sert a centralliser les services, sont role est de données acces des class qui ont ont des 
méthodes pouvant etre utlisé par les controller de la meme facon  (le  traintement ne sera qu'a un seul endroit de l'application
d'ou le principe d'injection)


2. Quelle est la différence entre les commandes `make:entity` et `make:user` lorsqu'on utilise la console Symfony ?

make:entity fait une entity classsique alorsque le make:user fait une entity spécifique a la ftc de login

3. Quelle commande utiliser pour charger les fixtures dans la base de données ?

php bin/console doctrine:fixtures:load


4. Résumez de manière simple le fonctionnement du système de versions "Semver"

c'est de liste de bonnes procédures a suivre, qui vise a incrementer les numeros de versions correctement (sémantique de version)

5. Qu'est-ce qu'un `Repository` ? A quoi sert-il ?

Un repository sert a faire le lien entre la base de données et les controllers


6. Quelle commande utiliser pour voir la liste des routes ?

php bin\console debug:router


7. Dans un template Twig, quelle variable globale permet d'accéder à la requête courante, l'utilisateur courant, etc...?

app.request.query.get('param') == 'value'

8. Pour mettre à jour la structure de la base de données, quelles sont les 2 possibilités que nous avons abordées en cours ?

les migrations :
php bin/console make:migration 
php bin/console doctrine:migrations:migrate

et l'autre : 
php bin/console doctrine:schema:update --force


9. Quelle commande permet de créer une classe de contrôleur ?

php bin\console make:controller

10. Décrivez succintement l'outil Flex de Symfony

Liste des packages pouvant etre installer dans un projet symfony  grace a composer 
