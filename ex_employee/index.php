<?php
// require './library/simple_html_dom.php';
$base = 15; //Nombre d'élements affichés par page
if (isset($_GET['index'])){
    $index = $_GET['index'];

} else {
    $index = 1;
};
// function getMaxIndex($index, $base){
//     $maxIndex = ($base * $index) - 1;
//     echo "max: ".$maxIndex;
//     return $maxIndex;
// };

function getStartIndex($index, $base){
    if ($index == 1){
        $minIndex = 0;
    } else {
        $minIndex = ($index - 1) * $base;
    };
    return $minIndex;
};
$offsetIndexSql = getStartIndex($index, $base);

require 'db_config.php';
// Création de la requête SQL (pas encore exécutée)
$query = $db->prepare("SELECT employeeNumber, lastName, firstName, email, officeCode, jobTitle FROM employees LIMIT $base OFFSET $offsetIndexSql");

// Exécution de la requête
$query->execute();

// On récupère tous les résultats de la requête dans une variable $customers
$employees = $query->fetchAll();

$query = $db->prepare("SELECT COUNT(*) FROM employees");

// Exécution de la requête
$query->execute(
);

// On récupère tous les résultats de la requête dans une variable $customers
$numberOfEmployees = $query->fetch();
var_dump($numberOfEmployees);
require 'index.phtml';
