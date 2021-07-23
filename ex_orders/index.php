<?php

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

require 'db_config.php';
// Création de la requête SQL (pas encore exécutée)
$query = $db->prepare("SELECT orderNumber, orderDate, status, customerName FROM orders INNER JOIN customers ON orders.customerID = customers.ID");

// Exécution de la requête
$query->execute();

// On récupère tous les résultats de la requête dans une variable $customers
$orders = $query->fetchAll();
$ordersFiltered = array_slice($orders, getStartIndex($index, $base), $base);
require 'index.phtml';


