<?php

/* TODO
 *
 * Pour chaque ligne du fichier csv parcouru, ajouter le nouvel utilisateur dans le tableau $users
 * Sur un fichier index.phtml, afficher un tableau (prénom, nom, email, date de naissance) avec les données du tableau $users
 *
 */

// Permet d'ouvrir un fichier
$file = fopen('users.csv', 'r');

// Lecture d'une ligne du fichier
// $line = fgets($file);
// var_dump($line);

// Tant qu'il y a des données à lire
// On stocke le contenu de fgets dans une variable
// while (($line = fgets($file)) !== false) {
// 	// On retire les espaces et sauts de ligne en début et fin de chaîne
// 	$line = trim($line);

// 	// Récupération des informations dans un tableau
// 	$lineArray = explode(';', $line);
// 	var_dump($lineArray);
// }

// Liste des utilisateurs
$users = [];
$userTemplate = [
	"First name",
	"Last name",
	"Email address",
	"Date of Birth"
];

while (($line = fgetcsv($file, 1024, ';')) !== false) {
	array_push($users, $line);

}

// Fermeture du fichier ouvert ci-dessus
fclose($file);

require 'index.phtml';