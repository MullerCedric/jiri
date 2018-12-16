# Jiri
> Projet par Cédric Müller pour la [HEPL](http://www.provincedeliege.be/hauteecole "vers le site de la Haute École de la Province de Liège")

## Concept
Jiri est une application qui permet de tenir un jury. Par exemple, les cours de Design Web du 2ème bloc et de Projets Web du 3ème bloc du bachelier en infographie organisé à la Haute École de la Province de Liège se concluent par des jurys lors desquels les travaux des étudiants sont évalués par des externes.

[Consultez le cahier des charges pour plus d'informations](https://github.com/hepl-pw/jiri "voir le cahier des charges")

## Les principes fondamentaux 
1. En tant que professeur/manager : créer et gérer un jury (à partir du _dashboard_);
2. En tant qu'évaluateur : coter des projets pour des étudiants dans le cadre d'un jury (à partir d'un lien envoyé par e-mail).

Si le temps le permet, on peut également imaginer qu'un lien serait envoyé à chaque étudiant à la fin de chaque jury afin de consulter les commentaires et les cotes publiques (dont au moins la cote finale)

## Technologies utilisées
* Pour le front-end, **Vue.js 2.5** est utilisé
* Pour le back-end, **Laravel 5.7** est utilisé

## Architecture de la base de données
  
* `users` est une table qui contient les trois types d'utilisateurs que nous avons dans ce projets : les professeurs (managers) qui créent des jurys, les évaluateurs de ces jurys, et les personnes qui s'y font évaluer (les étudiants)
    * le champ `is_admin` permet d'avoir des droits sur tous les jurys et tous les utilisateurs. Il n'est donc **pas** attribué à toute personne créant un jury
    * le champ `is_active` permet d'archiver (temporairement ou non) un utilisateur. Seul un administrateur ou l'utilisateur lui-même peut changer son statut
* `examinations` est une table qui contient toute la structure de chaque jury : son nom, l'id de la personne qui le gère, sa date de commencement, etc.
* `examination_user` est la table _pivot_ qui permet de lister tous les utilisateurs participants à un jury. Ces utilisateurs ont tous un `role` : soit se sont des professeurs, soit se sont des étudiants. Le rôle de l'utilisateur est enregistré ici car il dépend du jury en cours. Un utilisateur peut donc être évalutateur pour un jury, mais étudiant pour un autre
* `projects` est une table qui contient la structure de chaque projet : son nom et le jury pour lequel il est d'application
* `weightings` est la table qui contient les différentes pondérations de chaque projet. Chaque projet a sa propre pondération par défaut attribuée pour un jury bien précis
    * le champ `apply_for_user` vaut `null` lorsque c'est une pondération par défaut et vaut l'`id`d'un `user` lorsque c'est une pondération pour cet étudiant en particualier
* `marks` est la table qui contient toutes les cotes remises. Ces cotes sont données par des évaluateurs à des étudiants dans le cadre d'un jury en particulier par rapport à un projet (sauf si c'est une évalutation globale). Chaque note peut être accompagnée d'un commentaire donné par l'évaluateur
