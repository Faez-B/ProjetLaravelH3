<h1>
    Projet Laravel : Application de formation
</h1>

<p>
    Ceci est une application permettant de consulter des formations.
    Ces formations sont mises en ligne par des formateurs validé par l'administrateur.
    L'administrateur est le seul pouvant accepter la demande d'un visiteur pour devenir formateur.
</p>

<p>
    <h3> Remplir la base de données </h3>

    Veuillez tout d'abord connecter votre base de données à ce projet.
    Vous pouvez remplir la base de données avec la seule commande suivante :
    
    php artisan migrate:fresh --seed

    Ou alors

    avec les deux commandes suivantes :
    php artisan migrate:fresh
    php artisan db:seed
</p>

<p>
    Vous avez des images fournies pour les formations et utilisateurs, ainsi qu'un diagramme du projet
</p>