<?php 
if (isset($_GET['orderNumber'])) {
require './library/simple_html_dom.php';
require 'db_config.php';
// Création de la requête SQL (pas encore exécutée)
$query = $db->prepare("SELECT orderNumber, orderDate, status, customerName FROM orders INNER JOIN customers ON orders.customerID = customers.ID WHERE orderNumber = ? ");

// Exécution de la requête
$query->execute([
    $_GET['orderNumber'],
]);

// On récupère tous les résultats de la requête dans une variable $customers
$order = $query->fetch();

$query = $db->prepare("SELECT o.productCode, o.quantityOrdered, o.priceEach, p.productName FROM orderdetails AS o INNER JOIN products AS p ON o.productCode = p.productCode WHERE o.orderNumber = ? ");

// Exécution de la requête
$query->execute([
    $_GET['orderNumber'],
]);

// On récupère tous les résultats de la requête dans une variable $customers
$orderDetails = $query->fetchAll();

$totalPriceList = [];
require 'order.phtml';
require 'table_details.php';

};
    
