<?php /***                            ***
*** Création de la table membre ***
***                             ***/


$bdd->exec("CREATE TABLE `membres` (
   `pseudo` varchar(255) not null,
   `motdepasse` varchar(255) not null,
   `email` varchar(255) not null,
   `id` int(11) not null auto_increment,
   `id_admin` tinyint(4) not null default '0',
   PRIMARY KEY (`id`)
)");



/*                             ---
--- Création de la table Des New ---
---                              */
$bdd->exec("CREATE TABLE `articles` (
   `id` int(11) not null auto_increment,
   `titre` varchar(255) not null,
   `contenu` text not null,
   `auteur` varchar(255) not null,
   `date_ajout` datetime not null,
   PRIMARY KEY (`id`)
)");

/* Création des commentaire */

$bdd->exec("CREATE TABLE `commentaires` (
   `id` int(11) not null auto_increment,
   `pseudo` varchar(255) not null,
   `contenu` text not null,
   PRIMARY KEY (`id`)
)");

/*                              ---
--- Création de ka table du chat ---
---                              */


$bdd->exec("CREATE TABLE `chat` (
   `id` int(11) not null auto_increment,
   `pseudo` varchar(255) not null,
   `message` text not null,
   PRIMARY KEY (`id`)
)");

/*                                              ---
--- Création des la table des information du site ---
---                                               */


$bdd->exec("CREATE TABLE `info_site` (
   `nom_site` text not null,
   `id` int(11) not null auto_increment,
   PRIMARY KEY (`id`)
)");
?>