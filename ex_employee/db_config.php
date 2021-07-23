<?php 

// Connexion à une base de données
// 1er paramètre : DSN (Data Source Name)
// 2ème paramètre : nom d'utilisateur
// 3ème paramètre : mot de passe
// 4ème paramètre (facultatif) : les options
$db = new PDO("mysql:host=localhost;dbname=classicmodels;charset=UTF8", "root", "", [
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);