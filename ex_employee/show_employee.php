<?php
require 'db_config.php';

if (isset($_GET['id'])) {


    $id = $_GET['id'];
    // Création de la requête SQL (pas encore exécutée)
    $query = $db->prepare("SELECT employeeNumber, lastName, firstName, email, officeCode, jobTitle, reportsTo FROM employees WHERE employeeNumber = ?");

    // Exécution de la requête
    $query->execute([
        $id,
    ]);

    // On récupère tous les résultats de la requête dans une variable $customers
    $employee = $query->fetch();

    $query = $db->prepare("SELECT employeeNumber, lastName, firstName, email, jobTitle FROM employees WHERE employeeNumber = ?");

    // Exécution de la requête
    $query->execute([
        $employee['reportsTo'],
    ]);

    // On récupère tous les résultats de la requête dans une variable $customers
    $hierarchicUp = $query->fetch();

    $query = $db->prepare("SELECT o.city, o.country, o.phone, o.postalCode FROM offices AS o INNER JOIN employees AS e ON o.officeCode = e.officeCode WHERE o.officeCode = ? ");

    // Exécution de la requête
    $query->execute([
        $employee['officeCode'],
    ]);

    // On récupère tous les résultats de la requête dans une variable $customers
    $office = $query->fetch();
    if ($employee != false) {
        require './show_employee.phtml';
        var_dump($employee);
        var_dump($office);
    }
    else {
        require './error.phtml';
    }

} else {
    header("location: index.php");
}
